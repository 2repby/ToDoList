<?php
    try {
        $conn = new PDO("mysql:host=$_ENV[dbhost];dbname=$_ENV[dbname]", $_ENV['dbuser'], $_ENV['dbpassword']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
