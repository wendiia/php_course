<?php

include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/News.php';

$pathTemplate = __DIR__ . '/templates/article.php';
$news = new News();
$view = new View();
$article = $news->getArticleById($_GET['id']);

if (null === $article) {
    http_response_code(404);
    $view->display(__DIR__ . '/templates/notFound.php');
    exit();
}

$view->assign('article', $article);
$view->display($pathTemplate);
