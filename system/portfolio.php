<?php

require_once './PortfolioController.php';

$c = new PortfolioController();

$result = $c->all();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php require_once './nav_bar.php'; ?>
    <a href="add_portfolio.php">Add new portfolio</a>
    <table>
        <tr>
            <th>Project Name</th>
            <th>Client</th>
            <th>Budger</th>
            <th>Duration</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($result as $row) {
        ?>
            <tr>
                <td><?= $row->project_name; ?></td>
                <td><?= $row->client; ?></td>
                <td><?= $row->budget; ?></td>
                <td><?= $row->duration ?></td>
                <td>
                    <a href="">Edit</a>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>