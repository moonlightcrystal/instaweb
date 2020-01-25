<?php

session_start();
require_once 'connection.php';


$login = trim($_POST['login']);
$password = trim($_POST['passwd']);

if( !empty($login) && !empty($password)) {

    $sth = $dbh->prepare('SELECT login, password, id, email FROM users WHERE login = :login');

    $params = [':login' => $login];
    $sth->execute($params);

    $user = $sth->fetch(PDO::FETCH_OBJ);

    if ($user) {
        if (password_verify($password, $user->password)) {

            $_SESSION['id'] = $user->id;
            $_SESSION['login'] = $user->login;
            $_SESSION['email'] = $user->email;
            header('Location: ../view/index.php');
        } else
            echo "incorrect your login or password :(";
    } else
        echo "Write your full info, please <3";
}


