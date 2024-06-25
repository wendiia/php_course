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
    }

    public function isUploaded(): bool
    {
        return
            isset($_FILES[$this->fieldName]) &&
            empty($_FILES[$this->fieldName]['error']);
    }

    public function isUploadedImg(): bool
    {
        $auth = new Authentication();
        return
            $this->isUploaded() &&
            null !== $auth->getCurrentUser() &&
            (
                $_FILES[$this->fieldName]['type'] === 'image/jpeg' ||
                $_FILES[$this->fieldName]['type'] === 'image/png'
            );
    }

    public function upload(): bool
    {
        if (true === $this->isUploadedImg()) {
            $imgPrefix = 1;
            $path = __DIR__ . '/images';
            $imageInfo = pathinfo($_FILES[$this->fieldName]['name']);
            $newImageName = $_FILES[$this->fieldName]['name'];
            $images = scandir(__DIR__ . '/images');

            while (in_array($newImageName, $images)) {
                $newImageName =
                    $imageInfo['filename'] .
                    '_' . $imgPrefix . '.' .
                    $imageInfo['extension'];
                $imgPrefix++;
            }

            move_uploaded_file($_FILES[$this->fieldName]['tmp_name'], $path . '/' . $newImageName);

            return true;
        }

        return false;
    }
}