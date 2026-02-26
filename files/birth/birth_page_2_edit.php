<style>
	/* Global font size 10 as requested by client */
	.ctf-birth-back, .ctf-birth-back * {
		font-size: 10px !important;
	}
	.ctf-birth-back h4 {
		font-size: 12px !important;
	}
	.ctf-birth-back h6 {
		font-size: 10px !important;
	}
	.ctf-birth-back input, 
	.ctf-birth-back select, 
	.ctf-birth-back textarea,
	.ctf-birth-back label,
	.ctf-birth-back span,
	.ctf-birth-back option {
		font-size: 10px !important;
	}
	/* Header styling */
	.ctf-birth-back .affidavit-title {
		font-size: 16px !important;
		font-weight: bold;

	}
.custom-dropdown {
    position: relative;
    display: inline-block;
    vertical-align: middle;
}

#selected-text {
	opacity: 0.8;
    font-family: Arial, sans-serif;
    font-size: 14px;
    color: black; /* Matches the color in your screenshot */
    padding: 2px 4px;
    border-bottom: 1px solid transparent; /* Optional: hidden until hover */
}

#status-select {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;         /* Makes the box and arrow invisible */
    cursor: pointer;    /* Makes it obvious it's clickable */
    appearance: none;   /* Modern way to hide the arrow */
    -webkit-appearance: none;
}

/* Optional: Subtle hint that it's interactive when hovering */
.custom-dropdown:hover #selected-text {
    background-color: #f0f0f0;
    border-radius: 3px;
}
</style>

