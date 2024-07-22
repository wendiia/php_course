<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

if (
    !empty($_POST['title']) &&
    !empty($_POST['lead'])
) {
    $article = new Article();
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->save();
}

header('Location: /index.php');
exit();
