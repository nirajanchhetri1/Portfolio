<?php

require_once 'Db.php';

class BlogController extends Db{

    public function saveData(){
        $title=$_POST['title'];
        $description=$_POST['description'];

        $data=['title'=>$title,'description'=>$description];

        if(isset($_FILES['image'])&&!empty($_FILES['image']['name'])){
            $image=$this->uploadImage();
            $data['image']=$image;
        }
        return  $this->create('blogs',$data);
        
    }


    public function updateData(){
        $title=$_POST['title'];
        $description=$_POST['description'];
        $id=$_POST['id'];

        $data=['title'=>$title,'description'=>$description,'id'=>$id];

        $sql='UPDATE blogs SET title = :title, description = :description';

        if(isset($_FILES['image'])&&!empty($_FILES['image']['name'])){
            $image=$this->uploadImage();
            if($image !='error'){
            $sql .=", image = :image";
            $data['image']= $image;
            }
        }
        $sql .=' WHERE id = :id';
        
       $updated= $this->query($sql,$data);

       if($updated==true){
           header('location: blog.php');
           
       }
    }

    
    private function uploadImage(){
        $file_name = $_FILES['image']['name'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_ext= pathinfo($file_name, PATHINFO_EXTENSION);
        
      //   $extensions= array("jpeg","jpg","png");
        
        $new_name=time().'.'.$file_ext;
           if(move_uploaded_file($file_tmp,"./../images/blogs/".$new_name)){
               return $new_name;
           }else{
               return 'error';
           }
      }
}