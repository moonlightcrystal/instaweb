<?php

require_once dirname(__FILE__) . "/../core/model.php";
require_once "usefulTrait.php";


class Model_Signup extends Model
{
    use usefulTrait;

    public static $queryInsertUser =
        'INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)';


    public function registerUser()
    {

        $data = array(':login' => $_SESSION['login'],
            ':email' => $_SESSION['email'],
            ':passwd' => $_SESSION['passwd']
        );

        if (!$this->pdo->upsert(self::$queryInsertUser, $data))
            return false;
        $data = [':login' => $_SESSION['login']];
        return $this->pdo->select(self::$queryCheckLogin, $data)[0];
    }

}

//$email = "weloveyoucris7@gmail.com";
//
//$proba = new Model_Signup();
//
//print $proba->confirmEmail($email);


