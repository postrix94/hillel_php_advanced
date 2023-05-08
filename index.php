<?php
require __DIR__ . '/vendor/autoload.php';

use App\User;

$user = new User();
try {
    $user->setName( "Dima");
    $user->setAge(4);
    $user->getAll();
    $user->setEmail();

}catch (ErrorException $error) {
    echo $error->getMessage();
}

