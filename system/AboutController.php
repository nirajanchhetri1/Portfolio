<?php

require_once 'Db.php';

class AboutController extends Db{
    public function saveData(){
       
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $birthdate=$_POST['birthdate'];
        $nationality=$_POST['nationality'];
        $experience=$_POST['experience'];
        $languages=$_POST['languages'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $frelance=isset($_POST['frelance'])?$_POST['frelance']:0;

        $data=[
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'birthdate'=>$birthdate,
            'nationality'=>$nationality,
            'experience'=>$experience,
            'languages'=>$languages,
            'phone'=>$phone,
            'email'=>$email,
            'frelance'=>$frelance
        ];

        if(isset($_FILES['image'])&&!empty($_FILES['image']['name'])){
            $image=$this->uploadImage();
            $data['image']=$image;
        }
       return $this->create('about',$data);
    }

    private function uploadImage(){
        $file_name = $_FILES['image']['name'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_ext= pathinfo($file_name, PATHINFO_EXTENSION);
        
      //   $extensions= array("jpeg","jpg","png");
        
        $new_name=time().'.'.$file_ext;
           if(move_uploaded_file($file_tmp,"./../images/about/".$new_name)){
               return $new_name;
           }else{
               return 'error';
           }
      }
}