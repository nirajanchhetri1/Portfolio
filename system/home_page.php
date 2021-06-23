
<?php
session_start();
require_once './HomePageController.php';
if(!isset($_SESSION['logedin']) && $_SESSION['logedin']==false){
    header('location: login.php');
}

if(isset($_POST['submit']) &&$_POST['submit']&&$_POST['submit']=='Submit'){
    $homePage=new HomePageController();

    $data= $homePage->saveData();

    if(isset($data)){
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
    <form action="" method="POST">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td>Profession</td>
            <td><input type="text" name="profession" id="profession"></td>
        </tr>
        <tr>
            <td>Detail</td>
            <td>
                <textarea name="detail" id="detail"></textarea>
            </td>
        </tr>
        
        <tr>
            <td>Contact</td>
            <td><input type="number" name="contact" id="contact"/></td>
        </tr>
       
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" id="email"/></td>
        </tr>
        
        <tr>
            <td>Facebook</td>
            <td><input type="text" name="facebook" id="facebook"/></td>
        </tr>

        <tr>
            <td>Instagram</td>
            <td><input type="text" name="instagram" id="instagram"/></td>
        </tr>

        <tr>
            <td>Linkedin</td>
            <td><input type="text" name="linkedin" id="linkedin"/></td>
        </tr>
        <tr>
            <td>Twitter</td>
            <td><input type="text" name="twitter" id="twitter"/></td>
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