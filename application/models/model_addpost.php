<?php

require_once "confirmEmailandUploadImg.php";

class Model_Addpost extends Model
{
    use confirmEmailandUploadImg;

    public static $queryInsertPost =
        'INSERT INTO images(`name`,  `date`, `user_id`, `title`) VALUES(
                    :name, FROM_UNIXTIME(:date), :user_id, :title)';

    public static $queryUpdatePublished = "UPDATE images SET published = true WHERE photo_id = :image_id";

    public static $querySelectUserImages = "SELECT * FROM images WHERE user_id = :user_id";

    public static $queryDropUsers = "DELETE FROM images WHERE images.photo_id = :photo_id";

    public function addPost($imageName, $user_id, $title = null)
    {
        $data = [
            ':name' => $imageName,
            ':title' => $title,
            ':user_id' => $user_id,
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


    public function getUserImages($user_id)
    {
        $data = [':user_id' => $user_id];
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