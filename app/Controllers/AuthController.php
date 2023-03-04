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
//        echo ($login.' '.$password);
        if (isset($login) and $login != '') {
            $user = UserModel::getWhere('email', '=', $login);
            if ($user){
                if (MD5($password) == $user[0]->md5password){
                    $_SESSION['login'] = $user[0]->email;
                    $_SESSION['firstname'] = $user[0]->firstname;
                    $_SESSION['lastname'] = $user[0]->lastname;
                    $_SESSION['id'] = $user[0]->id;

                    $_SESSION['msg'] = "Вы успешно вошли в систему";
                }
                else $_SESSION['msg'] = "Неправильный пароль";
            }
            else $_SESSION['msg'] = "Неправильный логин";
        }
        header('Location: /page/hello');
    }
    public function logout(Request $request){
        $_SESSION = null;
        $_SESSION['msg'] =  "Вы успешно вышли из системы";
        header('Location: /page/hello');
    }
}
