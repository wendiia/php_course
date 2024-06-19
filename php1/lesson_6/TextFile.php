<?php
class TextFile
{
    protected string $pathFile;
    protected array $data;
    public function __construct($pathFile)
    {
        $this->pathFile = $pathFile;
        $this->data = file($pathFile);
    }

    public function getData() : array
    {
        return $this->data;
    }
}
