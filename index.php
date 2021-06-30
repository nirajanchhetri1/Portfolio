<?php
require_once 'system/Db.php';
require_once 'system/CvController.php';
require_once 'function.php';

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

// Initialize cookie name
$cookie_name = "data";
$cookie_value = $data["profession"];
// Set cookie
setcookie($cookie_name, $cookie_value);
// if (!isset($_COOKIES[$cookie_name])) {
//     print("Cookie created | ");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nirajan Chhetri</title>
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Roboto:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/img/folio-logo.png" type="image/png" sizes="32x32">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TypewriterJS/2.18.0/core.min.js"></script>
</head>

<body>

    <?php require_once 'nav_bar.php'; ?>


    <section id="hero">
        <div class="left">
            <div class="tag-content">
                <p>
                    I'M <span class="orange-text"><?= count($data) > 0 ? $data['name'] : '' ?> </span>

                </p>
                <p class="margin-top">
                    <span class="orange-text"><?= convertAAn(substr($data['profession'], 0, 1)) ?> </span> <span id="myText"> </span>

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
                <p class="show_in_mobile"></p>

                <div class="follow">
                    <p>
                        Follow Me
                    </p>
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


    <script type="text/javascript">
        var text = document.getElementById("myText");

        var x = document.cookie;
        // console.log(x);


        function checkCookie() {
            // Get cookie using our custom function
            var myData = getCookie(x);

            if (myData != "") {
                // alert("Welcome bro, " + myData);
                return myData;
            } else {
                firstName = prompt("Please enter your first name:");
                if (myData != "" && myData != null) {
                    // Set cookie using our custom function
                    setCookie("myData", myData, 30);
                }
            }
        }

        function getCookie() {
            // Split cookie string and get all individual name=value pairs in an array
            var cookieArr = document.cookie.split(";");
            console.log(cookieArr);
            console.log("pppp");

            // Loop through the array elements
            for (var i = 0; i < cookieArr.length; i++) {
                var cookiePair = cookieArr[i].split("=");
                // console.log(cookiePair);
                // console.log("cpair");

                if (cookiePair[0] == 'data' || cookiePair[0] == ' data') {
                    myCookiePair = cookiePair[1].split('+').join(' ');
                    return decodeURIComponent(myCookiePair);
                }

                if (name == cookiePair[0].trim()) {
                    return decodeURIComponent(cookiePair[1]);
                }
            }
            return null;
        }


        window.onload = function() {
            checkCookie();
        };

        var typewriter = new Typewriter(text, {
            loop: true
        });



        typewriter.typeString(checkCookie())
            .pauseFor(2500)
            .deleteAll()
            .typeString(checkCookie())
            .pauseFor(2500)
            .deleteAll()
            .typeString(checkCookie())
            .start();
    </script>
</body>

</html>