<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ ); // Replace __DIR__ with the path to your .env file
$dotenv->load();

/*
|--------------------------------------------------------------------------
| Include and run the application
|--------------------------------------------------------------------------
*/
require __DIR__ . '/app/index.php';
$currentDateTime = new \DateTime();

//var_dump($currentDateTime->format('Y-m-d h:m')); exit;

$calculatedDeliveries = getDeliveriesData('source1', 'target1', 2.5, '2023-10-19 19:10:00', 1.2);

var_dump(json_decode($calculatedDeliveries, true));