<?php
	$maternal_condition = $row['maternal_condition'];
	if($maternal_condition == '42 days to 1 year after delivery'){
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="42_days" name="maternal_condition" value="42 days to 1 year after delivery" checked="">
		<label class="custom-control-label" for="42_days" style="font-size: 14px;">&nbsp;d. 42 days to 1 year after <br>&emsp;&nbsp;delivery</label>
	</div>
<?php
	}else{
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="42_days" name="maternal_condition" value="42 days to 1 year after delivery">
		<label class="custom-control-label" for="42_days" style="font-size: 14px;">&nbsp;d. 42 days to 1 year after <br>&emsp;&nbsp;delivery</label>
	</div>
<?php
	}
?>