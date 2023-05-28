<?php

require __DIR__ . '/vendor/autoload.php';

$contactBuilder = new \App\ContactBuilder();

$newContact = $contactBuilder->setName('John')->setEmail('test@gmail.com')->build();

echo "<pre>";
var_dump($newContact);
echo "</pre>";