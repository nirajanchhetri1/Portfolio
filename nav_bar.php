<div>
    <ul>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/index.php' ? 'active' : '' ?>" href="index.php">Home</a>
        </li>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/about.php' ? 'active' : '' ?>" href="#">About</a>
        </li>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/folio.php' ? 'active' : '' ?>" href="folio.php">Protfolio</a>
        </li>
        <li>

            <a class="<?= $_SERVER['REQUEST_URI'] == '/blog.php' ? 'active' : '' ?>" class="active" href="blog.php">Blog</a>
        </li>
        <li>
            <a class="<?= $_SERVER['REQUEST_URI'] == '/contact.php' ? 'active' : '' ?>" href="contact.php">Contact</a>
        </li>
    </ul>
</div>