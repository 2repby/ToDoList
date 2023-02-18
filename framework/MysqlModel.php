<?php
namespace Framework;
use App\DbConnection;

class MysqlModel extends Model
{
    protected $table;
    protected $connection;

    /**
     * MysqlModel constructor.
     */
    public function __construct()
    {
        $this->connection = DbConnection::getConnection();
    }

    public function getWhere($conditions)
    {
        // TODO: Implement getWhere() method.
    }

    public function deleteWhere($conditions)
    {
        // TODO: Implement deleteWhere() method.
    }

    public function updateWhere($conditions)
    {
        // TODO: Implement updateWhere() method.
    }

    public function create($fields)
    {
        $keys_array = array_keys($fields);
        $keys = implode(", ", $keys_array);
        $placeholders = implode(", ", array_map(function($el){return ":$el";}, $keys_array));
        //var_dump($placeholders);
        $query = $this->connection->prepare("INSERT INTO {$this->table} ({$keys}) VALUES ($placeholders)");
        foreach ($fields as $key => $field){
            $query->bindParam(":$key", $field);
        }
        $query->execute();
    }

    public function all(){
        $query = $this->connection->query("SELECT * FROM ".$this->table);
        return $query->fetchAll(\PDO::FETCH_CLASS);
    }
}