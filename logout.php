<?php
unset($_SESSION['login']);


echo "HELLO " . $_SESSION['login'];
?>
<html>
 <form action="signin.php">
     <input type="submit" value="Login">
 </form>

 </html>
