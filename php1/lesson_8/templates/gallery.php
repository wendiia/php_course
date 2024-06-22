<h3 class="display-3 text-center mb-4"> КотоГалерея </h3>

<div class="row g-4 mb-4">
    <?php
    foreach ($this->data['images'] as $key => $image) {
        if ($image != '.' && $image != '..') { ?>
            <div class="col-3">
                <a class="d-block" href="/image.php?id=<?php echo $key; ?>">
                    <img width="300" height="300" class="object-fit-cover mx-auto d-block"
                         src="/images/<?php echo $image; ?>" alt="cat">
                </a>
            </div>
        <?php }
    } ?>
</div>

<?php if (null !== $this->data['user']) { ?>
    <h4 class="display-4 text-center mb-5"> Загрузи своего котика </h4>
    <form action="/../upload_img.php" method="post" enctype="multipart/form-data">
        <input class="form-control mb-3" type="file" name="img" accept="image/png, image/jpeg"/>
        <input class="btn btn-primary" type="submit">
    </form>
<?php } ?>
