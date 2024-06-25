<?php

namespace App\Models;

use App\DB;

include __DIR__ . '/../../autoload.php';
class News
{
    protected DB $db;
    protected array $news;

    public function __construct()
    {
        $this->db = new DB();
        $this->getAllNews();
    }

    public function getAllNews(): array
    {
        $this->news = [];
        $sql = "SELECT * FROM news ORDER BY id DESC";
        $news = $this->db->query($sql);

        foreach ($news as $article) {
            $this->news[] = new Article($article['author'], $article['title'], $article['text']);
        }

        return $this->news;
    }

    public function append(Article $article): false|array
    {
        $data = [
            'author' => $article->getAuthor(),
            'title' => $article->getTitle(),
            'text' => $article->getText()
        ];

        $sql = "INSERT INTO news (author, title, text) VALUES (:author, :title, :text)";

        return $this->db->query($sql, $data);
    }
}
