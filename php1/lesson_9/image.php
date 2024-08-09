<?php

session_start();

require __DIR__ . '/autoload.php';

use App\Images;
use App\Services\Authentication;
use App\View;

$template = __DIR__ . '/templates/image.php';
$auth = new Authentication();
$view = new View();
$images = new Images();

$image = $images->getImageById($_GET['id']);

if (null === $image) {
    http_response_code(404);
    $view->display(__DIR__ . '/templates/notFound.php');
    exit();
}

$view->assign('user', $auth->getCurrentUser());
$view->assign('image', $image);
$view->display($template);
