<?php

session_start();

require_once './SkillController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $skillC = new SkillController();

  $data = $skillC->saveData();

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
        <td><input type="text" name="skill" placeholder="Skill"></td>
      </tr>
      <tr>
        <td>Confidence</td>
        <td><input type="number" name="confidence" placeholder="Confidence"></td>
      </tr>
      <tr>
        <td>Color</td>
        <td><input type="color" name="color" placeholder="Color"></td>
      </tr>

      <tr>
        <td></td>
        <td>
          <input type="submit" name="submit" value="Submit">
        </td>
      </tr>
    </table>
  </form>
</body>

</html>