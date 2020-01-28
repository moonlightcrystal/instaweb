<?php
include 'database.php';
include '../model/connection.php';
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

$dbh->query(
    "CREATE TABLE IF NOT EXISTS `images` ( 
    `photo_id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(77) NOT NULL , 
    `likes` INT, 
    `date` TIMESTAMP NOT NULL ,
    `login` VARCHAR(32) NOT NULL,
    `title` VARCHAR(255), 
    FOREIGN KEY (`login`) REFERENCES `users` (`login`),
    PRIMARY KEY (`photo_id`), UNIQUE (`name`));");


$dbh->query(
    "CREATE TABLE IF NOT EXISTS `comments` (
    `comment_id` INT NOT NULL AUTO_INCREMENT ,
    `author` VARCHAR(32),
    `date` TIMESTAMP NOT NULL ,
    `photo_id` INT NOT NULL,
    FOREIGN KEY (`author`) REFERENCES `users` (`login`),
    FOREIGN KEY (`photo_id`) REFERENCES `images` (`photo_id`),
    PRIMARY KEY (`comment_id`));");

//phpinfo();