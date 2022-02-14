<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM category WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        echo ("Категория успешно удалена");
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        echo ("Ошибка: " . $error->getMessage());
    }
    header('Location: http://todolist');
    exit( );


