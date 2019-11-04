<?php
session_start();
?>

<html>
<a>LOGIN: <?php echo $_SESSION['login'];?></a><br>
<a>EMAIL: <?php echo $_SESSION['email'];?></a><br>
<p>
    <input type="file" name="f">
    <input type="submit" value="Отправить">
</p>
</html>
