<?php

$images = scandir(__DIR__ . '/images');

if (isset($_FILES['img']) && empty($_FILES['img']['error'])) {
    $imgPrefix = 1;
    $path = __DIR__ . '/images';
    $imageName = $_FILES['img']['name'];

// Вариант 1
// date_default_timezone_set('Europe/Moscow');
// move_uploaded_file($_FILES['img']['tmp_name'], $path . '/' . time() . '_' . $_FILES['img']['name']);

// Вариант 2
    while (in_array($imageName, $images)) {
        $imageName =
            pathinfo($_FILES['img']['name'])['filename'] .
            '_' . $imgPrefix . '.' .
            pathinfo($_FILES['img']['name'])['extension'];
        $imgPrefix++;
    }
    move_uploaded_file($_FILES['img']['tmp_name'], $path . '/' . $imageName);
}

header('Location: /index.php');
exit;

