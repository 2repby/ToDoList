<?php

    use Dotenv\Dotenv;
    use Framework\Container;

    session_start(["use_strict_mode" => true]);

    date_default_timezone_set('Asia/Yekaterinburg');
    if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
        require_once dirname(__FILE__).'/vendor/autoload.php';
    }
    if (file_exists(".env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load(); //все параметры окружения помещаются в массив $_ENV
        echo "Окружение загружено<p>";
        // var_dump($_ENV);
    }
    else {
        echo "Ошибка загрузки ENV<br>";
    }
    Container::getApp()->run();


    exit();




    require "dbconnect.php";







    require "auth.php";
    require "menu.php";
    echo '<main class="container" style="margin-top: 100px">';
    switch ($_GET['page']){
        case 'c':
            if (isset($_SESSION['login'])) {
                require "categories.php";
            }
            else{
                $msg = 'Войдите в систему для просмотра и создания категорий';
                }
            break;
        case 't':
            if (isset($_SESSION['login'])){
                require "tasks.php";
                require "taskform.php";
            }
            else{
                $msg = 'Войдите в систему для просмотра и создания задач';
            }
            break;
    }
    echo '</main>';

    if(($_SESSION['msg']!='') or isset($msg)) {
        require "message.php";
        $_SESSION['msg']= '';
    }

    require "footer.php";
?>
