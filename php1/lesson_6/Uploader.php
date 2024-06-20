<?php

session_start();

include __DIR__ . "/Authentication.php";

class Uploader
{
    protected string $fieldName;
    protected array $file = [];

    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;

        if (true === $this->isUploaded()) {
            $this->file = $_FILES[$fieldName];
        }
    }

    public function isUploaded(): bool
    {
        return
            isset($_FILES[$this->fieldName]) &&
            empty($_FILES[$this->fieldName]['error']) &&
            null !== Authentication::getCurrentUser() &&
            (
                $_FILES['img']['type'] === 'image/jpeg' ||
                $_FILES['img']['type'] === 'image/png'
            );
    }

    public function upload(): bool
    {
        if (!empty($this->file)) {
            $imgPrefix = 1;
            $path = __DIR__ . '/images';
            $imageInfo = pathinfo($_FILES['img']['name']);
            $newImageName = $_FILES['img']['name'];
            $images = scandir(__DIR__ . '/images');

            while (in_array($newImageName, $images)) {
                $newImageName =
                    $imageInfo['filename'] .
                    '_' . $imgPrefix . '.' .
                    $imageInfo['extension'];
                $imgPrefix++;
            }

            move_uploaded_file($_FILES['img']['tmp_name'], $path . '/' . $newImageName);

            $dataLog = implode('   ',
                [
                    Authentication::getCurrentUser(),
                    date("Y.m.d H:i"),
                    $newImageName
                ]
            );

            file_put_contents(__DIR__ . '/log.txt', $dataLog . PHP_EOL, FILE_APPEND);

            return true;
        }

        return false;
    }
}
