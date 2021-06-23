
<?php
session_start();
require_once './HomePageController.php';
if(!isset($_SESSION['logedin']) && $_SESSION['logedin']==false){
    header('location: login.php');
}

if(isset($_POST['submit']) &&$_POST['submit']&&$_POST['submit']=='Submit'){
    $homePage=new HomePageController();

    
    $data= $homePage->updateData();

    // if(isset($data)){
    //     header('location: dashboard.php');
    // }
}

if(isset($_GET['id'])&&$_GET['id']>0){
    $homePage=new HomePageController();

    $selectedData = $homePage->getData('home_page',null,$_GET['id']);
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
    <form action="" method="POST" enctype="multipart/form-data">
    <table>
        <input type="hidden" name="">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?= isset($selectedData)? $selectedData->name:''?>" id="name"></td>
        </tr>
        <tr>
            <td>Profession</td>
            <td><input type="text" name="profession" value="<?= isset($selectedData)? $selectedData->profession:''?>" id="profession"></td>
        </tr>
        <tr>
            <td>Detail</td>
            <td>
                <textarea name="detail" id="detail"><?= isset($selectedData)? $selectedData->detail:''?></textarea>
            </td>
        </tr>
        <tr>
            <td>Image</td>
            <td>
                <input type="file" name="image" id="image">
            </td>
        </tr>
        <?php
       if(isset($_GET['id'])&&$_GET['id']>0){
           ?>
        <tr>
            <input type="hidden" name="id" value="<?= isset($selectedData)? $selectedData->id:''?>">
            <td></td>
            <td>
                <input type="submit" value="Submit" name="submit">
            </td>
        </tr>
        <?php } ?>  
    </table>
    </form>
</body>
</html>