<?php
	$maternal_condition = $row['maternal_condition'];
	if($maternal_condition == 'pregnant, not in labour'){
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="not_labour" name="maternal_condition" value="pregnant, not in labour" checked="">
		<label class="custom-control-label" for="not_labour" style="font-size: 14px;">&nbsp;a. pregnant, <br>&emsp;&nbsp;not in labour</label>
	</div>
<?php
	}else{
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="not_labour" name="maternal_condition" value="pregnant, not in labour">
		<label class="custom-control-label" for="not_labour" style="font-size: 14px;">&nbsp;a. pregnant, <br>&emsp;&nbsp;not in labour</label>
	</div>
<?php
	}
?>