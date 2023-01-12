<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if (empty($_SESSION['id_company'])) {
  header("Location: ../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");
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
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php

    include 'header.php';

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b><?php echo $_SESSION['name']; ?></b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="edit-company.php"><i class="fa fa-tv"></i> Update Profile</a></li>
                    <li><a href="create-job-post.php"><i class="fa fa-file-o"></i> Post Drive</a></li>
                    <li class="active"><a href="my-job-post.php"><i class="fa fa-file-o"></i> Current Drives</a></li>
                    <li><a href="job-applications.php"><i class="fa fa-file-o"></i> Drive Applications</a></li>
                    <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
                    <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                    <li><a href="resume-database.php"><i class="fa fa-user"></i> Resume Database</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">
              <div class="row margin-top-20">
                <div class="col-md-12">
                  <?php
                  $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]' AND id_jobpost='$_GET[id]'";
                  $result = $conn->query($sql);



                  //If Job Post exists then display details of post
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                      // creating session Variable for id_jobpost

                      $_SESSION['id_jobpost'] = $row['id_jobpost'];

                      echo $_SESSION['id_jobpost'];


                  ?>



                      <div class="pull-left">
                        <h2><b><?php echo $row['jobtitle']; ?></b></h2>
                      </div>

                      <div class="pull-right">
                        <a href="my-job-post.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a>
                      </div>
                      <div class="clearfix"></div>
                      <hr>
                      <div>
                        <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"> Role: </i> <?php echo $row['experience']; ?> </span><span class="margin-right-10"> <i class="fa fa-money text-green"> CTC:</i> <?php echo "Rs " . $row['minimumsalary'] . "    "; ?></span> <span class="margin-right-10"><i class="fa fa-calendar text-green"> Drive Date:</i> <?php echo date("d-M-Y", strtotime($row['createdat'])); ?></span><span class="margin-right-10"><i class="fa fa-location-calendar text-green"> Eligibility: </i> <?php echo $row['maximumsalary'] . "%"; ?> </span></p>
                        <!-- Years Experience -->
                      </div>
                      <div>
                        <?php echo stripcslashes($row['description']); ?>
                      </div>
                      <div>
                      </div>
                      <div class="pull-right">
                        <a style="margin-left:2px" href="updatedrive.php?id=<?php echo $row['id_jobpost']; ?>" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-lef" "></i> Update Drive</a>
                      </div>
                  <?php
                    }
                  }
                  ?>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>




    </div>
    <!-- /.content-wrapper -->

    <footer class=" main-footer" style="margin-left: 0px;">
                            <div class="text-center">
                              <strong>Copyright &copy; 2022 <a href="scsit@Davv">Placement Portal</a>.</strong> All rights
                              reserved.
                            </div>
                            </footer>

                            <!-- /.control-sidebar -->
                            <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
                            <div class="control-sidebar-bg"></div>

                      </div>
                      <!-- ./wrapper -->

                      <!-- jQuery 3 -->
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                      <!-- Bootstrap 3.3.7 -->
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
                      <!-- DataTables -->
                      <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
                      <!-- AdminLTE App -->
                      <script src="../js/adminlte.min.js"></script>

</body>

</html>