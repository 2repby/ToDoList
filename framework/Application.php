<?php

namespace Framework;

use Dotenv\Dotenv;

class Application
{
  private Router $router;


  public function __construct(Router $router)
  {
    $this->router = $router;
  }


  public function run()
  {
    echo $this->router->getContent();
  }
}