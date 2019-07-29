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
     * @var array
     */
    private $requiredFields = ['first_name', 'last_name', 'prefix_name', 'email', 'phone', 'work_position_id'];

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
        if (!empty(array_diff($parameters, $this->requiredFields))) {
            die('Whoops, something went wrong.');
        }
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