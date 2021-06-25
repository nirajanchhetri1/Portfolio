<<<<<<< HEAD
<div style="margin:0 !important;">
    <ul>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/index.php' ? 'active' : '' ?>" href="index.php">Home</a>
        </li>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/about.php' ? 'active' : '' ?>" href="about.php">About</a>
        </li>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/folio.php' ? 'active' : '' ?>" href="folio.php">Protfolio</a>
        </li>
        <li>
=======
<?php
require_once 'system/NameLogoController.php';
$logoC = new NameLogoController();
$logo = $logoC->getLogo();
?>
<nav>
    <?php
    if (isset($logo) && !empty($logo->name)) { ?>
        <div>
            <p class="logo-text"><?= substr($logo->name, 0, strlen($logo->name) - 2) ?><span class="orange-text"><?= substr($logo->name, strlen($logo->name) - 2, strlen($logo->name)) ?></span></p>
        </div>
    <?php } ?>
    <div>
        <ul>
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/index.php' ? 'active' : '' ?>" href="index.php">Home</a>
            </li>
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/about.php' ? 'active' : '' ?>" href="about.php">About</a>
            </li>
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/folio.php' ? 'active' : '' ?>" href="folio.php">Protfolio</a>
            </li>
            <li>
>>>>>>> 6c3afbbadafc1c51e03f54ecd119d9cb040f3bbb

                <a class="<?= $_SERVER['REQUEST_URI'] == '/blog.php' ? 'active' : '' ?>" class="active" href="blog.php">Blog</a>
            </li>
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/contact.php' ? 'active' : '' ?>" href="contact.php">Contact</a>
            </li>
        </ul>
    </div>
</nav>