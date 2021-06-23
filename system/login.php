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

    .container{
        width: 300px;
        padding: 20px;
        /* background: blue; */
        margin-top: 15%;
        border: 1px solid grey;
        border-radius: 10px;
    }
    .form{
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
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
        color: grey;
        font-family: sans-serif;
        padding: 5px 0;
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
        background: rgba(0, 0, 255, .8);
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
            <h4>Login</h4>
            <div class="form-group">
                <label for="foremail">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="foremail">Email</label>
                <input type="password" name="password" class="form-control">
            </div>

            <input class="btn" type="submit" name="login" value="Login">
        </form>
    </div>
</body>
</html>