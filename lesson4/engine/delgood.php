<?php
include "database.php";

$id = $_GET['id'];

$sqlimg = "SELECT * FROM goods WHERE id = $id";
$resultimg = mysqli_query($connection, $sqlimg);
$goodimg = mysqli_fetch_assoc($resultimg);
$path_photo = $goodimg['path_photo'];
$name_photo = $goodimg['name_photo'];

$imgsmall = "../".$path_photo . $name_photo;
$imgbig = "../".$path_photo."big/".$name_photo;
print_r($imgsmall);

function deletesmall($imgsmall)
{
    if(file_exists($imgsmall)) unlink($imgsmall); 
    if(file_exists($imgsmall) == FALSE) echo $imgsmall." файл удален";  
}
deletesmall($imgsmall);

function deletebig($imgbig)
{
    if(file_exists($imgbig)) unlink($imgbig); 
    if(file_exists($imgbig) == FALSE) echo $imgbig." файл удален";  
}
deletebig($imgbig);

$sql = "DELETE FROM goods WHERE id = $id";
$result = mysqli_query($connection, $sql);
echo $result;
mysqli_close($connection);

exit('<meta http-equiv="refresh" content="0; url=../admin.php" />');

?>