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

<div class="ctf-birth pt-3" style="width:960px; margin:auto;">
	<!--birth form-->
	<div class="form" style="padding:0 15px 0 15px;">
	 	<!-- Header -->
	  	<div class="row"><!--grid of header-->
		  	<div class="col-9" style="border:2px solid green;">
				<p class="m1">Municipal Form No. 102</p>
				<p class="m1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span align="center" class="m2" style="font-size:15px;">Republic of the Philippines</span></p>
				<p align="center" class="m2 text-center" style="font-size:16px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
				<p align="center" class="m2" style="font-size:30px; font-weight:bold;">CERTIFICATE OF LIVE BIRTH</p>
		  	</div>
		  	<div class="col-3" id="book" style="border:2px solid green; border-left:none; border-bottom:none;">
		     	<div class="form-group">
		     		<label id="ltxt">Book No.</label>
					<input type="text" class="bookNo form-control form-control-sm" id="bookno" onkeypress="return isNumberKey(event)" name="book_no">
					<input type="hidden" class="form-control form-control-sm" id="bookno1" name="book_no1">

					<label id="ltxt">Page No.</label>
					<input type="text" class="pageNo form-control form-control-sm" name="page_no" id="pageno" onkeypress="return isNumberKey(event)">
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
					    <span class="input-group-text bg-white p-0" style="border:none; color:black;">&nbsp;Province&nbsp;&emsp;&emsp;&emsp;&emsp;</span>
					</div>
				
					<input type="text" list='province_list' class="form-control form-control-sm" value="TARLAC" name="provinces" onkeypress="return isTextKey(event)" required>
					
					
							
				<!--	<input type="text" class="form-control form-control-sm" placeholder="" name="provinces" onkeypress="return isTextKey(event)" required="">-->
				</div>
				<div class="input-group mt-1">
					<div class="input-group-prepend">
					    <span class="input-group-text bg-white p-0" style="border:none; color:black;">&nbsp;City/Municipality&nbsp;&nbsp;</span>
					</div>
					
					<input type="text" list='municipality_list' class="form-control form-control-sm" value="GERONA" name="municipal" onkeypress="return isTextKey(event)" required>

						
							
					<!--<input type="text" class="form-control form-control-sm" placeholder="" name="municipal" onkeypress="return isTextKey(event)" required="">-->
					</div>
				</div>
				<div class="col-3" id="book" style="border:2px solid green; border-left:none; border-top:none;">
				    <div class="form-group">
					  	<label id="ltxt">Registry No.</label>
					  	<input type="text" class="regNo form-control form-control-sm" name="registry_no" id="regno"> 
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
			  		  		<h6 style="padding-top:2px; font-size:14px;">1.&nbsp;NAME</h6>
			  			</div>
			  			<div class="col-4">
			  		  		<h6 align="center"><span style="color:green; font-size:12px;">(First)</span></h6>
			  		  		<div class="input-group">
					    		<input type="text" class="form-control form-control-sm" id="child_fname" name="child_fname" onkeypress="return isTextKey(event)">
					  		</div>
			  			</div>
					  	<div class="col-4">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Middle)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" id="child_mname" name="child_mname" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
					  	<div class="col-3">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Last)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" id="child_lname" name="child_lname" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
			  		</div><!--close row-->
		  			<div class="row" style="border-top:2px solid green;">
			  			<div class="col-3" style="border-right:2px solid green;">
			  		  		<h6 style="padding-top:2px; font-size:14px;">2.&nbsp;SEX<span style="color:green; font-size:12px;">(Male/Female)</span></h6>
			  		  		<div class="input-group input-group-sm">
			  		  			<select name="sex" class="form-control">
									<option selected style="display:none;"></option>
									<option value="Male" style="font-size:15px;">Male</option>
									<option value="Female" style="font-size:15px;">Female</option>
								</select>
							</div>
			  			</div>
			  			<div class="col-2">
			  		  		<h6 style="padding-top:2px; font-size:14px;">3.&nbsp;DATE OF<br>&emsp;BIRTH</h6>
			  			</div>
						<div class="col-5">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Day) - (Month) - (Year)</span></h6>
					  		<div class="input-group input-group-sm">
							    <input type="date" class="form-control form-control-sm"  id="birth_day" name="birth_day">
							</div>
					  	</div>
						<!--
					  	<div class="col-2">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Day)</span></h6>
					  		<div class="input-group input-group-sm">
							    <input type="text" class="form-control form-control-sm" maxlength="2" id="birth_day" name="birth_day" onkeypress="return isNumberKey(event)">
							</div>
					  	</div>
					  	<div class="col-3">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Month)</span></h6>
					  		<div class="input-group">
					  			<select id="birth_month" name="birth_month" class="form-control form-control-sm">
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
					  	<div class="col-2">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Year)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" maxlength="5" id="birth_year" name="birth_year" onkeypress="return isNumberKey(event)">
							</div>
					  	</div> -->

			    	</div><!--close row-->
				  	<div class="row" style="border-top:2px solid green;">
					  	<div class="col-2">
					  		<h6 style="padding-top:2px; font-size:14px;">4.&nbsp;PLACE OF <br>&emsp;BIRTH</h6>
					  	</div>
					  	<div class="col-4">
					  		<h6><span class="m-0" style="color:green; font-size:12px;">(Name of Hospital/Clinic/Institution/<br>House No.,St.,Barangay)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" id="birth_brgy" name="birth_brgy">
							</div>
					  	</div>
					  	<div class="col-3">
					  		<h6><span class="m-0"  style="color:green; font-size:12px;">(City/Municipality)</span></h6>
					  		<div class="input-group" style="padding-top:19px;">

							<!-- <select name="birth_city" id="birth_city" class="form-control">
								<option selected style="display:none;"></option>
							</select> -->

							<input id="birth_city" type="text" list='municipality_list' class="form-control" value="GERONA" name="birth_city" onkeypress="return isTextKey(event)" required>


							    <!--<input type="text" class="form-control form-control-sm" id="birth_city" name="birth_city" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
					  	<div class="col-3">
					  		<h6><span class="m-0"  style="color:green; font-size:12px;">(Province)</span></h6>
					  		<div class="input-group" style="padding-top:19px;">


							<input  id="birth_province" type="text" list='province_list' class="form-control" value="TARLAC" name="birth_province" onkeypress="return isTextKey(event)" required>
						

							  <!-- <select name="birth_province" id="birth_province" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblprovinces";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['province'] . "'>" . $row['province'] . "</option>";
									// }
									
									?>
									</select> -->
									
							   <!-- <input type="text" class="form-control form-control-sm" id="birth_province" name="birth_province" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
					</div><!--close row-->
					<div class="row">
					  	<div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:14px;">5a.&nbsp;TYPE OF BIRTH<br>&emsp;&nbsp;&nbsp;<span style="color:green; font-size:12px">(Single, Twin, Triplet, etc.)</span></h6>
							<div class="input-group" style="padding-top:13px;">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="birth_type" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
					  	<div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:12px;">5b.&nbsp;IF MULTIPLE BIRTH, CHILD WAS<br>&emsp;&nbsp;&nbsp;<span style="color:green; font-size:12px;">(First, Second, Third, etc.)</span></h6>
					  		<div class="input-group" style="padding-top:17px;">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="multi_birth_was" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
					  	<div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:13px;">5c.&nbsp;BIRTH ORDER<span style="color:green; font-size:9px;">(Order of this birth to <br>&emsp;&nbsp;&nbsp;&nbsp;previous live births including fetal death)</span><br>&emsp;&nbsp;&nbsp;<span style="color:green; font-size:12px;">(First, Second, Third, etc.)</span></h6>
							<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="birth_order" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
					  	<div class="col-3" style="border-top:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:14px;">5d.&nbsp;WEIGHT OF BIRTH</h6>
							<div class="input-group" style="padding-top:29px;">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="birth_weight" onkeypress="return isNumberKey(event)">
							    <span style="font-size:14px;">&nbsp;grams</span>
							</div>
					  	</div>
				  	</div><!--close row-->

	 			</div><!--close col-->
    		</div><!--close row-->
    		<!-- Mother Info -->
    		<div class="row">
    			<div class="mother" style="border:2px solid green; border-top:none; padding:4em 3px 0 1px;" align="center">
		  			<h4>M<br>O<br>T<br>H<br>E<br>R</h4>
		  		</div>
		  		<div class="col" style="border:2px solid green; border-left:none; border-top:none;">
			  		<div class="row">
			  			<div class="col-1">
			  		  		<h6><span style="font-size:14px;">7.&nbsp;MAIDEN<br>&nbsp;&nbsp;&nbsp;&nbsp;NAME</span></h6>
			  			</div>
			  			<div class="col-4">
			  		  		<h6 align="center"><span style="color:green; font-size:12px;">(First)</span></h6>
			  		  		<div class="input-group">
					    		<input type="text" class="form-control form-control-sm" id="mother_fname" placeholder="" name="mother_fname" onkeypress="return isTextKey(event)">
					  		</div>
			  			</div>
					  	<div class="col-4">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Middle)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" id="mother_mname" placeholder="" name="mother_mname" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
					  	<div class="col-3">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Last)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" id="mother_lname" placeholder="" name="mother_lname" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
			  		</div><!--close row-->
		  			<div class="row" style="border-top:2px solid green;">
			  			<div class="col-6" style="border-right:2px solid green;">
			  		  		<h6 style="padding-top:2px; font-size:14px;">8.&nbsp;CITIZENSHIP</h6>
			  		  		<div class="input-group">

								<!-- <select name="mother_citizen" id="mother_citizen" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblcitizen";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
									// }
									
									?>
									</select> -->

									<input id="mother_citizen" type="text" list='citizen_list' class="form-control" value="FILIPINO" name="mother_citizen" onkeypress="return isTextKey(event)" required>
									
							 <!--   <input type="text" class="form-control form-control-sm" placeholder="" name="mother_citizen" onkeypress="return isTextKey(event)">-->
							</div>
			  			</div>
			  			<div class="col-6">
			  		  		<h6 style="font-size:14px;">9.&nbsp;RELIGION/RELIGIOUS SECT</h6>
			  				<div class="input-group">
					
								<input type="text" list='religious_sect' class="form-control" name="mother_sect" onkeypress="return isTextKey(event)" required>
									
							    <!--<input type="text" class="form-control form-control-sm" placeholder="" name="mother_sect" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
			    	</div><!--close row-->
				  	<div class="row" style="border-top:2px solid green;">
					  	<div class="col-2" style="border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:14px;">10a.<span style="font-size:11px;">&nbsp;Total number of<br>&emsp;&emsp; children born alive</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="ttl_no_child" onkeypress="return isNumberKey(event)">
							</div>
					  	</div>
					  	<div class="col-2" style="border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:14px;">10b.<span style="font-size:10.5px;">&nbsp;No. of children still living including this birth</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="no_child_alive" onkeypress="return isNumberKey(event)">
							</div>
					  	</div>
					  	<div class="col-2" style="border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:14px;">10c.<span style="font-size:10.5px;">&nbsp;No. of children born<br>&emsp; alive but are now dead</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="no_child_dead" onkeypress="return isNumberKey(event)">
							</div>
					  	</div>
					  	<div class="col-4" style="border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:14px;">11.&nbsp;OCCUPATION</h6>
					  		<div class="input-group" style="padding-top:16px;">


							  <!-- <select name="mother_occupation" id="mother_occupation" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tbloccupation";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['occupation'] . "'>" . $row['occupation'] . "</option>";
									// }
									
									?>
									</select> -->

									<input id="mother_occupation type="text" list='occupation_list' class="form-control" name="mother_occupation" onkeypress="return isTextKey(event)" required>
									
							 <!--   <input type="text" class="form-control form-control-sm" placeholder="" name="mother_occupation" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
					  	<div class="col-2">
					  		<h6 style="padding-top:2px; font-size:14px;">12.<span style="font-size:10.2px;">&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="mother_age" onkeypress="return isNumberKey(event)">
							</div>
					  	</div>
					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
					  	<div class="col-1">
					  		<h6 style="padding-top:2px; font-size:14px;">13.&nbsp;RESIDENCE</h6>
					  	</div>
					  	<div class="col-4" style="padding-left:3em;">
					  		<h6><span style="color:green; font-size:12px; margin:0;">(House No.,St.,Barangay)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" name="mother_brgy">
							</div>
					  	</div>
					  	<div class="col-3">
					  		<h6><span style="color:green; font-size:12px; margin:0;">(City/Municipality)</span></h6>
					  		<div class="input-group">
							  <!-- <select name="mother_city" id="mother_city" class="form-control">
								<option selected style="display:none;"></option>
							</select> -->
							<input id="mother_city" type="text" list='municipality_list' class="form-control" value="GERONA" name="mother_city" onkeypress="return isTextKey(event)" required>
							   <!-- <input type="text" class="form-control form-control-sm" placeholder="" name="mother_city" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
					  	<div class="col-2">
					  		<h6><span style="color:green; font-size:12px; margin:0;">(Province)</span></h6>
					  		<div class="input-group">
							  <!-- <select name="mother_province" id="mother_province" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblprovinces";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['province'] . "'>" . $row['province'] . "</option>";
									// }
									
									?>
									</select> -->
									<input id="mother_province" type="text" list='province_list' class="form-control" value="TARLAC" name="mother_province" onkeypress="return isTextKey(event)" required>
							    <!--<input type="text" class="form-control form-control-sm" placeholder="" name="mother_province" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
					  	<div class="col-2">
					  		<h6><span style="color:green; font-size:12px; margin:0;">(Country)</span></h6>
					  		<div class="input-group">
								
							  <!-- <select name="mother_country" id="mother_country" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblcountry";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['country'] . "'>" . $row['country'] . "</option>";
									// }
									
									?>
									</select> -->
									
									<input id="mother_country" type="text" list='country_list' class="form-control" value="PHILIPPINES" name="mother_country" onkeypress="return isTextKey(event)" required>
									

							   <!-- <input type="text" class="form-control form-control-sm" placeholder="" name="mother_country" onkeypress="return isTextKey(event)">-->
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
			  		  		<h6><span style="font-size:14px;">14.&nbsp;NAME</span></h6>
			  			</div>
			  			<div class="col-4">
			  		  		<h6 align="center"><span style="color:green; font-size:12px;">(First)</span></h6>
			  		  		<div class="input-group">
					    		<input type="text" class="form-control form-control-sm" placeholder="" id="father_fname" name="father_fname" onkeypress="return isTextKey(event)">
					  		</div>
			  			</div>
					  	<div class="col-4">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Middle)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" id="father_mname" name="father_mname" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
					  	<div class="col-3">
					  		<h6 align="center"><span style="color:green; font-size:12px;">(Last)</span></h6>
					  		<div class="input-group">
							    <input type="text" class="form-control form-control-sm" placeholder="" id="father_lname" name="father_lname" onkeypress="return isTextKey(event)">
							</div>
					  	</div>
			  		</div><!--close row-->
		  			<div class="row" style="border-top:2px solid green;">
			  			<div class="col-3" style="border-right:2px solid green;">
			  		  		<h6><span style="font-size:14px;">15.&nbsp;CITIZENSHIP</span></h6>
			  		  		<div class="input-group" style="padding-top:15px;">

								<!-- <select name="father_citizen" id="father_citizen" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblcitizen";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['citiz'] . "'>" . $row['citiz'] . "</option>";
									// }
									
									?>
									</select> -->

									<input id="father_citizen" type="text" list='citizen_list' class="form-control" value="FILIPINO" name="father_citizen" onkeypress="return isTextKey(event)" required>
							   <!-- <input type="text" class="form-control form-control-sm" placeholder="" name="father_citizen" onkeypress="return isTextKey(event)">-->
							</div>
			  			</div>
			  			<div class="col-4" style="border-right:2px solid green;">
			  		  		<h6 style="font-size:14px;">16.&nbsp;RELIGION/RELIGIOUS SECT</h6>
			  				<div class="input-group" style="padding-top:18px;">

							  <!-- <select name="father_sect" id="father_sect" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblreligious";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['relsec'] . "'>" . $row['relsec'] . "</option>";
									// }
									
									?>
									</select> -->
									<input id="father_sect" type="text" list='religious_sect' class="form-control" name="father_sect" onkeypress="return isTextKey(event)" required>

							    <!--<input type="text" class="form-control form-control-sm" placeholder="" name="father_sect" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
					  	<div class="col-3" style="border-right:2px solid green;">
					  		<h6 style="padding-top:2px; font-size:14px;">17.&nbsp;OCCUPATION</h6>
					  		<div class="input-group" style="padding-top:16px;">

							  <!-- <select name="father_occupation" id="father_occupation" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tbloccupation";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['occupation'] . "'>" . $row['occupation'] . "</option>";
									// }
									
									?>
									</select> -->
									<input id="father_occupation" type="text" list='occupation_list' class="form-control" name="father_occupation" onkeypress="return isTextKey(event)" required>


							    <!--<input type="text" class="form-control form-control-sm" placeholder="" name="father_occupation" onkeypress="return isTextKey(event)">-->
							</div>
					  	</div>
					  	<div class="col-2">
					  		<h6 style="padding-top:2px; font-size:14px;">18.<span style="font-size:10.2px;">&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
					  		<div class="input-group">
							   	<input type="text" class="form-control form-control-sm" placeholder="" name="father_age" onkeypress="return isNumberKey(event)">
							</div>
					  	</div>
			    	</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
					  	<div class="col-1">
					  		<h6 style="padding-top:2px; font-size:14px;">19.&nbsp;RESIDENCE</h6>
					  	</div>
					  	<div class="col-4" style="padding-left:3em;">
							<h6><span style="color:green; font-size:12px; margin:0;">(House No.,St.,Barangay)</span></h6>
							<div class="input-group">
								<input type="text" class="form-control form-control-sm" placeholder="" name="father_brgy">
							</div>
						</div>
						<div class="col-3">
							<h6><span style="color:green; font-size:12px; margin:0;">(City/Municipality)</span></h6>
							<div class="input-group">

							<!-- <select name="father_city" id="father_city" class="form-control">
								<option selected style="display:none;"></option>
							</select> -->
							<input id="father_city" type="text" list='municipality_list' class="form-control form-control-sm" value="GERONA" name="father_city" onkeypress="return isTextKey(event)" required>

								<!--<input type="text" class="form-control form-control-sm" placeholder="" name="father_city" onkeypress="return isTextKey(event)">-->
							</div>
						</div>
						<div class="col-2">
							<h6><span style="color:green; font-size:12px; margin:0;">(Province)</span></h6>
							<div class="input-group">

							<!-- <select name="father_province" id="father_province" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblprovinces";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['province'] . "'>" . $row['province'] . "</option>";
									// }
									
									?>
									</select> -->
									<input id="father_province" type="text" list='province_list' class="form-control form-control-sm" value="TARLAC" name="father_province" onkeypress="return isTextKey(event)" required>
					
								<!--<input type="text" class="form-control form-control-sm" placeholder="" name="father_province" onkeypress="return isTextKey(event)">-->
							</div>
						</div>
						<div class="col-2">
							<h6><span style="color:green; font-size:12px; margin:0;">(Country)</span></h6>
							<div class="input-group">

							<!-- <select name="father_country" id="father_country" class="form-control">
								<option selected style="display:none;"></option>
									<?php
									// require 'mycon.php';
									// $sqlp = "SELECT * from tblcountry";
									// $resultp = $connx->query($sqlp);
									
									
									// while ($row = $resultp->fetch_assoc()) {
									// echo "<option value='" . $row['country'] . "'>" . $row['country'] . "</option>";
									// }
									
									?>
									</select> -->
									<input id="father_country" type="text" list='country_list' class="form-control" value="PHILIPPINES" name="father_country" onkeypress="return isTextKey(event)" required>
									
								<!--<input type="text" class="form-control form-control-sm" placeholder="" name="father_country" onkeypress="return isTextKey(event)">-->
							</div>
						</div>
					</div><!--close row-->

				</div><!--close row-->
			</div><!--close col-->
	 		<!-- Marraige Info -->
			<div class="row" style="border:2px solid green; border-top:none;">
				<div class="col">
					<div class="row">
						<div class="col">
							<h6 style="padding:0;">MARRIAGE OF PARENTS <span style="font-size:12px;">(If not married, accomplish Affidavit of Acknowledgement/Admission of Paternity at the back.)</span></h6>
						</div>
					</div><!--close row-->
		  			<div class="row" style="border-top:2px solid green;">
			  			<div class="col-1">
			  		  		<h6 style="padding-top:2px; font-size:14px;">20a.&nbsp;DATE</h6>
			  			</div>
			  			<div class="col-3">
					  		<div class="row">
					  			<div class="col-4"><h6 align="center"><span style="color:green; font-size:12px;">(Day)</span></h6></div>
					  			<div class="col-4"><h6 align="center"><span style="color:green; font-size:12px;">(Month)</span></h6></div>
					  			<div class="col-4"><h6 align="center"><span style="color:green; font-size:12px;">(Year)</span></h6></div>
					  		</div>
					  		<div class="input-group">
							    <input type="date" class="form-control form-control-sm" id="marriage_date" name="marriage_date" style="word-spacing:2em;">
							</div>
					  	</div>
			  			<div class="col-1" style="border-left:2px solid green;">
			  		  		<h6 style="font-size:14px;">20b.&nbsp;PLACE</h6>
					  	</div>
					  	<div class="col-7">
					  		<div class="row">
					  			<div class="col-4">
							  		<h6><span style="color:green; font-size:12px; margin:0;">&emsp;(City/Municipality)</span></h6>
							  	</div>
							  	<div class="col-4">
							  		<h6><span style="color:green; font-size:12px; margin:0;">&emsp;(Province)</span></h6>  	
							  	</div>
							  	<div class="col-4">
							  		<h6><span style="color:green; font-size:12px; margin:0;">(Country)</span></h6> 	
							  	</div>
					  		</div>
					  		<div class="input-group">
								<input type="text" class="form-control form-control-sm" name="marriage_place" style="text-align:center; word-spacing:5px;" onkeypress="return isTextKey(event)">
							</div>
					  	</div>

					</div><!--close row-->
					<div class="row" style="border-top:2px solid green;">
					  	<div class="col">
					  		<h6 style="padding-top:2px; font-size:14px;">21a.&nbsp;ATTENDANT</h6>
					  		<div class="row">
					  			<div class="col">
					  				<div class="custom-control custom-checkbox custom-control-inline">
									    <input type="checkbox" class="custom-control-input" id="physician" name="attendant1" value="Physician">
									    <label class="custom-control-label" for="physician" style="font-size:14px;">&nbsp;1 Physician</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
									    <input type="checkbox" class="custom-control-input" id="nurse" name="attendant2" value="Nurse">
									    <label class="custom-control-label" for="nurse" style="font-size:14px;">&nbsp;2 Nurse</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
									    <input type="checkbox" class="custom-control-input" id="midwife" name="attendant3" value="Midwife">
      									<label class="custom-control-label" for="midwife" style="font-size:14px;">&nbsp;3 Midwife</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
									   	<input type="checkbox" class="custom-control-input" id="hilot" name="attendant4" value="Hilot">
      									<label class="custom-control-label" for="hilot" style="font-size:14px;">&nbsp;4 Hilot (Traditional Birth Attendant)</label>
									</div>
									<div class="custom-control custom-checkbox custom-control-inline">
									    <input type="checkbox" class="custom-control-input" id="others">
      									<label class="custom-control-label" for="others" style="font-size:14px;">&nbsp;5 Others (Specify)</label>
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
	 		<!-- Cerf Attendant -->
	 		<div class="row" style="border: 2px solid green; border-top:none;">
		  		<div class="col">
			  		<div class="row">
			  			<div class="col">
			  		  		<h6 style="padding-top:2px; font-size:14px;">21b. CERTIFICATION OF ATTENDANT AT BIRTH <span style="font-size: 12px;color:green">(Physician, Nurse, Midwife, Traditional Birth Attendant/Hilot, etc. )</span></h6>
			  		  		<h6 style="padding:0; font-size:14px;">&emsp;&emsp;&emsp;I hereby certify that I attended the birth of the child who was born alive at
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
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" placeholder="" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="attendant_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" id="attendant_position" name="attendant_position" onkeypress="return isTextKey(event)">
							</div>
			  			</div>
					  	<div class="col-6">
					  		<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="attendant_address1" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					    		<input type="text" class="form-control form-control-sm" name="attendant_address2" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" id="attendant_date" name="attendant_date">
							</div>
					  	</div>
			    	</div><!--close row-->

				</div><!--close row-->
	 		</div><!--close col-->
	 		<!-- Cerf Informant -->
	 		<div class="row" style="border: 2px solid green;border-top:none;">
		  		<div class="col">
		  			<div class="row">
			  			<div class="col-6" style="border-right: 2px solid green;">
			  				<h6 style="padding-top:2px; font-size:14px;">22. CERTIFICATION OF INFORMANT</h6>
			  				<h6 style="padding:0; font-size:14px; text-indent:4em;">I hereby certify that all information supplied are true and correct to my own knowledge and belief.</h6>
			  		  		<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="informant_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					    			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Relationship to the Child&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="rel_child" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
					  			</div>
					   			<input type="text" class="form-control form-control-sm" name="informant_address" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" id="informant_date" name="informant_date" value="<?php echo date('F j, Y', strtotime('now')); ?>">
							</div>
			  			</div>
					 	<div class="col-6">
					  		<h6 style="padding-top:2px; font-size:14px;">23. PREPARED BY</h6><br>
			  		  		<div class="input-group mt-3">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="prepared_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="prepared_position" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" id="prepared_date" name="prepared_date" value="<?php echo date('F j, Y', strtotime('now')); ?>">
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
			  				<h6 style="padding-top:2px; font-size:14px;">24. RECEIVED BY</h6>
			  		 		<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="received_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="received_position" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" id="received_date" name="received_date" value="<?php echo date('F j, Y', strtotime('now')); ?>">
							</div>
			  			</div>
					  	<div class="col-6">
					 	  	<h6 style="padding-top:2px; font-size:14px;">25. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
			  		  		<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					    			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Signature&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="civil_name" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" name="civil_position" onkeypress="return isTextKey(event)">
							</div>
							<div class="input-group mt-1">
					  			<div class="input-group-prepend">
					      			<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
					  			</div>
					    		<input type="text" class="form-control form-control-sm" id="civil_date" name="civil_date" value="<?php echo date('F j, Y', strtotime('now')); ?>">
							</div>
					  	</div>
			    	</div><!--close row-->

			 	</div><!--close row-->
	 		</div><!--close col-->
	 		<!-- Remarks -->
	 		<div class="row" style="border: 2px solid green;border-top:none;">
		  		<div class="col">
		  			<div class="row">
			  			<div class="col">
			  				<h6 style="padding-top:2px; font-weight:bold;">REMARKS/ANNOTATIONS (For LCRO/OCRG Use Only)</h6>
			  				<textarea style="width: 100%; height: 80px; font-size: 13px;" id="r"></textarea>
			  				<textarea style="width: 100%; height: 80px; font-size: 13px; display: none;" name="remarks" id="re"></textarea>
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
	 		<div class="row" style="border: 2px solid green;border-top:none;">
		  		<div class="col">
		  			<div class="row">
			  			<div class="col">
			  				<h6 style="padding-top:2px; font-size: 14px; font-weight:bold;">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
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

	 	<!--</form>-->
	 	</div>
	</div>

