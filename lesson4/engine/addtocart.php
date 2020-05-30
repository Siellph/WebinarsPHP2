<?php
include "database.php";
$login = $_COOKIE['login'];
$product_id = $_POST['id'];
$product_price = $_POST['price'];

$sql_user = "SELECT * FROM users WHERE `login`='$login'";
$res_user = mysqli_query($connection, $sql_user);
$table_user = mysqli_fetch_assoc($res_user);
$user_id = $table_user['id'];

$sql_cart = "SELECT * FROM cart WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
$res_cart = mysqli_query($connection, $sql_cart);

$sql_cart_ins = "INSERT INTO `cart` (`user_id`,`product_id`,`price`,`sum`) VALUES ('$user_id','$product_id','$product_price','$product_price')";

if (mysqli_num_rows($res_cart) > 0) {
$table_cart = mysqli_fetch_assoc($res_cart);
$count_in_cart = $table_cart['count'];
$sum_in_cart = $table_cart['sum'];
$count = $count_in_cart+1;
$sum = $product_price * $count;
$sql_cart_upd = "UPDATE `cart` SET `count`='$count', `sum`='$sum' WHERE `user_id`='$user_id' AND `product_id`='$product_id'";
$res_cart_upd = mysqli_query($connection, $sql_cart_upd);
} else {
    $res_cart_ins = mysqli_query($connection, $sql_cart_ins);
}
header("Location: ../index.php");
?>