<?php

namespace App\Models;

use App\Model;

class Author extends Model
{
    protected static string $table = 'authors';
    public string $name;
}
