<?php

include __DIR__ . '/classes/News.php';
$pathFileNews = __DIR__ . '/data/news.txt';

if (
    !empty(trim($_POST['title'])) &&
    !empty(trim($_POST['content']))
) {
    $news = new News($pathFileNews);
    $article = new Article($_POST['title'], $_POST['content']);
    $news->append($article)->save();
}

header('Location: /news.php');
exit;
