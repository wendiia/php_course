<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

$news = Article::findAll();

require __DIR__ . '/templates/index.php';
