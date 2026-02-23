<?php 

	session_start();
    require_once 'login_db_account.php';
    
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

      $un   = $_POST['un'];
      $ps   = $_POST['ps'];

      $sql = "SELECT * FROM emp_info INNER JOIN email ON emp_info.emp_id = email.emp_id WHERE username = '$un' AND password = '$ps'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      $rows = $result->num_rows;

      $result= mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);

        if(0 < $row){

                $_SESSION['id'] = $row['emp_id'];
                $_SESSION['type'] = $row['usertype'];
                $_SESSION['status'] = $row['stat_id'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];

                if($_SESSION['type'] == "Admin" && $_SESSION['status'] == 1){
                  echo "<script>window.location='../home.php'</script>";
                }else if($_SESSION['type'] == "Staff" && $_SESSION['status'] == 1){
                  echo "<script>window.location='../home.php'</script>";
                }else if($_SESSION['status'] == 0){
                  echo "<script>window.location='../index.php'</script>";
                }

		}else{ 
                  echo "<script>window.location='../index.php'</script>";
                }

	



?>