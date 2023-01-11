<?php
session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placement Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

  <script src="https://cdn.tailwindcss.com"></script>



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <?php

  include 'php/head.php'

  ?>
</head>

<body class="hold-transition login-page bg-blue-100 text-white">


  <?php

  include 'php/header.php'

  ?>

  <div class="login-box content:centre">
    <div class="login-logo">
      <a href="index.php" style="color:black"><b>Placement Portal</b></a>
    </div>
    <!-- /.login-logo -->
    <div class=" login-box-body bg-blue-200 text-black text-xl">
      <p class="text-white text-2xl login-box-msg text-black">Placement Cell</p>

      <form method="post" action="checkcompanylogin.php">
        <div class="form-group has-feedback">
          <input type="email" id="large" name="email" class="form-control" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="large" name="password" class="form-control" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <style>
          #large {
            font-size: medium;
          }
        </style>
        <div class="row">
          <div class="col-xs-8">
            <a href="#">Forgot password</a><br>

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" name="submit" class="flex mx-auto mt-6 text-white bg-indigo-500 border-0 py-2 px-5 focus:outline-none hover:bg-indigo-600 rounded"">Sign In</button>
          </div>

          <!-- /.col -->
          <div class=" col-xs-12">
              <?php
              //If Company have successfully registered then show them this success message
              //Todo: Remove Success Message without reload?
              if (isset($_SESSION['registerCompleted'])) {
              ?>
                <div>
                  <p class="text-center">You Have Registered Successfully! Your Account Approval Is Pending By Placement-Officer</p>
                </div>
              <?php
                unset($_SESSION['registerCompleted']);
              }
              ?>
              <?php
              //If Company Failed To log in then show error message.
              if (isset($_SESSION['loginError'])) {
              ?>
                <div>
                  <p class="text-center">Invalid Email/Password! Try Again!</p>
                </div>
              <?php
                unset($_SESSION['loginError']);
              }
              ?>
              <?php
              if (isset($_SESSION['companyLoginError'])) {
              ?>
                <div>
                  <p class="text-center"><?php echo $_SESSION['companyLoginError'] ?></p>
                </div>
              <?php
                unset($_SESSION['companyLoginError']);
              }
              ?>
          </div>
        </div>
      </form>


      <br>

    </div>
    <a class="text-xl text-black" href=" register-company.php">Create new account</a>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>


  <!-- footer starts -->

  <?php

  include 'php/footer.php';
  ?>
  <!-- footer ends -->
</body>

</html>