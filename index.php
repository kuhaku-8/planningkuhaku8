<?php
	include "./config/preference.php";

	session_start();
	if (isset($_SESSION['username'])){
		header ("location:application/home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Planning | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="./src/dashboard/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./src/dashboard/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./src/dashboard/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="./src/dist/css/AdminLTE.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link href='./src/ico.png' rel='icon' type='image/x-icon'/>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>KuhaKu</b> 8</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Login Untuk Memulai Sesi!</p>
        <form action="config/logincheck.php" method="post">
            <div class="form-group has-feedback">
                <input type="username" name="username" class="form-control" placeholder="username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8"></div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="./src/dashboard/jquery/dist/jquery.min.js"></script>
<script src="./src/dashboard/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>