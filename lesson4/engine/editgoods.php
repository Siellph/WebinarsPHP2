<?php
include "database.php";

$sql = "SELECT * FROM goods WHERE id > 0";
$result = mysqli_query($connection, $sql);
?>
<main class="all_goods">
<?php
if (mysqli_num_rows($result) > 0) {
    while($good = mysqli_fetch_assoc($result)) {
        $good_title = $good['name'];
        $path_photo = $good['path_photo'];
        $good_descript = $good['descript'];
        $good_price = $good['price'];
        $name_photo = $good['name_photo'];
        $id = $good['id'];
        echo '<div class="good">';
        echo '<div class="left_block">';
        echo '<p class="title">'.$good_title.'</p>';
        echo '<img class="good_img" src="'.$path_photo.$name_photo.'">';
        echo '<p class="title">'.$good_price.'&#36;</p>';
        echo '</div>';
        echo '<div class="right_block">';
        echo '<span class="desc">'.$good_descript.'</span>';
        echo '<div class="control">';
        echo '<a id="'.$id.'" href="goodcardedit.php?id='.$id.'" class="more_title edit">Редактировать</a>';
        echo '<a id="'.$id.'" href="engine/delgood.php?id='.$id.'" class="more_title delete">Удалить</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "В базе нет товаров";
}
?>
</main>
<?php
mysqli_close($connection);
?>