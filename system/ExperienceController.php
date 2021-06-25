<?php

require_once 'Db.php';

class ExperienceController extends Db
{

  public function saveData()
  {
    $position = $_POST['position'];
    $company = $_POST['company'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];

    $data = [
      'position' => $position,
      'company' => $company,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'description' => $description
    ];

    return $this->create('experiences', $data);
  }


  public function updateData()
  {
    $position = $_POST['position'];
    $company = $_POST['company'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $id = $_POST['id'];

    $data = [
      'position' => $position,
      'company' => $company,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'description' => $description,
      'id' => $id
    ];

    $sql = 'UPDATE experiences SET position = :position, start_date = :start_date, end_date = :end_date, description = :description, company = :company';

    $sql .= ' WHERE id = :id';

    $updated = $this->query($sql, $data);

    if ($updated == true) {
      header('location: experiences.php');
    }
  }

  public function deleteData($id)
  {
    $sql = 'DELETE FROM experiences  WHERE id = :id';
    $data['id'] = $id;
    $updated = $this->query($sql, $data);

    if ($updated == true) {
      header('location: experiences.php');
    }
  }
}
