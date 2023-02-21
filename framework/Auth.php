<?php

namespace Framework;

class Auth
{
  public function hasAccess(Request $request): bool
  {
    $request->setUser((object)['id' => 1]);
    return true;
  }
}