<?php

require_once 'Db.php';

class SkillController extends Db
{

  public function saveData()
  {
    $skill = $_POST['skill'];
    $confidence = $_POST['confidence'];
    $color = $_POST['color'];

    $data = [
      'skill' => $skill,
      'confidence' => $confidence,
      'color' => $color,
    ];

    return $this->create('skills', $data);
  }


  public function updateData()
  {
    $skill = $_POST['skill'];
    $confidence = $_POST['confidence'];
    $color = $_POST['color'];
    $id = $_POST['id'];

    $data = [
      'skill' => $skill,
      'confidence' => $confidence,
      'color' => $color,
      'id' => $id
    ];

    $sql = 'UPDATE skills SET skill = :skill, confidence = :confidence, color = :color';

    $sql .= ' WHERE id = :id';

    $updated = $this->query($sql, $data);

    if ($updated == true) {
      header('location: skills.php');
    }
  }

  public function deleteData($id)
  {
    $sql = 'DELETE FROM skills  WHERE id = :id';
    $data['id'] = $id;
    $updated = $this->query($sql, $data);

    if ($updated == true) {
      header('location: skills.php');
    }
  }
}
