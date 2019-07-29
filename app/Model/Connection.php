<?php


namespace App\Model;

use Config\Configuration;
use PDO;
use PDOException;


class Connection
{

    /**
     * @var string
     */
    private $host;
    private $user;
    private $password;
    public $dbName;

    private function setConfig()
    {
        $this->host = Configuration::$host;
        $this->user = Configuration::$user;
        $this->password = Configuration::$password;
    }

    public function makeConnection() {

        $this->setConfig();

        try {
            return new PDO($this->host, $this->user, $this->password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}