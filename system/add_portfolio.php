<?php
session_start();
require_once './PortfolioController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $portfolio = new PortfolioController();

    $data = $portfolio->saveData();

    if (isset($data)) {
        header('location: dashboard.php');
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
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Project Title</td>
                <td><input type="text" name="project_title" id="project_title"></td>
            </tr>
            <tr>
                <td>Project Name</td>
                <td><input type="text" name="project_name" id="project_name"></td>
            </tr>
            <tr>
                <td>Client</td>
                <td>
                    <input type="text" name="client" id="client" />
                </td>
            </tr>
            <tr>
                <td>Budget</td>
                <td>
                    <input type="text" name="budget" id="budget" />
                </td>
            </tr>
            <tr>
                <td>Duration</td>
                <td>
                    <input type="text" name="duration" id="duration" />
                </td>
            </tr>
            <tr>
                <td>Technologo</td>
                <td>
                    <input type="text" name="technology" id="technology" />
                </td>
            </tr>
            <tr>
                <td>Image</td>
                <td>
                    <input type="file" name="image" id="image">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Submit" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>