<?php

session_start();

require __DIR__ . '/autoload.php';

use App\Albums;
use App\View;
use App\Authentication;

$auth = new Authentication();
$albums = new Albums();
$view = new View();
$template = __DIR__ . '/templates/album.php';
$album = $albums->getAlbumByValue('id', $_GET['id']);

if (null === $album) {
    http_response_code(404);
    $view->display(__DIR__ . '/templates/notFound.php');
    exit();
}

$view->assign('user', $auth->getCurrentUser());
$view->assign('album', $album);
$view->display($template);
