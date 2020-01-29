<?php
$_SESSION['login'] = 'kris';
$_SESSION['mail'] = '1@mail.ru';
?>

<html>
<div id="formatprofile">
    <div class="infouser">
        <form action="/profile/changeAvatar" method="post" enctype="multipart/form-data">
            <img src="../images/avatar.jpg">
            <input type="file" name="image">
            <button type="submit">RESET</button>
        </form>

        <form action="/profile/changeLogin" method="post">
            <p>username: <?php echo $_SESSION['login']; ?></p>
            <input type="text" placeholder="login">
            <button type="submit">RESET</button>
        </form>

        <form action="/profile/changeMail" method="post">
            <p>email: <?php echo $_SESSION['mail']; ?></p>
            <input type="email" placeholder="newemail" required>
            <button type="submit">CONFIRM</button>
        </form>

        <form action="/profile/confirmMail" method="post">
            <input type="text" placeholder="code from mail" required>
            <button type="submit">RESET</button>
        </form>

        <form action="/reset" method="post">
            <input type="password" placeholder="oldpassword" required>
            <input type="password" placeholder="newpassword" required>
            <button type="submit">RESET</button>
        </form>
    </div>
    <ul class="flex-container">
        <li>
            <div id="picture">
                <p id="date" style="color: #0bbaa0">05/03/2012</p>
                <div id="loginPicture">
                    <img src="images/avatar.jpg">
                    <p style="color: greenyellow">PARIS</p>
                    <a href="">kris</a>
                </div>
                <img src="../images/keeet.png">
                <div id="comment">
                    <input name="comments" type="text" placeholder="add your comment">
                    <button name="plus" type="button">Add comment</button>
                </div>
            </div>
        </li>
    </ul>
</div>
</html>