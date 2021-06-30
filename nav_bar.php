<?php
require_once 'system/NameLogoController.php';
$logoC = new NameLogoController();
$logo = $logoC->getLogo();
?>
<nav>
    <?php
    if (isset($logo) && !empty($logo->name)) { ?>
        <div class="logo-text">
            <a href="index.php">
                <p class="logo-text"><?= substr($logo->name, 0, strlen($logo->name) - 2) ?><span class="orange-text"><?= substr($logo->name, strlen($logo->name) - 2, strlen($logo->name)) ?></span></p>
            </a>
        </div>
    <?php } ?>

    <div id="hamburger-bar" onclick="showNavList()">
        <i id="my-iconny" class="fas fa-bars"></i>
    </div>
    <div class="nav-right-list">
        <ul id="my-ul">
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/index.php' ? 'active' : '' ?>" href="index.php">Home</a>
            </li>
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/about.php' ? 'active' : '' ?>" href="about.php">About</a>
            </li>
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/folio.php' ? 'active' : '' ?>" href="folio.php">Portfolio</a>
            </li>
            <li>

                <a class="<?= $_SERVER['REQUEST_URI'] == '/blog.php' ? 'active' : '' ?>" class="active" href="blog.php">Blog</a>
            </li>
            <li>
                <a class="<?= $_SERVER['REQUEST_URI'] == '/contact.php' ? 'active' : '' ?>" href="contact.php">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    var x = 0;
    function showNavList() {
        var element = document.getElementById("my-ul");
        var elementSection = document.getElementById("hero");
        var elementMyIconny = document.getElementById("my-iconny");
        var elementMyAboutImage = document.getElementById("about-img");
        console.log(elementMyAboutImage);
        element.classList.toggle("nav-right-list-ul");
        elementSection.classList.toggle("mr-top-46-percent");
        if (x == 0) {
            elementMyIconny.classList.remove("fa-times");
            elementMyIconny.classList.add("fa-bars");
            x=1;
        } else {
            elementMyIconny.classList.remove("fa-bars");
            elementMyIconny.classList.add("fa-times");
            x=0;
           
        }
    }
</script>