<?php
    session_start();
    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_GET['reg_no']))
    {
      $reg_no = $_GET['reg_no'];
      $sql = "DELETE FROM registration_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql);
      $sql = "DELETE FROM child_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM mother_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM father_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM att_inf_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql);   
      $sql = "DELETE FROM receive_civil_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM remarks_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM admission_paternity_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM late_reg_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      $sql = "DELETE FROM no_tbl WHERE no = '$reg_no'";
      $result = $conn->query($sql); 
      
      if (!$result) die ("Database access failed: " . $conn->error);

      header('location: birth_records.php');
    }
   
?>