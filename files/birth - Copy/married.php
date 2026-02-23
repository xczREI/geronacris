<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
	<input type="checkbox" class="custom-control-input" id="married" name="married_type" value="married" checked>
	<label class="custom-control-label" for="married" style="font-size: 14px;">&nbsp;married on</label>
</div>
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="married_txt1" name="married_on" value="<?php echo $row['married_on']; ?>">
</div>
at
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
</div>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 60%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="married_txt2" name="married_at" value="<?php echo $row['married_at']; ?>" onkeypress="return isTextKey(event)">
</div>
.
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
	<input type="checkbox" class="custom-control-input" id="not_married" name="married_type" value="not married">
	<label class="custom-control-label" for="not_married" style="font-size: 14px;">&nbsp;not married but I/he/she was acknowledged/not acknowledged by my/his/her</label>
</div><br>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; 
father whose name is
<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 45%;margin-right: 0;">
	<input type="text" class="form-control form-control-sm" id="not_married_txt" name="not_married_name" onkeypress="return isTextKey(event)">
</div>