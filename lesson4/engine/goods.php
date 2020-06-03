<?php
include "database.php";
$login = $_COOKIE['login'];
$sqllog = "SELECT * FROM users WHERE `login`='$login'";
$reslog = mysqli_query($connection, $sql);
$table = mysqli_fetch_assoc($res);
$role = $table['role'];

$lim = $_GET['lim'];

$sql = "SELECT * FROM goods LIMIT $lim";
$result = mysqli_query($connection, $sql);
?>
<main class="all_goods">
<?php

if (mysqli_num_rows($result) > 0) {
    while ($good = mysqli_fetch_assoc($result)) {
        $good_title = $good['name'];
        $path_photo = $good['path_photo'];
        $good_descript = $good['descript'];
        $good_price = $good['price'];
        $name_photo = $good['name_photo'];
        $id = $good['id']; ?>
        <div class="good">
        <div class="left_block">
        <a id="<?=$id?>" href="goodcard.php?id=<?=$id?>" class="more_title"><p class="title"><?=$good_title?></p></a>
        <a id="<?=$id?>" href="goodcard.php?id=<?=$id?>" class="more_img"><img class="good_img" src="<?=$path_photo.$name_photo?>"></a>
        </div>
        <div class="right_block">
        <span class="desc"><?=$good_descript?></span>
        <?php if ($login):?>
        <form action="engine/addtocart.php" method="POST">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="hidden" name="price" value="<?=$good_price?>">
        <input type="submit" class="buy" value="В корзину <?=$good_price?>&#36;">
        </form>
        <?php elseif (!$login):?>
            <a href="auth.php"><input type="button" class="buy" value="В корзину <?=$good_price?>&#36;"></a>
        <?php endif;?>
        </div>
        </div>
    <?php
}
}
?>
</main>
<div class = "showMore">
    <a id="<?= $lim = $lim + 3?>" class="clickMenu" href="index.php?lim=<?= $lim?>">Показать еще</a>
    <a id="<?= $lim = $lim - 6?>" class="clickMenu" href="index.php?lim=<?= $lim?>">Скрыть часть</a>
    <a class="clickMenu" href="index.php?lim=3">Скрыть все</a>
</div>
<?php
mysqli_close($connection);
?>