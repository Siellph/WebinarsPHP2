<?php
include "database.php";
$pos_id = $_POST['pos_id'];

$sql = "SELECT * FROM `cart` WHERE `id` = '$pos_id'";
$res = mysqli_query($connection, $sql);
$table = mysqli_fetch_assoc($res);
$price = $table['price'];
$count = $table['count'];
$sum = $table['sum'];

if ($count == 1 && $_POST['minus'] == '-') {
    include "delposfromcart.php";
} elseif ($_POST['plus'] == '+') {
    $new_count = $count + 1;
    $new_sum = $sum + $price;
    $sql_upd = "UPDATE `cart` SET `count` = '$new_count', `sum` = '$new_sum' WHERE `id` = '$pos_id'";
    $res_upd = mysqli_query($connection, $sql_upd);
} else {
    $new_count = $count - 1;
    $new_sum = $sum - $price;
    $sql_upd = "UPDATE `cart` SET `count` = '$new_count', `sum` = '$new_sum' WHERE `id` = '$pos_id'";
    $res_upd = mysqli_query($connection, $sql_upd);
}
mysqli_close($connection);
exit('<meta http-equiv="refresh" content="0; url=../cart.php" />');
?>