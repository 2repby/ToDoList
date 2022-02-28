<?php
    date_default_timezone_set('Asia/Yekaterinburg');
    require "dbconnect.php";
    require "auth.php";
    require "menu.php";
    switch ($_GET['page']){
        case 'c':
            require "categories.php";
            break;
        case 't':
            if (isset($_SESSION['login'])){
                require "tasks.php";
                require "taskform.php";
            }
            else{
                echo 'Войдите в сиситему для просмотра и создания задач';
            }
            break;
    }

    require "message.php";
    $_SESSION['msg'] = '';

