<?php

require_once "confirmEmailandUploadImg.php";

class Model_Main extends Model
{
    use confirmEmailandUploadImg;

    public static $querySelectPublishPost = "SELECT * FROM images LEFT JOIN users on(user_id) WHERE published = true AND images.user_id = users.id ORDER BY date DESC";

    public static $queryInsertlikes = "INSERT INTO likes(image_id, user_id) VALUES (:photo_id, :user_id)";

    public static $queryDeleteLike = "DELETE FROM likes WHERE image_id = :photo_id AND user_id = :user_id";

    public static $querySelectLikes = "SELECT * FROM likes WHERE image_id = :photo_id AND user_id = :user_id";

    public static $queryCountLikes = "SELECT COUNT(*) from likes WHERE likes.image_id = :image_id";

    public static $queryInsertComments = "INSERT INTO comments(author, `date`, photo_id, text_comment) VALUES (:author, FROM_UNIXTIME(:date), :photo_id, :comment)";

    public static $querySelectComments = "SELECT * FROM comments WHERE comments.photo_id = :image_id";

    public function getPublishedImages()
    {
        $data = $this->pdo->select(self::$querySelectPublishPost);

        foreach ($data as &$image) {
            $dataImgId = [':image_id' => $image['photo_id']];
            $likes = $this->pdo->select(self::$queryCountLikes, $dataImgId);
            $comments = $this->pdo->select(self::$querySelectComments, $dataImgId);
//            var_dump($comments);
            $image['likes'] = $likes[0]["COUNT(*)"];
            $image['comment'] = $comments;
//            $image['comment'] = $comments[0]["text_comment"];
//            $image['comment_author'] = $comments[0]["author"];
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

    public function insertComments($login, $photo_id, $comment)
    {
        $data = [':author' => $login,
            ':date' => time(),
            ':photo_id' => $photo_id,
            ':comment' => $comment
            ];

        if(isset($data)) {
            if(!$this->pdo->upsert(self::$queryInsertComments, $data))
                return false;
        }
    }
}