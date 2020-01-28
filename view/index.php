<?php
session_start();
require "../controller/store.php"
//setlocale(LC_ALL, 'ru_RU');
//date_default_timezone_set( 'Europe/Moscow' );
//$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body>
<header>


    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != "") {
        ?>
        <a id="dope" href="takephoto.php">
            <div>take a picture with dope</div>
        </a>
        <a id="profile" href="entry.php">
            <div>
                PROFILE
            </div>
        </a>
        <a id="logout" href="logout.php">
            <p>LOGOUT</p>
        </a>
        <a id="label">
            GALERY
        </a>
    <?php } else {
        ?>
        <div id="dope">
            <img src="../pink.png">
        </div>
        <div id="profile">
            <img src="../blue.PNG">
        </div>
        <a id="logout" href="signin.php">
            <div>
                LOGIN
            </div>
        </a>
    <?php }
    ?>


</header>


<ul class="flex-container">

    <?php
    $posts = showPost($dbh);
    if ($posts) {
        foreach ($posts as $post):?>
            <li>
                <div id="picture">
                    <p id="date" style="color: #0bbaa0"><?= $post['date']; ?></p>
                    <div id="loginPicture">
                        <img src="../avatar.jpg">
                        <p style="color: greenyellow"><?= $post['title']; ?></p>
                        <a href=""><?= $post['login']; ?></a>
                    </div>
                    <img src="../uploads/<?= $post['name']; ?>">
                    <div id="comment">
                        <input name="comments" type="text" placeholder="add your comment">
                        <button name="plus" type="button">Add comment</button>
                    </div>
                </div>
            </li>
        <?php endforeach;
    } else
        ?>

</ul>
<!--<main>-->
<!--    <div class="outer-wrapper">-->
<!--        <div class="wrapper">-->
<!--            <div class="slide one">-->
<!--                <div class="posts">-->
<!--                    <div class="post1">-->
<!--                        <img src="post1img.jpg">-->
<!--                        <div class="barpost">-->
<!--                            <a href="#">KRIS</a>-->
<!--                            <a href="#" class="like">-->
<!--                                <i class="fa fa-heart" aria-hiddent="true">🖤</i>-->
<!--                            </a>-->
<!--                            <div>-->
<!--                            </div>-->
<!--                            <div class="post2"></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="slide two"></div>-->
<!--                    <div class="slide three"></div>-->
<!--                    <div class="slide four"></div>-->
<!--                </div>-->
<!--            </div>-->
<!--</main>-->

<!--<main>-->
<!--    <div class="outer-wrapper">-->
<!--        <div class="wrapper">-->
<!--            <div class="slide one"></div>-->
<!--            <div class="slide two"></div>-->
<!--            <div class="slide three"></div>-->
<!--            <div class="slide four"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</main>-->

<footer>
    <div class="contacts">
        <a href="https://www.instagram.com/kreshotka_tris/">MY INSTAGRAM</a>
        <p>&copy; 2020 Created by Rudakova Kristina</p>
    </div>
</footer>
</body>
</html>
