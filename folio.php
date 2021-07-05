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
    <title>Nirajan Chhetri</title>
    <link rel="stylesheet" href="assets/css/folio.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/folio-logo.png" type="image/png" sizes="32x32">

</head>

<body style="background:#F6F6F6;">
    <?php require_once 'nav_bar.php'; ?>

    <section id="card" style="margin-top:100px;">
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

    </section>

    <script>
        var x = 0;

        function showNavList() {
            var element = document.getElementById("my-ul");
            var elementMyIconny = document.getElementById("my-iconny");
            var elementFolio = document.getElementById("card");
            element.classList.toggle("nav-right-list-ul");
            elementFolio.classList.toggle("mr-top-folio-percent");
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