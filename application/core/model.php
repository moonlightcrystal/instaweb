<?php

//require_once "../config/database.php";

class Model
{
    protected $pdo;

    function __construct()
    {
        $this->pdo = new createPdo();
    }


    public function get_data()
    {

    }
}