<?php

require 'vendor/autoload.php';

use App\Controller\PersonController;

$parameters = [
    'prefix_name' => $_POST['prefix_name'],
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'work_position_id' => $_POST['work_position_id'],
    'salary' => $_POST['salary'],
];

PersonController::postIndex($parameters);