<?php

namespace Framework;

abstract class Model
{
  protected static $primaryKey = 'id';

  public static function getById($id)
  {
    return static::getWhere(static::$primaryKey, '=', $id)[0];
  }

  public static abstract function getWhere($field = null, $operation = null, $value = null);

  public static abstract function all();


  public static function deleteById($id)
  {
  }

  public abstract function deleteWhere($conditions);

  public function updateById($id)
  {
    return $this->updateWhere([static::$primaryKey => $id]);
  }

  public static abstract function updateWhere($conditions);

  public static abstract function create($fields);
}