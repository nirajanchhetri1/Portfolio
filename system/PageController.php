<?php

require_once 'Db.php';

class PageController extends Db {

    public function saveData(){

        $page=$_POST['page'];

        $description=$_POST['description'];

        $data=['page'=>$page,'description'=>$description];
        
        return  $this->create('page_detail',$data);
    }

    public function updateData(){
        $page=$_POST['page'];

        $description=$_POST['description'];
        $id=$_POST['id'];

        $data=['page'=>$page,'description'=>$description,'id'=>$id];
        

        $sql='UPDATE page_detail SET page = :page, description = :description WHERE id=:id';

       $updated= $this->query($sql,$data);

       return $updated;
    }

}