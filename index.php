<?php
require_once "./db/settings_db.php";

$DSN = getDSN(dbHost:DB_HOST,dbName: DB_NAME, dbUser: DB_USER, dbPassword: DB_PASSWORD);

try{
    $connDb = new PDO($DSN, options:[PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC]);
}catch (PDOException $e){
    die ("DB Connection Error: <b>{$e->getMessage()}</b>");
}

echo "Connection db_" . DB_NAME .  " Success...";
