<?php

namespace App\Models;

class Album
{
    protected int $id;
    protected string $title;
    protected string $description;
    protected string $date;
    protected string $photo;

    public function __construct(string $title, string $description, string $date, string $photo)
    {
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
        $this->photo = $photo;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
