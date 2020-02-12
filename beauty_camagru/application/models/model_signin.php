<?php

class Model_Signin extends Model
{
    public static $querySelectLogin = "SELECT id, password FROM users WHERE login = :login";

    public function authentication()
    {
        $data = [':login' => $_POST['login']];

        if(!empty($infoAuth = $this->pdo->select(self::$querySelectLogin, $data)))
            return $infoAuth[0];
        return false;
    }

}