<?php
session_start();
$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<header>
    <div id="label">
        HOME
    </div>

    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != "") {
        ?>
        <a id="dope" href="takephoto.php">
            <div>take a picture with dope</div>
        </a>
        <a id="profile" href="#">
            <div>
                PROFILE
            </div>
        </a>
        <a id="logout" href="logout.php">
            <p>LOGOUT</p>
        </a>
    <?php } else {
        ?>
        <div id="dope">
            <img src="pink.png">
        </div>
        <div id="profile">
            <img src="blue.PNG">
        </div>
        <a id="logout" href="signin.php">
            <div>
                LOGIN
            </div>
        </a>
    <?php }
    ?>


</header>
<main>
<!--    <form action="create.php" method="post" enctype="multipart/form-data">-->
<!--        <input type="file" name="image">-->
<!--        <button type="submit">GO</button>-->
<!--    </form><br>-->

    <form action="view/index.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title"><br>
        <input type="file" name="image"><br>
        <button type="submit">GO</button>
    </form>
</main>