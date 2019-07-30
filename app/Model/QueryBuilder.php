<?php


namespace App\Model;



class QueryBuilder
{
    /**
     * @var \PDO
     */
    private $db;

    /**
     * QueryBuilder constructor.
     * @param Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db->makeConnection();
    }

    /**
     * @param $table
     * @return mixed
     */
    public function getList($table) {
        $statement = $this->db->prepare("select * from {$table}");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * @param $table
     * @return mixed
     */
    public function getItemById($id, $table) {
        $statement = $this->db->prepare("select * from {$table} where id=?");
        $statement->execute($id);

        return $statement->fetchObject();
    }

    /**
     * @param array $parameters
     * @param $table
     */
    public function insertItem(array $parameters, $table) {
        $query = sprintf(
          'insert into %s (%s) values (%s)',
          $table,
          implode(', ', array_keys($parameters)),
          ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->db->prepare($query);
            $statement->execute($parameters);
        } catch (\PDOException $e) {
            die('Whoops, something went wrong.');
        }
    }

    /**
     * @param $id
     * @param array $parameters
     * @param $table
     */
    public function updateItemById($id, array $parameters, $table) {

        $attrs = [];
        foreach ($parameters as $key => $parameter) {
            $attrs[] = $key . '=:' . $key;
        }

        $query = "update {$table} SET " . implode(', ', $attrs). " WHERE id={$id}";

        try {
            $statement = $this->db->prepare($query);
            $statement->execute($parameters);
        } catch (\PDOException $e) {
            die('Whoops, something went wrong.');
        }
    }

    /**
     * @param $id
     * @param $table
     */
    public function deleteItemByID($id, $table) {
        try {
            $statement =$this->db->prepare("delete from {$table} where id=?");
            $statement->execute([$id]);
        } catch (\PDOException $e) {
            die('Whoops, something went wrong.');
        }
    }

    /**
     * @param $parameter
     * @param $table
     * @return array
     */
    public function searchItems($parameter, $table) {
        $sql = " SELECT * FROM {$table} WHERE first_name like '%".$parameter."%' 
            OR last_name like '%".$parameter."%' 
            OR prefix_name like '%".$parameter."%'
            OR email like '%".$parameter."%'
            OR phone like '%".$parameter."%'
            OR salary like '%".$parameter."%'";

        $statement = $this->db->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }
}