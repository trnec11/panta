<?php

require 'vendor/autoload.php';

use App\Controller\PersonController;

$parameters = [
    'prefix_name' => isset($_POST['prefix_name']) ? $_POST['prefix_name'] : '',
    'first_name' => isset($_POST['first_name']) ? $_POST['first_name'] : '',
    'last_name' => isset($_POST['last_name']) ? $_POST['last_name'] : '',
    'email' => isset($_POST['email']) ? $_POST['email'] : '',
    'phone' => isset($_POST['phone']) ? $_POST['phone'] : '',
    'work_position_id' => isset($_POST['work_position_id']) ? $_POST['work_position_id'] : '',
    'salary' => isset($_POST['salary']) ? $_POST['salary'] : '',
];

PersonController::postIndex($parameters);