<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
</head>

<body onload="init();">

<div id="lineAddTakePhoto" onload="init();">
    <form action="/addpost/addPostToDraft" method="post" enctype="multipart/form-data">
        <input type="text" name="title"><br>
        <input type="file" name="image"><br>
        <button type="submit">GO</button>
    </form>
    <div class="row">
        <div class="cell">
            <video id="video" onclick="snapshot(this)" autoplay width="320px" height="240px"></video>
        </div>
        <canvas id="canvas" width="320px" height="240px"></canvas>
        <div class="center">
            <button onclick="startWebcam();">Start WebCam</button>
            <button onclick="stopWebcam();">Stop WebCam</button>
            <button onclick="snapshot();">Take Photo</button>
        </div>
<!--        <form action="addpost/addLivePhototoDraft">-->
            <button onclick="addToDraft();">Add to draft</button>
<!--        </form>-->
    </div>
</div>


<div id="feedAllDrafts">
    <?php
    if ($data) {
        foreach ($data as $post):
            ?>
            <div id="draftFeed">
                <a><?= $post['title']; ?></a>
                <img src="uploads/<?= $post['name']; ?>">
                <div id="butttonFeed">
                    <form action="/addpost/publishPost" method="post">
                        <input hidden name=image_id value='<?= $post['photo_id'];?>'>
                        <button type="submit">PUBLISH</button>
                    </form>
                    <form action="/addpost/deletePost" method="post">
                        <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                        <input hidden name=image_name value='<?= $post['name'] ?>'>
                        <button type="submit">DELETE</button>
                    </form>
                </div>
            </div>
        <? endforeach;
    } ?>
</div>
<script src="../../js/takePhoto.js"></script>
</body>
</html>