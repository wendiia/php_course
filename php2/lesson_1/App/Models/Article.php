<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    protected static string $table = 'news';
    public string $title;
    public string $lead;

    public static function findThreeLastNews(): array | false
    {
        $sql = "SELECT * FROM " . self::$table . " ORDER BY id DESC LIMIT 3";
        $db = new Db();
        return $db->query($sql, [], self::class);
    }
}
