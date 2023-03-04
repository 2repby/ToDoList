<?php

namespace Framework;

use Dotenv\Dotenv;
use Framework\Exceptions\UnauthorizedException;

class Application
{
  private Router $router;


  public function __construct(Router $router)
  {
    $this->router = $router;
  }


  public function run()
  {
    try {
      echo $this->router->getContent();

    } catch (UnauthorizedException $e){
      http_response_code(401);
      echo $e->getMessage();
    } catch (\Throwable $e){
      echo $e->getMessage()."\n\n".$e->getTraceAsString()."\n\n".$e->getFile()."\n\n".$e->getLine();
      http_response_code(500);
    }
  }
}