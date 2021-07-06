<?php
require_once 'CvController.php';
require_once 'BlogController.php';
require_once './HomePageController.php';
require_once './PortfolioController.php';
require_once './SkillController.php';

$CvController = new CvController();

$cvs = $CvController->getData('cvs');

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
  <title>Dashboard | CV</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <?php require_once './nav_bar.php'; ?>

      <div class="col-md-10">
        <div class="container-fluid">
          <div class="row welcome-row">
            <div class="col-12">
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
            <div class="col-12">
              <a class="btn green text-white mx-2 my-5" href="add_cv.php">Add new CV</a>
            </div>
          </div>

          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Title</th>
                  <th>Status</th>
                  <th>CV</th>
                </tr>

                <?php foreach ($cvs as $cv) : ?>
                  <tr>
                    <td><?= $cv->title ?></td>
                    <td><?= $cv->status ?></td>
                    <td><a class="text-decoration-none" href="../download.php?file=<?= $cv->id ?>"><i class="fas fa-download"></i> My CV</a></td>
                  </tr>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>