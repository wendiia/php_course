<?php

include __DIR__ . '/Article.php';
include __DIR__ . '/Db.php';

class News
{
    protected Db $db;
    protected array $articles;

    public function __construct()
    {
        $this->db = new Db();
        $sql = "SELECT * FROM news ORDER BY id DESC";
        $articlesParts = $this->db->query($sql);

        foreach ($articlesParts as $article) {
            $this->articles[$article['id']] = new Article(
                $article['id'],
                $article['author'],
                $article['title'],
                $article['text']
            );
        }
    }

    public function getAllArticles(): array
    {
        return $this->articles;
    }

    public function getArticleById($id): ?Article
    {
        if (!empty($id) && !empty($this->articles[$id])) {
            return $this->articles[$id];
        }

        return null;
    }
}
