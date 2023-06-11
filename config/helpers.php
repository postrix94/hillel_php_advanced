<?php

use Config\Config;

function config(string $name): string|null {
    return Config::get($name);
}

function showErrorMessage(Exception $error):void {
    echo $error->getMessage() . "<br>";
    echo $error->getTraceAsString() . "<br>";
    echo($error->getFile() . " ON LINE " . $error->getLine());
    exit;
}