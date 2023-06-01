<?php
const DB_HOST = "postgres";
const DB_NAME = "postgres";
const DB_USER = "postgres";
const DB_PASSWORD = "root12";

function getDSN($prefix = "pgsql",$dbHost = 'localhost', $dbPort = 5432, $dbName = "mysql", $dbUser = "root", $dbPassword = "root"): string {
    return "{$prefix}:host={$dbHost};port={$dbPort};dbname={$dbName};user={$dbUser};password={$dbPassword}";
}