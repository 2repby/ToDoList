<?php

namespace App\Controllers;

use Framework\Controller;

class MyController extends Controller
{
    public function index($name, $value=null){
        return $this->view('index.php', ['name' =>  $name, 'value' => $value]);
    }

//    public function data($user_name, $group_name){
////        return $this->view('data.php',['name'=>$user_name,'group'=>$group_name]);
////    }
}