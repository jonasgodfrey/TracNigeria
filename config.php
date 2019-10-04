<?php

require_once './vendor/autoload.php';

use Doctrine\Common;
use Doctrine\DBAL;

$config = new \Doctrine\DBAL\Configuration();
//..
/*
$connectionParams = array(
    'dbname' => 'bribe',
    'user' => 'el',
    'password' => 'ifeoluwa',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);*/

$connectionParams = array(
    'dbname' => 'tracnigeria',
    'user' => 'tracnigeria',
    'password' => 'password2018',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);


$qb = $conn->createQueryBuilder();
?>