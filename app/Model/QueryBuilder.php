<?php


namespace App\Model;



class QueryBuilder
{
    private $db;
    private $columnString;
    private $columnCountString;
    private $updateColumnString;

    public function __construct(Connection $db)
    {
        $this->db = $db->makeConnection();
    }

    private function getTableColumns($table) {
        $statement = $this->db->prepare("describe {$table}");
        $statement->execute();

        $items = $statement->fetchAll(\PDO::FETCH_COLUMN);
        unset($items['id']);

        $this->columnString = implode(', ', $items);
        $specialChars = array_map(function ($item) {
            return '?';
        }, $items);
        $specialChars2 = array_map(function ($item) {
            return '?';
        }, $items);

        $this->columnCountString = implode(', ', $specialChars);
        $this->updateColumnString =
    }

    /**
     * @param $table
     * @return mixed
     */
    public function getList($table) {
        $this->getTableColumns($table);
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

    public function insertItem(array $data, $table) {
        $this->getTableColumns($table);
        $statement = $this->db->prepare("insert into {$table} ({$this->columnString}) values ({$this->columnCountString})");
        $statement->execute($data);
    }

    public function updateItemById(array $data, $table) {
        $this->getTableColumns($table);
        $statement = $this->db->prepare("update {$table} set name=?, surname=?, sex=? where id=?");
        $statement->execute($data);
    }

    /**
     * @param $id
     * @param $table
     */
    public function deleteItemByID($id, $table) {
        $statement =$this->db->prepare("delete from {$table} where id=?");
        $statement->execute($id);
    }
}