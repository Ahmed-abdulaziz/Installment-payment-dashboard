<?php
session_start();
include "connect.php";


if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    $phone=$_POST['phone'];
    $password=$_POST['pass'];
    $stmt=$con->prepare("SELECT id , phone , name , Password FROM admin WHERE phone= ? AND Password = ? AND grouped = 1 ");
    $stmt->execute(array($phone,$password));
    $row = $stmt->fetch();
    $count=$stmt->rowCount();
    if($count > 0 ){
       
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['Password'] = $row['Password'];
       
        header("Location: index.php");
        exit();
    }
}


?>


<!doctype html>
 <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    >
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
                        <h1>تسجيل الدخول</h1>
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>رقم التيلفون</label>
                            <input type="number" class="form-control" name="phone" placeholder="رقم التليفون">
                        </div>
                        <div class="form-group">
                            <label>الرقم السرى</label>
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        
                          <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">دخول</button>
                       
                        <div class="register-link m-t-15 text-center">
                            <p>لا يوجد لديك حساب ؟ <a href="register.php"> التسجيل من هنا </a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jQuery v3.5.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
