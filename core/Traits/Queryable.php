<?php

namespace Core\Traits;

use Core\DB;
use PDO;

trait Queryable
{
    static protected string|null $tableName = null;

    static protected string $query = "";

    protected array $commands = [];

    static public function select(array $columns = ["*"]):static {
        static::resetQuery();
        static::$query = "SELECT " . implode(", ", $columns) . " FROM ". static::getTableName();

        $obj = new static();
        $obj->commands[] = "select";

        return $obj;
    }

    static public function find(int $id): static|bool
    {
        $query = Db::connect()->prepare("SELECT * FROM " . static::$tableName . " WHERE id = :id");
        $query->execute(['id'=> $id]);

        return $query->fetchObject(static::class);
    }

    static public function findBy(string $column, $value): static|bool
    {
        $query = Db::connect()->prepare("SELECT * FROM " . static::$tableName . " WHERE {$column} = :value");
        $query->execute(['value' => $value]);

        return $query->fetchObject(static::class);
    }


    public function get(): array|bool{
        return DB::connect()->query(static::$query)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    static protected function resetQuery():void {
        static::$query = "";
    }
}