<?php


namespace App\Controller;


use App\Model\Connection;
use App\Model\Person;
use App\Model\QueryBuilder;

class PersonController
{
    /**
     * @param string $parameter
     * @return mixed
     */
    public static function getIndex($parameter = '') {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $person = new Person($queryBuilder);

        if (!empty($parameter)) {
            session_start();

            header('Location: person.php');
            $_SESSION = $person->searchPerson($parameter);

            return $_SESSION;
        }

        $_SESSION = null;
        header('Location: person.php');
        return $person->getPersons();
    }

    /**
     * @param $parameters
     */
    public static function postIndex($parameters) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $person = new Person($queryBuilder);

        $person->insertPerson($parameters);

        header('Location: person.php');
    }

    /**
     * @param $parameters
     */
    public static function putIndex($parameters) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $workPosition = new Person($queryBuilder);
        $id = (int)$parameters['id'];
        unset($parameters['id']);

        $workPosition->updatePerson($id, $parameters);

        header('Location: person.php');
    }

    /**
     * @param $id
     */
    public static function deleteIndex($id) {
        $db = new Connection();
        $queryBuilder = new QueryBuilder($db);
        $workPosition = new Person($queryBuilder);

        $workPosition->deletePerson($id);

        header('Location: person.php');
    }
}