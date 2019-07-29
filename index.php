<?php

require 'vendor/autoload.php';
use App\Model\Database;
use App\Model\WorkPosition;

$db = new Database();
$workPosition = new WorkPosition($db);
$data = $workPosition->getWorkPositions();
$stop = 5;