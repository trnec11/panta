<?php

require 'vendor/autoload.php';

use App\Controller\PersonController;

$parameters = [];

if (!isset($_POST['search']) || empty($_POST['search'])) {
    PersonController::getIndex();
} else {
    PersonController::getIndex(trim($_POST['search']));
}
