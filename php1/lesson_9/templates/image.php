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

    <h1 class="display-3"> Фотогалерея </h1>
    <a href="/gallery.php" class="btn btn-primary my-3"> Назад </a>
    <div class="col-3">
        <img class="img-fluid" src="<?php echo $image->getUrl(); ?>" alt="preview">
    </div>
</div>
</body>
</html>
