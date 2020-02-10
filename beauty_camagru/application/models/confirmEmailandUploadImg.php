<?php

trait confirmEmailandUploadImg
{
    public function uploadImg($image)
    {
        $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . "." . $extension;

        move_uploaded_file($image['tmp_name'], '../uploads/' . $filename);

        return $filename;
    }

    public function confirmEmail($email)
    {
        $random = rand(1111, 9999);
        mail($email, "Your code for verification", "$random");
        return($random);
    }
}