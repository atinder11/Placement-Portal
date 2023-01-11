<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}


require_once("../db.php");

if (isset($_GET)) {


    $sql = "UPDATE users SET active='1' WHERE id_user='$_GET[id]'";
    if ($conn->query($sql)) {
        header("Location: applications.php");
        exit();
    } else {
        echo "Error";
    }
}
