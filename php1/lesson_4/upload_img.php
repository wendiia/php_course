<?php

$images = scandir(__DIR__ . '/images');

if (
    isset($_FILES['img']) &&
    empty($_FILES['img']['error']) &&
    (
        $_FILES['img']['type'] === 'image/jpeg' ||
        $_FILES['img']['type'] === 'image/png'
    )
) {
    $imgPrefix = 1;
    $path = __DIR__ . '/images';
    $imageInfo = pathinfo($_FILES['img']['name']);
    $newImageName = $_FILES['img']['name'];

    while (in_array($newImageName, $images)) {
        $newImageName =
            $imageInfo['filename'] .
            '_' . $imgPrefix . '.' .
            $imageInfo['extension'];
        $imgPrefix++;
    }
    move_uploaded_file($_FILES['img']['tmp_name'], $path . '/' . $newImageName);
}

header('Location: /task_2.php');
exit;

