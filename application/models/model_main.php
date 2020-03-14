<?php

require_once "usefulTrait.php";

class Model_Main extends Model
{
    use usefulTrait;

    public static $querySelectPublishPost = "SELECT * FROM images LEFT JOIN users on(user_id) WHERE published = true AND images.user_id = users.id ORDER BY date DESC";

    public static $queryInsertlikes = "INSERT INTO likes(image_id, user_id) VALUES (:photo_id, :user_id)";

    public static $queryDeleteLike = "DELETE FROM likes WHERE image_id = :photo_id AND user_id = :user_id";

    public static $querySelectLikes = "SELECT * FROM likes WHERE image_id = :photo_id AND user_id = :user_id";

    public static $queryInsertComments = "INSERT INTO comments(author, `date`, photo_id, text_comment) VALUES (:author, FROM_UNIXTIME(:date), :photo_id, :comment)";

    public static $querySelectEmail = "select email from users LEFT JOIN images ON users.id = images.user_id WHERE images.photo_id = :photo_id";


    public function getPublishedImages()
    {
        $data = $this->pdo->select(self::$querySelectPublishPost);

        foreach ($data as &$image) {
            $dataImgId = [':image_id' => $image['photo_id']];
            $image['likes'] = $this->countLikes($dataImgId);
            $image['comment'] = $this->arrayComments($dataImgId);
        }
        return $data;
    }

    public function insertLikes($photo_id, $user_id, $action)
    {
        $data = array(':photo_id' => $photo_id,
            ':user_id' => $user_id
        );

        if (isset($data) && $action == 'insert') {
            if (!$this->pdo->upsert(self::$queryInsertlikes, $data))
                return false;
        }
        if (isset($data) && $action == 'delete') {
            if (!$this->pdo->upsert(self::$queryDeleteLike, $data))
                return false;
        }
    }

    public function selectLikes($photo_id, $user_id)
    {
        $data = array(':photo_id' => $photo_id,
            ':user_id' => $user_id
        );

        return $this->pdo->select(self::$querySelectLikes, $data);
    }

    public function getEmail($photo_id)
    {
        $data = [':photo_id' => $photo_id];
        return $this->pdo->select(self::$querySelectEmail, $data);
    }

    public function insertComments($login, $photo_id, $comment)
    {
        $data = [':author' => $login,
            ':date' => time(),
            ':photo_id' => $photo_id,
            ':comment' => $comment
        ];

        if (isset($data)) {
            if (!$this->pdo->upsert(self::$queryInsertComments, $data))
                return false;
        }
    }
}