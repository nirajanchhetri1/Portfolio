<?php
require_once './Db.php';

class HomePageController extends Db{

    public function saveData(){
        $name=$_POST['name'];
        $profession=$_POST['profession'];
        $detail=$_POST['detail'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $facebook=$_POST['facebook'];
        $instagram=$_POST['instagram'];
        $linkedin=$_POST['linkedin'];
        $twitter=$_POST['twitter'];
        $data=['name'=>$name,'profession'=>$profession,'detail'=>$detail,'status'=>'active'];
        
        $data['contact']=isset($contact)&&!empty($contact)?$contact: null;
        $data['email']=isset($email)&&!empty($email)?$email: null;
        $data['facebook']=isset($facebook)&&!empty($facebook)?$facebook: null;
        $data['instagram']=isset($instagram)&&!empty($instagram)?$instagram: null;
        $data['linkedin']=isset($linkedin)&&!empty($linkedin)?$linkedin: null;
        $data['twitter']=isset($twitter)&&!empty($twitter)?$twitter: null;
        return  $this->create('home_page',$data);
    }


    public function updateData(){
        $name=$_POST['name'];
        $profession=$_POST['profession'];
        $detail=$_POST['detail'];

        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $facebook=$_POST['facebook'];
        $instagram=$_POST['instagram'];
        $linkedin=$_POST['linkedin'];
        $twitter=$_POST['twitter'];

        $sql='UPDATE home_page SET name = :name, profession = :profession, detail = :detail';
        
        $udata=['name'=>$name,'profession'=>$profession,'detail'=>$detail];
        
        if(isset($contact) && !empty($contact)){
            $sql .=", contact = :contact";
            $udata['contact'] = $contact;
        }

        if(isset($email) && !empty($email)){
            $sql .=", email = :email";
            $udata['email'] = $email;
        }

        if(isset($facebook) && !empty($facebook)){
            $sql .= ", facebook = :facebook";
            $udata['facebook'] = $facebook;
        }

        if(isset($instagram) && !empty($instagram)){
            $sql .= ", instagram = :instagram";
            $udata['instagram'] = $instagram;
        }

        if(isset($linkedin) && !empty($linkedin)){
            $sql .= ", linkedin = :linkedin";
            $udata['linkedin'] = $linkedin;
         }

         if(isset($twitter) && !empty($twitter)){
             $sql .= ", twitter = :twitter";
             $udata['twitter'] = $twitter;
         }
         
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