<?php
	$maternal_condition = $row['maternal_condition'];
	if($maternal_condition == 'None of the choices'){
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="none_choices" name="maternal_condition" value="None of the choices" checked="">
      	<label class="custom-control-label" for="none_choices" style="font-size: 14px;">&nbsp;e. None of the <br>&emsp;&nbsp;choices</label>
	</div>
<?php
	}else{
?>
	<div class="custom-control custom-checkbox custom-control-inline">
		<input type="checkbox" class="custom-control-input" id="none_choices" name="maternal_condition" value="None of the choices">
      	<label class="custom-control-label" for="none_choices" style="font-size: 14px;">&nbsp;e. None of the <br>&emsp;&nbsp;choices</label>
	</div>
<?php
	}
?>