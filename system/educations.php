<?php
session_start();
require_once './EducationController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

$educationC = new EducationController();
$educations = $educationC->getData('educations');

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
              <a class="btn green text-white mx-2 my-5" href="add_education.php"> Add Education</a>
            </div>
          </div>

          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Degree</th>
                  <th>School</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Actions</th>
                </tr>

                <?php
                foreach ($educations as $education) {
                ?>
                  <tr>
                    <td><?= $education->degree; ?></td>
                    <td><?= $education->school; ?></td>
                    <td><?= $education->start_date; ?></td>
                    <td><?= $education->end_date; ?></td>
                    <td>
                      <a href="edit_education.php?id=<?= $education->id ?>"><i class="fas fa-edit"></i></a>
                      <a href="delete_education.php?id=<?= $education->id ?>" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
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