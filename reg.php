<?php

include 'config/database.php';

$login = trim($_POST['login']);
$email = trim($_POST['email']);
$password = trim($_POST['passwd']);

//if( !empty($login) && !empty($email) && !empty($password)) {
//
//    $password = password_hash($password, PASSWORD_DEFAULT);
//
//    $sql = 'INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)';
//    $params = [':login' => $login, ':email' => $email, ':pwd' => $password];
//
//    $stmt = $pdo->prepare($sql);
//    $stmt->execute($params);
//
//    echo "SUCCESS";
//} else
//    echo 'Write your info, please <3';


//      $sth = $dbh->prepare('SELECT COUNT(*) FROM users WHERE login = :login');
//    $sth->bindParam(':login', $login, PDO::PARAM_STR);
//    $sth->execute();

$login = trim($_POST['login']);
$email = trim($_POST['email']);
$password = trim($_POST['passwd']);

if( !empty($login) && !empty($email) && !empty($password)) {
    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $opt);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . ":(<br/>";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sth = $dbh->prepare('INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)');
        $sth->bindParam(':login', $login, PDO::PARAM_STR);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->bindParam(':passwd', $password, PDO::PARAM_STR);
        $sth->execute();
        echo "SUCCESS";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . ":(<br/>";
    }
} else
    echo 'Write your info, please <3';