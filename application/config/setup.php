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
    `date` TIMESTAMP NOT NULL ,
    `user_id` INT UNSIGNED NOT NULL,
    `published` BOOL DEFAULT FALSE,
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    PRIMARY KEY (`photo_id`), UNIQUE (`name`));");


$dbh->upsert(
    "CREATE TABLE IF NOT EXISTS `comments` (
    `comment_id` INT NOT NULL AUTO_INCREMENT ,
    `author` VARCHAR(32),
    `date` TIMESTAMP NOT NULL ,
    `photo_id` INT NOT NULL,
    `text_comment` TEXT, 
    FOREIGN KEY (`author`) REFERENCES `users` (`login`)
        ON UPDATE CASCADE ,
    FOREIGN KEY (`photo_id`) REFERENCES `images` (`photo_id`)
        ON DELETE CASCADE,
    PRIMARY KEY (`comment_id`))
    ");

$dbh->upsert(
    "CREATE TABLE IF NOT EXISTS likes (
				user_id		INT UNSIGNED,
				image_id	INT,
				PRIMARY KEY (user_id, image_id),
				FOREIGN KEY (user_id) REFERENCES `users`(`id`)
					ON DELETE CASCADE,
				FOREIGN KEY (image_id) REFERENCES images(photo_id)
					ON DELETE CASCADE
			)"
);
//phpinfo();