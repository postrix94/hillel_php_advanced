<?php

require __DIR__ . '/vendor/autoload.php';

use App\Controller;
use App\Db\MySql\MySql;


$controller = new Controller(new MySql());

echo $controller->getData();
