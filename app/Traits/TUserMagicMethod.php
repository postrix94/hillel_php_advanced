<?php

namespace App\Traits;

trait TUserMagicMethod
{
    public function __call(string $methodName, array $values)
    {
        if (!method_exists($this, $methodName)) {
            throw new \ErrorException("Method - '{$methodName}' no exist");
        }

        $this->existValue(...$values);

        $this->$methodName(...$values);
    }


    private function existValue($value = null): void {
        if(is_null($value)) {
            throw new \ErrorException("Передайте значение, чтобы установить имя или возраст!");
        }
    }

    }