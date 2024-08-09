<?php

session_start();

require __DIR__ . '/autoload.php';

use App\Albums;
use App\Models\Album;
use App\Services\Authentication;
use App\View;

$auth = new Authentication();
$albums = new Albums();

if (
    !empty($_SESSION['login']) &&
    !empty($_POST['title']) &&
    !empty($_POST['description']) &&
    !empty($_POST['date']) &&
    !empty($_FILES['photo'])
) {
    $album = new Album(
        $_POST['title'],
        $_POST['description'],
        $_POST['date'],
        '/images/' . $_FILES['photo']['name'],
    );
    $albums->append($album, 'photo');
}

$template = __DIR__ . '/templates/albums.php';
$view = new View();
$view->assign('user', $auth->getCurrentUser());
$view->assign('albums', $albums->getAllAlbums());
$view->display($template);
