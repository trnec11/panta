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

        return $statement->fetchAll();
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
        $query = sprintf('update %s set %s where id = ' . $id, $table,  implode(', ', array_keys($parameters)) . '=' .
            ':' . implode(', :', array_keys($parameters)));

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
}