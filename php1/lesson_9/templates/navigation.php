<nav class="mt-3">
    <ul class="d-flex">
        <li class="me-5"><a href="/gallery.php"> Фотогалерея </a></li>
        <li class="me-5"><a href="/albums.php"> Альбомы </a></li>

        <?php
        if (!empty($_SESSION['login'])) { ?>
            <li class="me-5 fs-6 text-success fw-bold">
                <p><?php echo $_SESSION['login'];?></p>
            </li>

            <li class="me-5"><a href="/logout.php"> Выйти </a></li>
            <?php
        } else { ?>
            <li class="me-5"><a href="/login.php"> Войти </a></li>
            <?php
        } ?>

    </ul>
</nav>