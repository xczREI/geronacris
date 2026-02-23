<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
	<!--birth form-->
		<div class="form" style="padding:0 15px 0 15px;">

				<div class="row" style="border: 2px solid #f30956;border-bottom:none;">
			  		<div class="col">
			  		  	<h6 style="padding-top:2px; font-size:14px;">20b.&nbsp;WITNESSES (Print Name and Sign):</h6>
			  		
					  	<div class="row" style="padding-bottom: 2px;">
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="witness5" value="<?php echo $row['witness5']; ?>" >
								<input type="text" class="form-control form-control-sm mt-3" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="witness9" value="<?php echo $row['witness9']; ?>" >
							</div>
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness6" value="<?php echo $row['witness6']; ?>" >
								<input type="text" class="form-control form-control-sm mt-3" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="witness10" value="<?php echo $row['witness10']; ?>" >
							</div>
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness7" value="<?php echo $row['witness7']; ?>" >
								<input type="text" class="form-control form-control-sm mt-3" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="witness11" value="<?php echo $row['witness11']; ?>" >
							</div>
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness8" value="<?php echo $row['witness8']; ?>" >
								<input type="text" class="form-control form-control-sm mt-3" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="witness12" value="<?php echo $row['witness12']; ?>" >
							</div>
						</div><!--close row-->

					</div>
			  	</div><!--close row-->

				<div class="row">
				  	<div class="col" style="border: 2px solid #f30956;">
				  		<h6 style="font-weight:bold;" align="center">AFFIDAVIT OF SOLEMNIZING OFFICER</h6>

					  	<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;&emsp;&emsp;I,
				  		<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_solemn_name" value="<?php echo $row['aff_solemn_name']; ?>" >
						</div>
						, of legal age, Solemnizing Officer of
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 25%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_solemn_of" value="<?php echo $row['aff_solemn_of']; ?>">
						</div>
						with address at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_solemn_at" value="<?php echo $row['aff_solemn_at']; ?>" >
						</div>
						, after having sworn to in accordance with law, do hereby depose and say:
						</h6>

						<h6 style="font-size:14px;">1.&emsp;That I have solemnized the marriage between 
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt1" name="aff_hus_name" value="<?php echo $row['aff_hus_name']; ?>" >
						</div>
						and
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="the_birth_txt1" name="aff_wife_name" value="<?php echo $row['aff_wife_name']; ?>" >
						</div>
						.
						</h6>

						<h6 style="font-size:14px;">2.&emsp;
						<?php 
							if($row['aff_2type']=='a'){
								include'aff_a.php';
							}else if($row['aff_2type']=='b'){
								include'aff_b.php';
							}else if($row['aff_2type']=='c'){
								include'aff_c.php';
							}else if($row['aff_2type']=='d'){
								include'aff_d.php';
							}else if($row['aff_2type']=='e'){
								include'aff_e.php';
							}else{
								include'aff_f.php';
							}
						?>

						</h6>
						
						<h6 style="font-size:14px;">3.&emsp;That I took the necessary steps to ascertain the ages and relationship of the contracting parties and that neither of them are under any legal impediment to marry each other;
						</h6>
						
						<h6 style="font-size:14px;">4.&emsp;That I am executing this affidavit to attest to the truthfulness of the foregoing statements for all legal intents and purposes.
						</h6>
						<br>

						<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;In truth whereof, I have affixed my signature below this
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 10%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sign_day" id="aff_sign_day" value="<?php echo $row['aff_sign_day']; ?>">
						</div>
						day of
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 25%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sign_month" value="<?php echo $row['aff_sign_month']; ?>" >
						</div>
						,
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 12%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sign_year" maxlength="4" value="<?php echo $row['aff_sign_year']; ?>" >
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sign_at" value="<?php echo $row['aff_sign_at']; ?>" >
						</div>
						, Philippines.
						</h6>

						<div class="row">
							<div class="col-7" align="center">
							</div>
							<div class="col-5" align="center">
								<input type="text" class="form-control form-control-sm" name="aff_sign_name" value="<?php echo $row['aff_sign_name']; ?>" >
								<h6 style="font-size:14px;">Signature Over Printed Name of the Solemnizing Officer</h6>
							</div>
						</div>
						<br>

						<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBCRIBED AND SWORN</span> to before me this
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 7%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sworn_day" id="aff_sworn_day" value="<?php echo $row['aff_sworn_day']; ?>">
						</div>
						day of
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sworn_month" value="<?php echo $row['aff_sworn_month']; ?>" >
						</div>
						,
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 10%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" maxlength="4" name="aff_sworn_year" value="<?php echo $row['aff_sworn_year']; ?>" >
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 37%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sworn_at" value="<?php echo $row['aff_sworn_at']; ?>" >
						</div>
						<span>, Philippines, affiant who exhibited to me his/her CTC/valid ID</span>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_sworn_ctc" value="<?php echo $row['aff_sworn_ctc']; ?>" >
						</div>
						issued on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_issued_on" value="<?php echo $row['aff_issued_on']; ?>">
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="aff_issued_at" value="<?php echo $row['aff_issued_at']; ?>" >
						</div>
						.
						</h6>
						<br><br>
						<div class="row">
							<div class="col-6" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: #f30956;border-radius: 0;" name="solemnizing" disabled>
								<h6 style="font-size:14px;">Signature of the Administering Officer</h6>
								<input type="text" class="form-control form-control-sm" name="aff_admin_name" value="<?php echo $row['aff_admin_name']; ?>" >
								<h6 style="font-size:14px;">Name in Print</h6>
							</div>
							<div class="col-6" align="center">
								<input type="text" class="form-control form-control-sm" name="aff_admin_title" value="<?php echo $row['aff_admin_title']; ?>">
								<h6 style="font-size:14px;">Position/Title/Designation</h6>
								<input type="text" class="form-control form-control-sm" name="aff_admin_address" value="<?php echo $row['aff_admin_address']; ?>" >
								<h6 style="font-size:14px;">Address</h6>
							</div>
						</div>

				  	</div>
			  	</div><!--close row-->
			  	<!-- Affidavit of Delayed Registration-->
			  	<div class="row">
				  	<div class="col" style="border: 2px solid #f30956; border-top: none;">
				  		<h6 style="padding-top:10px; font-size:13px;line-height: 0.7;" align="center"><span style="font-weight: bold;font-size:23px;"><center>AFFIDAVIT FOR DELAYED REGISTRATION OF MARRIAGE</center></span></h6>

				  		<h6 style="padding-top:10px;font-size:14px;">&emsp;&emsp;&emsp;&emsp;I
				  		<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 40%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_name" value="<?php echo $row['late_name']; ?>" >
						</div>
						, of legal age, single/married/divorced/widow/widower, with residence and postal address
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 86%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_address" value="<?php echo $row['late_address']; ?>" >
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: #f30956;border-radius: 0;" disabled>
						</div>
						<span style="letter-spacing:1px;">, after having been duly sworn in accordance with law, do hereby depose and say:</span>
						</h6>

						<h6 style="font-size:14px;">1.&emsp;That I am the applicant for the delayed registration of:<br>
						&emsp;&emsp;&emsp;&emsp;&emsp;
						<?php
							$late_mrg_type = $row['late_reg_type'];
							if($late_mrg_type == 'my marriage'){
								include 'my_mrg.php';
							}else if ($late_mrg_type == 'the marriage') {
								include 'the_mrg.php';
							}else{
						 ?>
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="my_mrg" name="late_marriage_type1" value="my marriage">
      						<label class="custom-control-label" for="my_mrg" style="font-size: 14px;">&nbsp;my marriage with</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 25%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt1" name="late_marriage_with" >
						</div>
						in
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_marriage_in1" >
						</div>
						on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_marriage_on2">
						</div>
						&emsp;&emsp;&emsp;&emsp;&emsp;
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="the_mrg" name="late_marriage_type2" value="the marriage">
      						<label class="custom-control-label" for="the_mrg" style="font-size: 14px;">&nbsp;the marriage between</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="the_birth_txt1" name="late_mrg_h" >
						</div>
						and
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="the_birth_txt2" name="late_mrg_w" >
						</div>
						in
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 28%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_marriage_in3" >
						</div>
						on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 34%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="the_birth_txt3" name="late_marriage_on4">
						</div>
						<?php } ?>
						.
						</h6>

						<h6 style="font-size:14px;">2.&emsp;That said marriage was solemnized by
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="solemnized_by" value="<?php echo $row['late_solemn_name'] ?>" >
						</div>
						(Solemnizing Officer's name) under
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						<?php
							$late_sect_type = $row['late_sect_type'];

							if($late_sect_type == 'religious ceremony'){
								include 'religious.php';
							}else if($late_sect_type == 'civil ceremony'){
								include 'civil.php';
							}else if($late_sect_type == 'Muslim rites'){
								include 'muslim.php';
							}else if($late_sect_type == 'tribal rites'){
								include 'tribal.php';
							}else{
						 ?>
						a. <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="religious" name="late_sect_type1" value="religious ceremony">
      						<label class="custom-control-label" for="religious" style="font-size: 14px;">&nbsp;religious ceremony</label>
						</div> 
						&emsp;
						b. <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="civil" name="late_sect_type2" value="civil ceremony">
      						<label class="custom-control-label" for="civil" style="font-size: 14px;">&nbsp;civil ceremony</label>
						</div> 
						&emsp;
						c. <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="muslim" name="late_sect_type3" value="Muslim rites">
      						<label class="custom-control-label" for="muslim" style="font-size: 14px;">&nbsp;Muslim rites</label>
						</div>
						&emsp; 
						d. <div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="tribal" name="late_sect_type4" value="tribal rites">
      						<label class="custom-control-label" for="tribal" style="font-size: 14px;">&nbsp;tribal rites</label>
						</div>
						<?php } ?> 
						</h6>

						<h6 style="font-size:14px;">3.&emsp;That the marriage was solemnized:<br>
						&emsp;&emsp;&emsp;
						<?php
							$late_mrg_type = $row['late_solemn_type'];
							if($late_mrg_type == 'marriage license'){
								include 'late_mrg_license.php';
							}else if($late_mrg_type == 'under Article'){
								include 'late_under_art.php';
							}else{
						 ?>
						<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
							<input type="checkbox" class="custom-control-input" id="marriage" name="late_mrg_type" value="marriage license">
      						<label class="custom-control-label" for="marriage" style="font-size: 14px;">&nbsp;a. with marriage license no.</label>
						</div>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 10%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt1" name="late_mrg_no" >
						</div>
						issued on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_mrg_issued_on">
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 25%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="my_birth_txt2" name="late_mrg_issued_at" >
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
						<?php } ?>
						(marriages of exceptional character);
						</h6>

						<h6 style="font-size:14px;">4.&emsp;(If the applicant is either the wife or husband) That I am a citizen of 
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="married_txt1" name="late_h_citizen" value="<?php echo $row['applicant_hus_citizen']; ?>" >
						</div>
						and my spouse is a citizen of
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="married_txt1" name="late_w_citizen" value="<?php echo $row['applicant_wife_citizen']; ?>" >
						</div>
						;<br>
						&emsp;&nbsp;&nbsp;(If the applicant is other than the wife or husband) That the wife is a citizen of
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="married_txt1" name="late_h_citizen1"  value="<?php echo $row['other_hus_citizen'] ?>" >
						</div>
						and the husband <br>&emsp;&nbsp;&nbsp;is a citizen of
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="married_txt1" name="late_w_citizen1"  value="<?php echo $row['other_wife_citizen'] ?>" >
						</div>
						;
						</h6>

						<h6 style="font-size:14px;">5.&emsp;That the reason for the delay registering our/their marriage is
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 47%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_reason" value="<?php echo $row['late_reg_reason']; ?>">
						</div>
						
						;
						</h6>

						<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;In truth whereof, I have affixed my signature below this
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 10%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="sign_day" name="late_sign_day" value="<?php echo $row['late_sign_day']; ?>">
						</div>
						day of
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 25%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="sign_month" name="late_sign_month" value="<?php echo $row['late_sign_month']; ?>" >
						</div>
						,
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 12%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" maxlength="4" id="sign_year" name="late_sign_year" value="<?php echo $row['late_sign_year']; ?>" >
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 45%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="sign_at" name="late_sign_at" value="<?php echo $row['late_sign_at']; ?>" >
						</div>
						, Philippines.
						</h6>

						<div class="row">
							<div class="col-7" align="center">
							</div>
							<div class="col-5" align="center">
								<input type="text" class="form-control form-control-sm" name="affiant_name" value="<?php echo $row['late_affiant_name']; ?>" >
								<h6 style="font-size:14px;">Signature Over Printed Name of Affiant</h6>
							</div>
						</div>
						<br>

						<h6 style="font-size:14px;">&emsp;&emsp;&emsp;&emsp;<span style="font-weight: bold;">SUBCRIBED AND SWORN</span> to before me this
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 7%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="sworn_day" name="late_sworn_day" value="<?php echo $row['late_sworn_day']; ?>">
						</div>
						day of
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 35%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="sworn_month" name="late_sworn_month" value="<?php echo $row['late_sworn_month']; ?>" >
						</div>
						,
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 10%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="sworn_year" name="late_sworn_year" maxlength="4" value="<?php echo $row['late_sworn_year']; ?>" >
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 42%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="sworn_at" name="late_sworn_at" value="<?php echo $row['late_sworn_at']; ?>" >
						</div>
						<span style="letter-spacing: 1px;">, Philippines, affiant who exhibited to me his/her CTC/valid ID</span>
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_ctc" value="<?php echo $row['late_ctc']; ?>" >
						</div>
						issued on
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_issued_on" value="<?php echo $row['late_issued_on']; ?>">
						</div>
						at
						<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="late_issued_at" value="<?php echo $row['late_issued_at']; ?>" >
						</div>
						.
						</h6>
						<br><br>
						<div class="row">
							<div class="col-6" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: #f30956;border-radius: 0;" name="birthtimenum" disabled>
								<h6 style="font-size:14px;">Signature of the Administering Officer</h6>
								<input type="text" class="form-control form-control-sm" name="late_sworn_name" value="<?php echo $row['late_administer_name']; ?>" >
								<h6 style="font-size:14px;">Name in Print</h6>
							</div>
							<div class="col-6" align="center">
								<input type="text" class="form-control form-control-sm" name="late_sworn_position" value="<?php echo $row['late_administer_position']; ?>">
								<h6 style="font-size:14px;">Position/Title/Designation</h6>
								<input type="text" class="form-control form-control-sm" name="late_sworn_address" value="<?php echo $row['late_administer_address']; ?>" >
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
	$("#aff_sign_day").keyup(function(){
		var a = $("#aff_sign_day").val();
		if(a >= 32){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#aff_sign_day").val("");
		}else if(a == '00'){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#aff_sign_day").val("");
		}
	});

	$("#aff_sworn_day").keyup(function(){
		var a = $("#aff_sworn_day").val();
		if(a >= 32){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#aff_sworn_day").val("");
		}else if(a == '00'){
			alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
			$("#aff_sworn_day").val("");
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
