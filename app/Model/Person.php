<?php


namespace App\Model;


class Person
{
    /**
     * @var string
     */
    private $table = 'persons';
    /**
     * @var QueryBuilder
     */
    private $query;

    /**
     * Person constructor.
     * @param QueryBuilder $query
     */
    public function __construct(QueryBuilder $query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getPersons() {
        return $this->query->getList($this->table);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPerson($id) {
        return $this->query->getItemById($id, $this->table);
    }

    /**
     * @param $parameters
     */
    public function insertPerson($parameters) {
        $this->query->insertItem($parameters, $this->table);
    }

    /**
     * @param $id
     * @param $parameters
     */
    public function updatePerson($id, $parameters) {
        $this->query->updateItemById($id, $parameters, $this->table);
    }

    /**
     * @param $id
     */
    public function deletePerson($id) {
        $this->query->deleteItemByID($id, $this->table);
    }

}