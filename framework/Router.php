<?php

namespace Framework;
//use App\Controllers;
//use function PHPSTORM_META\elementType;

use Framework\Exceptions\MethodNotFoundException;
use Framework\Exceptions\RouteNotFoundException;
use Framework\Exceptions\UnauthorizedException;

class Router
{
  public static $routes = []; //use to be private
  private $request;
  public Auth $auth;

  public function __construct(Request $request, Auth $auth)
  {
    $this->request = $request;
    $this->auth = $auth;
  }

  private function getCurrentRoute(): ?Route
  {
    foreach (self::$routes as $route) {
      echo "Путь: " . $route->getPath() . "<br>";
      if ($route->getType() == $this->request->getType() && preg_match($route->getMask(), $this->request->getPath())) {
        return $route;
      }
    }
    return null;
  }

  /**
   * @throws UnauthorizedException
   */
  private function checkAuth(Route $route)
  {
    if ($route->isRequireAuth()) {
      if (!$this->auth->hasAccess($this->request)) {
        throw new UnauthorizedException();
      }
    }
  }

  private function getParamsForController(Route $route)
  {
    $params = [];
    preg_match_all($route->getMask(), $this->request->getPath(), $params);
    return array_map(fn($p) => $p[0], array_slice($params, 1));
  }

  /**
   * @throws MethodNotFoundException
   * @throws UnauthorizedException
   * @throws RouteNotFoundException
   */
  public function getContent()
  {
    $exec_route = $this->getCurrentRoute();
    if (!$exec_route) {
       throw new RouteNotFoundException();
    };
    $this->checkAuth($exec_route);
    $controller_name = $exec_route->getControllerClass();
    $method_name = $exec_route->getControllerMethodName();
    $controller = new $controller_name();
    if (!method_exists($controller, $method_name)) {
      throw new MethodNotFoundException($method_name, $controller_name);
    }
    $params_to_controller = $this->getParamsForController($exec_route);
    return call_user_func_array([$controller, $method_name], $params_to_controller);

  }

  public static function addRoute($route)
  {
    array_push(self::$routes, $route);
  }
}