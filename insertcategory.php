<?php
    require "dbconnect.php";
    if (strlen($_POST['name']) >= 3){
        //получение загруженного файла
        if ($file = fopen($_FILES['filename']['tmp_name'], 'r+')){
            //получение расширения
            $ext = explode('.', $_FILES["filename"]["name"]);
            $ext = $ext[count($ext) - 1];
            $filename = 'file' . rand(100000, 999999) . '.' . $ext;

            $resource = Container::getFileUploader()->store($file, $filename);
            $picture_url = $resource['ObjectURL'];
        }
        else
        {
            $picture_url = '/assets/calendar.png';
        }
        try {
            $sql = 'INSERT INTO category(name, description, picture_url, id_user) VALUES(:name,:description,:picture_url,:id_user)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':name', $_POST['name']);
            $stmt->bindValue(':description', $_POST['description']);
            $stmt->bindValue(':picture_url', $picture_url);
            $stmt->bindValue(':id_user', $_SESSION['id']);
            $stmt->execute();
            $_SESSION['msg'] = "Категория успешно добавлена";
            // return generated id
            // $id = $pdo->lastInsertId('id');

        } catch (PDOexception $error) {
            $_SESSION['msg'] = "Ошибка добавления категории: " . $error->getMessage();
        }
    }
    else $_SESSION['msg'] = "Ошибка добавления категории: имя категории должно содержать не менее 3х символов";

    // перенаправление на страницу категорий
    header('Location: http://todolist/index.php?page=c');
    exit( );

