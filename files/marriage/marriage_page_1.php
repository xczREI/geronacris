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

<datalist id="country_list">
	<?php 
		require 'mycon.php';
		$sqlp = "SELECT * from tblcountry";
		$resultp = $connx->query($sqlp);
		
		
		while ($row = $resultp->fetch_assoc()) {
		echo "<option value='" . $row['country'] . "'>" . $row['country'] . "</option>";
		}								
	?>
</datalist>
<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
	<div class="form" style="padding:0 15px 0 15px;">
	 			<div class="row"><div class="col-9" style="border: 2px solid #f30956;">
					  	<p class="m1">Municipal Form No. 97</p>
					  	<p class="m1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span align="center" class="m2" style="font-size: 15px;">Republic of the Philippines</span></p>
					  	<p align="center" class="m2" style="font-size: 16px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
					  	<p align="center" class="m2" style="font-size: 30px; font-weight: bold;">CERTIFICATE OF MARRIAGE</p>
		  			</div>
		  			<div class="col-3" id="book" style="border: 2px solid #f30956; border-left:none; border-bottom:none;">
		     			<div class="form-group">
							<label id="ltxt">Book No.</label>
							<input type="text" class="bookNo form-control form-control-sm" id="bookno"  name="book_no">
							<input type="hidden" class="form-control form-control-sm" id="bookno1" name="book_no1">

							<label id="ltxt">Page No.</label>
							<input type="text" class="pageNo form-control form-control-sm" name="page_no" id="pageno" >
							<input type="hidden" class="form-control form-control-sm" name="page_no1" id="pageno1">

						<input type="hidden" name="time" id="hrs" value="">
							<input type="hidden" name="date" id="date" value="">
							<input type="hidden" name="emp_name" id="emp_name" value="<?php echo $_SESSION['lastname']; ?>">
						</div>
		  			</div>
	  			</div><div class="row"><div class="col-9" style="border: 2px solid #f30956; border-top: none; padding-left:0;">
				  		<div class="input-group mt-1">
					  		<div class="input-group-prepend">
					      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;Province&nbsp;&emsp;&emsp;&emsp;&emsp;</span>
					  		</div>
							  <input type="text" list='province_list' class="form-control form-control-sm" value="TARLAC" name="provinces"  required>
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
						</div>
				    	<div class="input-group mt-1">
					  		<div class="input-group-prepend">
					      		<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">&nbsp;City/Municipality&nbsp;&nbsp;</span>
					 		</div>
							 <input type="text" list='municipality_list' class="form-control form-control-sm" value="GERONA" name="municipal"  required>

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
						</div>
				  	</div>
				  	<div class="col-3" id="book" style="border: 2px solid #f30956;border-left:none; border-top: none;">
				    	<div class="form-group">
					  		<label id="ltxt">Registry No.</label>
					  		<input type="text" class="regNo form-control form-control-sm" name="registry_no" id="regno">
					  		<div id="error"></div>
						</div>
				  	</div>
			  	</div><div class="row">
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
											<input type="text" class="form-control form-control-sm h-inp" id="h_fname" name="husband_fname" style="text-align:center;">
										</div>
										(Middle) 
										<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 84%;margin-right: 0;">
											<input type="text" class="form-control form-control-sm h-inp" id="h_mname" name="husband_mname" style="text-align:center;">
										</div>
										(Last) 
										<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 89%;margin-right: 0;">
											<input type="text" class="form-control form-control-sm h-inp" id="h_lname" name="husband_lname" style="text-align:center;">
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
											<input type="text" class="form-control form-control-sm" id="w_fname" name="wife_fname" style="text-align:center;">
										</div>
										(Middle) 
										<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 84%;margin-right: 0;">
											<input type="text" class="form-control form-control-sm" id="w_mname" name="wife_mname" style="text-align:center;">
										</div>
										(Last) 
										<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0; width: 89%;margin-right: 0;">
											<input type="text" class="form-control form-control-sm" id="w_lname" name="wife_lname" style="text-align:center;">
										</div>
										</h6>
			  						</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">2a.&nbsp;Date of Birth<br>
			  		  			2b.&nbsp;Age</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col-2 pr-0">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Day)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" id="husband_bday" name="husband_bday" style="text-align:center;">
									  	</div>
							  		</div>
							  		<div class="col-4 pr-0">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Month)</h6>
							  		  	<div class="input-group">
							  		  		<select name="husband_bmonth" class="form-control form-control-sm">
												<option selected style="display:none;"></option>
												<option style="font-size:15px;">January</option>
												<option style="font-size:15px;">February</option>
												<option style="font-size:15px;">March</option>
												<option style="font-size:15px;">April</option>
												<option style="font-size:15px;">May</option>
												<option style="font-size:15px;">June</option>
												<option style="font-size:15px;">July</option>
												<option style="font-size:15px;">August</option>
												<option style="font-size:15px;">September</option>
												<option style="font-size:15px;">October</option>
												<option style="font-size:15px;">November</option>
												<option style="font-size:15px;">December</option>
											</select>
									  	</div>
							  		</div>
							  		<div class="col-3" style="border-right: 1px solid #f30956;">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Year)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" maxlength="5" name="husband_byear" style="text-align:center;">
									  	</div>
							  		</div>
							  		<div class="col-3">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Age)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_age" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col-2 pr-0">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Day)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" id="wife_bday" name="wife_bday" style="text-align:center;">
									  	</div>
							  		</div>
							  		<div class="col-4 pr-0">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Month)</h6>
							  		  	<div class="input-group">
							  		  		<select name="wife_bmonth" class="form-control form-control-sm">
												<option selected style="display:none;"></option>
												<option style="font-size:15px;">January</option>
												<option style="font-size:15px;">February</option>
												<option style="font-size:15px;">March</option>
												<option style="font-size:15px;">April</option>
												<option style="font-size:15px;">May</option>
												<option style="font-size:15px;">June</option>
												<option style="font-size:15px;">July</option>
												<option style="font-size:15px;">August</option>
												<option style="font-size:15px;">September</option>
												<option style="font-size:15px;">October</option>
												<option style="font-size:15px;">November</option>
												<option style="font-size:15px;">December</option>
											</select>
									  	</div>
							  		</div>
							  		<div class="col-3" style="border-right: 1px solid #f30956;">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Year)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" maxlength="5" name="wife_byear" style="text-align:center;">
									  	</div>
							  		</div>
							  		<div class="col-3">
							  		  	<h6 align="center" style="color:#f30956;;font-size:12px;">(Age)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_age" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">3.&nbsp;Place of Birth</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;(City/Municipality)&emsp;&emsp;&emsp;&emsp;(Province)&emsp;&emsp;&emsp;&emsp;&emsp;(Country)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_bplace" list='municipality_list'style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="husband_bplaceProvince" list='province_list' style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="husband_bplaceCountry" list='country_list' style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;(City/Municipality)&emsp;&emsp;&emsp;&emsp;(Province)&emsp;&emsp;&emsp;&emsp;&emsp;(Country)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_bplace"  list='municipality_list' style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="wife_bplaceProvince"  list='province_list' style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="wife_bplaceCountry"  list='country_list' style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">4a.&nbsp;Sex<br>
			  		  			4b.&nbsp;Citizenship</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col-5" style="border-right: 1px solid #f30956;"><br>
							  		  	<div class="input-group">
							  		  		<select name="husband_sex" class="form-control form-control-sm">
												<option style="display:none;"></option>
												<option value="Male" selected style="font-size:15px;" style="text-align:center;">Male</option>
												<option value="Female" style="font-size:15px;" disabled="" style="text-align:center;">Female</option>
											</select>
									  	</div>
							  		</div>
							  		<div class="col-7">
							  		  	<h6 style="color:#f30956;;font-size:12px;">(Citizenship)</h6>
							  		  	<div class="input-group" style="padding-top: 2px;">
									    	<select class="form-control form-control-sm" placeholder="" name="husband_citizen" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php
												require 'mycon.php';
												$sqlp = "SELECT * from tblcitizen";
												$resultp = $connx->query($sqlp);
												
												
												while ($row = $resultp->fetch_assoc()) {
												echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
												}
												
											?>
											 </select>
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col-5" style="border-right: 1px solid #f30956;"><br>
							  		  	<div class="input-group">
							  		  		<select name="wife_sex" class="form-control form-control-sm">
												<option style="display:none;"></option>
												<option value="Male" style="font-size:15px;" disabled="" style="text-align:center;">Male</option>
												<option value="Female" selected style="font-size:15px;" style="text-align:center;">Female</option>
											</select>
									  	</div>
							  		</div>
							  		<div class="col-7">
							  		  	<h6 style="color:#f30956;;font-size:12px;">(Citizenship)</h6>
							  		  	<div class="input-group" style="padding-top: 2px;">
									    	<select class="form-control form-control-sm" placeholder="" name="wife_citizen" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php
												require 'mycon.php';
												$sqlp = "SELECT * from tblcitizen";
												$resultp = $connx->query($sqlp);
												
												
												while ($row = $resultp->fetch_assoc()) {
												echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
												}
												
											?>
											 </select>
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">5.&nbsp;Residence</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
			  							<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_residence" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
			  							<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_residence" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">6.&nbsp;Religion/<br>&emsp;Religious Sect</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<select class="form-control form-control-sm text-uppercase" name="husband_sect" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php 
											require 'mycon.php';
													$sqlp = "SELECT * from tblreligious";
													$resultp = $connx->query($sqlp);
													
													
													while ($row = $resultp->fetch_assoc()) {
													echo "<option value='" . $row['relsec'] . "'>" . $row['relsec'] . "</option>";
													}
													
										?>
											</select>
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<select class="form-control form-control-sm text-uppercase" name="wife_sect" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php 
											require 'mycon.php';
													$sqlp = "SELECT * from tblreligious";
													$resultp = $connx->query($sqlp);
													
													
													while ($row = $resultp->fetch_assoc()) {
													echo "<option value='" . $row['relsec'] . "'>" . $row['relsec'] . "</option>";
													}
													
										?>
											</select>
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">7.&nbsp;Civil Status</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="husband_cstatus" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="wife_cstatus" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">8.&nbsp;Name of<br>&emsp;Father</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_fname" name="h_fa_name" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_mname" name="h_fa_nameM" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="h_fa_lname" name="h_fa_nameL" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" id="w_fa_fname" name="w_fa_name" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="w_fa_mname" name="w_fa_nameM" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="w_fa_lname" name="w_fa_nameL" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">9.&nbsp;Citizenship</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<select class="form-control form-control-sm" placeholder="" name="h_father_citizen" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php
												require 'mycon.php';
												$sqlp = "SELECT * from tblcitizen";
												$resultp = $connx->query($sqlp);
												
												
												while ($row = $resultp->fetch_assoc()) {
												echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
												}
												
											?>
											 </select>
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<select class="form-control form-control-sm" placeholder="" name="w_father_citizen" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php
												require 'mycon.php';
												$sqlp = "SELECT * from tblcitizen";
												$resultp = $connx->query($sqlp);
												
												
												while ($row = $resultp->fetch_assoc()) {
												echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
												}
												
											?>
											 </select>
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">10.&nbsp;Maiden Name <br>&emsp;of Mother</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" id="h_mo_fname" name="h_mo_name" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="h_mo_mname" name="h_mo_nameM" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="h_mo_lname" name="h_mo_nameL" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" id="w_mo_fname" name="w_mo_name" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="w_mo_mname" name="w_mo_nameM" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" id="w_mo_lname" name="w_mo_nameL" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">11.&nbsp;Citizenship</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<select class="form-control form-control-sm" placeholder="" name="h_mother_citizen" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php
												require 'mycon.php';
												$sqlp = "SELECT * from tblcitizen";
												$resultp = $connx->query($sqlp);
												
												
												while ($row = $resultp->fetch_assoc()) {
												echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
												}
												
											?>
											 </select>
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<select class="form-control form-control-sm" placeholder="" name="w_mother_citizen" style="text-align:center;">
											<option selected style="display:none;"></option>
											<?php
												require 'mycon.php';
												$sqlp = "SELECT * from tblcitizen";
												$resultp = $connx->query($sqlp);
												
												
												while ($row = $resultp->fetch_assoc()) {
												echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
												}
												
											?>
											 </select>
									  	</div>
							  		</div>
			  					</div>
					  		</div>
					  	</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:1px;font-size:14px;line-height:0.7;">12.&nbsp;<span style="font-size:10px;">Name of Person/ <br>&emsp;&emsp;Wali Who Gave<br>&emsp;&emsp;Consent or<br>&emsp;&emsp;Advice</span></h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_name" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_nameM" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_nameL" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<h6 style="color:#f30956;;font-size:12px;">&emsp;&emsp;&emsp;&emsp;(First)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Middle)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Last)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_name" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_nameM" style="text-align:center;">
											<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_nameL" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">13.&nbsp;Relationship</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_rel" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
							  		  	<div class="input-group mt-2">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_rel" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
					  	</div><div class="row" style="border-top: 2px solid #f30956;">
			  				<div class="col-2" style="border-right: 1px solid #f30956;">
			  		  			<h6 style="padding-top:2px; font-size:14px;">14.&nbsp;Residence</h6>
			  				</div>
			  				<div class="col-5" style="border-right: 2px solid #f30956;">
			  					<div class="row">
			  						<div class="col">
			  							<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="h_person_residence" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
			  				</div>
					  		<div class="col-5">
					  		  	<div class="row">
			  						<div class="col">
			  							<h6 align="center" style="color:#f30956;;font-size:12px;">(House No.,St.,Barangay, City/Municipality, Province, Country)</h6>
							  		  	<div class="input-group">
									    	<input type="text" class="form-control form-control-sm" placeholder="" name="w_person_residence" style="text-align:center;">
									  	</div>
							  		</div>
			  					</div>
					  		</div>
			  			</div></div></div><div class="row">
		  			<div class="col" style="border: 2px solid #f30956; border-top: none;">
			  			<div class="row">
			  				<div class="col">
			  		  			<h6 style="padding-top:2px;font-size: 14px;">15.&nbsp;Place of Marriage:
			  		  			<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:44%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="mrg_brgy" style="border-bottom: 1px dotted #f30956;text-align:center;">
								</div>
								<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:20%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="mrg_city" style="border-bottom: 1px dotted #f30956;"  list='municipality_list' style="text-align:center;">
								</div>
								<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:20%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" name="mrg_province" style="border-bottom: 1px dotted #f30956;"  list='province_list' style="text-align:center;">
								</div>
			  		  			</h6>
			  				</div>
			  			</div><div class="row">
			  				<div class="col">
			  		  			<h6 style="font-size: 10.5px;line-height: 8.9px;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Office of the /House of/Barangay of/Church of/Mosque of)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(City/Municipal)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Province)</h6>
			  				</div>
			  			</div><div class="row">
			  				<div class="col">
			  		  			<h6 style="padding-top:2px;font-size: 14px;">16.&nbsp;Date of Marriage:
			  		  			<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:40%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="mrg_day" name="mrg_day" style="border-bottom: 1px dotted #f30956; word-spacing:3em; text-align:center;" >
									<input type="text" class="form-control form-control-sm" id="mrg_month" name="mrg_month" style="border-bottom: 1px dotted #f30956; word-spacing:3em; text-align:center;">
									<input type="text" class="form-control form-control-sm" id="mrg_year" name="mrg_year" maxlength="4" style="border-bottom: 1px dotted #f30956; word-spacing:3em; text-align:center;" >
								</div>&emsp;&emsp;&emsp;
								17.&nbsp;Time of Marriage:
			  		  			<div class="custom-control custom-checkbox custom-control-inline" style="padding: 0; width:17%;margin-right: 0;">
									<input type="time" class="form-control form-control-sm text-center" name="mrg_time" style="border-bottom: 1px dotted #f30956;" >
								</div>
								am/pm
								</h6>
			  				</div>
			  			</div><div class="row">
			  				<div class="col">
			  		  			<h6 style="font-size:10.5px; line-height:8.9px; color:#f30956;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Day)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Month)&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(Year)</h6>
			  				</div>
			  			</div><div class="row">
			  				<div class="col">
			  		  			<h6 style="padding-top:2px; font-size:14px;">18.&nbsp;CERTIFICATION OF THE CONTRACTING PARTIES:</h6>

			  		  			<h6 style="font-size:13px;">&emsp;&emsp;&emsp;&emsp;THIS IS TO CERTIFY: That I,
			  		  			<div class="custom-control custom-control-inline" style="padding:0; width:30%; margin-right:0;">
									<input type="text" class="form-control form-control-sm" id="husband_name" name="husband_name" style="border-bottom: 1px dotted #f30956; text-align:center;" readonly>
									
								</div>
								and I,
								<div class="custom-control custom-control-inline" style="padding: 0; width: 30%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="wife_name" name="wife_name" style="border-bottom: 1px dotted #f30956;text-align:center;" readonly>
								</div>
								born of <br>
								legal age, of our free will and accord, and in the presence of the person solemnizing this marriage and of the witnesses named below, take each other <br>as husband and wife and certifying further that we:
								<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="have_enter" value="entered">
      								<label class="custom-control-label" for="have_enter">have entered</label>
								</div>
								, a copy of which is hereto attached/
								<div class="custom-control custom-checkbox custom-control-inline" style="margin:0;">
									<input type="checkbox" class="custom-control-input" name="certify_type" id="not_enter" value="not entered">
      								<label class="custom-control-label" for="not_enter">have not entered</label>
								</div>
								into a marriage settlement.<br>
								&emsp;&emsp;&emsp;&emsp;IN WITNESS WHEREOF, we signed /marked with our fingerprint this certificate in quadruplicate this
			  		  			<div class="custom-control custom-control-inline" style="padding:0; width:7%; margin-right:0;">
									<input type="text" class="form-control form-control-sm" id="mrg_days" name="mrg_days" style="border-bottom: 1px dotted #f30956; text-align:center;" >
								</div>
								day of
								<div class="custom-control custom-control-inline" style="padding:0; width:10%;margin-right:0;">
									<input type="text" class="form-control form-control-sm" id="mrg_months" name="mrg_months" style="border-bottom: 1px dotted #f30956;text-align:center;" >
								</div>
								,
								<div class="custom-control custom-control-inline" style="padding:0; width:7%;margin-right:0;">
									<input type="text" class="form-control form-control-sm" id="mrg_years" name="mrg_years" maxlength="4" style="border-bottom: 1px dotted #f30956; text-align:center;" >
								</div>
								</h6>
			  				</div>
			  			</div><div class="row">
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
								<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
									<input type="checkbox" class="custom-control-input" id="mrg_license" name="mrg_solemn_type" value="marriage license">
		      						<label class="custom-control-label" for="mrg_license" style="font-size: 14px;">&nbsp;a. Marriage License No.</label>
								</div>
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="mrg_license_no" name="mrg_license_no" style="text-align:center;">
								</div>
								issued on
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="mrg_license_on" name="mrg_license_on" style="text-align:center;">
								</div>
								at
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 23%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="mrg_license_at" name="mrg_license_at" style="text-align:center;">
								</div><br>
								&emsp;&emsp;&emsp;in favor of said parties, was exhibited to me.<br>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
									<input type="checkbox" class="custom-control-input" id="no_license" name="mrg_solemn_type" value="no marriage license">
		      						<label class="custom-control-label" for="no_license" style="font-size: 14px;">&nbsp;b. no marriage license</label>
								</div>
								was necessary, the marriage being solemnized under Art
								<div class="custom-control custom-checkbox custom-control-inline mt-1" style="padding: 0;width: 10%;margin-right: 0;">
									<input type="text" class="form-control form-control-sm" id="no_license_art" name="no_license_art" style="text-align:center;">
								</div>
								of Executive Order No. 209.<br>
								<div class="custom-control custom-checkbox custom-control-inline" style="margin-right: 0;">
									<input type="checkbox" class="custom-control-input" id="the_marriage" name="mrg_solemn_type" value="presidential decree no. 1083">
		      						<label class="custom-control-label" for="the_marriage" style="font-size: 14px;">&nbsp;c. the marriage </label>
								</div>
								was solemnized in accordance with the provisions of Presidential Decree No. 1083.
								</h6>
			  				</div>
			  			</div><div class="row">
							<div class="col-4" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="mrg_solemn_name" style="text-align:center;">
								<h6 style="font-size:10.5px;">(Signature Over Printed Name of Solemnizing Officer)</h6>
							</div>
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="mrg_solemn_position" style="text-align:center;">
								<h6 style="font-size:11px;">(Position/Designation)</h6>
							</div>
							<div class="col-5" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="mrg_solemn_other" style="text-align:center;">
								<h6 style="font-size:11px;">(Religion/Religious Sect, Registry No.and Exiration Date, if applicable)</h6>
							</div>
						</div>
						<div class="row">
			  				<div class="col">
			  		  			<h6 style="padding-top:2px; font-size:14px;">20a.&nbsp;WITNESSES (Print Name and Sign):<br>
			  		  			&emsp;&emsp;Addition at the back</h6>
			  				</div>
			  			</div><div class="row" style="padding-bottom: 2px;">
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="father_sign" name="witness1" style="text-align:center;">
							</div>
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness2" style="text-align:center;">
							</div>
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness3" style="text-align:center;">
							</div>
							<div class="col-3" align="center">
								<input type="text" class="form-control form-control-sm" style="background-color:white; border-bottom: 1px dotted #f30956; border-radius:0; text-align:center;" id="mother_sign" name="witness4" style="text-align:center;">
							</div>
						</div></div>
				</div><div class="row" style="border-right: 2px solid #f30956; border-left: 2px solid #f30956;">
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
					    			<input type="text" class="form-control form-control-sm" placeholder="" name="received_name" style="text-align:center;">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px; text-align:center;">Title or Position&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" placeholder="" name="received_position">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px; text-align:center;">Date&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="received_date" id="rec_date" value="">
								</div>
			  				</div>
					  		<div class="col-6">
					  		  	<h6 style="padding-top:2px; font-size:14px;">29. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
			  		  			<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" placeholder="" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: #f30956;border-radius: 0; text-align:center;" name="signature" disabled>
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" placeholder="" name="civil_name" style="text-align:center;">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" placeholder="" name="civil_position" style="text-align:center;">
								</div>
								<div class="input-group mt-1">
					  				<div class="input-group-prepend">
					      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  				</div>
					    			<input type="text" class="form-control form-control-sm" name="civil_date" id="civil_date" value="">	
								</div>
					  		</div>
			    		</div></div></div><div class="row" style="border: 2px solid #f30956; border-bottom:none;">
		  			<div class="col">
		  				<div class="row">
			  				<div class="col">
			  					<h6 style="padding-top:2px; font-weight:bold; font-size:12px;">REMARKS/ANNOTATIONS (For LCRO/OCRG/Shari's Circuit Registrar Use Only)</h6>
			  					<textarea style="width: 100%; height: 80px; font-size: 13px;" id="r"></textarea>
			  					<textarea style="width: 100%; height: 80px; font-size: 13px; display: none;" name="remarks" id="re"></textarea>
					  		</div>
			    		</div><script>
			    			$(document).ready(function(){
			    				$("#r").keyup(function(){
			    					var r = $("#r").val();
			    					r = r.replace(/  /g, "[sp][sp]");
			    					r = r.replace(/\n/g, "[nl]");
			    					$("#re").val(r);
			    				});
			    			});
			    		</script>

				  	</div></div><div class="row" style="border: 2px solid #f30956;">
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
			    		</div></div></div></div>
</div>

<!--javascript-->
<script>
document.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && (e.target.tagName === 'INPUT' || e.target.tagName === 'SELECT')) {
        e.preventDefault();

        // Target Date Fields for Page 1
        if (e.target.name === 'received_date' || e.target.name === 'civil_date') {
            const now = new Date();
            const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            // Formats as: March 5, 2026
            e.target.value = months[now.getMonth()] + " " + now.getDate() + ", " + now.getFullYear();
        }

        // Move to next field
        const focusable = Array.from(document.querySelectorAll('input:not([type="hidden"]):not([disabled]):not([readonly]), select:not([disabled])'));
        const index = focusable.indexOf(e.target);
        if (index > -1 && index < focusable.length - 1) {
            focusable[index + 1].focus();
        }
    }
});
</script>

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

	
	function updateFatherLastName() {
		const husbandFatherLastName = document.getElementById('h_fa_lname');
		husbandFatherLastName.value = hLname.value;
	}
	hLname.addEventListener('input', updateFatherLastName);

	function updateMotherLastName() {
		const husbandMotherLastName = document.getElementById('h_mo_lname');
		husbandMotherLastName.value = hMname.value;
	}
	hMname.addEventListener('input', updateMotherLastName);
	
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

	function updateWFatherLastName() {
		const wifeFatherLastName = document.getElementById('w_fa_lname');
		wifeFatherLastName.value = wLname.value;
	}
	wLname.addEventListener('input', updateWFatherLastName);

	function updateMotherLastName() {
		const wifeMotherLastName = document.getElementById('w_mo_lname');
		wifeMotherLastName.value = wMname.value;
	}
	wMname.addEventListener('input', updateMotherLastName);
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input, select, textarea');

    // 1. BROADCAST ON LOAD: Save everything to memory immediately
    inputs.forEach(el => {
        if (el.name) {
            sessionStorage.setItem(el.name, el.value);
        }
    });

    // 2. LIVE UPDATE: Update memory whenever you type
    inputs.forEach(el => {
        el.addEventListener('input', function() {
            if (this.name) {
                sessionStorage.setItem(this.name, this.value);
            }
        });
    });

    // 3. ENTER KEY: Navigate to next box
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            const current = document.activeElement;
            if (current.tagName === 'INPUT' || current.tagName === 'SELECT') {
                e.preventDefault();
                const focusable = Array.from(document.querySelectorAll('input:not([type="hidden"]):not([disabled]):not([readonly]), select:not([disabled])'));
                const index = focusable.indexOf(current);
                if (index > -1 && index < focusable.length - 1) {
                    focusable[index + 1].focus();
                }
            }
        }
    });
});
</script>