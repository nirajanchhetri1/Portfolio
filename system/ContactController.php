<?php

require_once 'Db.php';

class ContactController extends Db
{
  public function saveData()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $data = ['name' => $name, 'email' => $email, 'comment' => $comment];

    return  $this->create('contacts', $data);
  }
}
