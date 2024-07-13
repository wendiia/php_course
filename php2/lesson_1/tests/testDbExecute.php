<?php

require __DIR__ . '/../autoload.php';

use App\Db;

$db = new Db();

$sql = "INSERT INTO news (title, `lead`) VALUES (:title, :lead)";
var_dump($db->execute($sql,['title' => 'Новость 12', 'lead' => 'Описание 12']));


$sql = "DELETE FROM news WHERE id = :id";
var_dump($db->execute($sql,['id' => '11']));
