<?php
//Составьте функцию вычисления дискриминанта квадратного уравнения. Покройте ее тестами.
//Используя эту функцию, напишите программу, которая решает квадратное уравнение.
//Оформите красивый вывод решения.

function discriminant($a, $b, $c) {
    return $b**2 - 4 * $a * $c;
}

function quadraticEquation($a, $b, $c)
{
    $d = discriminant($a, $b, $c);
    if ($d < 0) {
        return null;
    }
    elseif (0 == $d) {
        return -$b / (2 * $a);
    }
    else {
        return [round((-$b + sqrt($d)) / (2 * $a), 2), round((-$b - sqrt($d)) / (2 * $a), 2)];
    }
}

assert(-7 == discriminant(8, 5, 1));
assert(-3 == discriminant(1, 1, 1));
assert(41 == discriminant(2, 3, -4));
assert(1 == discriminant(2, -3, 1));
assert(0 == discriminant(1, -6, 9));

assert(null == quadraticEquation(8, 5, 1));
assert(null == quadraticEquation(1, 1, 1));
assert(null == array_diff([0.85, -2.35], (array)quadraticEquation(2, 3, -4)));
assert(null == array_diff([1, 0.5], (array)quadraticEquation(2, -3, 1)));
assert(3 == quadraticEquation(1, -6, 9));
