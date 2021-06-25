<?php
session_start();
require_once './NameLogoController.php';

if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $nameLogoC = new NameLogoController();


  $data = $nameLogoC->updateData();

  if (isset($data)) {
    header('location: namelogo.php');
  }
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
  $nameLogoC = new NameLogoController();

  $selectedData = $nameLogoC->getData('name_logo', null, $_GET['id']);
}

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
  <?php require_once 'nav_bar.php'; ?>
  <form action="" method="POST">
    <table>
      <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="Name Logo" value="<?= isset($selectedData) ? $selectedData->name : '' ?>" /></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>
          <select name="status">
            <option value="active" <?= isset($selectedData) && $selectedData->name == 'active' ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= isset($selectedData) && $selectedData->name == 'inactive' ? 'selected' : '' ?>>Inactive</option>
          </select>
        </td>
      </tr>
      <?php
      if (isset($_GET['id']) && $_GET['id'] > 0) {
      ?>
        <input type="hidden" name='id' value="<?= $selectedData->id ?>">
        <tr>
          <td></td>
          <td><input type="submit" name="submit" value="Submit" /></td>
        </tr>
      <?php
      }
      ?>
    </table>
  </form>
</body>

</html>