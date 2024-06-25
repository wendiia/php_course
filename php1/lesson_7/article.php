<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/News.php';
include __DIR__ . '/classes/Authentication.php';

$pathTemplate = __DIR__ . '/templates/article.php';
$pathFileNews = __DIR__ . '/data/news.txt';
$auth = new Authentication();
$exNews = new News($pathFileNews);
$news = $exNews->getAllNews();
$article = null;

if (isset($_GET['id']) && !empty($news[$_GET['id']])) {
    $article = $news[$_GET['id']];
}

$view = new View();
$view->assign('article', $article);
$view->assign('user', $auth->getCurrentUser());
echo $view->render($pathTemplate);
