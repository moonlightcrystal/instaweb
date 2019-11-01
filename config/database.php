<?php
    $DB_DSN = "mysql:host=192.168.99.121;dbname=camagru";
    $DB_USER = "root";
    $DB_PASSWORD = "root";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];