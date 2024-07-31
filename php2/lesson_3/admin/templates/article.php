<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 2 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить новость</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/update_or_insert_article.php?id=<?php echo $article->getId();?>" method="post">
                <div class="modal-body">
                    <label for="title"> Название: </label>
                    <input class="form-control" id="title"
                           name="title" type="text" value="<?php echo $article->title; ?>">

                    <label for="lead"> Описание: </label>
                    <textarea class="form-control" id="lead"
                              name="lead" type="text"><?php echo $article->lead; ?></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"> Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container align-center">
    <h3 class="display-3 text-center mb-5"> Статья </h3>
    <a href="/admin/index.php" class="fs-5 mb-5"> Назад </a>
    <div class="row g-3 mb-5">
        <div class="col-12 p-3" style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
            <p class="p-0 m-0">
                Автор: <?php echo $article->author->name ?? 'нет автора'; ?>
            </p>
            <p class="fs-5"> <?php echo $article->title; ?></p>
            <p class="p-0 m-0"> <?php echo $article->lead; ?></p> </div>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Изменить
    </button>
    <a href="/admin/delete_article.php?id=<?php echo $article->getId(); ?>" class="btn btn-danger" role="button">Удалить</a>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
