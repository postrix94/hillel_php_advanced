<?php

require __DIR__ . '/vendor/autoload.php';

$contactBuilder = new \App\ContactBuilder();

$newContact = $contactBuilder->name('John')->email('test@gmail.com')->build();

echo "<pre>";
var_dump($newContact);
echo "</pre>";