<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/auth.css">
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
                <li><a class="clickMenu" href="index.php">Каталог</a></li>
            </ul>
        </div>
        <div class="block-top-auth">
            <p><a href="registration.php">Регистрация</a></p>
        </div>
    </header>
    <form action="engine/authserv.php" method="POST">
        <?php if ($_GET['success'] == 'true' && $_COOKIE['login']):?>
        <h3 class="true">Вы вошли как, <?=$_COOKIE['login']?>!</h3>
        <?php elseif ($_GET['success'] == 'false' && $_COOKIE['login']):?>
        <h3 class="false">Ошибка авторизации! Проверьте правильность вводимых данных!</h3>
        <?php endif; ?>
        <input class="textbox" type="text" placeholder="Введите ваш логин" name="login" value="<?=$_COOKIE['login']?>"
            required>
        <input class="textbox" type="password" placeholder="Укажите пароль" name="pass" value="<?=$_COOKIE['pass']?>"
            required>
        <input class="button" type="submit" value="Войти">
    </form>
</body>

</html>