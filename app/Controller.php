<?php

namespace App;

use App\Db\Interfaces\IDatabase;

class Controller
{
    private IDatabase $adapter;

    public function __construct(IDatabase $db)
    {
        $this->adapter = $db;
    }

    function getData()
    {
       return  $this->adapter->getData();
    }
}