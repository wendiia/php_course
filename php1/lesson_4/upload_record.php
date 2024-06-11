<?php
$path = __DIR__ . '/records.txt';
$records = file($path);

if (!empty($_POST['record'])) {
    $records[] = $_POST['record'] . "\n";
    file_put_contents($path, $records);
}

header('Location: /task_1.php');
exit;

