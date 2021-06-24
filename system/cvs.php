<?php
require_once 'CvController.php';

$CvController = new CvController();

$cvs = $CvController->getData('cvs');
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
  <?php require_once './nav_bar.php'; ?>

  <a href="add_cv.php">Add new Cv</a>
  <table>
    <tr>
      <th>Title</th>
      <th>Status</th>
    </tr>

    <?php foreach ($cvs as $cv) : ?>
      <tr>
        <td><?= $cv->title ?></td>
        <td><?= $cv->status ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>