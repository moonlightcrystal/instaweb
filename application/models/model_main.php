<?php

require_once "confirmEmailandUploadImg.php";

class Model_Main extends Model
{
    use confirmEmailandUploadImg;

    public static $querySelectPublishPost = "SELECT * FROM images LEFT JOIN users on(user_id) WHERE published = true AND images.user_id = users.id ORDER BY date DESC";

//    public static $querySelectPublishPost = "SELECT * FROM images WHERE published = true";


    public function getPublishedImages()
    {
        return $this->pdo->select(self::$querySelectPublishPost);
    }
}