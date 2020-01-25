<?php
session_start();
//$_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
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
        <a id="label" href="index.php">
            GALERY
        </a>
        <?php
            $i=0;
            //$filenames_array = SELECT name FROM images SORT BY date LIMIT 100
            //for $filename in $filenames_array:
            //<div>img</div>
//            while ($i < 10) {
//                $i += 1;
//                ?>
<!--                <div>-->
<!--                   HELLO-->
<!--                </div>-->
<!--                --><?php
//            }
        ?>
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


 <ul class="flex-container">
    <li>
        <div id="picture">
            <div id="loginPicture">
                <img src="avatar.jpg">
                <a href="">alfur</a>
            </div>
            <img src="keeet.png">
            <div id="comment">
                <input name="comments" type="text" placeholder="add your comment">
                <input name="plus" type="button" value="➕">
            </div>
        </div>
    </li>
    <li>
        <div id="picture">
            <div id="loginPicture">
                <img src="avatar.jpg">
                <a href="">alfur</a>
            </div>
            <img src="keeet.png">
            <div id="comment">
                <input name="comments" type="text" placeholder="add your comment">
                <input name="plus" type="button" value="➕">
            </div>
        </div>
    </li>
    <li>
        <div id="picture">
            <div id="loginPicture">
                <img src="avatar.jpg">
                <a href="">alfur</a>
            </div>
            <img src="keeet.png">
            <div id="comment">
                <input name="comments" type="text" placeholder="add your comment">
                <input name="plus" type="button" value="➕">
            </div>
        </div>
    </li>

</ul>

</body>
</html>
