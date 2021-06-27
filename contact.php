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
    <?php require_once 'nav_bar.php'; ?>

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

            <table>
                <tbody>

                    <?php if (isset($result) && isset($result->contact)) : ?>
                        <tr class="first-tr">
                            <td></td>
                            <td class="contact-heading my-padding">Contact</td>
                        </tr>
                        <tr>
                            <td class="bg-circle"><i class="fas fa-phone-alt"></i></td>
                            <td class="my-padding"><?= $result->contact ?></td>
                        </tr>
                        <tr class="ht-15"></tr>
                    <?php endif; ?>

                    <?php if (isset($result) && isset($result->email)) : ?>
                        <tr class="first-tr">
                            <td></td>
                            <td class="contact-heading my-padding">Email</td>
                        </tr>
                        <tr>
                            <td class="bg-circle"><i class="far fa-envelope"><span style="color:black;"></i></td>
                            <td class="my-padding"><?= $result->email ?></td>
                        </tr>
                        <tr class="ht-15"></tr>
                    <?php endif; ?>
                    <?php if (isset($result) && isset($result->instagram)) : ?>
                        <tr class="first-tr">
                            <td></td>
                            <td class="contact-heading my-padding">Instagram</td>
                        </tr>
                        <tr>
                            <td class="bg-circle"><i class="fab fa-instagram"></i></td>
                            <td class="my-padding"><?= $result->instagram ?></td>
                        </tr>
                        <tr class="ht-15"></tr>
                    <?php endif; ?>
                    <?php if (isset($result) && isset($result->linkedin)) : ?>
                        <tr class="first-tr">
                            <td></td>
                            <td class="contact-heading my-padding">Linkedin</td>
                        </tr>
                        <tr>
                            <td class="bg-circle"><i class="fab fa-linkedin-in"></i></td>
                            <td class="my-padding"><?= $result->linkedin ?></td>
                        </tr>
                        <tr class="ht-15"></tr>
                    <?php endif; ?>
                    <?php if (isset($result) && isset($result->twitter)) : ?>
                        <tr class="first-tr">
                            <td></td>
                            <td class="contact-heading my-padding">Twitter</td>
                        </tr>
                        <tr>
                            <td class="bg-circle"><i class="fab fa-twitter"><span style="color:black;"></i></td>
                            <td class="my-padding"><?= $result->twitter ?></td>
                        </tr>
                        <tr class="ht-15"></tr>
                        <tr class="ht-15"></tr>
                    <?php endif; ?>

                </tbody>

            </table>

            <div class="follow mr-left-15">
                    <p>
                        Follow Me
                    </p>
                    <div class="social-icons">
                        <a href=""><i class="fab fa-facebook-f my" style="font-size:13px;"></i></a>
                        <a href=""><i class="fab fa-linkedin-in my" style="font-size:14px;"></i></a>
                        <a href=""><i class="fab fa-instagram my" style="font-size:14px;"></i></a>
                    </div>



                </div>




        </div>


        <div class="contactright-content">
            <p>
                <?= isset($contactDescription) && isset($contactDescription->extra_description) ? $contactDescription->extra_description : '' ?>
            </p>
            <?php
            if (isset($message)) {
            ?>
                <p class="thankyou-message"><?= $message ?></p>
            <?php
            }
            ?>

            <?php if(!isset($message)){ ?>
            <form action="" method="POST">
                <input type="text" name="name" id="your_name" placeholder="YOUR NAME" class="form-field">
                <input type="text" name="email" id="your_email" placeholder="YOUR EMAIL" class="form-field">
                <textarea name="comment" id="" cols="30" rows="5" placeholder="WRITE YOUR COMMENT HERE" class="form-field"></textarea>

                <input type="submit" name="submit" value="SEND MESSAGE" class="contact-form-btn">
            </form>
            <?php } ?>
        </div>
    </div>