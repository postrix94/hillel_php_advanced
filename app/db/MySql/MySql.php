<?php

namespace App\Db\MySql;

use App\Db\Interfaces\IDatabase;

class MySql implements IDatabase
{
    public function getData():string
    {
        return 'some data from database mysql';
    }
}