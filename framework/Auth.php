<?php

namespace Framework;

use App\Models\UserModel;

class Auth
{


    public function __construct(Request $request)
    {
        if ($_SESSION['id']){
            $userModel = new UserModel();
            $user = $userModel->getById($_SESSION['id']);
            echo ('Вот и пользователь');
            var_dump($user);
            $request->setUser($user);
        }

    }

    public function hasAccess(Request $request): bool
  {
        if ($request->getUser()) return true;
        else return false;
  }

  public function getUser(Request $request): UserModel
  {
        return $request->getUser();
  }
}