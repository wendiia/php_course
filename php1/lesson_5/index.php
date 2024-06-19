<?php

session_start();

include __DIR__ . '/functions.php';

$path = __DIR__ . '/records.txt';
$records = fileRead($path);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 5 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container align-center">
    <section class="comments mb-4">

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
            <?php if (null !== getCurrentUser()) { ?>
                <li class="nav-item">
                    <p class="nav-link text-success"> <?php echo getCurrentUser(); ?> </p>
                </li>
            <?php } ?>
        </ul>

        <h3 class="text-center display-5 mb-4"> Гостевая книга </h3>

        <div class="row g-3 mb-3">
            <?php if (null !== $records) {
                foreach ($records as $record) { ?>
                    <div class="col-12 p-3" style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
                        <p class="p-0 m-0"> <?php echo $record; ?></p>
                    </div>
                <?php }
            } else { ?>
                <p class="text-secondary text-center display-6"> Пока нет никаки записей! </p>
            <?php } ?>
        </div>

        <h5 class="text-center display-6 mb-3"> Новая запись </h5>
        <form action="/upload_record.php" method="post" class="d-flex flex-column mb-5">
            <label class="mb-2" for="inputRecord"> Введите текст: </label>
            <input class="mb-3 form-control" id="inputRecord" type="text" name="record">
            <input class="btn btn-primary" type="submit" value="Добавить">
        </form>

    </section>
</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

