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
    <title>Nirajan Chhetri</title>
    <link rel="stylesheet" href="assets/css/blog.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/folio-logo.png" type="image/png" sizes="32x32">


</head>

<body style="background:#F6F6F6;">
    <?php require_once 'nav_bar.php'; ?>

    <div id="blog_id" class="my-blogs">
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
                    <?= substr($blog->description, 0, 75); ?>
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

    <script>
        var x = 0;

        function showNavList() {
            var element = document.getElementById("my-ul");
            var elementMyIconny = document.getElementById("my-iconny");
            var elementBlog = document.getElementById("blog_id");
            element.classList.toggle("nav-right-list-ul");
            elementBlog.classList.toggle("mr-top-blog-percent");
            // elementSection.classList.toggle("mr-top-46-percent");
            if (x == 0) {
                elementMyIconny.classList.remove("fa-times");
                elementMyIconny.classList.add("fa-bars");
                x = 1;
            } else {
                elementMyIconny.classList.remove("fa-bars");
                elementMyIconny.classList.add("fa-times");
                x = 0;

            }
        }
    </script>

</body>

</html>