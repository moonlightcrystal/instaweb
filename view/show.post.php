<?php

foreach ($posts as $post):?>

<h2><?= $post['title']?></h2>
<img src="../uploads/<?=$post['name'];?>" width="100px">
<?php endforeach;?>
