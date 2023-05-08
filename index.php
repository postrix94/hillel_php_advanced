<?php
require __DIR__ . '/vendor/autoload.php';

use App\User;

$user = new User();
try {
    $user->setName( "Dima");
    $user->setAge(4);
    $user->setEmail("test@gmail.com");
    $user->getAll();
    $user->setTest();


}catch (ErrorException $error) {
    echo $error->getMessage();
}

