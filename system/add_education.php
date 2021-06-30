<?php
session_start();
require_once './EducationController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $educationC = new EducationController();

  $data = $educationC->saveData();

  if (isset($data)) {
    header('location: educations.php');
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
  <title>Dashboard | Education</title>
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
              <strong class="p-3">Add your educational milestones <i class="my-blue fas fa-graduation-cap"></i></strong>
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
                        <td class="my-bold">Degree</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="degree" placeholder="Degree"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">School</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="school" placeholder="School"></td>
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
                        <td class="my-bold">Running</td>
                        <td>
                        <input class="form-check-input" type="checkbox" value="1" name="is_running" id="isRunning">
                        <label class="form-check-label" for="isRunning">
                          Running
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