<?php
include "database.php";
$id_user = $_POST['user_id'];
$sql = "DELETE FROM `cart` WHERE `user_id` = '$id_user'";
$res = mysqli_query($connection, $sql);
mysqli_close($connection);
exit('<meta http-equiv="refresh" content="0; url=../cart.php" />');
?>