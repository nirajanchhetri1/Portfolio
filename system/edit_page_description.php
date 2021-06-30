<?php
session_start();
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}
require_once './PageController.php';


if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $page = new PageController();


    $data = $page->updateData();

    if (isset($data)) {
        header('location: page_description.php');
    }
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $page = new PageController();

    $selectedData = $page->getData('page_detail', null, $_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit Page Description</title>
    <link rel="stylesheet" href="sys_css/sys_forms.css">
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
                            <strong class="p-3">Edit your Page Description<i class="my-blue far fa-id-card"></i></strong>
                        </div>
                    </div>
                    <hr style="color:#16a2b9;">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <table>
                                            <tr>
                                                <td class="my-bold">Page</td>
                                                <td>
                                                    <select  class="form-select my-3 mx-3" name="page" required>
                                                        <option value="portfolio" <?= isset($selectedData) && $selectedData->page == 'portfolio' ? 'selected' : '' ?>>Portfolio</option>
                                                        <option value="portfolio_detail" <?= isset($selectedData) && $selectedData->page == 'portfolio_detail' ? 'selected' : '' ?>>Portfolio Detail</option>
                                                        <option value="contact" <?= isset($selectedData) && $selectedData->page == 'contact' ? 'selected' : '' ?>>Contact</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="my-bold">Description</td>
                                                <td><textarea class="form-control my-3 mx-3" type="text" name="description" value="" id="description"><?= isset($selectedData) ? $selectedData->description : '' ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Extra Description</td>
                                                <td><textarea class="form-control my-3 mx-3" type="text" name="extra_description" value="" id="extra_description"><?= isset($selectedData) ? $selectedData->extra_description : '' ?></textarea></td>
                                            </tr>

                                            <?php
                                            if (isset($_GET['id']) && $_GET['id'] > 0) {
                                            ?>
                                                <tr>
                                                    <input type="hidden" name="id" value="<?= isset($selectedData) ? $selectedData->id : '' ?>">
                                                    <td></td>
                                                    <td>
                                                        <input class="btn btn-success form-control my-3 mx-3" type="submit" value="Submit" name="submit">
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