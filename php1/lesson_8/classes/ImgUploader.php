<?php

session_start();

include __DIR__ . "/Authentication.php";

class ImgUploader
{
    protected string $fieldName;
    protected string $pathImages = __DIR__ . "/../images";
    protected string $pathLogs = __DIR__ . "/../data/log.txt";
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
            $imageInfo = pathinfo($_FILES['img']['name']);
            $newImageName = $_FILES['img']['name'];
            $images = scandir($this->pathImages);

            while (in_array($newImageName, $images)) {
                $newImageName =
                    $imageInfo['filename'] .
                    '_' . $imgPrefix . '.' .
                    $imageInfo['extension'];
                $imgPrefix++;
            }

            move_uploaded_file($_FILES['img']['tmp_name'], $this->pathImages . '/' . $newImageName);

            $dataLog = implode('   ', [
                    Authentication::getCurrentUser(),
                    date("Y.m.d H:i"),
                    $newImageName
            ]);

            file_put_contents($this->pathLogs, $dataLog . PHP_EOL, FILE_APPEND);

            return true;
        }

        return false;
    }
}
