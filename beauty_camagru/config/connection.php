<?php
include 'database.php';

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $opt);
} catch (PDOException $e) {
    echo "Error with creating db: " . $e->getMessage() . ":(<br/>";
}