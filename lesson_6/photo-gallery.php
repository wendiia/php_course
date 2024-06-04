<?php
function myscandir($path)
{
    $files = [];
    foreach ($path as $key => $item) {
        if ($item != '.' and $item != '..') {
            $files[$key] = $item;
        }
    }
    return $files;
}

$path = scandir(__DIR__ . '/assets');
$images = myscandir($path);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lesson 5 </title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<nav class="container-fluid mb-4">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/songs.php">Песни</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/fingerings.php">Аппликатуры</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/photo-gallery.php">Фотогаллерея</a>
        </li>
    </ul>
</nav>

<div class="container">
    <div class="row g-3">
        <div class="col-md-4 col-xs-12 col-sm-6 img-wrapper">
            <?php
            foreach ($images as $image) { ?>
                <a href="/image.php?file=guitar1.jpg">
                    <img src="/assets/img/guitar1.jpg" class="img-fluid rounded object-fit-cover" alt="guitar_1">
                </a>
            <?php } ?>
        </div>
        <!--        <div class="col-md-4 col-xs-12 col-sm-6 img-wrapper">-->
        <!--            <a href="/image.php?file=guitar2.jpg"><img src="/assets/img/guitar2.jpg"-->
        <!--                                                       class="img-fluid rounded object-fit-" alt="guitar_1"></a>-->
        <!--        </div>-->
        <!--        <div class="col-md-4 col-xs-12 col-sm-6 img-wrapper">-->
        <!--            <a href="/image.php?file=guitar3.jpg"><img src="/assets/img/guitar3.jpg" class="img-fluid rounded "-->
        <!--                                                       alt="guitar_1"></a>-->
        <!--        </div>-->
        <!--        <div class="col-md-4 col-xs-12 col-sm-6 img-wrapper">-->
        <!--            <a href="/image.php?file=guitar4.jpg"><img src="/assets/img/guitar4.png" class="img-fluid rounded "-->
        <!--                                                       alt="guitar_1"></a>-->
        <!--        </div>-->
        <!--        <div class="col-md-4 col-xs-12 col-sm-6 img-wrapper">-->
        <!--            <a href="/image.php?file=guitar5.jpg"><img src="/assets/img/guitar5.jpg" class="img-fluid rounded "-->
        <!--                                                       alt="guitar_1"></a>-->
        <!--        </div>-->
        <!--        <div class="col-md-4 col-xs-12 col-sm-6 img-wrapper">-->
        <!--            <a href="/image.php?file=guitar6.jpg"><img src="/assets/img/guitar6.jpg" class="img-fluid rounded "-->
        <!--                                                       alt="guitar_1"></a>-->
        <!--        </div>-->
    </div>

</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>