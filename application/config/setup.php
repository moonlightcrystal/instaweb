<?php
require_once dirname(__FILE__) . "/../core/pdo.php";
date_default_timezone_set('Europe/Moscow');

$dbh = new createPdo();

$dbh->upsert("CREATE DATABASE IF NOT EXISTS camagru");
echo "Database created successfully :3 <br>";

$dbh->upsert("CREATE TABLE IF NOT EXISTS users
(
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
    login VARCHAR(32) NOT NULL UNIQUE ,
    email VARCHAR(128) NOT NULL UNIQUE ,
    avatar VARCHAR(128) UNIQUE ,
    password VARCHAR(255) NOT NULL);");

$dbh->upsert(
    "CREATE TABLE IF NOT EXISTS `images` ( 
    `photo_id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(77) NOT NULL , 
    `likes` INT DEFAULT 0, 
    `date` TIMESTAMP NOT NULL ,
    `login` VARCHAR(32) NOT NULL,
    `title` VARCHAR(255),
    `published` BOOL DEFAULT FALSE,
    FOREIGN KEY (`login`) REFERENCES `users` (`login`),
    PRIMARY KEY (`photo_id`), UNIQUE (`name`));");


$dbh->upsert(
    "CREATE TABLE IF NOT EXISTS `comments` (
    `comment_id` INT NOT NULL AUTO_INCREMENT ,
    `author` VARCHAR(32),
    `date` TIMESTAMP NOT NULL ,
    `photo_id` INT NOT NULL,
    FOREIGN KEY (`author`) REFERENCES `users` (`login`),
    FOREIGN KEY (`photo_id`) REFERENCES `images` (`photo_id`),
    PRIMARY KEY (`comment_id`));");

//phpinfo();