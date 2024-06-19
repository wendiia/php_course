<?php
session_start();
include __DIR__ . '/functions.php';

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

    $dataLog = implode('   ',
        [
        getCurrentUser(),
        date("Y.m.d H:i"),
        $newImageName
        ]
    );

    file_put_contents(__DIR__ . '/log.txt', $dataLog . PHP_EOL, FILE_APPEND);
}

header('Location: /gallery.php');
exit;

