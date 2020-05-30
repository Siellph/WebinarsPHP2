<?php
$sqlserver = "localhost";
$sqluser = "root";
$sqlpass = "root";
$sqlbase = "shop";

$connection = mysqli_connect($sqlserver, $sqluser, $sqlpass, $sqlbase);

if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL<br>";
    echo "<br>Код ошибки: " . mysqli_connect_errno();
    echo "<br>Текст ошибки: " . mysqli_connect_error();
    exit;
}
?>