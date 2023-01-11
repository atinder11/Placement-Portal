<?php

session_start();

if (isset($_SESSION['id_admin'])) {
  header("Location: dashboard.php");
  exit();
}

?>
<!DOCTYPE html>
<html>

<head>

  
  <title>Placement Portal</title>
  <link href="../img/logo.png" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page bg-gray-800 text-white">


  <?php
  include '../uploads/admin_header.php';
  ?>

  <div class="login-box " id="sms">

    <div class="login-logo text-white">
      <a style="color:white" href="../index.php">Placement Portal</a>
    </div>
    <!-- /.login-logo -->
    <div class="bg-gray-900 text-white login-box-body large">
      <p class="login-box-msg mt-7">Admin Login</p>
      <style>
        .large {
          width: 350px;
          height: 300px;
        }

        .small {
          font-size: small;
        }

        #footer {
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 60px;
          /* Height of the footer */

        }


        @media only screen and (max-width: 768px) {
          .large {
            margin: auto;

          }

          .small {

            position: absolute;
          }
      </style>

      <form action="checklogin.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="username" placeholder="Username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" class=" transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        <?php
        //If User Failed To log in then show error message.
        if (isset($_SESSION['loginError'])) {
        ?>
          <div>
            <p class="text-center">Invalid Email/Password! Try Again!</p>
          </div>
        <?php
          unset($_SESSION['loginError']);
        }
        ?>

      </form>
    </div>
    <!-- /.login-box-body -->
  </div>



  <div style="margin: bottom 0px; " class="  sm:mt-48 ">
    <footer id="footer" class="text-gray-600 body-font bg-gray-800 border-t-2 border-gray-700 small mb-0 ">

      <div class="pt-1 pb-2">
        <ul class="flex  space-x-16 justify-center text-white my-4 ">

          <li><i class="fa fa-copyright" aria-hidden="true"></i>Placement Portal @ 2022</li>
          <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
          <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
          <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
          <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>

        </ul>





      </div>


    </footer>



  </div>
  <!-- /.login-box -->


  <!-- jQuery 3 -->
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

</body>

</html>