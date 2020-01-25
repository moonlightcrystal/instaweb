<?php
session_start();
unset($_SESSION['id']);

header('Location: view/index.php');
//echo "HELLO " . $_SESSION['login'];
?>

<!--<html>-->
<!-- <form action="signin.php">-->
<!--     <input type="submit" value="Login">-->
<!-- </form>-->
<!---->
<!-- </html>-->
