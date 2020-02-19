<?php

require_once "confirmEmailandUploadImg.php";

class Model_Addpost extends Model
{
    use confirmEmailandUploadImg;

    public static $queryInsertPost =
        'INSERT INTO images(`name`,  `date`, `login`, `title`) VALUES(
                    :name, FROM_UNIXTIME(:date), :login, :title)';

    public static $queryUpdatePublished = "UPDATE images SET published = true WHERE photo_id = :image_id";

    public static $querySelectUserImages = "SELECT * FROM images WHERE login = :login";

    public static $queryDropUsers = "DELETE FROM images WHERE photo_id = :photo_id";

    public function addPost($imageName, $login, $title = null)
    {
        $data = [
            ':name' => $imageName,
            ':title' => $title,
            ':login' => $login,
            ':date' => time()
        ];

        if(!$this->pdo->upsert(self::$queryInsertPost, $data))
            return false;
        return true;

    }

    public function publish($imageId)
    {
        $data = [':image_id' => $imageId];

        if(!$this->pdo->upsert(self::$queryUpdatePublished, $data))
            return false;
        return true;
    }


    public function getUserImages($login)
    {
        $data = [':login' => $login];
        return $this->pdo->select(self::$querySelectUserImages, $data);
    }

    public function deletePost($photoId)
    {
        $data = [':photo_id' => $photoId];
        if(!$this->pdo->upsert(self::$queryDropUsers, $data))
            return false;
        return true;
    }
}