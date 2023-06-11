<?php

use Core\DB;

require_once dirname(dirname(__DIR__)) . "/config/constans.php";
require_once BASE_DIR . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

class Migration {
    const SCRIPTS_DIR = __DIR__ . '/scripts/';
    const MIGRATIONS_FILE = '0_migrations.sql';
    const MIGRATIONS_TABLE = 'migrations';

    private PDO $db;

    public function __construct() {
        $this->db =  DB::connect();

        try {
            $this->db->beginTransaction();

            $this->createMigrationTable();
            $this->runAllMigrations();

            if($this->db->inTransaction()) {
                $this->db->commit();
            }

        }catch (PDOException $error) {
            if($this->db->inTransaction()) {
                $this->db->rollBack();
            }

            echo("Error migration: " . $error->getMessage() . PHP_EOL);
            var_dump($error->getTrace());
            exit;
        }
    }

    protected function createMigrationTable():void {

        if($this->isExistsMigrationTable()) return;

        $fileName = static::SCRIPTS_DIR . static::MIGRATIONS_FILE;

        $this->checkFileExists($fileName);

        $sql = file_get_contents($fileName);

        $query = $this->db->prepare($sql);

        $message = $query->execute()
            ? "Таблица: " . self::MIGRATIONS_TABLE . " создана" . PHP_EOL
            : "Ошибка таблица: " .self::MIGRATIONS_TABLE . " не создана..." . PHP_EOL;

        echo($message);
    }

    protected function runAllMigrations():void {
        $migrations = scandir(self::SCRIPTS_DIR);
        $migrations = array_values(
            array_diff(
                $migrations, ['.', '..', static::MIGRATIONS_FILE]
            )
        );

       foreach($migrations as $migration) {

            if(!$this->checkIfMigrationWasRun($migration)) {
                $filePath = static::SCRIPTS_DIR . $migration;
                $this->checkFileExists($filePath);

                $sql = file_get_contents($filePath);
                $query = $this->db->prepare($sql);

                if($query->execute()) {
                    $this->saveSuccessMigration($migration);
                    echo("Миграция: {$migration} выполнена!" . PHP_EOL) ;
                }

            }else {
                continue;
            }
        }

       echo("Миграции выполнены!" . PHP_EOL) ;
    }

    protected function checkFileExists(string $filename):void {
        $isExistsFile = file_exists($filename);

        if(!$isExistsFile) throw new ErrorException("Файл " . $filename . " не найден\n");
    }

    protected function isExistsMigrationTable():bool {
        $tableName = self::MIGRATIONS_TABLE;
        $sql = "SHOW tables WHERE `Tables_in_notes`='$tableName';";

        $query = $this->db->prepare($sql);

        if(!$query->execute()) {
            throw new Exception("Migration->isExistsTable");
        }

        return (bool) $query->fetchColumn();
    }

    protected function checkIfMigrationWasRun(string $migration):bool {
        $tableName = self::MIGRATIONS_TABLE;
        $sql = "SELECT * FROM `${tableName}` WHERE name = :name";
        $query = $this->db->prepare($sql);
        $query->execute(['name' => $migration]);

        return (bool) $query->fetchColumn();
    }

    protected function saveSuccessMigration(string $migration): void {
        $tableName = self::MIGRATIONS_TABLE;
        $sql = "INSERT INTO {$tableName} (name) VALUES (:name)";
        $this->db->prepare($sql)->execute(['name' => $migration]);
    }
}

new Migration();