<?php

    require_once 'login_db_account.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $error = array();

    if(isset($_POST['usrupdate']) && isset($_POST['id'])) 
    {
      $id = $_POST['id'];
      $usertype = $_POST['usertype'];
    
      $sql = "UPDATE email SET usertype='$usertype' WHERE emp_id = '$id'";
      
      $result = $conn->query($sql);
      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";

      echo "<script>alert('Account Updated');window.location='view_users.php'</script>";

      //header('location: view_users.php');

      mysqli_close($conn);
}

?>