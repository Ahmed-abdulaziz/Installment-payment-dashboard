<?php 
session_start();
include "connect.php";
include "includes/functions.php";

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $Phone = $_POST['Phone'];
        $pass = $_POST['pass'];

       $check = checkitem('phone','admin',"WHERE phone = $Phone ");
       if($check > 0){
        echo "<div class ='alert alert-success container'>رقم الموبيل موجود بالفعل </div>";
        header("Refresh:3; url=login.php");
        exit();
       }else{
        $stmt=$con->prepare("INSERT INTO admin (name ,phone , password) VALUES (:zname , :zphone , :zpassword)");
        $stmt->execute(array(
        'zname'   =>  $name,
        'zphone' => $Phone,
        'zpassword'   =>  $pass,
        ));
        echo "<div class ='alert alert-success container'>فى انتظار مواقفه الادمن</div>";
        header("Refresh:3; url=login.php");
        exit();
       }
       
                }

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                     <h1>
                         ابو صبح
                     </h1>
                    </a>
                </div>
                <div class="login-form">
               
                    <form method="post">
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name="Phone" class="form-control" autocomplete="off" placeholder="Phone">
                        </div>
                    
                        <div class="form-group col-12">
                            <input type="password" name="pass" class="form-control" autocomplete="Off" placeholder="Password">
                        </div>
                  
                      
                        <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">تسجيل</button>
                        <div class="register-link m-t-15 text-center">
                            <p>هل لديك حساب ؟<a href="login.php"> تسجيل دخول </a></p>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
