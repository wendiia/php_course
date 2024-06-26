<?php
function getAllComments($path) {
    $comments = [];
    $comment_names = myscandir($path);

    foreach ($comment_names as $comment_name) {
        $comments[$comment_name] = file($path . '/' . $comment_name, FILE_IGNORE_NEW_LINES);
    }
    return $comments;
}
function myscandir($path)
{
    $file_names = scandir($path);
    $files = [];
    foreach ($file_names as $file_name) {
        if ($file_name != '.' and $file_name != '..') {
            $files[] = $file_name;
        }
    }
    return $files;
}

$comment_names = myscandir(__DIR__ . '\assets\comments');
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
        <li class="nav-item">
            <a class="nav-link" href="/calculator.php">Калькулятор</a>
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
        foreach ($comments as $comment) { ?>
        <div class="row">
            <div class="col-12 comment">
                <div class="creator mb-2">
                    <div class="creator__avatar"></div>
                    <p class="m-0 me-5"> <?php echo $comment[2]; ?> </p>
                    <p class="m-0"> Дата комментария: <?php echo $comment[1]; ?> </p>
                </div>
                <p class="comment__text">
                    <a href="/comment.php?file=<?php echo $comment[0]; ?>"> <?php echo $comment[3] ?> </a>
                </p>
            </div>
        </div>
        <?php  }  ?>
    </section>

    <h3 class="text-center display-6 mb-4"> Оставьте свой комментарий </h3>
    <form action="/upload-comment.php" method="post">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label"> Ваше имя: </label>
            <input type="text" name="name" class="form-control" id="exampleInputName">
        </div>
        <div class="form-floating mb-4">
            <textarea name="content" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
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

