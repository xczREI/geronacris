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
	<!--birth form-->
	<div class="form" style="padding:0 15px 0 15px;">
		<!-- Affidavit of Acknowledgement--> 
		<div class="row"><!--grid of header-->
			<div class="col" style="border: 2px solid green;">
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
					<input type="text" class="form-control form-control-sm text-center" id="father_name" name="father_name" onkeypress="return isTextKey(event)">
				</div>
				and
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 42%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="mother_name" name="mother_name" onkeypress="return isTextKey(event)">
				</div>
				,<br> of legal age, am/are the natural mother and/or father of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 53%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center text-center" id="child_name" name="child_name" onkeypress="return isTextKey(event)">
				</div>
				, who was born on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:24%; margin-right:0;">
					<!-- Format: DAY MONTH YEAR (e.g., 6 SEPTEMBER 2018) -->
					<input type="text" class="form-control form-control-sm text-center text-center" id="birth_date" name="birth_date">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:45%; margin-right:0;">
					<input type="text" class="form-control form-control-sm text-center text-center" id="birth_place" name="birth_place">
				</div>
				.
				</h6><br>
				<h6 style="letter-spacing: 0.5px;">&emsp;&emsp;&emsp;&emsp;I am / We are executing this affidavit to attest to the truthfulness of the foregoing statements and for purposes of acknowledging my/our child.</h6><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0; text-align:center;" id="father_sign" name="father_sign" onkeypress="return isTextKey(event)">
						<h6>(Signature Over Printed Name of Father)</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color:white; border-top:none;border-left:none; border-right:none; border-color:green; border-radius:0; text-align:center;" id="mother_sign" name="mother_sign" onkeypress="return isTextKey(event)">
						<h6>(Signature Over Printed Name of Mother)</h6>
					</div>
				</div><br>
				<h6>&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBSCRIBED AND SWORN</span> to before me this
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:7%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" name="ack_sworn_day" id="ack_sworn_day">
					</div>
					day of
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:20%; margin-right:0;">

						<input type="text" class="form-control form-control-sm text-center" name="ack_sworn_month" id="ack_sworn_month" onkeypress="return isTextKey(event)">
					</div>
					,
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:8%; margin-right:0;">

						<input type="text" class="form-control form-control-sm text-center" maxlength="4" name="ack_sworn_year" id="ack_sworn_year" onkeypress="return isNumberKey(event)">
					</div>
					by
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:30%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" id="ack_father_sworn" name="ack_sworn_father" onkeypress="return isTextKey(event)">
					</div>
					and
					<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding:0; width:30%; margin-right:0;">
						<input type="text" class="form-control form-control-sm text-center" id="ack_mother_sworn" name="ack_sworn_mother" onkeypress="return isTextKey(event)">
					</div>
				, who exhibited to me 
				<input type="radio" id="gender1" name="birth_gender" value="his" hidden>
				<label id="gender1lbl" for="gender1">his</label>/
				<input type="radio" id="gender2" name="birth_gender" value="her" hidden>
				<label id="gender2lbl" for="gender2">her</label>
				CTC/valid ID
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="ack_ctc" id="ack_ctc">
				</div>
				issued on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="ack_issued_on" id="ack_issued_on">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="ack_issued_at" id="ack_issued_at" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<br><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="ack_officer_sign" disabled>
						<h6>Signature of the Administering Officer</h6>

						<input type="text" class="form-control form-control-sm text-center" id="ack_sworn_name" name="ack_sworn_name" onkeypress="return isTextKey(event)">
						<h6>Name in Print</h6>
					</div>
					<div class="col-6" align="center">
						<!-- Default to MUNICIPAL CIVIL REGISTRAR but editable -->
						<input type="text" class="form-control form-control-sm text-center" id="ack_sworn_position" name="ack_sworn_position" onkeypress="return isTextKey(event)">
						<h6>Position/Title/Designation</h6>
						<!-- Default to GERONA TARLAC but editable -->
						<input type="text" class="form-control form-control-sm text-center" id="ack_sworn_address" name="ack_sworn_address" onkeypress="return isTextKey(event)">
						<h6>Address</h6>
					</div>
				</div>
			</div>
		</div><!--close row-->

		<!-- Affidavit of Delayed Registration-->
		<div class="row">
			<div class="col" style="border: 2px solid green; border-top: none;">
				<h6 style="padding-top:10px; line-height: 1.2;" align="center">
					<span class="affidavit-title"><center>AFFIDAVIT FOR DELAYED REGISTRATION OF BIRTH</center></span>
					<span>(To be accomplished by the hospital/clinic administrator, father, mother, or guardian or the person himself if 18 years old or above.)</span>
				</h6>
				<h6 style="padding-top:10px;">&emsp;&emsp;&emsp;&emsp;I,
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 50%;margin-right: 0;">
					<!-- Auto-fill from informant name (field 22) but editable -->
					<input type="text" class="form-control form-control-sm text-center" id="late_name" name="late_name" onkeypress="return isTextKey(event)">
				</div>
				, of legal age, single/married/divorced/widow/widower, with residence and postal address at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 76%;margin-right: 0;">
					<!-- Auto-fill from informant address but editable -->
					<input type="text" class="form-control form-control-sm text-center" id="late_address" name="late_address" onkeypress="return isTextKey(event)">
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				<span style="letter-spacing:0.5px;">after having been duly sworn in accordance with law, do hereby depose and say:</span>
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;1.&emsp;That I am the applicant for the delayed registration of:<br>
				&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="my_birth" name="late_birth_type" value="my birth">
					<label class="custom-control-label" for="my_birth">&nbsp;my birth in</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="bplace1" name="late_birth_in" onkeypress="return isTextKey(event)">
				</div>
				on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 38%;margin-right: 0;">
					<!-- Format: DAY MONTH YEAR -->
					<input type="text" class="form-control form-control-sm text-center" id="bday1" name="late_birth_on" >
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="the_birth" name="late_birth_type2" value="the birth">
					<label class="custom-control-label" for="the_birth">&nbsp;the birth of</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 32%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="childlatename" name="late_birth_of" onkeypress="return isTextKey(event)">
				</div>
				who was born in
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="bplace2" name="late_birth_in2" onkeypress="return isTextKey(event)">
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 28%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
					<!-- Format: DAY MONTH YEAR -->
					<input type="text" class="form-control form-control-sm text-center" id="bday2" name="late_birth_on2">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;2.&emsp;That I/he/she was attended at birth by
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
					<!-- Auto-fill from attendant name but editable -->
					<input type="text" class="form-control form-control-sm text-center" id="attend_birth_by" name="attend_birth_by">
				</div>
				who resides at
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm" id="who_resides_at" name="who_resides_at" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;3.&emsp;That I/he/she is a citizen of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 50%;margin-right: 0;">
					<!-- Default to PHILIPPINES but editable -->
					<input type="text" class="form-control form-control-sm text-center" id="late_citizen" name="late_citizen">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;4.&emsp;That my/his/her parents were&emsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="married" name="married_type" value="married">
					<label class="custom-control-label" for="married">&nbsp;married on</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<!-- Auto-fill from marriage_date (field 20a) - Format: MONTH DAY YEAR -->
					<input type="text" class="form-control form-control-sm text-center" id="married_txt1" name="married_on" >
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
					<!-- Auto-fill from marriage_place (field 20b) but editable -->
					<input type="text" class="form-control form-control-sm text-center"  id="married_txt2" name="married_at" onkeypress="return isTextKey(event)">
				</div>
				<br>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
				<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
					<input type="checkbox" class="custom-control-input text-center" id="not_married" name="married_type2" value="not married">
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
					<input type="text" class="form-control form-control-sm text-center" id="not_married_txt" name="not_married_name" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;5.&emsp;That the reason for the delay in registering my/his/her birth was
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
					<!-- Default to NEGLIGENCE but editable -->
					<input type="text" class="form-control form-control-sm text-center" name="late_reason_1" >
				</div>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 78%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_reason_2" value="<?php echo htmlspecialchars($row['late_reason_2'] ?? ''); ?>">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;6.&emsp;(For the applicant only)&emsp;That I am married to
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="applicant_only" onkeypress="return isTextKey(event)">
				</div>
				.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;(If the applicant is other than the document owner)&emsp;That I am the
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 30%;margin-right: 0;">
					<!-- Auto-fill from rel_child (relationship to child from field 22) but editable -->
					<input type="text" class="form-control form-control-sm text-center" id="applicant_relation" name="applicant_than_owner" onkeypress="return isTextKey(event)">
				</div>
				of the said person.
				</h6>
				<h6>&emsp;&emsp;&emsp;&emsp;7.&emsp;That I am executing this affidavit to attest to the truthfulness of the foregoing statements for all legal intents and purposes.</h6><br>
				<h6>&emsp;&emsp;&emsp;&emsp;In truth whereof, I have affixed my signature below this
				<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 8%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sign_day" name="sign_day">
				</div>
				day of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 18%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sign_month" name="sign_month" onkeypress="return isTextKey(event)">
				</div>
				,
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 8%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sign_year" name="sign_year" onkeypress="return isNumberKey(event)">
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
					<!-- Default to GERONA TARLAC but editable -->
					<input type="text" class="form-control form-control-sm text-center" id="sign_at" name="sign_at" onkeypress="return isTextKey(event)">
				</div>
				, Philippines.
				</h6>
				<div class="row">
					<div class="col-7" align="center"></div>
					<div class="col-5" align="center">
						<!-- Auto-fill but editable -->
						<input type="text" class="form-control form-control-sm text-center" id="affiant_name" name="affiant_name" onkeypress="return isTextKey(event)">
						<h6>(Signature Over Printed Name of Affiant)</h6>
					</div>
				</div><br>
				<h6>&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBSCRIBED AND SWORN</span> to before me this
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 7%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sworn_day" name="late_sworn_day">
				</div>
				day of
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 18%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" id="sworn_month" name="late_sworn_month" onkeypress="return isTextKey(event)">
				</div>
				,
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 8%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sworn_year" name="late_sworn_year" onkeypress="return isNumberKey(event)">
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<!-- Default to GERONA TARLAC but editable -->
					<input type="text" class="form-control form-control-sm text-center" id="sworn_at" name="late_sworn_at" onkeypress="return isTextKey(event)">
				</div>
				<span style="letter-spacing: 0.5px;">, Philippines, affiant who exhibited to me his/her CTC/valid ID</span>
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_ctc" id="late_ctc">
				</div>
				issued on
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_issued_on" id="late_issued_on"> 
				</div>
				at
				<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
					<input type="text" class="form-control form-control-sm text-center" name="late_issued_at" id="late_issued_at" onkeypress="return isTextKey(event)">
				</div>
				
				</h6><br><br>
				<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm text-center" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="late_officer_sign" disabled>
						<h6>Signature of the Administering Officer</h6>
						<input type="text" class="form-control form-control-sm text-center" id="late_sworn_name" name="late_sworn_name" onkeypress="return isTextKey(event)">
						<h6>Name in Print</h6>
					</div>
					<div class="col-6" align="center">
						<!-- Default to MUNICIPAL CIVIL REGISTRAR but editable -->
						<input type="text" class="form-control form-control-sm text-center" id="late_sworn_position" name="late_sworn_position" onkeypress="return isTextKey(event)">
						<h6>Position/Title/Designation</h6>
						<!-- Default to GERONA TARLAC but editable -->
						<input type="text" class="form-control form-control-sm text-center" id="late_sworn_address" name="late_sworn_address" onkeypress="return isTextKey(event)">
						<h6>Address</h6>
					</div>
				</div>
			</div>
		</div><!--close row-->
	</div>
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
    
    // Helper function to add ordinal suffixes (1ST, 2ND, etc.)
    function getOrdinal(n) {
        let s = ["TH", "ST", "ND", "RD"],
            v = n % 100;
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

  function syncCurrentField(focusedElement) {
    const rawData = localStorage.getItem('birth_form_data');
    const data = rawData ? JSON.parse(rawData) : {};
    
    const elementId = $(focusedElement).attr('id');
    let valueToFill = "";

    const now = new Date();
    const currentDay = now.getDate();
    const currentYear = now.getFullYear();
    const currentMonthName = now.toLocaleString('default', { month: 'long' }).toUpperCase();

    const fName = `${data.father_fname || ''} ${data.father_mname || ''} ${data.father_lname || ''}`.trim().toUpperCase();
    const mName = `${data.mother_fname || ''} ${data.mother_mname || ''} ${data.mother_lname || ''}`.trim().toUpperCase();

    switch (elementId) {
        // --- DATE FIELDS ---
        case 'sworn_day':
        case 'ack_sworn_day':
        case 'sign_day':
            valueToFill = getOrdinal(currentDay);
            break;
        case 'sworn_month':
        case 'ack_sworn_month':
        case 'sign_month':  
            valueToFill = currentMonthName;
            break;
        case 'sworn_year':
        case 'ack_sworn_year':
        case 'sign_year':
            valueToFill = currentYear.toString();
            break;
        
        // --- APPLICANT / INFORMANT ---
        case 'late_name': 
        case 'affiant_name':
            valueToFill = data.informant_name || "";
            break;
        case 'late_address':
            valueToFill = data.informant_address || "";
            break;
        case 'applicant_than_owner':
        case 'applicant_relation':  
            valueToFill = data.rel_child || "";
            break;

        // --- BIRTH PLACE ---
        case 'birth_place':
        case 'bplace1':
        case 'bplace2':
        case 'late_birth_in':
        case 'late_birth_in2':
            valueToFill = data.birth_place || ""; 
            break;

		case 'birth_date':
		case 'bday2':
		case 'bday1':
		case 'late_birth_on':
			// Pull the 'birth_day' key saved by Page 1
			let storedDate = data.birth_day || ""; 
			if (storedDate) {
				// This will now return "MONTH DAY YEAR"
				valueToFill = formatDateFormal(storedDate);
			}
			break;

        // --- 3. CITIZENSHIP (NEW) ---
        case 'late_citizen': 
            valueToFill = "PHILIPPINES";
            break;

        // --- OFFICER DATA ---
        case 'ack_sworn_name':
        case 'late_sworn_name':
            valueToFill = data.civil_name || "";
            break;
        case 'ack_sworn_position':
        case 'late_sworn_position':
            valueToFill = data.civil_position || "MUNICIPAL CIVIL REGISTRAR"; 
            break;
        case 'ack_sworn_address':
        case 'late_sworn_address':
        case 'sworn_at':
        case 'sign_at':
            valueToFill = "GERONA, TARLAC"; 
            break;

        // --- PARENT NAMES ---
        case 'child_name':
        case 'childlatename':
        case 'late_birth_of':
            valueToFill = `${data.child_fname || ''} ${data.child_mname || ''} ${data.child_lname || ''}`;
            break;
        case 'father_name':
        case 'father_sign':
        case 'ack_father_sworn':
		case 'not_married_txt':
            valueToFill = fName;
            break;
        case 'mother_name':
        case 'mother_sign':
        case 'ack_mother_sworn':
            valueToFill = mName;
            break;
            
        // --- MARRIAGE ---
        case 'married_txt1':
            valueToFill = data.marriage_date || "";
            break;
        case 'married_txt2': 
            valueToFill = data.marriage_place || "";
            break;
            
        // --- ATTENDANT ---
        case 'attend_birth_by':
            valueToFill = data.attendant_name || "";
            break;


        case 'who_resides_at':
            valueToFill = data.attendant_address || "";
            break;
    }

    if (valueToFill) {
        $(focusedElement).val(valueToFill.trim().toUpperCase());
    }
}

    $('input').on('keydown', function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); 
            syncCurrentField(this);

            // Move to next field
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