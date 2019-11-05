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
    <div id="label">
        HOME
    </div>

    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != "") {
        ?>
        <a id="dope" href="#">
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

<ul class="flex-container">
    <li class="flex-item">1</li>
    <li class="flex-item">2</li>
    <li class="flex-item">3</li>
    <li class="flex-item">4</li>
    <li class="flex-item">5</li>
    <li class="flex-item">6</li>
</ul>

<ul class="flex-container">
    <!--    <h1 class="marquee"><span>This is a marquee. Text, text, text...</span></h1>-->
    <li class="flex-item">
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
    <li class="flex-item">
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
    <li class="flex-item">
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
    <li class="flex-item">
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
<!--    <li id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!--    <li id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!--    <li id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!--    <li id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!--    <li id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
</ul>
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="keeet.png">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div id="Block">-->
<!--        <div id="picture">-->
<!--            <div id="loginPicture">-->
<!--                <img src="avatar.jpg">-->
<!--                <a href="">alfur</a>-->
<!--            </div>-->
<!--            <img src="maxresdefault.jpg">-->
<!--            <div id="comment">-->
<!--                <input name="comments" type="text" placeholder="add your comment">-->
<!--                <input name="plus" type="button" value="➕">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</ul>
</body>
</html>
