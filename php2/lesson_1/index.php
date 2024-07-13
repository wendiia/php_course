<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

$articles = Article::findThreeLastNews();

require __DIR__ . '/templates/index.php';
