<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 7 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container d-flex flex-column align-items-center justify-content-center">
    <div class="">
        <?php require_once __DIR__ . '/../navbar.php'?>
    </div>

    <section class="mb-4 w-50 ">
        <h3 class="text-center display-5 mb-4"> Войти </h3>

        <form action="/user/LoginUser" method="post">
            <div class="modal-body mb-3">
                <label for="login"> Логин: </label>
                <input class="form-control" id="login" name="login" type="text">

                <label for="password"> Пароль: </label>
                <input class="form-control" id="password" name="password" type="password">
            </div>

            <?php if (isset($authFail) && false === $authFail) { ?>
                <p class="text-danger"> Неверный логин или пароль! </p>
            <?php } ?>

            <button type="submit" class="btn btn-primary"> Подтвердить </button>
        </form>
    </section>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
