<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}

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

                        <div class="col md-13">
                            <a href="export.php"><button type="submit1" name='export_excel_btn' class="btn btn-primary">Export to Excel</button></a>

                            <button type="submit1" onclick="sortTable()" name='export_excel_btn' style="margin-left: 8px;" class="btn btn-success">Sort Data</button>
                            <h3 style="text-align: center;"> Student applications for various companies</h3>
                            <?php

                            $sql1 = "SELECT distinct jobtitle FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company=2";

                            $result1 = $conn->query($sql1);
                            ?>
                            <form method="POST">
                                <div class="form-group text-center option">
                                    <!-- <label>Select Company </label> -->
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%" tabindex="-1" aria-hidden="true" class="input" name="company">
                                        <option value="" selected>Select Company</option>
                                        <?php
                                        if ($result1->num_rows > 0) {
                                            while ($row1 = $result1->fetch_assoc()) {


                                        ?>
                                                <option class="option1" name="option1" id="option1" value="<?php echo $row1['jobtitle']; ?>"><?php echo $row1['jobtitle']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input name="submit" type="submit" value="Submit">
                                    <form method="POST" action=""></form>


                            </form>


                            </form>


                            <?php

                            if (isset($_POST['submit'])) {


                                $option = mysqli_real_escape_string($conn, $_POST['company']);

                                // echo $_SESSION['option'];

                            ?>
                                <!-- <h3>Drive Applications</h3> -->
                                <div class="row margin-top-20">
                                    <div class="col-md-13">
                                        <div class="box-body table-responsive no-padding">
                                            <table id="example2" class="table table-hover">
                                                <thead>
                                                    <th>Student Name</th>
                                                    <th>Highest Qualification</th>
                                                    <th>Skills</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Contact No.</th>
                                                    <th>Email</th>

                                                    <th>HSC</th>
                                                    <th>SSC</th>
                                                    <th>UG</th>
                                                    <th>PG</th>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // selecting student record via option 

                                                    $sql2 = "select id_jobpost from job_post where jobtitle = '$option'";
                                                    $result2 = $conn->query($sql2);

                                                    if ($result2->num_rows > 0) {
                                                        while ($row2 = $result2->fetch_assoc()) {
                                                            $jobid = $row2['id_jobpost'];



                                                            $sql = "select * from users inner join apply_job_post on users.id_user = apply_job_post.id_user where id_jobpost = '$jobid' ";
                                                            $_SESSION['QUERY'] = $sql;
                                                            $result = $conn->query($sql);

                                                            if ($result->num_rows > 0) {

                                                                while ($row = $result->fetch_assoc()) {

                                                                    $skills = $row['skills'];
                                                                    $skills = explode(',', $skills);
                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                                                        <td><?php echo $row['qualification']; ?></td>
                                                                        <td>
                                                                            <?php
                                                                            foreach ($skills as $value) {
                                                                                echo ' <span class="label label-success">' . $value . '</span>';
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $row['city']; ?></td>
                                                                        <td><?php echo $row['state']; ?></td>
                                                                        <td><?php echo $row['contactno']; ?></td>
                                                                        <td><?php echo $row['email']; ?></td>

                                                                        <td><?php echo $row['hsc']; ?></td>
                                                                        <td><?php echo $row['ssc']; ?></td>
                                                                        <td><?php echo $row['ug']; ?></td>
                                                                        <td><?php echo $row['pg']; ?></td>


                                                                    </tr>


                                                    <?php

                                                                }
                                                            }
                                                        }
                                                    } ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>



                            <?php

                            }
                            ?>

                        </div>
                    </div>





                    <!-- Yah unplaced ki list aaeygi + eligiblity k hisab se ek filter bhi aaeyga + result k liye kuch karna hai +
                    mail wali chij dalni hai -->




                </div>
                <!-- <div class="col-md- ">



                    </div> -->
        </div>
    </div>
    </section>



    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer" style="margin:auto;bottom: 0;
  width: 100%;
  height: 50px; position:absolute; background-color:#1f0a0a; color:white">
        <div class="text-center">
            <strong>Copyright &copy; 2022 Placement Portal</strong> All rights
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
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
</body>

</html>


<!-- script for sorting data  -->

<script>
    function sortTable() {
        var table,
            rows,
            switching,
            i,
            x,
            y,
            shouldSwitch;
        table = document.getElementById("example2");
        switching = true;

        /* Make a loop that will continue until
        no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.rows;

            /* Loop through all table rows (except the
            first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];

                // Check if the two rows should switch place:
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }

            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
            }
        }
    }
</script>