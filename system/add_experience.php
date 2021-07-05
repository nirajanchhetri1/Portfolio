<?php
session_start();
require_once './ExperienceController.php';
require_once 'BlogController.php';
require_once './HomePageController.php';
require_once './PortfolioController.php';
require_once './SkillController.php';

if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $experienceC = new ExperienceController();

  $data = $experienceC->saveData();

  if (isset($data)) {
    header('location: experiences.php');
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
  <title>Dashboard | Experience</title>
</head>

<body>

  <div class="container-fluid">
    <div class="row">
      <?php require_once './nav_bar.php'; ?>

      <div class="col-md-10">

        <div class="container-fluid">
          <div class="row welcome-row">
            <div class="col-12 h2">Welcome <?= $h_data[0]->name; ?> </div>
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
              <strong class="p-3">Add your Experiences <i class="my-blue fas fa-globe-asia"></i></strong>
            </div>
          </div>
          <hr style="color:#16a2b9;">
          <div class="row">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <form action="" method="POST">
                    <table>
                      <tr>
                        <td class="my-bold">Company</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="company" placeholder="Company"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Company Url</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="company_url" placeholder="Company Url"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Position</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="position" placeholder="Position"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Start Date</td>
                        <td><input class="form-control my-3 mx-3" type="date" name="start_date" placeholder="Start Date"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">End Date</td>
                        <td><input class="form-control my-3 mx-3" type="date" name="end_date" placeholder="End Date"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Present</td>
                        <td>
                          <input class="form-check-input" type="checkbox" value="1" name="present" id="present">
                          <label class="form-check-label" for="present">
                            <!-- Present -->
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td class="my-bold">Description(max 500 character)</td>
                        <td>
                          <textarea class="form-control my-3 mx-3" name="description" cols="30" rows="10"></textarea>
                        </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td>
                          <input class="btn btn-success form-control my-3 mx-3" type="submit" name="submit" value="Submit">
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