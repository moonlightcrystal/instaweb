<?php
class Model
{
    protected $pdo;

    function __construct()
    {
        $this->pdo = new pdo_TT();
    }

    public function get_data()
    {

    }
}