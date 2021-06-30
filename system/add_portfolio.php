<?php
session_start();
require_once './PortfolioController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $portfolio = new PortfolioController();

    $data = $portfolio->saveData();

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
    <title>Dashboard | Portfolio</title>
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
                            <strong class="p-3">Add to your Portfolio <i class="my-blue far fa-id-card"></i></strong>
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
                                                <td class="my-bold">Project Title</td>
                                                <td><input type="text" name="project_title" id="project_title" class="form-control my-3 mx-3" placeholder="Title of the project"></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Project Name</td>
                                                <td><input type="text" name="project_name" id="project_name" class="form-control my-3 mx-3" placeholder="Name of the Project"></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Client</td>
                                                <td>
                                                    <input class="form-control my-3 mx-3" placeholder="Your Client" type="text" name="client" id="client" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Budget</td>
                                                <td>
                                                    <input class="form-control my-3 mx-3" placeholder="Budget of the overall Project" type="text" name="budget" id="budget" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Duration</td>
                                                <td>
                                                    <input class="form-control my-3 mx-3" placeholder="Project Duration" type="text" name="duration" id="duration" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Technology</td>
                                                <td>
                                                    <input class="form-control my-3 mx-3" placeholder="Technology Used" type="text" name="technology" id="technology" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Preview Link</td>
                                                <td>
                                                    <input class="form-control my-3 mx-3" placeholder="Link to your Project" type="text" name="preview" id="preview" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Image</td>
                                                <td>
                                                    <input class="form-control my-3 mx-3" placeholder="Project in Image" type="file" name="image" id="image">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input class="btn btn-success form-control my-3 mx-3" placeholder="Your Name" type="submit" value="Submit" name="submit">
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