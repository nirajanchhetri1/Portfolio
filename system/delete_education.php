<?php
session_start();
require_once './EducationController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {

  $educationC = new EducationController();

  $selectedData = $educationC->deleteData($_GET['id']);
}
