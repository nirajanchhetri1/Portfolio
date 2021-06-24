<?php
require_once './ContactController.php';

$contactC = new ContactController();
$contacts = $contactC->getData('contacts');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
</head>

<body>
  <?php require_once './nav_bar.php'; ?>
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Comment</th>
    </tr>
    <?php foreach ($contacts as $contact) : ?>
      <tr>
        <td><?= $contact->name ?></td>
        <td><?= $contact->email ?></td>
        <td><?= $contact->comment ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>