<?php

require __DIR__ . '/../autoload.php';

use App\Models\Article;
use App\View;

$template = __DIR__ . '/templates/index.php';
$view = new View();
$view->news = Article::findAll();
$view->display($template);
