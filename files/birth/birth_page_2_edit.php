<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
	<!--birth form-->
	<div class="form" style="padding:0 15px 0 15px;">
		<!-- Affidavit of Acknowledgement-->
		<div class="row"><!--grid of header-->
  			<div class="col" style="border: 2px solid green;">
			  	<h6 style="padding-top:10px; font-size:12px;line-height: 0.7;"><span style="font-weight: bold;font-size:23px;"><center>AFFIDAVIT OF ACKNOWLEDGEMENT/ADMISSION OF PATERNITY</center></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(For births before 3 August 1988)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(For births before 3 August 1988)</h6>
				<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;&emsp;&emsp;I/We,
				<div class="custom-control custom-checkbox custom-control-inline" style="padding:0; width:42%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;" id="father_name" name="father_name" value="<?php echo $row['father_name']; ?>" onkeypress="return isTextKey(event)">
				</div>
				and
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 42%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;" id="mother_name" name="mother_name" value="<?php echo $row['mother_name']; ?>" onkeypress="return isTextKey(event)">
				</div>
				,<br> of legal age, am/are the natural mother and/or father of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 53%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;" id="child_name" name="child_name" value="<?php echo $row['child_name']; ?>" onkeypress="return isTextKey(event)">
				</div>
				, who was born on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:24%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;" id="birth_date" name="birth_date" value="<?php echo $row['child_birth_date']; ?>">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:45%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;" id="birth_place" name="birth_place" value="<?php echo $row['birth_place']; ?>">
				</div>
				.
				</h6><br>
				<h6 style="font-size:14px;letter-spacing: 1px;">&emsp;&emsp;&emsp;&emsp;I am / We are executing this affidavit to attest to the truthfulness of the foregoing statements an for purposes of acknowledging my/our child.</h6><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0; text-align:center;" id="father_sign" name="birthtimenum" value="<?php echo $row['father_name']; ?>"  onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">(Signature Over Printed Name of Father)</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0; text-align:center;" id="mother_sign" name="birthtimenum" value="<?php echo $row['mother_name']; ?>"  onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">(Signature Over Printed Name of Mother)</h6>
					</div>
				</div>
				<br>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBCRIBED AND SWORN</span> to before me this
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:7%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" name="ack_sworn_day" id="ack_sworn_day" value="<?php echo $row['sworn_day']; ?>">		
				</div>
				day of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:35%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" name="ack_sworn_month" id="ack_sworn_month" value="<?php echo $row['sworn_month']; ?>" onkeypress="return isTextKey(event)">
				</div>
				,
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:10%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" maxlength="4" name="ack_sworn_year" onkeypress="return isNumberKey(event)" value="<?php echo $row['sworn_year']; ?>">
				</div>
				by
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:35%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;" id="ack_father_sworn" name="ack_sworn_father" value="<?php echo $row['father_name']; ?>" onkeypress="return isTextKey(event)">
				</div>
				and
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:35%; margin-right:0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;" id="ack_mother_sworn" name="ack_sworn_mother" value="<?php echo $row['mother_name']; ?>" onkeypress="return isTextKey(event)">
				</div>
				, who exhibited to me 
				<?php
					$gender = $row['child_gender'];
					if($gender == 'his'){
				?>
					<input type="radio" id="gender1" name="birth_gender" value="his" checked hidden>
					<label id="gender1lbl" style="text-decoration: underline;" for="gender1">his</label>/
					<input type="radio" id="gender2" name="birth_gender" value="her" hidden>
					<label id="gender2lbl" for="gender2">her</label>
				<?php }else if($gender == 'her'){ ?>
					<input type="radio" id="gender1" name="birth_gender" value="his" hidden>
					<label id="gender1lbl" for="gender1">his</label>/
					<input type="radio" id="gender2" name="birth_gender" value="her" checked hidden>
					<label id="gender2lbl" style="text-decoration: underline;" for="gender2">her</label>
				<?php }else{ ?>
					<input type="radio" id="gender1" name="birth_gender" value="his" hidden>
					<label id="gender1lbl" style="text-decoration: none;" for="gender1">his</label>/
					<input type="radio" id="gender2" name="birth_gender" value="her" hidden>
					<label id="gender2lbl" style="text-decoration: none;" for="gender2">her</label>
				<?php } ?>
				CTC/valid ID
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 40%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="ack_ctc" value="<?php echo $row['ctc']; ?>">
				</div>
				issued on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 39%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="ack_issued_on" value="<?php echo $row['issued_on']; ?>">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 40%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="ack_issued_at" value="<?php echo $row['issued_at']; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6><br><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="birthtimenum" disabled>
						<h6 style="font-size:14px;">Signature of the Administering Officer</h6>
						<input type="text" class="form-control form-control-sm" style="text-align: center;" name="ack_sworn_name" value="<?php echo $row['administer_name']; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">Name in Print</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" style="text-align: center;" name="ack_sworn_position" value="<?php echo $row['administer_position']; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">Position/Title/Designation</h6>
						<input type="text" class="form-control form-control-sm" style="text-align: center;" name="ack_sworn_address" value="<?php echo $row['administer_address']; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">Address</h6>
					</div>
				</div>

			</div>
		</div><!--close row-->
 		<!-- Affidavit of Delayed Registration-->
	  	<div class="row">
		  	<div class="col" style="border: 2px solid green; border-top: none;">
		  		<h6 style="padding-top:10px; font-size:13px;line-height: 0.7;" align="center"><span style="font-weight: bold;font-size:23px;"><center>AFFIDAVIT FOR DELAYED REGISTRATION OF BIRTH</center></span>(To be accomplished by the hospital/clinic administrator, father , mother, or guardian or the person himself if 18 years old or above.)</h6>
		  		<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;&emsp;&emsp;I
		  		<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 50%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="late_name" value="<?php echo $row['late_name']; ?>" onkeypress="return isTextKey(event)">
				</div>
				, of legal age, single/married/divorced/widow/widower, with residence and postal address at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 76%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="late_address" value="<?php echo $row['late_address']; ?>" onkeypress="return isTextKey(event)">
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				<span style="letter-spacing:1px;">after having been duly sworn in accordance with law, do hereby depose and say:</span>
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;1.&emsp;That I am the applicant for the delayed registration of:<br>
				&emsp;&emsp;&emsp;&emsp;&emsp;
				<?php 
					$birth_type = $row['late_birth_type'];
					if($birth_type == 'my birth'){
						include 'my_birth.php';
					}else if($birth_type == 'the birth'){
						include 'the_birth.php';
					}else{ 
				?>
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
					<input type="checkbox" class="custom-control-input" id="the_birth" name="late_birth_type" value="the birth">
					<label class="custom-control-label" for="the_birth" style="font-size: 14px;">&nbsp;the birth of</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 32%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="the_birth_txt1" name="late_birth_of" onkeypress="return isTextKey(event)">
				</div>
				who was born in
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="the_birth_txt2" name="late_birth_in" onkeypress="return isTextKey(event)">
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 28%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="the_birth_txt3" name="late_birth_on">
				</div>
				<?php } ?>
				.
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;2.&emsp;That I/he/she was attended at birth by
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="attend_birth_by" value="<?php echo $row['attend_birth_by']; ?>" onkeypress="return isTextKey(event)">
				</div>
				who resides at
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="who_resides_at" value="<?php echo $row['who_resides_at']; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;3.&emsp;That I/he/she is a citizen of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="late_citizen" value="<?php echo $row['late_citizen']; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;4.&emsp;That my/his/her parents was&emsp;
				<?php
					$married_type = $row['married_type'];
					if($married_type == 'married') {
						include 'married.php';
					}else if($married_type == 'not married'){
						include 'not_married.php';
					}else{
				?>
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input" id="married" name="married_type" value="married">
					<label class="custom-control-label" for="married" style="font-size: 14px;">&nbsp;married on</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="married_txt1" name="married_on">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 60%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="married_txt2" name="married_at" onkeypress="return isTextKey(event)">
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
				<?php } ?>
				.
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;5.&emsp;That the reason for the delay registering my/his/her birth was
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0" name="late_reason_1" disabled="">
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="late_reason" value="<?php echo $row['late_reg_reason']; ?>">
				</div>
				.
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;6.&emsp;(For the applicant only)&emsp;That I am merried to
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="applicant_only" value="<?php echo $row['applicant_only']; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;(If the applicant is other than the document owner)&emsp;That I am the
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="applicant_than_owner" value="<?php echo $row['applicant_than_owner']; ?>" onkeypress="return isTextKey(event)">
				</div>
				of the said person.
				</h6>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;7.&emsp;That I am executing this affidavit to attest to the truthfulness of the foregoing statements for all legal intents and purposes.</h6><br>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;In truth whereof, I have affixed my signature below this
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 10%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="sign_day" name="sign_day" value="<?php echo $row['sign_day']; ?>">
				</div>
				day of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="sign_month" name="sign_month" value="<?php echo $row['sign_month']; ?>" onkeypress="return isTextKey(event)">
				</div>
				,
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 10%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" maxlength="4" id="sign_year" name="sign_year" onkeypress="return isNumberKey(event)" value="<?php echo $row['sign_year']; ?>">
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 40%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="sign_at" name="sign_at" value="<?php echo $row['sign_at']; ?>" onkeypress="return isTextKey(event)">
				</div>
				, Philippines.
				</h6>
				<div class="row">
					<div class="col-7" align="center"></div>
					<div class="col-5" align="center">
						<input type="text" class="form-control form-control-sm" name="affiant_name" value="<?php echo $row['affiant_name']; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">(Signature Over Printed Name of Affiant)</h6>
					</div>
				</div>
				<br>
				<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBCRIBED AND SWORN</span> to before me this
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 7%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="sworn_day" name="late_sworn_day" value="<?php echo $row['late_sworn_day']; ?>">
				</div>
				day of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="sworn_month" name="late_sworn_month" value="<?php echo $row['late_sworn_month']; ?>" onkeypress="return isTextKey(event)">
				</div>
				,
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 10%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" maxlength="4" id="sworn_year" name="late_sworn_year" onkeypress="return isNumberKey(event)" value="<?php echo $row['late_sworn_year']; ?>">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 42%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="sworn_at" name="late_sworn_at" value="<?php echo $row['late_sworn_at']; ?>" onkeypress="return isTextKey(event)">
				</div>
				<span style="letter-spacing: 1px;">, Philippines, affiant who exhibited to me his/her CTC/valid ID</span>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="late_ctc" value="<?php echo $row['late_ctc']; ?>" onkeypress="return isNumberKey(event)">
				</div>
				issued on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="late_issued_on" value="<?php echo $row['late_issued_on']; ?>">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" name="late_issued_at" value="<?php echo $row['late_issued_at']; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6><br><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="birthtimenum" disabled>
						<h6 style="font-size:14px;">Signature of the Administering Officer</h6>
						<input type="text" class="form-control form-control-sm" name="late_sworn_name" value="<?php echo $row['late_administer_name']; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">Name in Print</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" name="late_sworn_position" value="<?php echo $row['late_administer_position']; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">Position/Title/Designation</h6>
						<input type="text" class="form-control form-control-sm" name="late_sworn_address" value="<?php echo $row['late_administer_address']; ?>" onkeypress="return isTextKey(event)">
						<h6 style="font-size:14px;">Address</h6>
					</div>
				</div>

		  	</div>
	  	</div><!--close row-->

 	</div>
