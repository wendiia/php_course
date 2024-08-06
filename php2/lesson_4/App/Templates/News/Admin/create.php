<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 4 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container align-center">
    <section class="mb-4">
        <h3 class="text-center display-5 mb-4"> Добавить новость </h3>

        <form action="/admin/index/save" method="post">
            <div class="modal-body mb-5">
                <label for="title"> Название: </label>
                <input class="form-control" id="title" name="title" type="text">
                <label for="lead"> Описание: </label>
                <textarea class="form-control" id="lead" name="lead" type="text"></textarea>
            </div>

            <a href="/admin" class="btn btn-primary"> Назад</a>
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
