<?php

namespace App;

class User
{
    public int $age = 20;
    private string $name = "John";
    private string $surname = "Doe";
    protected float $money = 10.5;

    public function setName(string $name) {}

    protected function isMoney() {}

    private function test(string $value, int $name) {}
}