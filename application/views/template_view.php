<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Black+Ops+One|Faster+One|Montserrat+Subrayada|Zilla+Slab+Highlight&display=swap" rel="stylesheet">
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
    <a id="dope">GO</a>
     <a id="profile">TO</a>

    <a id="label">snapicture</a>
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