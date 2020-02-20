<?php
//$_SESSION['login'] = 'kris';
//$_SESSION['mail'] = '1@mail.ru';
//var_dump($_SESSION);
?>

<html>
<div id="formatprofile">
    <div class="infouser">
        <form action="/profile/changeAvatar" method="post" enctype="multipart/form-data">
            <img src="uploads/<?php echo $_SESSION['avatar'];?>">
            <input type="file" name="image">
            <button type="submit">RESET</button>
        </form>

        <form action="/profile/changeLogin" method="post">
            <p>username: <?php echo $_SESSION['login']; ?></p>
            <input type="text" name="login" placeholder="login">
            <button type="submit">RESET</button>
        </form>

        <form action="/profile/confirmMail" method="post">
            <p>email: <?php echo $_SESSION['email']; ?></p>
            <input type="email" name='email' placeholder="newemail" required>
            <button type="submit">CONFIRM</button>
        </form>

        <form action="/profile/changeEmail" method="post">
            <input type="text" name='code' placeholder="code from mail" required>
            <button type="submit">RESET</button>
        </form>

        <form action="/profile/changePassword" method="post">
            <input type="password" name="oldpasswd" placeholder="oldpassword" required>
            <input type="password"   name="newpasswd" placeholder="newpassword" required>
            <button type="submit">RESET</button>
        </form>
    </div>
    <ul class="flex-container">
        <?php
        var_dump($data);
        if ($data) {
            foreach ($data as $post):
                ?>
                <li>
                    <div id="picture">
                        <p id="date" style="color: #0bbaa0"><?= $post['date']; ?></p>
                        <div id="loginPicture">
                            <?php if (!empty($post['avatar'])) {?>
                            <img src="uploads/<?= $post['avatar']; }?>">
                            <p style="color: greenyellow"><?= $post['title']; ?></p>
                            <a href=""><?= $post['login']; ?></a>
                        </div>
                        <img src="uploads/<?= $post['name']; ?>">
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
</div>
</html>