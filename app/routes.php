<?php

use Framework\Route;
use Framework\Router;
Router::addRoute(new Route('logout', 'AuthController@logout', Route::METHOD_GET));
Router::addRoute(new Route('login', 'AuthController@login', Route::METHOD_POST));
Router::addRoute(new Route('page/{page}', 'PageController@index', Route::METHOD_GET));
Router::addRoute(new Route('user', 'UserController@index', Route::METHOD_GET, true));
Router::addRoute(new Route('user/{id}', 'UserController@getById', Route::METHOD_GET, true));
Router::addRoute(new Route('', 'PageController@index', Route::METHOD_GET));


//Router::addRoute(new Route('test_route/{test_data}', 'MyController@index', Route::METHOD_GET));
Router::addRoute(new Route('test_route/{test_data}/value/{test_value}', 'MyController@index', Route::METHOD_GET));
Router::addRoute(new Route('wellcome/{name}/text/{text}', 'HelloController@hello', Route::METHOD_GET));
echo "Маршруты добавлены<br>";