<?php
namespace App;
use PDO;
use PDOException;

class DbConnection
{
    private static $connection;
    public static function getConnection(): PDO
    {
        try {
            if (!self::$connection) self::$connection = new PDO("mysql:host=$_ENV[dbhost];dbname=$_ENV[dbname];charset=utf8mb4", $_ENV['dbuser'], $_ENV['dbpassword']);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Подключение к БД выполнено";
            return (self::$connection);
        }
        catch(PDOException $e) {
                echo "Ошибка подключения к БД: " . $e->getMessage(), $e->getCode( );
                die();
            }
    }
}