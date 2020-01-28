<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body style="background: mediumblue">


<main>
 <?php include 'application/views/' . $content_view; ?>
</main>

    <footer>
    <a href="https://www.instagram.com/kreshotka_tris/">MY INSTAGRAM</a>
    <p>&copy; 2020 Created by Rudakova Kristina</p>
    </footer>
</body>
</html>