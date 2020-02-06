<?php


class Model_Signup extends Model
{
    public static $queryCheckUsers = "SELECT id from users WHERE login = :login OR mail = :mail";
    public static $queryInsertUser =
        "INSERT INTO `images` (`name`, `date`, `login`, `title`) VALUES (
    :name,
    FROM_UNIXTIME(:date),
    (SELECT `login` from `users` WHERE `users`.`login` = :login),
    :title)";


    public function get_data()
    {
        {
            $data = [':username' => $_POST['username']];
            return empty($this->pdo->select(self::$queryCheckUsers, $data))
                ? false : true;
        }
    }

    public function registerUser()
    {
        $data = array(':login' => $_POST['login'],
            ':email' => $_POST['email'],
            ':passwd' => password_hash($_POST['passwd'], PASSWORD_DEFAULT));

        if (!$this->pdo->upsert(self::$queryInsertUser, $data))
            return false;
        $data = [':login' => $_POST['login']];
        return $this->pdo->select(self::$queryCheckUsers, $data)[0];
    }
}



