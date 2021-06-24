<?php
session_start();
require_once './AboutController.php';
if (!isset($_SESSION['logedin']) && $_SESSION['logedin'] == false) {
    header('location: login.php');
}

if (isset($_POST['submit']) && $_POST['submit'] && $_POST['submit'] == 'Submit') {
    $about = new AboutController();

    $data = $about->saveData();

    if (isset($data)) {
        header('location: about.php');
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
                <td>First Name</td>
                <td><input type="text" name="first_name" /></td>
            </tr>
            
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" /></td>
            </tr>
            
            <tr>
                <td>Birthdate</td>
                <td><input type="date" name="birthdate" /></td>
            </tr>

            <tr>
                <td>Nationality</td>
                <td><input type="text" name="nationality" /></td>
            </tr>
            
            <tr>
                <td>Experience</td>
                <td><input type="text" name="experience" /></td>
            </tr>
            
            <tr>
                <td>Address</td>
                <td><input type="text" name="address" /></td>
            </tr>
            
            <tr>
                <td>Freelance</td>
                <td>
                    <input type="checkbox" name="frelance" value="1" id="isAvailable"/> <labe for="isAvailable">Available</labe>
                </td>
            </tr>

            <tr>
                <td>Languages</td>
                <td><input type="text" name="languages" /></td>
            </tr>
            
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone" /></td>
            </tr>
            
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" /></td>
            </tr>

            <tr>
                <td>Image</td>
                <td><input type="file" name="image" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit" /></td>
            </tr>
        </table>
    </form>
</body>

</html>