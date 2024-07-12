<?php

namespace App;

use App\Models\Image;

class Images
{
    public function getAllImages(): ?array
    {
        $db = new Db();
        $sql = "SELECT * FROM images";
        $images = $db->query($sql);
        $listImages = [];

        if (!empty($images)) {
            foreach ($images as $imageParts) {
                $image = new Image($imageParts['url']);
                $image->setId($imageParts['id']);
                $listImages[$image->getId()] = $image;
            }
            return $listImages;
        }

        return null;
    }

    public function getImageById(int $id): ?Image
    {
        $db = new Db();
        $sql = "SELECT * FROM images WHERE id = :id";
        $res = $db->query($sql, ['id' => $id]);

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

        $db = new Db();
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
