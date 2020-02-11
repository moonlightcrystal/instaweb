<?php

require_once dirname(__FILE__) . "/../core/model.php";
require_once "confirmEmailandUploadImg.php";


class Model_Signup extends Model
{
    use confirmEmailandUploadImg;

    public static $queryCheckUsers = "SELECT id from users WHERE login = :login OR mail = :mail";
    public static $queryInsertUser =
        'INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)';

    public static  $queryChecklogin = "SELECT id FROM users WHERE login = :login";


    public function get_data()
    {
        {
            $data = array(':login' => $_POST['login'],
                ':mail' => $_POST['email']
            );
            return empty($this->pdo->select(self::$queryCheckUsers, $data))
                ? false : true;
        }
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
        return $this->pdo->select(self::$queryChecklogin, $data)[0];
    }

}

//$email = "weloveyoucris7@gmail.com";
//
//$proba = new Model_Signup();
//
//print $proba->confirmEmail($email);


