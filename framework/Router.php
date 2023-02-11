<?php
namespace Framework;
//use App\Controllers;
//use function PHPSTORM_META\elementType;

class Router
{
    public static $routes = []; //use to be private
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getContent(){
        $exec_route = null;
        foreach (self::$routes as $route){
            echo "Путь: ".$route->getPath()."<br>";
            if($route->getType() == $this->request->getType() && preg_match($route->getMask(), $this->request->getPath()))
            {
                $exec_route = $route;
            }
        }
        if($exec_route){
            $action = explode('@',$exec_route->getAction());
            if (isset($action[0]) && isset($action[1])){

                $controller_name = "App\Controllers\\".$action[0];
                echo "Имя контроллера: ".$controller_name."<br>";
                $method_name = $action[1];
                echo "Вызываемый метод: ".$method_name."<br>";
                $controller = new $controller_name();
                if(method_exists($controller, $method_name))
                {
                    $params = [];
                    preg_match_all($exec_route->getMask(), $this->request->getPath(),$params);
                    echo "params= ";
                    var_dump($params);
                    echo "<br>----------------<br>";
                    $params_to_controller = array_map(fn($p)=>$p[0],array_slice($params,1   ));
                    echo "params_to_controller= ";
                    var_dump($params_to_controller);
                    echo "<br>----------------<br>";
                    return $controller->$method_name(...array_values($params_to_controller));
                }
                return "Метод ".$method_name." не найден";
            }
            else return "Контроллер не найден";
        }
        return "Маршрут не найден";
    }
    public static function addRoute($route){
        array_push(self::$routes, $route);
    }
}