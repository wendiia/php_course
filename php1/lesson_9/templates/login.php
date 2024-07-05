<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lesson 9 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container justify-content-center align-items-center d-flex flex-column">

    <?php require __DIR__ . '/navigation.php'; ?>

    <h1 class="display-3 mb-5"> Войти </h1>

    <?php if (isset($checkAuth) && true === $checkAuth) { ?>
        <h2 class="fs-4 text-success text-center"> Вы успешно вошли в систему! </h2>
    <?php  } else { ?>
        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <form action="/login.php" method="post">
                    <label class="display-6 mb-2" for="login"> Логин: </label>
                    <input class="form-control d-inline mb-3" id="login" type="text" name="login"
                           value="<?php echo !empty($login) ? $login : '' ?>">

                    <label class="display-6 mb-2" for="password"> Пароль: </label>
                    <input class="form-control d-inline mb-5" id="password" type="password" name="password">

                    <input class="btn btn-primary w-100 mb-3" type="submit">

                    <?php
                    if (isset($checkAuth)) {
                        if (false === $checkAuth) { ?>
                            <h2 class="fs-6 text-danger text-center"> Неверный логин или пароль! </h2>
                            <?php
                        }
                    } ?>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
</body>
</html>