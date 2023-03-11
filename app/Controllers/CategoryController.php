<?php
namespace App\Controllers;

use App\Models\CategoryModel;
use Framework\Container;
use Framework\Controller;
use Framework\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        return $this->view('categories.php', ['user' =>  $request->getUser(), 'message' => $request->getSession()['msg'], 'categories' => CategoryModel::all()]);

    }


}
