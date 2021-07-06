<?php
session_start();
require_once './AboutController.php';
require_once './HomePageController.php';
require_once 'BlogController.php';
require_once './PortfolioController.php';
require_once './SkillController.php';

if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $about = new AboutController();

    $selectedData = $about->getData('about', null, $_GET['id']);
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $about = new AboutController();

    $data = $about->updateData();

    if (isset($data)) {
        header('location: about.php');
    }
}

$blogCon = new BlogController();
$blogs = $blogCon->getData('blogs');

$c = new PortfolioController();
$portfolio_data = $c->getData('portfolio');

// $result = $c->all();

$skillC = new SkillController();
$skills = $skillC->getData('skills');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sys_css/sys_forms.css">
    <title>Dashboard | Edit About </title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require_once './nav_bar.php'; ?>

            <div class="col-md-10">

                <div class="container-fluid">
                    <div class="row welcome-row">
                        <div class="col-12 h2">
                            <?php
                            if (isset($h_data) && isset($h_data->name)) {
                            ?>
                                Welcome <?= $h_data->name; ?>
                            <?php } else { ?>
                                Welcome to Respected User !!!!
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-4">
                            <div class="dashboard-card yellow">
                                <p class="number">
                                    <?php
                                    echo count($portfolio_data);
                                    ?>
                                </p>
                                <p class="stat-title">Portfolio</p>
                                <div class="overlay">
                                </div>
                                <div class="more-info"><a href="portfolio.php">More info <i class="fas fa-arrow-circle-right"></i></a></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-card blue">
                                <p class="number"> <?php
                                                    echo count($blogs);
                                                    ?></p>
                                <p class="stat-title">My Blogs</p>
                                <div class="overlay">
                                </div>
                                <div class="more-info"><a href="blog.php">More info <i class="fas fa-arrow-circle-right"></i></a></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-card green">
                                <p class="number">
                                    <?php
                                    echo count($skills);
                                    ?>
                                </p>
                                <p class="stat-title">My Skills</p>
                                <div class="overlay">
                                </div>
                                <div class="more-info"><a href="skills.php">More info <i class="fas fa-arrow-circle-right"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mt-4 mx-3 h4">
                            <strong class="p-3">Edit /Update your about section <i class="my-blue far fa-id-card"></i></strong>
                        </div>
                    </div>
                    <hr style="color:#16a2b9;">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form method="POST" enctype="multipart/form-data">
                                        <table>
                                            <tr>
                                                <td class="my-bold">First Name</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="first_name" value="<?= isset($selectedData->first_name) ? $selectedData->first_name : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Last Name</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="last_name" value="<?= isset($selectedData->last_name) ? $selectedData->last_name : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Birthdate</td>
                                                <td><input class="form-control my-3 mx-3" type="date" name="birthdate" value="<?= isset($selectedData->birthdate) ? $selectedData->birthdate : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Nationality</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="nationality" value="<?= isset($selectedData->nationality) ? $selectedData->nationality : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Experience</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="experience" value="<?= isset($selectedData->experience) ? $selectedData->experience : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Address</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="address" value="<?= isset($selectedData->address) ? $selectedData->address : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Freelance</td>
                                                <td>
                                                    <input class="form-check form-control my-3 mx-3" style="width:20px !important;" type="checkbox" name="frelance" value="1" id="isAvailable" <?= isset($selectedData->languages) && $selectedData->frelance == '1' ? 'checked' : '' ?> />
                                                    <label style="padding-top:0px;" for="isAvailable">Available</labe>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Languages</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="languages" value="<?= isset($selectedData->languages) ? $selectedData->languages : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Phone</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="phone" value="<?= isset($selectedData->phone) ? $selectedData->phone : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Email</td>
                                                <td><input class="form-control my-3 mx-3" type="email" name="email" value="<?= isset($selectedData->email) ? $selectedData->email : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Image</td>
                                                <td><input class="form-control my-3 mx-3" type="file" name="image" /></td>
                                            </tr>
                                            <input type="hidden" name="id" value="<?= $selectedData->id ?>" />
                                            <tr>
                                                <td></td>
                                                <td><input class="btn btn-success form-control my-3 mx-3" type="submit" name="submit" value="Submit" /></td>
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