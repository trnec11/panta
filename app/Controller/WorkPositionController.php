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
        $workPosition = new WorkPosition($queryBuilder);

        return $workPosition->getWorkPositions();
    }

    public static function postIndex($parameters) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $workPosition = new WorkPosition($queryBuilder);

        $workPosition->insertWorkPosition($parameters);

        header('Location: index.php');
    }

    public static function putIndex($parameters) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $workPosition = new WorkPosition($queryBuilder);
        $id = (int)$parameters['id'];
        unset($parameters['id']);

        $workPosition->updateWorkPosition($id, $parameters);

        header('Location: index.php');
    }

    public static function deleteIndex($id) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $workPosition = new WorkPosition($queryBuilder);

        $workPosition->deleteWorkPosition($id);

        header('Location: index.php');
    }
}