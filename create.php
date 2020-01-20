<?php

function uploadImg($image)
{
    $name = $image['name'];
    $tmp_name = $image['tmp_name'];

    move_uploaded_file($tmp_name, 'uploads/' . $name);
}

//var_dump($_FILES['image']);

uploadImg($_FILES['image']);
?>

<img src="/uploads/adventuretime.jpg">

