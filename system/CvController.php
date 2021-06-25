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

  public function getCv()
  {

    $sel = "SELECT id from cvs WHERE status = 'active' ORDER BY id DESC limit 1";
    $con = $this->getConnection();
    $sth = $con->prepare($sel);

    $sth->execute();
    $result = $sth->fetch();
    return $result;
  }

  private function uploadCv()
  {
    $file_name = $_FILES['cv_file']['name'];
    $file_tmp = $_FILES['cv_file']['tmp_name'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $directory = mkdir('../images/cvs/');
    //   $extensions= array("jpeg","jpg","png");
    $new_name = time() . '.' . $file_ext;
    if (move_uploaded_file($file_tmp, "../images/cvs/" . $new_name)) {
      return $new_name;
    } else {
      return 'error';
    }
  }
}
