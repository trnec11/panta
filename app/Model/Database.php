<?php


namespace App\Model;
use PDO;
use PDOException;


class Database
{

    /**
     * @var string
     */
    private $host = 'mysql:host=192.168.0.87;port=4000;dbname=cm';
    private $user = 'admin';
    private $password = 'secret';


    public function getConnection() {
        try {
            return new PDO($this->host, $this->user, $this->password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


}