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
            <a href="index.php">
                <span class="use">shop</span>
            </a>
        </div>

        <div class="top-menu">
            <ul>
                <li><a class="clickMenu" href="index.php">Каталог</a></li>
            </ul>
        </div>
        <div class="block-top-auth">
        <?php if ($_COOKIE['login']):?>
            <p><a href="profile.php"><?=$_COOKIE['login']?></a></p>
            <p><a href="engine/exit.php">Выход</a></p>
        <?php else:?>
        <p><a href="auth.php">Вход</a></p>
        <p><a href="registration.php">Регистрация</a></p>
        <?php endif; ?> 
        </div>
    </header>
    <?php
    include "engine/onegood.php";
    ?>
    <div class="feedback">
        <div class="feed_left">
        <?php
        include "engine/feedback.php";
        ?>
        </div>
        <div class="feed_right">
            <form class="form" action="engine/addfeedback.php" method="GET">
            <input class="textbox cap" type="text" placeholder="Введите имя" name="name" required>
            <div class="select_score">Выберите оценку
            <input type="radio" value="1" name="score">1</input>
            <input type="radio" value="2" name="score">2</input>
            <input type="radio" value="3" name="score">3</input>
            <input type="radio" value="4" name="score">4</input>
            <input type="radio" value="5" name="score">5</input>
            </div>
            <textarea name="feed_text" class="message" cols="4" rows="4" placeholder="Оставьте отзыв" required></textarea>
            <input class="textbox" type="email" placeholder="Введите ваш e-mail" name="contact">
            <input type="hidden" name="id_product" value="<?=$id?>">
            <input class="button" type="submit"  value="Отправить">
            </form>
        </div>
    </div>
</body>

</html>