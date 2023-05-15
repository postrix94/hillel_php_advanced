<?php
require __DIR__ . '/vendor/autoload.php';

use App\User;

getInformationClass(User::class);

function getInformationClass($className) {
    $classInformation = ['public' => [
        "properties" => [],
        "methods" => [],
    ], 'protected' => [
        "properties" => [],
        "methods" => [],
    ], 'private' => [
        "properties" => [],
        "methods" => [],
    ]];

    $reflector = new ReflectionClass($className);
    $methods = $reflector->getMethods();
    $properties = $reflector->getProperties();


   foreach ($properties as $property) {
       if($property->isPublic()) {
           array_push($classInformation['public']['properties'],getInformationProperty($property));
       }

       if($property->isProtected()) {
          array_push($classInformation['protected']['properties'],getInformationProperty($property));
       }

       if($property->isPrivate()) {
           array_push($classInformation['private']['properties'],getInformationProperty($property));
       }

   }

    foreach ($methods as $method) {
        if($method->isPublic()) {
           array_push($classInformation['public']['methods'],getInformationMethod($method));


        }

        if($method->isProtected()) {
            array_push($classInformation['protected']['methods'],getInformationMethod($method));

        }

        if($method->isPrivate()) {
            array_push($classInformation['private']['methods'],getInformationMethod($method));

        }

    }


    dd($classInformation);


}

function getInformationProperty($property) {
    return ['name' => $property->getName(), 'type' => $property->getType()->getName(),];

}

function getInformationMethod($method) {

    return ['name' => $method->getName(), 'args' =>  getInformationParametrsMethod($method->getParameters())];

}

function getInformationParametrsMethod($args) {
    $argsInformation = [];

    foreach ($args as $arg) {
        $argsInformation['name'] = $arg->getName();
        $argsInformation['type'] = $arg->getType()->getName();
    }

    return $argsInformation;
}

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit;
}