<div class="ctf-birth-back pt-3" style="width:960px;margin: auto;">
	<div class="form" style="padding:0 15px 0 15px;">
		<div class="row"><div class="col" style="border: 2px solid green;">
				<h6 style="padding-top:10px; line-height: 1.2;">
					<center><span class="affidavit-title">AFFIDAVIT OF ACKNOWLEDGEMENT/ADMISSION OF PATERNITY</span></center>
					<div style="text-align: center; margin-top: 5px;">
						<span>(For births on or after 3 August 1988)</span>
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<span>(For births on or after 3 August 1988)</span>
					</div>
				</h6>
				<h6 style="padding-top:10px;">&emsp;&emsp;&emsp;&emsp;I/We,
				<div class="custom-control custom-checkbox custom-control-inline" style="padding:0; width:42%; margin-right:0;">
					<input type="text" class="form-control form-control-sm text-center" id="father_name" name="father_name" value="<?php echo $row['father_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				and
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 42%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="mother_name" name="mother_name" value="<?php echo $row['mother_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				,<br> of legal age, am/are the natural mother and/or father of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 53%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="child_name" name="child_name" value="<?php echo $row['child_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				, who was born on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:24%; margin-right:0;">
					<input type="text" class="form-control form-control-sm text-center" id="birth_date" name="birth_date" value="<?php echo $row['birth_date'] ?? ''; ?>">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:45%; margin-right:0;">
					<input type="text" class="form-control form-control-sm text-center" id="birth_place" name="birth_place" value="<?php echo $row['birth_place'] ?? ''; ?>">
				</div>
				.
				</h6><br>
				<h6 style="letter-spacing: 0.5px;">&emsp;&emsp;&emsp;&emsp;I am / We are executing this affidavit to attest to the truthfulness of the foregoing statements and for purposes of acknowledging my/our child.</h6><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0;" id="father_sign" name="father_sign" value="<?php echo $row['father_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>(Signature Over Printed Name of Father)</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0;" id="mother_sign" name="mother_sign" value="<?php echo $row['mother_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>(Signature Over Printed Name of Mother)</h6>
					</div>
				</div><br>
				<h6>&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBSCRIBED AND SWORN</span> to before me this
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:7%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" name="ack_sworn_day" id="ack_sworn_day" value="<?php echo $row['sworn_day'] ?? ''; ?>">
					</div>
					day of
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:20%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" name="ack_sworn_month" id="ack_sworn_month" value="<?php echo $row['sworn_month'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					</div>
					,
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:8%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" maxlength="4" name="ack_sworn_year" id="ack_sworn_year" value="<?php echo $row['sworn_year'] ?? ''; ?>" onkeypress="return isNumberKey(event)">
					</div>
					by
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:30%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" id="ack_father_sworn" name="ack_sworn_father" value="<?php echo $row['father_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					</div>
					and
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:30%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" id="ack_mother_sworn" name="ack_sworn_mother" value="<?php echo $row['mother_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
					</div>
				, who exhibited to me 
				<?php
					$gender = $row['child_gender'] ?? '';
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
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="ack_ctc" id="ack_ctc" value="<?php echo $row['ctc'] ?? ''; ?>">
				</div>
				issued on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="ack_issued_on" id="ack_issued_on" value="<?php echo $row['issued_on'] ?? ''; ?>">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="ack_issued_at" id="ack_issued_at" value="<?php echo $row['issued_at'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<br><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="ack_officer_sign" disabled>
						<h6>Signature of the Administering Officer</h6>

						<input type="text" class="form-control form-control-sm text-center" id="ack_sworn_name" name="ack_sworn_name" value="<?php echo $row['administer_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>Name in Print</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" id="ack_sworn_position" name="ack_sworn_position" value="<?php echo $row['administer_position'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>Position/Title/Designation</h6>
						<input type="text" class="form-control form-control-sm text-center" id="ack_sworn_address" name="ack_sworn_address" value="<?php echo $row['administer_address'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>Address</h6>
					</div>
				</div>
			</div>
		</div><div class="row">
			<div class="col" style="border: 2px solid green; border-top: none;">
				<h6 style="padding-top:10px; line-height: 1.2;" align="center">
					<span class="affidavit-title"><center>AFFIDAVIT FOR DELAYED REGISTRATION OF BIRTH</center></span>
					<span>(To be accomplished by the hospital/clinic administrator, father, mother, or guardian or the person himself if 18 years old or above.)</span>
				</h6>
				<h6 style="padding-top:10px;">&emsp;&emsp;&emsp;&emsp;I,
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 50%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="late_name" name="late_name" value="<?php echo $row['late_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				, of legal age, single/married/divorced/widow/widower, with residence and postal address at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 76%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="late_address" name="late_address" value="<?php echo $row['late_address'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				<span style="letter-spacing:0.5px;">after having been duly sworn in accordance with law, do hereby depose and say:</span>
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;1.&emsp;That I am the applicant for the delayed registration of:<br>
				&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="my_birth" name="late_birth_type" value="my birth" <?php if(($row['late_birth_type'] ?? '') == 'my birth') echo 'checked'; ?>>
					<label class="custom-control-label" for="my_birth">&nbsp;my birth in</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="bplace1" name="late_birth_in" value="<?php echo $row['late_birth_in'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="bday1" name="late_birth_on" value="<?php echo $row['late_birth_on'] ?? ''; ?>">
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="the_birth" name="late_birth_type2" value="the birth" <?php if(($row['late_birth_type'] ?? '') == 'the birth') echo 'checked'; ?>>
					<label class="custom-control-label" for="the_birth">&nbsp;the birth of</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 32%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="childlatename" name="late_birth_of" value="<?php echo $row['late_birth_of'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				who was born in
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="bplace2" name="late_birth_in2" value="<?php echo $row['late_birth_in'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 28%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="bday2" name="late_birth_on2" value="<?php echo $row['late_birth_on'] ?? ''; ?>">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;2.&emsp;That I/he/she was attended at birth by
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="attend_birth_by" name="attend_birth_by" value="<?php echo $row['attend_birth_by'] ?? ''; ?>">
				</div>
				who resides at
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="who_resides_at" name="who_resides_at" value="<?php echo $row['who_resides_at'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;3.&emsp;That I/he/she is a citizen of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="late_citizen" name="late_citizen" value="<?php echo $row['late_citizen'] ?? ''; ?>">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;4.&emsp;That my/his/her parents were&emsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="married" name="married_type" value="married" <?php if(($row['married_type'] ?? '') == 'married') echo 'checked'; ?>>
					<label class="custom-control-label" for="married">&nbsp;married on</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="married_txt1" name="married_on" value="<?php echo $row['married_on'] ?? ''; ?>">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center"  id="married_txt2" name="married_at" value="<?php echo $row['married_at'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				<br>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="not_married" name="married_type2" value="not married" <?php if(($row['married_type'] ?? '') == 'not married') echo 'checked'; ?>>
					<label class="custom-control-label" for="not_married">&nbsp;not married but I/he/she  <div class="custom-dropdown">
    				<span id="selected-text">was acknowledged</span> 
					 <select id="status-select">
        	<option value="acknowledged">was acknowledged</option>
       			 <option value="not_acknowledged"> not acknowledged</option>
    </select>
				</div>by my/his/her</label>
				</div><br>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; 
				father whose name is
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 45%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="not_married_txt" name="not_married_name" value="<?php echo $row['not_married_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;5.&emsp;That the reason for the delay in registering my/his/her birth was
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_reason_1" value="<?php echo $row['late_reg_reason'] ?? ''; ?>">
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_reason_2">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;6.&emsp;(For the applicant only)&emsp;That I am married to
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="applicant_only" value="<?php echo $row['applicant_only'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;(If the applicant is other than the document owner)&emsp;That I am the
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="applicant_relation" name="applicant_than_owner" value="<?php echo $row['applicant_than_owner'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				of the said person.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;7.&emsp;That I am executing this affidavit to attest to the truthfulness of the foregoing statements for all legal intents and purposes.</h6><br>
				<h6>&emsp;&emsp;&emsp;&emsp;In truth whereof, I have affixed my signature below this
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 8%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sign_day" name="sign_day" value="<?php echo $row['sign_day'] ?? ''; ?>">
				</div>
				day of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 18%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sign_month" name="sign_month" value="<?php echo $row['sign_month'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				,
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 8%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sign_year" name="sign_year" value="<?php echo $row['sign_year'] ?? ''; ?>" onkeypress="return isNumberKey(event)">
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sign_at" name="sign_at" value="<?php echo $row['sign_at'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				, Philippines.
				</h6>
				<div class="row">
					<div class="col-7" align="center"></div>
					<div class="col-5" align="center">
						<input type="text" class="form-control form-control-sm text-center" id="affiant_name" name="affiant_name" value="<?php echo $row['affiant_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>(Signature Over Printed Name of Affiant)</h6>
					</div>
				</div><br>
				<h6>&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBSCRIBED AND SWORN</span> to before me this
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 7%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sworn_day" name="late_sworn_day" value="<?php echo $row['late_sworn_day'] ?? ''; ?>">
				</div>
				day of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 18%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sworn_month" name="late_sworn_month" value="<?php echo $row['late_sworn_month'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				,
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 8%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sworn_year" name="late_sworn_year" value="<?php echo $row['late_sworn_year'] ?? ''; ?>" onkeypress="return isNumberKey(event)">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sworn_at" name="late_sworn_at" value="<?php echo $row['late_sworn_at'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				<span style="letter-spacing: 0.5px;">, Philippines, affiant who exhibited to me his/her CTC/valid ID</span>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_ctc" id="late_ctc" value="<?php echo $row['late_ctc'] ?? ''; ?>">
				</div>
				issued on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_issued_on" id="late_issued_on" value="<?php echo $row['late_issued_on'] ?? ''; ?>"> 
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_issued_at" id="late_issued_at" value="<?php echo $row['late_issued_at'] ?? ''; ?>" onkeypress="return isTextKey(event)">
				</div>
				
				</h6><br><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="late_officer_sign" disabled>
						<h6>Signature of the Administering Officer</h6>
						<input type="text" class="form-control form-control-sm text-center" id="late_sworn_name" name="late_sworn_name" value="<?php echo $row['late_administer_name'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>Name in Print</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" id="late_sworn_position" name="late_sworn_position" value="<?php echo $row['late_administer_position'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>Position/Title/Designation</h6>
						<input type="text" class="form-control form-control-sm text-center" id="late_sworn_address" name="late_sworn_address" value="<?php echo $row['late_administer_address'] ?? ''; ?>" onkeypress="return isTextKey(event)">
						<h6>Address</h6>
					</div>
				</div>
			</div>
		</div></div>
</div>

<!-- Javascript -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Day validation for all day fields
$(document).ready(function(){
	$("#ack_sworn_day, #sign_day, #sworn_day").keyup(function(){
		var a = $(this).val();
		// Remove ordinal suffix for validation
		var numVal = parseInt(a);
		if(numVal >= 32 || numVal <= 0){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$(this).val("");
		}
	});
});
</script>


<!-- Move to next input on Enter key -->
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

<!-- Auto-check "the birth" checkbox when filling child late name -->
<script>
document.getElementById("childlatename").addEventListener("input", function() {
	if(this.value.trim() !== "") {
		document.getElementById("the_birth").checked = true;
		document.getElementById("my_birth").checked = false;
	}
});

document.getElementById("bplace1").addEventListener("input", function() {
	if(this.value.trim() !== "") {
		document.getElementById("my_birth").checked = true;
		document.getElementById("the_birth").checked = false;
	}
});
</script>

<!-- Auto-check married checkbox when filling married date -->
<script>
document.getElementById("married_txt1").addEventListener("input", function() {
	if(this.value.trim() !== "") {
		document.getElementById("married").checked = true;
		document.getElementById("not_married").checked = false;
	}
});

document.getElementById("not_married_txt").addEventListener("input", function() {
	if(this.value.trim() !== "") {
		document.getElementById("not_married").checked = true;
		document.getElementById("married").checked = false;
	}
});
</script>

<script> 
$(document).ready(function() {
    
    function getOrdinal(n) {
        let s = ["TH", "ST", "ND", "RD"], v = n % 100;
        return n + (s[(v - 20) % 10] || s[v] || s[0]);
    }

    function formatDateFormal(inputVal) {
        if (!inputVal) return "";
        
        const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                     "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

        // Clean extra spaces and force uppercase
        let v = inputVal.replace(/\s\s+/g, ' ').trim().toUpperCase();
        
        // FIXED: Added comma here as well
        let parts = v.split(/[\s\/,\.-]+/);

        if (parts.length >= 3) {
            let day = parts[0];
            let month = parts[1];
            let year = parts[2];

            // Scenario: Month is already a word (e.g., "10 OCTOBER 2004")
            if (MON.includes(month)) {
                return `${month} ${day}, ${year}`; 
            }
            
            // Scenario: Month is first (e.g., "OCTOBER 10 2004")
            if (MON.includes(day)) {
                return `${day} ${parts[1]}, ${parts[2]}`;
            }

            // Scenario: Numeric (e.g., "10 10 2004")
            const mIdx = parseInt(month, 10);
            if (!isNaN(mIdx) && mIdx >= 1 && mIdx <= 12) {
                return `${MON[mIdx - 1]} ${day}, ${year}`;
            }
        }
        return v;
    }

    // Notice the new "forceOverwrite" parameter
    function syncCurrentField(focusedElement, forceOverwrite = false) {
        const rawData = localStorage.getItem('birth_form_data');
        const data = rawData ? JSON.parse(rawData) : {};
        
        const elementId = $(focusedElement).attr('id');
        if (!elementId) return;

        let valueToFill = "";
        const now = new Date();
        const fName = `${data.father_fname || ''} ${data.father_mname || ''} ${data.father_lname || ''}`.trim().toUpperCase();
        const mName = `${data.mother_fname || ''} ${data.mother_mname || ''} ${data.mother_lname || ''}`.trim().toUpperCase();

        switch (elementId) {
            case 'sworn_day': case 'ack_sworn_day': case 'sign_day': valueToFill = getOrdinal(now.getDate()); break;
            case 'sworn_month': case 'ack_sworn_month': case 'sign_month': valueToFill = now.toLocaleString('default', { month: 'long' }).toUpperCase(); break;
            case 'sworn_year': case 'ack_sworn_year': case 'sign_year': valueToFill = now.getFullYear().toString(); break;
            case 'late_name': case 'affiant_name': valueToFill = data.informant_name || ""; break;
            case 'late_address': valueToFill = data.informant_address || ""; break;
            case 'applicant_than_owner': case 'applicant_relation': valueToFill = data.rel_child || ""; break;
            case 'birth_place': case 'bplace1': case 'bplace2': case 'late_birth_in': case 'late_birth_in2': valueToFill = data.birth_place || ""; break;
            case 'birth_date': case 'bday2': case 'bday1': case 'late_birth_on':
                let storedDate = data.birth_day || ""; 
                if (storedDate) valueToFill = formatDateFormal(storedDate);
                break;
            case 'late_citizen': valueToFill = "PHILIPPINES"; break;
            case 'ack_sworn_name': case 'late_sworn_name': valueToFill = data.civil_name || ""; break;
            case 'ack_sworn_position': case 'late_sworn_position': valueToFill = data.civil_position || "MUNICIPAL CIVIL REGISTRAR"; break;
            case 'ack_sworn_address': case 'late_sworn_address': case 'sworn_at': case 'sign_at': valueToFill = "GERONA, TARLAC"; break;
            case 'child_name': case 'childlatename': case 'late_birth_of': valueToFill = `${data.child_fname || ''} ${data.child_mname || ''} ${data.child_lname || ''}`; break;
            case 'father_name': case 'father_sign': case 'ack_father_sworn': case 'not_married_txt': valueToFill = fName; break;
            case 'mother_name': case 'mother_sign': case 'ack_mother_sworn': valueToFill = mName; break;
            case 'married_txt1': valueToFill = data.marriage_date || ""; break;
            case 'married_txt2': valueToFill = data.marriage_place || ""; break;
            case 'attend_birth_by': valueToFill = data.attendant_name || ""; break;
            case 'who_resides_at': valueToFill = data.attendant_address || ""; break;
        }

        if (valueToFill) {
            let currentVal = $(focusedElement).val().trim();
            // ONLY overwrite if it's currently empty, OR if the user pressed Enter
            if (currentVal === "" || forceOverwrite) {
                $(focusedElement).val(valueToFill.trim().toUpperCase());
            }
        }
    }

    // 1. ON LOAD: Fill in any fields that are currently blank
    $('input[type="text"]').each(function() {
        syncCurrentField(this, false); 
    });

    // 2. ON ENTER: Force an overwrite of the current field
    $('input').on('keydown', function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); 
            syncCurrentField(this, true);

            const allInputs = $('input:visible:not([disabled])');
            const index = allInputs.index(this);
            if (index > -1 && index < allInputs.length - 1) {
                allInputs.eq(index + 1).focus();
            }
        }
    });
});
</script>

<script>
	$(document).ready(function() {
    // 1. Create a function to generate suggestions from memory
    function updateSuggestions() {
        const raw = localStorage.getItem('birth_form_data');
        if (!raw) return;
        
        const data = JSON.parse(raw); // Converts the stored string back into an object
        
        // Loop through all saved data points
        Object.keys(data).forEach(key => {
            let val = data[key];
            if (val && val.trim() !== "") {
                // Find or create a datalist for this specific input ID
                let listId = "list_" + key;
                if ($("#" + listId).length === 0) {
                    $('body').append(`<datalist id="${listId}"></datalist>`);
                }
                
                // Add the value as an option if it doesn't already exist
                let datalist = $("#" + listId);
                if (datalist.find(`option[value='${val.toUpperCase()}']`).length === 0) {
                    datalist.append(`<option value="${val.toUpperCase()}">`);
                }
                
                // Attach this datalist to its respective input box on Page 2
                $(`#${key}`).attr('list', listId);
            }
        });
    }

    // 2. Refresh suggestions whenever the page loads
    updateSuggestions();
});
</script>
<script>
	const selectElement = document.getElementById('status-select');
const textDisplay = document.getElementById('selected-text');

selectElement.addEventListener('change', function() {
    // Updates the visible text to match the newly selected option
    textDisplay.textContent = this.options[this.selectedIndex].text;
});
</script>