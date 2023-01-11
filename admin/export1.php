<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}

require_once("../db.php");

$html = '<table><tr><td>Student Name</td><td>Student Email</td><td>Comapny Name</td><td>Role</td><td>CTC</td></tr>';

// echo $html;

$sql = $_SESSION['QUERY'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $html .= '<tr><td>' . $row['sname'] . '</td><td>' . $row['semail'] . '</td><td>' . $row['cname'] . '</td><td>' . $row['role'] .  '</td><td>' . $row['ctc'] . '</td><td>';
    }
}
$html .= '</table>';
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=report.xls');
echo $html;
