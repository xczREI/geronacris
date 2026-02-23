<style>
		/* Global font size 10 as requested by client */
		.ctf-birth, .ctf-birth * {
			font-size: 10px !important;
		}
		.ctf-birth h4 {
			font-size: 12px !important;
		}
		.ctf-birth h6 {
			font-size: 10px !important;
		}
		.ctf-birth input, 
		.ctf-birth select, 
		.ctf-birth textarea,
		.ctf-birth label,
		.ctf-birth span,
		.ctf-birth option {
			font-size: 10px !important;
		}
		/* Header styling */
		.ctf-birth .header-title {
			font-size: 24px !important;
			font-weight: bold;
			white-space: nowrap;
		}
		.ctf-birth .header-subtitle {
			font-size: 10px !important;
		}
		.ctf-birth .header-republic {
			font-size: 12px !important;
		}
		/* Style for editable dropdowns */
		.editable-select {
			position: relative;
		}
		.editable-select input {
			width: 100%;
		}

						/* Container for each dropdown item */
		/* Container for each dropdown item */
		.remark-item {
			padding: 6px 12px;
			cursor: pointer;
			border-bottom: 1px solid #eee;
			display: flex;
			align-items: center; /* Vertically centers the text and button */
			background: white;
		}

		.remark-item:hover {
			background-color: #9ebee3; /* A clearly darker gray for better visibility */
		}

		/* The text handles the expansion */
		.remark-item .remark-text {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11px !important;
			text-transform: uppercase;
			color: #000000;
			flex-grow: 1; /* Pushes the delete button to the right */
			margin-right: 15px;
			pointer-events: auto;
		}

		/* The DELETE button remains small */
		.delete-remark {
			color: #dc3545;
			font-weight: bold;
			padding: 2px 8px;
			border: 1px solid #dc3545;
			border-radius: 3px;
			cursor: pointer;
			font-size: 9px !important;
			text-transform: uppercase;
			flex-shrink: 0; /* Prevents the button from stretching */
			display: inline-block;
			transition: all 0.2s;
		}

		.delete-remark:hover {
			background-color: #bd2130;
			color: white;
		}

	</style>

	<script type="text/javascript">
		$(document).ready(function () {
			
			$("#provinces").change(function(){
				var prov_id = $(this).val();
				$.ajax({
					url: "getmunicipal.php",
					method: "POST",
					data:{provID:prov_id},
					success: function(data){
						$("#municipals").html(data);
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			
			$("#birth_province").change(function(){
				var bprov_id = $(this).val();
				$.ajax({
					url: "getmunicipalb.php",
					method: "POST",
					data:{bprovID:bprov_id},
					success: function(data){
						$("#birth_city").html(data);
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			
			$("#mother_province").change(function(){
				var mprov_id = $(this).val();
				$.ajax({
					url: "getmunicipalm.php",
					method: "POST",
					data:{mprovID:mprov_id},
					success: function(data){
						$("#mother_city").html(data);
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function () {
			
			$("#father_province").change(function(){
				var fprov_id = $(this).val();
				$.ajax({
					url: "getmunicipalf.php",
					method: "POST",
					data:{fprovID:fprov_id},
					success: function(data){
						$("#father_city").html(data);
					}
				});
			});
		});
	</script>

	<!-- Province list -->
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

	<!-- Citizenship list -->
	<datalist id="citizen_list">
		<?php 
			require 'mycon.php';
			$sqlp = "SELECT * from tblcitizen";
			$resultp = $connx->query($sqlp);
			while ($row = $resultp->fetch_assoc()) {
				echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
			}				
		?>
	</datalist>

	<!-- Religious Sect list-->
	<datalist id="religious_sect">
		<?php 
			require 'mycon.php';
			$sqlp = "SELECT * from tblreligious";
			$resultp = $connx->query($sqlp);
			while ($row = $resultp->fetch_assoc()) {
				echo "<option value='" . $row['relsec'] . "'>" . $row['relsec'] . "</option>";
			}		
		?>
	</datalist>

	<!-- Occupation list -->
	<datalist id="occupation_list">
		<?php 
			require 'mycon.php';
			$sqlp = "SELECT * from tbloccupation";
			$resultp = $connx->query($sqlp);
			while ($row = $resultp->fetch_assoc()) {
				echo "<option value='" . $row['occupation'] . "'>" . $row['occupation'] . "</option>";
			}												
		?>
	</datalist>

	<!-- Country list -->
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

	<!-- NEW: Type of Birth list (5a) - Dropdown but editable -->
	<datalist id="birth_type_list">
		<option value="SINGLE">SINGLE</option>
		<option value="TWIN">TWIN</option>
		<option value="TRIPLET">TRIPLET</option>
		<option value="QUADRUPLET">QUADRUPLET</option>
		<option value="QUINTUPLET">QUINTUPLET</option>
	</datalist>

	<!-- NEW: Multiple Birth Order list (5b) -->
	<datalist id="multi_birth_list">
		<option value="NOT APPLICABLE">NOT APPLICABLE</option>
		<option value="FIRST">FIRST</option>
		<option value="SECOND">SECOND</option>
		<option value="THIRD">THIRD</option>
		<option value="FOURTH">FOURTH</option>
		<option value="FIFTH">FIFTH</option>
	</datalist>

	<!-- NEW: Birth Order list (5c) - Dropdown -->
	<datalist id="birth_order_list">
		<option value="FIRST">FIRST</option>
		<option value="SECOND">SECOND</option>
		<option value="THIRD">THIRD</option>
		<option value="FOURTH">FOURTH</option>
		<option value="FIFTH">FIFTH</option>
		<option value="SIXTH">SIXTH</option>
		<option value="SEVENTH">SEVENTH</option>
		<option value="EIGHTH">EIGHTH</option>
		<option value="NINTH">NINTH</option>
		<option value="TENTH">TENTH</option>
	</datalist>

	<!-- NEW: Attendant Position list (21b) -->
	<datalist id="attendant_position_list">
		<option value="PHYSICIAN">PHYSICIAN</option>
		<option value="NURSE">NURSE</option>
		<option value="MIDWIFE">MIDWIFE</option>
		<option value="HILOT">HILOT</option>
		<option value="TRADITIONAL BIRTH ATTENDANT">TRADITIONAL BIRTH ATTENDANT</option>
	</datalist>

	<div class="ctf-birth pt-3" style="width:960px; margin:auto;">
		<!--birth form-->
		<div class="form" style="padding:0 15px 0 15px;">
			<!-- Header -->
			<div class="row"><!--grid of header-->
				<div class="col-9" style="border:2px solid green; padding: 10px;">
					<p class="m1" style="margin-bottom: 0;">Municipal Form No. 102</p>
					<p align="center" class="header-republic" style="margin-bottom: 0;">Republic of the Philippines</p>
					<p align="center" class="header-subtitle" style="margin-bottom: 5px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
					<p align="center" class="header-title" style="margin-bottom: 0;">CERTIFICATE OF LIVE BIRTH</p>
				</div>
				<div class="col-3" id="book" style="border:2px solid green; border-left:none; border-bottom:none;">
					<div class="form-group">
						<label id="ltxt">Book No.</label>
						<input type="text" class="bookNo form-control form-control-sm" id="bookno" onkeypress="return isNumberKey(event)" name="book_no" style="background-color: #7FFFD4;">
						<input type="hidden" class="form-control form-control-sm" id="bookno1" name="book_no1">

						<label id="ltxt">Page No.</label>
						<input type="text" class="pageNo form-control form-control-sm" name="page_no" id="pageno" onkeypress="return isNumberKey(event)" style="background-color: #7FFFD4;">
						<input type="hidden" class="form-control form-control-sm" name="page_no1" id="pageno1">

						<!-- Hidden Text -->
						<input type="hidden" name="time" id="hrs" value="">
						<input type="hidden" name="date" id="date" value="">
						<input type="hidden" name="emp_name" id="emp_name" value="<?php echo $_SESSION['lastname']; ?>">
					</div>
				</div>
			</div><!--close row-->
			<!-- Registry Info -->
			<div class="row"><!--row of city-->
				<div class="col-9 pl-0" style="border:2px solid green; border-top:none;">
					<div class="input-group mt-1">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white p-0" style="border:none; color:black; width: 120px;">&nbsp;Province</span>
						</div>
						<input type="text" list='province_list' class="form-control form-control-sm" value="TARLAC" name="provinces" onkeypress="return isTextKey(event)" required>
					</div>
					<div class="input-group mt-1">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white p-0" style="border:none; color:black; width: 120px;">&nbsp;City/Municipality</span>
						</div>
						<input type="text" list='municipality_list' class="form-control form-control-sm" value="GERONA" name="municipal" onkeypress="return isTextKey(event)" required>
					</div>
				</div>
				<div class="col-3" id="book" style="border:2px solid green; border-left:none; border-top:none;">
					<div class="form-group">
						<label id="ltxt">Registry No.</label>
						<input type="text" class="regNo form-control form-control-sm" name="registry_no" id="regno" style="background-color: #7FFFD4;"> 
						<div id="error"></div>
					</div>
				</div>
			</div><!--close row-->
			<!-- Child Info -->
			<div class="row">
				<div class="child text-center" style="border:2px solid green; border-top:none; padding:5em 3px 0 3px; width:30px;">
					<h4>C<br>H<br>I<br>L<br>D</h4>
				</div>
				<div class="col" style="border:2px solid green; border-left:none; border-top:none;">
					<div class="row">
						<div class="col-1">
							<h6 style="padding-top:2px;">1.&nbsp;NAME</h6>
						</div>
						<div class="col-4">
							<h6 align="center"><span style="color:green;">(First)</span></h6>
							<div class="input-group">
								<input type="text" tabindex="1" class="form-control form-control-sm " id="child_fname" name="child_fname" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-4">
							<h6 align="center"><span style="color:green;">(Middle)</span></h6>
							<div class="input-group">
								<input type="text" tabindex="2" class="form-control form-control-sm " id="child_mname" name="child_mname" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-3">
							<h6 align="center"><span style="color:green;">(Last)</span></h6>
							<div class="input-group">
								<input type="text" tabindex ="3"class="form-control form-control-sm " id="child_lname" name="child_lname" onkeypress="return isTextKey(event)">
							</div>
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-3" style="border-right:2px solid green;">
							<h6 style="padding-top:2px;">2.&nbsp;SEX<span style="color:green;">(Male/Female)</span></h6>
							<div class="input-group input-group-sm">
								<select name="sex" class="form-control" tabindex="4">
									<option selected style="display:none;"></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						</div>
						<div class="col-2">
							<h6 style="padding-top:2px;">3.&nbsp;DATE OF<br>&emsp;BIRTH</h6>
						</div>
						<div class="col-7">
							<div class="row">
								<div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Day)</span></h6></div>
								<div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Month)</span></h6></div>
								<div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Year)</span></h6></div>
							</div>
							
							<div class="form-control form-control-sm p-0 d-flex justify-content-between align-items-stretch" style="background-color: #e9ecef; overflow: hidden;">
								
								<input type="text" id="bd_day" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
								<input type="text" id="bd_month" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
								<input type="text" id="bd_year" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
							</div>

							<input type="hidden" id="child_birth_date" name="child_birth_date" value="<?php echo isset($row['child_birth_date']) ? trim(strip_tags($row['child_birth_date'])) : ''; ?>">
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-2">
							<h6 style="padding-top:2px;">4.&nbsp;PLACE OF <br>&emsp;BIRTH</h6>
						</div>
						<div class="col-4">
							<h6><span class="m-0" style="color:green;">(Name of Hospital/Clinic/Institution/<br>House No.,St.,Barangay)</span></h6>
							<div class="input-group">
								<input type="text" tabindex="6" class="form-control form-control-sm" id="birth_brgy" name="birth_brgy">
							</div>
						</div>
						<div class="col-3">
							<h6><span class="m-0" style="color:green;">(City/Municipality)</span></h6>
							<div class="input-group" style="padding-top:19px;">
								<input tabindex="7" id="birth_city" type="text" list='municipality_list' class="form-control" value="GERONA" name="birth_city" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-3">
							<h6><span class="m-0" style="color:green;">(Province)</span></h6>
							<div class="input-group" style="padding-top:19px;">
								<input tabindex="8" id="birth_province" type="text" list='province_list' class="form-control" value="TARLAC" name="birth_province" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
					</div><!--close row-->
					<div class="row">
						<div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
							<h6 style="padding-top:2px;">5a.&nbsp;TYPE OF BIRTH<br>&emsp;&nbsp;&nbsp;<span style="color:green">(Single, Twin, Triplet, etc.)</span></h6>
							<div class="input-group" style="padding-top:13px;">
								<!-- UPDATED: Changed to datalist for dropdown but editable -->
								<input tabindex="9" type="text" list="birth_type_list" class="form-control form-control-sm" placeholder="" id="birth_type" name="birth_type" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
							<h6 style="padding-top:2px;">5b.&nbsp;IF MULTIPLE BIRTH, CHILD WAS<br>&emsp;&nbsp;&nbsp;<span style="color:green;">(First, Second, Third, etc.)</span></h6>
							<div class="input-group" style="padding-top:17px;">
								<!-- UPDATED: Changed to datalist for dropdown but editable, auto N/A if Single -->
								<input tabindex="10" type="text" list="multi_birth_list" class="form-control form-control-sm" placeholder="" id="multi_birth_was" name="multi_birth_was" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
							<h6 style="padding-top:2px;">5c.&nbsp;BIRTH ORDER<span style="color:green;">(Order of this birth to <br>&emsp;&nbsp;&nbsp;&nbsp;previous live births including fetal death)</span><br>&emsp;&nbsp;&nbsp;<span style="color:green;">(First, Second, Third, etc.)</span></h6>
							<div class="input-group">
								<!-- UPDATED: Changed to datalist for dropdown -->
								<input tabindex="11" type="text" list="birth_order_list" class="form-control form-control-sm" placeholder="" id="birth_order" name="birth_order" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-3" style="border-top:2px solid green;">
							<h6 style="padding-top:2px;">6.&nbsp;WEIGHT OF BIRTH</h6>
							<div class="input-group" style="padding-top:29px;">
								<input tabindex="12" type="text" class="form-control form-control-sm" placeholder="" name="birth_weight" onkeypress="return isNumberKey(event)">
								<span>&nbsp;grams</span>
							</div>
						</div>
					</div><!--close row-->
				</div><!--close col-->
			</div><!--close row-->
			<!-- Mother Info -->
			<div class="row">
				<div class="mother" style="border:2px solid green; border-top:none; padding:4em 3px 0 1px; width: 30px;" align="center">
					<h4>M<br>O<br>T<br>H<br>E<br>R</h4>
				</div>
				<div class="col" style="border:2px solid green; border-left:none; border-top:none;">
					<div class="row">
						<div class="col-1">
							<h6><span>7.&nbsp;MAIDEN<br>&nbsp;&nbsp;&nbsp;&nbsp;NAME</span></h6>
						</div>
						<div class="col-4">
							<h6 align="center"><span style="color:green;">(First)</span></h6>
							<div class="input-group">
								<input tabindex="13" type="text" class="form-control form-control-sm text-center" id="mother_fname" placeholder="" name="mother_fname" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-4">
							<h6 align="center"><span style="color:green;">(Middle)</span></h6>
							<div class="input-group">
								<input tabindex="14" type="text" class="form-control form-control-sm text-center" id="mother_mname" placeholder="" name="mother_mname" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-3">
							<h6 align="center"><span style="color:green;">(Last)</span></h6>
							<div class="input-group">
								<input tabindex="15" type="text" class="form-control form-control-sm text-center" id="mother_lname" placeholder="" name="mother_lname" onkeypress="return isTextKey(event)">
							</div>
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-6" style="border-right:2px solid green;">
							<h6 style="padding-top:2px;">8.&nbsp;CITIZENSHIP</h6>
							<div class="input-group">
								<input tabindex="16" id="mother_citizen" type="text" list='citizen_list' class="form-control" value="FILIPINO" name="mother_citizen" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-6">
							<h6>9.&nbsp;RELIGION/RELIGIOUS SECT</h6>
							<div class="input-group">
								<!-- UPDATED: Dropdown but editable, saves new input -->
								<input tabindex="17" type="text" list='religious_sect' class="form-control" id="mother_sect" name="mother_sect" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-2" style="border-right:2px solid green;">
							<h6 style="padding-top:2px;">10a.<span>&nbsp;Total number of<br>&emsp;&emsp; children born alive</span></h6>
							<div class="input-group">
								<input tabindex="18" type="text" class="form-control form-control-sm" placeholder="" name="ttl_no_child" onkeypress="return isNumberKey(event)">
							</div>
						</div>
						<div class="col-2" style="border-right:2px solid green;">
							<h6 style="padding-top:2px;">10b.<span>&nbsp;No. of children still living including this birth</span></h6>
							<div class="input-group">
								<input tabindex="19" type="text" class="form-control form-control-sm" placeholder="" name="no_child_alive" onkeypress="return isNumberKey(event)">
							</div>
						</div>
						<div class="col-2" style="border-right:2px solid green;">
							<h6 style="padding-top:2px;">10c.<span>&nbsp;No. of children born<br>&emsp; alive but are now dead</span></h6>
							<div class="input-group">
								<input tabindex="20" type="text" class="form-control form-control-sm" placeholder="" name="no_child_dead" onkeypress="return isNumberKey(event)">
							</div>
						</div>
						<div class="col-4" style="border-right:2px solid green;">
							<h6 style="padding-top:2px;">11.&nbsp;OCCUPATION</h6>
							<div class="input-group" style="padding-top:16px;">
								<input tabindex="21" id="mother_occupation" type="text" list='occupation_list' class="form-control" name="mother_occupation" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-2">
							<h6 style="padding-top:2px;">12.<span>&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
							<div class="input-group">
								<input tabindex="22" type="text" class="form-control form-control-sm" placeholder="" name="mother_age" onkeypress="return isNumberKey(event)">
							</div>
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-1">
							<h6 style="padding-top:2px;">13.&nbsp;RESIDENCE</h6>
						</div>
						<div class="col-4" style="padding-left:3em;">
							<h6><span style="color:green; margin:0;">(House No.,St.,Barangay)</span></h6>
							<div class="input-group">
								<input tabindex="23" type="text" class="form-control form-control-sm text-center" placeholder="" name="mother_brgy">
							</div>
						</div>
						<div class="col-3">
							<h6><span style="color:green; margin:0;">(City/Municipality)</span></h6>
							<div class="input-group">
								<input tabindex="24" id="mother_city" type="text" list='municipality_list' class="form-control text-center" value="GERONA" name="mother_city" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-2">
							<h6><span style="color:green; margin:0;">(Province)</span></h6>
							<div class="input-group">
								<input tabindex="25" id="mother_province" type="text" list='province_list' class="form-control text-center" value="TARLAC" name="mother_province" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-2">
							<h6><span style="color:green; margin:0;">(Country)</span></h6>
							<div class="input-group">
								<input tabindex="26" id="mother_country" type="text" list='country_list' class="form-control text-center" value="PHILIPPINES" name="mother_country" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
					</div><!--close row-->
				</div><!--close row-->
			</div><!--close col-->
			<!-- Father Info -->
			<div class="row">
				<div class="father text-center" style="border:2px solid green; border-top:none; padding:1em 3px 0 3px; width: 30px;">
					<h4>F<br>A<br>T<br>H<br>E<br>R</h4>
				</div>
				<div class="col" style="border:2px solid green; border-left:none; border-top:none;">
					<div class="row">
						<div class="col-1">
							<h6><span>14.&nbsp;NAME</span></h6>
						</div>
						<div class="col-4">
							<h6 align="center"><span style="color:green;">(First)</span></h6>
							<div class="input-group">
								<input tabindex="27" type="text" class="form-control form-control-sm text-center" id="father_fname" name="father_fname" onkeypress="return isTextKey(event)">
									<datalist id="father_options">
										<option value="NOT APPLICABLE">
										<option value="UNKNOWN">
									</datalist>
							</div>
						</div>
						<div class="col-4">
							<h6 align="center"><span style="color:green;">(Middle)</span></h6>
							<div class="input-group">
								<input tabindex="28" type="text" class="form-control form-control-sm text-center" id="father_mname" name="father_mname" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-3">
							<h6 align="center"><span style="color:green;">(Last)</span></h6>
							<div class="input-group">
								<input tabindex="29" type="text" class="form-control form-control-sm text-center"  id="father_lname" name="father_lname" onkeypress="return isTextKey(event)">
							</div>
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-3" style="border-right:2px solid green;">
							<h6><span>15.&nbsp;CITIZENSHIP</span></h6>
							<div class="input-group" style="padding-top:15px;">
								<input tabindex="30" id="father_citizen" type="text" list='citizen_list' class="form-control text-center" value="FILIPINO" name="father_citizen" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-4" style="border-right:2px solid green;">
							<h6>16.&nbsp;RELIGION/RELIGIOUS SECT</h6>
							<div class="input-group" style="padding-top:18px;">
								<!-- UPDATED: Dropdown but editable -->
								<input tabindex="31" id="father_sect" type="text" list='religious_sect' class="form-control text-center" name="father_sect" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-3" style="border-right:2px solid green;">
							<h6 style="padding-top:2px;">17.&nbsp;OCCUPATION</h6>
							<div class="input-group" style="padding-top:16px;">
								<input tabindex="32" id="father_occupation" type="text" list='occupation_list' class="form-control text-center" name="father_occupation" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-2">
							<h6 style="padding-top:2px;">18.<span>&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
							<div class="input-group">
								<input type="text" class="form-control form-control-sm text-center" placeholder="" id="father_age" name="father_age" onkeypress="return isNumberKey(event)">
							</div>
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-1">
							<h6 style="padding-top:2px;">19.&nbsp;RESIDENCE</h6>
						</div>
						<div class="col-4" style="padding-left:3em;">
							<h6><span style="color:green; margin:0;">(House No.,St.,Barangay)</span></h6>
							<div class="input-group">
								<input tabindex="33" type="text" class="form-control form-control-sm text-center" placeholder="" name="father_brgy" id= "father_brgy">
							</div>
						</div>
						<div class="col-3">
							<h6><span style="color:green; margin:0;">(City/Municipality)</span></h6>
							<div class="input-group">
								<input tabindex="34" id="father_city" type="text" list='municipality_list' class="form-control form-control-sm text-center" value="GERONA" name="father_city" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-2">
							<h6><span style="color:green; margin:0;">(Province)</span></h6>
							<div class="input-group">
								<input tabindex="35" id="father_province" type="text" list='province_list' class="form-control form-control-sm text-center" value="TARLAC" name="father_province" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
						<div class="col-2">
							<h6><span style="color:green; margin:0;">(Country)</span></h6>
							<div class="input-group">
								<input tabindex="36" id="father_country" type="text" list='country_list' class="form-control text-center" value="PHILIPPINES" name="father_country" onkeypress="return isTextKey(event)" required>
							</div>
						</div>
					</div><!--close row-->
				</div><!--close row-->
			</div><!--close col-->
			<!-- Marriage Info -->
			<div class="row" style="border:2px solid green; border-top:none;">
				<div class="col">
					<div class="row">
						<div class="col">
							<h6 style="padding:0;">MARRIAGE OF PARENTS <span>(If not married, accomplish Affidavit of Acknowledgement/Admission of Paternity at the back.)</span></h6>
						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col-1">
							<h6 style="padding-top:2px;">20a.&nbsp;DATE</h6>
						</div>
						<div class="col-3">
							<div class="row">
								<div class="col-4"><h6 align="center"><span style="color:green;">(Month)</span></h6></div>
								<div class="col-4"><h6 align="center"><span style="color:green;">(Day)</span></h6></div>
								<div class="col-4"><h6 align="center"><span style="color:green;">(Year)</span></h6></div>
							</div>
							<div class="input-group">
								<input tabindex="37" type="text" class="form-control form-control-sm text-center" id="marriage_date" name="marriage_date" style="word-spacing:2em;">
							</div>
						</div>
						<div class="col-1" style="border-left:2px solid green;">
							<h6>20b.&nbsp;PLACE</h6>
						</div>
							<div class="col-7">
								<div class="row">
								<div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(City/Municipality)</span></h6></div>
								<div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Province)</span></h6></div>
								<div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Country)</span></h6></div>
							</div>
							
							<div class="form-control form-control-sm p-0 d-flex justify-content-between align-items-center" style="background-color: #e9ecef; overflow: hidden;">
								<input type="text" id="mp_day" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
								<input type="text" id="mp_month" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;" >
								<input type="text" id="mp_year" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
							</div>

							<input type="hidden" id="marriage_place" name="marriage_place" value="">

						</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
						<div class="col">
							<h6 style="padding-top:2px;">21a.&nbsp;ATTENDANT</h6>
							<div class="row">
								<div class="col">
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="physician" name="attendant1" value="Physician">
										<label class="custom-control-label" for="physician">&nbsp;1 Physician</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="nurse" name="attendant2" value="Nurse">
										<label class="custom-control-label" for="nurse">&nbsp;2 Nurse</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="midwife" name="attendant3" value="Midwife">
										<label class="custom-control-label" for="midwife">&nbsp;3 Midwife</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="hilot" name="attendant4" value="Hilot">
										<label class="custom-control-label" for="hilot">&nbsp;4 Hilot (Traditional Birth Attendant)</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
										<input type="checkbox" class="custom-control-input" id="others">
										<label class="custom-control-label" for="others">&nbsp;5 Others (Specify)</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline pl-0">
										<input type="text" class="form-control form-control-sm" size="18" id="otherstxt" name="attendant5" onkeypress="return isTextKey(event)">
									</div>
								</div>
							</div>	
						</div>
					</div><!--close row-->
				</div><!--close row-->
			</div><!--close col-->
			<!-- Cert Attendant -->
			<div class="row" style="border: 2px solid green; border-top:none;">
				<div class="col">
					<div class="row">
						<div class="col">
							<h6 style="padding-top:2px;">21b. CERTIFICATION OF ATTENDANT AT BIRTH <span style="color:green">(Physician, Nurse, Midwife, Traditional Birth Attendant/Hilot, etc. )</span></h6>
							<h6 style="padding:0;">&emsp;&emsp;&emsp;I hereby certify that I attended the birth of the child who was born alive at
							<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0">
								<input type="time" class="form-control form-control-sm text-center" name="birth_time" size="4">
							</div>
							am/pm on the date of birth specified above.   
							</h6>
						</div>
					</div><!--close row-->
					<div class="row">
						<div class="col-6">
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Signature&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Name in Print&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" id ="attendant_name" name="attendant_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
								</div>
								<!-- UPDATED: Changed to dropdown with attendant positions -->
								<input type="text" list="attendant_position_list" class="form-control form-control-sm" id="attendant_position" name="attendant_position" onkeypress="return isTextKey(event)">
							</div>
						</div>
						<div class="col-6">
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Address&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" id="attendant_address1" name="attendant_address1">
							</div>
							<div class="input-group mt-1">
								<input type="text" class="form-control form-control-sm" id="attendant_address2"name="attendant_address2" >
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
								</div>
								<?php date_default_timezone_set('Asia/Manila'); ?>
								<!-- UPDATED: Default to current date but editable -->
								<input type="text" class="form-control form-control-sm" id="attendant_date" name="attendant_date">
							</div>
						</div>
					</div><!--close row-->
				</div><!--close row-->
			</div><!--close col-->
			<!-- Cert Informant -->
			<div class="row" style="border: 2px solid green;border-top:none;">
				<div class="col">
					<div class="row">
						<div class="col-6" style="border-right: 2px solid green;">
							<h6 style="padding-top:2px;">22. CERTIFICATION OF INFORMANT</h6>
							<h6 style="padding:0; text-indent:4em;">I hereby certify that all information supplied are true and correct to my own knowledge and belief.</h6>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Signature&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Name in Print&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" id="informant_name" name="informant_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Relationship to the Child&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" id = "rel_child" name="rel_child" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Address&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" id="informant_address" name="informant_address">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
								</div>
								<!-- UPDATED: Default to current date but editable -->
								<input type="text" class="form-control form-control-sm" id="informant_date" name="informant_date">
							</div>
						</div>
						<div class="col-6">
							<h6 style="padding-top:2px;">23. PREPARED BY</h6><br>
							<div class="input-group mt-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Signature&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Name in Print&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" name="prepared_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" name="prepared_position" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
								</div>
								<!-- UPDATED: Default to current date but editable -->
								<input type="text" class="form-control form-control-sm" id="prepared_date" name="prepared_date">
							</div>
						</div>
					</div><!--close row-->
				</div><!--close row-->
			</div><!--close col-->
			<!-- Received by -->
			<div class="row" style="border: 2px solid green;border-top:none;">
				<div class="col">
					<div class="row">
						<div class="col-6" style="border-right: 2px solid green;">
							<h6 style="padding-top:2px;">24. RECEIVED BY</h6>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Signature&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm"  style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Name in Print&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm"  name="received_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm"  name="received_position" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
								</div>
								<!-- UPDATED: Default to current date but editable -->
								<input type="text" class="form-control form-control-sm" id="received_date" name="received_date">
							</div>
						</div>
						<div class="col-6">
							<h6 style="padding-top:2px;">25. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Signature&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm"  style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Name in Print&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm" id="civil_name" name="civil_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
								</div>
								<input type="text" class="form-control form-control-sm"  id="civil_position" name="civil_position" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
								<div class="input-group-prepend">
									<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
								</div>
								<!-- UPDATED: Default to current date but editable -->
								<input type="text" class="form-control form-control-sm" id="civil_date" name="civil_date">
							</div>
						</div>
					</div><!--close row-->
				</div><!--close row-->
			</div><!--close col-->
			<!-- Remarks -->
								<div class="row" style="border: 2px solid green;border-top:none;">
								<div class="col">
									<div class="row" style="border: 2px solid green; border-top:none;">
										<div class="col" style="position: relative;">
											<h6 style="padding-top:2px; font-weight:bold;">REMARKS/ANNOTATIONS (For LCRO/OCRG Use Only)</h6>
											
											<textarea style="width: 100%; height: 80px;" id="r" class="form-control" placeholder="Type your remarks here..."></textarea>
											
											<div id="remark-dropdown" style="display:none; position:absolute; left:15px; right:15px; background:white; border:1px solid #ccc; z-index:1000; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-height: 150px; overflow-y: auto;">
												</div>

											<textarea style="width: 100%; height: 80px; display: none;" name="remarks" id="re"></textarea>
										</div>
									</div>
								</div>
							</div> <!--remark close-->
			<!-- To be filled -->
			<div class="row" style="border: 2px solid green;border-top:none;">
				<div class="col">
					<div class="row">
						<div class="col">
							<h6 style="padding-top:2px; font-weight:bold;">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
							<h6 style="margin-bottom: 0;">8&emsp;&emsp;&emsp;&nbsp;&nbsp;9&emsp;&emsp;&emsp;&nbsp;&nbsp;11&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;13&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;15&emsp;&emsp;&emsp;&nbsp;16&emsp;&emsp;&emsp;17&emsp;&emsp;&emsp;&emsp;&emsp;19</h6>
							<div class="flex-container">
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="8a" disabled>
								</div>
								<div style="margin-right: 3px;">
									<input type="text" class="form-control form-control-sm" name="8b" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="9a" disabled>
								</div>
								<div style="margin-right: 3px;">
									<input type="text" class="form-control form-control-sm" name="9b" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="11a" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="11b" disabled>
								</div> 
								<div style="margin-right: 3px;">
									<input type="text" class="form-control form-control-sm" name="11c" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="13a" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="13b" disabled>
								</div> 
								<div>
									<input type="text" class="form-control form-control-sm" name="13c" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="13d" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="13e" disabled>
								</div> 
								<div>
									<input type="text" class="form-control form-control-sm" name="13f" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="13g" disabled>
								</div>
								<div style="margin-right: 3px;">
									<input type="text" class="form-control form-control-sm" name="13h" disabled>
								</div> 
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="15a" disabled>
								</div>
								<div style="margin-right: 3px;">
									<input type="text" class="form-control form-control-sm" name="15b" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="16a" disabled>
								</div> 
								<div style="margin-right: 3px;">
									<input type="text" class="form-control form-control-sm" name="16b" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="17a" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="17b" disabled>
								</div> 
								<div style="margin-right: 3px;">
									<input type="text" class="form-control form-control-sm" name="17c" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="19a" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="19b" disabled>
								</div> 
								<div>
									<input type="text" class="form-control form-control-sm" name="19c" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="19d" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="19e" disabled>
								</div> 
								<div>
									<input type="text" class="form-control form-control-sm" name="19f" disabled>
								</div>
								<div style="border-right:none;">
									<input type="text" class="form-control form-control-sm" name="19g" disabled>
								</div>
								<div>
									<input type="text" class="form-control form-control-sm" name="19h" disabled>
								</div>  
							</div>
						</div>
					</div><!--close row-->
				</div><!--close row-->
			</div><!--close col-->		
		</div>
	</div>

	<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- NEW: Auto-fill 5b with "NOT APPLICABLE" when 5a is "SINGLE" -->
	<script>
		$(document).ready(function(){
			// When birth type changes
			$("#birth_type").on('input change', function(){
				var birthType = $(this).val().toUpperCase();
				if(birthType === "SINGLE"){
					$("#multi_birth_was").val("NOT APPLICABLE");
				} else {
					// Clear if not single (user can fill in)
					if($("#multi_birth_was").val() === "NOT APPLICABLE"){
						$("#multi_birth_was").val("");
					}
				}
			});
		});
	</script>

	<script>

		$(document).ready(function() {
    // Combine the three Marriage Place parts on input
    $('#mp_day, #mp_month, #mp_year').on('input', function() {
        let d = $('#mp_day').val().trim();
        let m = $('#mp_month').val().trim();
        let y = $('#mp_year').val().trim();
        
        // Combines them with spaces into the hidden variable
        // Example output: "GERONA TARLAC PHILIPPINES"
        $('#marriage_place').val(`${d} ${m} ${y}`.trim());
        
        // If you are using your saveToMemory function, call it here
        if (typeof saveToMemory === "function") {
            saveToMemory();
        }
    });
});
	</script>

	<!-- NEW: Auto-fill attendant position based on checkbox selection -->
	<script>
		$(document).ready(function(){
			// When attendant checkbox is clicked, auto-fill position
			$('#physician').change(function(){
				if($(this).is(':checked')){
					$('#attendant_position').val('PHYSICIAN');
				}
			});
			$('#nurse').change(function(){
				if($(this).is(':checked')){
					$('#attendant_position').val('NURSE');
				}
			});
			$('#midwife').change(function(){
				if($(this).is(':checked')){
					$('#attendant_position').val('MIDWIFE');
				}
			});
			$('#hilot').change(function(){
				if($(this).is(':checked')){
					$('#attendant_position').val('HILOT');
				}
			});
		});
	</script>

	<!-- NEW: Save new dropdown entries via AJAX (for religious sect, occupation, etc.) -->
	<script>
		$(document).ready(function(){
			// Function to save new entry to database
			function saveNewEntry(tableName, columnName, value){
				if(value && value.trim() !== ''){
					$.ajax({
						url: "save_new_entry.php",
						method: "POST",
						data: {
							table: tableName,
							column: columnName,
							value: value.trim().toUpperCase()
						},
						success: function(response){
							console.log("Entry saved: " + value);
						},
						error: function(){
							console.log("Error saving entry");
						}
					});
				}
			}

			// Save new religious sect on blur
			$('#mother_sect, #father_sect').on('blur', function(){
				var val = $(this).val();
				// Check if value exists in datalist
				var exists = false;
				$('#religious_sect option').each(function(){
					if($(this).val().toUpperCase() === val.toUpperCase()){
						exists = true;
						return false;
					}
				});
				if(!exists && val.trim() !== ''){
					saveNewEntry('tblreligious', 'relsec', val);
					// Add to datalist immediately
					$('#religious_sect').append('<option value="' + val.toUpperCase() + '">' + val.toUpperCase() + '</option>');
				}
			});

			// Save new occupation on blur
			$('#mother_occupation, #father_occupation').on('blur', function(){
				var val = $(this).val();
				var exists = false;
				$('#occupation_list option').each(function(){
					if($(this).val().toUpperCase() === val.toUpperCase()){
						exists = true;
						return false;
					}
				});
				if(!exists && val.trim() !== ''){
					saveNewEntry('tbloccupation', 'occupation', val);
					$('#occupation_list').append('<option value="' + val.toUpperCase() + '">' + val.toUpperCase() + '</option>');
				}
			});

			// Save new citizenship on blur
			$('#mother_citizen, #father_citizen').on('blur', function(){
				var val = $(this).val();
				var exists = false;
				$('#citizen_list option').each(function(){
					if($(this).val().toUpperCase() === val.toUpperCase()){
						exists = true;
						return false;
					}
				});
				if(!exists && val.trim() !== ''){
					saveNewEntry('tblcitizen', 'citiz', val);
					$('#citizen_list').append('<option value="' + val.toUpperCase() + '">' + val.toUpperCase() + '</option>');
				}
			});
		});
	</script>

	<script>
		$(document).ready(function(){
			var x = setInterval(function(){
				var now = new Date().getTime();
				var hrs = Math.floor((now % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				document.getElementById("hrs").innerHTML = hrs;

				var hours = ["08","09","10","11","12","01","02","03","04","05","06","07","08","09","10","11","12","01","02","03","04","05","06","07"];
				var hrss = hours[hrs];

				if (hrs <= '3' || hrs >= '16'){ var txt = 'am'; } else if (hrs >= '4' || hrs <= '15'){ var txt = 'pm'; } 
				var min = Math.floor((now % (1000 * 60 * 60)) / (1000 * 60));
				if (min < 10){ var mins = "0" + min; } else if (min > 9){ var mins = min; }
				var sec = Math.floor((now % (1000 * 60)) / 1000);
				if (sec < 10){ var secs = "0" + sec; } else if (sec > 9){ var secs = sec; }
				$("#hrs").val(hrss +":"+ mins +":"+ secs +''+ txt);
			})
		});
	</script>

	<script>
		var inputBox = document.getElementById('child_mname');
		var inputBox2 = document.getElementById('child_lname');

		inputBox.onkeyup = function(){
			document.getElementById('mother_lname').value = inputBox.value;
		}

		inputBox2.onkeyup = function(){
			document.getElementById('father_lname').value = inputBox2.value;
		}
	</script>

	<script>
		$(function(){
			var dtToday = new Date();
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate() - 1;
			var year = dtToday.getFullYear();
			if(month < 10)
				month = '0' + month.toString();
			if(day < 10)
				day = '0' + day.toString();
			var maxDate = year + '-' + month + '-' + day;
			$('#marriage_date').attr('max', maxDate);
			$('#birth_day').attr('max', maxDate);
		});
	</script>

	<script>
		document.getElementById("marriage_place").addEventListener("keydown", function(event) {
			if (event.key === "Enter") {
				document.getElementById("marriage_place").value = document.getElementById("marriage_place").value + " " + "PHILIPPINES";
			}
		});
	</script>

	<script>
		document.getElementById("marriage_date").addEventListener("keydown", function(event) {
			if (event.key === "Enter") {
				formatDateM();
			}
		});

		function formatDateM() {
    let input = document.getElementById("marriage_date").value.trim().toUpperCase();
    if (!input) return;

    const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                 "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

    // Split by spaces, slashes, or dashes
    let parts = input.split(/[\s\/\.-]+/);

    if (parts.length === 3) {
        let monthName = "";
        let day = "";
        let year = parts[2];

        // Check if the first part is a month name or number
        if (isNaN(parts[0])) {
            // Case: OCTOBER 10 2004
            monthName = parts[0];
            day = parts[1];
        } else if (isNaN(parts[1])) {
            // Case: 10 OCTOBER 2004
            monthName = parts[1];
            day = parts[0];
        } else {
            // Case: 10/10/2004 (Numeric)
            let mIdx = parseInt(parts[0], 10);
            if (mIdx >= 1 && mIdx <= 12) {
                monthName = MON[mIdx - 1];
                day = parts[1];
            }
        }

        if (monthName && day && year) {
            // Format to "MONTH DAY, YEAR"
            document.getElementById("marriage_date").value = `${monthName} ${day}, ${year}`;
            return;
        }
    }
    
    // If it's a special string like "NOT MARRIED", leave it alone
    if (input === "NOT MARRIED" || input === "NOT APPLICABLE") {
        document.getElementById("marriage_date").value = input;
    } else {
        document.getElementById("marriage_date").value = "INVALID DATE FORMAT";
    }
}
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
function formatDateFormal(inputVal) {
    if (!inputVal) return "";
    
    const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                 "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

    // Clean up extra spaces and force uppercase
    let v = inputVal.replace(/\s\s+/g, ' ').trim().toUpperCase();
    let parts = v.split(/[\s\/\.-]+/);

    if (parts.length === 3) {
        let day = parts[0];
        let month = parts[1];
        let year = parts[2];

        // Scenario: "10 OCTOBER 2004" -> Rearrange to "OCTOBER 10 2004"
        if (MON.includes(month)) {
            return `${month} ${day} ${year}`;
        }
        
        // Scenario: "OCTOBER 10 2004" -> Already correct
        if (MON.includes(day)) {
            return `${day} ${parts[1]} ${parts[2]}`;
        }

        // Scenario: Numeric "10 10 2004" -> Convert numeric Month to Word
        const mIdx = parseInt(month, 10);
        if (!isNaN(mIdx) && mIdx >= 1 && mIdx <= 12) {
            return `${MON[mIdx - 1]} ${day} ${year}`;
        }
    }
    return v;
}

    // ============================================
    // REMARK HISTORY FUNCTIONALITY
    // ============================================
    const remarkStorageKey = 'remark_history_log';

    function getHistory() {
        const raw = localStorage.getItem(remarkStorageKey);
        return raw ? JSON.parse(raw) : [];
    }

    // 1. Show Suggestions with Delete Buttons
    function showDropdown() {
        const history = getHistory();
        const dropdown = $('#remark-dropdown');
        const inputVal = $('#r').val().toUpperCase();

        if (history.length === 0) {
            dropdown.hide();
            return;
        }

        const filtered = history.filter(item => item.includes(inputVal));

        if (filtered.length > 0) {
            let html = '';
            filtered.forEach((item, index) => {
                html += `
                    <div class="remark-item" data-text="${item}">
                        <span class="remark-text">${item}</span>
                        <span class="delete-remark" data-index="${history.indexOf(item)}">DELETE</span>
                    </div>`;
            });
            dropdown.html(html).show();
        } else {
            dropdown.hide();
        }
    }

    // 2. Handle Deleting a Remark
    $(document).on('click', '.delete-remark', function(e) {
        e.stopPropagation();
        
        const indexToRemove = $(this).data('index');
        let history = getHistory();
        
        if (confirm("Delete this remark from history?")) {
            history.splice(indexToRemove, 1);
            localStorage.setItem(remarkStorageKey, JSON.stringify(history));
            showDropdown();
        }
    });

    // 3. Selection from Dropdown - Apply Date Formatting Too
    $(document).on('click', '.remark-item', function() {
        const selectedText = $(this).data('text');
        $('#r').val(selectedText);
        $('#remark-dropdown').hide();
        
        // Apply remark formatting
        const formatted = selectedText.replace(/  /g, "[sp][sp]").replace(/\n/g, "[nl]");
        $('#re').val(formatted);
        
        // Also apply date formatting to #rd field (or whichever field you want)
        const dateFormatted = formatDateFormal(selectedText);
        $('#rd').val(dateFormatted); // Replace #rd with your actual date field ID
    });

    // Listeners
    $('#r').on('input focus', showDropdown);

    // 4. Enter Key Listener - Store Data & Apply Formatting
    $('#r').on('keydown', function(e) {
        if (e.key === "Enter") {
            const val = $(this).val().trim().toUpperCase();
            if (val === "") return;

            let history = getHistory();
            if (!history.includes(val)) {
                history.push(val);
                if (history.length > 10) history.shift();
                localStorage.setItem(remarkStorageKey, JSON.stringify(history));
            }

            // Apply remark formatting
            const formatted = val.replace(/  /g, "[sp][sp]").replace(/\n/g, "[nl]");
            $('#re').val(formatted);
            
            // Apply date formatting
            const dateFormatted = formatDateFormal(val);
            $('#rd').val(dateFormatted); // Replace #rd with your actual date field ID
            
            $('#remark-dropdown').hide();
        }
    });

    // Close dropdown if clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.col').length) {
            $('#remark-dropdown').hide();
        }
    });

</script>

<script> // Father & Marriage "Not Applicable" Sync
$(document).ready(function() {
    const fatherFname = $('#father_fname');
    
    // IDs for all fields that should lock when Father is N/A
    const fieldsToHandle = [
        'father_mname', 'father_lname', 'father_citizen', 
        'father_sect', 'father_occupation', 'father_age', 
        'father_brgy', 'father_city', 'father_province', 
        'father_country', 'marriage_date', 
        'marriage_place', 'mp_day', 'mp_month', 'mp_year' // Added 20b IDs
    ];

    function handleFatherLogic() {
        const val = fatherFname.val().trim().toUpperCase();
        const isEmpty = val === "";
        const isNA = (val === "NOT APPLICABLE" || val === "UNKNOWN");

        // 1. Disable/Enable fields and apply gray background
        fieldsToHandle.forEach(id => {
            const el = $('#' + id);
            el.prop('disabled', isEmpty || isNA);
            
            if (isEmpty || isNA) {
                el.css('background-color', '#e9ecef'); // Lock look
                if (el.parent().hasClass('form-control')) {
                    el.parent().css('background-color', '#e9ecef');
                }
            } else {
                el.css('background-color', ''); // Reset to default
                if (el.parent().hasClass('form-control')) {
                    el.parent().css('background-color', 'white');
                }
            }
        });

        // 2. Auto-fill logic for "NOT APPLICABLE"
        if (isNA) {
            $('#father_citizen').val("NOT APPLICABLE");
            $('#father_sect').val("NOT APPLICABLE");
            $('#father_occupation').val("NOT APPLICABLE");
            $('#father_brgy').val("NOT APPLICABLE");
            $('#father_city').val("NOT APPLICABLE");
            $('#father_province').val("NOT APPLICABLE");
            $('#father_country').val("NOT APPLICABLE");
            $('#father_age').val("N/A");
            
            // Marriage Section Sync
            $('#marriage_date').val("NOT APPLICABLE");
            $('#mp_month').val("NOT APPLICABLE");
            $('#mp_day, #mp_year').val("");
            
            // Set the hidden marriage_place variable for Page 2
            $('#marriage_place_combined').val("NOT APPLICABLE");
            
            $('#father_lname').val("");
            $('#father_mname').val("");
        }
    }

    // Listeners for typing or Enter key
    fatherFname.on('input keydown blur', function(e) {
        handleFatherLogic();
        if (typeof saveToMemory === "function") saveToMemory();
    });

    // Run on page load
    handleFatherLogic();
});
</script>


<script>
	// Function to handle Enter key on Country fields
function handleCountryEnter(event) {
    if (event.key === "Enter") {
        event.preventDefault(); // Prevents moving to next line/field immediately
        
        let val = event.target.value.trim().toUpperCase();
        
        // If the box is empty, default to PHILIPPINES
        if (val === "") {
            event.target.value = "PHILIPPINES";
        } else {
            // If the user typed something else, keep their changed value
            event.target.value = val;
        }
        
        // Move focus to the next logical input box
        const inputs = document.querySelectorAll(".form-control");
        const index = Array.from(inputs).indexOf(event.target);
        if (index > -1 && inputs[index + 1]) {
            inputs[index + 1].focus();
        }
    }
}

// Attach the listener to Mother, Father, and Late Registration Country fields
document.getElementById("mother_country").addEventListener("keydown", handleCountryEnter);
document.getElementById("father_country").addEventListener("keydown", handleCountryEnter);
document.getElementById("late_citizen").addEventListener("keydown", handleCountryEnter);
</script>

<script>
		$(document).ready(function() {

			// 1. Copy Child's Middle Name -> Mother's Maiden Last Name
			$('#child_mname').on('keydown', function(e) {
				if (e.key === "Enter") {
					e.preventDefault(); 
					$('#mother_lname').val($(this).val());
					$('#child_lname').focus(); 
				}
			});
			$('#child_lname').on('keydown', function(e) {
				if (e.key === "Enter") {
					e.preventDefault(); 
					$('#father_lname').val($(this).val());
					$('#child_lname').focus(); 
				} 
			});
		});
</script>

<script>

	$(document).ready(function() {
    // List of IDs that should trigger current date on Enter
    const dateFieldIds = [
        'birth_day', 
        'marriage_date', 
        'attendant_date', 
        'informant_date', 
        'prepared_date', 
        'received_date', 
        'civil_date'
    ];

    // Listen for Enter key on these specific fields
    $('input').on('keydown', function(e) {
        if (e.key === "Enter") {
            const currentId = $(this).attr('id');

            if (dateFieldIds.includes(currentId)) {
                // If the box is empty, inject current date
                if ($(this).val().trim() === "") {
                    e.preventDefault(); // Stop move-to-next-field temporarily
                    
                    const now = new Date();
                    const options = { month: 'long', day: 'numeric', year: 'numeric' };
                    // Format: FEBRUARY 19, 2026
                    const formattedDate = now.toLocaleDateString('en-US', options).toUpperCase();

                    $(this).val(formattedDate);
                    
                    // Trigger your existing saveToMemory function
                    if (typeof saveToMemory === "function") {
                        saveToMemory();
                    }
                }
            }
        }
    });
});

</script>

<script>
	$(document).ready(function() {

	function formatDateFormal(inputVal) {
    if (!inputVal) return "";
    
    const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                 "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

    // Clean extra spaces and force uppercase
    let v = inputVal.replace(/\s\s+/g, ' ').trim().toUpperCase();
    let parts = v.split(/[\s\/\.-]+/);

    if (parts.length === 3) {
        let day = parts[0];
        let month = parts[1];
        let year = parts[2];

        // Scenario: Month is already a word (e.g., "10 OCTOBER 2004")
        if (MON.includes(month)) {
            return `${month} ${day}, ${year}`; // Returns OCTOBER 10 2004
        }
        
        // Scenario: Month is first (e.g., "OCTOBER 10 2004")
        if (MON.includes(day)) {
            return `${day} ${parts[1]}, ${parts[2]}`;
        }

        // Scenario: Numeric (e.g., "10 10 2004") -> Middle number becomes Month name
        const mIdx = parseInt(month, 10);
        if (!isNaN(mIdx) && mIdx >= 1 && mIdx <= 12) {
            return `${MON[mIdx - 1]} ${day}, ${year}`;
        }
    }
    return v;
}

  $('#birth_day').on('keydown', function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    // Get the current value
                    let originalValue = $(this).val();
                    // Call your function and get the formatted result
                    let formattedValue = formatDateFormal(originalValue);
                    // Update the input with the formatted value
                    $(this).val(formattedValue);
                }
            });

	});
</script>

<script>
$(document).ready(function() {

    const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                 "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

    $(document).ready(function() {
    // 1. SPLIT DATA ON PAGE LOAD (from database)
    let initialVal = $('#child_birth_date').val().trim();
    if (initialVal && !initialVal.includes('<')) {
        let parts = initialVal.split(/[\s\/\.-]+/); 
        if (parts.length >= 3) {
            $('#bd_day').val(parts[0]);
            $('#bd_month').val(parts[1]);
            $('#bd_year').val(parts[2]);
        }
    }

    // 2. SMART FORMATTING (Triggers on leaving any box)
    $('#bd_day, #bd_month, #bd_year').on('blur', function() {
        const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                     "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
        
        let mVal = $('#bd_month').val().trim();
        if (!isNaN(mVal) && mVal !== "") {
            let idx = parseInt(mVal, 10);
            if (idx >= 1 && idx <= 12) $('#bd_month').val(MON[idx - 1]);
        }

        let yVal = $('#bd_year').val().trim();
        if (yVal.length > 0 && yVal.length < 4) {
            let yInt = parseInt(yVal, 10);
            $('#bd_year').val(yInt < 30 ? 2000 + yInt : 1900 + yInt);
        }

        // Combine into the hidden field Page 2 actually looks for
        let finalD = $('#bd_day').val().trim();
        let finalM = $('#bd_month').val().trim();
        let finalY = $('#bd_year').val().trim();
        $('#child_birth_date').val(`${finalD} ${finalM} ${finalY}`);
        
        // SAVE TO MEMORY IMMEDIATELY
        saveToMemory();
    });
});

    // ========================================================
    // 3. KEYBOARD CONTROLS (SPACE & ENTER TO JUMP)
    // ========================================================
    $('#bd_day, #bd_month, #bd_year').on('keydown', function(e) {
        // If they press Space or Enter, just move the cursor to the next box.
        // The formatting will happen automatically in the "blur" script below!
        if (e.key === " " || e.code === "Space" || e.key === "Enter" || e.keyCode === 13) {
            e.preventDefault(); 
            
            let currentId = $(this).attr('id');
            if (currentId === 'bd_day') $('#bd_month').focus();
            else if (currentId === 'bd_month') $('#bd_year').focus();
            else if (currentId === 'bd_year') $('#birth_brgy').focus(); 
        }
    });

    // ========================================================
    // 4. SMART FORMATTING (Triggers the moment you leave the box)
    // ========================================================
    
    // When you paste a full date (10/10/08) into the Day box
    $('#bd_day').on('blur', function() {
        let currentVal = $(this).val().trim();
        let parts = currentVal.split(/[\s\/\.-]+/);
        if (parts.length === 3) {
            $('#bd_day').val(parts[0]);
            $('#bd_month').val(parts[1]);
            $('#bd_year').val(parts[2]);
            $('#bd_year').trigger('blur'); // Force the year to auto-complete
        }
    });

    // When you leave the Month or Year box (via Tab, Space, Enter, or Click)
    $('#bd_month, #bd_year').on('blur', function() {
        const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                     "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
        
        // 1. Format Month (Turn "10" into "OCTOBER")
        let mVal = $('#bd_month').val().trim();
        if (!isNaN(mVal) && mVal !== "") {
            let monthIdx = parseInt(mVal, 10);
            if (monthIdx >= 1 && monthIdx <= 12) {
                $('#bd_month').val(MON[monthIdx - 1]);
            }
        } else if (mVal !== "") {
            $('#bd_month').val(mVal.toUpperCase()); 
        }

        // 2. Auto-Complete Year (Turn "08" into "2008" or "95" into "1995")
        let yVal = $('#bd_year').val().trim();
        if (yVal !== "" && !isNaN(yVal) && yVal.length > 0 && yVal.length < 4) {
            let yInt = parseInt(yVal, 10);
            if (yInt < 100) {
                let currentYear = new Date().getFullYear();
                let currentTwoDigit = currentYear % 100;
                
                if (yInt > currentTwoDigit + 5) {
                    $('#bd_year').val(1900 + yInt);
                } else {
                    $('#bd_year').val(2000 + yInt);
                }
            }
        }

        // 3. Update the hidden form field with the newly formatted date
        let finalD = $('#bd_day').val().trim();
        let finalM = $('#bd_month').val().trim();
        let finalY = $('#bd_year').val().trim();
        $('#child_birth_date').val(finalD + " " + finalM + " " + finalY);
    });
		$('input').on('blur change', saveToMemory);
});
</script>

<script>
function saveToMemory() {
    // 1. Capture and clean the marriage date input
    let mDate = $('#marriage_date').val().trim().toUpperCase();
    let mPlace = $('input[name="marriage_place"]').val();

    // 2. Auto-set place to NOT APPLICABLE if date is NOT MARRIED or N/A
    if (mDate === "NOT MARRIED" || mDate === "NOT APPLICABLE" || mDate === "N/A") {
        mPlace = "NOT APPLICABLE";
        $('input[name="marriage_place"]').val(mPlace);
    }

    // 3. Construct the data object with correct comma placement
    const newData = {
        child_fname: $('#child_fname').val(),
        child_mname: $('#child_mname').val(),
        child_lname: $('#child_lname').val(),
        father_fname: $('#father_fname').val(),
        father_mname: $('#father_mname').val(),
        father_lname: $('#father_lname').val(),
        mother_fname: $('#mother_fname').val(),
        mother_mname: $('#mother_mname').val(),
        mother_lname: $('#mother_lname').val(),
        // Connects to Page 2 using the correct storage key and hidden field ID
        birth_day: $('#child_birth_date').val(),
        birth_place: ($('#birth_city').val() + " " + $('#birth_province').val()).trim(),
        marriage_date: mDate,
        marriage_place: mPlace,
        civil_name: $('#civil_name').val(),
        civil_position: $('#civil_position').val(),
        informant_name: $('#informant_name').val(),
        informant_address: $('#informant_address').val(),
        rel_child: $('#rel_child').val(),
		attendant_name: $('#attendant_name').val(),
		attendant_position: $('#attendant_position').val().toUpperCase(),

		attendant_address: ($('#attendant_address1').val() + " " + $('input[name="attendant_address2"]').val()).trim().toUpperCase(),
    };

    // 4. Save to browser memory for Page 2 retrieval
    const rawOldData = localStorage.getItem('birth_form_data');
    const oldData = rawOldData ? JSON.parse(rawOldData) : {};

    if (JSON.stringify(newData) !== JSON.stringify(oldData)) {
        localStorage.setItem('birth_form_data', JSON.stringify(newData));
    }
}
</script>

<script> 
	$(document).ready(function() {
    function toggleMarriagePlace() {
        let mDate = $('#marriage_date').val().trim().toUpperCase();
        // Target the 3 individual boxes in 20b
        let mpInputs = $('#mp_day, #mp_month, #mp_year');
        let mPlaceHidden = $('#marriage_place');

        if (mDate === "NOT MARRIED" || mDate === "NOT APPLICABLE" || mDate === "N/A") {
            // 1. Fill boxes with "N", "A", "N/A" or just clear them
            $('#mp_month').val("NOT APPLICABLE");

            
            // 2. Set the hidden variable for the database
            mPlaceHidden.val("NOT APPLICABLE");

            // 3. Disable the boxes and change color
            mpInputs.prop('disabled', true);
            mpInputs.parent().css('background-color', '#e9ecef'); // Makes the whole bar gray
        } else {
            // Re-enable if the user types a real date
            mpInputs.prop('disabled', false);
            mpInputs.parent().css('background-color', 'white');
            
            // Clear the "N/A" values so they can type
            if ($('#mp_day').val() === "N/A") {
                mpInputs.val("");
                mPlaceHidden.val("");
            }
        }
    }

    // Keep your existing listeners
    $('#marriage_date').on('input blur', function() {
        toggleMarriagePlace();
        saveToMemory();
    });

    toggleMarriagePlace();
});
</script>

<script> 
	$(document).ready(function() {
    $('#attendant_position').on('keydown', function(e) {
        if (e.key === "Enter") {
            const val = $(this).val().trim().toUpperCase();
            const standardPositions = ["PHYSICIAN", "NURSE", "MIDWIFE", "HILOT"];

            // 1. If the position is not one of the standard 4, sync it to "Others"
            if (val !== "" && !standardPositions.includes(val)) {
                $('#others').prop('checked', true);
                $('#otherstxt').val(val);
                
                // Uncheck standard boxes to stay accurate
                $('#physician, #nurse, #midwife, #hilot').prop('checked', false);
            } else if (standardPositions.includes(val)) {
                // If they typed a standard one, ensure the correct checkbox is ticked
                $('#others').prop('checked', false);
                $('#otherstxt').val("");
                $(`#${val.toLowerCase()}`).prop('checked', true);
            }

            // 2. Save to Memory for Page 2 connection
            if (typeof saveToMemory === "function") {
                saveToMemory();
            }
        }
    });
});
</script>

<script>

	$(document).ready(function() {
    // Sync "Others (Specify)" in 21a to "Title or Position" in 21b
    $('#otherstxt').on('keydown', function(e) {
        if (e.key === "Enter") {
            const val = $(this).val().trim().toUpperCase();
            
            if (val !== "") {
                // 1. Auto-fill the Certification field below
                $('#attendant_position').val(val);
                
                // 2. Ensure the "Others" checkbox is ticked
                $('#others').prop('checked', true);
                
                // 3. Uncheck standard boxes to maintain accuracy
                $('#physician, #nurse, #midwife, #hilot').prop('checked', false);
                
                // 4. Save to memory for Page 2 connection
                if (typeof saveToMemory === "function") {
                    saveToMemory();
                }
            }
        }
    });
});

</script>