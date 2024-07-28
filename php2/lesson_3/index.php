<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;
use App\View;

$template = __DIR__ . '/templates/index.php';
$news = Article::findAll();
$view = new View();
$view->news = $news;
$view->display($template);
