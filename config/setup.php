<?php
include 'database.php';
include '../connection.php';
//try {
//    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $opt);
//    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
//    $dbh->exec($sql);
//    echo "Database created successfully :3 <br>";
//}catch(PDOException $e) {
//   echo "Error with creating db: " . $e->getMessage() . ":(<br/>";
//}

$sql = "CREATE DATABASE IF NOT EXISTS camagru";
$dbh->exec($sql);
echo "Database created successfully :3 <br>";

$dbh->query("CREATE TABLE IF NOT EXISTS users
(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    login VARCHAR(32) NOT NULL UNIQUE ,
    email VARCHAR(128) UNIQUE ,
    password VARCHAR(255) NOT NULL);");



//phpinfo();