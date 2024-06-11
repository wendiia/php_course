<?php
$result = null;
if (!empty($_GET['operation']) && isset($_GET['first_num']) && isset($_GET['second_num'])) {
    switch ($_GET['operation']) {
        case 'plus':
            $result = (int)$_GET['first_num'] + (int)$_GET['second_num'];
            break;
        case 'minus':
            $result = (int)$_GET['first_num'] - (int)$_GET['second_num'];
            break;
        case 'division':
            if (!empty($_GET['second_num'])) {
                $result = (int)$_GET['first_num'] / (int)$_GET['second_num'];
                break;
            }
            $result = 'деление на 0';
            break;
        case 'multiplication':
            $result = (int)$_GET['first_num'] * (int)$_GET['second_num'];
            break;
    }
} else {
    $result = 'Вы не заполнили все поля!';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 3 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></head>
<body>

<div class="container align-center">
    <section class="comments mb-4">
        <h3 class="text-center display-5 mb-4"> Калькулятор </h3>

        <form action="/task_1.php" method="get" class="d-flex flex-column mb-5">
            <label for="inputFirstNum"> Первое число: </label>
            <input class="mb-3" id="inputFirstNum" type="number" name="first_num" value="<?php echo isset($_GET['first_num']) ? $_GET['first_num'] : '';?>">
            <label for="selectOperation"> Выбор операции: </label>
            <select class="mb-3" name="operation" id="selectOperation">
                <option value="">-- Выберите операцию --</option>
                <option value="plus">+</option>
                <option value="minus">-</option>
                <option value="division">/</option>
                <option value="multiplication">*</option>
            </select>

            <label for="inputSecondNum"> Второе число: </label>
            <input class="mb-3" id="inputSecondNum" type="number" name="second_num" value="<?php echo isset($_GET['second_num']) ? $_GET['second_num'] : '';?>">
            <input class="btn btn-primary" type="submit" value="Равно">
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

