<?php

//require_once 'config/setup.php';
//
//$login = trim($_POST['login']);
//$email = trim($_POST['email']);
//$password = trim($_POST['passwd']);
//
//if( !empty($login) && !empty($email) && !empty($password)) {
//
//    $sql = 'SELECT login, password FROM users WHERE login = :login';
//
//    $params = [':login' => $login];
//
//    $stmt = $pdo->prepare($sql);
//    $stmt->execute($params);
//
//    $user = $stmt->fetch(PDO::FETCH_OBJ);
//
//    if($user) {
//        if(password_verify($password, $user->password)) {
//            header('Location: entry.php');
//        } else
//            echo 'NOT CORRECT :(';
//    } else
//        echo 'NOT CORRECT :(';
//} else
//    echo 'Please a write full information about you :)';

if( !empty($login) && !empty($email) && !empty($password)) {

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $opt);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . ":(<br/>";
    }

    try {
        $params = [':login' => $login];
        $stmt = $dbh->prepare('SELECT login, password FROM users WHERE login = :login');
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        if ($user) {
            if (password_verify($password, $user->password)) {
                header('Location: entry.php');
            } else
                echo 'NOT CORRECT :(';
        } else
            echo 'NOT CORRECT :(';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . ":(<br/>";
    }
}else
    echo 'Please a write full information about you :)';