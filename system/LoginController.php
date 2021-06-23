<?php

require_once './Db.php';

class LoginController extends Db{

    public function login(){
        $email=$_POST['email'];
        $password=sha1($_POST['password']);

        $datas=$this->getWhereData('users',['email'=>$email]);
        foreach($datas as $data){
            if($data->email==$email && $data->password=$password){
                $_SESSION['logedin']=true;
                $_SESSION['emal']=$data->email;
                $_SESSION['name']=$data->name;

                header('location: dashboard.php');
            }
        }
    }
}
