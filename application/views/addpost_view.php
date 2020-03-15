<!DOCTYPE html>
<html lang="en">
<head>
<!--    <link rel="stylesheet" type="text/css" href="css/main.css">-->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Black+Ops+One|Faster+One|Montserrat+Subrayada|Zilla+Slab+Highlight&display=swap" rel="stylesheet">
</head>

<body onload="init();">

<div id="lineAddTakePhoto">
    <form id="filters">
        <pre> F   I   L   T   E   R   S </pre>
<!--        <label>-->
<!--            <input name="filt" type="radio" id="filter1" value="GTA">-->
<!--            <img id="imgGTA" src="images/gtavice.png">-->
<!--        </label>-->
        <label>
            <input name="filt" type="radio" id="filter2" value="wall">
            <img id="wall" src="images/wall.png">
        </label>
        <label>
            <input name="filt" type="radio" id="filter3" value="paint">
            <img id="paint" src="images/paint.png">
        </label>
        <label>
            <input name="filt" type="radio" id="empty"> empty
        </label>
        <pre> F   I   L   T   E   R   S </pre>
        <label>
            <input name="filt" type="radio" id="filter1" value="woman">
            <img id="woman" src="images/woman.png">
        </label>
        <label>
            <input name="filt" type="radio" id="filter3" value="arms">
            <img id="arms" src="images/arms.png">
        </label>
        <label>
            <input name="filt" type="radio" value="angel">
            <img id="angel" src="images/angel.png">
        </label>
    </form>
    <div id="livephoto">
        <div>
            <video id="video" onclick="snapshot(this)" autoplay width="320px" height="240px"></video>
            <canvas id="canvas" width="320px" height="240px"></canvas>
        </div>
        <div>
            <button class="buttonCamera" onclick="startWebcam();">Start WebCam</button>
            <button class="buttonCamera" onclick="stopWebcam();">Stop WebCam</button>
            <button class="buttonCamera" onclick="snapshot();">Take Photo</button>
            <button class="buttonCamera" onclick="addToDraft();">Add to draft</button>
            <button class="buttonCamera" id="makeEffect">Make filter</button>
        </div>
    </div>

    <form id="uploadPhoto" action="/addpost/addPostToDraft" method="post" enctype="multipart/form-data">
        <pre>U P L O A D   A   P H O T O</pre>
        <input class="uploadPhotoBut" type="file" name="image"><br>
        <button class="uploadPhotoBut" id="GoButton" type="submit">UPLOAD</button>
    </form>

</div>


<div id="feedAllDrafts">
    <?php
    if ($data) {
        foreach ($data as $post):
            ?>
            <div id="draftFeed">
                <img id="yourphoto" src="uploads/<?= $post['name']; ?>">
                <div id="butttonFeed">
                    <form action="/addpost/publishPost" method="post">
                        <input hidden name=image_id value='<?= $post['photo_id']; ?>'>
                        <button id="buttonForDraftPost" type="submit">PUBLISH</button>
                    </form>
                    <form action="/addpost/deletePost" method="post">
                        <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                        <input hidden name=image_name value='<?= $post['name'] ?>'>
                        <button id="buttonForDraftPost" type="submit">DELETE</button>
                    </form>
                </div>
            </div>
        <? endforeach;
    } ?>
</div>
<script src="../../js/takePhoto.js"></script>
</body>
</html>