<!-- Javascript -->
<script src = "../../js/input_tno_only.js"></script>
<!-- <script>
	$(document).ready(function(){
		$("#birth_day").keyup(function(){
			var a = $("#birth_day").val();
			if(a >= 32){
				alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
				$("#birth_day").val("");
			}else if(a == '00'){
				alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
				$("#birth_day").val("");
			}
		});
	});
</script>-->
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
	var inputBox = document.getElementById('child_mname');
	var inputBox2 = document.getElementById('child_lname');

inputBox.onkeyup = function(){
    document.getElementById('mother_lname').value = inputBox.value;
	document.getElementById('mother_name').value = inputBox.value;
}


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
document.getElementById("mother_mname").onchange = function() {myFunction()};

function myFunction() {
  var mf = document.getElementById("mother_fname").value;
  var mm = document.getElementById("mother_mname").value;
  var ml = document.getElementById("mother_lname").value;
  var mamaname = document.getElementById("mother_name");

  var mama = mf + " " + mm + " " + ml;
  mamaname.value = mama;

}


document.getElementById("father_mname").onchange = function() {myFunctionF()};

function myFunctionF() {
  var pf = document.getElementById("father_fname").value;
  var pm = document.getElementById("father_mname").value;
  var pl = document.getElementById("father_lname").value;
  var papaname = document.getElementById("father_name");

  var papa = pf + " " + pm + " " + pl;
  papaname.value = papa;


  var cf = document.getElementById("child_fname").value;
  var cm = document.getElementById("child_mname").value;
  var cl = document.getElementById("child_lname").value;
  var bataname = document.getElementById("child_name");

  var bata = cf + " " + cm + " " + cl;
  bataname.value = bata;

  var birthbrgy = document.getElementById("birth_brgy").value;
  var birthcity = document.getElementById("birth_city").value;
  var birthprov = document.getElementById("birth_province").value;
  var birthplace = document.getElementById("birth_place");

  document.getElementById("birth_date").value = document.getElementById("birth_day").value;

  var birthloc = birthbrgy + " " + birthcity + " " + birthprov;
  birthplace.value = birthloc;

}
</script>
