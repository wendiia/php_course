<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lesson 5 </title>
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
        <pre class="text-center "><?php
            function func1($a, $b)
            {
                echo $a + $b . "\n";
                return $a + $b;
            }

            $c = func1(1, 2);
            echo $c . "\n";


            $a = ['a' => 1, 'b' => 2, 'c' => 3];
            var_dump($a['a']);

            foreach ($a as $key => $val) {
                echo $key . ' => ' . $val . "\n";
            }
            $test = 'test1';

            if (' ') {
                echo 'true';
            } else {
                echo 'false';
            }

            echo "\n--------\n";
            $list = scandir(__DIR__ . '/assets');
            var_dump($list);

            ?>
        <pre>

    </div>


</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

