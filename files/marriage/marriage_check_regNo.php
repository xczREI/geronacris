<?php

	require_once 'login_db_mrg.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['registry_no'])){
	$registry_no = $_POST['registry_no'];
	$reg_no = strtoupper($registry_no);

	$sql = "SELECT * FROM registration_tbl NATURAL JOIN husband_tbl WHERE registry_no = '".$_POST['registry_no']."'";
    $result = $conn->query($sql);  
	if (!$result) die ("Database access failed: " . $conn->error);

	if ($result->num_rows > 0) { 
		echo "<script>alert('The $reg_no already exist.')</script>";
		echo "<script>document.getElementById('btn_add').disabled=true;</script>";
		echo "<script>document.getElementById('regno').value='';</script>";
 	}else{ 
 		echo "<script>document.getElementById('btn_add').disabled=false;</script>"; 
 	}

}
?>
