<?php
session_start();
include __DIR__ . '/functions.php';

$images = scandir(__DIR__ . '/images');

if (
    isset($_FILES['img']) &&
    empty($_FILES['img']['error']) &&
    getCurrentUser()
) {
    $path = __DIR__ . '/images';
    $imageName = $_FILES['img']['name'];

    date_default_timezone_set('Europe/Moscow');
    move_uploaded_file($_FILES['img']['tmp_name'], $path . '/' . time() . '_' . $_FILES['img']['name']);

    $dataLog = implode(' $|$ ',
        [
        getCurrentUser(),
        date("Y.m.d H:i"),
        $_FILES['img']['name']
        ]
    );

    file_put_contents(__DIR__ . '/log.txt', $dataLog . "\n", FILE_APPEND);
}

header('Location: /gallery.php');
exit;

