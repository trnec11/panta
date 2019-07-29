<?php

namespace App\Model;

class WorkPosition
{
    /**
     * @var string
     */
    private $table = 'work_positions';
    /**
     * @var QueryBuilder
     */
    private $query;

    /**
     * WorkPosition constructor.
     * @param QueryBuilder $query
     */
    public function __construct(QueryBuilder $query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getWorkPositions() {
        return $this->query->getList($this->table);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getWorkPosition($id) {
        return $this->query->getItemById($id, $this->table);
    }

    /**
     * @param $parameters
     */
    public function insertWorkPosition($parameters) {
        $this->query->insertItem($parameters, $this->table);
    }

    /**
     * @param $id
     * @param $parameters
     */
    public function updateWorkPosition($id, $parameters) {
        $this->query->updateItemById($id, $parameters, $this->table);
    }

    /**
     * @param $id
     */
    public function deleteWorkPosition($id) {
        $this->query->deleteItemByID($id, $this->table);
    }
}