</div>

<!-- Javascript -->
<script>
$(document).ready(function(){
	$("#ack_sworn_day").keyup(function(){
		var a = $("#ack_sworn_day").val();
		if(a >= 32){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#ack_sworn_day").val("");
		}else if(a == '00'){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#ack_sworn_day").val("");
		}
	});

	$("#sign_day").keyup(function(){
		var a = $("#sign_day").val();
		if(a >= 32){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#sign_day").val("");
		}else if(a == '00'){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#sign_day").val("");
		}
	});

	$("#sworn_day").keyup(function(){
		var a = $("#sworn_day").val();
		if(a >= 32){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#sworn_day").val("");
		}else if(a == '00'){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#sworn_day").val("");
		}
	});
});
</script>



<script>
document.getElementById("mother_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunction();
    }
});

function myFunction() {
  var mf = document.getElementById("mother_fname").value;
  var mm = document.getElementById("mother_mname").value;
  var ml = document.getElementById("mother_lname").value;
  var mamaname = document.getElementById("mother_name");
  var mamasign = document.getElementById("mother_sign");

  var mama = mf + " " + mm + " " + ml;
  mamaname.value = mama;
  mamasign.value =mama;

}
</script>

<script>
	
	document.getElementById("father_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionF();
    }
});



function myFunctionF() {
  var pf = document.getElementById("father_fname").value;
  var pm = document.getElementById("father_mname").value;
  var pl = document.getElementById("father_lname").value;
  var papaname = document.getElementById("father_name");
  var papasign = document.getElementById("father_sign");

  var papa = pf + " " + pm + " " + pl;
  papaname.value = papa;
  papasign.value = papa;

}
</script>

