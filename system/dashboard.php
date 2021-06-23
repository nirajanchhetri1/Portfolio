<?php
session_start();
require_once './Db.php';
if(!isset($_SESSION['logedin']) && $_SESSION['logedin']==false){
    header('location: login.php');
}
$db=new Db();

$result=$db->getData('home_page');


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
        <a href="home_page.php">Home Page content</a>&nbsp;&nbsp;&nbsp;
        <a href="portfolio.php">Portfolio</a>&nbsp;&nbsp;&nbsp;
        <a href="page_description.php">Page Description</a>&nbsp;&nbsp;&nbsp;
        <a href="blog.php">Blog</a>&nbsp;&nbsp;&nbsp;

        <table>
            <tr>
                <td>Name</td>
                <td>Profession</td>
                <td>Detail</td>
                <td>Edit</td>
            </tr>
        
        <?php
        foreach($result as $data){
            ?>
            <tr>
                <td><?=$data->name?></td>
                <td><?=$data->profession?></td>
                <td><?=$data->detail?></td>
                <td>
            <a href="edit_home.php?id=<?= $data->id?>">Edit</a>        
            </td>
            </tr>
            <?php
        }
        ?>
        </table>
</body>
</html>