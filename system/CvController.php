<?php

require_once 'Db.php';
class CvController extends Db
{
  public function saveData()
  {
    $title = $_POST['title'];
    $status = $_POST['status'];

    $data = ['title' => $title, 'status' => $status];

    if (isset($_FILES['cv_file']) && !empty($_FILES['cv_file']['name'])) {
      $file = $this->uploadCv();
      $data['file'] = $file;
    }

    return  $this->create('cvs', $data);
  }

  private function uploadCv()
  {
    $file_name = $_FILES['cv_file']['name'];
    $file_tmp = $_FILES['cv_file']['tmp_name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    //   $extensions= array("jpeg","jpg","png");

    $new_name = time() . '.' . $file_ext;
    if (move_uploaded_file($file_tmp, "./../images/cvs/" . $new_name)) {
      return $new_name;
    } else {
      return 'error';
    }
  }
}
