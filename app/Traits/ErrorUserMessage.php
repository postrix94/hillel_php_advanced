<?php

namespace App\Traits;

trait ErrorUserMessage
{
    protected  function getMessageErrorPassword(string $errorFileName, string $lineError): string {
        $textError = "Пароль должен быть не больше " . self::MAX_LENGTH_PASSWORD . " cимволов.";
        $textError .= " Ошибка в файле {$errorFileName}.";
        $textError .= " На строке {$lineError}.";

        return $textError;
    }

    protected  function getMessageErrorId(string $errorFileName, string $lineError): string {
        $textError = "Id должно быть в числовом формате.";
        $textError .= " Ошибка в файле {$errorFileName}.";
        $textError .= " На строке {$lineError}.";

        return $textError;
    }


}