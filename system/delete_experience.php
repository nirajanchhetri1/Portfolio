<?php
session_start();
require_once './ExperienceController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {

  $experienceC = new ExperienceController();

  $selectedData = $experienceC->deleteData($_GET['id']);

  if ($selectedData) {
    header('location: experiences.php');
  }
}
