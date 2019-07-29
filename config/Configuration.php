<?php

namespace Config;

class Configuration
{
    public static $host = 'mysql:host=192.168.0.87;port=4000;dbname=cm';
    public static $user = 'admin';
    public static $password = 'secret';
    public static $dbName = 'cm';
    public static $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING];
}