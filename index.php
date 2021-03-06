<?php 

require 'conn.php';
session_start();

?>
<!DOCTYPE html><!--to work on HTML 5 -->
<html lang="en">
    <head>
        <meta charset="utf-8"><!--to tell the browser that this file is UTF-8 encoded-->
        
        <title>Login</title>
        <meta name="viewport" content="width=device-width,initial scale=1"><!--to control the page's dimensions and scaling i.e.to make the webpage responsive-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
        
    </head>
    <style>
        body{
            background-image: url("https://i.gifer.com/Uq1t.gif");
            background-size: cover;
        }
        .App-header{
            background-color: black;
            height: 200px;
            padding: 20px;
            color: #fff;
        }
        .App-logo{
            height:50px;
            width:50px;
        }
        @media only screen and (max-width:1100px) {
            .App-title{
                font-size: 3rem;
            }
        @media only screen and (max-width:600px) {
            .App-title{
                font-size: 2rem;
            }
        }
    </style>
    <body>
        <header class="App-header">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/Tesseract.gif" class="App-logo" alt="logo">
            <h1 class="App-title">Welcome To Employee Management System</h1>
        </header>
        <!--login-->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
                    <div class="panel panel-default" style="margin-top: 50px;">
                        <div class="panel-heading">Login</div>
                        <div class="panel-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control input-sm" name="u_name" required placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control input-sm" name="u_pass" required placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-sm" name="u_login" value="Login">
                                    <a href ="register.php" class="btn btn-info btn-sm">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--login-->

        <?php

        if(isset($_POST['u_login'])){
            $u_name=$_POST['u_name'];
            $u_pass=md5($_POST['u_pass']);

            $sql="SELECT * FROM users WHERE u_name='$u_name'";
            $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
            //output data of each row
                while($user=mysqli_fetch_assoc($result)){
                    if($u_name==$user['u_name'] && $u_pass==$user['u_pass']){
                        header("Location: dash.php");
                        $_SESSION['u_name']=$u_name;
                    }else{
                        echo "<script>alert('Invalid username or password!');</script>";
                    }
                }
            }else{
                echo "0 results";
            }
        }
        ?>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
