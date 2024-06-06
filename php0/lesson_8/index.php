<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Lesson 6 </title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script defer src="/assets/js/script.js"></script>
</head>
<body>
<div class="container align-center">
    <div class="row justify-content-center mb-3">
        <h1 class="title mb-4">
            Калькулятор на js
        </h1>

        <form class="d-flex flex-column mb-3">
            <label  for="inputFirstNum"> Первое число: </label>
            <input class="mb-3" id="inputFirstNum" type="number" name="first_num">
            <label for="selectOperation"> Выбор операции: </label>
            <select class="mb-3" name="operation" id="selectOperation">
                <option value="">-- Выберите операцию --</option>
                <option value="plus">+</option>
                <option value="minus">-</option>
                <option value="division">/</option>
                <option value="multiplication">*</option>
            </select>

            <label for="inputSecondNum"> Второе число: </label>
            <input class="mb-3" id="inputSecondNum" type="number" name="second_num">
            <button class="btn btn-primary" onclick="calc()"> Посчитать </button>
        </form>

    </div>

</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

