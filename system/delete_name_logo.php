<?php
session_start();
require_once './NameLogoController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {

  $nameLogC = new NameLogoController();
  $selectedData = $nameLogC->deleteData($_GET['id']);

  if ($selectedData) {
    header('location: educations.php');
  }
}
