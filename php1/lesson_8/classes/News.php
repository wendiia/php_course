<?php

include __DIR__ . '/Article.php';
include __DIR__ . '/DB.php';

class News
{
    protected DB $db;
    protected array $news;

    public function __construct()
    {
        $this->db = new DB();
        $sql = "SELECT * FROM news ORDER BY id DESC";
        $news = $this->db->query($sql);

        foreach ($news as $article) {
            $this->news[$article['id']] = new Article(
                $article['author'],
                $article['title'],
                $article['text'],
            );
        }
    }

    public function getAllNews(): array
    {
        return $this->news;
    }
}
