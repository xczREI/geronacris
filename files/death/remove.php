<?php
    session_start();
    require_once 'login_db_death.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_GET['reg_no']))
    {
      $reg_no = $_GET['reg_no'];
      $sql = "DELETE FROM registration_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql);
      $sql = "DELETE FROM person_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM death_cause_eight_days  WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM att_rev_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM corpse_disposal_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql);   
      $sql = "DELETE FROM inf_pre_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM receive_civil_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM remarks_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM death_cause_zero_seven WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM late_reg_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM autopsy_tbl  WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM embalmer_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      
      if (!$result) die ("Database access failed: " . $conn->error);

      header('location: death_records.php');
    }
   
?>