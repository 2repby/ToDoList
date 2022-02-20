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
        echo ("Ошибка добавления категории: " . $error->getMessage());
    }
    // перенаправление на главную страницу приложения
    header('Location: http://todolist');
    exit( );

