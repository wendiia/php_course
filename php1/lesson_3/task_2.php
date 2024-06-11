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
    <h3 class="display-3 text-center mb-5"> КотоГалерея </h3>

    <div class="row justify-content-center g-4">
        <?php
        foreach ($images as $key => $image) {
            if ($image != '.' && $image != '..') { ?>
                <div class="col-auto">
                    <a href="/image.php?id=<?php echo $key; ?>">
                        <img width="400" height="400" class="object-fit-cover"
                             src="/images/<?php echo $image; ?>" alt="cat">
                    </a>
                </div>
            <?php }
        } ?>
    </div>
</div>
</body>
</html>