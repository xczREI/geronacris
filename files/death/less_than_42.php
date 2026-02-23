<?php
	$maternal_condition = $row['maternal_condition'];
	if($maternal_condition == 'less than 42 days after delivery'){
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="less_than_42" name="maternal_condition" value="less than 42 days after delivery" checked="">
		<label class="custom-control-label" for="less_than_42" style="font-size: 14px;">&nbsp;c. less than 42 days after <br>&emsp;&nbsp;delivery</label>
	</div>
<?php
	}else{
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="less_than_42" name="maternal_condition" value="less than 42 days after delivery">
		<label class="custom-control-label" for="less_than_42" style="font-size: 14px;">&nbsp;c. less than 42 days after <br>&emsp;&nbsp;delivery</label>
	</div>
<?php
	}
?>