<?php


session_start();

if (empty($_SESSION['id_user'])) {
	header("Location: ../index.php");
	exit();
}

require_once("../db.php");

if (isset($_POST)) {
	$to  = $_POST['to'];

	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$message = mysqli_real_escape_string($conn, $_POST['description']);

	$sql = "INSERT INTO mailbox (id_fromuser, fromuser, id_touser, subject, message) VALUES ('$_SESSION[id_user]', 'user', '$to', '$subject', '$message')";

	if ($conn->query($sql) == TRUE) {
		header("Location: mailbox.php");
		exit();
	} else {
		echo $conn->error;
	}
} else {
	header("Location: mailbox.php");
	exit();
}

// <div class="box-body no-padding">
//                   <ul class="nav nav-pills nav-stacked ul1">
//                     <li><a href="edit-profile.php"><i class="fa fa-user"></i> Edit Profile</a></li>
//                     <li><a href="index.php"><i class="fa fa-address-card-o"></i> My Applications</a></li>
//                     <li><a href="../jobs.php"><i class="fa fa-list-ul"></i> Active Drives</a></li>
//                     <li class="active"><a href="mailbox.php"><i class="fa fa-envelope"></i> Mailbox</a></li>
//                     <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
//                     <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
//                   </ul>
//                 </div>