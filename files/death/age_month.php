<div class="col-4" style="border-right: 1px solid purple;">
	<h6 style="margin:0;font-size:12px;">a.&nbsp;IF 1 YEAR OR ABOVE</h6>
	<div class="row" style="border-top: 1px solid purple;">
		<div class="col">
			<h6 style="margin:0;font-size:10px;" align="center">[2]Completed year</h6>
			<div class="input-group">
				<input type="text" class="form-control form-control-sm" name="age_death" style="text-align:center;">
			</div>
		</div>
	</div>
</div>
<div class="col-4" style="border-right: 1px solid purple;">
	<h6 style="margin:0;font-size:12px;">b.&nbsp;IF UNDER 1 YEAR</h6>
	<div class="row" style="border-top: 1px solid purple;">
		<div class="col-6" style="border-right: 1px solid purple;">
			<h6 style="margin:0;font-size:10px;" align="center">[1]Months</h6>
			<div class="input-group">
				<input type="text" class="form-control form-control-sm" name="age_one_month" value="<?php echo $row['age_time_of_death']; ?>"  onkeypress="return isNumberKey(event)">
			</div>
		</div>
		<div class="col-6">
			<h6 style="margin:0;font-size:10px;" align="center">[0]Days</h6>
			<div class="input-group">
				<input type="text" class="form-control form-control-sm" name="age_one_day" value="<?php echo $row['age_day_min']; ?>"  onkeypress="return isNumberKey(event)">
			</div>
		</div>
	</div>			
</div>
<div class="col-4">
	<h6 style="margin:0;font-size:12px;">c.&nbsp;IF UNDER 24 HRS</h6>
	<div class="row" style="border-top: 1px solid purple;">
		<div class="col-6" style="border-right: 1px solid purple;">
			<h6 style="margin:0;font-size:10px;" align="center">Hours</h6>
			<div class="input-group">
				<input type="text" class="form-control form-control-sm" name="age_hrs_hrs" onkeypress="return isNumberKey(event)">
			</div>
		</div>
		<div class="col-6">
			<h6 style="margin:0;font-size:10px;" align="center">Min/Sec</h6>
			<div class="input-group">
				<input type="text" class="form-control form-control-sm" name="age_hrs_min" onkeypress="return isNumberKey(event)">
			</div>
		</div>
	</div>			
</div>