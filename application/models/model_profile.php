<?php
require_once "usefulTrait.php";


class Model_Profile extends Model
{


    use usefulTrait;
    private $userId;

    public static $queryUpdateLogin = "UPDATE users SET login = :newValue WHERE id = :user_id";

    public static $queryUpdateEmail = "UPDATE users SET email = :newValue WHERE id = :user_id";

    public static $queryUpdatePassword = "UPDATE users SET password = :newValue WHERE id = :user_id";

    public static $queryUpdateAvatar = "UPDATE users SET avatar = :newValue WHERE id = :user_id";

    public static $querySelectPublishedPosts = "SELECT *  FROM images
            LEFT JOIN users ON images.user_id = users.id
            WHERE images.published = true AND images.user_id = :user_id
            ORDER BY date DESC";

    public static $queryDeletePost = "DELETE FROM images WHERE images.photo_id = :photo_id";

    public static $queryUpdateNotif = "UPDATE users SET notif = !notif WHERE id = :user_id";

    public function __construct($user_id)
    {
        parent::__construct();
        $this->userId = $user_id;
    }

    function changeUserInfo($whatYouChange, $newValue)
    {
        $data = array(
            ':newValue' => $newValue,
            ':user_id' => $this->userId
        );

        if ($whatYouChange == 'login')
            $query = self::$queryUpdateLogin;
        elseif ($whatYouChange == 'email')
            $query = self::$queryUpdateEmail;
        elseif ($whatYouChange == 'password')
            $query = self::$queryUpdatePassword;
        elseif ($whatYouChange == 'avatar')
            $query = self::$queryUpdateAvatar;
        if (!$this->pdo->upsert($query, $data))
            return false;
        return true;

    }

    public function deletePost($photoId)
    {
        $data = [':photo_id' => $photoId];
        if (!$this->pdo->upsert(self::$queryDeletePost, $data))
            return false;
        return true;
    }

    public function returnNotif($user_id)
    {
        $data = [':user_id' => $user_id];
        if (!$this->pdo->upsert(self::$queryUpdateNotif, $data))
            return false;
        return true;
    }

    function showOwnPublishPost($user_id)
    {
        $data = [':user_id' => $user_id];
        $allData = $this->pdo->select(self::$querySelectPublishedPosts, $data);
        foreach ($allData as &$image) {
            $dataImgId = [':image_id' => $image['photo_id']];
            $image['likes'] = $this->countLikes($dataImgId);
            $image['comment'] = $this->arrayComments($dataImgId);
        }
        return $allData;
    }


}