<?php

namespace Framework\Exceptions;

class MethodNotFoundException extends \Exception
{

  public function __construct(string $method_name, string $controller_name)
  {
      $this->message = "Method $method_name not found in Controller $controller_name";
      parent::__construct();
  }
}