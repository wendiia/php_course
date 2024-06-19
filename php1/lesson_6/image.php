<?php
$images = scandir(__DIR__ . '/images');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Lesson 3 </title>
</head>
<body>
<div class="container">
    <h3 class="display-3 text-center mb-5"> КотоФото </h3>

    <?php if (!empty($_GET['id']) && !empty($images[$_GET['id']])) { ?>

    <div class="row justify-content-center g-4">
        <div class="col-auto">
            <img width="400" height="400" class="object-fit-cover" src="/images/<?php echo $images[$_GET['id']];?>" alt="cat">
        </div>
    </div>

    <?php }
    else { ?>
        <p class="text-danger display-1 text-center"> Фото такого котика нет! </p>
    <?php }?>
</div>
</body>
</html>