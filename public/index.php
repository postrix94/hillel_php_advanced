<?php
require_once dirname(__DIR__) . "/config/constans.php";
require_once BASE_DIR . "/vendor/autoload.php";
use Core\DB;


try {
    if(!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    DB::connect();
}catch (PDOException $error) {
    echo "PDO Exception {$error->getMessage()}";
    exit;
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}

echo "Connection DB success";
