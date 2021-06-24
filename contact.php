<?php
require_once 'system/Db.php';

$db = new Db();

$result = $db->getWhereData('home_page', ['id' => 1], ['contact', 'email', 'facebook', 'instagram', 'linkedin', 'twitter'], true);

$contactDescription = $db->getWhereData('page_detail', ['page' => 'contact'], ['description', 'extra_description'], true);


$message = null;
if (isset($_POST['submit']) && $_POST['submit'] == 'SEND MESSAGE') {
    require_once './system/ContactController.php';
    $contactC = new ContactController();
    $contact = $contactC->saveData();

    if ($contact) {
        $message = "Thank you for your comment.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

</head>

<body>
    <nav>
        <div>
            <p class="logo-text"> Sabi<span class="orange-text">ta</span></p>

        </div>

        <?php require_once 'nav_bar.php'; ?>

    </nav>

    <div class="Contact-center">

        <p>
            Get &nbsp;<span class="orange-text">in touch</span>

        </p>
    </div>
    <div class="three-in-1">
        <div class="contactleft-line">

        </div>
        <div class="contactsmall-text">
            <p>
                <?= (isset($contactDescription) && isset($contactDescription->description)) ? $contactDescription->description : ''; ?>
            </p>
        </div>
        <div class="contactright-line">
        </div>
    </div>
    <div class="contact-lower">
        <div class="contact-details">
            <ul>

                <?php if (isset($result) && isset($result->contact)) : ?>
                    <li>
                        <p>Contact</p>
                        <!-- <i class="fab fa-facebook-f" style="font-size:13px; color:orange;"></i>i -->
                        <i class="fas fa-envelope"></i>
                        <?= $result->contact ?>
                    </li>
                <?php endif; ?>
                <?php if (isset($result) && isset($result->email)) : ?>
                    <li>
                        <p>Email</p>
                        <!-- <i class="fab fa-facebook-f" style="font-size:13px; color:orange;"></i>i -->
                        <i class="fas fa-envelope"></i>
                        <?= $result->email ?>
                    </li>
                <?php endif; ?>

                <?php if (isset($result) && isset($result->instagram)) : ?>
                    <li>
                        <p>Instagram</p>
                        <!-- <i class="fab fa-facebook-f" style="font-size:13px; color:orange;"></i>i -->
                        <i class="fab fa-instagram"></i>
                        <?= $result->instagram ?>
                    </li>
                <?php endif; ?>

                <?php if (isset($result) && isset($result->linkedin)) : ?>
                    <li>
                        <p>Linkedin</p>
                        <!-- <i class="fab fa-facebook-f" style="font-size:13px; color:orange;"></i>i -->
                        <i class="fab fa-linkedin-in"></i>
                        <?= $result->linkedin ?>
                    </li>
                <?php endif; ?>
                <!-- <li>
            <p>Phone</p>
                    <!-- <i class="fab fa-facebook-f" style="font-size:13px; color:orange;"></i>i -->
                <!-- <i class="fas fa-phone"></i> -->
                <!-- 9846562256
                </li> -->
                <?php if (isset($result) && isset($result->twitter)) : ?>
                    <li>
                        <p>Twitter </p>
                        <i class="fab fa-twitter"></i>
                        <?= $result->twitter ?>

                    </li>
                <?php endif; ?>
                <div class="follow" style="width: fit-content; margin-top: 12px;">
                    <li>

                        Follow Me
                        <div class="social-icons">
                            <a href=""><i class="fab fa-facebook-f my" style="font-size:13px;"></i></a>
                            <a href=""><i class="fab fa-linkedin-in my" style="font-size:14px;"></i></a>
                            <a href=""><i class="fa fa-instagram my" style="font-size:14px;"></i></a>
                        </div>
                </div>
            </ul>



        </div>
        <div class="contactright-content">
            <p>
                <?= isset($contactDescription) && isset($contactDescription->extra_description) ? $contactDescription->extra_description : '' ?>
            </p>
            <?php
            if (isset($message)) {
            ?>
                <p><?= $message ?></p>
            <?php
            }
            ?>
            <form action="" method="POST">
                <input type="text" name="name" id="your_name" placeholder="YOUR NAME" class="form-field">
                <input type="text" name="email" id="your_email" placeholder="YOUR EMAIL" class="form-field">
                <textarea name="comment" id="" cols="30" rows="5" placeholder="WRITE YOUR COMMENT HERE" class="form-field"></textarea>

                <input type="submit" name="submit" value="SEND MESSAGE" class="contact-form-btn">
            </form>
        </div>
    </div>