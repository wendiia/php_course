<nav class="mt-3">
    <ul class="d-flex">
        <li class="me-5"><a href="/"> Новости </a></li>

        <?php
        if (!empty($_SESSION['login'])) { ?>
            <li class="me-5 fs-6 text-success fw-bold">
                <p><?php echo $_SESSION['login'];?></p>
            </li>

            <li class="me-5"><a href="/auth/LogoutUser"> Выйти </a></li>
            <?php
        } else { ?>
            <li class="me-5"><a href="/auth/login"> Войти </a></li>
            <li class="me-5"><a href="/auth/register"> Регистрация </a></li>
            <?php
        } ?>

    </ul>
</nav>