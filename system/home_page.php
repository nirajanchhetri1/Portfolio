<?php
session_start();
require_once './HomePageController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $homePage = new HomePageController();

    $data = $homePage->saveData();

    if (isset($data)) {
        header('location: dashboard.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sys_css/sys_forms.css">
    <title>Admin Dashboard | Home Page</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php require_once './nav_bar.php'; ?>

            <div class="col-md-10">

                <div class="container-fluid">
                    <div class="row welcome-row">
                        <div class="col-12 h2">Welcome Nirajan Chhetri</div>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-4">
                            <div class="dashboard-card yellow">
                                <p class="number">150</p>
                                <p class="stat-title">Portfolio</p>
                                <div class="overlay">
                                </div>
                                <div class="more-info"><a href="portfolio.php">More info <i class="fas fa-arrow-circle-right"></i></a></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-card blue">
                                <p class="number">150</p>
                                <p class="stat-title">My Blogs</p>
                                <div class="overlay">
                                </div>
                                <div class="more-info"><a href="blog.php">More info <i class="fas fa-arrow-circle-right"></i></a></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-card green">
                                <p class="number">150</p>
                                <p class="stat-title">My Skills</p>
                                <div class="overlay">
                                </div>
                                <div class="more-info"><a href="skills.php">More info <i class="fas fa-arrow-circle-right"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-4 mx-3 h4">
                            <strong class="p-3">Fill up your Profile <i class="my-blue far fa-id-card"></i></strong>
                        </div>
                    </div>
                    <hr style="color:#16a2b9;">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="POST">

                                        <table>
                                            <tr>
                                                <td class="my-bold">Name</td>
                                                <td>
                                                    <input type="text" name="name" id="name" class="form-control my-3 mx-3" placeholder="Your Name" aria-label="Your Name">
                                                    <!-- <input type="text" name="name" id="name"> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Profession</td>
                                                <td>
                                                    <input type="text" name="profession" id="profession" class="form-control my-3 mx-3" placeholder="Your Profession" aria-label="Your Profession">
                                                    <!-- <input type="text" name="profession" id="profession"> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Detail</td>
                                                <td>
                                                    <textarea class="form-control my-3 mx-3" id="exampleFormControlTextarea1" rows="3" name="detail" id="detail" placeholder="Describe yourself....."></textarea>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Contact</td>
                                                <td>
                                                    <input type="number" name="contact" id="contact" class="form-control my-3 mx-3" placeholder="Your Contact" aria-label="Your Contact">
                                                    <!-- <input type="number" name="contact" id="contact" /> -->
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Email</td>
                                                <td>
                                                    <input type="email" name="email" id="email" class="form-control my-3 mx-3" placeholder="Your Email" aria-label="Your Email">
                                                    <!-- <input type="email" name="email" id="email" /> -->
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Facebook</td>
                                                <td>
                                                    <input type="text" name="facebook" id="facebook" class="form-control my-3 mx-3 s-media" placeholder="Your Facebook Username" aria-label="Your FB Username">
                                                    <input type="text" name="facebookurl" id="facebookurl" class="form-control my-3 mx-3 s-media" placeholder="Your Facebook Url" aria-label="Your FB Url">
                                                    <!-- <input type="text" name="facebook" id="facebook" /> -->
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Instagram</td>
                                                <td>
                                                    <input type="text" name="instagram" id="instagram" class="form-control my-3 mx-3 s-media" placeholder="Your Instagram Username" aria-label="Your Insta Username">
                                                    <input type="text" name="instagramurl" id="instagramurl" class="form-control my-3 mx-3 s-media" placeholder="Your Instagram Url" aria-label="Your Insta Url">
                                                    <!-- <input type="text" name="instagram" id="instagram" /> -->
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Linkedin</td>
                                                <td>
                                                    <input type="text" name="linkedin" id="linkedin" class="form-control my-3 mx-3 s-media" placeholder="Your Linkedin Username" aria-label="Your Linkedin Username">
                                                    <input type="text" name="linkedinurl" id="linkedinurl" class="form-control my-3 mx-3 s-media" placeholder="Your Linkedin Url" aria-label="Your Linkedin Url">
                                                    <!-- <input type="text" name="linkedin" id="linkedin" /> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Twitter</td>
                                                <td>
                                                    <input type="text" name="twitter" id="twitter" class="form-control my-3 mx-3 s-media" placeholder="Your Twitter Url" aria-label="Your Twitter Username">
                                                    <input type="text" name="twitterurl" id="twitterurl" class="form-control my-3 mx-3 s-media" placeholder="Your Twitter Url" aria-label="Your Twitter Url">
                                                    <!-- <input type="text" name="twitter" id="twitter" /> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Youtube</td>
                                                <td>
                                                    <input type="text" name="youtube" id="youtube" class="form-control my-3 mx-3 s-media" placeholder="Your Youtube Username" aria-label="Your Youtube Username">
                                                    <input type="text" name="youtubeurl" id="youtubeurl" class="form-control my-3 mx-3 s-media" placeholder="Your Youtube Url" aria-label="Your Youtube Url">
                                                    <!-- <input type="text" name="youtube" id="youtube" /> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">GitHub</td>
                                                <td>
                                                    <input type="text" name="git" id="git" class="form-control my-3 mx-3 s-media" placeholder="Your Github Username" aria-label="Your GitHub Username">
                                                    <input type="text" name="giturl" id="giturl" class="form-control my-3 mx-3 s-media" placeholder="Your Github Url" aria-label="Your Youtube Url">
                                                    <!-- <input type="text" name="git" id="git" /> -->
                                                </td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-success my-3 mx-3" type="submit" value="Submit" name="submit">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>