<?php
include "database.php";

$firstname = (!empty($_POST['firstname']))?strip_tags($_POST['firstname']):"";
$lastname = (!empty($_POST['lastname']))?strip_tags($_POST['lastname']):"";
$login = (!empty($_POST['login']))?strip_tags($_POST['login']):"";
$pass = (!empty($_POST['pass']))?strip_tags($_POST['pass']):"";
$mail = (!empty($_POST['mail']))?strip_tags($_POST['mail']):"";

$sqllog = "SELECT * FROM users WHERE `login`='$login'";
$reslog = mysqli_query($connection, $sqllog);

$sql = "INSERT INTO users (`login`, `pass`, `firstname`, `lastname`, `mail`) VALUES ('$login', md5('$pass'), '$firstname', '$lastname', '$mail')";
$res = mysqli_query($connection, $sql);

if (mysqli_num_rows($reslog) > 0) {
    setcookie("firstname",$firstname,time()+30,'/');
    setcookie("lastname",$lastname,time()+30,'/');
    setcookie("loginreg",$login,time()+30,'/');
    setcookie("passreg",$pass,time()+30,'/');
    setcookie("mail",$mail,time()+30,'/');
    header("Location: ../registration.php?success=false");
} else {
    $res;
    header("Location: ../registration.php?success=true");
}

mysqli_close($connection);

?>