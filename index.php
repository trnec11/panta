<?php

require 'vendor/autoload.php';
use App\Model\Connection;
use App\Model\WorkPosition;

$db = new Connection();
$workPosition = new WorkPosition($db);
$data = $workPosition->getWorkPositions();
$stop = 5;