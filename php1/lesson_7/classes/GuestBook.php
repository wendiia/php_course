<?php

require_once __DIR__ . '/GuestBookRecord.php';

class GuestBook
{
    protected string $pathFile;
    protected array $data;

    public function __construct(string $pathFile)
    {
        $this->pathFile = $pathFile;
        $fileData = file($pathFile, FILE_IGNORE_NEW_LINES);

        foreach ($fileData as $item) {
            $this->data[] = new GuestBookRecord($item);
        }
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function append(GuestBookRecord $record): GuestBook
    {
        $this->data[] = $record;
        return $this;
    }

    public function save(): GuestBook
    {
        $records = [];

        foreach ($this->data as $objRecord) {
            $records[] = $objRecord->getMessage();
        }

        file_put_contents($this->pathFile, implode(PHP_EOL, $records));
        return $this;
    }
}
