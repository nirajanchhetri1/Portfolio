<?php

require_once 'Db.php';

class NameLogoController extends Db
{

  public function saveData()
  {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $data = ['name' => $name, 'status' => $status];
    return  $this->create('name_logo', $data);
  }

  public function updateData()
  {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $data = ['name' => $name, 'status' => $status, 'id' => $id];
    $sql = 'UPDATE name_logo SET name = :name, status = :status WHERE id = :id';

    $updated = $this->query($sql, $data);
    return $updated;
  }

  public function deleteData($id)
  {
    $sql = 'DELETE FROM name_logo  WHERE id = :id';
    $data['id'] = $id;
    $updated = $this->query($sql, $data);

    if ($updated == true) {
      header('location: namelogo.php');
    }
  }

  public function getLogo()
  {

    $sel = "SELECT name from name_logo WHERE status = 'active' ORDER BY id DESC limit 1";
    $con = $this->getConnection();
    $sth = $con->prepare($sel);

    $sth->execute();
    $result = $sth->fetch();
    return $result;
  }
}
