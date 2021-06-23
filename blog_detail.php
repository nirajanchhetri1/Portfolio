<?php
require_once 'system/BlogController.php';

if(isset($_GET['id'])&&$_GET['id']>0){
    $blogc=new BlogController();
    $blog=$blogc->getWhereData('blogs',['id'=>$_GET['id']],[],true);
    print_r($blog);
}
?>