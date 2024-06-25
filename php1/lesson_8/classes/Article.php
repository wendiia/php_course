<?php

class Article
{
    protected string $author;
    protected string $title;
    protected string $text;

    public function __construct(string $author, string $title, string $text)
    {
        $this->author = $author;
        $this->text = $text;
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
