<?php
require_once './AboutController.php';

$aboutC = new AboutController();
$abouts = $aboutC->getData('about');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
</head>

<body>
  <?php require_once './nav_bar.php'; ?>
  <table>
  <tr>
  <td colspan="3">
  <a href="add_about.php">Add Information</a>
  </td>
  </tr>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Birthdate</th>
      <th>Edit</td>
    </tr>
    <?php foreach ($abouts as $about) : ?>
      <tr>
        <td><?= $about->first_name.' '. $about->last_name ?></td>
        <td><?= $about->email ?></td>
        <td><?= $about->birthdate ?></td>
        <td>
            <a href="edit_about.php?id=<?= $about->id?>">Edit</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>