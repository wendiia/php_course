<?php
include __DIR__ . '/functions_task_2.php';

$result = null;
$d = null;

if (!empty($_POST['a']) && !empty($_POST['b']) && !empty($_POST['c'])) {
    $d = discriminant($_POST['a'], $_POST['b'], $_POST['c']);
    $result = quadraticEquation($_POST['a'], $_POST['b'], $_POST['c']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Решение квадратного уравнения</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container w-50">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <h3 class="text-center">Решение квадратного уравнения</h3>
        <h4 class="text-center"> ax^2 + bx + c = 0 </h4>

        <h4 class="text-center"> D = b^2 - 4ac </h4>

        <form action="/task_2.php" method="post" class="d-flex flex-column mb-5">
            <div class="mb-3">
                <label for="inputA"> a: </label>
                <input id="inputA" type="number" name="a">
            </div>

            <div class="mb-3 ">
                <label for="inputB"> b: </label>
                <input id="inputB" type="number" name="b">
            </div>

            <div class="mb-3">
                <label for="inputC"> c: </label>
                <input id="inputC" type="number" name="c">
            </div>
            <input class="btn btn-primary" type="submit" value="Решить">
        </form>
        <?php if (isset($d)) { ?>
            <p class="display-6"> D = <?php echo $d; ?> </p>
        <?php } ?>
        <p class="display-6 text-center text-primary fw-normal"> Результат вычислений: <br>
            <?php
            if ($result !== null) {
                if (count($result) == 2) {
                    echo 'x1 = ' . $result[0] . ', x2 = ' . $result[1];
                } elseif (count($result) == 1) {
                    echo $result[0];
                } else {
                    echo 'Дискриминант меньше 0, корней нет!';
                }
            } else {
                echo '';
            }
            ?>
        </p>
    </div>
</div>
</body>
</html>