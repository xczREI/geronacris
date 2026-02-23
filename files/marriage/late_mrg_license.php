						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="marriage" name="late_mrg_type" value="marriage license" checked="">
      						<label class="custom-control-label" for="marriage" style="font-size: 14px;">&nbsp;a. with marriage license no.</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 10%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt1" name="late_mrg_no" value="<?php echo $row['late_mrg_license_no']; ?>" onkeypress="return isNumberKey(event)">
						</div>
						issued on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_mrg_issued_on" value="<?php echo $row['late_mrg_issued_on']; ?>">
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 25%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_mrg_issued_at" value="<?php echo $row['late_mrg_issued_at']; ?>" onkeypress="return isTextKey(event)">
						</div>
						;<br>
						&emsp;&emsp;&emsp;
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="article" name="late_mrg_type" value="under Article">
      						<label class="custom-control-label" for="article" style="font-size: 14px;">&nbsp;b. under Article</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 10%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt1" name="late_under_art">
						</div>