<?php

session_start();

require __DIR__ . '/autoload.php';

use App\Albums;
use App\Services\Authentication;
use App\View;

$auth = new Authentication();
$albums = new Albums();
$view = new View();
$template = __DIR__ . '/templates/album.php';
$album = $albums->getAlbumById($_GET['id']);

if (null === $album) {
    http_response_code(404);
    $view->display(__DIR__ . '/templates/notFound.php');
    exit();
}

$view->assign('user', $auth->getCurrentUser());
$view->assign('album', $album);
$view->display($template);
