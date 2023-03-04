<?php

namespace Framework\Exceptions;

class RouteNotFoundException extends \Exception
{

  public function __construct()
  {
      $this->message = 'Route not found';
      parent::__construct();
  }
}