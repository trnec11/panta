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
    public $options;

    private function setConfig()
    {
        $this->host = Configuration::$host;
        $this->user = Configuration::$user;
        $this->password = Configuration::$password;
        $this->options = Configuration::$options;
    }

    public function makeConnection() {

        $this->setConfig();

        try {
            return new PDO($this->host, $this->user, $this->password, $this->options);
        } catch (PDOException $e) {
            die('Whoops, something went wrong.');
        }
    }
}