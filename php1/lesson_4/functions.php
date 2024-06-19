<?php

function fileRead($filePath) :? array
{
    $file = fopen($filePath, "r");
    $data = null;

    while (!feof($file)) {
        $dataTemp = trim(fgets($file));
        if ('' !== $dataTemp) {
            $data[] = $dataTemp;
        }
    }

    fclose($file);

    return $data;
}