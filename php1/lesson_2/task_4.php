<?php
//Составьте функцию, которая на вход будет принимать имя человека,
//а возвращать его пол, пытаясь угадать по имени (null - если угадать не удалось).
//Вам придется самостоятельно найти нужные вам строковые функции. Начните с написания тестов для функции.

function guessGenderByName($name)
{
    $gender = null;

    if (!empty($name)) {
        $lastCharName = substr($name, -2);
        if (($lastCharName == 'а' || $lastCharName == 'я' || $name == 'Любовь') &&
            $name != 'Илья' &&
            $name != 'Фома' &&
            $name != 'Никита' &&
            $name != 'Кузьма')
        {
            $gender = 'женский';
        } elseif (
            $lastCharName == 'а' ||
            $lastCharName == 'я' ||
            $lastCharName == 'й' ||
            $lastCharName == 'л' ||
            $lastCharName == 'р' ||
            $lastCharName == 'н' ||
            $lastCharName == 'д' ||
            $lastCharName == 'г' ||
            $lastCharName == 'с' ||
            $lastCharName == 'в' ||
            $lastCharName == 'к')
        {
            $gender = 'мужской';
        }
    }
    return $gender;
}

assert('женский' == guessGenderByName('Анастасия'));
assert('женский' == guessGenderByName('Галина'));
assert('женский' == guessGenderByName('Любовь'));
assert('женский' == guessGenderByName('Татьяна'));
assert('женский' == guessGenderByName('Евгения'));

assert('мужской' == guessGenderByName('Никита'));
assert('мужской' == guessGenderByName('Кузьма'));
assert('мужской' == guessGenderByName('Фома'));
assert('мужской' == guessGenderByName('Михаил'));
assert('мужской' == guessGenderByName('Василий'));
assert('мужской' == guessGenderByName('Илья'));
assert('мужской' == guessGenderByName('Евгений'));

echo guessGenderByName('Фома');
