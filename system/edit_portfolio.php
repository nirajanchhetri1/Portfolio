<?php
session_start();
require_once './PortfolioController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}
if (isset($_GET['id']) && $_GET['id'] > 0) {
  $portfolio = new PortfolioController();

  $selectedData = $portfolio->getData('portfolio', null, $_GET['id']);
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
  $portfolio = new PortfolioController();

  $data = $portfolio->updateData();

  if (isset($data)) {
    header('location: portfolio.php');
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
  <?php require_once './nav_bar.php'; ?>
  <form method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Project Title</td>
        <td><input type="text" name="project_title" id="project_title" value="<?= isset($selectedData) ? $selectedData->project_title : '' ?>"></td>
      </tr>
      <tr>
        <td>Project Name</td>
        <td><input type="text" name="project_name" id="project_name" value="<?= isset($selectedData) ? $selectedData->project_name : '' ?>"></td>
      </tr>
      <tr>
        <td>Client</td>
        <td>
          <input type="text" name="client" id="client" value="<?= isset($selectedData) ? $selectedData->client : '' ?>" />
        </td>
      </tr>
      <tr>
        <td>Budget</td>
        <td>
          <input type="text" name="budget" id="budget" value="<?= isset($selectedData) ? $selectedData->budget : '' ?>" />
        </td>
      </tr>
      <tr>
        <td>Duration</td>
        <td>
          <input type="text" name="duration" id="duration" value="<?= isset($selectedData) ? $selectedData->duration : '' ?>" />
        </td>
      </tr>
      <tr>
        <td>Technologo</td>
        <td>
          <input type="text" name="technology" id="technology" value="<?= isset($selectedData) ? $selectedData->technology : '' ?>" />
        </td>
      </tr>
      <tr>
        <td>Preview Link</td>
        <td>
          <input type="text" name="preview" id="preview" value="<?= isset($selectedData) ? $selectedData->preview : '' ?>" />
        </td>
      </tr>
      <tr>
        <td>Image</td>
        <td>
          <input type="file" name="image" id="image">
        </td>
      </tr>
      <?php
      if (isset($selectedData->id) && $selectedData->id > 0) {
      ?>
        <input type="hidden" name="id" value="<?= $selectedData->id ?>">
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