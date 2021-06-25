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
  <title>Education</title>
</head>

<body>

  <?php require_once './nav_bar.php' ?>
  <form action="" method="POST">
    <table>
      <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" placeholder="Skill" value="<?= isset($selectedData) ? $selectedData->skill : '' ?>"></td>
      </tr>
      <tr>
        <td>Confidence</td>
        <td><input type="number" name="confidence" placeholder="Confidence" value="<?= isset($selectedData) ? $selectedData->confidence : '' ?>"></td>
      </tr>
      <tr>
        <td>Color</td>
        <td><input type="color" name="color" placeholder="Color" value="<?= isset($selectedData) ? $selectedData->color : '' ?>"></td>
      </tr>
      <?php if (isset($_GET['id']) && $_GET['id'] > 0) {
      ?>
        <input type="hidden" name="id" value="<?= $selectedData->id ?>">
        <tr>
          <td></td>
          <td>
            <input type="submit" name="submit" value="Submit">
          </td>
        </tr>
      <?php } ?>
    </table>
  </form>
</body>

</html>