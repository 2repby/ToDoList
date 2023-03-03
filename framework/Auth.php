<?php

namespace Framework;

use App\Models\UserModel;

class Auth
{
    public $user;

    public function __construct()
    {
        if ($_SESSION['id']){
            $this->user = UserModel::class->getById($_SESSION['id']);
        }

    }

    public function hasAccess(Request $request): bool
  {
    $request->setUser((object)['id' => 1]);
    return true;
  }
  public function getUser(Request $request): UserModel{
        return $this->user;
  }
}