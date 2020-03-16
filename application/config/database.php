<?php
$DB_DSN = 'mysql:host=127.0.0.1;dbname=camagru;charset=utf8';
$DB_USER = "camagru";
$DB_PASSWORD = "adventure";
$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false,];
