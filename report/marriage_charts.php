<?php
header('Content-Type: application/json');

require_once 'login_db_mrg.php';

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
    $sql = "SELECT mrg_solemn_type, count(*) as number 
            FROM marriage_tbl 
            WHERE (mrg_date LIKE '$yy-$mm-%' OR mrg_date LIKE '%$monthName%$yy')
            GROUP BY mrg_solemn_type";
            
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        foreach ($result as $rows) {
          $raw_name = trim($rows['mrg_solemn_type'] ?? '');
          if ($raw_name === '') {
              $formatted_name = 'Not Specified';
          } else {
              $formatted_name = ucwords(strtolower($raw_name));
              // Ensure "No." keeps its capital N, though ucwords already does this.
          }
          array_push($data, array('name' => $formatted_name , 'y' => $rows['number'] ));
        }
    }
  
  } 
  // CONDITION 2: ONLY YEAR IS SELECTED (OR ALL MONTHS)
  else if (!empty($yy)) {

    // Search for both 'YYYY-%' AND '%YYYY'
    $sql = "SELECT mrg_solemn_type, count(*) as number 
            FROM marriage_tbl 
            WHERE (mrg_date LIKE '$yy-%' OR mrg_date LIKE '%$yy')
            GROUP BY mrg_solemn_type";
            
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        foreach ($result as $rows) {
          $raw_name = trim($rows['mrg_solemn_type'] ?? '');
          if ($raw_name === '') {
              $formatted_name = 'Not Specified';
          } else {
              $formatted_name = ucwords(strtolower($raw_name));
              // Ensure "No." keeps its capital N, though ucwords already does this.
          }
          array_push($data, array('name' => $formatted_name , 'y' => $rows['number'] ));
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


