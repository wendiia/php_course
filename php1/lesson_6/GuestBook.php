<?php

include __DIR__ . "/TextFile.php";

class GuestBook extends TextFile
{
    public function append($text): GuestBook
    {
        if (!empty($text)) {
            $this->data[] = trim($text);
        }
        return $this;
    }

    public function save(): void
    {
        file_put_contents($this->pathFile, implode(PHP_EOL, $this->data));
    }
}
