<?php
namespace App\Controllers;

use App\Models\UserModel;
use Framework\Controller;


//use UserModel;

class UserController extends Controller
{
    public function index()
    {
        $users = new UserModel();


        return $this->view('users.php', ['users' =>  $users->all()]);

    }
    public function getByID($id)
    {
        $users = new UserModel();

//        var_dump($users->getById($id));
        return $this->view('user.php', ['users' =>  $users->getById($id)]);

    }

}