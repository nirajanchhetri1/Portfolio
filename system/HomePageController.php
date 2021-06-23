<?php
require_once './Db.php';

class HomePageController extends Db{

    public function saveData(){
        $name=$_POST['name'];
        $profession=$_POST['profession'];
        $detail=$_POST['detail'];

    return  $this->create('home_page',['name'=>$name,'profession'=>$profession,'detail'=>$detail,'status'=>'active']);
    }


    public function updateData(){
        $name=$_POST['name'];
        $profession=$_POST['profession'];
        $detail=$_POST['detail'];

        $sql='UPDATE home_page SET name = :name, profession = :profession, detail = :detail';

        $udata=['name'=>$name,'profession'=>$profession,'detail'=>$detail];
        if(isset($_FILES['image'])&&!empty($_FILES['image']['name'])){
            $image=$this->uploadImage();
            $sql .=", image = :image";
            $udata['image']=$image;
        }
       $updated= $this->query($sql,$udata);

       if($updated==true){
           header('location: dashboard.php');
           
       }
    }

    private function uploadImage(){
      $file_name = $_FILES['image']['name'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_ext= pathinfo($file_name, PATHINFO_EXTENSION);
      
    //   $extensions= array("jpeg","jpg","png");
      
      $new_name=time().'.'.$file_ext;
         if(move_uploaded_file($file_tmp,"./../images/".$new_name)){
             return $new_name;
         }else{
             return 'error';
         }
    }
}