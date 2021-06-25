<?php
require_once 'system/Db.php';
require_once 'system/CvController.php';

$db = new Db();
$cvC = new CvController();
$cv = $cvC->getCv();

$result = $db->getData('home_page', null, null, 1);
$data = array();
foreach ($result as $newData) {
    $data = [
        'name' => $newData->name,
        'profession' => $newData->profession,
        'detail' => $newData->detail,
        'image' => $newData->image
    ];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>protfolio_site</title>
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>
<<<<<<< HEAD
    <nav>
        <div class="logo-nav">
            <p class="logo-text">Sabi<span class="orange-text">ta</span></p>
        </div>
=======
>>>>>>> 6c3afbbadafc1c51e03f54ecd119d9cb040f3bbb

    <?php require_once 'nav_bar.php'; ?>


    <section id="hero">
        <div class="left">
            <div class="tag-content">
                <p>
                    I'M <span class="orange-text"><?= count($data) > 0 ? $data['name'] : '' ?> </span>

                </p>
                <p class="margin-top">
                    <span class="orange-text">A </span> <?= count($data) > 0 ? $data['profession'] : '' ?> |
                </p>

                <img src="<?= count($data) > 0 ? './images/' . $data['image'] : '' ?>" alt="" width="50" class="view_mobile">

                <p class="small-text">
                    <!-- In a professional context it often happens that private<br>
                    clients corder a publication to be made. -->
                    <?= count($data) > 0 ? $data['detail'] : '' ?>
                </p>
            </div>
            <div class="button">

                <?php
                if (count((array) $cv) > 0) {
                ?>
                    <div class="cv-button">
                        <a href="download.php?file=<?= $cv->id ?>">Download CV</a>

                        <!-- </li> -->
                    </div>
                <?php

                }
                ?>
                <!-- <div class="cv-button">
                    Download CV

                </div> -->
                <div class="follow">

                    Follow Me
                    <div class="social-icons">
                        <a href=""><i class="fab fa-facebook-f my" style="font-size:13px;"></i></a>
                        <a href=""><i class="fab fa-linkedin-in my" style="font-size:14px;"></i></a>
                        <a href=""><i class="fa fa-instagram my" style="font-size:14px;"></i></a>
                    </div>



                </div>
            </div>
        </div>

        <div class="right">
            <div class="home-img">
                <img src="<?= count($data) > 0 ? './images/' . $data['image'] : '' ?>" alt="" width="200">

            </div>

        </div>

    </section>

</body>

</html>