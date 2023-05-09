<?php

namespace App;



use App\Traits\ErrorUserMessage;

class User
{
    use ErrorUserMessage;

    private const MAX_LENGTH_PASSWORD  = 8;
    private string $password;
    private int $id;

    public function setPassword(string $password):void {
        if(strlen(trim($password)) > self::MAX_LENGTH_PASSWORD) {
            throw new \Error($this->getMessageErrorPassword(__FILE__, __LINE__));
        }

        $this->password = $password;
    }

    public function setId($id): void {
        if(!is_numeric($id)) {
            throw new \Error($this->getMessageErrorId(__FILE__, __LINE__));
        }

        $this->id = $id;
    }

    public function getUserData(): string {
        if(isset($this->id) && isset($this->password)) {
            $userInfo = "Пароль: {$this->password}" . "<br>";
            $userInfo .= "ID: {$this->id}";

            return $userInfo;
        }

        return "Пароль или ID не установлены!";
    }
}