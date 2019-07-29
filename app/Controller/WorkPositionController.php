<?php


namespace App\Controller;


use App\Model\Connection;
use App\Model\QueryBuilder;
use App\Model\WorkPosition;

class WorkPositionController
{
    public static function getIndex() {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $person = new WorkPosition($queryBuilder);

        return $person->getWorkPositions();
    }
}