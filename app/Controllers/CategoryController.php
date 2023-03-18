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
    public function delete(Request $request, $id){
        CategoryModel::deleteWhere('id','=', $id);
        $_SESSION['msg'] =  "Категория была успешно удалена";
        header('Location: /categories');
    }
    public function new_category(Request $request){
        return $this->view('newcategory.php', ['user' =>  $request->getUser()]);
    }

    public function store(Request $request){
        $params = $request->getPostParams();

        if (strlen($params['name']) >= 3){
            //получение загруженного файла
            if ($file = fopen($_FILES['picture']['tmp_name'], 'r+')){
                //получение расширения
                $ext = explode('.', $_FILES["picture"]["name"]);
                $ext = $ext[count($ext) - 1];
                $filename = 'file' . rand(100000, 999999) . '.' . $ext;

                $resource = Container::getFileUploader()->store($file, $filename);
                $picture_url = $resource['ObjectURL'];
            }
            else
            {
                $picture_url = '/assets/calendar.png';
            }
            $params['id_user'] = 1; // $request->getUser()->id;
            $params['picture_url'] = $picture_url;
            echo ('Параметры модели: ');
            var_dump($params);
            CategoryModel::create($params);

        }
        else $_SESSION['msg'] = "Ошибка добавления категории: имя категории должно содержать не менее 3х символов";

        // перенаправление на страницу категорий
        header('Location: /categories');
        exit( );
    }


}
