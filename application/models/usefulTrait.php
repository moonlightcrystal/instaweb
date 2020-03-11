<?php

trait usefulTrait
{
    public static $queryCheckLogin = "SELECT id FROM users WHERE login = :login";
    public static $queryCheckEmail = "SELECT id FROM users WHERE email = :email";
    public static $queryCountLikes = "SELECT COUNT(*) from likes WHERE likes.image_id = :image_id";
    public static $querySelectComments = "SELECT * FROM comments WHERE comments.photo_id = :image_id";

    public function countLikes($imgId)
    {
        $likes = $this->pdo->select(self::$queryCountLikes, $imgId);
        return ($likes[0]["COUNT(*)"]);
    }

    public function arrayComments($imgId)
    {
        return ($this->pdo->select(self::$querySelectComments, $imgId));
    }

    public function uploadImg($image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $extension;

        move_uploaded_file($image['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename);

        return $filename;
    }

    public function confirmEmail($email)
    {
        $random = rand(1111, 9999);
        mail($email, "Your code for verification", "$random");
        return($random);
    }

    public function checkEmailAtRegister()
    {
        $data = [':email' => $_POST['email']];
        return empty($this->pdo->select(self::$queryCheckEmail, $data))
            ? false : true;
    }

    public function checkLoginAtRegister()
    {

        $data = [':login' => $_POST['login']];
        return empty($this->pdo->select(self::$queryCheckLogin, $data))
            ? false : true;
    }
}