<?php
    require "dbconnect.php";
    //проверка что текущий пользователь является владельцем категории

    try {
        $result = $conn->query("SELECT * FROM category WHERE id_user=". $_SESSION['id']." AND id=".$_GET['id']);
        if ($result->rowCount() == 0) throw new PDOException('Категория не найдена', 1111 );
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


