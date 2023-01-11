<?php // opening php tags

session_start()
// adding database file
require_once(Placement_portal.php);

$sql = "select * from users";

$result = $conn -> query($sql)

if ($result->num_rows>0)
{
while ($result->fetch_assoc()){

echo "echo $row['Name'];
}


}


?> // closing php tags