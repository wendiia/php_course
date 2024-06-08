<?php
// Случай 1. Если include успешно включает файл, то возвращается 1
echo 'noReturn = ' . (include __DIR__ . '/functions_task_2.php')  . " ";
// Случай 2. Если во включаемом файле в общей видимости кода используется return,
// include вернет возвращаемое значение.
echo 'return = ' . (include __DIR__ . '/func_task_3.php');
// Случай 3. Если include НЕ успешно включает файл, то возвращается fatalError
echo 'error = ' . (int)(include __DIR__ . '/func_task_23.php');

