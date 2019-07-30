<?php


namespace App\Controller;


use App\Model\Connection;
use App\Model\Person;
use App\Model\QueryBuilder;

class PersonController
{
    public static function getIndex() {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $person = new Person($queryBuilder);

        return $person->getPersons();
    }

    public static function postIndex($parameters) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $person = new Person($queryBuilder);

        $person->insertPerson($parameters);

        header('Location: person.php');
    }

    public static function putIndex($parameters) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $workPosition = new Person($queryBuilder);
        $id = (int)$parameters['id'];
        unset($parameters['id']);

        $workPosition->updatePerson($id, $parameters);

        header('Location: person.php');
    }

    public static function deleteIndex($id) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $workPosition = new Person($queryBuilder);

        $workPosition->deletePerson($id);

        header('Location: person.php');
    }
}