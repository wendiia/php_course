<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h3>Таблица истинности &&:</h3>
<table>
    <thead>
    <tr>
        <th>A</th>
        <th>B</th>
        <th>A && B</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>0</td>
            <td>0</td>
            <td> <?php echo (int)(0 && 0) ?> </td>
        </tr>
        <tr>
            <td>0</td>
            <td>1</td>
            <td> <?php echo (int)(0 && 1) ?> </td>
        </tr>
        <tr>
            <td>1</td>
            <td>0</td>
            <td> <?php echo (int)(1 && 0) ?> </td>
        </tr>
        <tr>
            <td>1</td>
            <td>1</td>
            <td><?php echo (int)(1 && 1) ?> </td>
        </tr>
    </tbody>
</table>


<h3>Таблица истинности ||:</h3>
<table>
    <thead>
    <tr>
        <th>A</th>
        <th>B</th>
        <th>A || B</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>0</td>
        <td>0</td>
        <td> <?php echo (int)(0 || 0) ?> </td>
    </tr>
    <tr>
        <td>0</td>
        <td>1</td>
        <td> <?php echo (int)(0 || 1) ?> </td>
    </tr>
    <tr>
        <td>1</td>
        <td>0</td>
        <td> <?php echo (int)(1 || 0) ?> </td>
    </tr>
    <tr>
        <td>1</td>
        <td>1</td>
        <td><?php echo (int)(1 || 1) ?> </td>
    </tr>
    </tbody>
</table>

<h3>Таблица истинности xor:</h3>
<table>
    <thead>
    <tr>
        <th>A</th>
        <th>B</th>
        <th>A xor B</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>0</td>
        <td>0</td>
        <td> <?php echo (int)(0 xor 0) ?> </td>
    </tr>
    <tr>
        <td>0</td>
        <td>1</td>
        <td> <?php echo (int)(0 xor 1) ?> </td>
    </tr>
    <tr>
        <td>1</td>
        <td>0</td>
        <td> <?php echo (int)(1 xor 0) ?> </td>
    </tr>
    <tr>
        <td>1</td>
        <td>1</td>
        <td> <?php echo (int)(1 xor 1) ?> </td>
    </tr>
    </tbody>
</table>
</body>
</html>

