<?php
session_start();
require_once './BlogController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $blog = new BlogController();

    $selectedData = $blog->getData('blogs', null, $_GET['id']);
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $blog = new BlogController();

    $data = $blog->updateData();

    if (isset($data)) {
        header('location: blog.php');
    }
}

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
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?= isset($selectedData->title) ? $selectedData->title : '' ?>" /></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" cols="40" rows="15"><?= isset($selectedData->description) ? $selectedData->description : '' ?></textarea></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" /></td>
            </tr>
            <?php
            if (isset($selectedData->id) && $selectedData->id > 0) {
            ?>
                <input type="hidden" name="id" value="<?= $selectedData->id ?>">
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit" /></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </form>
</body>

</html>