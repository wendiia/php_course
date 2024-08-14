<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 6 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <div class="">
        <?php require_once __DIR__ . '/../navbar.php'?>
    </div>

    <section class="mb-4">
        <h3 class="text-center display-5 mb-4"> Новости </h3>
        <div class="row g-3 mb-5">
            <?php foreach ($news as $article) {
                ?>
                <div class="col-12 p-3 d-flex justify-content-between align-items-center"
                     style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
                    <div class="">
                        <p class="p-0 m-0">
                            Автор: <?php echo $article->author_id ? $article->author->name : 'Нет автора'; ?>
                        </p>
                        <a class="fs-5" href="/index/one?id=<?php echo $article->id; ?>">
                            <?php echo $article->title; ?>
                        </a>
                        <p class="p-0 m-0">
                            <?php echo $article->lead; ?>
                        </p>

                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
