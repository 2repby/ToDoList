<?php

namespace Framework\Exceptions;

class UnauthorizedException extends \Exception
{
    public function __construct()
    {
        $this->message = 'Unauthorized';
        parent::__construct();
    }
}