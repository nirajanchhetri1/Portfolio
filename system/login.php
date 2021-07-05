<?php
require_once './LoginController.php';
session_start();
if($_POST && $_POST['login']){
    $login=new LoginController();

    $login->login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    *{
        margin: 0 auto;
        padding: 0;
        box-sizing: border-box;
    }

    .form{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        position: absolute;
        top: 50%;
        left:50%;
        transform:translate(-50%,-50%);
        /* border: 2px solid #52add8; */
        padding: 34px 44px;
        border-radius: 12px;
        box-shadow: 4px 8px 8px rgba(170, 170, 190, 0.8);
    }

    form input{
        /* width: 12vw; */
        outline: none;
        border: none !important;
    }
    
    form input.form-control{
        border-bottom: 1px solid rgb(99, 203, 245) !important;
    }

    form input.form-control:focus{
        border-bottom: 1px solid rgb(5, 131, 180) !important;
    }

    .form h4{
        font-size: 30px;
        font-weight: 600;
        font-family: sans-serif;
        padding: 20px 0;
    }

    .form .form-group{
        display: flex;
        flex-direction: column;
        padding: 10px;
    }

    .form-group label{
        font-size: 18px;
        color: rgb(0, 0, 0);
        font-family: sans-serif;
        padding: 15px 0;
        text-align: left;
        margin-left: 0 !important;
    }

    .form-group input.form-control{
        padding: 5px;
        border-radius: 5px;
        outline: none;
        border: 1px solid grey;
    }

    .btn{
        padding: 8px 20px;
        border-radius: 5px;
        background: rgba(91, 91, 241, 0.8);
        outline: none;
        border: none;
        cursor: pointer;
        color: #fff;
        transition: background 0.4s;
    }
    .btn:hover{
        background: rgba(0, 0, 255, 1);
    }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="form">
            <h4>Portfolio Login</h4>
            <div class="form-group">
                <label for="foremail">Username/Email</label>
                <input type="email" name="email" class="form-control" placeholder="Username or email">
            </div>
            <div class="form-group">
                <label for="foremail">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <input class="btn" type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>