<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<header>
    <?php if (!empty($_SESSION['user_id']) && isset($_SESSION)) {

        echo '
        
        <a id="dope" href="/addpost">take a picture with dope</a>
        <a id="profile" href="/profile">PROFILE</a>
        <a id="logout" href="/signin/signout">LOGOUT</a>
        <a id="label" href="/">GALERY</a>
        
        ';
    } else {
        echo '
        <div id="dope">
        <img src="../images/pink.png">
        </div>
        <div id="profile">
        <img src="../images/blue.PNG">
    </div>
    <a id="logout" href="/signin"> LOGIN</a>';
    }
?>
</header>

<main>
 <?php include 'application/views/' . $content_view; ?>
</main>

    <footer>
    <a href="https://www.instagram.com/treshotka_kris/">MY INSTAGRAM</a>
    <p>&copy; 2020 Created by Rudakova Kristina</p>
    </footer>
</body>
</html>