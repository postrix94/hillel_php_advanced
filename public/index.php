<?php
error_reporting(E_ALL);

if(!session_id()) {
    session_start();
}

require_once dirname(__DIR__) . "/config/constans.php";
require_once BASE_DIR . "/vendor/autoload.php";


use App\Models\User;
use Core\DB;
use Core\Exception\QueryableException;
use Core\Router;

try {
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    if(!preg_match("/assets/i", $_SERVER['REQUEST_URI'])) {
        Router::dispatch($_SERVER['REQUEST_URI']);
    }

}catch (PDOException $error) {
    showErrorMessage($error);
} catch (QueryableException $error) {
    showErrorMessage($error);
} catch (\Core\Exception\ClientErrorException $error) {
    showPageError($error);
} catch (Exception $error) {
    showErrorMessage($error);
}


