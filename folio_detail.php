<?php
require_once './system/PortfolioController.php';
require_once './system/PageController.php';

$page = new PageController();
$page_detail = $page->getWhereData('page_detail', ['page' => 'portfolio_detail'], [], true);

$port = new PortfolioController();

$reuslt = null;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $reuslt = $port->getData('portfolio', null, $_GET['id']);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirajan Chhetri</title>
    <link rel="stylesheet" href="assets/css/folio.css">
    <link rel="stylesheet" href="assets/css/folio_detail.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/folio-logo.png" type="image/png" sizes="32x32">

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

        <?php
        if (isset($reuslt)) {
        ?>
            <div class="folio-detailslow">
                <div class="folio-imagedetails">
                    <img src="./images/portfolio/<?= $reuslt->image ?>" alt="" class="src">

                </div>
                <div class="foliodetails-content">
                    <ul class="list">
                        <li class="caps">
                            <?= $reuslt->project_title ?>
                        </li>
                        <li>
                            Project: <span class="list-left"><?= $reuslt->project_name ?></span>
                        </li>
                        <li>
                            client:<span class="list-left"><?= $reuslt->client; ?></span>
                        </li>
                        <li>
                            duration:<span class="list-left"> <?= $reuslt->duration ?></span>
                        </li>
                        </li>
                        <li>
                            technology:<span class="list-left"> <?= $reuslt->technology ?></span>
                        </li>
                        <li>
                            Budget:<span class="list-left"><?= $reuslt->budget ?></span>
                        </li>
                    </ul>


                </div>

            </div>
            <div class="foliopreview-button">
                <a href="<?= $reuslt->preview ?>" target="_blank" class="preview-btn" onclick="show_modal()">
                    Preview
                </a>

            </div>


    </section>
    <!-- <section id="preview-page">
        <div class="overlay" onclick="hide_modal()">

        </div>
        <div class="overlay-box">
            <p class="cross" onclick="hide_modal()">X</p>
            <img src="./images/portfolio/<?= $reuslt->image ?>" alt="" class="src">

        </div>
    </section> -->

<?php
        }
?>
 <script>
        var x = 0;

        function showNavList() {
            var element = document.getElementById("my-ul");
            var elementMyIconny = document.getElementById("my-iconny");
            var elementFolio = document.getElementById("card");
            element.classList.toggle("nav-right-list-ul");
            elementFolio.classList.toggle("mr-top-foliod-percent");
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