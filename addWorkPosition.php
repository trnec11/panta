<?php

require 'vendor/autoload.php';

use App\Controller\WorkPositionController;

//$parameters = [
//    'title' => isset($_POST['title']) ? $_POST['title'] : '',
//    'salary' => isset($_POST['salary']) ? $_POST['salary'] : ''
//];
//
//if (isset($_POST['title'])) {
//    $parameters['title'] = $_POST['title'];
//}

$parameters = [];

foreach ($_POST as $key => $param) {
    $parameters[$key] = $param;
}

WorkPositionController::postIndex($parameters);