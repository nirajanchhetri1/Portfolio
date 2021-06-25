<?php
session_start();
require_once './ExperienceController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
  $experienceC = new ExperienceController();

  $selectedData = $experienceC->getData('experiences', null, $_GET['id']);
}


if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $experienceC = new ExperienceController();

  $data = $experienceC->updateData();

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
        <td><input type="text" name="company" placeholder="Company" value="<?= isset($selectedData) ? $selectedData->company : '' ?>"></td>
      </tr>
      <tr>
        <td>Position</td>
        <td><input type="text" name="position" placeholder="Position" value="<?= isset($selectedData) ? $selectedData->position : '' ?>"></td>
      </tr>
      <tr>
        <td>Start Date</td>
        <td><input type="date" name="start_date" placeholder="Start Date" value="<?= isset($selectedData) ? $selectedData->start_date : '' ?>"></td>
      </tr>
      <tr>
        <td>End Date</td>
        <td><input type="date" name="end_date" placeholder="End Date" value="<?= isset($selectedData) ? $selectedData->end_date : '' ?>"></td>
      </tr>
      <tr>
        <td>Description(max 500 character)</td>
        <td>
          <textarea name="description" cols="30" rows="10"><?= isset($selectedData) ? $selectedData->description : '' ?></textarea>
        </td>
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