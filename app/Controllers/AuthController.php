<?php
namespace App\Controllers;

use App\Models\UserModel;
use Framework\Container;
use Framework\Controller;

class AuthController extends Controller
{
    public function login()
    {

        $login = Container::getRequest()->getPostParams()['login'];
        $password = Container::getRequest()->getPostParams()['password'];
        echo ($login.' '.$password);
        if (isset($login) and $login != '') {
            echo('имя пользователя');
            $userModel = new UserModel();
            $user = $userModel->getWhere('email', '=', $login);
            var_dump($user);
            echo $user->id;


        }
    }

}
