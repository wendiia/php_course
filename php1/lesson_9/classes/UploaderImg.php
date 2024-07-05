<?php

namespace App;

class UploaderImg
{
    protected string $fieldName;
    protected array $file = [];

    public function __construct(string $fieldName)
    {
        $this->fieldName = $fieldName;
    }

    public function isUploadedImg(): bool
    {
        return
            isset($_FILES[$this->fieldName]) &&
            empty($_FILES[$this->fieldName]['error']) &&
            !empty($_SESSION['login']) &&
            (
                $_FILES[$this->fieldName]['type'] === 'image/jpeg' ||
                $_FILES[$this->fieldName]['type'] === 'image/png'
            );
    }

    public function upload(string $path): string | false
    {
        if (true === $this->isUploadedImg()) {
            $imageInfo = pathinfo($_FILES[$this->fieldName]['name']);
            $newImgName = $imageInfo['filename'] . '_' . time() . '.' . $imageInfo['extension'];
            $fullPathName = $path . '/' . $newImgName;
            move_uploaded_file($_FILES[$this->fieldName]['tmp_name'], $fullPathName);

            return $newImgName;
        }

        return false;
    }
}
