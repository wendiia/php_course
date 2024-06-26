<?php
function myscandir($path)
{
    $file_names = scandir($path);
    $files = [];
    foreach ($file_names as $file_name) {
        if ($file_name != '.' and $file_name != '..') {
            $files[] = $file_name;
        }
    }
    return $files;
}

$images = myscandir(__DIR__ . '\assets\img\photogallery');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lesson 6 </title>
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
        <li class="nav-item">
            <a class="nav-link" href="/calculator.php">Калькулятор</a>
        </li>
    </ul>
</nav>

<div class="container">

    <div class="row justify-content-center mb-4">
        <h3 class="text-center display-5 mb-4"> Фотогалерея </h3>
        <div class="col-6">
            <form action="/upload-image.php" method="post" enctype="multipart/form-data">
                <input class="form-control"  type="file" name="img" accept="image/png, image/jpeg">
                <input class="btn btn-primary w-100" type="submit">
            </form>
        </div>
    </div>

    <div class="row g-3">
        <?php
        foreach ($images as $image) { ?>
            <div class="col-md-4 col-xs-12 col-sm-6 img-wrapper">
                <a href="/image.php?file=<?php echo $image; ?>">
                    <img src="/assets/img/photogallery/<?php echo $image; ?>" class="img-fluid rounded object-fit-cover"
                         alt="guitar">
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>