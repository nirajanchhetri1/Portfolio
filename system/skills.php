<?php
session_start();
require_once './SkillController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

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
              <a class="btn green text-white mx-2 my-5" href="add_skill.php"> Add Skill </a>
            </div>
          </div>

          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Skill</th>
                  <th>Confidence</th>
                  <th>Color</th>
                  <th>Actions</th>
                </tr>

                <?php
                foreach ($skills as $skill) {
                ?>
                  <tr>
                    <td><?= $skill->skill; ?></td>
                    <td><?= $skill->confidence; ?></td>
                    <td>
                      <div style="display: inline-block; height: 15px; width: 15px; background: <?= $skill->color ?>"></div>
                    </td>
                    <td>
                      <a href="edit_skill.php?id=<?= $skill->id ?>"><i class="fas fa-edit"></i></a>
                      <a href="delete_skill.php?id=<?= $skill->id ?>" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
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