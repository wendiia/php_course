<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 3 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container align-center">
    <section class="mb-4">
        <h3 class="text-center display-5 mb-4"> Новости </h3>
        <div class="row g-3 mb-5">
            <?php
            if (!empty($news)) :
                foreach ($news as $article) : ?>
                    <div class="col-12 p-3" style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
                        <p class="p-0 m-0">
                            Автор: <?php echo $article->author->name ?? 'нет автора'; ?>
                        </p>
                        <a class="fs-5" href="/admin/article.php?id=<?php echo $article->getId(); ?>">
                            <?php echo $article->title ?>
                        </a>
                        <p class="p-0 m-0"><?php echo $article->lead; ?></p>
                    </div>
                <?php endforeach;
            else : ?>
                <p class="display-3"> Упс, новостей пока нет!</p>
            <?php endif; ?>
        </div>

        <form action="/admin/update_or_insert_article.php" method="post">
            <label for="title"> Название: </label>
            <input class="form-control" id="title" name="title" type="text">

            <label for="lead"> Описание: </label>
            <textarea class="form-control" id="lead" name="lead" type="text"></textarea>

            <input class="btn btn-primary" type="submit">
        </form>

    </section>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
