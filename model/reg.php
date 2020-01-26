<?php

include 'connection.php';

$login = trim($_POST['login']);
$email = trim($_POST['email']);
$password = trim($_POST['passwd']);

if (!empty($login) && !empty($email) && !empty($password)) {

    $password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sth1 = $dbh->prepare('INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)');
        $sth1->bindParam(':login', $login);
        $sth1->bindParam(':email', $email);
        $sth1->bindParam(':passwd', $password);
        $sth1->execute();
        header('Location: ../view/signin.php');
    } catch (PDOException $e) {
        header('Location: ../view/signup.php');
    }
}


