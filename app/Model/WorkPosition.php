<?php

namespace App\Model;

class WorkPosition
{
    public $table = 'work_positions';
    /**
     * @var Database
     */
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getConnection();
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