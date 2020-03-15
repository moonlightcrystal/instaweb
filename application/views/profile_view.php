<?php
?>

<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Black+Ops+One|Faster+One|Montserrat+Subrayada|Zilla+Slab+Highlight&display=swap" rel="stylesheet">
</head>

<div id="formatprofile">
    <div class="infouser">
        <pre>EDIT PROFILE</pre>
        <form action="/profile/changeAvatar" method="post" enctype="multipart/form-data">
            <?php if (!empty($_SESSION['avatar'])) { ?>
           <?php echo '<img src="uploads/' . $_SESSION['avatar'] . '">';  echo ''; };?>

            <input class="buttonEdit" type="file" name="image">
            <button class="buttonEdit" type="submit">RESET</button>
        </form>

        <form action="/profile/changeLogin" method="post">
            <p><span style="color: red">login : </span><br> <?php echo $_SESSION['login']; ?></p>
            <input class="buttonEdit" type="text" name="login" placeholder="NEW LOGIN">
            <button class="buttonEdit" type="submit">RESET</button>
        </form>

        <form action="/profile/confirmMail" method="post">
            <p><span style="color: red">email : </span> <?php echo $_SESSION['email']; ?></p>
            <input class="buttonEdit" type="email" name='email' placeholder="NEWMAIL" required>
            <button class="buttonEdit" type="submit">CONFIRM</button>
        </form>

        <form action="/profile/changeEmail" method="post">
            <input class="buttonEdit" type="text" name='code' placeholder="CODE FROM EMAIL" required>
            <button class="buttonEdit" type="submit">RESET</button>
        </form>

        <form action="/profile/changePassword" method="post">
            <input class="buttonEdit"type="password" name="oldpasswd" placeholder="OLD PASSWORD" required>
            <input class="buttonEdit" type="password" name="newpasswd" placeholder="NEW PASSWORD" required>
            <button class="buttonEdit" type="submit">RESET</button>
        </form>
    </div>
    <ul class="flex-container">
        <?php
        if ($data) {
            foreach ($data as $post):
                ?>
                <li id="BASICPOST">
                    <div id="picture">
                        <p id="date" style="color: #0bbaa0"><?= $post['date']; ?></p>
                        <div id="loginPicture">
                            <?php if (!empty($post['avatar'])) { ?>
                            <img id="avatarBasicPost" src="uploads/<?= $post['avatar'];
                            } ?>">
                            <a href=""><?= $post['login']; ?></a>
                            <form id="deletePublishPost" action="/profile/deletePublishPost" method="post">
                                <input type="image" src="images/delete.png" alt="deltePost">
                                <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                                <input hidden name=image_name value='<?= $post['name'] ?>'>
                            </form>
                        </div>

                        <img id="photoPost" src="uploads/<?= $post['name']; ?>">
                        <form action="/main/addLike" method="post">
                            <div id="likes">
                                <?php if (!empty($_SESSION['user_id'])) { ?>
                                    <input type="image" src="images/hart.png" onclick="">
                                    <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                                    <input hidden name=profile value='good'>
                                    <p><?= $post['likes']; ?></p>
                                <?php } else echo '  <img src="images/hart.png"> ' . '<p>' . $post['likes'] . '</p>'; ?>
                            </div>
                        </form>

                        <form action="/main/addComment" method="post">
                            <div id="comment">
                                <?php if (!empty($_SESSION['user_id']) && isset($_SESSION['login'])) { ?>
                                <input name="comments" type="text" placeholder="add your comment">
                                <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                                <input hidden name=profile value='good'>
                                <button id="addComment" name="plus" type="submit">ADD COMMENT</button>
                            </div>
                        </form>

                        <div id="linecomments">
                            <?php
                            foreach ($post['comment'] as $comment):
                                ?>
                                <p><span id="authorcomment"><?= $comment["author"]; ?>:</span><?= $comment["text_comment"]; ?><br><span id="data"><?= $comment["date"]; ?></span></p>
                            <?php endforeach; ?>
                        </div>
                        <?php } else echo ''; ?>
                    </div>
                </li>
            <? endforeach;
        } ?>
    </ul>
</div>
</html>