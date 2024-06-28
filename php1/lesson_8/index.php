<?php

include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/News.php';

$pathTemplate = __DIR__ . '/templates/index.php';
$news = new News();
$view = new View();

$view->assign('articles', $news->getAllArticles());
$view->display($pathTemplate);
