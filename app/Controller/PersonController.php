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
}