<?php

namespace App;

use App\Traits\TUserMagicMethod;

class User
{
    use TUserMagicMethod;

    private int $age;
    private string $name;
    private string $email;

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAll(): void

    {
        echo "</br>";
        echo $this->name ?? "Имя не установлено";
        echo "</br>";
        echo $this->age ?? "Возраст не установлен";
        echo "</br>";
        echo $this->email ?? "Почта не установлена";
        echo "</br>";
    }
}