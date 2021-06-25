<?php

require_once 'NameLogoController.php';

$nameLogoC = new NameLogoController();
$logos = $nameLogoC->getData('name_logo');
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
  <table>
    <tr>
      <td colspan="2">

        <a href="add_namelog.php"> Add Name Logo</a>

      </td>
    </tr>
    <tr>
      <th>Log</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
    <?php
    foreach ($logos as $logo) {
    ?>
      <tr>
        <td><?= $logo->name ?></td>
        <td><?= $logo->status ?></td>
        <td>
          <a href="edit_name_logo.php?id=<?= $logo->id ?>">Edit</a>
          <a href="delete_name_logo.php?id=<?= $logo->id ?>">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>