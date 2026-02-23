<?php
	$conn = mysqli_connect('localhost','root','','crsbirthdb') or die ('unable to connect');

    $result = $sql = "SELECT * FROM no_tbl NATURAL JOIN registration_tbl ORDER BY No DESC LIMIT 1";
    if (!$result) die ("Database access failed: " . $conn->error);

    $result= mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $rows = $result->num_rows;
    $page = $row['page_no'];
    $book = $row['book_no'];

	if(null == $book){
?>
		<label id="ltxt">Book No.</label>
		<input type="text" class="bookNo form-control form-control-sm" id="txt" id="bookno" style="font-weight:bold;" name="book_no" value="1" readonly>
<?php
	}else if(5 == $page){
		for ($j = 0 ; $j < $rows ; ++$j)
		{
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$book_no = $row['book_no'];
?>
			<label id="ltxt">Book No.</label>
			<input type="text" class="bookNo form-control form-control-sm" id="txt" id="bookno" style="font-weight:bold;" name="book_no" value="<?php echo ++$book_no; ?>" readonly>
<?php
		}
	}else if(5 != $page){
		for ($j = 0 ; $j < $rows ; ++$j)
		{
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$book_no = $row['book_no'];
?>
			<label id="ltxt">Book No.</label>
			<input type="text" class="bookNo form-control form-control-sm" id="txt" id="bookno" style="font-weight:bold;" name="book_no" value="<?php echo $book_no; ?>" readonly>
<?php
		}
	}
?>
