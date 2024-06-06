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
</head>
<body>

<nav class="container-fluid">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/songs.php">Песни</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/fingerings.php">Аппликатуры</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/photo-gallery.php">Фотогаллерея</a>
        </li>
    </ul>
</nav>

<div class="container">
    <section class="d-flex flex-column align-items-center" id="songs">
        <article class="song">
            <h1 class="song__title"><a href=""> Я бью женщин и детей </a></h1>
            <div style="display: flex; align-items: center; margin-bottom: 20px">
                <strong style="margin: 0 5px 0 0">Автор: </strong>
                <h4 style="margin: 0"><a href=""> Валентин Стрыкало</a></h4>
            </div>

            <img src="/assets/img/strykalo.jpg" alt="strykalo">
            <h3 style="text-align: center"> Текст: </h3>
            <pre class="song__text">
C                 G
Я бью женщин и детей потому что я красавчик,
Am
Потому что я сильней ,
Dm           G
И они не могут сдачи дать мне
C                       G
Женщин и детей бить не правильно я знаю
Am
Но бью женщин и детей
Dm        G       C
И я самоутверждаюсь о-о-о
            </pre>
        </article>

        <article class="song">
            <h1 class="song__title"><a href=""> Потерянный рай </a></h1>
            <div style="display: flex; align-items: center; margin-bottom: 20px">
                <strong style="margin: 0 5px 0 0">Автор: </strong>
                <h4 style="margin: 0"><a href=""> Ария </a></h4>
            </div>

            <img src="/assets/img/aria.jpg" alt="aria">
            <h3 style="text-align: center"> Текст: </h3>
            <pre class="song__text">
Am               D
От края до края небо в огне сгорает,
F                       C          G
И в нём исчезают все надежды и мечты,
Am                 D
Но ты засыпаешь, и ангел к тебе слетает.
F                          C           G
Смахнёт твои слёзы, и во сне смеёшься ты.
            </pre>
        </article>
    </section>

</div>
<script src="https://kit.fontawesome.com/5aa26e8b69.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>