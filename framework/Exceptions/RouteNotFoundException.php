<?php

namespace Framework\Exceptions;

class RouteNotFoundException extends \Exception
{

  public function __construct()
  {
    $this->message = 'Router not found';
  }
}