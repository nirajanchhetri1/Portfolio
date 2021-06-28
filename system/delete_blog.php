<?php
session_start();
require_once './BlogController.php';


if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
  header('location: login.php');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {

  $skillC = new BlogController();

  $selectedData = $skillC->deleteData($_GET['id']);

  if ($selectedData) {
    header('location: blog.php');
  }
}
