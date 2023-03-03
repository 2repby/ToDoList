<?php
namespace App\Controllers;

use App\Models\UserModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $login = $request->getPostParams()['login'];
        $password = $request->getPostParams()['password'];
        echo ($login.' '.$password);
        if (isset($login) and $login != '') {
            echo('имя пользователя');

            $user = userModel::getWhere('email', '=', $login);
            var_dump($user);
            echo $user->id;


        }
    }

}
