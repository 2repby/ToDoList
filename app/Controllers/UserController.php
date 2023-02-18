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


        return $this->view('user.php', ['users' =>  $users->all()]);

    }

}