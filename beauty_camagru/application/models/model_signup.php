<?php

require_once dirname(__FILE__) . "/../core/model.php";
require_once "confirmEmailandUploadImg.php";


class Model_Signup extends Model
{
    use confirmEmailandUploadImg;

    public static $queryCheckUsers = "SELECT id from users WHERE login = :login OR mail = :mail";
    public static $queryInsertUser =
        'INSERT INTO users(login, email, password) VALUES(:login, :email, :passwd)';


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

        $data = array(':login' => $_POST['login'],
            ':email' => $_POST['email'],
            ':passwd' => password_hash($_POST['passwd'], PASSWORD_DEFAULT)
        );

        if (!$this->pdo->upsert(self::$queryInsertUser, $data))
            return false;
        $data = array(':login' => $_POST['login'],
            ':mail' => $_POST['email']
        );
        return $this->pdo->select(self::$queryCheckUsers, $data)[0];
    }

}

//$email = "weloveyoucris7@gmail.com";
//
//$proba = new Model_Signup();
//
//print $proba->confirmEmail($email);


