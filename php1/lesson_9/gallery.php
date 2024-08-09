<?php

session_start();

require __DIR__ . '/autoload.php';

use App\Images;
use App\Models\Image;
use App\Services\Authentication;
use App\View;

$template = __DIR__ . '/templates/gallery.php';
$images = new Images();
$auth = new Authentication();

if (
    !empty($_SESSION['login']) &&
    !empty($_FILES['img'])
) {
    $image = new Image('/images/' . $_FILES['img']['name']);
    $images->append($image, 'img');
}

$view = new View();
$view->assign('user', $auth->getCurrentUser());
$view->assign('images', $images->getAllImages());
$view->display($template);
