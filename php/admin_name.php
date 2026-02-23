<?php
session_start();
require_once 'login_db_account.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if(isset($_SESSION['id']) ){

      $sql= "SELECT lastname, firstname FROM emp_info WHERE emp_id = '".$_SESSION['id']."'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      $rows = $result->num_rows;

      for ($j = 0 ; $j < $rows ; ++$j)
      {
      $result->data_seek($j);
      $row = $result->fetch_array(MYSQLI_NUM);

echo <<<_END
        $row[0], $row[1]
_END;
      }
    }
?>