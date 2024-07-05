<?php

namespace App;

use App\Models\Album;

class Albums
{
    public function getAllAlbums(string $sortValue = null, string $typeSort = 'ASC'): ?array
    {
        $db = new DB();
        $sql = "SELECT * FROM albums";

        if (!empty($sortValue)) {
            $sql = "SELECT * FROM albums ORDER BY {$sortValue} {$typeSort}";
        }

        $albumsParts = $db->query($sql);
        $listAlbums = [];

        if (!empty($albumsParts)) {
            foreach ($albumsParts as $albumParts) {
                $album = new Album(
                    $albumParts['title'],
                    $albumParts['description'],
                    $albumParts['date'],
                    $albumParts['photo']
                );
                $album->setId($albumParts['id']);
                $listAlbums[$album->getId()] = $album;
            }
            return $listAlbums;
        }

        return null;
    }

    public function getAlbumByValue(string $name, string $value): ?Album
    {
        $db = new DB();
        $sql = "SELECT * FROM albums WHERE $name = :value";
        $res = $db->query($sql, ['value' => $value]);

        if (!empty($res)) {
            $album = new Album(
                $res[0]['title'],
                $res[0]['description'],
                $res[0]['date'],
                $res[0]['photo']
            );
            $album->setId($res[0]['id']);
            return $album;
        }

        return null;
    }

    public function append(Album $album, string $photoFieldName): ?Album
    {
        $pathImg = __DIR__ . '/../images/';
        $uploaderImg = new UploaderImg($photoFieldName);
        $newImgName = $uploaderImg->upload($pathImg);
        $db = new DB();
        $sql = "INSERT INTO albums (title, description, date, photo) VALUES (:title, :description, :date, :photo)";
        $data = [
            'title' => $album->getTitle(),
            'description' => $album->getDescription(),
            'date' => $album->getDate(),
            'photo' => '/images/' . $newImgName,
        ];
        $res = $db->execute($sql, $data);

        if (false !== $res) {
            $album->setId($db->getLastInsertId());
            return $album;
        }

        unlink($pathImg . $newImgName);
        return null;
    }
}
