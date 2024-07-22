<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

if (
    !empty($_GET['id']) &&
    !empty($_POST['title']) &&
    !empty($_POST['lead'])
) {
    $article = Article::findById($_GET['id']);
    $article->title = $_POST['title'];
    $article->lead = $_POST['lead'];
    $article->save();
}

header('Location: /index.php');
exit();
