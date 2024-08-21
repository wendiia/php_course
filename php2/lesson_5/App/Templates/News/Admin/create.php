<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 5 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container align-center">
    <section class="mb-4">
        <h3 class="text-center display-5 mb-4"> Добавить новость </h3>

        <form action="/admin/index/save" method="post">
            <div class="modal-body mb-5">

                <label for="author"> Автор: </label>
                <select name="author_id" id="author" class="form-select" aria-label="select example">
                    <option value="0" selected> Выберите автора </option>
                    <?php if (!empty($authors)) {
                        foreach ($authors as $author) { ?>
                            <option value="<?php echo $author->id ?>"> <?php echo $author->name ?> </option>
                        <?php }
                    } ?>
                </select>
                <?php if (!empty($errors['author_id'])) {
                    foreach ($errors['author_id']->getErrors() as $error) { ?>
                        <p class="text-danger py-0 my-0"> <?php echo $error->getMessage(); ?> </p>
                    <?php }
                } ?>

                <label for="title"> Название: </label>
                <input class="form-control" id="title" name="title" type="text">
                <?php if (!empty($errors['title'])) {
                    foreach ($errors['title']->getErrors() as $error) { ?>
                        <p class="text-danger py-0 my-0"> <?php echo $error->getMessage(); ?> </p>
                    <?php }
                } ?>

                <label for="lead"> Описание: </label>
                <textarea class="form-control" id="lead" name="lead" type="text"></textarea>
                <?php if (!empty($errors['lead'])) {
                    foreach ($errors['lead']->getErrors() as $error) { ?>
                        <p class="text-danger py-0 my-0"> <?php echo $error->getMessage(); ?> </p>
                    <?php }
                } ?>
            </div>

            <a href="/admin/index/all" class="btn btn-primary"> Назад</a>
            <button type="submit" class="btn btn-success"> Сохранить</button>
        </form>
    </section>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
