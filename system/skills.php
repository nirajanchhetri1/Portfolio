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
  <?php require_once './nav_bar.php' ?>

  <table>
    <tr>
      <td colspan="4">
        <a href="add_skill.php"> Add Skill</a>
      </td>
    </tr>
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
          <a href="edit_skill.php?id=<?= $skill->id ?>">Edit</a>
          <a href="delete_skill.php?id=<?= $skill->id ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>