<?php
header('Content-Type: application/json');

require_once 'login_db_birth.php';

$con = new mysqli($hn, $un, $pw, $db);
if ($con->connect_error) die($con->connect_error);

$data = array(); 

if(isset($_POST['year']) && isset($_POST['month'])){  
  $yy = $con->real_escape_string($_POST['year']);
  $mm = $con->real_escape_string($_POST['month']);

  // CONDITION 1: BOTH YEAR AND MONTH ARE SELECTED
  if (!empty($yy) && !empty($mm)) {
    
    // Get the text version of the month for legacy records
    $dateObj = DateTime::createFromFormat('!m', $mm);
    $monthName = strtoupper($dateObj->format('F')); 

    // THE FIX: Search for both '2005-05-%' AND '%MAY%2005'
    $sql = "SELECT child_sex, count(*) as number 
            FROM child_tbl 
            WHERE (child_birth_date LIKE '$yy-$mm-%' OR child_birth_date LIKE '%$monthName%$yy')
            GROUP BY child_sex";
            
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        foreach ($result as $rows) {
          array_push($data, array('name' => $rows['child_sex'] , 'y' => $rows['number'] ));
        }
    }
  
  } 
  // CONDITION 2: ONLY YEAR IS SELECTED
  else if (!empty($yy) && empty($mm)) {

    // THE FIX: Search for both '2005-%' AND '%2005'
    $sql = "SELECT child_sex, count(*) as number 
            FROM child_tbl 
            WHERE (child_birth_date LIKE '$yy-%' OR child_birth_date LIKE '%$yy')
            GROUP BY child_sex";
            
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        foreach ($result as $rows) {
          array_push($data, array('name' => $rows['child_sex'] , 'y' => $rows['number'] ));
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