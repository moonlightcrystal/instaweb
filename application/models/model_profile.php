<?php
require_once "confirmEmailandUploadImg.php";


class Model_Profile extends Model
{


    use confirmEmailandUploadImg;
    private $userId;

    public static $queryUpdateLogin = "UPDATE users SET login = :newValue WHERE id = :user_id";

    public static $queryUpdateEmail = "UPDATE users SET email = :newValue WHERE id = :user_id";

    public static $queryUpdatePassword = "UPDATE users SET password = :newValue WHERE id = :user_id";

    public static $queryUpdateAvatar = "UPDATE users SET avatar = :newValue WHERE id = :user_id";

    public static $qureySelectPublishedPosts = "SELECT * FROM images WHERE published = true AND user_id = :user_id";

//     public $c = "SELECT * FROM images LEFT JOIN users on(user_id) WHERE published = true AND images.user_id = users.id ORDER BY date DESC";

    public function __construct($user_id)
    {
        parent::__construct();
        $this->userId = $user_id;
    }

    function changeUserInfo($whatYouChange, $newValue)
    {
        print($whatYouChange);
        print($newValue);
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

    function showOwnPublishPost($user_id)
    {
        $data = [':user_id' => $user_id];
        return $this->pdo->select(self::$qureySelectPublishedPosts, $data);
    }


}