<?php
error_reporting(E_ALL);

require_once dirname(__DIR__) . "/config/constans.php";
require_once BASE_DIR . "/vendor/autoload.php";

use App\Models\User;
use Core\DB;
use Core\Exception\QueryableException;

try {
    if(!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    DB::connect();

    echo phpinfo();

}catch (PDOException $error) {
    showErrorMessage($error);
} catch (QueryableException $error) {
    showErrorMessage($error);
} catch (Exception $error) {
    showErrorMessage($error);

}