<script>
	document.getElementById("child_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionC();
    }
});

  function myFunctionC() {
  var cf = document.getElementById("child_fname").value;
  var cm = document.getElementById("child_mname").value;
  var cl = document.getElementById("child_lname").value;
  var bataname = document.getElementById("child_name");

  var bata = cf + " " + cm + " " + cl;
  bataname.value = bata;


  }
</script>

<script>
	document.getElementById("birth_place").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionP();
    }
});

	function myFunctionP(){
  var birthbrgy = document.getElementById("birth_brgy").value;
  var birthcity = document.getElementById("birth_city").value;
  var birthprov = document.getElementById("birth_province").value;
  var birthplace = document.getElementById("birth_place");



  var birthloc = birthbrgy + " " + birthcity + " " + birthprov;
  birthplace.value = birthloc;

}

</script>
<script>
	document.getElementById("birth_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("birth_date").value = document.getElementById("child_birth_date").value;
    }
});
</script>

<script>
document.getElementById("mother_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunction();
    }
});

function myFunction() {
  var mf = document.getElementById("mother_fname").value;
  var mm = document.getElementById("mother_mname").value;
  var ml = document.getElementById("mother_lname").value;
  var mamaname = document.getElementById("mother_name");
  var mamasign = document.getElementById("mother_sign");

  var mama = mf + " " + mm + " " + ml;
  mamaname.value = mama;
  mamasign.value =mama;

}
</script>

