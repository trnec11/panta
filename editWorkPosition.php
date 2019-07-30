<?php

require 'vendor/autoload.php';

use App\Controller\WorkPositionController;

$parameters = [];

foreach ($_POST as $key => $param) {
    $parameters[$key] = $param;
}

WorkPositionController::putIndex($parameters);