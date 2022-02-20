<?php
    require __DIR__ . '/vendor/autoload.php';
    use Dotenv\Dotenv;
    if (file_exists(__DIR__."/.env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
    require "dbconnect.php";
    require "categories.php";

