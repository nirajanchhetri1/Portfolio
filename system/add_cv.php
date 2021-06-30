<?php
require_once 'CvController.php';

if (isset($_POST['submit'])  && $_POST['submit'] == 'Submit') {

  $cvcontroller = new CvController();
  $cv = $cvcontroller->saveData();
  if ($cv) {
    header('location: cvs.php');
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
  <title>Dashboard | CV</title>
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
              <strong class="p-3">Add your CV / Resume <i class="my-blue fas fa-file"></i></strong>
            </div>
          </div>
          <hr style="color:#16a2b9;">
          <div class="row">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <form action="add_cv.php" method="POST" enctype="multipart/form-data">
                    <table>
                      <tr>
                        <td class="my-bold">Title</td>
                        <td><input class="form-control my-3 mx-3" type="text" name="title" id="title"></td>
                      </tr>
                      <tr>
                        <td class="my-bold">Status</td>
                        <td>
                          <select class="form-select my-3 mx-3" name="status" id="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td class="my-bold">Cv</td>
                        <td>
                          <input class="form-control my-3 mx-3" type="file" name="cv_file" id="cv_file">
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="btn btn-success form-control my-3 mx-3" type="submit" name="submit" value="Submit" /></td>
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