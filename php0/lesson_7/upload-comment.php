<?php
date_default_timezone_set('Europe/Moscow');
$result = 'Комментарий добавлен!';
if (!empty($_POST['name'] && !empty($_POST['content']))) {
    $comment_name = date("Y.m.d_h.i.s") . '_comment.txt';
    $data = array_merge([$comment_name, date("Y.m.d h:i")], [$_POST['name'], $_POST['content']]);
    $data = implode("\n", $data);
    file_put_contents(__DIR__ . '/assets/comments/' . $comment_name, $data);
} else {
    $result = 'Заполните все поля!';
}
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

<nav class="container-fluid mb-4">
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

<div class="container">
    <div class="row justify-content-center mb-4">
        <h3 class="text-center display-5 mb-4"> <?php echo $result; ?> </h3>
        <a href="/index.php" class="btn btn-primary"> Назад </a>
    </div>
</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>