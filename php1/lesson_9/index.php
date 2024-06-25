<?php

use App\Models\News;
use App\View;
use App\Authentication;

session_start();
include __DIR__ . '/autoload.php';

$pathTemplate = __DIR__ . '/templates/index.php';
$news = new News();
$view = new View();

$view->assign('news', $news->getAllNews());
$view->assign('user', Authentication::getCurrentUser());

echo $view->render($pathTemplate);
