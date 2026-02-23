<?php
 require_once 'login_db_account.php';
    
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $error = array();

    if (isset($_GET['id']))
    {
      $id = $_GET['id'];

      $sql = "UPDATE email SET stat_id = 1 WHERE emp_id = '$id'";
      $result = $conn->query($sql);
      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";

      header('location: view_users.php');

    }
?>