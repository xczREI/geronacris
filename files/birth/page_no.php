<?php
	$conn = mysqli_connect('localhost','root','','crsbirthdb') or die ('unable to connect');

    $result = $sql = "SELECT * FROM no_tbl NATURAL JOIN registration_tbl ORDER BY No DESC LIMIT 1";
    if (!$result) die ("Database access failed: " . $conn->error);

    $result= mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $rows = $result->num_rows;
    $page = $row['page_no'];

	if(null == $page){
?>
		<label id="ltxt">Page No.</label>
		<input type="text" class="pageNo form-control form-control-sm" id="txt" name="page_no" style="font-weight:bold;" value="1" readonly>
<?php
	}else if(5 > $page){
		for ($j = 0 ; $j < $rows ; ++$j)
		{
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$page_no = $row['page_no'];
?>
			<label id="ltxt">Page No.</label>
			<input type="text" class="pageNo form-control form-control-sm" id="txt" name="page_no" style="font-weight:bold;" value="<?php echo ++$page_no; ?>" readonly>
<?php
		}
	}else if(5 == $page){
		for ($j = 0 ; $j < $rows ; ++$j)
		{
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$page_no = $row['page_no'];
?>
			<label id="ltxt">Page No.</label>
			<input type="text" class="pageNo form-control form-control-sm" id="txt" name="page_no" style="font-weight:bold;" value="1" readonly>
<?php
		}
	}
?>
