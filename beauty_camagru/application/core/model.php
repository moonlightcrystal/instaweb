<?php
require_once dirname(__FILE__)."/../config/database.php";
//require_once "../config/database.php";

class Model
{
    protected $pdo;
    public static $opt;

    function __construct()
    {
        $this->opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->pdo = new createPdo('mysql:host=127.0.0.1;dbname=camagru;charset=utf8', "camagru", "adventure", self::$opt);
    }

    public function get_data()
    {

    }
}