<?php

session_start();
include __DIR__ . '/authentication1.php';

class Uploader {
    protected string $fieldName;
    protected array $file = [];

    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
        if ($this->isUploaded()) {
            $this->file = $_FILES[$fieldName];
        }
    }

    public function isUploaded(): bool
    {
        return
            isset($_FILES[$this->fieldName]) &&
            empty($_FILES[$this->fieldName]['error']) &&
            getCurrentUser();
    }

    public function upload(): bool
    {
        if (!empty($this->file)) {
            $path = __DIR__ . '/images';

            date_default_timezone_set('Europe/Moscow');
            move_uploaded_file($this->file['tmp_name'], $path . '/' . time() . '_' . $this->file['name']);

            $dataLog = implode(' $|$ ',
                [
                    getCurrentUser(),
                    date("Y.m.d H:i"),
                    $this->file['name']
                ]
            );

            file_put_contents(__DIR__ . '/log.txt', $dataLog . "\n", FILE_APPEND);

            return true;
        }

        return false;
    }
}
