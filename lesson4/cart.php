<?php if ($_COOKIE['login']):?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/cart.css">
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
            <ul>
            <?php if ($_COOKIE['login']):?>
            <li><a class="clickMenu" href="index.php">Каталог</a></li>
            <?php endif; ?>
            </ul>
        </div>
        <div class="block-top-auth">
        <?php if ($_COOKIE['login']):?>
            <p><a href="profile.php"><?=$_COOKIE['login']?></a></p>
            <p><a href="engine/exit.php">Выход</a></p>
        <?php endif; ?> 
        </div>
    </header>
<?= include "engine/showcart.php"?>
</body> 
</html>
<?php elseif (!($_COOKIE['login'])):?>
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
    <span><a href="auth.php">Авторизуйтесь</a></span>
</body> 
</html>
<?php endif; ?>