<?php
    session_start();
//  require __DIR__ . '/vendor/autoload1.php'; //загрузка всех установленных библиотек
if ( file_exists(dirname(__FILE__).'/vendor/autoload.php') ) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}
    use Dotenv\Dotenv;                        //импорт класса Dotenv из пространства имен dotenv
    if (file_exists(__DIR__."/.env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load(); //все параметры окружения помещаются в массив $_ENV
       // var_dump($_ENV);
    }
    // подключение к БД
    try {
        $conn = new PDO("mysql:host=$_ENV[dbhost];dbname=$_ENV[dbname];charset=utf8mb4", $_ENV['dbuser'], $_ENV['dbpassword']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e) {
            echo "Ошибка подключения к БД: " . $e->getMessage(), $e->getCode( );
            die();
        }
