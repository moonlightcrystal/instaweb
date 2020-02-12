<?php

require_once dirname(__FILE__) . "/../core/model.php";
require_once "confirmEmailandUploadImg.php";


class Model_Signup extends Model
{
    use confirmEmailandUploadImg;

    public static $queryInsertUser =
        'INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)';

    public static $queryCheckLogin = "SELECT id FROM users WHERE login = :login";

    public static $queryCheckEmail = "SELECT id FROM users WHERE email = :email";

    
    public function checkLoginAtRegister()
    {
        $data = [':login' => $_POST['login']];
        return empty($this->pdo->select(self::$queryCheckLogin, $data))
            ? false : true;
    }

    public function checkEmailAtRegister()
    {
        $data = [':email' => $_POST['email']];
        return empty($this->pdo->select(self::$queryCheckEmail, $data))
            ? false : true;
    }

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


