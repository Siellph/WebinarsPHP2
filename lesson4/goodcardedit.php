<?php if ($_COOKIE['login'] == 'admin' && md5($_COOKIE['pass']=='21232f297a57a5a743894a0e4a801fc3')):?>
<?php
include "engine/database.php";
$id = $_GET['id'];
$sql = "SELECT * FROM goods WHERE id = $id";
$result = mysqli_query($connection, $sql);
$full_good = mysqli_fetch_assoc($result);
$good_title = $full_good['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style_for_onegood.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/feed.css">
    <title><?=$good_title?></title>
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
                <li><a class="clickMenu" href="admin.php">Каталог</a></li>
            </ul>
        </div>
        <div class="block-top-auth">
            <p><a href="profile.php"><?=$_COOKIE['login']?></a></p>
            <p><a href="engine/exit.php">Выход</a></p>
        </div>
    </header>
    <?php
    include "engine/editonegood.php";
    ?>
</body>

</html>
<?php elseif($_COOKIE['login'] != 'admin'): ?>
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

        <div class="top-menu">

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