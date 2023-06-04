<?php
error_reporting(E_ALL);

require_once dirname(__DIR__) . "/config/constans.php";
require_once BASE_DIR . "/vendor/autoload.php";

use App\Models\User;
use Core\DB;

try {
    if(!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    DB::connect();

    var_dump(User::select()->get());

}catch (PDOException $error) {
    echo "PDO Exception {$error->getMessage()}";
    exit;
} catch (Exception $error) {
    echo $error->getMessage();
    exit;
}


