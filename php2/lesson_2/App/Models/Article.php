<?php

namespace App\Models;

use App\Model;

class Article extends Model
{
    protected static string $table = 'news';
    public string $title;
    public string $lead;
}
