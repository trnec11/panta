<?php

require 'vendor/autoload.php';

use App\Controller\WorkPositionController;

$parameters = [
    'title' => $_POST['title'],
    'salary' => $_POST['salary']
];

WorkPositionController::postIndex($parameters);