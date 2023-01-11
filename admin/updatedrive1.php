<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if (empty($_SESSION['id_jobpost'])) {
    header("Location: index.php");
    exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");

if (isset($_POST['submit'])) {


    $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $CTC = mysqli_real_escape_string($conn, $_POST['CTC']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $Eligibility = mysqli_real_escape_string($conn, $_POST['Eligibility']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);


    $sql = "UPDATE job_post SET jobtitle='$companyname', experience='$role', minimumsalary='$CTC', qualification='$qualification', maximumsalary='$Eligibility',  description='$description' where id_jobpost='$_SESSION[id_jobpost] '";

    if ($conn->query($sql) === TRUE) {
        // $_SESSION['name'] = $companyname;
        //If data Updated successfully then redirect to dashboard
        header("Location: active-jobs.php");
        exit();
    } else {
        echo "Error ";
        //Close database connection. Not compulsory but good practice.
        $conn->close();
    }
} else {
    //redirect them back to dashboard page if they didn't click update button
    header("Location: active-jobs.php");
    exit();

    exit();
}
