<?php

require __DIR__ . '/../autoload.php';

use App\Db;

$db = new Db();

$sql = "INSERT INTO news (title, `lead`) VALUES (:title, :lead)";
assert(true, $db->execute($sql, ['title' => 'Новость 12', 'lead' => 'Описание 12']));

$sql = "DELETE FROM news WHERE id = :id";
assert(true, $db->execute($sql, ['id' => '11']));

$sql = "UPDATE news SET `lead` = :lead  WHERE id = :id";
assert(true, $db->execute($sql, ['id' => 6, 'lead' => 'Описание для теста']));
