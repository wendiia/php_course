<?php

include __DIR__ . "/TextFile.php";

class GuestBook extends TextFile {
    public function append($text) : GuestBook
    {
        $this->data[] = $text . "\n";
        return $this;
    }

    public function save() : GuestBook
    {
        file_put_contents($this->pathFile, $this->data);
        return $this;
    }
}
