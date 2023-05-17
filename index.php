<?php

require __DIR__ . '/vendor/autoload.php';
use App\Logger;

$withDataAndDetails = new \App\Format\WithDataAndDetails();
$email = new \App\Delivery\Email();


$logger = new Logger($withDataAndDetails, $email);
$logger->log('String Format');