<script>
	
	document.getElementById("father_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionF();
    }
});



function myFunctionF() {
  var pf = document.getElementById("father_fname").value;
  var pm = document.getElementById("father_mname").value;
  var pl = document.getElementById("father_lname").value;
  var papaname = document.getElementById("father_name");
  var papasign = document.getElementById("father_sign");

  var papa = pf + " " + pm + " " + pl;
  papaname.value = papa;
  papasign.value = papa;

}
</script>

<script>
	document.getElementById("child_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionC();
    }
});

  function myFunctionC() {
  var cf = document.getElementById("child_fname").value;
  var cm = document.getElementById("child_mname").value;
  var cl = document.getElementById("child_lname").value;
  var bataname = document.getElementById("child_name");

  var bata = cf + " " + cm + " " + cl;
  bataname.value = bata;


  }
</script>

<script>
	document.getElementById("birth_place").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionP();
    }
});

	function myFunctionP(){
  var birthbrgy = document.getElementById("birth_brgy").value;
  var birthcity = document.getElementById("birth_city").value;
  var birthprov = document.getElementById("birth_province").value;
  var birthplace = document.getElementById("birth_place");



  var birthloc = birthbrgy + " " + birthcity + " " + birthprov;
  birthplace.value = birthloc;

}

