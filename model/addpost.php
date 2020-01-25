<?php

session_start();
require_once 'connection.php';
setlocale(LC_ALL, 'ru_RU.UTF-8');
date_default_timezone_set( 'Europe/Moscow' );

function uploadImg($image)
{
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;

    move_uploaded_file($image['tmp_name'], '../uploads/' . $filename);

    return $filename;
}

function addPost($filename, $login, $title, $dbh)
{
    $sql =
        "INSERT INTO `images` (`name`, `date`, `login`, `title`) VALUES (
    :name,
    FROM_UNIXTIME(:date),
    (SELECT `login` from `users` WHERE `users`.`login` = :login),
    :title)";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":date", time());
    $statement->bindParam(":name", $filename);
    $statement->bindParam(":login", $login);
    $statement->execute();
}


function showPost($dbh)
{
    $sql = "SELECT * FROM `images`";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

