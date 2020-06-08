<?php
include "database.php";
$login = $_COOKIE['login'];
$sql = "SELECT * FROM users WHERE `login`='$login'";
$res = mysqli_query($connection, $sql);
$table = mysqli_fetch_assoc($res);
$role = $table['role'];

$id = $_GET['id'];

$sql = "SELECT * FROM goods WHERE id = $id";
$result = mysqli_query($connection, $sql);

$full_good = mysqli_fetch_assoc($result);

$good_title = $full_good['name'];
$path_photo = $full_good['path_photo'];
$desc = $descript['descript'];
$good_fulldesc = $full_good['full_desc'];
$good_price = $full_good['price'];
$name_photo = $full_good['name_photo'];?>

<div class="all_goods">
<div class="good">
<div class="left_block">
<img class="good_img" src="<?=$path_photo?>/big/<?=$name_photo?>">
</div>
<div class="right_block">
<p class="title"><?=$good_title?></p>
<span class="desc"><?=$descript?></span>
<span class="desc"><?=$good_fulldesc?></span>
<?php if ($login):?>
    <form class="nonform" action="engine/addtocart.php" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="hidden" name="price" value="<?=$good_price?>">
    <input type="submit" class="buy" value="В корзину <?=$good_price?>&#36;">
    </form>
    <?php elseif (!$login):?>
        <a class="nonform" href="auth.php"><input type="button" class="buy" value="В корзину <?=$good_price?>&#36;"></a>
    <?php endif;?>
</div>
</div>
</div>
<?php
mysqli_close($connection);
?>