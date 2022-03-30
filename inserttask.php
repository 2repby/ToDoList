<?php
use Aws\S3\S3Client;
use S3FileUploader\S3FileUploader;
use UploadService\UploadService;

require "dbconnect.php";
if (strlen($_POST['name']) >= 3){
    //получение загруженного файла
    $file = fopen($_FILES['filename']['tmp_name'], 'r+');
    //получение расширения
    $ext = explode('.', $_FILES["filename"]["name"]);
    $ext = $ext[count($ext) - 1];

    $s3client = new S3Client([
        'version' => 'latest',
        'region' => 'us-east-1',
        'endpoint' => $_ENV['S3_ENDPOINT'], //чтение настроек окружения из файла .env
        'use_path_style_endpoint' => true,
        'credentials' => [
            'key' => $_ENV['S3_KEY'],
            'secret' => $_ENV['S3_SECRET'],
        ],
    ]);

    $s3fileUploader = new S3FileUploader($s3client);
    $uploadService = new UploadService($s3fileUploader);
    $resource = $uploadService->upload($file);

        try {
            $sql = 'INSERT INTO task(name,description,created_at,deadline,id_category,id_user,picture_url) VALUES(:name,:description,:created_at,:deadline,:id_category,:id_user,:picture_url)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':name', $_POST['name']);
            $stmt->bindValue(':description', $_POST['description']);
            $stmt->bindValue(':created_at', date('Y-m-d H:i:s', time()));
            $stmt->bindValue(':deadline', $_POST['deadline']);
            $stmt->bindValue(':picture_url', $resource['ObjectURL']);
            $stmt->bindValue(':id_category', $_POST['id_category']);
            $stmt->bindValue(':id_user', $_SESSION['id']);
            $stmt->execute();
            $_SESSION['msg'] = "Задача успешно добавлена";
            // return generated id
            // $id = $pdo->lastInsertId('id');

        } catch (PDOexception $error) {
            $_SESSION['msg'] = "Ошибка добавления задачи: " . $error->getMessage();
        }

}
else $_SESSION['msg'] = "Ошибка добавления задачи: имя задачи должно содержать не менее 3х символов";

// перенаправление на главную страницу приложения
header('Location: http://todolist/index.php?page=t');
exit( );

