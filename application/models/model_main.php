<?php

require_once "confirmEmailandUploadImg.php";

class Model_Main extends Model
{
    use confirmEmailandUploadImg;

    public static $querySelectPublishPost = "SELECT * FROM images LEFT JOIN users on(user_id) WHERE published = true AND images.user_id = users.id ORDER BY date DESC";

    public static $queryInsertlikes = "UPDATE images SET likes=likes+1 WHERE photo_id = :photo_id";


    public function getPublishedImages()
    {
        return $this->pdo->select(self::$querySelectPublishPost);
    }

    public function insertLikes($photo_id)
    {
        $data =[':photo_id' => $photo_id];

        if (!$this->pdo->upsert(self::$queryInsertlikes, $data))
            return false;

    }
}