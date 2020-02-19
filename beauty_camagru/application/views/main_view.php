<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>


<ul class="flex-container">
    <?php
    if ($data) {
    foreach ($data as $post):
    ?>
    <li>
        <div id="picture">
            <p id="date" style="color: #0bbaa0"><?= $post['date']; ?></p>
            <div id="loginPicture">
                <img src="images/avatar.jpg">
                <p style="color: greenyellow"><?= $post['title']; ?></p>
                <a href=""><?= $post['login']; ?></a>
            </div>
            <img src="uploads/<?= $post['name']; ?>">
            <div id="comment">
                <?php if (!empty($_SESSION['user_id']) && isset($_SESSION)) { ?>
                <input name="comments" type="text" placeholder="add your comment">
                <button name="plus" type="button">Add comment</button>
            </div>
            <?php } else echo '';?>
        </div>
    </li>
    <? endforeach;
    } ?>
</ul>
