<?php

namespace App;

class User
{
    public int $age = 20;
    public string $name = "John";
    public string $surname = "Doe";
    private float $money = 10.5;

    public function setName(string $name)
    {
    }

    protected function isMoney()
    {
    }

    private function printInformation(int $age, string $name, string $surname)
    {

    }
}