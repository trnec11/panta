<?php

require 'vendor/autoload.php';
use App\Model\Connection;
use App\Model\WorkPosition;
use App\Model\QueryBuilder;

$db = new Connection();
$queryBuilder = new QueryBuilder($db);
$workPosition = new WorkPosition($queryBuilder);
$data = $workPosition->getWorkPositions();
$stop = 5;