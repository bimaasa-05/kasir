<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Log in</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
  <a href="assets/index2.html"><b>Aplikasi</b>Kasir</a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
  <?php
  if(isset($_GET['pesan'])){
    if ($_GET['pesan']== "gagal") { 
    echo "<div class='alert'> Login Gagal, Username dan Password Yang Anda Masukan Salah</div>"; 
    } else if ($_GET['pesan']== "Logout") { 
      echo "<div class='alert'> Anda Telah Logout</div>"; 
  } 
} 
    ?>
  <p class="login-box-msg">Sign in to start your session</p>

  <form action="cek_login.php" method="post">
    <div class="form-group has-feedback">
      <input type="text" class="form-control" placeholder="Username" name="username">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" placeholder="Password" name="password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <select class="form-control" name="role" id="role">
        <option value="Admin">Admin</option>
        <option value="Kasir">Kasir</option>
      </select>
      
    </div>
    <div class="row">
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary pull-right">Sign In</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="register.php" class="text-center">Register</a>
  </div>
  <!-- /.social-auth-links -->


</div>
<!-- /.login-box-body -->
</div>


</body>
</html>
