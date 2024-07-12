<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 8 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container align-center">
    <h3 class="display-3 text-center mb-5"> Статья </h3>
    <a href="../index.php" class="fs-5 mb-5"> Назад </a>
    <div class="row g-3 mb-5">
        <div class="col-12 p-3" style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
            <p class="p-0 m-0"> <?php echo $this->data['article']->getAuthor(); ?></p>
            <p class="fs-5">
                <?php echo $article->getTitle(); ?>
            </p>
            <p class="p-0 m-0"> <?php echo $article->getText(); ?></p>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
