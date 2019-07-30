<?php

require 'vendor/autoload.php';

use App\Controller\WorkPositionController;

$parameters = [];

foreach ($_POST as $key => $param) {
    $parameters[$key] = $param;
}

if (isset($parameters['id'])) {
    $id = (int)$parameters['id'];
    WorkPositionController::deleteIndex($id);
}