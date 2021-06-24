<?php
require_once 'CvController.php';

if (isset($_POST['submit'])  && $_POST['submit'] == 'Submit') {

  $cvcontroller = new CvController();
  $cv = $cvcontroller->saveData();
  if ($cv) {
    header('location: cvs.php');
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
  <?php require_once './nav_bar.php' ?>

  <form action="add_cv.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td>Title</td>
        <td><input type="text" name="title" id="title"></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>
          <select name="status" id="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Cv</td>
        <td>
          <input type="file" name="cv_file" id="cv_file">
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