<?php


require "dbconnect.php";
if (strlen($_POST['name']) >= 3){

        try {
            $sql = 'INSERT INTO task(name,description,created_at,deadline,id_category,id_user) VALUES(:name,:description,:created_at,:deadline,:id_category,:id_user)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':name', $_POST['name']);
            $stmt->bindValue(':description', $_POST['description']);
            $stmt->bindValue(':created_at', date('Y-m-d H:i:s', time()));
            $stmt->bindValue(':deadline', $_POST['deadline']);
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

