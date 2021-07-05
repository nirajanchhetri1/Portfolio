<?php
session_start();
require_once './ContactController.php';
require_once './HomePageController.php';
require_once 'BlogController.php';
require_once './PortfolioController.php';
require_once './SkillController.php';

if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}
$contact = null;
if (isset($_GET['id']) && $_GET['id'] > 0) {
  $con = new ContactController();
  $contact = $con->getData('contacts', null, $_GET['id']);
}

$blogCon = new BlogController();
$blogs = $blogCon->getData('blogs');

$c = new PortfolioController();
$portfolio_data = $c->getData('portfolio');

// $result = $c->all();

$skillC = new SkillController();
$skills = $skillC->getData('skills');

?>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Contact</title>
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

          <div class="card text-center mt-5">
            <div class="card-header">
              What your well wishers say !!!!
            </div>
            <div class="card-body">
              <h5 class="card-title">
              From: <span class="font-weight-normal"><u><?= isset($contact) ? $contact->name : '' ?></u></span> <br>
              Email address:<span class="font-weight-normal"><u> <?= isset($contact) ? $contact->email : '' ?></u></span></h5>
              <p class="card-text mt-5">
                <strong>Message:</strong> <?= isset($contact) ? $contact->comment : '' ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>