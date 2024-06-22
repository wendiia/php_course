<section class="comments mb-4">

    <h3 class="text-center display-5 mb-4"> Гостевая книга </h3>

    <div class="row g-3 mb-3">
        <?php foreach ($this->data['records'] as $record) { ?>
            <div class="col-12 p-3" style="border-radius: 15px; background: #dde5ee; color: #626e7c ">
                <p class="p-0 m-0"> <?php echo $record->getMessage(); ?></p>
            </div>
        <?php } ?>
    </div>

    <h5 class="text-center display-6 mb-3"> Новая запись </h5>

    <form action="/../upload_record.php" method="post" class="d-flex flex-column mb-5">
        <label class="mb-2" for="inputRecord"> Введите текст: </label>
        <input class="mb-3 form-control" id="inputRecord" type="text" name="record">
        <input class="btn btn-primary" type="submit" value="Добавить">
    </form>

</section>

