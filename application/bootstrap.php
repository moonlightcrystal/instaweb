<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/application/config/database.php';
require_once 'core/pdo.php';

$dbh = new createPdo([
    'DB_DSN' => $DB_DSN,
    'DB_USER' => $DB_USER,
    'DB_PASSWORD' => $DB_PASSWORD,
    'opt' => $opt
]);

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

Route::start();