</script>

<script>
	document.getElementById("birth_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("birth_date").value = document.getElementById("birth_day").value;
    }
});
</script>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		let inputs = document.querySelectorAll(".form-control");
		
		inputs.forEach((input, index) => {
			input.addEventListener("keydown", function(event) {
				if(event.key === "Enter"){
					event.preventDefault();
					let nextInput = inputs[index + 1];
					if (nextInput){
						nextInput.focus();
					}
				}
			});
		});
	});
</script>


<script>
	document.getElementById("ack_sworn_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("ack_sworn_name").value = document.getElementById("civil_name").value;
		document.getElementById("ack_sworn_position").value = document.getElementById("civil_position").value;
		document.getElementById("ack_sworn_address").value = "GERONA TARLAC"
    }
});
</script>

<script>
	document.getElementById("late_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("late_name").value = document.getElementById("informant_name").value;
		document.getElementById("late_address").value = document.getElementById("informant_address").value;
		
    }
});
</script>


<script>
	document.getElementById("bplace1").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionB1();
    }
});

	function myFunctionB1(){
  var birthbrgy1 = document.getElementById("birth_brgy").value;
  var birthcity1 = document.getElementById("birth_city").value;
  var birthprov1 = document.getElementById("birth_province").value;
  var birthplace1 = document.getElementById("bplace1");



  var birthloc1 = birthbrgy1 + " " + birthcity1 + " " + birthprov1;
  birthplace1.value = birthloc1;
  document.getElementById("bday1").value = document.getElementById("birth_day").value;

}

</script>

<script>
	document.getElementById("childlatename").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionB2();
    }
});

	function myFunctionB2(){
  var birthbrgy2 = document.getElementById("birth_brgy").value;
  var birthcity2 = document.getElementById("birth_city").value;
  var birthprov2 = document.getElementById("birth_province").value;
  var birthplace2 = document.getElementById("bplace2");



  var cf2 = document.getElementById("child_fname").value;
  var cm2 = document.getElementById("child_mname").value;
  var cl2 = document.getElementById("child_lname").value;
  var bataname2 = document.getElementById("childlatename");

  var bata2 = cf2 + " " + cm2 + " " + cl2;
  bataname2.value = bata2;


  var birthloc2 = birthbrgy2 + " " + birthcity2 + " " + birthprov2;
  birthplace2.value = birthloc2;
  document.getElementById("bday2").value = document.getElementById("birth_day").value;
  
}

</script>

<script>
	document.getElementById("attend_birth_by").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("attend_birth_by").value = document.getElementById("attendant_name").value;
		document.getElementById("who_resides_at").value = document.getElementById("attendant_address1").value;
		
    }
});
</script>

<script>
	document.getElementById("late_citizen").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("late_citizen").value = "PHILIPPINES"

		
    }
});
</script>

<script>
	document.getElementById("married_txt1").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("married_txt1").value = document.getElementById("marriage_date").value;
		
    }
});
</script>

<script>
	document.getElementById("married_txt2").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("married_txt2").value = document.getElementById("marriage_place").value;
		
    }
});
</script>

<script>
	
	document.getElementById("not_married_txt").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        myFunctionF2();
    }
});



function myFunctionF2() {
  var pf2 = document.getElementById("father_fname").value;
  var pm2 = document.getElementById("father_mname").value;
  var pl2 = document.getElementById("father_lname").value;
  var papaname2 = document.getElementById("not_married_txt");
 

  var papa2 = pf2 + " " + pm2 + " " + pl2;
  papaname2.value = papa2;


}
</script>


<script>
	document.getElementById("late_sworn_name").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        document.getElementById("late_sworn_name").value = document.getElementById("civil_name").value;
		document.getElementById("late_sworn_position").value = document.getElementById("civil_position").value;
		document.getElementById("late_sworn_address").value = "GERONA TARLAC"
    }
});
</script>