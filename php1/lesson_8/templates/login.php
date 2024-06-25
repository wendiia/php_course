<h3 class="display-3 text-center mb-4"> Вход </h3>

<div class="row justify-content-center g-4 mb-4">
    <form class="col-5 d-flex flex-column align-items-center" action="/../login.php" method="post">

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
            if (true === $this->data['checkAuth']) {
                $_SESSION['login'] = $_POST['login']; ?>
                <p class="text-success"> Вы успешно вошли в систему! </p>
            <?php } else { ?>
                <p class="text-danger"> Неверный логин или пароль! </p>
            <?php }
        } ?>

    </form>
</div>
