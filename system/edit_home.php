<?php
session_start();
require_once './HomePageController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $homePage = new HomePageController();


    $data = $homePage->updateData();

    // if(isset($data)){
    //     header('location: dashboard.php');
    // }
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $homePage = new HomePageController();

    $selectedData = $homePage->getData('home_page', null, $_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sys_css/sys_forms.css">
    <title>Dashboard | Edit Home</title>
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
                            <strong class="p-3">Edit Your Profile  <i class="my-blue fas fa-user-edit"></i></strong>
                        </div>
                    </div>
                    <hr style="color:#16a2b9;">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <table>
                                            <input type="hidden" name="">
                                            <tr>
                                                <td class="my-bold">Name</td>
                                                <td>
                                                    <input type="text" name="name" value="<?= isset($selectedData) ? $selectedData->name : '' ?>" id="name" class="form-control my-3 mx-3">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Profession</td>
                                                <td><input type="text" name="profession" value="<?= isset($selectedData) ? $selectedData->profession : '' ?>" id="profession" class="form-control my-3 mx-3"></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Detail</td>
                                                <td>
                                                    <textarea class="form-control my-3 mx-3" name="detail" id="detail" rows="6"><?= isset($selectedData) ? $selectedData->detail : '' ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Contact</td>
                                                <td><input class="form-control my-3 mx-3" type="number" name="contact" id="contact" value="<?= isset($selectedData) ? $selectedData->contact : ' ' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Email</td>
                                                <td><input class="form-control my-3 mx-3" type="email" name="email" id="email" value="<?= isset($selectedData) ? $selectedData->email : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Facebook</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="facebook" id="facebook" value="<?= isset($selectedData) ? $selectedData->facebook : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Instagram</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="instagram" id="instagram" value="<?= isset($selectedData) ? $selectedData->instagram : '' ?>" /></td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Linkedin</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="linkedin" id="linkedin" value="<?= isset($selectedData) ? $selectedData->linkedin : '' ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Twitter</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="twitter" id="twitter" value="<?= isset($selectedData) ? $selectedData->twitter : '' ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Youtube</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="youtube" id="youtube" value="<?= isset($selectedData) ? $selectedData->youtube : '' ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Git</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="git" id="git" value="<?= isset($selectedData) ? $selectedData->git : '' ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Image</td>
                                                <td>
                                                    <input class="form-control my-3 mx-3" type="file" name="image" id="image">
                                                </td>
                                            </tr>
                                            <?php
                                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                            ?>
                                                <tr>
                                                    <input type="hidden" name="id" value="<?= isset($selectedData) ? $selectedData->id : '' ?>">
                                                    <td></td>
                                                    <td>
                                                        <input class="btn btn-success" type="submit" value="Update" name="submit">
                                                    </td>
                                                </tr>
                                            <?php } ?>
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