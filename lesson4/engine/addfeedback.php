<?php
$name = $_GET['name'];
$score = $_GET['score'];
$feed = $_GET['feed_text'];
$contact = $_GET['contact'];
$id = $_GET['id_product'];

include "database.php";
$sql = "INSERT INTO feedback (`product_id`, `name`, `score`, `feedback`, `e-mail`) VALUES ('$id', '$name', '$score', '$feed', '$contact')";
$result = mysqli_query($connection, $sql);
echo $result;
mysqli_close($connection);

exit('<meta http-equiv="refresh" content="0; url=../goodcard.php?id='.$id.'" />');

?>