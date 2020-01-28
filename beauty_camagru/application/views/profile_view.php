<?php
$_SESSION['login'] = 'kris';
?>

<html>
    <div class="infouser">
        <div>
            <img src="../images/avatar.jpg">
            <p>username: <?php echo $_SESSION['login'];?></p>
        </div>
            <p>email: <?php echo $_SESSION['login'];?></p>
            <p>password:</p>
    </div>
</html>