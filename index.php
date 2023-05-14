<?php

require __DIR__ . '/vendor/autoload.php';
use App\Logger;

$logger = new Logger('raw', 'by_sms');
$logger->log('Emergency error! Please fix me!');