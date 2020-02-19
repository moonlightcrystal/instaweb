<?php

require_once "confirmEmailandUploadImg.php";

class Model_Main extends Model
{
    use confirmEmailandUploadImg;

    public static $querySelectPublishPost = "SELECT * FROM images WHERE published = true";




    public function getPublishedImages()
    {
        return $this->pdo->select(self::$querySelectPublishPost);
    }
}