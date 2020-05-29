<?php if (($_COOKIE['login'] == 'admin') && ($_COOKIE['pass']=='21232f297a57a5a743894a0e4a801fc3')):?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/header.css">
    <link rel="stylesheet" href="public/css/addgood.css">
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
                <li><a class="clickMenu" href="admin.php">Каталог</a></li>
            </ul>
        </div>
        <div class="block-top-auth">
            <p><a href="profile.php"><?=$_COOKIE['login']?></a></p>
            <p><a href="engine/exit.php">Выход</a></p>
        </div>
    </header>

    <form action="engine/addgood.php" method="POST" enctype="multipart/form-data">
            <input class="textbox" type="text" placeholder="Наименование товара" name="name" required>
            <input name="imagegood" type="file" class="textbox" required>
            <textarea name="desc" class="message" cols="4" rows="20" placeholder="Краткое описание" required></textarea>
            <textarea name="full_desc" class="message" cols="4" rows="50" placeholder="Полное описание" required></textarea>
            <input class="textbox" type="number" placeholder="Укажите цену продажи" name="price" required>
            <input class="button" type="submit"  value="Сохранить">
            </form>

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