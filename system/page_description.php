<?php
require_once './PageController.php';

$page = new PageController();

$page_details = $page->getData('page_detail');

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
    <table>
        <tr>
            <td colspan="3">
                <a href="add_page_description.php">Add Page Description</a>
            </td>
        </tr>
        <tr>
            <th>Page</th>
            <th>Description</th>
            <th>Edit</th>
        </tr>
        <?php
        foreach ($page_details as $page_detail) {
        ?>
            <tr>
                <td><?= $page_detail->page ?></td>
                <td><?= strlen($page_detail->description) > 50 ? substr($page_detail->description, 0, 50) . '...' : $page_detail->description ?></td>
                <td>
                    <a href="edit_page_description.php?id=<?= $page_detail->id ?>">Edit</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>