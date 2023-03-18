<?php

namespace Framework;

use App\DbConnection;

class MysqlModel extends Model
{
  protected static \PDO $connection;
  protected static $table = '';


  /**
   * MysqlModel constructor.
   */
  public function __construct(array $attrubutes = [])
  {
  }

  public static function getWhere($field = null, $operation = null, $value = null)
  {
    $table = static::$table;
    $query = self::getConnection()->prepare("SELECT * FROM ${table} WHERE ".$field." " .$operation." '".$value."'");
//    $query->bindValue(':value', $value);
//        echo $query->queryString;
    $query->execute();
    return self::fetchAll($query);
  }

  public static function create($fields)
  {
      echo ('<br>параметры метода:<br>');
      var_dump($fields);
    $keys_array = array_keys($fields);
    $keys = implode(", ", $keys_array);
      echo ('<br>ключи:<br>');
      var_dump($keys);
    $placeholders = implode(", ", array_map(function ($el) {
      return ":$el";
    }, $keys_array));
      echo ('<br>placeholders:<br>');
    var_dump($placeholders);
    $table = static::$table;
    $query = self::getConnection()->prepare("INSERT INTO {$table} ({$keys}) VALUES ($placeholders)");
    foreach ($fields as $key => $field) {
      $query->bindValue(":".$key, $field);
    }
    $query->execute();
  }

  public static function all()
  {
    $query = self::getConnection()->query("SELECT * FROM " . static::$table);
    return self::fetchAll($query);
  }

  public static function first()
  {
    $query = self::getConnection()->query("SELECT * FROM " . static::$table . " LIMIT 1");
    return self::fetchAll($query);
  }

  protected static function getConnection(): \PDO
  {
    if (isset(self::$connection)) {
      return self::$connection;
    }
    self::$connection = DbConnection::getConnection();
    return self::$connection;
  }

  public static function deleteWhere($field = null, $operation = null, $value = null)
  {
    // TODO: Implement deleteWhere() method.
      $table = static::$table;
      $query = self::getConnection()->prepare("DELETE FROM ${table} WHERE ".$field." " .$operation." '".$value."'");
//    $query->bindValue(':value', $value);
        echo $query->queryString;
      return $query->execute();
//      return self::fetchAll($query);
  }

  public static function updateWhere($conditions)
  {
    // TODO: Implement updateWhere() method.
  }

  private static function fetchAll(\PDOStatement $PDOStatement)
  {
    return $PDOStatement->fetchAll(\PDO::FETCH_CLASS, static::class);
  }
}