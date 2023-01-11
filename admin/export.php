<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}

require_once("../db.php");

$html = '<table><tr><td>Student Name</td><td>Highest Qualification</td><td>Skills</td><td>City</td><td>State</td><td>Contact No.</td><td>Email</td><td>HSC</td><td>SSC</td><td>UG</td><td>PG</td></tr>';

// echo $html;

$sql = $_SESSION['QUERY'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $html .= '<tr><td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td><td>' . $row['qualification'] . '</td><td>' . $row['skills'] . '</td><td>' . $row['city'] . '</td><td>' . $row['state'] . '</td><td>' . $row['contactno'] . '</td><td>' . $row['email'] . '</td><td>' . $row['hsc'] . '</td><td>' . $row['ssc'] . '</td><td>' . $row['ug'] . '</td><td>' . $row['pg'] . '</td></tr>';
    }
}
$html .= '</table>';
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=report.xls');
echo $html;
