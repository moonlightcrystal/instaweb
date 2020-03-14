<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>


<ul class="flex-container">
    <?php
    if ($data) {
        foreach ($data as $post):
            ?>
            <li id="BASICPOST">
                <div id="picture">
                    <p id="date" style="color: #0bbaa0"><?= $post['date']; ?></p>
                    <div id="loginPicture">
                        <?php if (!empty($post['avatar'])) { ?>
                        <img id="avatarBasicPost" src="uploads/<?= $post['avatar'];
                        } ?>">
                        <a href=""><?= $post['login']; ?></a>
                    </div>
                    <img id="photoPost" src="uploads/<?= $post['name']; ?>">
                    <form action="/main/addLike" method="post">
                        <div id="likes">
                            <?php if (!empty($_SESSION['user_id'])) { ?>
                                <input type="image" src="images/hart.png" onclick="">
                                <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                                <p><?= $post['likes']; ?></p>
                            <?php } else echo '  <img src="images/hart.png"> ' . '<p>' . $post['likes'] . '</p>'; ?>
                        </div>
                    </form>

                    <form action="/main/addComment" method="post">
                        <div id="comment">
                            <?php if (!empty($_SESSION['user_id']) && isset($_SESSION['login'])) { ?>
                            <input name="comments" type="text" placeholder="add your comment">
                            <input hidden name=image_id value='<?= $post['photo_id'] ?>'>
                            <button id="addComment" name="plus" type="submit">Add comment</button>
                        </div>
                    </form>

                    <div id="linecomments">
                        <?php
                        foreach ($post['comment'] as $comment):
                            ?>
                            <p>
                                <span id="authorcomment"><?= $comment["author"]; ?>:</span><?= $comment["text_comment"]; ?>
                                <br><span id="data"><?= $comment["date"]; ?></span></p>
                        <?php endforeach; ?>
                    </div>
                    <?php } else echo ''; ?>
                </div>
            </li>
        <? endforeach;
    } ?>
</ul>

<!--<script>-->
<!--    let buttonAddComment = document.getElementById('addComment'),-->
<!--        xmlhttp = new XMLHttpRequest();-->
<!--    buttonAddComment.addEventListener('click', function () {-->
<!--        let name = document.getElementById('author').value.replace(/<[^>]+>/g, ''),-->
<!--            comment = document.getElementById('comments').value.replace(/<[^>]+>/g, ''),-->
<!--            image_id = document.getElementById('image_id').value.replace(/<[^>]+>/g, '');-->
<!--        if (name === '' | comment === '') {-->
<!--            alert('Заполни коммент йо');-->
<!--            return false;-->
<!--        }-->
<!--        xmlhttp.open('post', '/main/addComment', true)-->
<!--        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');-->
<!--        xmlhttp.send("name=" + encodeURIComponent(name) + "&comment=" + encodeURIComponent(comment) + "&image_id=" + encodeURIComponent(image_id));-->
<!---->
<!--    });-->
<!---->
<!--</script>-->