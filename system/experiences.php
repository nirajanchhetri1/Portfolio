<?php
session_start();
require_once './ExperienceController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

$experienceC = new ExperienceController();
$experiences = $experienceC->getData('experiences');

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
  <?php require_once './nav_bar.php' ?>

  <table>
    <tr>
      <td colspan="4">
        <a href="add_experience.php"> Add Experience</a>
      </td>
    </tr>
    <tr>
      <th>Position</th>
      <th>Company</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Actions</th>
    </tr>

    <?php
    foreach ($experiences as $experience) {
    ?>
      <tr>
        <td><?= $experience->position; ?></td>
        <td><?= $experience->company; ?></td>
        <td><?= $experience->start_date; ?></td>
        <td><?= $experience->end_date; ?></td>
        <td>
          <a href="edit_experience.php?id=<?= $experience->id ?>">Edit</a>
          <a href="delete_experience.php?id=<?= $experience->id ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>