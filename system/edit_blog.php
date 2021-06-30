<?php
session_start();
require_once './BlogController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $blog = new BlogController();

    $selectedData = $blog->getData('blogs', null, $_GET['id']);
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Update') {
    $blog = new BlogController();
    $data = $blog->updateData();

    if (isset($data)) {
        header('location: blog.php');
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
    <title>Dashboard | Edit Blog</title>
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
                            <strong class="p-3">Edit Your Blog <i class="my-blue fas fa-blog"></i></strong>
                        </div>
                    </div>
                    <hr style="color:#16a2b9;">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <form method="POST" action="#" enctype="multipart/form-data">
                                        <table>
                                            <tr>
                                                <td class="my-bold">Title</td>
                                                <td><input class="form-control my-3 mx-3" type="text" name="title" value="<?= isset($selectedData->title) ? $selectedData->title : '' ?>" /></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Description</td>
                                                <td><textarea class="form-control my-3 mx-3" name="description" cols="40" rows="15"><?= isset($selectedData->description) ? $selectedData->description : '' ?></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="my-bold">Image</td>
                                                <td><input class="form-control my-3 mx-3" type="file" name="image" /></td>
                                            </tr>
                                            <?php
                                            if (isset($selectedData->id) && $selectedData->id > 0) {
                                            ?>
                                                <input type="hidden" name="id" value="<?= $selectedData->id ?>">
                                                <tr>
                                                    <td></td>
                                                    <td><input class="btn btn-success form-control my-3 mx-3" type="submit" name="submit" value="Update" /></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
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
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
     <script>
         CKEDITOR.replace('description')
     </script>
</body>

</html>