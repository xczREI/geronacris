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
      isset($_POST['ustype']) &&
      isset($_POST['user']) &&
      isset($_POST['psw2']) &&
      isset($_POST['psw']))
    {
      $adid= $_POST['adid'];
      $adpass= $_POST['adpass'];
      $lastname= $_POST['lname'];
      $firstname = $_POST['fname'];
      $middlename = $_POST['mname'];
      $address = $_POST['address'];
      $birthdate = $_POST['bdate'];
      $gender = $_POST['gender'];
      $cellphone = $_POST['cellphone'];
      $ustype= $_POST['ustype'];
      $user= $_POST['user'];
      $password = $_POST['psw'];
      $password2= $_POST['psw2'];

      $sql = "SELECT * FROM email WHERE usertype= 'Admin' AND emp_id='$adid'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      $result= mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      if(0 < $row){

      $_SESSION['pass'] = $row['password'];
                
      if($password == $password2 && $_SESSION['pass'] == $adpass){

      $sql = "INSERT INTO emp_info VALUES (NULL, '$lastname', '$firstname', '$middlename', '$address', '$birthdate', '$gender', '$cellphone')";
      $result = $conn->query($sql);

      $id = mysqli_insert_id($conn);

      $sql = "INSERT INTO email VALUES ('$id', '$user', '$password', '$ustype',  1)";
      $result = $conn->query($sql);
      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";

        echo "<script>alert('User sign up successfully!'); window.location='../mng_users.php'</script>";
      }

      else{

        echo "<script>window.location='../addusrs.php'</script>";
      }
    }
  }
}

?>
