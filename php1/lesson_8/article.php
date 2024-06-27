<?php

session_start();
include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/News.php';
include __DIR__ . '/classes/Authentication.php';

$pathTemplate = __DIR__ . '/templates/article.php';
$auth = new Authentication();
$exNews = new News();
$news = $exNews->getAllNews();
$view = new View();

if (isset($_GET['id']) && !empty($news[$_GET['id']])) {
    $view->assign('article', $news[$_GET['id']]);
}

$view->assign('user', $auth->getCurrentUser());
echo $view->render($pathTemplate);
