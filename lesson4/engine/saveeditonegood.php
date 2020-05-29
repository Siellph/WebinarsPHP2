<?php
include "database.php";
include "resize.php";
print_r($_FILES);
$id = $_POST['id'];

$sqlimg = "SELECT * FROM goods WHERE id = $id";
$resultimg = mysqli_query($connection, $sqlimg);
$goodimg = mysqli_fetch_assoc($resultimg);
$path_photo = $goodimg['path_photo'];
$name_photo = $goodimg['name_photo'];
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
$imgsmall = "../".$path_photo . $name_photo;
$imgbig = "../".$path_photo."big/".$name_photo;
$size = $_FILES['imagegood']['size'];

if ($size != 0) {
function deletesmall($imgsmall)
{
    if(file_exists($imgsmall)) unlink($imgsmall); 
    if(file_exists($imgsmall) == FALSE);  
}
deletesmall($imgsmall);

function deletebig($imgbig)
{
    if(file_exists($imgbig)) unlink($imgbig); 
    if(file_exists($imgbig) == FALSE);  
}
deletebig($imgbig);

if (file_exists($uploadfile)) do {
    $arr = pathinfo($uploadfile);
    $uploadfile=$arr[dirname].'/'.$arr[filename].'_.'.$arr[extension];
} while (file_exists($uploadfile));

if (move_uploaded_file($_FILES['imagegood']['tmp_name'], $uploadfile)) {
    $image = new SimpleImage();
    $image->load($uploadfile);
    $image->resizeToWidth(130);
    $arr = pathinfo($uploadfile);
    $newfilename = $thumbpath.$arr[basename];
    $image->save($newfilename);
}

$sql = "UPDATE goods SET `name` = '$name', `path_photo` = '$localpath', `name_photo` = '$namepic', `descript` = '$desc', `full_desc` = '$full_desc', `price` = '$price' WHERE `id` = '$id'";
$result = mysqli_query($connection, $sql);

echo $result;
mysqli_close($connection);
} else {
    $sql = "UPDATE goods SET `name` = '$name', `descript` = '$desc', `full_desc` = '$full_desc', `price` = '$price' WHERE `id` = '$id'";
    $result = mysqli_query($connection, $sql);
    
    echo $result;
    mysqli_close($connection);
}

exit('<meta http-equiv="refresh" content="0; url=../goodcardedit.php?id='.$id.'" />');

?>
