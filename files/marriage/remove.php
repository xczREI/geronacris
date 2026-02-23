<?php
    session_start();
    require_once 'login_db_mrg.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_GET['reg_no']))
    {
      $reg_no = $_GET['reg_no'];
      $sql = "DELETE FROM registration_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql);
      $sql = "DELETE FROM husband_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM wife_tbl  WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM marriage_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM receive_civil_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql);   
      $sql = "DELETE FROM remarks_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM witness_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM aff_solemn_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM late_reg_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 

      if (!$result) die ("Database access failed: " . $conn->error);

      header('location: marriage_records.php');
    }
   
?>