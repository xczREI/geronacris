<?php
header('Content-Type: application/json');

require_once 'login_db_death.php';

$con = new mysqli($hn, $un, $pw, $db);
if ($con->connect_error) die($con->connect_error);

if(isset($_POST['year']) && isset($_POST['month'])){  
  $yy = $_POST['year'];
  $mm = $_POST['month'];
  $xx = ("$yy-$mm-01");
  $zz = ("$yy-$mm-31");

  if (!empty($yy) && !empty($mm)) {

    $sql = "SELECT sex,count(*) as number, reg_date FROM person_tbl NATURAL JOIN registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY sex";
    $result = mysqli_query($con, $sql);
    
    $data = array();
    foreach ($result as $rows) {
      array_push($data, array('name' =>$rows['sex'] , 'y'=>$rows['number'] ));
    }
  
  } else if (!empty($yy) && empty($mm)) {

    $sql = "SELECT sex,count(*) as number, reg_date FROM person_tbl NATURAL JOIN registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY sex";
    $result = mysqli_query($con, $sql);
    
    $data = array();
    foreach ($result as $rows) {
      array_push($data, array('name' =>$rows['sex'] , 'y'=>$rows['number'] ));
    }
  
  }

}

$result->close();
$con->close();

print json_encode($data, JSON_NUMERIC_CHECK);
?>
