<?php
header('Content-Type: application/json');

require_once 'login_db_birth.php';

$con = new mysqli($hn, $un, $pw, $db);
if ($con->connect_error) die($con->connect_error);

$date = date_create();
$year = date_format($date,"Y"); 


$sql = "SELECT child_sex, COUNT(*) as number 
        FROM child_tbl 
        JOIN registration_tbl ON child_tbl.no = registration_tbl.no 
        GROUP BY child_sex";
$result = $con->query($sql);

$data = array();
if ($result) {
    while ($rows = $result->fetch_assoc()) {
        $sex = !empty($rows['child_sex']) ? strtoupper($rows['child_sex']) : "UNKNOWN";
        array_push($data, array('name' => $sex, 'y' => $rows['number']));
    }
    $result->close();
}
$con->close();

echo json_encode($data, JSON_NUMERIC_CHECK);
?>
