<?php

include __DIR__ . '/GuestBookRecord.php';

class GuestBook {
    protected string $pathFile;
    protected array $data;
    public function __construct(string $pathFile)
    {
        $this->pathFile = $pathFile;
        $file = fopen($pathFile, "r");

        while (!feof($file)) {
            $dataTemp = trim(fgets($file));
            if ('' !== $dataTemp) {
                $this->data[] = new GuestBookRecord($dataTemp);
            }
        }

        fclose($file);
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
