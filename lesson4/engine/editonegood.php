<?php
include "database.php";

$id = $_GET['id'];

$sql = "SELECT * FROM goods WHERE id = $id";
$result = mysqli_query($connection, $sql);

$full_good = mysqli_fetch_assoc($result);

$good_title = $full_good['name'];
$path_photo = $full_good['path_photo'];
$desc = $full_good['descript'];
$good_fulldesc = $full_good['full_desc'];
$good_price = $full_good['price'];
$name_photo = $full_good['name_photo'];

echo '<div class="all_goods">';
echo '<div class="good">';
echo '<div class="left_block">';
echo '<img class="good_img" src="'.$path_photo.'big/'.$name_photo.'">';
echo '</div>';
echo '<form action="../engine/saveeditonegood.php" method="POST" enctype="multipart/form-data">';
echo '<input class="textbox" type="text" placeholder="Наименование товара" name="name" value="'.$good_title.'" required>';
echo '<input name="imagegood" type="file" class="textbox">';
echo '<textarea name="desc" class="message" cols="3" rows="3" placeholder="Краткое описание" required>'.$desc.'</textarea>';
echo '<textarea name="full_desc" class="message" cols="4" rows="9" placeholder="Полное описание" required>'.$good_fulldesc.'</textarea>';
echo '<input type="hidden" name="id" value="'.$id.'">';
echo '<input class="textbox" type="number" placeholder="Укажите цену продажи" name="price" value="'.$good_price.'" required>';
echo '<input class="button" type="submit"  value="Сохранить">';
echo '</form>';
echo '</div>';
echo '</div>';

mysqli_close($connection);
?>