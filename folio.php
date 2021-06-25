<?php

require_once './system/PortfolioController.php';
require_once './system/PageController.php';

$page = new PageController();
$page_detail = $page->getWhereData('page_detail', ['page' => 'portfolio'], [], true);

$portfolio = new PortfolioController();
$result = $portfolio->all();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/folio.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once 'nav_bar.php'; ?>

    <section id="card">
        <div class="center">

            <p>
                My &nbsp;<span class="orange-text">Protfolio</span>

            </p>

        </div>
        <div class="three-in-1">
            <div class="left-line">

            </div>
            <div class="small-text">
                <p>
                    <?= isset($page_detail->description) ? $page_detail->description : '' ?>
                </p>
            </div>
            <div class="right-line">
            </div>
        </div>
    </section>
    <section id="folio-card">


        <div class="folio-cards">
            <?php
            foreach ($result as $port) {
            ?>
                <a href="folio_detail.php?id=<?= $port->id ?>">
                    <div class="folio-image">
                        <img src="./images//portfolio/<?= $port->image ?>" alt="" class="src">
                    </div>
                </a>
            <?php
            }
            ?>
        </div>




        <!-- <div class="folio-cards">
                <a href="#">
                    <div class="folio-image">
                        <img src="./assets/img/folio.jpg" alt="" class="src">
                    </div>
                </a>

                <a href="#">
                    <div class="folio-image">
                        <img src="./assets/img/folio.jpg" alt="" class="src">


                    </div>
                </a>
                <a href="#">
                    <div class="folio-image">
                        <img src="./assets/img/folio.jpg" alt="" class="src">
                    </div>
                </a>


            </div> -->


    </section>



</body>

</html>