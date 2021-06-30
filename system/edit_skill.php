<?php
session_start();
require_once './SkillController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
  $skillC = new SkillController();

  $selectedData = $skillC->getData('skills', null, $_GET['id']);
}


if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $skillC = new SkillController();

  $data = $skillC->updateData();

  if (isset($data)) {
    header('location: skills.php');
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
  <title>Dashboard | Edit Skill</title>
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
              <strong class="p-3">Edit Your Skill <i class="my-blue fas fa-brain"></i></strong>
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
                        <td class="my-bold">Skill</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="skill" placeholder="Skill" value="<?= isset($selectedData) ? $selectedData->skill : '' ?>"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Confidence</td>
                        <td><input class="form-control my-3 mx-3" type="number" name="confidence" placeholder="Confidence" value="<?= isset($selectedData) ? $selectedData->confidence : '' ?>"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Color</td>
                        <td><input class="form-control form-control-color my-3 mx-3" type="color" name="color" placeholder="Color" value="<?= isset($selectedData) ? $selectedData->color : '' ?>"></td>
                      </tr>
                      <?php if (isset($_GET['id']) && $_GET['id'] > 0) {
                      ?>
                        <input type="hidden" name="id" value="<?= $selectedData->id ?>">
                        <tr>
                          <td></td>
                          <td>
                            <input class="btn btn-success form-control my-3 mx-3" type="submit" name="submit" value="Submit">
                          </td>
                        </tr>
                      <?php } ?>
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