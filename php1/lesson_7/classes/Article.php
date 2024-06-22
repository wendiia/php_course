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

    function getTitle(): string
    {
        return $this->title;
    }

    function getText(): string
    {
        return $this->text;
    }

    function getAuthor(): string
    {
        return $this->author;
    }

    function getAttributesList(): array
    {
        return [$this->author, $this->title, $this->text];
    }

}
