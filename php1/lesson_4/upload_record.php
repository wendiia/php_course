<?php
$path = __DIR__ . '/records.txt';
$records = file($path);
$result = 'Запись была успешно добавлена!';
if (!empty($_POST['record'])) {
    $records[] = $_POST['record'] . "\n";
    file_put_contents($path, $records);
} else {
    $result = 'Заполните поле ввода!';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 4 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container align-center">
    <section class="comments mb-4">
        <h3 class="text-center display-5 mb-4"> <?php echo $result; ?> </h3>
        <a href="/task_1.php" class="btn btn-primary w-100"> Назад </a>
    </section>
</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

