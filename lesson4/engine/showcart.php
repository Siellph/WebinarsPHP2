<?php
include "database.php";

$login = $_COOKIE['login'];

$sql_user = "SELECT * FROM users WHERE `login` = '$login'";
$res_user = mysqli_query($connection, $sql_user);
$table_user = mysqli_fetch_assoc($res_user);

$id_user = $table_user['id'];

$sql_cart = "SELECT * FROM cart WHERE `user_id` = '$id_user'";
$res_cart = mysqli_query($connection, $sql_cart);

$product_id = $table_cart['product_id'];

if (mysqli_num_rows($res_cart) > 0) { ?>
<table class="showcart">
<th>Изображение</th>
<th>Название</th>
<th>Стоимость</th>
<th>Количество</th>
<th>Цена</th>
<?php
if (mysqli_num_rows($res_cart) > 0) {
    while ($table_cart = mysqli_fetch_assoc($res_cart)) {
        $product_id = $table_cart['product_id'];
        $pos_id = $table_cart['id'];
        $sql_goods = "SELECT * FROM goods WHERE `id` = '$product_id'";
        $res_goods = mysqli_query($connection, $sql_goods);
        $table_goods = mysqli_fetch_assoc($res_goods);
        $pic = $table_goods['name_photo'];
        $name = $table_goods['name'];
        $price = $table_cart['price'];
        $count = $table_cart['count'];
        $sum = $table_cart['sum'];
        ?>
<tr>
    <td>
        <a href="goodcard.php?id=<?=$product_id?>" class="more_img">
        <img class="img" src="public/img/<?=$pic?>">
        </a>
    </td>
    <td>
        <a href="goodcard.php?id=<?=$product_id?>" class="more_title">
            <p class="title"><?=$name?></p>
        </a>
    </td>
    <td>
        <p class="price"><?=$price?>&#36;</p>
    </td>
    <td>
<form action="engine/editcount.php" method="POST">
    <input type="hidden" name="pos_id" value="<?=$pos_id?>">
    <input class="edit_count" type="submit" value="-" name="minus">
    <label class="count" name="count"><?=$count?></input>
    <input class="edit_count" type="submit" value="+" name="plus">
</form>
    </td>
    <td>
<p class="sum"><?=$sum?>&#36;</p>
    </td>
    <td>
<form class="del_pos" action="engine/delposfromcart.php" method="POST">
    <input type="hidden" name="pos_id" value="<?=$pos_id?>">
    <input class="delete" type="submit" value="Удалить из корзины">
</form>
    </td>
    </tr>
<?php
}
}
 ?>
<td colspan="3">
    <input type="button" class="buy" value="Оформить заказ">
</td>
<td>Итого:</td>
<td>
<?php 
$sql_cart = "SELECT * FROM cart WHERE `user_id` = '$id_user'";
$res_cart = mysqli_query($connection, $sql_cart);
    $cost = 0;
    while ($table_cart = mysqli_fetch_assoc($res_cart)) {
        $sum = $table_cart['sum'];
        $cost = $cost + $sum;
    }
    ?>
    <p class="final_cost"><?=$cost?>&#36;</p>
</td>
<td>
    <form action="engine/delallcart.php" method="POST">
    <input type="hidden" name="user_id" value="<?=$id_user?>">
    <input type="submit" name="delcart" class="delete" value="Очистить корзину">
    </form>
</td>
</table>
<?php
} else {
    ?> <h3>В корзине пусто. Вернитесь в <a href="index.php">каталог</a>, чтобы выбрать товар!</h3> <?php
}
?>