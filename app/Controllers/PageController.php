<?php
namespace App\Controllers;

use App\Models\UserModel;
use Framework\Container;
use Framework\Controller;


//use UserModel;

class PageController extends Controller
{
    public function index($view)
    {
        $login = Container::getRequest()->getUser()->login;
        var_dump(Container::getRequest());
        return $this->view($view.'.php', ['login' =>  $login, 'name' => 'Дима']);
    }
}