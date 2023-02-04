<?php
//   $err_msg = '';

    if (isset($_POST["login"]) and $_POST["login"]!='')
    {
        try {
            $sql = 'SELECT id, firstname, lastname, md5password FROM user WHERE email=(:login)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':login', $_POST['login']);
            $stmt->execute();
            //$_SESSION['msg'] = "Вы успешно вошли в систему";
            // return generated id
            // $id = $pdo->lastInsertId('id');

        } catch (PDOexception $error) {
            $msg = "Ошибка аутентификации: " . $error->getMessage();
        }
        // если удалось получить строку с паролем из БД
        if ($row=$stmt->fetch(PDO::FETCH_LAZY))
        {
            if (MD5($_POST["password"])!= $row['md5password']) $msg = "Неправильный пароль!";
            else {
                // успешная аутентификация
                $_SESSION['login'] = $_POST["login"];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['id'] = $row['id'];
                //if ($row['is_teacher']==1) $_SESSION['teacher'] = true;
                $msg =  "Вы успешно вошли в систему";
                }
        }
        else $msg =  "Неправильное имя пользователя!";

    }

    if (isset($_GET["logout"]))
    {
        $_SESSION = null;
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        header('Location: /');
        exit( );
    }





?>
