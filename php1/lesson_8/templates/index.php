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
</section>

