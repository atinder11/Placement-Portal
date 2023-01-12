<?php

//To Handle Session Variables on This Page
session_start();

if (empty($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

//If user Actually clicked apply button
if (isset($_GET)) {



    $sql = "SELECT * from users WHERE id_user='$_SESSION[id_user]' ";
    $result1 = $conn->query($sql);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $sum = $row1['hsc'] + $row1['ssc'] + $row1['ug'] + $row1['pg'];
        $total = ($sum / 4);
        $course1 = $row1['qualification'];
    }


    $sql = "SELECT maximumsalary, qualification FROM job_post WHERE id_jobpost='$_GET[id]'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $eligibility = $row['maximumsalary'];
        $course2 = $row['qualification'];
        if ($total >= $eligibility) {
            if ($course1 == $course2) {
                header("Location: ../view-job-post.php?id=$_GET[id]");
                $_SESSION['status'] = "You are eligible for this drive, apply if you are interested.";
                $_SESSION['status_code'] = "success";
                exit();
            } else {
                header("Location: ../view-job-post.php?id=$_GET[id]");
                $_SESSION['status'] = "You are not eligible for this drive due to the course criteria. Check out other drives.";
                $_SESSION['status_code'] = "success";
                exit();
            }
        } else {
            header("Location: ../view-job-post.php?id=$_GET[id]");
            $_SESSION['status'] = "You are not eligible for this drive either due to the overall percentage criteria or course criteria. Update your marks in your profile, if you think you are eligible.";
            $_SESSION['status_code'] = "success";
        }
    }
}
