<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}


require_once("../db.php");

if (isset($_GET)) {

    //Delete Student using id and redirect
    $sql = "UPDATE users  SET active='0' WHERE id_user='$_GET[id]'";
    if ($conn->query($sql)) {
        header("Location: applications.php");
        exit();
    } else {
        echo "Error";
    }
}
