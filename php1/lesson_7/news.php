<?php

include __DIR__ . '/classes/View.php';
include __DIR__ . '/classes/News.php';

$pathTemplate = __DIR__ . '/templates/news.php';
$pathFileNews = __DIR__ . '/data/news.txt';
$news = new News($pathFileNews);
$view = new View();

$view->assign('articles', $news->getAllArticles());
$view->display($pathTemplate);
