<?php
session_start();
require_once './PortfolioController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {

  $skillC = new PortfolioController();

  $selectedData = $skillC->deleteData($_GET['id']);

  if ($selectedData) {
    header('location: portfolio.php');
  }
}
