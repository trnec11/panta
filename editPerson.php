<?php

require 'vendor/autoload.php';

use App\Controller\PersonController;

$parameters = [];

foreach ($_POST as $key => $param) {
    $parameters[$key] = $param;
}

PersonController::putIndex($parameters);