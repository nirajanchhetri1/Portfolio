
<?php
session_start();
require_once './BlogController.php';
if(!isset($_SESSION['logedin']) && $_SESSION['logedin']==false){
    header('location: login.php');
}

if(isset($_POST['submit']) &&$_POST['submit']&&$_POST['submit']=='Submit'){
    $blog=new BlogController();

    $data= $blog->saveData();

    if(isset($data)){
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
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title"/></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" cols="40" rows="15"></textarea></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"/></td>
            </tr>
        </table>
    </form>
</body>
</html>