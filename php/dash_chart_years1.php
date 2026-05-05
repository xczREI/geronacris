<?php
header('Content-Type: application/json');

require_once 'login_db_death.php';

$con = new mysqli($hn, $un, $pw, $db);
if ($con->connect_error) die($con->connect_error);

$date = date_create();
$year = date_format($date,"Y"); 


$sql = "SELECT sex, COUNT(*) as number 
        FROM person_tbl 
        JOIN registration_tbl ON person_tbl.no = registration_tbl.no 
        GROUP BY sex";
$result = $con->query($sql);

$data = array();
if ($result) {
    while ($rows = $result->fetch_assoc()) {
        $sex = !empty($rows['sex']) ? strtoupper($rows['sex']) : "UNKNOWN";
        array_push($data, array('name' => $sex, 'y' => $rows['number']));
    }
    $result->close();
}
$con->close();

echo json_encode($data, JSON_NUMERIC_CHECK);
?>
