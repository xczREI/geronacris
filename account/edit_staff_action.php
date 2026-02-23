<?php
    session_start();

    require_once '../php/login_db_account.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

  if(isset($_POST['updatebtn']) && isset($_POST['id']))
  {
      $id= $_POST['id'];
      $lastname= $_POST['lname'];
      $firstname = $_POST['fname'];
      $middlename = $_POST['mname'];
      $address = $_POST['address'];
      $birthdate = date_format(date_create($_POST['bdate']),'Y-m-d');
      $gender = $_POST['gender'];
      $contact = $_POST['contact'];
      $user= $_POST['user'];
      $pass = $_POST['pass'];
      $pass1 = $_POST['pass1'];
      $pass2 = $_POST['pass2'];
      $userpass= $_POST['userpass'];

      if($pass1 != ""){
        $nw_pass = $pass1;
      }else{
        $nw_pass = $pass;
      }

      $sql = "SELECT * FROM email WHERE emp_id ='$id'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      $result= mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

      if(0 < $row){

      $_SESSION['pass'] = $row['password'];
                
      if($pass1 == $pass2 && $_SESSION['pass'] == $userpass){

      $sql = "UPDATE emp_info SET lastname ='$lastname', firstname ='$firstname', middlename ='$middlename', address='$address', birthdate='$birthdate', sex='$gender', contact='$contact' WHERE emp_id ='$id'";
      $result = $conn->query($sql);
      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";

      $mysql = "UPDATE email SET username='$user', password='$nw_pass' WHERE emp_id ='$id'";

      $result = $conn->query($mysql);
      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";

      echo "<script>window.location='../index.php'</script>";

      }

      else{

         echo "<script>alert('Password not match');window.location='../home_staff.php';</script>";
      }
    }
  }
 
?>
