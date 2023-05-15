<?php
require __DIR__ . '/vendor/autoload.php';

use App\User;

dd(getInformationClass(User::class));

function getInformationClass($className)
{
    $classInformation = ['public' => [], 'protected' => [], 'private' => []];

    $reflector = new ReflectionClass($className);
    $methods = $reflector->getMethods();
    $properties = $reflector->getProperties();

    addInformationProperties($properties,$classInformation);
    addInformationMethods($methods, $classInformation);

    return $classInformation;

}

function addInformationProperties($properties, &$classInformation) {
    foreach ($properties as $property) {
        if ($property->isPublic()) {
            if (key_exists('properties', $classInformation['public'])) {
                array_push($classInformation['public']['properties'], getInformationProperty($property));
            } else {
                $classInformation['public']['properties'] = [];
                array_push($classInformation['public']['properties'], getInformationProperty($property));
            }
        }

        if ($property->isProtected()) {
            if (key_exists('properties', $classInformation['protected'])) {
                array_push($classInformation['protected']['properties'], getInformationProperty($property));
            } else {
                $classInformation['protected']['properties'] = [];
                array_push($classInformation['protected']['properties'], getInformationProperty($property));
            }
        }

        if ($property->isPrivate()) {
            if (key_exists('properties', $classInformation['private'])) {
                array_push($classInformation['private']['properties'], getInformationProperty($property));
            } else {
                $classInformation['private']['properties'] = [];
                array_push($classInformation['private']['properties'], getInformationProperty($property));
            }
        }

    }
}

function addInformationMethods($methods, &$classInformation) {
    foreach ($methods as $method) {
        if ($method->isPublic()) {
            if (key_exists('methods', $classInformation['public'])) {
                array_push($classInformation['public']['methods'], getInformationMethod($method));
            } else {
                $classInformation['public']['methods'] = [];
                array_push($classInformation['public']['methods'], getInformationMethod($method));
            }

        }

        if ($method->isProtected()) {
            if (key_exists('methods', $classInformation['protected'])) {
                array_push($classInformation['protected']['methods'], getInformationMethod($method));
            } else {
                $classInformation['protected']['methods'] = [];
                array_push($classInformation['protected']['methods'], getInformationMethod($method));
            }

        }

        if ($method->isPrivate()) {
            if (key_exists('methods', $classInformation['private'])) {
                array_push($classInformation['private']['methods'], getInformationMethod($method));
            } else {
                $classInformation['private']['methods'] = [];
                array_push($classInformation['private']['methods'], getInformationMethod($method));
            }

        }

    }
}

function getInformationProperty($property)
{
    return ['name' => $property->getName(), 'type' => $property->getType()->getName(),];
}

function getInformationMethod($method)
{
    return ['name' => $method->getName(), 'args' => getInformationParametrsMethod($method->getParameters())];
}

function getInformationParametrsMethod($args)
{
    $argsInformation = [];

    foreach ($args as $arg) {
        array_push($argsInformation, ['name' => $arg->getName(), 'type' => $arg->getType()->getName()]);
    }

    return $argsInformation;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit;
}