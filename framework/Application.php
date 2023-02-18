<?php

namespace Framework;
use Dotenv\Dotenv;

class Application
{
    public static function init(){
        require "app/routes.php";
//        foreach (Router::$routes as $route){
//            $route->getParams();
//        }
//        foreach (Router::$routes as $route){
//            $route->getMask();
//        }

        echo "Приложение инициализировано<p>";
    }
}