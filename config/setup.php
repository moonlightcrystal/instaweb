<?php
include 'database.php';
        try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $opt);
        //$sql = "CREATE DATABASE camagru";
        //$dbh->exec($sql);
        $dbh->query("DROP DATABASE `camagru2`;");
        echo "Database created successfully<br>";
        }
        catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
//  try {
//    $conn = new PDO("mysql:host=192.168.99.115;dbname=camagru", "root", "root");
////      $conn = new PDO("mysql:host=192.168.99.115", "root", "root");
////          $sql = "CREATE DATABASE camagru";
////    $conn->exec($sql);
//
////      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//      $result = $conn->query("create table test2 (id int)");
////        var_dump($result);
//    // set the PDO error mode to exception
//    // use exec() because no results are returned
////      $db = mysqli_connect("192.168.99.114", "root", "root", "camagru");
//    echo "Database created successfully<br>";
//} catch (PDOException $e) {
//    echo "ERROR CREATING DATABASE: " . $e->getMessage() . " aborting process<br>";
//}

phpinfo();