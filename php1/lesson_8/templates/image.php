<h3 class="display-3 text-center mb-5"> КотоФото </h3>

<?php
if (
    !empty($this->data['id']) &&
    null !== $this->data['image']
) {
    ?>
    <div class="row justify-content-center g-4">
        <div class="col-auto">
            <img width="400" height="400" class="object-fit-cover"
                 src="/images/<?php echo $this->data['image']; ?>" alt="cat">
        </div>
    </div>

    <?php
} else { ?>
    <p class="text-danger display-1 text-center"> Фото такого котика нет! </p>
    <?php
} ?>
