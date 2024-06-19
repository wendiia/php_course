<?php

include_once __DIR__ . "/Authentication.php";

$exAuthentication = new Authentication;
$currentUser = $exAuthentication->getCurrentUser();
?>

<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/index.php"> Главная </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/gallery.php"> Котогалерея </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/login.php"> Войти </a>
    </li>
    <?php if ($currentUser) { ?>
        <li class="nav-item">
            <p class="nav-link text-success"> <?php echo $currentUser; ?> </p>
        </li>
    <?php } ?>
</ul>