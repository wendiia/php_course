<h3 class="display-3 text-center mb-5"> Статья </h3>

<a href="../index.php" class="fs-5 mb-5"> Назад </a>

<?php if (!empty($this->data['article'])) { ?>
    <div class="row g-3 mb-5">
        <div class="col-12 p-3" style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
            <p class="p-0 m-0"> <?php echo $this->data['article']->getAuthor(); ?></p>
            <p class="fs-5">
                <?php echo $this->data['article']->getTitle(); ?>
            </p>
            <p class="p-0 m-0"> <?php echo $this->data['article']->getText(); ?></p>
        </div>
    </div>
<?php } else { ?>
    <p class="text-danger display-1 text-center"> Такой статьи нет! </p>
<?php } ?>

