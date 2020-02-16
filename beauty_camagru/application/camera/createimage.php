<html>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image"><br>
    <button type="submit">GO</button>
</form>
</html>

<?php

function uploadImg($image)
{
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . "." . $extension;

    move_uploaded_file($image['tmp_name'], '../uploads/' . $filename);

    return $filename;
}

function createFullImg()
{

}


//$photo = $_FILES['image'];

var_dump($_POST);
echo "<br>";
var_dump($_FILES);
$img = file_get_contents($_FILES['image']['tmp_name']);
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
print $data;
file_put_contents("{$_SERVER['DOCUMENT_ROOT']}/www.png", $data);

//print_r($photo);




//$encode = explode("/", $photo["tmp_name"])[5];
//$encode2 = explode("/", $photo["tmp_name"])[6];
//$encode3 = explode("/", $photo["tmp_name"])[7];
//
//$full = $encode . $encode2 . $encode3;
//print($full);
//
//echo base64_decode(file_get_contents("uploads/images/effect.png"));
//$decocoo = base64_decode(file_get_contents("uploads/images/effect.png"));
//var_dump(imagecreatefromstring($decocoo));


