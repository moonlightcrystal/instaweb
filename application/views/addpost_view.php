<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<form action="/addpost/addPostToDraft" method="post" enctype="multipart/form-data">
    <input type="text" name="title"><br>
    <input type="file" name="image"><br>
    <button type="submit">GO</button>
</form>

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
<!--                        <input hidden name=image_name value='--><?//= $post['name'] ?><!--'>-->
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
</html>