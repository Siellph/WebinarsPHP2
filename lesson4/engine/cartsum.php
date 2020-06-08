<?php 
include "database.php";
$login = $_COOKIE['login'];

$sql_user = "SELECT * FROM users WHERE `login` = '$login'";
$res_user = mysqli_query($connection, $sql_user);
$table_user = mysqli_fetch_assoc($res_user);

$id_user = $table_user['id'];
$sql_cart = "SELECT * FROM cart WHERE `user_id` = '$id_user'";
$res_cart = mysqli_query($connection, $sql_cart);
    $cost = 0;
    while ($table_cart = mysqli_fetch_assoc($res_cart)) {
        $sum = $table_cart['sum'];
        $cost = $cost + $sum;
    }
    ?>