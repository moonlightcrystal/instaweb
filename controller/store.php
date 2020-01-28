<?php
session_start();
require_once '../model/connection.php';
require '../model/addpost.php';


function authentication($login, $password, $dbh)
{

    if (!empty($login) && !empty($password)) {

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
}

function showPost($dbh)
{
    $sql = "SELECT * FROM `images`";
    $statement = $dbh->prepare($sql);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

function uploadImg($image)
{
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;

    move_uploaded_file($image['tmp_name'], '../uploads/' . $filename);

    return $filename;
}

if($_FILES['image']) {
    $filename = uploadImg($_FILES['image']);
    addPost($filename, $_SESSION['login'], $_POST['title'], $dbh);
    showPost($dbh);
    header('Location: ../view/index.php');
}

register($_POST['login'], $_POST['email'], $_POST['passwd'], $dbh);
authentication($_POST['login'], $_POST['passwd'], $dbh);
