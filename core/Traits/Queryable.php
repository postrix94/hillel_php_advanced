<?php

namespace Core\Traits;

use Core\DB;
use Core\Exception\QueryableException;
use PDO;

trait Queryable
{
    static protected string|null $tableName = null;

    static protected string $query = "";

    protected array $commands = [];

    protected array $allowedMethodsForWhere = ['limit', 'group', 'order', 'having'];

    protected array $allowedMethodsForOrder = ['select'];

    static public function select(array $columns): static
    {
        static::resetQuery();
        static::$query = "SELECT " . implode(", ", $columns) . " FROM " . static::getTableName() . " ";

        $obj = new static();
        $obj->commands[] = "select";

        return $obj;
    }

    static public function selectAll(): static
    {
        static::resetQuery();
        static::$query = "SELECT * FROM " . static::getTableName() . " ";

        $obj = new static();
        $obj->commands[] = "select";

        return $obj;
    }

    static public function find(int $id): static|bool
    {
        $query = Db::connect()->prepare("SELECT * FROM " . static::$tableName . " WHERE id = :id");
        $query->execute(['id' => $id]);

        return $query->fetchObject(static::class);
    }

    static public function findBy(string $column, $value): static|bool
    {
        $query = Db::connect()->prepare("SELECT * FROM " . static::$tableName . " WHERE {$column} = :value");
        $query->execute(['value' => $value]);

        return $query->fetchObject(static::class);
    }

    static public function create(array $fields): int
    {
        $params = static::prepareQueryParams($fields);

        $query = "INSERT INTO " . static::getTableName() . "({$params['keys']}) VALUES ({$params['placeholders']})";

        $query = Db::connect()->prepare($query);
        $query->execute($fields);

        return (int)Db::connect()->lastInsertId();
    }

    static protected function prepareQueryParams(array $fields): array
    {
        $keys = array_keys($fields);
        $placeholders = preg_filter('/^/', ':', $keys);

        return [
            "keys" => implode(', ', $keys),
            "placeholders" => implode(', ', $placeholders),

        ];
    }

    static protected function resetQuery(): void
    {
        static::$query = "";
    }

    public function where(string $column, $value, string $operator = "="): static
    {

        if ($this->prevent($this->allowedMethodsForWhere)) {
            throw new QueryableException("WHERE can not be after: " . implode(', ', $this->allowedMethodsForWhere));
        }

        $obj = in_array('select', $this->commands) ? $this : static::select();

        if (!in_array('where', $this->commands)) {
            static::$query .= "WHERE ";
        }

        static::$query .= "{$column} {$operator} {$this->addQuotesToString($value)} ";
        $obj->commands[] = "where";

        return $obj;
    }

    public function andWhere(string $column, $value, string $operator = "="): static
    {
        static::$query .= "AND ";
        return $this->where($column, $value, $operator);
    }

    public function orWhere(string $column, $value, string $operator = "="): static
    {
        static::$query .= "OR ";
        return $this->where($column, $value, $operator);
    }

    public function orderBy(string $column, string $sqlOrder = "ASC"): static
    {
        if (!$this->prevent($this->allowedMethodsForOrder)) {
            throw new QueryableException("ORDER BY can not be before: " . implode(', ', $this->allowedMethodsForOrder));
        }

        $this->commands[] = 'order';
        self::$query .= "ORDER BY {$column} {$sqlOrder} ";
        return $this;
    }

    public function update(array $fields): bool
    {
        $query = "UPDATE " . static::getTableName() . " SET" . $this->updatePlaceholders(array_keys($fields)) . " WHERE id = :id";
        $query = Db::connect()->prepare($query);
        $fields['id'] = $this->id;

        return $query->execute($fields);
    }

    public function destroy(): bool
    {
        $query = "DELETE FROM " . static::getTableName() . " WHERE id = :id";
        $query = Db::connect()->prepare($query);
        return $query->execute([':id' => $this->id]);
    }

    protected function updatePlaceholders(array $keys): string
    {
        $string = "";
        $lastKey = array_key_last($keys);

        foreach ($keys as $index => $key) {
            $string .= " {$key}=:{$key}" . ($lastKey === $index ? '' : ',');
        }

        return $string;
    }

    protected function prevent(array $allowedMethods): bool
    {
        foreach ($allowedMethods as $method) {
            if (in_array($method, $this->commands)) {
                return true;
            }
        }

        return false;
    }

    public function get(): array|bool
    {
        $query = static::$query;
        static::resetQuery();
        return DB::connect()->query($query)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public function getQuery(): string
    {
        return static::$query;
    }

    protected function addQuotesToString($value): mixed
    {
        return is_string($value) ? "'$value'" : $value;
    }
}