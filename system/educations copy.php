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
  <?php require_once './nav_bar.php' ?>

  <table>
    <tr>
      <td colspan="4">
        <a href="add_education.php"> Add Education</a>
      </td>
    </tr>
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
          <a href="edit_education.php?id=<?= $education->id ?>">Edit</a>
          <a href="delete_education.php?id=<?= $education->id ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>