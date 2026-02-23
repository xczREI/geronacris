<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
	<!--birth form-->
	<div class="form" style="padding:0 15px 0 15px;">
	 	<!-- Header -->
	  	<div class="row"><!--grid of header-->
		 	<div class="col-9" style="border: 2px solid #f30956;">
				<p class="m1">Municipal Form No. 97</p>
			  	<p class="m1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span align="center" class="m2" style="font-size: 15px;">Republic of the Philippines</span></p>
			  	<p align="center" class="m2" style="font-size: 16px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
			  	<p align="center" class="m2" style="font-size: 30px; font-weight: bold;">CERTIFICATE OF MARRIAGE</p>
			</div>
		  	<div class="col-3" id="book" style="border: 2px solid #f30956; border-left:none; border-bottom:none;">
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
		 	<div class="col-9" style="border: 2px solid #f30956; border-top: none; padding-left:0;">
		 		<div class="input-group mt-1">
			  		<div class="input-group-prepend">
			      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;Province&nbsp;&emsp;&emsp;&emsp;&emsp;</span>
			  		</div>
			    	<input type="text" class="form-control form-control-sm" name="provinces" id="birth_txt" value="<?php echo $row['province']; ?>"  required>
				</div>
				<div class="input-group mt-1">
			  		<div class="input-group-prepend">
			      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;City/Municipality&nbsp;&nbsp;</span>
			 		</div>
			    	<input type="text" class="form-control form-control-sm" name="municipal" id="birth_txt" value="<?php echo $row['municipal']; ?>"  required>
				</div>
			</div>
			<div class="col-3" id="book" style="border: 2px solid #f30956;border-left:none; border-top: none;">
				<div class="form-group">
			 		<label id="ltxt">Registry No.</label>
			  		<input type="text" class="regNo form-control form-control-sm" name="registry_no" id="txt" value="<?php echo $row['registry_no']; ?>">
			  		<div id="error"></div>
				</div>
		 	</div>
		</div><!--close row-->
		<!-- Person Info -->
	  	<div class="row">
		  	<div class="col" style="border: 2px solid #f30956; border-top: none;">
				<div class="row">
					<div class="col-2" style="border-right: 1px solid #f30956;padding-top:20px;">
			  			<h6 style="padding-top:2px; font-size:14px;">1.&nbsp;Name of <br>&emsp;Contracting <br>&emsp;Parties</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col" style="border-bottom: 1px solid #f30956;">
			  					<h6 style="margin:0;font-weight:bold;" align="center">HUSBAND</h6>
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col">
					   			<h6 style="color:#f30956;font-size:12px;">(First) 
								<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 89%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="h_fname" name="husband_fname" value="<?php echo $row['husband_fname']; ?>" >
								</div>
								(Middle) 
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 84%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="h_mname" name="husband_mname" value="<?php echo $row['husband_mname']; ?>" >
								</div>
								(Last) 
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 89%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="h_lname" name="husband_lname" value="<?php echo $row['husband_lname']; ?>" >
								</div>
								</h6>
			  				</div>
			  			</div>
			  		</div>
			 		<div class="col-5">
					   	<div class="row">
			  				<div class="col" style="border-bottom: 1px solid #f30956;">
			  					<h6 style="margin:0;font-weight:bold;" align="center">WIFE</h6>
			  				</div>
			  			</div>
			  			<div class="row">
			  				<div class="col">
					   			<h6 style="color:#f30956;font-size:12px;">(First) 
								<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width: 89%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="w_fname" name="wife_fname" value="<?php echo $row['wife_fname']; ?>" >
								</div>
								(Middle) 
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 84%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="w_mname" name="wife_mname" value="<?php echo $row['wife_mname']; ?>" >
								</div>
								(Last) 
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 89%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="w_lname" name="wife_lname" value="<?php echo $row['wife_lname']; ?>" >
								</div>
								</h6>
			  				</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  			<h6 style="padding-top:2px; font-size:14px;">2a.&nbsp;Date of Birth<br>2b.&nbsp;Age</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col-9">
							   	<div class="row">
							  		<div class="col-4"><h6 align="center"><span style="color:#f30956;font-size:12px;">(Day)</span></h6></div>
							  		<div class="col-4"><h6 align="center"><span style="color:#f30956;font-size:12px;">(Month)</span></h6></div>
							  		<div class="col-4"><h6 align="center"><span style="color:#f30956;font-size:12px;">(Year)</span></h6></div>
							  	</div>
							  	<div class="input-group">
								   	<input type="text" class="form-control form-control-sm" name="husband_bdate" style="word-spacing: 2em; text-align:center;" value="<?php echo $row['husband_bdate']; ?>">
							   </div>
							</div>
							<div class="col-3">
							   	<h6 align="center" style="color:#f30956;font-size:12px;">(Age)</h6>
							  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_age" value="<?php echo $row['husband_age']; ?>">
							  	</div>
							</div>
			  			</div>
			  		</div>
					<div class="col-5">
					  	<div class="row">
			  				<div class="col-9">
					  		  	<div class="row">
					  				<div class="col-4"><h6 align="center"><span style="color:#f30956;font-size:12px;">(Day)</span></h6></div>
									<div class="col-4"><h6 align="center"><span style="color:#f30956;font-size:12px;">(Month)</span></h6></div>
									<div class="col-4"><h6 align="center"><span style="color:#f30956;font-size:12px;">(Year)</span></h6></div>
								</div>
							  	<div class="input-group">
									<input type="text" class="form-control form-control-sm" name="wife_bdate" style="word-spacing: 2em; text-align:center;" value="<?php echo $row['wife_bdate']; ?>">
								</div>
							</div>
							<div class="col-3">
							  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Age)</h6>
							  	<div class="input-group">
									<input type="text" class="form-control form-control-sm" placeholder="" name="wife_age" value="<?php echo $row['wife_age']; ?>">
								</div>
							</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  			<h6 style="padding-top:2px; font-size:14px;">3.&nbsp;Place of Birth</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
					  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;(City/Municipality)&emsp;&emsp;&emsp;&emsp;(Province)&emsp;&emsp;&emsp;&emsp;&emsp;(Country)</h6>
					  		  	<div class="input-group">
									<?php
									 $rawHusbandBplace = $row['husband_bplace'];
									 $husbandBplace = explode(',', $rawHusbandBplace);
									//  echo $husbandBplace[0];
									//  echo $husbandBplace[1];
									//  echo $husbandBplace[2];
									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_bplace" value="<?php echo $husbandBplace[0]; ?>" >
									<input type="text" class="form-control form-control-sm" placeholder="" name="husband_bplaceProvince" value="<?php echo $husbandBplace[1] ?? ''; ?>"  >
									<input type="text" class="form-control form-control-sm" placeholder="" name="husband_bplaceCountry" value="<?php echo $husbandBplace[2] ?? ''; ?>"  >
							  	</div>
					  		</div>
			  			</div>
			  		</div>
					<div class="col-5">
					  	<div class="row">
			  				<div class="col">
					  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;(City/Municipality)&emsp;&emsp;&emsp;&emsp;(Province)&emsp;&emsp;&emsp;&emsp;&emsp;(Country)</h6>
					  		  	<div class="input-group">
									<?php
									 $rawWifeBplace = $row['wife_bplace'];
									 $wifeBplace = explode(',', $rawWifeBplace);

									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_bplace" value="<?php echo $wifeBplace[0] ?? ''; ?>" >
									<input type="text" class="form-control form-control-sm" placeholder="" name="wife_bplaceProvince" value="<?php echo $wifeBplace[1] ?? ''; ?>" >
									<input type="text" class="form-control form-control-sm" placeholder="" name="wife_bplaceCountry" value="<?php echo $wifeBplace[2] ?? ''; ?>" >
							  	</div>
					  		</div>
			  			</div>
			  		</div>
				</div><!--close row-->
			 	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">4a.&nbsp;Sex<br>4b.&nbsp;Citizenship</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col-5" style="border-right: 1px solid #f30956;"><br>
					  		  	<div class="input-group">
					  		  		<select name="husband_sex" class="form-control form-control-sm">
										<option selected style="display:none;"><?php echo $row['husband_sex']; ?></option>
										<option value="Male" style="font-size:15px;">Male</option>
										<option value="Female" style="font-size:15px;" disabled="">Female</option>
									</select>

							  	</div>
					  		</div>
					  		<div class="col-7">
					  		  	<h6 style="color:#f30956;;font-size:12px;">(Citizenship)</h6>
					  		  	<div class="input-group" style="padding-top: 2px;">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_citizen" value="<?php echo $row['husband_citizen']; ?>" >
							  	</div>
					  		</div>
			  			</div>
			  		</div>
					<div class="col-5">
					 	<div class="row">
			  				<div class="col-5" style="border-right: 1px solid #f30956;"><br>
					  		  	<div class="input-group">
					  		  		<select name="wife_sex" class="form-control form-control-sm">
										<option selected style="display:none;"><?php echo $row['wife_sex']; ?></option>
										<option value="Male" style="font-size:15px;" disabled="">Male</option>
										<option value="Female" style="font-size:15px;">Female</option>
									</select>

							  	</div>
					  		</div>
					  		<div class="col-7">
					  		  	<h6 style="color:#f30956;;font-size:12px;">(Citizenship)</h6>
					  		  	<div class="input-group" style="padding-top: 2px;">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_citizen" value="<?php echo $row['wife_citizen']; ?>" >
							  	</div>
					  		</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			   			<h6 style="padding-top:2px; font-size:14px;">5.&nbsp;Residence</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
			  					<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
				  		  		<div class="input-group">
						    		<input type="text" class="form-control form-control-sm" placeholder="" name="husband_residence" value="<?php echo $row['husband_residence']; ?>">
						  		</div>
				  			</div>
			  			</div>
			  		</div>
					<div class="col-5">
					  	<div class="row">
			  				<div class="col">
			  					<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_residence" value="<?php echo $row['wife_residence']; ?>">
							  	</div>
					  		</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			   			<h6 style="padding-top:2px; font-size:14px;">6.&nbsp;Religion/<br>&emsp;Religious Sect</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_sect" value="<?php echo $row['husband_religion']; ?>" >
							  	</div>
					 		</div>
			  			</div>
			  		</div>
					<div class="col-5">
					  	<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_sect" value="<?php echo $row['wife_religion']; ?>" >
							  	</div>
					  		</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  			<h6 style="padding-top:2px; font-size:14px;">7.&nbsp;Civil Status</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_cstatus" value="<?php echo $row['husband_civil_status']; ?>" >
							  	</div>
					  		</div>
			  			</div>
			  		</div>
					<div class="col-5">
					 	<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_cstatus" value="<?php echo $row['wife_civil_status']; ?>" >
							  	</div>
					  		</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  			<h6 style="padding-top:2px; font-size:14px;">8.&nbsp;Name of<br>&emsp;Father</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
					  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
					  		  	<div class="input-group">
									<?php
									 $rawHusbandFather = $row['husband_father_name'];
									 $husbandFather = explode(',', $rawHusbandFather);

									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_fname" name="h_fa_name" style="text-align:center;" value="<?php echo $husbandFather[0] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_fname" name="h_fa_nameM" style="text-align:center;" value="<?php echo $husbandFather[1] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_fname" name="h_fa_nameL" style="text-align:center;" value="<?php echo $husbandFather[2] ?? ''; ?>">
							  	</div>
							</div>
			  			</div>
			  		</div>
					<div class="col-5">
					  	<div class="row">
			  				<div class="col">
					  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  	<div class="input-group">
								  <?php
									 $rawWifeFather = $row['wife_father_name'];
									 $wifeFather = explode(',', $rawWifeFather);

									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_fname" name="w_fa_name" style="text-align:center;" value="<?php echo $wifeFather[0] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="w_fa_fname" name="w_fa_nameM" style="text-align:center;" value="<?php echo $wifeFather[1] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="w_fa_fname" name="w_fa_nameL" style="text-align:center;" value="<?php echo $wifeFather[2] ?? ''; ?>">
							  	</div>
							</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">9.&nbsp;Citizenship</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="h_father_citizen" value="<?php echo $row['husband_father_citizen']; ?>" >
							  	</div>
					  		</div>
			  			</div>
			  		</div>
					<div class="col-5">
			  		  	<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_father_citizen" value="<?php echo $row['wife_father_citizen']; ?>" >
							  	</div>
							</div>
			  			</div>
					</div>
			  	</div><!--close row-->
				<div class="row" style="border-top: 2px solid #f30956;">
					<div class="col-2" style="border-right: 1px solid #f30956;">
			   			<h6 style="padding-top:2px; font-size:14px;">10.&nbsp;Maiden Name <br>&emsp;of Mother</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
							  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  	<div class="input-group">
									<?php
									 $rawHusbandMother = $row['husband_mother_name'];
									 $husbandMother = explode(',', $rawHusbandMother);

									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" id="h_mo_fname" name="h_mo_name" style="text-align:center;" value="<?php echo $husbandMother[0] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="h_mo_fnameM" name="h_mo_nameM" style="text-align:center;" value="<?php echo $husbandMother[1] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="h_mo_fnameL" name="h_mo_nameL" style="text-align:center;" value="<?php echo $husbandMother[2] ?? ''; ?>">
							  	</div>
							</div>
			  			</div>
			  		</div>
					<div class="col-5">
					   	<div class="row">
			  				<div class="col">
					  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
					  		  	<div class="input-group">
									<?php
									 $rawWifeMother = $row['wife_mother_name'];
									 $wifeMother = explode(',', $rawWifeMother);

									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_fname" name="w_mo_name" style="text-align:center;" value="<?php echo $wifeMother[0] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="w_mo_fname" name="w_mo_nameM" style="text-align:center;" value="<?php echo $wifeMother[1] ?? ''; ?>">
									<input type="text" class="form-control form-control-sm" placeholder="" id="w_mo_fname" name="w_mo_nameL" style="text-align:center;" value="<?php echo $wifeMother[2] ?? ''; ?>">
							  	</div>
							</div>
			  			</div>
					</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  			<h6 style="padding-top:2px; font-size:14px;">11.&nbsp;Citizenship</h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
									<input type="text" class="form-control form-control-sm" placeholder="" name="h_mother_citizen" value="<?php echo $row['husband_mother_citizen']; ?>" >
								</div>
							</div>
			  			</div>
			  		</div>
					<div class="col-5">
					 	<div class="row">
			  				<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_mother_citizen" value="<?php echo $row['wife_mother_citizen']; ?>" >
							  	</div>
					  		</div>
			  			</div>
					</div>
				</div><!--close row-->
				<div class="row" style="border-top: 2px solid #f30956;">
			  		<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  	<h6 style="padding-top:1px;font-size:14px;line-height:0.7;">12.&nbsp;<span style="font-size:10px;">Name of Person/ <br>&emsp;&emsp;Wali Who Gave<br>&emsp;&emsp;Consent or<br>&emsp;&emsp;Advice</span></h6>
			  		</div>
			  		<div class="col-5" style="border-right: 2px solid #f30956;">
			  			<div class="row">
			  				<div class="col">
							  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  	<div class="input-group">
									<?php
										$rawHusbandPerson = $row['husband_person_name'];
										$husbandPerson = explode(',', $rawHusbandPerson);
									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_name" value="<?php echo $husbandPerson[0] ?? ''; ?>" style="text-align:center;">
									<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_nameM" value="<?php echo $husbandPerson[1] ?? ''; ?>" style="text-align:center;">
									<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_nameL" value="<?php echo $husbandPerson[2] ?? ''; ?>" style="text-align:center;">
							  	</div>
					  		</div>
			  			</div>
			 		</div>
					<div class="col-5">
					  	<div class="row">
			  				<div class="col">
					  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
					  		  	<div class="input-group">
									<?php
										$rawWifePerson = $row['wife_person_name'];
										$wifePerson = explode(',', $rawWifePerson);
									?>
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_name" value="<?php echo $wifePerson[0] ?? ''; ?>" style="text-align:center;">
									<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_nameM" value="<?php echo $wifePerson[1] ?? '' ?>" style="text-align:center;">
									<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_nameL" value="<?php echo $wifePerson[2] ?? ''; ?>" style="text-align:center;">
							  	</div>
					  		</div>
			  			</div>
					</div>
				</div><!--close row-->
				<div class="row" style="border-top: 2px solid #f30956;">
					<div class="col-2" style="border-right: 1px solid #f30956;">
			  			<h6 style="padding-top:2px; font-size:14px;">13.&nbsp;Relationship</h6>
					</div>
					<div class="col-5" style="border-right: 2px solid #f30956;">
						<div class="row">
							<div class="col">
					  		  	<div class="input-group mt-2">
						    	<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_rel" value="<?php echo $row['husband_person_rel']; ?>" >
							  	</div>
					  		</div>
	  					</div>
	  				</div>
			  		<div class="col-5">
			  		  	<div class="row">
	  						<div class="col">
					  		  	<div class="input-group mt-2">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_rel" value="<?php echo $row['wife_person_rel']; ?>" >
							  	</div>
					  		</div>
	  					</div>
			  		</div>
			  	</div><!--close row-->
			  	<div class="row" style="border-top: 2px solid #f30956;">
	  				<div class="col-2" style="border-right: 1px solid #f30956;">
	  		  			<h6 style="padding-top:2px; font-size:14px;">14.&nbsp;Residence</h6>
	  				</div>
	  				<div class="col-5" style="border-right: 2px solid #f30956;">
	  					<div class="row">
	  						<div class="col">
	  							<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_residence" value="<?php echo $row['husband_person_residence']; ?>">
							  	</div>
					  		</div>
	  					</div>
	  				</div>
			  		<div class="col-5">
			  		  	<div class="row">
	  						<div class="col">
	  							<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
					  		  	<div class="input-group">
							    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_residence" value="<?php echo $row['wife_person_residence']; ?>">
							  	</div>
					  		</div>
	  					</div>
			  		</div>
	  			</div><!--close row-->

			</div><!--close col-->
		</div><!--close row-->
   		<!-- Med Cerf Info -->
		<div class="row">
  			<div class="col" style="border: 2px solid #f30956; border-top: none;">
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px;font-size: 14px;">15.&nbsp;Place of Marriage:
	  		  			<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:45%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="mrg_brgy" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['mrg_brgy']; ?>">
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:20%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="mrg_city" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['mrg_city']; ?>" >
						</div>
						<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:15%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" name="mrg_province" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['mrg_province']; ?>" >
						</div>
	  		  			</h6>
	  				</div>
	  			</div><!--close row-->
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="font-size: 10.5px;line-height: 8.9px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Office of the /House of/Barangay of/Church of/Mosque of)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(City/Municipal)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Province)</h6>
	  				</div>
	  			</div><!--close row-->
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px;font-size: 14px;">16.&nbsp;Date of Marriage:
	  		  			<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:40%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="" name="mrg_date" style="border-bottom: 1px dotted #f30956; word-spacing:3em; text-align:center;" value="<?php echo $row['mrg_date']; ?>">
						</div>&emsp;&emsp;&emsp;
						17.&nbsp;Time of Marriage:
	  		  			<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:17%;margin-right: 0;">
							<input type="time" class="form-control form-control-sm text-center" name="mrg_time" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['mrg_time']; ?>" onkeypress="return isTextNoKey(event)">
						</div>
						am/pm
						</h6>
	  				</div>
	  			</div><!--close row-->
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="font-size:10.5px; line-height:8.9px; color:#f30956;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Day)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Month)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Year)</h6>
	  				</div>
	  			</div><!--close row-->
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px; font-size:14px;">18.&nbsp;CERTIFICATION OF THE CONTRACTING PARTIES:</h6>
	  		  			<h6 style="font-size:13px;">&emsp;&emsp;&emsp;&emsp;THIS IS TO CERTIFY: That I,
	  		  			<div class="custom-control custom-control-inline" style="padding:0; width:30%; margin-right:0;">
							<input type="text" class="form-control form-control-sm" id="husband_name" name="husband_name" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['husband_fname'].' '.$row['husband_mname'].' '.$row['husband_lname']; ?>"  readonly>
						</div>
						and I,
						<div class="custom-control custom-control-inline" style="padding: 0; width: 30%;margin-right: 0;">
							<input type="text" class="form-control form-control-sm" id="wife_name" name="wife_name" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['wife_fname'].' '.$row['wife_mname'].' '.$row['wife_lname'];?>"  readonly>
						</div>
						born of <br>
						legal age, of our free will and accord, and in the presence of the person solemnizing this marriage and of the witnesses named below, take each other <br>as husband and wife and certifying further that we:
						<?php
							$certify_type = $row['mrg_certify_type'];
							if($certify_type == 'entered'){
						?>
							<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
								<input type="checkbox" class="custom-control-input" name="certify_type" id="have_enter" value="entered" checked="">
								<label class="custom-control-label" for="have_enter">have entered</label>
							</div>
							, a copy of which is hereto attached/
							<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
								<input type="checkbox" class="custom-control-input" name="certify_type" id="not_enter" value="not entered">
								<label class="custom-control-label" for="not_enter">have not entered</label>
							</div>
						<?php } else if($certify_type == 'not entered') { ?>
							<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
								<input type="checkbox" class="custom-control-input" name="certify_type" id="have_enter" value="entered">
    							<label class="custom-control-label" for="have_enter">have entered</label>
							</div>
							, a copy of which is hereto attached/
							<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
								<input type="checkbox" class="custom-control-input" name="certify_type" id="not_enter" value="not entered" checked="">
   								<label class="custom-control-label" for="not_enter">have not entered</label>
							</div>
						<?php }else{ ?>
							<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
								<input type="checkbox" class="custom-control-input" name="certify_type" id="have_enter" value="entered">
   								<label class="custom-control-label" for="have_enter">have entered</label>
							</div>
							, a copy of which is hereto attached/
							<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
								<input type="checkbox" class="custom-control-input" name="certify_type" id="not_enter" value="not entered">
   								<label class="custom-control-label" for="not_enter">have not entered</label>
							</div>
						<?php } ?>

						into a marriage settlement.<br>
						&emsp;&emsp;&emsp;&emsp;IN WITNESS WHEREOF, we signed /marked with our fingerprint this certificate in quadruplicate this
	  		  			<div class="custom-control custom-control-inline" style="padding:0; width:7%; margin-right:0;">
							<input type="text" class="form-control form-control-sm" id="mrg_days" name="mrg_days" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['mrg_cerf_day']; ?>">
						</div>
						day of
						<div class="custom-control custom-control-inline" style="padding:0; width:10%;margin-right:0;">
							<input type="text" class="form-control form-control-sm" id="mrg_months" name="mrg_months" value="<?php echo $row['mrg_cerf_month']; ?>" style="border-bottom: 1px dotted #f30956;" >
						</div>
						,
						<div class="custom-control custom-control-inline" style="padding:0; width:7%;margin-right:0;">
							<input type="text" class="form-control form-control-sm" id="mrg_years" name="mrg_years" maxlength="4" style="border-bottom: 1px dotted #f30956;" value="<?php echo $row['mrg_cerf_year']; ?>">
						</div>
						</h6>
	  				</div>
	  			</div><!--close row-->
	  			<div class="row">
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="" disabled="">
						<h6 style="font-size:14px;">(Signature of Husband)</h6>
					</div>
					<div class="col-6" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="" disabled="">
						<h6 style="font-size:14px;">(Signature of Wife)</h6>
					</div>
				</div>
				<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px; font-size:14px;">19.&nbsp;CERTIFICATION OF THE SOLEMNIZING OFFICER:</h6>
	  		  			<h6 style="font-size:13px;">&emsp;&emsp;&emsp;&emsp;THIS IS TO CERTIFY: THAT BEFORE ME, 
	  		  			 on the date and place above-written, personally appeared the above-mentioned parties, with their mutual consent, lawfully joined together in marriage which was solemnized by me in the presence of the witnessess named below, all of legal age.
						</h6>
						<h6 style="font-size:13px;">&emsp;&emsp;&emsp;&emsp;I CERTIFY FURTHER THAT: <br>
						<?php
							$solemn_type = $row['mrg_solemn_type'];
							if($solemn_type == 'marriage license'){
								include 'mrg_license_no.php';
							}else if($solemn_type == 'no marriage license'){
								include 'mrg_no_license.php';
							}else if($solemn_type == 'presidential decree no. 1083'){
								include 'mrg_decree.php';
							}else{
						 ?>
							<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
								<input type="checkbox" class="custom-control-input" id="mrg_license" name="mrg_solemn_type" value="marriage license">
	      						<label class="custom-control-label" for="mrg_license" style="font-size: 14px;">&nbsp;a. Marriage License No.</label>
							</div>
							<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
								<input type="text" class="form-control form-control-sm" id="mrg_license_no" name="mrg_license_no">
							</div>
							issued on
							<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
								<input type="text" class="form-control form-control-sm" id="mrg_license_on" name="mrg_license_on">
							</div>
							at
							<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
								<input type="text" class="form-control form-control-sm" id="mrg_license_at" name="mrg_license_at" >
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
						<?php } ?>
							was solemnized in accordance with the provisions of Presidential Decree No. 1083.
						</h6>
	  				</div>
	  			</div><!--close row-->
	  			<div class="row">
					<div class="col-4" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="mrg_solemn_name" value="<?php echo $row['mrg_solemn_name']; ?>" >
						<h6 style="font-size:10.5px;">(Signature Over Printed Name of Solemnizing Officer)</h6>
					</div>
					<div class="col-3" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="mrg_solemn_position" value="<?php echo $row['mrg_solemn_position']; ?>">
						<h6 style="font-size:11px;">(Position/Designation)</h6>
					</div>
					<div class="col-5" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="mrg_solemn_other" value="<?php echo $row['mrg_solemn_other']; ?>">
						<h6 style="font-size:11px;">(Religion/Religious Sect, Registry No.and Exiration Date, if applicable)</h6>
					</div>
				</div>
				<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px; font-size:14px;">20a.&nbsp;WITNESSES (Print Name and Sign):<br>&emsp;&emsp;Addition at the back</h6>
	  				</div>
	  			</div><!--close row-->
	  			<div class="row" style="padding-bottom: 2px;">
					<div class="col-3" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="witness1" value="<?php echo $row['witness1']; ?>" >
					</div>
					<div class="col-3" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness2" value="<?php echo $row['witness2']; ?>" >
					</div>
					<div class="col-3" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness3" value="<?php echo $row['witness3']; ?>" >
					</div>
					<div class="col-3" align="center">
						<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness4" value="<?php echo $row['witness4']; ?>" >
					</div>
				</div><!--close row-->

			</div>
		</div><!--close row-->
  
 		<!-- Received by -->
		<div class="row" style="border-right: 2px solid #f30956; border-left: 2px solid #f30956;">
  			<div class="col">
  				<div class="row">
	  				<div class="col-6" style="border-right: 2px solid #f30956;">
	  					<h6 style="padding-top:2px; font-size:14px;">28. RECEIVED BY</h6>
	  		  			<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: #f30956;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="received_name" value="<?php echo $row['received_name']; ?>" >
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="received_position" value="<?php echo $row['received_position']; ?>">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="received_date" value="<?php echo $row['received_date']; ?>">
						</div>
	  				</div>
			  		<div class="col-6">
			  		  	<h6 style="padding-top:2px; font-size:14px;">29. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
	  		  			<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: #f30956;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="civil_name" value="<?php echo $row['civil_name']; ?>" >
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="civil_position" value="<?php echo $row['civil_position']; ?>">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="civil_date" value="<?php echo $row['civil_date']; ?>">
						</div>
			  		</div>
	    		</div><!--close row-->

		  	</div><!--close row-->
		</div><!--close col-->
 		<!-- Remarks -->
		<div class="row" style="border: 2px solid #f30956; border-bottom:none;">
  			<div class="col">
  				<div class="row">
	  				<div class="col">
	  					<h6 style="padding-top:2px; font-weight:bold; font-size:12px;">REMARKS/ANNOTATIONS (For LCRO/OCRG/Shari's Circuit Registrar Use Only)</h6>
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
		<div class="row" style="border: 2px solid #f30956;">
  			<div class="col">
  				<div class="row">
	  				<div class="col">
	  					<h6 style="padding-top:2px; font-size: 14px; font-weight:bold;">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
	  					<h6 style="margin-bottom:0; font-size:12px;">4bH&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;4bW&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;5H&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;5W&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;6H&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;6W&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;7H&emsp;&emsp;&emsp;7W</h6>
	  					<div class="flex-container">
						  	<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
						  	<div style="margin-right: 15px;">
						  		<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
						  	<div style="border-right:none;">
						  		<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
							<div style="margin-right: 15px;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div> 
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div> 
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="margin-right: 15px;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div> 
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div> 
							<div style="border-right:none;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="margin-right: 15px;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div>
							<div style="border-right:none;">
								<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
						  	<div style="margin-right: 15px;">
						  		<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
						  	<div style="border-right:none;">
						  		<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
							<div style="margin-right: 15px;">
							  	<input type="text" class="form-control form-control-sm" disabled="">
							</div> 
							<div style="margin-right: 15px;">
						  		<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
						  	<div style="margin-right: 15px;">
						  		<input type="text" class="form-control form-control-sm" disabled="">
						  	</div>
						</div>
			  		</div>
	    		</div><!--close row-->

		  	</div><!--close row-->
		</div><!--close col-->

	 </div>
</div>

<script src = "../../js/input_txt_only.js"></script>
<script src = "../../js/input_no_only.js"></script>
<script src = "../../js/mrg_time_js.js"></script>
<script src = "../../js/input_tno_only.js"></script>
<script>
	const hFname = document.getElementById('h_fname');
	const hMname = document.getElementById('h_mname');
	const hLname = document.getElementById('h_lname');
	const fullName = document.getElementById('husband_name');

	function updateFullName() {
		const fname = hFname.value;
		const mname = hMname.value;
		const lname = hLname.value;
		fullName.value = fname + ' ' + mname + ' ' + lname;
	}
	hFname.addEventListener('input', updateFullName);
	hMname.addEventListener('input', updateFullName);
	hLname.addEventListener('input', updateFullName);
</script>
<script>
	const wFname = document.getElementById('w_fname');
	const wMname = document.getElementById('w_mname');
	const wLname = document.getElementById('w_lname');
	const wFullName = document.getElementById('wife_name');

	function updateWFullName() {
		const fname = wFname.value;
		const mname = wMname.value;
		const lname = wLname.value;
		wFullName.value = fname + ' ' + mname + ' ' + lname;
	}
	wFname.addEventListener('input', updateWFullName);
	wMname.addEventListener('input', updateWFullName);
	wLname.addEventListener('input', updateWFullName);
</script>
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