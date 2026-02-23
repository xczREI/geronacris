						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="my_mrg" name="late_marriage_type1" value="my marriage">
      						<label class="custom-control-label" for="my_mrg" style="font-size: 14px;">&nbsp;my marriage with</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 25%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt1" name="late_marriage_with" onkeypress="return isTextKey(event)">
						</div>
						in
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_marriage_in1" onkeypress="return isTextKey(event)">
						</div>
						on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_marriage_on2">
						</div>
						&emsp;&emsp;&emsp;&emsp;&emsp;
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="the_mrg" name="late_marriage_type2" value="the marriage" checked="">
      						<label class="custom-control-label" for="the_mrg" style="font-size: 14px;">&nbsp;the marriage between</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="the_birth_txt1" name="late_mrg_h" value="<?php echo $row['late_husband_name'] ?>" onkeypress="return isTextKey(event)">
						</div>
						and
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="the_birth_txt2" name="late_mrg_w" value="<?php echo $row['late_wife_name'] ?>" onkeypress="return isTextKey(event)">
						</div>
						in
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 28%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_marriage_in3" value="<?php echo $row['marriage_in'] ?>" onkeypress="return isTextKey(event)">
						</div>
						on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="the_birth_txt3" name="late_marriage_on4" value="<?php echo $row['marriage_on'] ?>">
						</div>