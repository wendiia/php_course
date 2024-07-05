<?php

namespace App;

use App\Models\Image;

class Images
{
    public function getAllImages(string $sortValue = null, string $typeSort = 'ASC'): ?array
    {
        $db = new DB();
        $sql = "SELECT * FROM images";

        if (!empty($sortValue)) {
            $sql = "SELECT * FROM images ORDER BY {$sortValue} {$typeSort}";
        }

        $imagesParts = $db->query($sql);
        $listImages = [];

        if (!empty($imagesParts)) {
            foreach ($imagesParts as $imageParts) {
                $image = new Image($imageParts['url']);
                $image->setId($imageParts['id']);
                $listImages[$image->getId()] = $image;
            }
            return $listImages;
        }

        return null;
    }

    public function getImageValue(string $name, string $value): ?Image
    {
        $db = new DB();
        $sql = "SELECT * FROM images WHERE $name = :value";
        $res = $db->query($sql, ['value' => $value]);

        if (!empty($res)) {
            $image = new Image($res[0]['url']);
            $image->setId($res[0]['id']);
            return $image;
        }

        return null;
    }

    public function append(Image $image, string $photoFieldName): ?Image
    {
        $pathImg = __DIR__ . '/../images/';
        $uploaderImg = new UploaderImg($photoFieldName);
        $newImgName = $uploaderImg->upload($pathImg);

        $db = new DB();
        $sql = "INSERT INTO images (url) VALUES (:url)";
        $data = ['url' => '/images/' . $newImgName];
        $res = $db->execute($sql, $data);

        if (false !== $res) {
            $image->setId($db->getLastInsertId());
            return $image;
        }

        unlink($pathImg . $newImgName);
        return null;
    }
}
