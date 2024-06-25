<?php

use App\Models\News;
use App\View;
use App\Authentication;

session_start();
include __DIR__ . '/autoload.php';

$pathTemplate = __DIR__ . '/templates/article.php';
$exNews = new News();
$news = $exNews->getAllNews();
$article = null;

if (isset($_GET['id']) && !empty($news[$_GET['id']])) {
    $article = $news[$_GET['id']];
}

$view = new View();
$view->assign('article', $article);
$view->assign('user', Authentication::getCurrentUser());
echo $view->render($pathTemplate);
