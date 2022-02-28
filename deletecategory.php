<?php
    require "dbconnect.php";
    try {
        $sql = 'DELETE FROM category WHERE id=:id';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $_SESSION['msg'] = "Категория успешно удалена";
        // return generated id
        // $id = $pdo->lastInsertId('id');
    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка удаления категории: " . $error->getMessage();
    }
    // перенаправление на главную страницу приложения
    header('Location: http://todolist');
    exit( );


