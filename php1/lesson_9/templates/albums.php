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

    <h1 class="display-3"> Альбомы </h1>

    <?php if (!empty($albums)) { ?>
        <div class="row g-5 mb-5 mt-2">
            <?php
            foreach ($albums as $album) { ?>
                <div class="col-auto ">
                    <a style="text-decoration: none" href="/album.php?id=<?php echo $album->getId(); ?>">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $album->getPhoto(); ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $album->getTitle(); ?> </h5>
                                <p class="card-text"> <?php echo $album->getDescription(); ?> </p>
                                <p> Дата выпуска: <?php echo $album->getDate(); ?> </p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            } ?>
        </div>
    <?php } else { ?>
        <h2 class="fs-4 text-primary text-center my-5"> Альбомы пока не были добавлены, но вы можете это исправить </h2>
    <?php } ?>

    <?php
    if (!empty($user)) { ?>
        <h1 class="display-3 mb-5"> Добавить альбом </h1>

        <form class="w-50 mb-5" action="/albums.php" method="post" enctype="multipart/form-data">

            <label for="title"> Название: </label>
            <input id="title" class="form-control mb-3" type="text" name="title">

            <label for="description"> Описание: </label>
            <textarea id="description" class="form-control mb-3" type="text" name="description"></textarea>

            <label for="date"> Дата выпуска: </label>
            <input id="date" class="form-control mb-3" type="date" name="date">

            <label for="photo"> Обложка: </label>
            <input id="photo" class="form-control mb-3" type="file" name="photo"
                   accept="image/png, image/gif, image/jpeg">

            <input class="btn btn-primary" type="submit">
        </form>
        <?php
    } ?>
</div>
</body>
</html>