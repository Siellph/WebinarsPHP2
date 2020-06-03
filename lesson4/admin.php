<?php
include "engine/database.php";
$login = $_COOKIE['login'];
$sql = "SELECT * FROM users WHERE `login`='$login'";
$res = mysqli_query($connection, $sql);
$table = mysqli_fetch_assoc($res);
$role = $table['role'];
?>
<?php if ($_COOKIE['login'] == 'admin' && $role=='1' && md5($_COOKIE['pass']=='21232f297a57a5a743894a0e4a801fc3')):?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="stylesheet" href="public/css/header.css">
    <title>shop</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="admin.php">
                <span class="use">shop</span>
            </a>
        </div>

        <div class="top-menu">
            <ul>
                <li><a class="clickMenu" href="addgood.php">Добавить товар</a></li>
            </ul>
        </div>
        <div class="block-top-auth">
            <p><a href="profile.php"><?=$_COOKIE['login']?></a></p>
            <p><a href="engine/exit.php">Выход</a></p>
        </div>
    </header>
        <?= include "engine/editgoods.php"?>
</body> 
</html>
<?php elseif($_COOKIE['login'] != 'admin' && $role!='1' && md5($_COOKIE['pass']!='21232f297a57a5a743894a0e4a801fc3')): ?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/access_denide.css">
    <title>shop</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <span class="use">shop</span>
            </a>
        </div>
        <div class="block-top-auth">
            <p><a href="auth.php">Вход</a></p>
            <p><a href="registration.php">Регистрация</a></p>
        </div>
    </header>
    <h1 class="access_denide">Доступ запрещен!</h1>
    <span><a href="index.php">Вернуться на главную страницу</a></span>
</body> 
</html>
<?php endif; ?>