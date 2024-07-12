<?php

//$a = [1, 2, 3];
//$b = [4, 5, 6];
//
//list($test1, $test2, $test3) = $a;
//
//var_dump($test1, $test2, $test3);
//
//$c = [...$a, ...$b];
//
//var_dump($c);

//$array = [
//    [1, 2],
//    [3, 4],
//];
//
//foreach ($array as [$a, $b]) {
//    echo $a . ' ' . $b .  ' ';
//}


for ($i = 0; $i < 5; ++$i) {
    if ($i == 2) {
        continue;
        echo "$i\n";
    }
}
