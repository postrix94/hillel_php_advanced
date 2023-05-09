<?php
require __DIR__ . '/vendor/autoload.php';
use App\User;

$user = new User();

try {
    $user->setPassword('123456789');
    $user->setId( '1');
}catch (Error $error) {
    echo $error->getMessage();
}

echo "<br>" . $user->getUserData();