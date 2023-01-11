<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}


require_once("../db.php");
if (isset($_GET)) {

    //Delete notice using id and redirect
    $sql = "DELETE FROM notice WHERE id ='$_GET[id]'";
    if ($conn->query($sql)) {
        header("Location: postnotice.php");
        exit();
    } else {
        echo "Error";
    }
}
