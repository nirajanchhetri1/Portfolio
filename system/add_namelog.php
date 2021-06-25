<?php

session_start();

require_once './NameLogoController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $nameLogoC = new NameLogoController();

  $data = $nameLogoC->saveData();

  if (isset($data)) {
    header('location: namelogo.php');
  }
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
        <td><input type="text" name="name" placeholder="Name Logo" /></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>
          <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Submit" /></td>
      </tr>
    </table>
  </form>
</body>

</html>