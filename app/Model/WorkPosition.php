<?php

namespace App\Model;

class WorkPosition
{
    private $table = 'work_positions';
    private $query;

    public function __construct(QueryBuilder $query)
    {
        $this->query = $query;
    }

    public function getWorkPositions() {
        return print_r($this->query->getList($this->table));
    }

    public function updateWorkPosition($workPosition) {

    }
}