
<?php
session_start();
if(!isset($_SESSION['logedin']) && $_SESSION['logedin']==false){
    header('location: login.php');
}
require_once './PageController.php';


if(isset($_POST['submit']) &&$_POST['submit']&&$_POST['submit']=='Submit'){
    $page=new PageController();

    
    $data= $page->updateData();

    if(isset($data)){
        header('location: page_description.php');
    }
}

if(isset($_GET['id'])&&$_GET['id']>0){
    $page = new PageController();

    $selectedData = $page->getData('page_detail',null,$_GET['id']);
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
    <tr>
            <td>Page</td>
            <td>
                <select name="page" required>
                    <option value="portfolio" <?= isset($selectedData)&&$selectedData->page=='portfolio'?'selected':''?>>Portfolio</option>
                    <option value="portfolio_detail" <?= isset($selectedData)&&$selectedData->page=='portfolio_detail'?'selected':''?>>Portfolio Detail</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?= isset($selectedData)?$selectedData->description:''?>" id="description"></td>
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