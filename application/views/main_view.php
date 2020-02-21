<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>


<ul class="flex-container">
    <?php
    $likes = array();
    if ($data) {
        foreach ($data as $post):
//            var_dump($post);
//        var_dump($_SESSION);
            ?>
            <li>
                <div id="picture">
                    <p id="date" style="color: #0bbaa0"><?= $post['date']; ?></p>
                    <div id="loginPicture">
                        <?php if (!empty($post['avatar'])) { ?>
                        <img src="uploads/<?= $post['avatar'];
                        } ?>">
                        <p style="color: greenyellow"><?= $post['title']; ?></p>
                        <a href=""><?= $post['login']; ?></a>
                    </div>
                    <img src="uploads/<?= $post['name']; ?>">
                    <form action="/main/addLike" method="post">
                        <div id="likes">
                            <?php if (!empty($_SESSION['user_id']) && isset($_SESSION) && $post['login'] != $_SESSION['login']) { ?>
                                <input type="image" src="images/hart.png">
                                <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
<!--                                <input hidden name=arrayLikes value='--><?//= $post[''] ?><!--'>-->
                                <!--                            <button type="submit"><img id="heart" src="images/hart.png"></button>-->
                                <p><?= $post['likes']; ?></p>
                            <?php } else echo '  <img src="images/hart.png"> ' . '<p>' . $post['likes'] . '</p>'; ?>
                        </div>
                    </form>
                    <div id="comment">
                        <?php if (!empty($_SESSION['user_id']) && isset($_SESSION)) { ?>
                        <input name="comments" type="text" placeholder="add your comment">
                        <button name="plus" type="button">Add comment</button>
                    </div>
                    <?php } else echo ''; ?>
                </div>
            </li>
        <? endforeach;
    } ?>
</ul>
