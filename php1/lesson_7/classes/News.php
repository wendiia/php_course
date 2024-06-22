<?php

include __DIR__ . '/Article.php';

class News {
    protected string $pathFile;
    protected array $news = [];
    public function __construct(string $pathFile)
    {
        $this->pathFile = $pathFile;
        $news = file($pathFile, FILE_IGNORE_NEW_LINES);

        foreach ($news as $article) {
            $article = explode('    ', $article);
            $this->news[] = new Article($article[0], $article[1], $article[2]);
        }
    }

    public function getAllNews(): array
    {
        return $this->news;
    }

    public function append(Article $article): News
    {
        $this->news[] = $article;
        return $this;
    }

    public function save(): News
    {
        $records = [];

        foreach ($this->news as $article) {
            $records[] = implode('    ', $article->getAttributesList());
        }

        file_put_contents($this->pathFile, implode(PHP_EOL, $records));
        return $this;
    }
}
