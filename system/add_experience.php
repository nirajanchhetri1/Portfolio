<?php
session_start();
require_once './ExperienceController.php';


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
        <td>Company</td>
        <td><input type="text" name="company" placeholder="Company"></td>
      </tr>
      <tr>
        <td>Position</td>
        <td><input type="text" name="position" placeholder="Position"></td>
      </tr>
      <tr>
        <td>Start Date</td>
        <td><input type="date" name="start_date" placeholder="Start Date"></td>
      </tr>
      <tr>
        <td>End Date</td>
        <td><input type="date" name="end_date" placeholder="End Date"></td>
      </tr>
      <tr>
        <td>Description(max 500 character)</td>
        <td>
          <textarea name="description" cols="30" rows="10"></textarea>
        </td>
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