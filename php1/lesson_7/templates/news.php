<section class="mb-4">
    <h3 class="text-center display-5 mb-4"> Новости </h3>

    <div class="row g-3 mb-5">
        <?php foreach ($this->data['news'] as $key => $article) { ?>
            <div class="col-12 p-3" style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
                <p class="p-0 m-0"> <?php echo $article->getAuthor(); ?></p>
                <a class="fs-5" href="/../article.php?id=<?php echo $key; ?>">
                    <?php echo $article->getTitle() ?>
                </a>
                <p class="p-0 m-0">
                    <?php echo substr($article->getText(), 0, 50); ?>
                </p>
            </div>
        <?php } ?>
    </div>

    <?php if (null !== $this->data['user']) { ?>
        <h5 class="text-center display-6 mb-3"> Добавьте свою новость </h5>

        <form action="/../upload_article.php" method="post" class="d-flex flex-column mb-5">
            <label class="mb-2" for="inputTitle"> Название статьи: </label>
            <input class="mb-3 form-control" id="inputTitle" type="text" name="title">

            <label class="mb-2" for="inputContent"> Введите текст: </label>
            <textarea class="mb-3 form-control" id="inputContent" name="content"></textarea>

            <input class="btn btn-primary" type="submit" value="Добавить">
        </form>
    <?php } ?>
</section>
