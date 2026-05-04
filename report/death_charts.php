<?php
header('Content-Type: application/json');

require_once 'login_db_death.php';

$con = new mysqli($hn, $un, $pw, $db);
if ($con->connect_error) die($con->connect_error);

$data = array();

if(isset($_POST['year']) && isset($_POST['month'])){  
  $yy = $con->real_escape_string($_POST['year']);
  $mm = $con->real_escape_string($_POST['month']);

  // CONDITION 1: BOTH YEAR AND MONTH ARE SELECTED
  if (!empty($yy) && !empty($mm) && $mm != 'All') {
    
    // Get the text version of the month for legacy records (if any use text format)
    $dateObj = DateTime::createFromFormat('!m', $mm);
    $monthName = strtoupper($dateObj->format('F')); 

    // Search for both 'YYYY-MM-%' AND '%MONTH%YYYY'
    $sql = "SELECT sex, count(*) as number 
            FROM person_tbl 
            WHERE (date_death LIKE '$yy-$mm-%' OR date_death LIKE '%$monthName%$yy')
            GROUP BY sex";
            
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        foreach ($result as $rows) {
          array_push($data, array('name' => $rows['sex'] , 'y' => $rows['number'] ));
        }
    }
  
  } 
  // CONDITION 2: ONLY YEAR IS SELECTED (OR ALL MONTHS)
  else if (!empty($yy)) {

    // Search for both 'YYYY-%' AND '%YYYY'
    $sql = "SELECT sex, count(*) as number 
            FROM person_tbl 
            WHERE (date_death LIKE '$yy-%' OR date_death LIKE '%$yy')
            GROUP BY sex";
            
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        foreach ($result as $rows) {
          array_push($data, array('name' => $rows['sex'] , 'y' => $rows['number'] ));
        }
    }
  }
}

if(isset($result) && $result instanceof mysqli_result) {
    $result->close();
}
$con->close();

print json_encode($data, JSON_NUMERIC_CHECK);
?>
