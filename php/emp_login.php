<?php 

	session_start();
    require_once 'login_db_account.php';
    
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_POST['search'])){

        if(isset($_POST['un']) && isset($_POST['ps']))
        {
            $un = $conn->real_escape_string($_POST['un']);
            $ps = $conn->real_escape_string($_POST['ps']);

            $sql = "SELECT * FROM emp_info INNER JOIN email ON emp_info.emp_id = email.emp_id WHERE username = '$un' AND password = '$ps'";
            $result = $conn->query($sql);  
            if (!$result) die ("Database access failed: " . $conn->error);

            if($result->num_rows > 0){
                $row = $result->fetch_array();

                $_SESSION['id'] = $row['emp_id'];
                $_SESSION['type'] = $row['usertype'];
                $_SESSION['status'] = $row['stat_id'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['ps'] = $row['password'];
                $_SESSION['user'] = $row['username'];

                if($_SESSION['type'] == "Admin" && $_SESSION['status'] == 1){
                    echo "<script>alert('Access Granted');window.location='../home.php'</script>";
                }else if($_SESSION['type'] == "Staff" && $_SESSION['status'] == 1){
                    echo "<script>alert('Access Granted');window.location='../home_staff.php'</script>";
                }else if($_SESSION['status'] == 0){
                    echo "<script>alert('Your account is disabled. Please contact the administrator.');window.location='../index.php'</script>";
                }else{
                    echo "<script>alert('Unknown account type or status.');window.location='../index.php'</script>";
                }
            }else{ 
                echo "<script>alert('Log in failed. Invalid username or password.');window.location='../index.php'</script>";
            }
        }else{
            header("Location: ../index.php");
        }
    }else{
        // Redirect to index if accessed directly via GET
        header("Location: ../index.php");
    }

?>