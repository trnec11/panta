<?php

require 'vendor/autoload.php';

use App\Controller\PersonController;

foreach ($_POST as $key => $param) {
    $parameters[$key] = $param;
}

PersonController::postIndex($parameters);