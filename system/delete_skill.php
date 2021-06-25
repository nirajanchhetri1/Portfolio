<?php
session_start();
require_once './SkillController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {

  $skillC = new SkillController();

  $selectedData = $skillC->deleteData($_GET['id']);

  if ($selectedData) {
    header('location: skills.php');
  }
}
