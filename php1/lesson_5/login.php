<?php

session_start();

include __DIR__ . '/functions.php';

if (getCurrentUser()) {
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Lesson 5 </title>
</head>
<body>
<div class="container">

    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="/index.php"> Главная </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/gallery.php"> Котогалерея </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/login.php"> Войти </a>
        </li>
        <?php if (null !== getCurrentUser()) { ?>
            <li class="nav-item">
                <p class="nav-link text-success"> <?php echo getCurrentUser(); ?> </p>
            </li>
        <?php } ?>
    </ul>

    <h3 class="display-3 text-center mb-4"> Вход </h3>

    <div class="row justify-content-center g-4 mb-4">
        <form class="col-5 d-flex flex-column align-items-center" action="/login.php" method="post">

            <div class="w-100">
                <label for="login"> Логин: </label>
                <input class="form-control mb-3" id="login" type="text" name="login">
            </div>

            <div class="w-100 mb-3">
                <label for="password"> Пароль: </label>
                <input class="form-control mb-3" id="password" type="password" name="password">
            </div>

            <input class="btn btn-primary d-block w-75 mb-3" type="submit">

            <?php
            if (
                !empty($_POST['login']) &&
                !empty($_POST['password'])
            ) {
                if (checkPassword($_POST['login'], $_POST['password'])) {
                    $_SESSION['login'] = $_POST['login']; ?>
                    <p class="text-success"> Вы успешно вошли в систему! </p>
                <?php } else { ?>
                    <p class="text-danger"> Неверный логин или пароль! </p>
                <?php }
            } ?>

        </form>
    </div>
</div>
</body>
</html>