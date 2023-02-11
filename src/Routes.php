<?php
    namespace Framework;

    Router::addRoute(new Route('test_route/{test_data}', 'MyController@index', Route::METHOD_GET));
    Router::addRoute(new Route('test_route/{test_data}/value/{test_value}', 'MyController@index', Route::METHOD_GET));
    Router::addRoute(new Route('wellcome/{name}/text/{text}', 'HelloController@hello', Route::METHOD_GET));
    echo "Маршруты добавлены<br>";