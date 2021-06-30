<?php
session_start();
require_once './Db.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}
$db = new Db();

$result = $db->getData('home_page');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sys_css/sys.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
           <?php require_once './nav_bar.php'; ?>
               
            <div class="col-md-10">

                <div class="container-fluid">
                    <div class="row welcome-row">
                        <div class="col-12">Welcome Nirajan Chhetri</div>
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
                        <div class="col-12">
                            <!-- if first time profile creation -->
                            <a class="btn green text-white mx-2 my-5" href="home_page.php">Get started with your Profile</a>

                            <!-- if second or later time profile creation -->
                            <a class="btn green text-white mx-2 my-5" href="home_page.php">Add new Profile</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <td>Name</td>
                                    <td>Profession</td>
                                    <td>Detail</td>
                                    <td>Active</td>
                                    <td>Edit</td>
                                </tr>

                                <?php
                                foreach ($result as $data) {
                                ?>
                                    <tr>
                                        <td><?= $data->name ?></td>
                                        <td><?= $data->profession ?></td>
                                        <td><?= substr($data->detail, 0, 8) ?></td>
                                        <td><input type="checkbox" name="" id=""></td>
                                        <td>
                                            <a href="edit_home.php?id=<?= $data->id ?>"><i class="fas fa-edit"></i></a>
                                            <a href="edit_home.php?id=<?= $data->id ?>"><i class="fas fa-trash-alt"></i></a>
                                            <!-- <a onclick="return confirm('Are you sure?')" href="delete_home.php?id=<?= $data->id ?>"><i class="fas fa-trash-alt"></i></a> -->
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>