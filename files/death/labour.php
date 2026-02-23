<?php
	$maternal_condition = $row['maternal_condition'];
	if($maternal_condition == 'pregnant, in labour'){
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="in_labour" name="maternal_condition" value="pregnant, in labour" checked="">
		<label class="custom-control-label" for="in_labour" style="font-size: 14px;">&nbsp;b. pregnant, in <br>&emsp;&nbsp;labour</label>
	</div>
<?php
	}else{
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="in_labour" name="maternal_condition" value="pregnant, in labour">
		<label class="custom-control-label" for="in_labour" style="font-size: 14px;">&nbsp;b. pregnant, in <br>&emsp;&nbsp;labour</label>
	</div>
<?php
	}
?>