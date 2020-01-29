<?php
require_once "../../config/connection.php";

class Model_Signup extends Model
{
    public $queryCheckUsers = "SELECT id from users WHERE login = :login OR mail = :mail";
    public $queryInsertUser =
        "INSERT INTO `images` (`name`, `date`, `login`, `title`) VALUES (
    :name,
    FROM_UNIXTIME(:date),
    (SELECT `login` from `users` WHERE `users`.`login` = :login),
    :title)";


    public function get_data()
    {

    }
}

