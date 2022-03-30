<?php

use Aws\S3\Exception\S3Exception;
use FileUploader\S3;
    use FileUploader\S3FileUploader;
    use FileUploader\UploadService;

    require "dbconnect.php";
    $s3 = new S3();
    $s3fileUploader = new S3FileUploader($s3->getS3Client());
    $uploadService = new UploadService($s3fileUploader);


try {
    $result = $conn->query("SELECT * FROM task WHERE task.id=".$_GET['id']);
    $row = $result->fetch();
    try {
        $uploadService->delete($row['picture_url']);
    } catch (S3Exception $e) {
        echo $e->getMessage() . "\n";
    }
    $sql = 'DELETE FROM task WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Задача успешно удалена";
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    $_SESSION['msg'] = "Ошибка удаления задачи: " . $error->getMessage();
}
// перенаправление на главную страницу приложения
header('Location: http://todolist/index.php?page=t');
exit( );


