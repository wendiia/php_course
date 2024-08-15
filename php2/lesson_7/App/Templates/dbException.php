<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Lesson 7 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        html, body, .container {
            background: #eaf7ff;
        }
    </style>
</head>
<body>

<div class="container align-center">
    <h2 class="display-2 text-center mb-5"> Извините, возникли проблемы с базой данных </h2>
    <h3 class="display-5 text-center mb-5 text-primary"> <?php echo $exception->getMessage(); ?> </h3>
    <h1 class="display-1 text-center mb-5"> =( </h1>
</div>

<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
