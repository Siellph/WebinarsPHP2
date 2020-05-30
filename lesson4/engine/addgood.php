<?php
include "database.php";
include "resize.php";

$type = $_FILES['imagegood']['type'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$full_desc = $_POST['full_desc'];
$price = $_POST['price'];
$img = $_POST['imagegood'];

$uploaddir = '../public/img/big/';
$thumbpath = '../public/img/';
$localpath = 'public/img/';
$namepic = $_FILES['imagegood']['name'];
$filename = basename($_FILES['imagegood']['name']);
$uploadfile = $uploaddir . $filename;
if (file_exists($uploadfile)) do {
    $arr = pathinfo($uploadfile);
    $uploadfile=$arr['dirname'].'/'.$arr['filename'].'_.'.$arr['extension'];
} while (file_exists($uploadfile));

if (move_uploaded_file($_FILES['imagegood']['tmp_name'], $uploadfile)) {
    $image = new SimpleImage();
    $image->load($uploadfile);
    $image->resizeToWidth(130);
    $arr = pathinfo($uploadfile);
    $newfilename = $thumbpath.$arr['basename'];
    $image->save($newfilename);
} else {
    echo "Возможная атака с помощью файловой загрузки!<br>";
}

$sql = "INSERT INTO `goods` (`name`, `path_photo`, `name_photo`, `descript`, `full_desc`, `price`) VALUES ('$name', '$localpath', '$namepic', '$desc', '$full_desc', '$price')";
$result = mysqli_query($connection, $sql);

echo $result;
mysqli_close($connection);

exit('<meta http-equiv="refresh" content="0; url=../admin.php" />');

?>

