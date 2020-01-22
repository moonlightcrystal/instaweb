<?php
session_start();
require_once 'connection.php';

function uploadImg($image)
{
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;

    move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);

    return $filename;
}

$filename = uploadImg($_FILES['image']);


function addPost($name, $login, $title)
{
    $sql =
        "INSERT INTO `images` (`name`, `date`, `login`, `title`) VALUES (
    :name,
    FROM_UNIXTIME(:date),
    (SELECT `login` from `users` WHERE `users`.`login` = :login),
    :title)";
    $statement = $dbh->prepare($sql);
    $statement->bindParam(":title", $_POST['title']);
    $statement->bindParam(":date", time());
    $statement->bindParam(":name", $filename);
    $statement->bindParam(":login", $_SESSION['login']);
    $statement->execute();
}
var_dump($_POST);

addPost($name, $login, $title);


//$sql = "INSERT INTO `images`()"


//
////var_dump($_FILES['image']);
//
//uploadImg($_FILES['image']);
