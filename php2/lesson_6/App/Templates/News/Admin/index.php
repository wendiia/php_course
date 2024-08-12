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
        <h3 class="text-center display-5 mb-4"> Админ-панель новостей </h3>
        <h4 class="text-center text-primary fs-5 mb-4"> Добро пожаловать, <?php echo $login; ?>!</h4>

        <table class="table table-light align-middle">
            <thead>
            <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">Название</th>
                <th class="text-center" scope="col">Описание</th>
                <th class="text-center" scope="col">Редактирование</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($news as $article) { ?>
                <tr>
                    <th class="text-center" scope="row"> <?php echo $article->getId(); ?> </th>
                    <td class="text-center"> <?php echo $article->title; ?> </td>
                    <td class="text-center"> <?php echo $article->lead; ?> </td>
                    <td class="text-center">
                        <a href="/admin/index/edit?id=<?php echo $article->getId(); ?>" class="btn btn-primary me-3">
                            Изменить
                        </a>
                        <a href="/admin/index/delete?id=<?php echo $article->getId(); ?>" class="btn btn-danger">
                            Удалить
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <a href="/admin/index/create" class="btn btn-primary"> Создать статью </a>

    </section>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
