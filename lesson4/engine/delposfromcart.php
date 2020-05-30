<?php
include "database.php";
$pos_id = $_POST['pos_id'];
$sql = "DELETE FROM `cart` WHERE `id` = '$pos_id'";
$res = mysqli_query($connection, $sql);
exit('<meta http-equiv="refresh" content="0; url=../cart.php" />');
mysqli_close($connection);
print_r($sql);
?>