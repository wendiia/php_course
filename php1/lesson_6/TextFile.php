<?php
class TextFile
{
    protected string $pathFile;
    protected array $data;
    public function __construct($pathFile)
    {
        $this->pathFile = $pathFile;
        $file = fopen($pathFile, "r");

        while (!feof($file)) {
            $dataTemp = trim(fgets($file));
            if ('' !== $dataTemp) {
                $this->data[] = $dataTemp;
            }
        }

        fclose($file);
    }

    public function getData() : array
    {
        return $this->data;
    }
}
