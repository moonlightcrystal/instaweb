<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<div id="lineAddTakePhoto">
    <form action="/addpost/addPostToDraft" method="post" enctype="multipart/form-data">
        <input type="text" name="title"><br>
        <input type="file" name="image"><br>
        <button type="submit">GO</button>
    </form>
    <div class="row">
        <div class="cell">
            <video id="player" autoplay width="320px" height="240px"></video>
        </div>
        <div class="cell"></div>
        <canvas id="canvas" width="320px" height="240px"></canvas>
        <div class="center">
            <button class="btn btn-primary" id="capture-btn">Take Photo</button>
        </div>
        <form action="addpost/addLivePhototoDraft">
            <button type="submit">Add to draft</button>
        </form>
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
                        <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                        <!--                        <input hidden name=image_name value='--><? //= $post['name']
                        ?><!--'>-->
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
</html>