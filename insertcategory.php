<?php
    require "dbconnect.php";
    try {
        $sql = 'INSERT INTO category(name) VALUES(:name)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $_GET['name']);
        $stmt->execute();
        echo ("Категория успешно добавлена");
            // return generated id
            // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        echo ("Ошибка: " . $error->getMessage());
    }
    header('Location: http://todolist');
    exit( );

