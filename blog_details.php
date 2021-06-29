<?php
require_once 'system/BlogController.php';

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $blogc = new BlogController();
    $blog = $blogc->getWhereData('blogs', ['id' => $_GET['id']], [], true);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/blog_details.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

</head>

<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="K4YqeCcj"></script>

    <?php require_once 'nav_bar.php'; ?>


    <div class="blog-details">
        <p>
            My &nbsp;<span class="orange-text">blogs</span>
        </p>
    </div>
    <?php
    if (isset($blog)) {
    ?>

        <div class="blog-detailimg">
            <img src="./images/blogs/<?= $blog->image ?>" alt="" class="src">

            <div class="black-overlay">
                <div class="info-list">
                    <ul>
                        <li>

                            <i class="fas fa-calendar-alt" style="font-size:100%;"></i>

                            <?= isset($blog->created_at) ? date('d F Y') : '' ?>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="blogdetail-content">
            <div class="blogdetail-ttitle">
                <?= $blog->title ?>
            </div>

            <div class="blogdetails-para">
                <?= $blog->description ?>
                <div class="fb-comments" data-href="http://localhost:8000/blog_details.php?id=<?= $blog->id ?>" data-width="80vw" data-numposts="5"></div>
            </div>
        </div>



        <!-- <div class="fb-comments" data-href="http://localhost:8000/blog_details.php?id=1" data-width="80vw" data-numposts="5"></div> -->
    <?php
    }
    ?>

</body>

</html>