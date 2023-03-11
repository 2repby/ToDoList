<?php
namespace App\Controllers;

use App\Models\UserModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;


//use UserModel;

class PageController extends Controller
{
    public function index(Request $request, $view = null)
    {
        if ($view)
            return $this->view($view.'.php', ['user' =>  $request->getUser(), 'message' => $request->getSession()['msg']]);
        else
            return $this->view('hello.php', ['user' =>  $request->getUser(), 'message' => $request->getSession()['msg']]);
    }
}