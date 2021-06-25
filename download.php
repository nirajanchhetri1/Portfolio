<?php
require_once 'system/CvController.php';
$message = null;
if (isset($_GET['file']) && !empty($_GET['file'])) {
  $file = $_GET['file'];
  $cvC = new CvController();
  $result = $cvC->getWhereData('cvs', ['id' => $file], ['file'], true);

  if ($result) {
    $exist_file = $result->file;
    $filePath = './images/cvs/' . $exist_file;

    if (!empty($exist_file) && file_exists($filePath)) {
      header('Cache-Control: public');
      header("Content-Description: File Transfer");
      header("Content-Disposition: attachment; filename=$filePath");
      header('Content-Type: application/pdf');
      header('Content-Transfer-Encoding: binary');

      readfile($filePath);
      $message = "Successfull";
    } else {
      $message = "Something went wrong. Please try again later. ffasfd";
    }
  } else {
    $message = "Something went wrong. Please try again later.";
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
  <?php
  if (isset($message)) {
  ?>
    <h2><?= $message ?></h2>
  <?php
  }
  ?>
</body>

</html>