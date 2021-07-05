<?php

require_once './PortfolioController.php';
require_once './HomePageController.php';
require_once 'BlogController.php';
require_once './SkillController.php';

$c = new PortfolioController();

$result = $c->all();

$blogCon = new BlogController();
$blogs = $blogCon->getData('blogs');

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
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php require_once './nav_bar.php'; ?>

            <div class="col-md-10">
                <div class="container-fluid">

                    <div class="row welcome-row">
                        <div class="col-12">Welcome <?= $h_data[0]->name; ?> </div>
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
                        <div class="col-12">
                            <a class="btn green text-white mx-2 my-5" href="add_portfolio.php">Add new portfolio</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Project Name</th>
                                    <th>Client</th>
                                    <th>Budget</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                foreach ($result as $row) {
                                ?>
                                    <tr>
                                        <td><?= $row->project_name; ?></td>
                                        <td><?= $row->client; ?></td>
                                        <td><?= $row->budget; ?></td>
                                        <td><?= $row->duration ?></td>
                                        <td>
                                            <a href="edit_portfolio.php?id=<?= $row->id ?>"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Are you sure?')" href="delete_portfolio.php?id=<?= $row->id ?>"><i class="fas fa-trash-alt"></i></a>
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
</body>

</html>