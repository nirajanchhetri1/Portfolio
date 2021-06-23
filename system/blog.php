<?php

require_once 'BlogController.php';

$blogCon = new BlogController();
$blogs = $blogCon->getData('blogs');
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
            <td colspan="2">
                <a href="add_blog.php">Add New blog</a>
            </td>
        </tr>
        <tr>
            <th>Title</th>
            <th>Edit</th>
        </tr>
        <?php
        foreach ($blogs as $blog) {
        ?>
            <tr>
                <td><?= $blog->title ?></td>
                <td>
                    <a href="edit_blog.php?id=<?= $blog->id ?>">Edit</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>