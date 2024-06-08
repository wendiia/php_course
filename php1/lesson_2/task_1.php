<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h3>Таблица истинности &&:</h3>
    <pre><?php echo '| 0 | 0 | ' . (int)(0 && 0) . "|\n" .
            '| 0 | 1 | ' . (int)(0 && 1) . "|\n" .
            '| 1 | 0 | ' . (int)(1 && 0) . "|\n" .
            '| 1 | 1 | ' . (int)(1 && 1) . "|\n\n";
        ?>
    </pre>

    <h3>Таблица истинности ||:</h3>
    <pre><?php echo '| 0 | 0 | ' . (int)(0 || 0) . "|\n" .
            '| 0 | 1 | ' . (int)(0 || 1) . "|\n" .
            '| 1 | 0 | ' . (int)(1 || 0) . "|\n" .
            '| 1 | 1 | ' . (int)(1 || 1) . "|\n\n";
        ?>
    </pre>

    <h3>Таблица истинности xor:</h3>
    <pre><?php echo '| 0 | 0 | ' . (int)(0 xor 0) . "|\n" .
            '| 0 | 1 | ' . (int)(0 xor 1) . "|\n" .
            '| 1 | 0 | ' . (int)(1 xor 0) . "|\n" .
            '| 1 | 1 | ' . (int)(1 xor 1) . "|\n\n";
        ?>
    </pre>
</body>
</html>

