<?php
	require_once 'login_db_birth.php';

	$conn = new mysqli($hn, $un, $pw, $db);
	if ($conn->connect_error) die($conn->connect_error);

		$edit_no = $_POST['edit_no'];
		$adminPassword = $_POST['adminPassword'];

		$sql = "SELECT * FROM email WHERE usertype = 'Admin' AND password = '$adminPassword'";
	    $result = $conn->query($sql);  
		if (!$result) die ("Database access failed: " . $conn->error);

		if ($result->num_rows > 0) { 
			header("Location: birth_cerf_edit_staff.php?reg_no=".$edit_no);
	 	} else { 
			header("Location: birth_records_staff.php?error=unauthorized");
	 	}
?>
