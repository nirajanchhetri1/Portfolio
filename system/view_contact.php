<?php
session_start();
require_once './ContactController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}
$contact=null;
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $con = new ContactController();
    $contact = $con->getData('contacts', null, $_GET['id']);
}
?>


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Contact</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <?php require_once './nav_bar.php'; ?>

      <p><?= isset($contact) ? $contact->name:''?></p>
      <p><?= isset($contact) ? $contact->email:''?></p>
      <p><?= isset($contact) ? $contact->comment:''?></p>
    </div>
  </div>
</body>

</html>