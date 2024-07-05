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

    <?php
    require __DIR__ . '/navigation.php'; ?>

    <h1 class="display-3"> Фотогалерея </h1>

    <?php if (!empty($images)) { ?>
    <div class="row g-5 mb-5 justify-content-center">
        <?php
        foreach ($images as $image) { ?>
            <div class="col-3">
                <a href="/image.php?id=<?php echo $image->getId(); ?>">
                    <img class="img-fluid" src="<?php echo $image->getUrl(); ?>" alt="preview">
                </a>
            </div>
            <?php
        } ?>
    </div>
    <?php } else { ?>
    <h2 class="fs-4 text-primary text-center my-5"> Фотографии пока не были добавлены, но вы можете это исправить </h2>
    <?php } ?>

    <?php
    if (!empty($user)) { ?>
        <h1 class="display-3 mb-5"> Добавить фото </h1>

        <form class="w-100 mb-5" action="/gallery.php" method="post" enctype="multipart/form-data">
            <input class="form-control mb-3" type="file" name="img">
            <input class="btn btn-primary" type="submit">
        </form>
        <?php
    } ?>
</div>
</body>
</html>