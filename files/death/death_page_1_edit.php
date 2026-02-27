<?php require 'mycon.php'; ?>
<datalist id="province_list">
<?php 
	$sqlp = "SELECT * from tblprovinces";
	$resultp = $connx->query($sqlp);
	if($resultp) {
		while ($rowp = $resultp->fetch_assoc()) {
			echo "<option value='" . $rowp['province'] . "'>" . $rowp['province'] . "</option>";
		}
	}				
?>
</datalist>

<datalist id="municipality_list">
<?php 
	$sqlp = "SELECT * from tblmunicipals";
	$resultp = $connx->query($sqlp);
	if($resultp) {
		while ($rowm = $resultp->fetch_assoc()) {
			echo "<option value='" . $rowm['municipals'] . "'>" . $rowm['municipals'] . "</option>";
		}
	}			
?>
</datalist>

<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
	<div class="form" style="padding:0 15px 0 15px;">
		<div class="row">
  			<div class="col-9" style="border: 2px solid purple;">
			  	<p class="m1">Municipal Form No. 103</p>
			  	<p class="m1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span align="center" class="m2" style="font-size: 15px;">Republic of the Philippines</span></p>
			  	<p align="center" class="m2" style="font-size: 16px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
			  	<p align="center" class="m2" style="font-size: 30px; font-weight: bold;">CERTIFICATE OF DEATH</p>
  			</div>
			<div class="col-3" id="book" style="border: 2px solid purple; border-left:none; border-bottom:none;">
     			<div class="form-group">
					<label id="ltxt">Book No.</label>
					<input type="text" class="bookNo form-control form-control-sm" id="bookno" name="book_no" value="<?php echo $row['book_no'] ?? ''; ?>">
					<input type="hidden" class="form-control form-control-sm" id="bookno1" name="book_no1" value="<?php echo $row['book_no1'] ?? ''; ?>">

					<label id="ltxt">Page No.</label>
					<input type="text" class="pageNo form-control form-control-sm" name="page_no" id="pageno" value="<?php echo $row['page_no'] ?? ''; ?>">
					<input type="hidden" class="form-control form-control-sm" name="page_no1" id="pageno1" value="<?php echo $row['page_no1'] ?? ''; ?>">

					<input type="hidden" name="time" id="hrs" value="">
					<input type="hidden" name="date" id="date" value="">
					<input type="hidden" name="emp_name" id="emp_name" value="<?php echo $_SESSION['lastname'] ?? ''; ?>">
				</div>
  			</div>
		</div>
	  	<div class="row">
		  	<div class="col-9" style="border: 2px solid purple; border-top: none; padding-left:0;">
		  		<div class="input-group mt-1">
			  		<div class="input-group-prepend">
			      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;Province&nbsp;&emsp;&emsp;&emsp;&emsp;</span>
			  		</div>
			    	<input type="text" list='province_list' class="form-control form-control-sm" value="<?php echo $row['provinces'] ?? ''; ?>" name="provinces" onkeypress="return isTextKey(event)">
				</div>
		    	<div class="input-group mt-1">
			  		<div class="input-group-prepend">
			      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;City/Municipality&nbsp;&nbsp;</span>
			 		</div>
			    	<input type="text" list='municipality_list' class="form-control form-control-sm" value="<?php echo $row['municipal'] ?? ''; ?>" name="municipal" onkeypress="return isTextKey(event)">
				</div>
		  	</div>
		  	<div class="col-3" id="book" style="border: 2px solid purple;border-left:none; border-top: none;">
		    	<div class="form-group">
			  		<input type="text" class="regNo form-control form-control-sm" name="registry_no" id="regno" value="<?php echo $row['registry_no'] ?? ''; ?>">
			  		<div id="error"></div>
				</div>
		  	</div>
	  	</div>
		<div class="row">
  			<div class="col" style="border: 2px solid purple; border-top: none;">
	  			<div class="row">
	  				<div class="col-1">
	  		  			<h6 style="padding-top:2px; font-size:14px;">1.&n	bsp;NAME</h6>
	  				</div>
	  				<div class="col-3">
	  		  			<h6 align="center"><span style="color:purple;font-size:12px;">(First)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="person_fname" name="deceased_fname" value="<?php echo $row['deceased_fname'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					  	</div>
	  				</div>
			  		<div class="col-3">
			  		  	<h6 align="center"><span style="color:purple;font-size:12px;">(Middle)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="person_mname" name="deceased_mname" value="<?php echo $row['deceased_mname'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3">
					  	<h6 align="center"><span style="color:purple;font-size:12px;">(Last)</span></h6>
	  		  			<div class="input-group">
				    		<input type="text" class="form-control form-control-sm" id="person_lname" name="deceased_lname" value="<?php echo $row['deceased_lname'] ?? ''; ?>" onkeypress="return isTextKey(event)">
			  			</div>
			  		</div>
			  		<div class="col-2" style="border-left: 2px solid purple;">
	  		  			<h6 style="padding-top:2px; font-size:14px;">2.&nbsp;SEX <span style="color:purple;font-size:12px;">(Male/Female)</span></h6>
	  		  			<div class="input-group input-group-sm">
	  		  				<select name="sex" class="form-control form-control-sm">
							    <option selected style="display: none;"><?php echo $row['sex'] ?? ''; ?></option>
							    <option value="Male" style="font-size: 15px;">Male</option>
							    <option value="Female" style="font-size: 15px;">Female</option>
							</select>
					  	</div>
	  				</div>
	  			</div>
  				<div class="row" style="border-top: 2px solid purple;">
	  				<div class="col-3" style="border-right: 2px solid purple;">
	  		  			<h6 style="padding-top:2px; font-size:14px;">3.&nbsp;DATE OF DEATH <span style="color:purple;font-size:10.2px;">(Day, Month, Year)</span></h6>
	  		  			<div class="input-group" style="padding-top: 19px;">
					    	<input type="date" class="form-control form-control-sm" name="date_of_death" value="<?php echo $row['date_of_death'] ?? ''; ?>">
					  	</div>
	  				</div>
	  				<div class="col-3" style="border-right: 2px solid purple;">
	  		  			<h6 style="padding-top:2px; font-size:14px;">4.&nbsp;DATE OF BIRTH <span style="color:purple;font-size:10.2px;">(Day, Month, Year)</span></h6>
	  		  			<div class="input-group" style="padding-top: 19px;">
					    	<input type="date" class="form-control form-control-sm" name="date_birth" value="<?php echo $row['date_birth'] ?? ''; ?>">
					  	</div>
	  				</div>
	  				<div class="col-6">
	  		  			<h6 style="margin:0;font-size:14px;">5.&nbsp;AGE AT THE TIME OF DEATH <span style="color:purple;font-size:11px;">(Fill-up below accdg. to age category)</span></h6>
	  		  			<div class="row" style="border-top: 1px solid purple;">
	  		  				<div class="col-4" style="border-right: 1px solid purple;">
	  		  					<h6 style="margin:0;font-size:12px;">a.&nbsp;IF 1 YEAR OR ABOVE</h6>
	  		  					<div class="row" style="border-top: 1px solid purple;">
			  		  				<div class="col">
			  		  					<h6 style="margin:0;font-size:10px;" align="center">[2]Completed year</h6>
			  		  					<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" name="age_at_death" value="<?php echo $row['age_at_death'] ?? ''; ?>">
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
									    	<input type="text" class="form-control form-control-sm" name="age_one_month" value="<?php echo $row['age_one_month'] ?? ''; ?>">
									  	</div>
			  		  				</div>
			  		  				<div class="col-6">
			  		  					<h6 style="margin:0;font-size:10px;" align="center">[0]Days</h6>
			  		  					<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" name="age_one_day" value="<?php echo $row['age_one_day'] ?? ''; ?>">
									  	</div>
			  		  				</div>
			  		  			</div>			
	  		  				</div>
	  		  				<div class="col-4" style="border-right: 1px solid purple;">
	  		  					<h6 style="margin:0;font-size:12px;">c.&nbsp;IF UNDER 24 HRS</h6>
	  		  					<div class="row" style="border-top: 1px solid purple;">
			  		  				<div class="col-6" style="border-right: 1px solid purple;">
			  		  					<h6 style="margin:0;font-size:10px;" align="center">Hours</h6>
			  		  					<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" name="age_hrs_hrs" value="<?php echo $row['age_hrs_hrs'] ?? ''; ?>">
									  	</div>
			  		  				</div>
			  		  				<div class="col-6">
			  		  					<h6 style="margin:0;font-size:10px;" align="center">Min/Sec</h6>
			  		  					<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" name="age_hrs_min" value="<?php echo $row['age_hrs_min'] ?? ''; ?>">
									  	</div>
			  		  				</div>
			  		  			</div>			
	  		  				</div>
	  		  			</div>
	  				</div>
	    		</div>
		  	    <div class="row" style="border-top: 2px solid purple;">
			  		<div class="col-8" style="border-right: 2px solid purple;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">6.&nbsp;PLACE OF DEATH<span style="color:purple;font-size:12px;margin:0;">(Name of Hospital/Clinic/Institution/House No.,St.,Barangay, City/Municipality, Province, Country)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="place_of_death" value="<?php echo $row['place_of_death'] ?? ''; ?>">
					  	</div>
			  		</div>
			  		<div class="col-4">
			  		  	<h6 style="padding-top:2px; font-size:14px;">7.&nbsp;CIVIL STATUS<span style="color:purple;font-size:12px;margin:0;">(Single/Married/Widow/<br>&emsp;&emsp;Widower/Annulled/Divorced)</span></h6>
			  		  	<div class="input-group">
							<select class="form-control form-control-sm" name="civil_status">
								<option selected style="display: none;"><?php echo $row['civil_status'] ?? ''; ?></option>
								<option value="SINGLE">SINGLE</option>
								<option value="MARRIED">MARRIED</option>
								<option value="WIDOW">WIDOW</option>
								<option value="WIDOWER">WIDOWER</option>
								<option value="ANNULLED">ANNULLED</option>
								<option value="DIVORCED">DIVORCED</option>
							</select>
					  	</div>
			  		</div>
			  	</div>
			    <div class="row">
			  		<div class="col-3" style="border-top: 2px solid purple;border-right: 2px solid purple;">
			  		  	<h6 style="font-size: 14px;">8.&nbsp;RELIGION/RELIGIOUS SECT</h6>
	  					<div class="input-group">
					    	<select class="form-control form-control-sm text-uppercase" name="religion">
					    	<option selected style="display: none;"><?php echo $row['religion'] ?? ''; ?></option>
							<?php 
									$sqlp = "SELECT * from tblreligious";
									$resultp = $connx->query($sqlp);
									if($resultp) {
										while ($rowr = $resultp->fetch_assoc()) {
											echo "<option value='" . $rowr['relsec'] . "'>" . $rowr['relsec'] . "</option>";
										}
									}
						    ?>
							</select>
					  	</div>
			  		</div>
			  		<div class="col-2" style="border-top: 2px solid purple;border-right: 2px solid purple;">
			  		  	<h6 style="padding-top:2px;font-size: 14px;">9.&nbsp;CITIZENSHIP</h6>
	  		  			<div class="input-group">
					    	<input type="text" list='citizenship' class="form-control form-control-sm" name="citizenship" value="<?php echo $row['citizenship'] ?? ''; ?>" onkeypress="return isTextKey(event)">
							<datalist id="citizenship">
							<?php
									$sqlp = "SELECT * from tblcitizen";
									$resultp = $connx->query($sqlp);
									if($resultp) {
										while ($rowc = $resultp->fetch_assoc()) {
											echo "<option value='" . $rowc['citiz'] . "'>" . $rowc['citiz'] . "</option>";
										}
									}
							?>
							</datalist>
					  	</div>
			  		</div>
			  		<div class="col-7" style="border-top: 2px solid purple;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">10.&nbsp;RESIDENCE <span style="color:purple;font-size:10.5px;margin:0;">(Name of Hospital/Clinic/Institution/House No.,St.,Barangay, City/Municipality, Province, Country)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="residence" value="<?php echo $row['residence'] ?? ''; ?>">
					  	</div>
			  		</div>
		  	    </div>
		  	    <div class="row">
			  		<div class="col-2" style="border-top: 2px solid purple;border-right: 2px solid purple;">
			  		  	<h6 style="font-size: 14px;">11.&nbsp;OCCUPATION</h6>
	  					<div class="input-group">
					    	<input type="text" class="form-control form-control-sm text-uppercase" list='occupations' name="occupation" value="<?php echo $row['occupation'] ?? ''; ?>" onkeypress="return isTextKey(event)">
							<datalist id="occupations">
							<?php 
									$sqlp = "SELECT * from tbloccupation";
									$resultp = $connx->query($sqlp);
									if($resultp) {
										while ($rowo = $resultp->fetch_assoc()) {
											echo "<option value='" . $rowo['occupation'] . "'>" . $rowo['occupation'] . "</option>";
										}
									}
						    ?>
							</datalist>
					  	</div>
			  		</div>
			  		<div class="col-5" style="border-top: 2px solid purple;border-right: 2px solid purple;">
			  		  	<h6 style="padding-top:2px;font-size: 14px;">12.&nbsp;NAME OF FATHER <span style="color:purple;font-size:12px;margin:0;">(First, Middle, Last)</span></h6>
	  		  			<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="parent_father_name" id="father_name" value="<?php echo $row['parent_father_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-5" style="border-top: 2px solid purple;">
			  		  	<h6 style="padding-top:2px;font-size: 14px;">13.&nbsp;NAME OF MOTHER <span style="color:purple;font-size:12px;margin:0;">(First, Middle, Last)</span></h6>
	  		  			<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="parent_mother_name" id="mother_name" value="<?php echo $row['parent_mother_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
		  	    </div>
			</div>
		</div>
   		<div class="row">
  			<div class="col" style="border: 2px solid purple; border-top: none;">
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:5px;line-height: 0.9; font-size:12px;" align="center"><span style="font-weight: bold;font-size:23px;">MEDICAL CERTIFICATE</span><br>(For ages 0 to 7 days, accomplish items 14-19a at the back)</h6>
	  				</div>
	  			</div>
  				<div class="row" style="border-top: 1px solid purple;">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px;font-size: 14px;">19b.&nbsp;CAUSE OF DEATH <span style="font-size:12px">(If the deceased is aged 8 days and over)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Interval Between Onset and Death</span></h6>
	  		  			<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;I. Immediate cause&emsp;&emsp;: a
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 45%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="immediate_cause" value="<?php echo $row['immediate_cause'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 33%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="immediate_interval" value="<?php echo $row['immediate_interval'] ?? ''; ?>">
						</div>
						&emsp;&emsp;&nbsp;&nbsp;Antecedent cause&emsp;&nbsp;&nbsp;&nbsp;: b
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="antecedent_cause" value="<?php echo $row['antecedent_cause'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 33%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="antecedent_interval" value="<?php echo $row['antecedent_interval'] ?? ''; ?>">
						</div>
						&emsp;&emsp;&nbsp;&nbsp;Underlying cause&emsp;&nbsp;&nbsp;&nbsp;&nbsp;: c
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="underlying_cause" value="<?php echo $row['underlying_cause'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 33%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="underlying_interval" value="<?php echo $row['underlying_interval'] ?? ''; ?>">
						</div>
						&emsp;&emsp;II. Other significant conditions contributing to death:
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 60%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="other_condition_death" value="<?php echo $row['other_condition_death'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						</h6>
	  				</div>
	    		</div>
			    <div class="row" style="border-top: 2px solid purple;">
			  		<div class="col">
			  		  	<h6 style="padding-top:2px; font-size:14px;">19c.&nbsp;MATERNAL CONDITION <span style="font-size:12px;">(If the deceased is female age 15-49 years old)</span></h6>&emsp;
			  			<?php $mat = $row['maternal_condition'] ?? ''; ?>
			  			<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" id="not_labour" name="maternal_condition" value="pregnant, not in labour" <?php if($mat == "pregnant, not in labour") echo "checked"; ?>>
							<label class="custom-control-label" for="not_labour" style="font-size: 14px;">&nbsp;a. pregnant, <br>&emsp;&nbsp;not in labour</label>
						</div>&emsp;
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" id="in_labour" name="maternal_condition" value="pregnant, in labour" <?php if($mat == "pregnant, in labour") echo "checked"; ?>>
							<label class="custom-control-label" for="in_labour" style="font-size: 14px;">&nbsp;b. pregnant, in <br>&emsp;&nbsp;labour</label>
						</div>&emsp;
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" id="less_than_42" name="maternal_condition" value="less than 42 days after delivery" <?php if($mat == "less than 42 days after delivery") echo "checked"; ?>>
							<label class="custom-control-label" for="less_than_42" style="font-size: 14px;">&nbsp;c. less than 42 days after <br>&emsp;&nbsp;delivery</label>
						</div>&emsp;
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" id="42_days" name="maternal_condition" value="42 days to 1 year after delivery" <?php if($mat == "42 days to 1 year after delivery") echo "checked"; ?>>
							<label class="custom-control-label" for="42_days" style="font-size: 14px;">&nbsp;d. 42 days to 1 year after <br>&emsp;&nbsp;delivery</label>
						</div>&emsp;
						<div class="custom-control custom-checkbox custom-control-inline">
							<input type="checkbox" class="custom-control-input" id="none_choices" name="maternal_condition" value="None of the choices" <?php if($mat == "None of the choices") echo "checked"; ?>>
							<label class="custom-control-label" for="none_choices" style="font-size: 14px;">&nbsp;e. None of the <br>&emsp;&nbsp;choices</label>
						</div>
					</div>
			  	</div>
			  	<div class="row" style="border-top: 2px solid purple;">
	  				<div class="col-10" style="border-right: 2px solid purple;">
	  		  			<h6 style="padding-top:2px; font-size:14px;">19d.&nbsp;DEATH BY EXTERNAL CAUSES</h6>
	  		  			<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;a. Manner of death <span style="font-size:12px;color:purple;">(Homicide, Suicide, accident, Legal intervention, etc.)</span>
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 41%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="death_manner" value="<?php echo $row['death_manner'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						&emsp;&emsp;b. Place of Occurrence of External Cause <span style="font-size:12px;color:purple;">(e.g. home, farm, factory, street, sea, etc.)</span>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 32%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="place_external_cause" value="<?php echo $row['place_external_cause'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						</h6>
	  				</div>
	  				<div class="col-2">
	  					<h6 style="padding-top:2px; font-size:14px;">20.&nbsp;AUTOPSY<br> <span style="font-size:12px;color:purple;">&emsp;&emsp;&emsp;&emsp;(Yes/No)</span></h6>
	  					<div class="input-group" style="padding-top: 13px;">
	  						<select name="autopsy" class="form-control form-control-sm">
							    <option selected style="display: none;"><?php echo $row['autopsy'] ?? ''; ?></option>
							    <option value="Yes" style="font-size: 15px;">Yes</option>
							    <option value="No" style="font-size: 15px;">No</option>
							</select>
					  	</div>
	  				</div>
	  			</div>
	  			<div class="row" style="border-top: 2px solid purple;">
	  				<div class="col-8" style="border-right: 2px solid purple;">
	  		  			<h6 style="padding-top:2px; font-size:14px;">21a.&nbsp;ATTENDANT</h6>
	  		  			<?php $att = $row['attendant'] ?? ''; ?>
	  		  			<div class="custom-control custom-checkbox custom-control-inline" style="margin-right:3px;">
							<input type="checkbox" class="custom-control-input" id="physician" name="attendant" value="Private Physician" <?php if($att == "Private Physician") echo "checked"; ?>>
							<label class="custom-control-label" for="physician" style="font-size: 13px;">&nbsp;1 Private<br>&emsp;Physician</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right:3px;">
							<input type="checkbox" class="custom-control-input" id="health" name="attendant" value="Public Health Officer" <?php if($att == "Public Health Officer") echo "checked"; ?>>
							<label class="custom-control-label" for="health" style="font-size: 13px;">&nbsp;2 Public Health<br>&emsp;Officer</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right:3px;">
							<input type="checkbox" class="custom-control-input" id="hospital" name="attendant" value="Hospital Authority" <?php if($att == "Hospital Authority") echo "checked"; ?>>
							<label class="custom-control-label" for="hospital" style="font-size: 13px;">&nbsp;3 Hospital<br>&emsp;Authority</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right:3px;">
							<input type="checkbox" class="custom-control-input" id="none" name="attendant" value="None" <?php if($att == "None") echo "checked"; ?>>
							<label class="custom-control-label" for="none" style="font-size: 13px;">&nbsp;4 None</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right:0;">
							<input type="checkbox" class="custom-control-input" id="others" <?php if(!empty($row['attendant5'])) echo "checked"; ?>>
							<label class="custom-control-label" for="others" style="font-size: 13px;">&nbsp;5 Others <br>&emsp;(Specify)</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="width:20%;margin-right:0;padding-left:0;">
							<input type="text" class="form-control form-control-sm"  id="otherstxt" name="attendant5" value="<?php echo $row['attendant5'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
	  				</div>
	  				<div class="col-4">
	  					<h6 style="padding-top:2px; font-size:12px;">21b.&nbsp;If attended, state duration<span style="font-size:11px;color:purple;">(mm/dd/yy)</span></h6>
	  					<h6 style="font-size:12px;">From
	  					<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0" style="width:40%;">
							<input type="date" class="form-control form-control-sm text-lowercase pr-0" style="font-size: 10px;font-weight:bold;" name="date_from" value="<?php echo $row['date_from'] ?? ''; ?>">
						</div>
						To
						<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0" style="width:41%;">
							<input type="date" class="form-control form-control-sm text-lowercase pr-0" style="font-size: 10px;font-weight:bold;" name="date_to" value="<?php echo $row['date_to'] ?? ''; ?>">
						</div>
						</h6>
	  				</div>
	  			</div>
		  	</div>
		</div>
 		<div class="row" style="border: 2px solid purple;border-top:none;">
  			<div class="col">
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px; font-size:14px;">22. CERTIFICATION OF DEATH</h6>
	  		  			<h6 style="padding:0; font-size:14px;">&emsp;&emsp;&emsp;I hereby certify that the foregoing particulars are correct as near as same can be ascertained and I further certify that I
	  		  			<?php $cert = $row['certify_type'] ?? ''; ?>
	  		  			<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
							<input type="checkbox" class="custom-control-input" name="certify_type" id="have_attend" value="attended" <?php if($cert == "attended") echo "checked"; ?>>
							<label class="custom-control-label" for="have_attend" style="font-size: 14px;">have attended/</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
							<input type="checkbox" class="custom-control-input" name="certify_type" id="not_attend" value="not attended" <?php if($cert == "not attended") echo "checked"; ?>>
							<label class="custom-control-label" for="not_attend" style="font-size: 14px;">have not attended</label>
						</div>
						the deceased and the death occurred at
	  		  			<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0">
							<input type="time" class="form-control form-control-sm" name="death_time" value="<?php echo $row['death_time'] ?? ''; ?>" style="text-align:center;">
						</div>
					     am/pm on the date of death specified above.   
						</h6>
	  				</div>
	  			</div>
  				<div class="row">
	  				<div class="col-7" style="padding-bottom: 2px;">
	  		  			<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: purple;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="attendant_name" value="<?php echo $row['attendant_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="attendant_position" value="<?php echo $row['attendant_position'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="attendant_address" value="<?php echo $row['attendant_address'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0;width:45%;margin-right:0;">
			    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: purple;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 54%;margin-right: 0;">
							<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
							<input type="date" class="form-control form-control-sm" name="attendant_date" id="attendant_date" value="<?php echo $row['attendant_date'] ?? ''; ?>">
						</div>
	  				</div>
			  		<div class="col-5" style="border: 1px solid purple;border-right:none;margin-bottom:2px;">
			  		  	<h6>REVIEWED BY:</h6><br>
			    		<input type="text" class="form-control form-control-sm" name="reviewed_name" value="<?php echo $row['reviewed_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;" align="center">(Signature Over Printed Name of Health Officer)</h6>
						<div class="input-group" style="padding-top: 10px;">
					    	<input type="date" class="form-control form-control-sm text-center" id="reviewed_date" name="reviewed_date" value="<?php echo $row['reviewed_date'] ?? ''; ?>">
					  	</div>
					    <h6 style="font-size:14px;" align="center">Date</h6>
			  		</div>
	    		</div>
	    		<div class="row" style="border-top: 2px solid purple;">
			  		<div class="col-4" style="border-right: 2px solid purple;">
			  		  	<h6 style="font-size: 14px;">23.&nbsp;CORPSE DISPOSAL<br><span style="color:purple;font-size:10.5px;margin:0;">(Burial, Cremation, if others, specify)</span></h6>
	  					<div class="input-group" style="padding-top:5px;">
					    	<input type="text" class="form-control form-control-sm" name="corpse_disposal" value="<?php echo $row['corpse_disposition'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-4" style="border-right: 2px solid purple;">
			  		  	<h6 style="padding-top:2px;font-size: 14px;">24a.&nbsp;BURIAL/CREMATION PERMIT</h6>
	  		  			<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Number&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="burial_no" value="<?php echo $row['burial_no'] ?? ''; ?>">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date Issued&nbsp;</span>
			  				</div>
			    			<input type="date" class="form-control form-control-sm" name="burial_issued_date" value="<?php echo $row['burial_issued_date'] ?? ''; ?>">
						</div>
			  		</div>
			  		<div class="col-4">
			  		  	<h6 style="padding-top:2px; font-size:14px;">24b.&nbsp;TRANSFER PERMIT</h6>
			  		  	<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Number&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="transfer_no" value="<?php echo $row['transfer_no'] ?? ''; ?>">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date Issued&nbsp;</span>
			  				</div>
			    			<input type="date" class="form-control form-control-sm" name="transfer_issued_date" value="<?php echo $row['transfer_issued_date'] ?? ''; ?>">
						</div>
			  		</div>
		  	    </div>
		  	    <div class="row" style="border-top: 2px solid purple;">
			  		<div class="col">
			  		  	<h6 style="font-size: 14px;">25.&nbsp;NAME AND ADDRESS OF CEMETERY OR CREMATORY</h6>
							<div class="input-group" style="padding-top:5px;">
								<input type="text" class="form-control form-control-sm" name="cemetery" placeholder="Name of Cemetery/Crematory" value="<?php echo $cemetery_name ?? ''; ?>" onkeypress="return isTextKey(event)">
								<input type="text" class="form-control form-control-sm" name="municipalityCemetery" placeholder="Municipality" value="<?php echo $cemetery_mun ?? ''; ?>" onkeypress="return isTextKey(event)">
								<input type="text" class="form-control form-control-sm" name="provinceCemetery" placeholder="Province" value="<?php echo $cemetery_prov ?? ''; ?>" onkeypress="return isTextKey(event)">
							</div>
			  		</div>
		  	    </div>
		  	</div>
		</div>	
 		<div class="row" style="border: 2px solid purple;border-top:none;">
  			<div class="col">
  				<div class="row">
	  				<div class="col-6" style="border-right: 2px solid purple;">
	  					<h6 style="padding-top:2px; font-size:14px;">26. CERTIFICATION OF INFORMANT</h6>
	  					<h6 style="padding:0; font-size:14px; text-indent:4em;">I hereby certify that all information supplied are true and correct to my own knowledge and belief.</h6>
	  		  			<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: purple;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="informant_name" value="<?php echo $row['informant_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Relationship to the Deceased&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="rel_death" value="<?php echo $row['rel_death'] ?? ''; ?>" onkeypress="return isTextKey(event)" >
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="informant_address" value="<?php echo $row['informant_address'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="date" class="form-control form-control-sm" name="informant_date" id="informant_date" value="<?php echo $row['informant_date'] ?? ''; ?>">
						</div>
	  				</div>
			  		<div class="col-6">
			  		  	<h6 style="padding-top:2px; font-size:14px;">27. PREPARED BY</h6>
	  					<br>
	  		  			<div class="input-group mt-3">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: purple;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="prepared_name" value="<?php echo $row['prepared_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="prepared_position" value="<?php echo $row['prepared_position'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="date" class="form-control form-control-sm" id="prepared_date" name="prepared_date" value="<?php echo $row['prepared_date'] ?? ''; ?>">
						</div>
			  		</div>
	    		</div>
		  	</div>
		</div>
 		<div class="row" style="border: 2px solid purple;border-top:none;">
  			<div class="col">
  				<div class="row">
	  				<div class="col-6" style="border-right: 2px solid purple;">
	  					<h6 style="padding-top:2px; font-size:14px;">28. RECEIVED BY</h6>
	  		  			<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: purple;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="received_name" value="<?php echo $row['received_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="received_position" value="<?php echo $row['received_position'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="date" class="form-control form-control-sm" id="received_date" name="received_date" value="<?php echo $row['received_date'] ?? ''; ?>" >
						</div>
	  				</div>
			  		<div class="col-6">
			  		  	<h6 style="padding-top:2px; font-size:14px;">29. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
	  		  			<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: purple;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="civil_name" value="<?php echo $row['civil_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="civil_position" value="<?php echo $row['civil_position'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="date" class="form-control form-control-sm" id="civil_date" name="civil_date" value="<?php echo $row['civil_date'] ?? ''; ?>" >
						</div>
			  		</div>
	    		</div>
		  	</div>
		</div>
 		<div class="row" style="border: 2px solid purple;border-top:none;">
  			<div class="col">
  				<div class="row">
	  				<div class="col">
	  					<h6 style="padding-top:2px; font-weight:bold;">REMARKS/ANNOTATIONS (For LCRO/OCRG Use Only)</h6>
	  					<?php
		  					$remarks = $row['remarks'] ?? '';
   							$remarks = preg_replace("#<br>#", "", $remarks); 
						?>
	  					<textarea style="width: 100%; height: 80px; font-size: 13px;" id="r"><?php echo $remarks; ?></textarea>
			  			<textarea style="width: 100%; height: 80px; font-size: 13px; display: none;" name="remarks" id="re"><?php echo $row['remarks'] ?? ''; ?></textarea>
			  		</div>
	    		</div>
	    		<script>
	    			$(document).ready(function(){
	    				$("#r").keyup(function(){
	    					var r = $("#r").val();
	    					r = r.replace(/  /g, "[sp][sp]");
	    					r = r.replace(/\n/g, "[nl]");
	    					$("#re").val(r);
	    				});
	    			});
	    		</script>
		  	</div>
		</div>
 		<div class="row" style="border: 2px solid purple;border-top:none;">
  			<div class="col">
  				<div class="row">
	  				<div class="col">
	  					<h6 style="padding-top:2px; font-size: 14px; font-weight:bold;">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
	  					<h6 style="margin-bottom: 0;">5&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;8&emsp;&emsp;&emsp;&emsp;&emsp;9&emsp;&emsp;&emsp;&emsp;&nbsp;10&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;11&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;19a(a)/19b&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;19a(c)</h6>
	  					<div class="flex-container">
						  	<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
						  	<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
						  	<div style="margin-right: 15px;"><input type="text" class="form-control form-control-sm" disabled></div>
						  	<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="margin-right: 15px;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div> 
							<div style="margin-right: 15px;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div> 
							<div><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div> 
							<div><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="margin-right: 15px;"><input type="text" class="form-control form-control-sm" disabled></div> 
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="margin-right: 15px;"><input type="text" class="form-control form-control-sm" disabled></div> 
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div> 
							<div style="margin-right: 15px;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div> 
							<div style="border-right:none;"><input type="text" class="form-control form-control-sm" disabled></div>
							<div><input type="text" class="form-control form-control-sm" disabled></div>  
						</div>
			  		</div>
	    		</div>
		  	</div>
		</div>
 	</div>
</div>