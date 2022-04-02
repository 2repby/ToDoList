<?php

require "dbconnect.php";


    try {
        $result = $conn->query("SELECT * FROM task WHERE task.id=".$_GET['id']);
        $row = $result->fetch();
        try {
            $resource = Container::getFileUploader()->delete($row['picture_url']);
        } catch (S3Exception $e) {
            $_SESSION['msg'] = $e->getMessage();
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


