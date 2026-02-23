<?php
header('Content-Type: application/json');

require_once 'login_db_death.php';

$con = new mysqli($hn, $un, $pw, $db);
if ($con->connect_error) die($con->connect_error);

$date = date_create();
$year = date_format($date,"Y"); 


$sql = "SELECT sex,count(*) as number, reg_date FROM person_tbl NATURAL JOIN registration_tbl WHERE reg_date LIKE '$year%' GROUP BY sex";
	$result = mysqli_query($con, $sql);
	
	$data = array();
	foreach ($result as $rows) {
		array_push($data, array('name' =>$rows['sex'] , 'y'=>$rows['number'] ));
	}

$result->close();
$con->close();

print json_encode($data, JSON_NUMERIC_CHECK);
?>
