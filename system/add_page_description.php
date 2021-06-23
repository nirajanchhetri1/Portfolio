
<?php
session_start();
require_once './PageController.php';
if(!isset($_SESSION['logedin']) && $_SESSION['logedin']==false){
    header('location: login.php');
}

if(isset($_POST['submit']) &&$_POST['submit']&&$_POST['submit']=='Submit'){
    $page=new PageController();

    $data= $page->saveData();

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
            <td>Page</td>
            <td>
                <select name="page" required>
                    <option value="portfolio">Portfolio</option>
                    <option value="portfolio_detail">Portfolio Detail</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" id="description"></td>
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