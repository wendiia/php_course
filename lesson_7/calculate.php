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
        <p class="display-6"> Результат вычислений: <?php echo $result; ?> </p>
        <a href="/calculator.php" class="btn btn-primary"> Назад </a>
    </section>
</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

