<?php

require_once 'Db.php';
class EducationController extends Db
{

  public function saveData()
  {
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $school_url = $_POST['school_url'];
    $is_running = isset($_POST['is_running']) ? 1 : 0;

    $data = [
      'degree' => $degree,
      'school' => $school,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'description' => $description,
      'school_url' => $school_url,
      'is_running' => $is_running,
    ];

    return $this->create('educations', $data);
  }


  public function updateData()
  {
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $school_url = $_POST['school_url'];
    $is_running = isset($_POST['is_running']) ? 1 : 0;
    $id = $_POST['id'];

    $data = [
      'degree' => $degree,
      'school' => $school,
      'start_date' => $start_date,
      'end_date' => $end_date,
      'description' => $description,
      'school_url' => $school_url,
      'is_running' => $is_running,      
      'id' => $id
    ];

    $sql = 'UPDATE educations SET degree = :degree, school = :school, start_date = :start_date, end_date = :end_date, description = :description, school_url = :school_url, is_running = :is_running';

    $sql .= ' WHERE id = :id';

    $updated = $this->query($sql, $data);

    if ($updated == true) {
      header('location: educations.php');
    }
  }

  public function deleteData($id)
  {
    $sql = 'DELETE FROM educations  WHERE id = :id';
    $data['id'] = $id;
    $updated = $this->query($sql, $data);

    if ($updated == true) {
      header('location: educations.php');
    }
  }
}
