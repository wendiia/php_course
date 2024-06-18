<?php

session_start();

include __DIR__ . '/functions.php';

$images = scandir(__DIR__ . '/images');
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
            <a class="nav-link active" aria-current="page" href="/gallery.php"> Котогалерея </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login.php"> Войти </a>
        </li>
        <?php if (getCurrentUser()) { ?>
            <li class="nav-item">
                <p class="nav-link text-success"> <?php echo getCurrentUser(); ?> </p>
            </li>
        <?php } ?>
    </ul>

    <h3 class="display-3 text-center mb-4"> КотоГалерея </h3>

    <div class="row g-4 mb-4">
        <?php
        foreach ($images as $key => $image) {
            if ($image != '.' && $image != '..') { ?>
                <div class="col-3">
                    <a class="d-block" href="/image.php?id=<?php echo $key; ?>">
                        <img width="300" height="300" class="object-fit-cover mx-auto d-block"
                             src="/images/<?php echo $image; ?>" alt="cat">
                    </a>
                </div>
            <?php }
        } ?>
    </div>

    <?php if (getCurrentUser()) { ?>
        <h4 class="display-4 text-center mb-5"> Загрузи своего котика </h4>
        <form action="/upload_img.php" method="post" enctype="multipart/form-data">
            <input class="form-control mb-3" type="file" name="img" accept="image/png, image/jpeg"/>
            <input class="btn btn-primary" type="submit">
        </form>
    <?php } ?>
</div>
</body>
</html>