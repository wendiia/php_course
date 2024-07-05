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

    <h1 class="display-3"> Альбом "<?php echo $album->getTitle(); ?>" </h1>
    <a href="/albums.php" class="btn btn-primary my-3"> Назад </a>

    <div class="row g-5 mb-5 mt-2">
        <div class="col-auto ">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $album->getPhoto(); ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $album->getTitle(); ?> </h5>
                    <p class="card-text"> <?php echo $album->getDescription(); ?> </p>
                    <p> Дата выпуска: <?php echo $album->getDate(); ?> </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>