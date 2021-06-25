<?php

require_once 'system/BlogController.php';
$blogc = new BlogController();
$blogs = $blogc->getData('blogs');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <?php require_once 'nav_bar.php'; ?>

    <div class="my-blogs">
        <p>
            My &nbsp;<span class="orange-text">blogs</span>
        </p>
    </div>

    <div class="my-cards">

        <?php
        foreach ($blogs as $blog) {
        ?>
            <div class="blog-card">
                <div class="blog-img">
                    <img src="./images/blogs/<?= $blog->image ?>" alt="" class="src">
                </div>
                <div class="blog-title">
                    <p>
                        <?= $blog->title ?>
                    </p>
                </div>
                <div class="blog-content">
                    <?= substr($blog->description, 0, 150); ?>
                </div>
                <div class="readmore-btn">
                    <a href="blog_details.php?id=<?= $blog->id ?>">
                        Read More
                    </a>
                </div>

            </div>
        <?php
        }
        ?>

        <!-- <div class="blog-card">
            <div class="blog-img">
                <img src="images/blog.jpg" alt="" class="src">
            </div>
            <div class="blog-title">
                <p>
                    Design a world as you wish to design.
                </p>
            </div>
            <div class="blog-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error, sit minima temporibus autem eum
                aut tempora aspernatur exercitationem
                perspiciatis accusamus?
            </div>
            <div class="readmore-btn">
                Read More
            </div>

        </div> -->

        <!-- <div class="blog-card">
            <div class="blog-img">
                <img src="images/blog.jpg" alt="" class="src">
            </div>
            <div class="blog-title">
                <p>
                    Design a world as you wish to design.
                </p>
            </div>
            <div class="blog-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error, sit minima temporibus autem eum
                aut tempora aspernatur exercitationem
                perspiciatis accusamus?
            </div>
            <div class="readmore-btn">
                Read More
            </div>

        </div> -->


        <!-- <div class="blog-card">
            <div class="blog-img">
                <img src="images/blog.jpg" alt="" class="src">
            </div>
            <div class="blog-title">
                <p>
                    Design a world as you wish to design.
                </p>
            </div>
            <div class="blog-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error, sit minima temporibus autem eum
                aut tempora aspernatur exercitationem
                perspiciatis accusamus?
            </div>
            <div class="readmore-btn">
                Read More
            </div>

        </div> -->

        <!-- <div class="blog-card">
            <div class="blog-img">
                <img src="images/blog.jpg" alt="" class="src">
            </div>
            <div class="blog-title">
                <p>
                    Design a world as you wish to design.
                </p>
            </div>
            <div class="blog-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error, sit minima temporibus autem eum
                aut tempora aspernatur exercitationem
                perspiciatis accusamus?
            </div>
            <div class="readmore-btn">
                Read More
            </div>

        </div> -->

        <!-- <div class="blog-card">
            <div class="blog-img">
                <img src="images/blog.jpg" alt="" class="src">
            </div>
            <div class="blog-title">
                <p>
                    Design a world as you wish to design.
                </p>
            </div>
            <div class="blog-content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Error, sit minima temporibus autem eum
                aut tempora aspernatur exercitationem
                perspiciatis accusamus?
            </div>
            <div class="readmore-btn">
                Read More
            </div>

        </div> -->

    </div>


</body>

</html>