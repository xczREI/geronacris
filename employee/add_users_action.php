<?php

 require_once 'login_db_account.php';
    
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $error = array();

    if (isset($_POST['add'])) 
    {
      if(isset($_POST['adid']) &&
      isset($_POST['adpass']) &&
      isset($_POST['lname']) &&
      isset($_POST['fname']) &&
      isset($_POST['mname']) &&
      isset($_POST['address']) &&
      isset($_POST['bdate']) &&
      isset($_POST['gender']) &&
      isset($_POST['cellphone']) &&
      //isset($_POST['ustype']) &&
      isset($_POST['user']) &&
      isset($_POST['psw']))
    {
      $id= $_POST['adid'];
      $pass= $_POST['adpass'];
      $lastname= $_POST['lname'];
      $firstname = $_POST['fname'];
      $middlename = $_POST['mname'];
      $address = $_POST['address'];
      $birthdate = $_POST['bdate'];
      $gender = $_POST['gender'];
      $cellphone = $_POST['cellphone'];
      $ustype= 'Staff';//$_POST['ustype'];
      $user= $_POST['user'];
      $password1 = $_POST['psw'];
      $password2 = $_POST['psw2'];
   /*   $sql = "SELECT * FROM email WHERE usertype= 'Admin' AND emp_id='$adid'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      $result= mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      if(0 < $row){

      $_SESSION['pass'] = $row['password'];
                
      if($password == $password2 && $_SESSION['pass'] == $adpass){ */

      $sql = "SELECT * FROM email WHERE emp_id ='$id'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      $result= mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      if(0 < $row){

      $_SESSION['pass'] = $row['password'];
                
      if($password1 == $password2 && $_SESSION['pass'] == $pass){

      $sql = "INSERT INTO emp_info VALUES (NULL, '$lastname', '$firstname', '$middlename', '$birthdate', '$gender', '$address', '$cellphone')";
      $result = $conn->query($sql);

      $id = mysqli_insert_id($conn);

      $sql = "INSERT INTO email VALUES ('$id', '$user', '$password1', '$ustype',  1)";
      $result = $conn->query($sql);
      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";

        echo "<script>alert('New account saved');window.location='view_users.php'</script>";
      }

      else{

        echo "<script>alert('Creating new account failed');window.location='view_users.php'</script>";
      }
    } 
  }
}

?>
