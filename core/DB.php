<?php

namespace Core;

use PDO;

final class DB
{
    protected static PDO|null $connect = null;

    protected const OPTIONS =  [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    private function __construct() {}
    private function __clone() {}

    public static function  connect(): PDO {
        if(is_null(self::$connect)) {
            $dbUser = config('db.user');
            $dbPassword = config('db.password');

            self::$connect = new PDO(self::getDSN(),$dbUser,$dbPassword ,options:self::OPTIONS);
        }

        return self::$connect;
    }

    protected static function getDSN():string {
            $dbPrefix = config('db.prefix');
            $dbHost = config('db.host');
            $dbName = config('db.name');

            return "{$dbPrefix}:host={$dbHost};dbname={$dbName}";
    }

}