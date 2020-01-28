<?php
session_start();


class User {
        public $login;
        public $email;
        public $password;
        public $avatar;
        public $dbh;

    public function __construct($login, $email, $password, $avatar, $dbh)
    {
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->avatar = $avatar;
        $this->dbh = $dbh;
    }
}

