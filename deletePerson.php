<?php

require 'vendor/autoload.php';

use App\Controller\PersonController;

$parameters = [];

foreach ($_POST as $key => $param) {
    $parameters[$key] = $param;
}

if (isset($parameters['id'])) {
    $id = (int)$parameters['id'];
    PersonController::deleteIndex($id);
}