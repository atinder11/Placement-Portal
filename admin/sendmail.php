<?php


//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}
require_once("../db.php");

$sql = "select * from users  ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {


        //the subject
        $sub = "New Notice has been posted.";
        //the message
        $msg = "The TPO has posted a new notice on the placement portal. Go to your profile on placement portal to check the notice.";
        //recipient email here
        $str = $row['email'];
        $rec = "$str";
        //send email
        mail($rec, $sub, $msg);
    }
}
