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
    private $requiredFields = ['first_name', 'last_name', 'prefix_name', 'email', 'phone', 'work_position_id', 'salary'];

    /**
     * @var array
     */
    private $workPositions = [];

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
        $result = [];
        $result['persons'] = $this->query->getList($this->table);
        $this->presetWorkPositions($this->query->getList('work_positions'));
        $result['workPositions'] = $this->workPositions;

        return $result;
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
        if (!empty(array_diff(array_keys($parameters), $this->requiredFields))) {
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

    /**
     * @param array $workPositions
     */
    private function presetWorkPositions(array $workPositions) {
        foreach ($workPositions as $workPosition) {
            $this->workPositions[$workPosition->id] = $workPosition->title;
        }
    }

}