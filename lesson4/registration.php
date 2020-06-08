<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/reg.css">
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
            <p><a href="auth.php">Вход</a></p>
        </div>
    </header>
    <form action="engine/regserv.php" method="POST">
    <?php if ($_GET['success']=='true'):?>
        <h3 class="true">Вы успешно зарегистрированы!</h3>
        <?php elseif($_GET['success']=='false'):?>
            <h3 class="false">Данный логин уже занят!</h3>
        <?php endif; ?>
            <input class="textbox" type="text" placeholder="Имя" name="firstname" value="<?=$_COOKIE['firstname']?>" required>
            <input class="textbox" type="text" placeholder="Фамилия" name="lastname" value="<?=$_COOKIE['lastname']?>" required>
            <input class="textbox" type="text" placeholder="Укажите логин" name="login" value="<?=$_COOKIE['loginreg']?>" required>
            <input class="textbox" type="password" placeholder="Задайте пароль" name="pass" value="<?=$_COOKIE['passreg']?>" required>
            <input class="textbox" type="email" placeholder="Укажите e-mail" name="mail" value="<?=$_COOKIE['mail']?>" required>
            <input class="button" type="submit"  value="Отправить">
            </form>
</body>
</html>
