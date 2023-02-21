<?php
/**
 * Created by PhpStorm.
 * User: kda
 * Date: 05.03.2020
 * Time: 12:33
 */
namespace Framework;
class Route
{
    const METHOD_GET = 1;
    const METHOD_POST = 2;

    private $path;
    private $action;
    private $type;
    private bool $requireAuth;

  public function __construct($path, $action, $type, bool $auth = false)
    {
        $this->path = $path;
        $this->action = $action;
        $this->type = $type;
        $this->requireAuth = $auth;
    }
    public function getParams(){
        $params = [];
        preg_match_all('/{([a-z]\w*)}/',$this->path,$params);
//        echo "params: ";
//        var_dump($params);
//        echo "<br>";
        return $params[0];
    }
    public function getMask(){

        $path = $this->path;
        $path =  preg_replace("/{[a-z]\w*}/","(\w*)",$path);
//        echo "<br>".$path."<br>";
        return '~'.$path.'~';
    }


    public function getPath()
    {
        return $this->path;
    }


    public function getAction()
    {
        return $this->action;
    }

    public function getType()
    {
        return $this->type;
    }

  /**
  
   * @return bool
   */
  public function isRequireAuth(): bool
  {
    return $this->requireAuth;
  }

  /**
   * @param bool $requireAuth
   */
  public function setRequireAuth(bool $requireAuth): void
  {
    $this->requireAuth = $requireAuth;
  }
    
    


}