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
    $keys_array = array_keys($fields);
    $keys = implode(", ", $keys_array);
    $placeholders = implode(", ", array_map(function ($el) {
      return ":$el";
    }, $keys_array));
    //var_dump($placeholders);
    $table = static::$table;
    $query = self::getConnection()->prepare("INSERT INTO {$table} ({$keys}) VALUES ($placeholders)");
    foreach ($fields as $key => $field) {
      $query->bindParam(":$key", $field);
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

  public function deleteWhere($conditions)
  {
    // TODO: Implement deleteWhere() method.
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