<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
	<input type="checkbox" class="custom-control-input" id="my_birth" name="late_birth_type" value="my birth">
    <label class="custom-control-label" for="my_birth" style="font-size: 14px;">&nbsp;my birth in</label>
</div>
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="my_birth_txt1" name="late_birth_in" onkeypress="return isTextKey(event)">
</div>
on
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_birth_on">
</div>
&emsp;&emsp;&emsp;&emsp;&emsp;
<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
	<input type="checkbox" class="custom-control-input" id="the_birth" name="late_birth_type" value="the birth" checked>
	<label class="custom-control-label" for="the_birth" style="font-size: 14px;">&nbsp;the birth of</label>
</div>
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 32%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="the_birth_txt1" name="late_birth_of" value="<?php echo $row['late_birth_of']; ?>" onkeypress="return isTextKey(event)">
</div>
who was born in
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="the_birth_txt2" name="late_birth_inx" value="<?php echo $row['late_birth_in']; ?>" onkeypress="return isTextKey(event)">
</div>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 28%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
</div>
on
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="the_birth_txt3" name="late_birth_onx" value="<?php echo $row['late_birth_on']; ?>">
</div>