<datalist id="province_list">
<?php 
	require 'mycon.php';
	$sqlp = "SELECT * from tblprovinces";
	$resultp = $connx->query($sqlp);
	
	
	while ($row = $resultp->fetch_assoc()) {
	echo "<option value='" . $row['province'] . "'>" . $row['province'] . "</option>";
	}				
?>
</datalist>

<!-- Municipality list -->
<datalist id="municipality_list">
<?php 
	require 'mycon.php';
	$sqlp = "SELECT * from tblmunicipals";
	$resultp = $connx->query($sqlp);
	while ($row = $resultp->fetch_assoc()) {
	echo "<option value='" . $row['municipals'] . "'>" . $row['municipals'] . "</option>";
	}
			
?>
</datalist>
<?php
				require_once 'login_db_death.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				if ($conn->connect_error) die($conn->connect_error);

				$reg_no=null;
				if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

				$sql = "SELECT * FROM registration_tbl NATURAL JOIN (person_tbl NATURAL JOIN death_cause_eight_days NATURAL JOIN att_rev_tbl NATURAL JOIN corpse_disposal_tbl NATURAL JOIN inf_pre_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN death_cause_zero_seven NATURAL JOIN autopsy_tbl NATURAL JOIN embalmer_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
				$result = $conn->query($sql);  
				if (!$result) die ("Database access failed: " . $conn->error);

				if ($result->num_rows > 0) {
	    			while($row = $result->fetch_assoc()) { 
			?>
<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
	<!--birth form-->
		<div class="form" style="padding:0 15px 0 15px;">
	 			<!-- Header -->
	  			<div class="row"><!--grid of header-->
		  			<div class="col-9" style="border: 2px solid purple;">
					  	<p class="m1">Municipal Form No. 103</p>
					  	<p class="m1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span align="center" class="m2" style="font-size: 15px;">Republic of the Philippines</span></p>
					  	<p align="center" class="m2" style="font-size: 16px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
					  	<p align="center" class="m2" style="font-size: 30px; font-weight: bold;">CERTIFICATE OF DEATH</p>
		  			</div>
		  			<div class="col-3" id="book" style="border: 2px solid purple; border-left:none; border-bottom:none;">
		     			<div class="form-group">
							<label id="ltxt">Book No.</label>
							<input type="text" class="bookNo form-control form-control-sm" id="txt" id="bookno" name="book_no" value="<?php echo $row['book_no']; ?>">

							<label id="ltxt">Page No.</label>
							<input type="text" class="pageNo form-control form-control-sm" id="txt" name="page_no" value="<?php echo $row['page_no']; ?>">

							<input type="hidden" name="time" id="hrs" value="">
							<input type="hidden" name="date" id="date" value="">
							<input type="hidden" name="emp_name" id="emp_name" value="<?php echo $_SESSION['lastname']; ?>">
						</div>
		  			</div>
	  			</div><!--close row-->
	  		<!-- Registry Info -->
			  	<div class="row"><!--row of city-->
				  	<div class="col-9" style="border: 2px solid purple; border-top: none; padding-left:0;">
				  		<div class="input-group mt-1">
					  		<div class="input-group-prepend">
					      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;Province&nbsp;&emsp;&emsp;&emsp;&emsp;</span>
					  		</div>
							  <?php  ?>
					    	<input type="text" class="form-control form-control-sm" name="provinces" value="<?php echo $row['province']; ?>" required>
						</div>
				    	<div class="input-group mt-1">
					  		<div class="input-group-prepend">
					      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;City/Municipality&nbsp;&nbsp;</span>
					 		</div>
					    	<input type="text" class="form-control form-control-sm" name="municipal" value="<?php echo $row['municipal']; ?>" required>
						</div>
				  	</div>
				  	<div class="col-3" id="book" style="border: 2px solid purple;border-left:none; border-top: none;">
				    	<div class="form-group">
					  		<label id="ltxt">Registry No.</label>
					  		<input type="text" class="regNo form-control form-control-sm" name="registry_no" id="txt" value="<?php echo $row['registry_no']; ?>">
					  		<div id="error"></div>
						</div>
				  	</div>
			  	</div><!--close row-->
			<!-- Person Info -->
	  			<div class="row">
		  			<div class="col" style="border: 2px solid purple; border-top: none;">
			  			<div class="row">
			  				<div class="col-1">
			  		  			<h6 style="padding-top:2px; font-size:14px;">1.&nbsp;NAME</h6>
			  				</div>
			  				<div class="col-3">
			  		  			<h6 align="center"><span style="color:purple;font-size:12px;">(First)</span></h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="person_fname" value="<?php echo $row['first_name']; ?>">
							  	</div>
			  				</div>
					  		<div class="col-3">
					  		  	<h6 align="center"><span style="color:purple;font-size:12px;">(Middle)</span></h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="person_mname" value="<?php echo $row['middle_name']; ?>">
							  	</div>
					  		</div>
					  		<div class="col-3">
							  	<h6 align="center"><span style="color:purple;font-size:12px;">(Last)</span></h6>
			  		  			<div class="input-group">
					    		<input type="text" class="form-control form-control-sm" name="person_lname" value="<?php echo $row['last_name']; ?>">
					  			</div>
					  		</div>
					  		<div class="col-2" style="border-left: 2px solid purple;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">2.&nbsp;SEX <span style="color:purple;font-size:12px;">(Male/Female)</span></h6>
			  		  			<div class="input-group input-group-sm">
			  		  				<select name="sex" class="form-control form-control-sm">
									    <option style="display: none;"><?php echo $row['sex']; ?></option>
									    <option value="Male" style="font-size: 15px;">Male</option>
									    <option value="Female" style="font-size: 15px;">Female</option>
									</select>
							  	</div>
			  				</div>
			  			</div><!--close row-->
		  				<div class="row" style="border-top: 2px solid purple;">
			  				<div class="col-3" style="border-right: 2px solid purple;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">3.&nbsp;DATE OF DEATH <span style="color:purple;font-size:10.2px;">(Day, Month, Year)</span></h6>
			  		  			<div class="input-group" style="padding-top: 19px;">
							    	<input type="text" class="form-control form-control-sm" name="date_death" value="<?php echo $row['date_death']; ?>">
							  	</div>
			  				</div>
			  				<div class="col-3" style="border-right: 2px solid purple;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">4.&nbsp;DATE OF BIRTH <span style="color:purple;font-size:10.2px;">(Day, Month, Year)</span></h6>
			  		  			<div class="input-group" style="padding-top: 19px;">
							    	<input type="text" class="form-control form-control-sm" name="date_birth" value="<?php echo $row['date_birth']; ?>">
							  	</div>
			  				</div>
			  				<div class="col-6">
			  		  			<h6 style="margin:0;font-size:14px;">5.&nbsp;AGE AT THE TIME OF DEATH <span style="color:purple;font-size:11px;">(Fill-up below accdg. to age category)</span></h6>
			  		  			<div class="row" style="border-top: 1px solid purple;">
			  		  				<?php 
									$age_type =  $row['age_type'];
									if($age_type == 'yrs'){ 
										include 'age_year.php';
									}else if($age_type == 'under yrs'){
										include 'age_month.php';
									}else if($age_type == 'under hrs'){
										include 'age_hrs.php';
									}else{ ?>
									<div class="col-4" style="border-right: 1px solid purple;">
			  		  					<h6 style="margin:0;font-size:12px;">a.&nbsp;IF 1 YEAR OR ABOVE</h6>
			  		  					<div class="row" style="border-top: 1px solid purple;">
					  		  				<div class="col">
					  		  					<h6 style="margin:0;font-size:10px;" align="center">[2]Completed year</h6>
					  		  					<div class="input-group">
											    	<input type="text" class="form-control form-control-sm" name="age_death"  >
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
											    	<input type="text" class="form-control form-control-sm" name="age_one_month"  >
											  	</div>
					  		  				</div>
					  		  				<div class="col-6">
					  		  					<h6 style="margin:0;font-size:10px;" align="center">[0]Days</h6>
					  		  					<div class="input-group">
											    	<input type="text" class="form-control form-control-sm" name="age_one_day"  >
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
											    	<input type="text" class="form-control form-control-sm" name="age_hrs_hrs"  >
											  	</div>
					  		  				</div>
					  		  				<div class="col-6">
					  		  					<h6 style="margin:0;font-size:10px;" align="center">Min/Sec</h6>
					  		  					<div class="input-group">
											    	<input type="text" class="form-control form-control-sm" name="age_hrs_min"  >
											  	</div>
					  		  				</div>
					  		  			</div>
					  		  		</div>	
									<?php } ?>
			  		  			</div><!--close row-->
			  		  				
			  				</div>
			    		</div><!--close row-->
				  	    <div class="row" style="border-top: 2px solid purple;">
					  		<div class="col-8" style="border-right: 2px solid purple;">
					  		  	<h6 style="padding-top:2px; font-size:14px;">6.&nbsp;PLACE OF DEATH<span style="color:purple;font-size:12px;margin:0;">(Name of Hospital/Clinic/Institution/House No.,St.,Barangay, City/Municipality, Province)</span></h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="death_place" value="<?php echo $row['place_death']; ?>">
							  	</div>
					  		</div>
					  		<div class="col-4">
					  		  	<h6 style="padding-top:2px; font-size:14px;">7.&nbsp;CIVIL STATUS<span style="color:purple;font-size:12px;margin:0;">(Single/Married/Widow/<br>&emsp;&emsp;Widower/Annulled/Divorced)</span></h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="civil_status" value="<?php echo $row['civil_status']; ?>">
							  	</div>
					  		</div>
					  	</div><!--close row-->
					    <div class="row">
					  		<div class="col-3" style="border-top: 2px solid purple;border-right: 2px solid purple;">
					  		  	<h6 style="font-size: 14px;">8.&nbsp;RELIGION/RELIGIOUS SECT</h6>
			  					<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="religion" value="<?php echo $row['religion']; ?>">
							  	</div>
					  		</div>
					  		<div class="col-2" style="border-top: 2px solid purple;border-right: 2px solid purple;">
					  		  	<h6 style="padding-top:2px;font-size: 14px;">9.&nbsp;CITIZENSHIP</h6>
			  		  			<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="citizen" value="<?php echo $row['citizen']; ?>">
							  	</div>
					  		</div>
					  		<div class="col-7" style="border-top: 2px solid purple;">
					  		  	<h6 style="padding-top:2px; font-size:14px;">10.&nbsp;RESIDENCE <span style="color:purple;font-size:10.5px;margin:0;">(Name of Hospital/Clinic/Institution/House No.,St.,Barangay, City/Municipality, Province)</span></h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="residence" value="<?php echo $row['residence']; ?>">
							  	</div>
					  		</div>
				  	    </div><!--close row-->
				  	    <div class="row">
					  		<div class="col-2" style="border-top: 2px solid purple;border-right: 2px solid purple;">
					  		  	<h6 style="font-size: 14px;">11.&nbsp;OCCUPATION</h6>
			  					<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="occupation" value="<?php echo $row['occupation']; ?>">
							  	</div>
					  		</div>
					  		<div class="col-5" style="border-top: 2px solid purple;border-right: 2px solid purple;">
					  		  	<h6 style="padding-top:2px;font-size: 14px;">12.&nbsp;NAME OF FATHER <span style="color:purple;font-size:12px;margin:0;">(First, Middle, Last)</span></h6>
			  		  			<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="father_name" value="<?php echo $row['father_name']; ?>">
							  	</div>
					  		</div>
					  		<div class="col-5" style="border-top: 2px solid purple;">
					  		  	<h6 style="padding-top:2px;font-size: 14px;">13.&nbsp;NAME OF MOTHER <span style="color:purple;font-size:12px;margin:0;">(First, Middle, Last)</span></h6>
			  		  			<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" name="mother_name" value="<?php echo $row['mother_name']; ?>">
							  	</div>
					  		</div>
				  	    </div><!--close row-->

	 				</div><!--close col-->
    			</div><!--close row-->
    		<!-- Med Cerf Info -->
    			<div class="row">
		  			<div class="col" style="border: 2px solid purple; border-top: none;">
			  			<div class="row">
			  				<div class="col">
			  		  			<h6 style="padding-top:5px;line-height: 0.9; font-size:12px;" align="center"><span style="font-weight: bold;font-size:23px;">MEDICAL CERTIFICATE</span><br>
			  		  			(For ages 0 to 7 days, accomplish items 14-19a at the back)
			  		  			</h6>
			  				</div>
			  			</div><!--close row-->
		  				<div class="row" style="border-top: 1px solid purple;">
			  				<div class="col">
			  		  			<h6 style="padding-top:2px;font-size: 14px;">19b.&nbsp;CAUSE OF DEATH <span style="font-size:12px">(If the deceased is aged 8 days and over)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Interval Between Onset and Death</span></h6>

			  		  			<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;I. Immediate cause&emsp;&emsp;: a
								<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 45%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="immediate_cause" value="<?php echo $row['immediate_cause']; ?>">
								</div>
								<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 33%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="immediate_interval" value="<?php echo $row['immediate_interval']; ?>">
								</div>
								&emsp;&emsp;&nbsp;&nbsp;Antecedent cause&emsp;&nbsp;&nbsp;&nbsp;: b
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="antecedent_cause" value="<?php echo $row['antecedent_cause']; ?>">
								</div>
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 33%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="antecedent_interval" value="<?php echo $row['antecedent_interval']; ?>">
								</div>
								&emsp;&emsp;&nbsp;&nbsp;Underlying cause&emsp;&nbsp;&nbsp;&nbsp;&nbsp;: c
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="underlying_cause" value="<?php echo $row['underlying_cause']; ?>">
								</div>
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 33%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="underlying_interval" value="<?php echo $row['underlying_interval']; ?>">
								</div>
								&emsp;&emsp;II. Other significant conditions contributing to death:
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 60%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="other_condition_death" value="<?php echo $row['other_condition_death']; ?>">
								</div>
								</h6>
			  				</div>
			    		</div><!--close row-->
					    <div class="row" style="border-top: 2px solid purple;">
					  		<div class="col">
					  		  	<h6 style="padding-top:2px; font-size:14px;">19c.&nbsp;MATERNAL CONDITION <span style="font-size:12px;">(If the deceased is female age 15-49 years old)</span></h6>&emsp;
					  			<?php include'not_labour.php'; ?>&emsp;
								<?php include'labour.php'; ?>&emsp;
								<?php include'less_than_42.php'; ?>&emsp;
								<?php include'42_days.php'; ?>&emsp;
								<?php include'none_choices.php'; ?>
							</div>
					  	</div><!--close row-->
					  	<div class="row" style="border-top: 2px solid purple;">
			  				<div class="col-10" style="border-right: 2px solid purple;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">19d.&nbsp;DEATH BY EXTERNAL CAUSES</h6>

			  		  			<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;a. Manner of death <span style="font-size:12px;color:purple;">(Homicide, Suicide, accident, Legal intervention, etc.)</span>
								<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 41%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="death_manner" value="<?php echo $row['manner_of_death']; ?>">
								</div>
								&emsp;&emsp;b. Place of Occurrence of External Cause <span style="font-size:12px;color:purple;">(e.g. home, farm, factory, street, sea, etc.)</span>
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 32%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="place_external_cause" value="<?php echo $row['place_of_occurrence']; ?>">
								</div>
								</h6>
			  				</div>
			  				<div class="col-2">
			  					<h6 style="padding-top:2px; font-size:14px;">20.&nbsp;AUTOPSY<br> <span style="font-size:12px;color:purple;">&emsp;&emsp;&emsp;&emsp;(Yes/No)</span></h6>
			  					<div class="input-group" style="padding-top: 13px;">
			  						<select name="autopsy" class="form-control form-control-sm">
									    <option selected style="display: none;"><?php echo $row['autopsy']; ?></option>
									    <option value="Yes" style="font-size: 15px;">Yes</option>
									    <option value="No" style="font-size: 15px;">No</option>
									</select>
							  	</div>
			  				</div>
			  			</div><!--close row-->
			  			<div class="row" style="border-top: 2px solid purple;">
			  				<div class="col-8" style="border-right: 2px solid purple;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">21a.&nbsp;ATTENDANT</h6>
			  		  			<?php 
			  		  				$attendant = $row['attendant'];
									if($attendant == 'Private Physician'){
							  			include 'physician.php';
							  		}else if($attendant == 'Public Health Officer'){
							  			include 'health.php';
							  		}else if($attendant == 'Hospital Authority'){
							  			include 'hospital.php';
							  		}else if($attendant == 'None'){					
							  			include 'none.php';
							  		}else if(empty($attendant)){					
							  			include 'other.php';
							  		}else{
							  			include 'others.php';
							  		}
			  		  			?>
			  				</div>
			  				<div class="col-4">
			  					<h6 style="padding-top:2px; font-size:12px;">21b.&nbsp;If attended, state duration<span style="font-size:11px;color:purple;">(mm/dd/yy)</span></h6>
			  					<h6 style="font-size:12px;">From
			  					<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0" style="width:40%;">
									<input type="date" class="form-control form-control-sm text-lowercase pr-0" style="font-size: 10px;font-weight:bold;" name="date_from" value="<?php echo $row['date_from']; ?>">
								</div>
								To
								<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0" style="width:41%;">
									<input type="date" class="form-control form-control-sm text-lowercase pr-0" style="font-size: 10px;font-weight:bold;" name="date_to" value="<?php echo $row['date_to']; ?>">
								</div>
								</h6>
			  				</div>
			  			</div><!--close row-->

				  	</div><!--close row-->
	 			</div><!--close col-->
	 		<!-- Cerf Death -->
	 			<div class="row" style="border: 2px solid purple;border-top:none;">
		  			<div class="col">
			  			<div class="row">
			  				<div class="col">
			  		  			<h6 style="padding-top:2px; font-size:14px;">22. CERTIFICATION OF DEATH</h6>
			  		  			<h6 style="padding:0; font-size:14px;">&emsp;&emsp;&emsp;I hereby certify that the foregoing particulars are correct as near as same can be ascertained and I further certify that I
			  		  			<?php
			  		  				$certify_type = $row['certify_type'];
			  		  				if($certify_type == 'attended'){
			  		  			?>
			  		  			<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="have_attend" value="attended" checked="">
      								<label class="custom-control-label" for="have_attend" style="font-size: 14px;">have attended/</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="not_attend" value="not attended">
      								<label class="custom-control-label" for="not_attend" style="font-size: 14px;">have not attended</label>
								</div>
								<?php }else if($certify_type == 'not attended'){ ?>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="have_attend" value="attended">
      								<label class="custom-control-label" for="have_attend" style="font-size: 14px;">have attended/</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="not_attend" value="not attended" checked="">
      								<label class="custom-control-label" for="not_attend" style="font-size: 14px;">have not attended</label>
								</div>
								<?php }else{ ?>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="have_attend" value="attended">
      								<label class="custom-control-label" for="have_attend" style="font-size: 14px;">have attended/</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="not_attend"  value="not attended">
      								<label class="custom-control-label" for="not_attend" style="font-size: 14px;">have not attended</label>
								</div>
								<?php } ?>
								the deceased and the death occurred at
			  		  			<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0">
									<input type="time" class="form-control form-control-sm" name="death_time" value="<?php echo $row['death_time']; ?>" style="text-align:center;">
								</div>
								am/pm on the date of death specified above.
								</h6>
			  				</div>
			  			</div><!--close row-->
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
					    			<input type="text" class="form-control form-control-sm" name="attendant_name" value="<?php echo $row['attendant_name']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="attendant_position" value="<?php echo $row['attendant_position']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="attendant_address" value="<?php echo $row['attendant_address']; ?>">
								</div>
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0;width:45%;margin-right:0;">
					    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: purple;border-radius: 0;" name="signature" disabled>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 54%;margin-right: 0;">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
									<input type="text" class="form-control form-control-sm" name="attendant_date" id="attendant_date" value="<?php echo $row['attendant_date']; ?>">
								</div>
			  				</div>
					  		<div class="col-5" style="border: 1px solid purple;border-right:none;margin-bottom:2px;">
					  		  	<h6>REVIEWED BY:</h6><br>
					    		<input type="text" class="form-control form-control-sm" name="reviewed_name" style="text-align:center;" value="<?php echo $row['reviewed_name']; ?>">
								<h6 style="font-size:14px;" align="center">(Signature Over Printed Name of Health Officer)</h6>
								<div class="input-group" style="padding-top: 10px;">
							    	<input type="text" class="form-control form-control-sm text-center" id="reviewed_date" name="reviewed_date" style="text-align:center;" value="<?php echo $row['reviewed_date']; ?>">
							  	</div>
							    <h6 style="font-size:14px;" align="center">Date</h6>
					  		</div>
			    		</div><!--close row-->
			    		<div class="row" style="border-top: 2px solid purple;">
					  		<div class="col-4" style="border-right: 2px solid purple;">
					  		  	<h6 style="font-size: 14px;">23.&nbsp;CORPSE DISPOSAL<br><span style="color:purple;font-size:10.5px;margin:0;">(Burial, Cremation, if others, specify)</span></h6>
			  					<div class="input-group" style="padding-top:5px;">
							    	<input type="text" class="form-control form-control-sm" name="corpse_disposal" value="<?php echo $row['corpse_disposal_type']; ?>">
							  	</div>
					  		</div>
					  		<div class="col-4" style="border-right: 2px solid purple;">
					  		  	<h6 style="padding-top:2px;font-size: 14px;">24a.&nbsp;BURIAL/CREMATION PERMIT</h6>
			  		  			<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Number&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="burial_no" value="<?php echo $row['burial_permit_no']; ?>" >
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date Issued&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="burial_issued_date" value="<?php echo $row['burial_date_issued']; ?>">
								</div>
					  		</div>
					  		<div class="col-4">
					  		  	<h6 style="padding-top:2px; font-size:14px;">24b.&nbsp;TRANSFER PERMIT</h6>
					  		  	<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Number&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="transfer_no" value="<?php echo $row['transfer_permit_no']; ?>" >
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date Issued&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="transfer_issued_date" value="<?php echo $row['transfer_date_issued']; ?>">
								</div>
					  		</div>
				  	    </div><!--close row-->
				  	    <div class="row" style="border-top: 2px solid purple;">
					  		<div class="col">
					  		  	<h6 style="font-size: 14px;">25.&nbsp;NAME AND ADDRESS OF CEMETERY OR CREMATORY</h6>
					  		  	<div class="input-group" style="padding-top:5px;">
									<?php
									 $cemeteryAdd =  $row['cemetery_name_address'];
									 $cemeteryWords = explode(',', $cemeteryAdd);
									?>
							    	<input type="text" class="form-control form-control-sm" name="cemetery" value="<?php echo $cemeteryWords[0] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" name="municipalityCemetery" placeholder="Municipality" value="<?php echo $cemeteryWords[1] ?? ''; ?>" >
									<input type="text" class="form-control form-control-sm" name="provinceCemetery" value="<?php echo $cemeteryWords[2] ?? ''; ?>" placeholder="Province" >
							  	</div>
					  		</div>
				  	    </div><!--close row-->

				  	</div><!--close row-->
	 			</div><!--close col-->	
	 		<!-- Cerf Informant -->
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
					    			<input type="text" class="form-control form-control-sm" name="informant_name" value="<?php echo $row['informant_name']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Relationship to the Deceased&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="rel_death" value="<?php echo $row['rel_death']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="informant_address" value="<?php echo $row['informant_address']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="informant_date" id="informant_date" value="<?php echo $row['informant_date']; ?>">
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
					    			<input type="text" class="form-control form-control-sm" name="prepared_name" value="<?php echo $row['prepared_name']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="prepared_position" value="<?php echo $row['prepared_position']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" id="prepared_date" name="prepared_date" value="<?php echo $row['prepared_date']; ?>">
								</div>
					  		</div>
			    		</div><!--close row-->

				  	</div><!--close row-->
	 			</div><!--close col-->
	 		<!-- Received by -->
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
					    			<input type="text" class="form-control form-control-sm" name="received_name" value="<?php echo $row['received_name']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="received_position" value="<?php echo $row['received_position']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" id="received_date" name="received_date" value="<?php echo $row['received_date']; ?>">
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
					    			<input type="text" class="form-control form-control-sm" name="civil_name" value="<?php echo $row['civil_name']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="civil_position" value="<?php echo $row['civil_position']; ?>">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" id="civil_date" name="civil_date" value="<?php echo $row['civil_date']; ?>">
								</div>
					  		</div>
			    		</div><!--close row-->

				  	</div><!--close row-->
	 			</div><!--close col-->
	 		<!-- Remarks -->
	 			<div class="row" style="border: 2px solid purple;border-top:none;">
		  			<div class="col">
		  				<div class="row">
			  				<div class="col">
			  					<h6 style="padding-top:2px; font-weight:bold;">REMARKS/ANNOTATIONS (For LCRO/OCRG Use Only)</h6>
			  					<?php
				  					$remarks = $row['remarks'];
	      							$remarks = preg_replace("#<br>#", "", $remarks); 
      							?>
			  					<textarea style="width: 100%; height: 80px; font-size: 13px;" id="r"><?php echo $remarks; ?></textarea>
					  			<textarea style="width: 100%; height: 80px; font-size: 13px; display: none;" name="remarks" id="re"><?php echo $row['remarks']; ?></textarea>
					  		</div>
			    		</div><!--close row-->
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

				  	</div><!--close row-->
	 			</div><!--close col-->
	 		<!-- To be filled -->
	 			<div class="row" style="border: 2px solid purple;border-top:none;">
		  			<div class="col">
		  				<div class="row">
			  				<div class="col">
			  					<h6 style="padding-top:2px; font-size: 14px; font-weight:bold;">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
			  					<h6 style="margin-bottom: 0;">5&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;8&emsp;&emsp;&emsp;&emsp;&emsp;9&emsp;&emsp;&emsp;&emsp;&nbsp;10&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;11&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;19a(a)/19b&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;19a(c)</h6>
			  					<div class="flex-container">
								  	<div style="border-right:none;">
								  	<input type="text" class="form-control form-control-sm" name="" disabled>
								  	</div>
								  	<div style="border-right:none;">
								  		<input type="text" class="form-control form-control-sm" name="" disabled>
								  	</div>
								  	<div style="margin-right: 15px;">
								  		<input type="text" class="form-control form-control-sm" name="" disabled>
								  	</div>
								  	<div style="border-right:none;">
								  		<input type="text" class="form-control form-control-sm" name="" disabled>
								  	</div>
									<div style="margin-right: 15px;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div> 
									<div style="margin-right: 15px;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div> 
									<div>
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div> 
									<div>
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="margin-right: 15px;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div> 
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="margin-right: 15px;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div> 
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div> 
									<div style="margin-right: 15px;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div> 
									<div style="border-right:none;">
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>
									<div>
									  	<input type="text" class="form-control form-control-sm" name="" disabled>
									</div>  
								</div>
					  		</div>
			    		</div><!--close row-->

				  	</div><!--close row-->
	 			</div><!--close col-->
							<?php  }} ?>
	 	</div>
</div>

<!-- Javascript -->
<!-- <script src = "../../js/input_tno_only.js"></script> -->

<script>

  $(document).ready(function(){
  
    var x = setInterval(function(){

      var now = new Date().getTime();

      //hours
      var hrs = Math.floor((now % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      document.getElementById("hrs").innerHTML = hrs;

      var hours = ["08","09","10","11","12","01","02","03","04","05","06","07","08","09","10","11","12","01","02","03","04","05","06","07"];
      var hrss = hours[hrs];

      if (hrs <= '3' || hrs >= '16'){ var txt = 'am'; } else if (hrs >= '4' || hrs <= '15'){ var txt = 'pm'; }
      
      //minutes
      var min = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
      if (min < 10){ var mins = "0" + min; } else if (min > 9){ var mins = min; }

      //seconds
      var sec = Math.floor((now % (1000 * 60)) / 1000);
      if (sec < 10){ var secs = "0" + sec; } else if (sec > 9){ var secs = sec; }

      $("#hrs").val(hrss +":"+ mins +":"+ secs +''+ txt);
    })
  });

</script>