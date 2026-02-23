<?php
    session_start();
    require_once 'login_db_account.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_GET['id']))
    {
      $id = $_GET['id'];
      $sql = "DELETE FROM emp_info WHERE emp_id = '$id'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);
      $sql = "DELETE FROM email WHERE emp_id = '$id'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      header('location: view_users.php');
    }
   
?>