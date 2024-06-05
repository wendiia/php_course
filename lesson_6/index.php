<?php
function getAllComments($path) {
    $comments = [];
    $comment_names = myscandir(scandir($path));

    foreach ($comment_names as $comment_name) {
        $comments_date = explode('_', $comment_name)[0];
        $comments[$comments_date] = file_get_contents(__DIR__ . '/assets/comments/' . $comment_name);
    }

    return $comments;
}
function myscandir($path)
{
    $files = [];
    $n = 0;
    foreach ($path as $item) {
        if ($item != '.' and $item != '..') {
            $files[$n++] = $item;
        }
    }
    return $files;
}

$path = scandir(__DIR__ . '\assets\comments');
$comment_names = myscandir($path);
$comments = getAllComments(__DIR__ . '\assets\comments');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lesson 6 </title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<nav class="container-fluid">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/songs.php">Песни</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/fingerings.php">Аппликатуры</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/photo-gallery.php">Фотогаллерея</a>
        </li>
    </ul>
</nav>

<div class="container align-center">
    <div class="row justify-content-center mb-3">
        <h1 class="title mb-4">
            <i class="fa-solid fa-guitar fa-sm" style="color: #6db3df;"></i>
            Аккорды песен
            <i class="fa-solid fa-guitar fa-sm" style="color: #6db3df;"></i>
        </h1>
        <h3 class="text-center">
            Приветствуем любителей попеть песни и мешать соседям спокойно жить! Специально для вас мы сделали подборку
            аккордов
            для песен
        </h3>

    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-8">
            <img src="/assets/img/main_img.jpeg" class="img-fluid" alt="guitar">
        </div>
    </div>

    <section class="comments mb-4">
        <h3 class="text-center display-5 mb-4">Комментарии</h3>

        <?php
        $n = 0;
        foreach ($comments as $time => $comment) { ?>
        <div class="row">
            <div class="col-12 comment">
                <div class="creator mb-2">
                    <div class="creator__avatar"></div>
                    <p class="m-0 me-5"> Noname </p>
                    <p class="m-0"> Время оставления: <?php echo $time ?> </p>
                </div>
                <p class="comment__text">
                    <a href="/comment.php?file=<?php echo $comment_names[$n]; $n++; ?>"> <?php echo $comment ?> </a>
                </p>
            </div>
        </div>
        <?php  }  ?>

        <div class="row justify-content-center">
            <div class="col-auto">
                <button type="button" class="btn btn-primary"> Показать все</button>
            </div>
        </div>

    </section>

    <h3 class="text-center display-6 mb-4"> Оставьте свой комментарий </h3>
    <form>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label"> Ваше имя: </label>
            <input type="text" class="form-control" id="exampleInputName">
        </div>
        <div class="form-floating mb-4">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                      style="height: 100px"></textarea>
            <label for="floatingTextarea2">Напишите что-нибудь...</label>
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

