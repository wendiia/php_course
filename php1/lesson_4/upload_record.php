<?php

include __DIR__ . '/functions.php';

$path = __DIR__ . '/records.txt';
$records = fileRead($path);

if (!empty($_POST['record'])) {
    $records[] = $_POST['record'];
    file_put_contents($path, implode(PHP_EOL, $records));
}

header('Location: /task_1.php');
exit;

