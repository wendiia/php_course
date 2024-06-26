<?php
$result = null;
if (!empty($_POST['operation']) && isset($_POST['first_num']) && isset($_POST['second_num'])) {
    switch ($_POST['operation']) {
        case 'plus':
            $result = $_POST['first_num'] + $_POST['second_num'];
            break;
        case 'minus':
            $result = $_POST['first_num'] - $_POST['second_num'];
            break;
        case 'division':
            if ($_POST['second_num'] != 0) {
                $result = $_POST['first_num'] / $_POST['second_num'];
                break;
            }
            $result = 'деление на 0';
            break;
        case 'multiplication':
            $result = $_POST['first_num'] * $_POST['second_num'];
            break;
    }
}
else {
    $result = 'Вы не заполнили все поля!';
}

function getAllComments($path) {
    $comments = [];
    $comment_names = myscandir($path);

    foreach ($comment_names as $comment_name) {
        $comments_date = explode('_', $comment_name)[0];
        $comments[$comments_date] = file_get_contents(__DIR__ . '/assets/comments/' . $comment_name);
    }

    return $comments;
}
function myscandir($path)
{
    $file_names = scandir($path);
    $files = [];
    $n = 0;
    foreach ($file_names as $file_name) {
        if ($file_name != '.' and $file_name != '..') {
            $files[$n++] = $file_name;
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
    <section class="comments mb-4">
        <h3 class="text-center display-5 mb-4"> Калькулятор </h3>

        <form action="/calculator.php" method="post" class="d-flex flex-column mb-5">
            <label  for="inputFirstNum"> Первое число: </label>
            <input class="mb-3" id="inputFirstNum" type="number" name="first_num">
            <label for="selectOperation"> Выбор операции: </label>
            <select class="mb-3" name="operation" id="selectOperation">
                <option value="">-- Выберите операцию --</option>
                <option value="plus">+</option>
                <option value="minus">-</option>
                <option value="division">/</option>
                <option value="multiplication">*</option>
            </select>

            <label for="inputSecondNum"> Второе число: </label>
            <input class="mb-3" id="inputSecondNum" type="number" name="second_num">
            <input class="btn btn-primary" type="submit">
        </form>
        <p class="display-6"> Результат вычислений: <?php echo $result; ?> </p>
    </section>
</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

