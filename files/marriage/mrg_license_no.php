						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
									<input type="checkbox" class="custom-control-input" id="mrg_license" name="mrg_solemn_type" value="marriage license" checked="">
		      						<label class="custom-control-label" for="mrg_license" style="font-size: 14px;">&nbsp;a. Marriage License No.</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="mrg_license_no" name="mrg_license_no" value="<?php echo $row['mrg_license_no'] ?>" onkeypress="return isNumberKey(event)">
								</div>
								issued on
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="mrg_license_on" name="mrg_license_on" value="<?php echo $row['mrg_issued_on'] ?>">
								</div>
								at
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="mrg_license_at" name="mrg_license_at" value="<?php echo $row['mrg_issued_at'] ?>" onkeypress="return isTextKey(event)">
								</div><br>
								&emsp;&emsp;&emsp;in favor of said parties, was exhibited to me.<br>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
									<input type="checkbox" class="custom-control-input" id="no_license" name="mrg_solemn_type" value="no marriage license">
		      						<label class="custom-control-label" for="no_license" style="font-size: 14px;">&nbsp;b. no marriage license</label>
								</div>
								was necessary, the marriage being solemnized under Art
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 10%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="no_license_art" name="no_license_art">
								</div>
								of Executive Order No. 209.<br>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
									<input type="checkbox" class="custom-control-input" id="the_marriage" name="mrg_solemn_type" value="presidential decree no. 1083">
		      						<label class="custom-control-label" for="the_marriage" style="font-size: 14px;">&nbsp;c. the marriage </label>
								</div>