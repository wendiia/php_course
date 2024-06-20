<?php

include __DIR__ . "/TextFile.php";

class GuestBook extends TextFile {
    public function append($text) : GuestBook
    {
        $this->data[] = $text;
        return $this;
    }

    public function save() : GuestBook
    {
        file_put_contents($this->pathFile, implode(PHP_EOL, $this->data));
        return $this;
    }
}
