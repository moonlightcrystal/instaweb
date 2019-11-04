<?php
session_start();

echo "HELLO " . $_SESSION['login'];


?>
 <html>
 <form action="logout.php">
     <input type="submit" value="Logout">
 </form>

 <form action="profile.php">
    <input type="submit" value="profile">
 </form>
 </html>
