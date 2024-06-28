<?php

require_once __DIR__ . '/Article.php';

class News
{
    protected string $pathFile;
    protected array $articles = [];

    public function __construct(string $pathFile)
    {
        $this->pathFile = $pathFile;
        $newsParts = file($pathFile, FILE_IGNORE_NEW_LINES);
        $articleId = 1;

        foreach ($newsParts as $article) {
            $articleParts = explode('    ', $article);
            $this->articles[$articleId] = new Article($articleParts[0], $articleParts[1]);
            $articleId++;
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

    public function append(Article $article): News
    {
        $this->articles[] = $article;
        return $this;
    }

    public function save(): bool
    {
        $records = [];

        foreach ($this->articles as $article) {
            $records[] = implode(
                '    ',
                [
                    $article->getTitle(),
                    $article->getText()
                ]
            );
        }

        if (false !== file_put_contents($this->pathFile, implode(PHP_EOL, $records))) {
            return true;
        }

        return false;
    }
}
