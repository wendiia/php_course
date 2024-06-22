<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="/../index.php"> Главная </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/../news.php"> Новости </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/../gallery.php"> Котогалерея </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/../login.php"> Войти </a>
    </li>
    <?php if (null !== $this->data['user']) { ?>
        <li class="nav-item">
            <p class="nav-link text-success"> <?php echo $this->data['user']; ?> </p>
        </li>
    <?php } ?>
</ul>
