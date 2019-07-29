<?php

namespace App\Model;

class WorkPosition
{
    public $table = 'work_positions';
    /**
     * @var Connection
     */
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db->makeConnection();
    }

    /**
     * @return mixed
     */
    public function getWorkPositions() {
        $pdo = $this->db;
        $statement = $pdo->prepare('SELECT * FROM work_positions');
        $statement->execute();

        return print_r($statement->fetchAll());
    }
}