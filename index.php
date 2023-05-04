<?php
require __DIR__ . '/vendor/autoload.php';

use \App\RGB;

$red = new RGB(255,0,0);
$green = new RGB(0,128,0);
$randomColor = RGB::random();
$mixedColor = $red->mix($green);
$isEqualsColor = $red->equals($green);

