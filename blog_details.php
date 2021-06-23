<?php
require_once 'system/BlogController.php';

if(isset($_GET['id'])&&$_GET['id']>0){
    $blogc=new BlogController();
    $blog=$blogc->getWhereData('blogs',['id'=>$_GET['id']],[],true);
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
    <nav>
        <div>
            <p class="logo-text"> Sabi<span class="orange-text">ta</span></p>

        </div>

        <div>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Protfolio</a>
                </li>
                <li>

                    <a class="active" href="#">Blog</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="blog-details">
        <p>
            My &nbsp;<span class="orange-text">blogs</span>
        </p>
    </div>
    <?php
    if(isset($blog)){
    ?>

    <div class="blog-detailimg">
        <img src="./images/blogs/<?= $blog->image?>" alt="" class="src">

        <div class="black-overlay">

        </div>
        <div class="info-list">
            <ul>
                <li>
                    
                    <i class="fas fa-calendar-alt" style="font-size:13px; color:orange;"></i>

                    <?= isset($blog->created_at)? date('d F Y'):''?>
                </li>
            </ul>
        </div>
    </div>

    <div class="blogdetail-content">
        <div class="blogdetail-ttitle">
            <?= $blog->title?>
        </div>

        <div class="blogdetails-para">
            <?= $blog->description ?>
        </div>
    </div>
    <?php
    }
    ?>

</body>

</html>