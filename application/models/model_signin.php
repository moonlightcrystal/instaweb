<?php

require_once "usefulTrait.php";

class Model_Signin extends Model
{
    use usefulTrait;
    public static $querySelectLogin = "SELECT id,password,login,email,notif FROM users WHERE login = :login";

    public static $queryUpdatePasword = "UPDATE users SET password = :password WHERE id = :user_id";

    public static $queryGetUserId = "SELECT id FROM users WHERE email = :email";

    public function authentication()
    {
        $data = [':login' => $_POST['login']];

        if (!empty($infoAuth = $this->pdo->select(self::$querySelectLogin, $data)))
            return $infoAuth[0];
        return false;
    }

    public function updatePasword($user_id, $new_password)
    {
        $data = array(':password' => $new_password,
            ':user_id' => $user_id);
        if (!$this->pdo->upsert(self::$queryUpdatePasword, $data))
            return false;
    }

    public function getUserId($email)
    {
        $data = [':email' => $email];
        $user_id = $this->pdo->select(self::$queryGetUserId, $data);
        return $user_id[0]['id'];
    }
}