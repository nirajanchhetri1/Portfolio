<?php
session_start();
require_once './PortfolioController.php';
require_once './HomePageController.php';
require_once 'BlogController.php';
require_once './SkillController.php';

if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}
if (isset($_GET['id']) && $_GET['id'] > 0) {
  $portfolio = new PortfolioController();

  $selectedData = $portfolio->getData('portfolio', null, $_GET['id']);
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $portfolio = new PortfolioController();

  $data = $portfolio->updateData();

  if (isset($data)) {
    header('location: portfolio.php');
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
  <title>Dashboard | Edit Portfolio</title>
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
              <strong class="p-3">Edit Your Portfolio <i class="my-blue far fa-id-card"></i></strong>
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
                        <td class="my-bold">Project Title</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="project_title" id="project_title" value="<?= isset($selectedData) ? $selectedData->project_title : '' ?>"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Project Name</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="project_name" id="project_name" value="<?= isset($selectedData) ? $selectedData->project_name : '' ?>"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Client</td>
                        <td>
                          <input class="form-control my-3 mx-3" type="text" name="client" id="client" value="<?= isset($selectedData) ? $selectedData->client : '' ?>" />
                        </td>
                      </tr>
                      <tr>
                        <td class="my-bold">Budget</td>
                        <td>
                          <input class="form-control my-3 mx-3" type="text" name="budget" id="budget" value="<?= isset($selectedData) ? $selectedData->budget : '' ?>" />
                        </td>
                      </tr>
                      <tr>
                        <td class="my-bold">Duration</td>
                        <td>
                          <input class="form-control my-3 mx-3" type="text" name="duration" id="duration" value="<?= isset($selectedData) ? $selectedData->duration : '' ?>" />
                        </td>
                      </tr>
                      <tr>
                        <td class="my-bold">Technologo</td>
                        <td>
                          <input class="form-control my-3 mx-3" type="text" name="technology" id="technology" value="<?= isset($selectedData) ? $selectedData->technology : '' ?>" />
                        </td>
                      </tr>
                      <tr>
                        <td class="my-bold">Preview Link</td>
                        <td>
                          <input class="form-control my-3 mx-3" type="text" name="preview" id="preview" value="<?= isset($selectedData) ? $selectedData->preview : '' ?>" />
                        </td>
                      </tr>
                      <tr>
                        <td class="my-bold">Image</td>
                        <td>
                          <input class="form-control my-3 mx-3" type="file" name="image" id="image">
                        </td>
                      </tr>
                      <?php
                      if (isset($selectedData->id) && $selectedData->id > 0) {
                      ?>
                        <input type="hidden" name="id" value="<?= $selectedData->id ?>">
                        <tr>
                          <td></td>
                          <td><input class="btn btn-success form-control my-3 mx-3" type="submit" name="submit" value="Submit" /></td>
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
</body>

</html>