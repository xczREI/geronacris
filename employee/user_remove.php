<?php
    session_start();
    require_once 'login_db_account.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_GET['emp_id']))
    {
      $sql = "DELETE * FROM emp_info WHERE emp_id = '".$_GET['emp_id']."' ";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      header('view_users.php');
    }
?>