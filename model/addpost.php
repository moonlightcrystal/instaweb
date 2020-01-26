<?php

session_start();
require_once 'connection.php';
setlocale(LC_ALL, 'ru_RU.UTF-8');
date_default_timezone_set( 'Europe/Moscow' );

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

function register($login, $email, $password, $dbh)
{
    if (!empty($login) && !empty($email) && !empty($password)) {

        $password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $statement = $dbh->prepare('INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)');
            $statement->bindParam(':login', $login, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':passwd', $password, PDO::PARAM_STR);
            $statement->execute();
            header('Location: ../view/signin.php');
        } catch (PDOException $e) {
            header('Location: ../view/signup.php');
        }
    }
}
