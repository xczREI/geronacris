<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
	<!--birth form-->
	<div class="form" style="padding:0 15px 0 15px;">
		<!-- Header -->
		<div class="row"><!--grid of header-->
  			<div class="col-9" style="border: 2px solid green;">
			  	<p class="m1">Municipal Form No. 102</p>
			  	<p class="m1">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span align="center" class="m2" style="font-size: 15px;">Republic of the Philippines</span></p>
			  	<p align="center" class="m2" style="font-size: 16px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
			  	<p align="center" class="m2" style="font-size: 30px; font-weight: bold;">CERTIFICATE OF LIVE BIRTH</p>
  			</div>
  			<div class="col-3" id="book" style="border: 2px solid green; border-left:none; border-bottom:none;">
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
		  	<div class="col-9 pl-0" style="border: 2px solid green; border-top: none;">
		  		<div class="input-group mt-1">
			  		<div class="input-group-prepend">
			      		<span class="input-group-text bg-white p-0" style="border:none; color:black;">&nbsp;Province&nbsp;&emsp;&emsp;&emsp;&emsp;</span>
			  		</div>
			    	<input type="text" class="form-control form-control-sm" name="provinces" id="birth_txt" value="<?php echo $row['province']; ?>" onkeypress="return isTextKey(event)">
				</div>
		    	<div class="input-group mt-1">
			  		<div class="input-group-prepend">
			      		<span class="input-group-text bg-white p-0" style="border:none; color:black;">&nbsp;City/Municipality&nbsp;&nbsp;</span>
			 		</div>
			    	<input type="text" class="form-control form-control-sm" name="municipal" id="birth_txt" value="<?php echo $row['municipal']; ?>" onkeypress="return isTextKey(event)">
				</div>
		  	</div>
		  	<div class="col-3" id="book" style="border: 2px solid green;border-left:none; border-top: none;">
		    	<div class="form-group">
			  		<label id="ltxt">Registry No.</label>
			  		<input type="text" class="regNo form-control form-control-sm" name="registry_no" id="txt" value="<?php echo $row['registry_no']; ?>">
			  		<div id="error"></div>
				</div>
		  	</div>
	  	</div><!--close row-->
		<!-- Child Info -->
		<div class="row">
  			<div class="child" style="border: 2px solid green;border-top:none;padding: 5em 3px 0 3px;width: 30px;" align="center">
  				<h4>C<br>H<br>I<br>L<br>D</h4>
  			</div>
  			<div class="col" style="border: 2px solid green; border-left: none; border-top: none;">
	  			<div class="row">
	  				<div class="col-1">
	  		  			<h6 style="padding-top:2px; font-size:14px;">1.&nbsp;NAME</h6>
	  				</div>
	  				<div class="col-4">
	  		  			<h6 align="center"><span style="color:green;font-size:12px;">(First)</span></h6>
	  		  			<div class="input-group">
				    		<input type="text" class="form-control form-control-sm" id="child_fname" name="child_fname" style="text-align:center;" value="<?php echo $row['child_fname']; ?>" onkeypress="return isTextKey(event)">
			  			</div>
	  				</div>
			  		<div class="col-4">
			  		  	<h6 align="center"><span style="color:green;font-size:12px;">(Middle)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="child_mname" name="child_mname" style="text-align:center;" value="<?php echo $row['child_mname']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3">
			  		  	<h6 align="center"><span style="color:green;font-size:12px;">(Last)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="child_lname" name="child_lname" style="text-align:center;" value="<?php echo $row['child_lname']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
	  			</div><!--close row-->
				<div class="row" style="border-top: 2px solid green;">
	  				<div class="col-3" style="border-right: 2px solid green;">
	  		  			<h6 style="padding-top:2px; font-size:14px;">2.&nbsp;SEX<span style="color:green;font-size:12px;">(Male/Female)</span></h6>
	  		  			<div class="input-group input-group-sm">
	  		  				<select name="child_sex" class="form-control">
							    <option style="display: none;"><?php echo $row['child_sex']; ?></option>
							    <option value="Male" style="font-size: 15px;">Male</option>
							    <option value="Female" style="font-size: 15px;">Female</option>
							</select>
					  	</div>
	  				</div>
	  				<div class="col-2">
	  		  			<h6 style="padding-top:2px; font-size:14px;">3.&nbsp;DATE OF<br>&emsp;BIRTH</h6>
	  				</div>
			  		<div class="col-7">
			  		  	<div class="row">
			  				<div class="col-4"><h6 align="center"><span style="color:green;font-size:12px;">(Day)</span></h6></div>
			  				<div class="col-4"><h6 align="center"><span style="color:green;font-size:12px;">(Month)</span></h6></div>
			  				<div class="col-4"><h6 align="center"><span style="color:green;font-size:12px;">(Year)</span></h6></div>
			  			</div>
			  			<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id = "child_birth_date" name="child_birth_date" style="word-spacing: 5em; text-align:center;" value="<?php echo $row['child_birth_date'] ?> ">
					    </div>
					</div>
	    		</div><!--close row-->
		  	    <div class="row" style="border-top: 2px solid green;">
			  		<div class="col-2">
			  		  	<h6 style="padding-top:2px; font-size:14px;">4.&nbsp;PLACE OF <br>&emsp;BIRTH</h6>
			  		</div>
			  		<div class="col-4">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(Name of Hospital/Clinic/Institution/<br>House No.,St.,Barangay)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="birth_brgy" name="birth_brgy" value="<?php echo $row['birth_brgy']; ?>">
					  	</div>
			  		</div>
			  		<div class="col-3">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(City/Municipality)</span></h6>
			  		  	<div class="input-group" style="padding-top: 19px;">
					    	<input type="text" class="form-control form-control-sm" id="birth_city" name="birth_city" value="<?php echo $row['birth_municipal']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(Province)</span></h6>
			  		  	<div class="input-group" style="padding-top: 19px;">
					    	<input type="text" class="form-control form-control-sm" id="birth_province" name="birth_province" value="<?php echo $row['birth_province']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  	</div><!--close row-->
			    <div class="row">
			  		<div class="col-3" style="border-top: 2px solid green;border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">5a.&nbsp;TYPE OF BIRTH<br>&emsp;&nbsp;&nbsp;<span style="color:green;font-size:12px">(Single, Twin, Triplet, etc.)</span></h6>
					  	<div class="input-group" style="padding-top: 13px;">
					    	<input type="text" class="form-control form-control-sm" name="birth_type" style="text-align:center;" value="<?php echo $row['birth_type']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3" style="border-top: 2px solid green;border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:12px;">5b.&nbsp;IF MULTIPLE BIRTH, CHILD WAS<br>&emsp;&nbsp;&nbsp;<span style="color:green;font-size:12px">(First, Second, Third, etc.)</span></h6>
			  		  	<div class="input-group" style="padding-top: 17px;">
					    	<input type="text" class="form-control form-control-sm" name="multi_birth_was" style="text-align:center;" value="<?php echo $row['if_multi_birth_was']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3" style="border-top: 2px solid green;border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:13px;">5c.&nbsp;BIRTH ORDER<span style="color:green;font-size:9px">(Order of this birth to <br>&emsp;&nbsp;&nbsp;&nbsp;previous live births including fetal death)</span><br>&emsp;&nbsp;&nbsp;<span style="color:green;font-size:12px">(First, Second, Third, etc.)</span></h6>
					  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="birth_order" style="text-align:center;" value="<?php echo $row['birth_order']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3" style="border-top: 2px solid green;">
			  			<h6 style="padding-top:2px; font-size:14px;">5d.&nbsp;WEIGHT OF BIRTH</h6>
					  	<div class="input-group" style="padding-top: 29px;">
					    	<input type="text" class="form-control form-control-sm" placeholder="" name="birth_weight" style="text-align:center;" value="<?php echo $row['birth_weight']; ?>" onkeypress="return isNumberKey(event)">
					    	<span style="font-size:14px;">&nbsp;grams</span>
					  	</div>
			  		</div>
		  	    </div><!--close row-->

			</div><!--close col-->
		</div><!--close row-->
  		<!-- Mother Info -->
		<div class="row">
			<div class="mother" style="border: 2px solid green;border-top:none;padding: 4em 3px 0 1px;" align="center">
  				<h4>M<br>O<br>T<br>H<br>E<br>R</h4>
  			</div>
  			<div class="col" style="border: 2px solid green; border-left: none; border-top: none;">
	  			<div class="row">
	  				<div class="col-1">
	  		  			<h6><span style="font-size: 14px;">7.&nbsp;MAIDEN<br>&nbsp;&nbsp;&nbsp;&nbsp;NAME</span></h6>
	  				</div>
	  				<div class="col-4">
	  		  			<h6 align="center"><span style="color:green;font-size:12px;">(First)</span></h6>
	  		  			<div class="input-group">
				    		<input type="text" class="form-control form-control-sm" id="mother_fname" name="mother_fname" style="text-align:center;" value="<?php echo $row['mother_fname']; ?>" onkeypress="return isTextKey(event)">
			  			</div>
	  				</div>
			  		<div class="col-4">
			  		  	<h6 align="center"><span style="color:green;font-size:12px;">(Middle)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="mother_mname" name="mother_mname" style="text-align:center;" value="<?php echo $row['mother_mname']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3">
			  		  	<h6 align="center"><span style="color:green;font-size:12px;">(Last)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="mother_lname" name="mother_lname" style="text-align:center;" value="<?php echo $row['mother_lname']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
	  			</div><!--close row-->
  				<div class="row" style="border-top: 2px solid green;">
	  				<div class="col-6" style="border-right: 2px solid green;">
	  		  			<h6 style="padding-top:2px;font-size: 14px;">8.&nbsp;CITIZENSHIP</h6>
	  		  			<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="mother_citizen" value="<?php echo $row['mother_citizen']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
	  				</div>
	  				<div class="col-6">
	  		  			<h6 style="font-size: 14px;">9.&nbsp;RELIGION/RELIGIOUS SECT</h6>
	  					<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="mother_sect" value="<?php echo $row['mother_religion']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
	    		</div><!--close row-->
		  	    <div class="row" style="border-top: 2px solid green;">
			  		<div class="col-2" style="border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">10a.<span style="font-size: 11px;">&nbsp;Total number of<br>&emsp;&emsp; children born alive</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="ttl_no_child" style="text-align:center;" value="<?php echo $row['ttl_no_child']; ?>" onkeypress="return isNumberKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2" style="border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">10b.<span style="font-size: 10.5px;">&nbsp;No. of children still living including this birth</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="no_child_alive" style="text-align:center;" value="<?php echo $row['no_child_alive']; ?>" onkeypress="return isNumberKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2" style="border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">10c.<span style="font-size: 10.5px;">&nbsp;No. of children born<br>&emsp; alive but are now dead</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="no_child_dead" style="text-align:center;" value="<?php echo $row['no_child_dead']; ?>" onkeypress="return isNumberKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-4" style="border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">11.&nbsp;OCCUPATION</h6>
			  		  	<div class="input-group" style="padding-top: 16px;">
					    	<input type="text" class="form-control form-control-sm" name="mother_occupation" style="text-align:center;" value="<?php echo $row['mother_occupation']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2">
			  		  	<h6 style="padding-top:2px; font-size:14px;">12.<span style="font-size: 10.2px;">&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="mother_age" style="text-align:center;" value="<?php echo $row['mother_age']; ?>" onkeypress="return isNumberKey(event)">
					  	</div>
			  		</div>
			  	</div><!--close row-->
			    <div class="row" style="border-top: 2px solid green;">
			  		<div class="col-1">
			  		  	<h6 style="padding-top:2px; font-size:14px;">13.&nbsp;RESIDENCE</h6>
			  		</div>
			  		<div class="col-4" style="padding-left: 3em;">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(House No.,St.,Barangay)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="mother_brgy" value="<?php echo $row['mother_brgy']; ?>">
					  	</div>
			  		</div>
			  		<div class="col-3">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(City/Municipality)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="mother_city" value="<?php echo $row['mother_municipal']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(Province)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="mother_province" value="<?php echo $row['mother_province']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(Country)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="mother_country" value="<?php echo $row['mother_country']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  	</div><!--close row-->

		  	</div><!--close row-->
		</div><!--close col-->
 		<!-- Father Info -->
		<div class="row">
			<div class="father" style="border: 2px solid green;border-top:none;padding: 1em 3px 0 3px;width: 30px;" align="center">
  				<h4>F<br>A<br>T<br>H<br>E<br>R</h4>
  			</div>
  			<div class="col" style="border: 2px solid green; border-left: none; border-top: none;">
	  			<div class="row">
	  				<div class="col-1">
	  		  			<h6><span style="font-size: 14px;">14.&nbsp;NAME</span></h6>
	  				</div>
	  				<div class="col-4">
	  		  			<h6 align="center"><span style="color:green;font-size:12px;">(First)</span></h6>
	  		  			<div class="input-group">
				    		<input type="text" class="form-control form-control-sm" id="father_fname" name="father_fname" style="text-align:center;" value="<?php echo $row['father_fname']; ?>" onkeypress="return isTextKey(event)">
			  			</div>
	  				</div>
			  		<div class="col-4">
			  		  	<h6 align="center"><span style="color:green;font-size:12px;">(Middle)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="father_mname" name="father_mname" style="text-align:center;" value="<?php echo $row['father_mname']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3">
			  		  	<h6 align="center"><span style="color:green;font-size:12px;">(Last)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" id="father_lname" name="father_lname" style="text-align:center;" value="<?php echo $row['father_lname']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
	  			</div><!--close row-->
  				<div class="row" style="border-top: 2px solid green;">
	  				<div class="col-3" style="border-right: 2px solid green;">
	  		  			<h6><span style="font-size: 14px;">15.&nbsp;CITIZENSHIP</span></h6>
	  		  			<div class="input-group" style="padding-top: 15px;">
					    	<input type="text" class="form-control form-control-sm" name="father_citizen" value="<?php echo $row['father_citizen']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
	  				</div>
	  				<div class="col-4" style="border-right: 2px solid green;">
	  		  			<h6 style="font-size: 14px;">16.&nbsp;RELIGION/RELIGIOUS SECT</h6>
	  					<div class="input-group" style="padding-top: 18px;">
					    	<input type="text" class="form-control form-control-sm" name="father_sect" value="<?php echo $row['father_religion']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-3" style="border-right: 2px solid green;">
			  		  	<h6 style="padding-top:2px; font-size:14px;">17.&nbsp;OCCUPATION</h6>
			  		  	<div class="input-group" style="padding-top: 16px;">
					    	<input type="text" class="form-control form-control-sm" name="father_occupation" value="<?php echo $row['father_occupation']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2">
			  		  	<h6 style="padding-top:2px; font-size:14px;">18.<span style="font-size: 10.2px;">&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="father_age" style="text-align:center;" value="<?php echo $row['father_age']; ?>" onkeypress="return isNumberKey(event)">
					  	</div>
			  		</div>
	    		</div><!--close row-->
			    <div class="row" style="border-top: 2px solid green;">
			  		<div class="col-1">
			  		  	<h6 style="padding-top:2px; font-size:14px;">19.&nbsp;RESIDENCE</h6>
			  		</div>
			  		<div class="col-4" style="padding-left: 3em;">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(House No.,St.,Barangay)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="father_brgy" value="<?php echo $row['father_brgy']; ?>">
					  	</div>
			  		</div>
			  		<div class="col-3">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(City/Municipality)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="father_city" value="<?php echo $row['father_municipal']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(Province)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="father_province" value="<?php echo $row['father_province']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  		<div class="col-2">
			  		  	<h6><span style="color:green;font-size:12px;margin:0;">(Country)</span></h6>
			  		  	<div class="input-group">
					    	<input type="text" class="form-control form-control-sm" name="father_country" value="<?php echo $row['father_country']; ?>" onkeypress="return isTextKey(event)">
					  	</div>
			  		</div>
			  	</div><!--close row-->

		  	</div><!--close row-->
		</div><!--close col-->
		<!-- Marraige Info -->
		<div class="row" style="border: 2px solid green;border-top:none;">
  			<div class="col">
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding:0;">MARRIAGE OF PARENTS <span style="font-size: 12px;">(If not married, accomplish Affidavit of Acknowledgement/Admission of Paternity at the back.)</span></h6>
	  				</div>
	  			</div><!--close row-->
  				<div class="row" style="border-top: 2px solid green;">
	  				<div class="col-1">
	  		  			<h6 style="padding-top:2px; font-size:14px;">20a.&nbsp;DATE</h6>
	  				</div>
			  		<div class="col-3">
			  			<div class="row">
			  				<div class="col-4"><h6 align="center"><span style="color:green;font-size:12px;">(Day)</span></h6></div>
			  				<div class="col-4"><h6 align="center"><span style="color:green;font-size:12px;">(Month)</span></h6></div>
			  				<div class="col-4"><h6 align="center"><span style="color:green;font-size:12px;">(Year)</span></h6></div>
			  			</div>
				    	<input type="text" class="form-control form-control-sm" id="marriage_date" name="marriage_date" style="word-spacing: 2em;" value="<?php echo $row['marriage_date']; ?>">
			  		</div>
	  				<div class="col-1" style="border-left: 2px solid green;">
	  		  			<h6 style="font-size: 14px;">20b.&nbsp;PLACE</h6>
			  		</div>
			  		<div class="col-7">
			  			<div class="row">
			  				<div class="col-4">
					  		  	<h6><span style="color:green;font-size:12px;margin:0;">&emsp;(City/Municipality)</span></h6>
					  		</div>
					  		<div class="col-4">
					  		  	<h6><span style="color:green;font-size:12px;margin:0;">&emsp;(Province)</span></h6>
					  		</div>
					  		<div class="col-4">
					  		  	<h6><span style="color:green;font-size:12px;margin:0;">(Country)</span></h6>
					  		</div>
			  			</div>
			  			<div class="input-group">
							<input type="text" class="form-control form-control-sm" name="marriage_place" value="<?php echo $row['marriage_place']; ?>" style="text-align:center; word-spacing:5px;" onkeypress="return isTextKey(event)">
						</div>
			  		</div>
	    		</div><!--close row-->
			    <div class="row" style="border-top: 2px solid green;">
			  		<div class="col">
			  		  	<h6 style="padding-top:2px; font-size:14px;">21a.&nbsp;ATTENDANT</h6>
			  		  	<div class="row">
			  				<div class="col">
			  					<?php
			  						$attendant = $row['attendant_type'];
									if($attendant == 'Physician'){
					  					include 'physician.php';
					  				}else if($attendant == 'Nurse'){
					  					include 'nurse.php';
					  				}else if($attendant == 'Midwife'){
					  					include 'midwife.php';
					  				}else if($attendant == 'Hilot'){					
					  					include 'hilot.php';
					  				}else if(empty($attendant)){					
					  					include 'other.php';
					  				}else{
					  					include 'others.php';
					  				}
								?>
							</div>
			  			</div>	
					</div>
			  	</div><!--close row-->

		  	</div><!--close row-->
		</div><!--close col-->
		<!-- Cerf Attendant -->
		<div class="row" style="border: 2px solid green;border-top:none;">
  			<div class="col">
	  			<div class="row">
	  				<div class="col">
	  		  			<h6 style="padding-top:2px; font-size:14px;">21b. CERTIFICATION OF ATTENDANT AT BIRTH <span style="font-size: 12px;color:green">(Physician, Nurse, Midwife, Traditional Birth Attendant/Hilot, etc. )</span></h6>
	  		  			<h6 style="padding:0; font-size:14px;">&emsp;&emsp;&emsp;I hereby certify that I attended the birth of the child who was born alive at
	  		  			<div class="custom-control custom-checkbox custom-control-inline p-0 mr-0">
							<input type="time" class="form-control form-control-sm text-center" name="birth_time" size="4" value="<?php echo $row['birth_time']; ?>">
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
			    			<input type="text" class="form-control form-control-sm" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Name in Print&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="attendant_name" value="<?php echo $row['attendant_name']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="attendant_position" value="<?php echo $row['attendant_position']; ?>" onkeypress="return isTextKey(event)">
						</div>
	  				</div>
			  		<div class="col-6">
			  		  	<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="attendant_address" value="<?php echo $row['attendant_address']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			    			<input type="text" class="form-control form-control-sm" name="attendant_address2" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" disabled>
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" id="attendant_date" name="attendant_date" value="<?php echo $row['attendant_date']; ?>">
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
			    			<input type="text" class="form-control form-control-sm" name="informant_name" value="<?php echo $row['informant_name']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Relationship to the Child&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="rel_child" value="<?php echo $row['rel_child']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Address&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="informant_address" value="<?php echo $row['informant_address']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" id="informant_date" name="informant_date" value="<?php echo $row['informant_date']; ?>">
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
			    			<input type="text" class="form-control form-control-sm" name="prepared_name" value="<?php echo $row['prepared_name']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" name="prepared_position" value="<?php echo $row['prepared_position']; ?>" onkeypress="return isTextKey(event)">
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
		<div class="row" style="border: 2px solid green;border-top:none;">
  			<div class="col">
  				<div class="row">
	  				<div class="col-6" style="border-right: 2px solid green;">
	  					<h6 style="padding-top:2px; font-size:14px;">24. RECEIVED BY</h6>
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
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="received_name" value="<?php echo $row['received_name']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="received_position" value="<?php echo $row['received_position']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Date&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" id="received_date" name="received_date" value="<?php echo $row['received_date']; ?>">
						</div>
	  				</div>
			  		<div class="col-6">
			  		  	<h6 style="padding-top:2px; font-size:14px;">25. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
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
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="civil_name" value="<?php echo $row['civil_name']; ?>" onkeypress="return isTextKey(event)">
						</div>
						<div class="input-group mt-1">
			  				<div class="input-group-prepend">
			      				<span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;font-size:14px;">Title or Position&nbsp;</span>
			  				</div>
			    			<input type="text" class="form-control form-control-sm" placeholder="" name="civil_position" value="<?php echo $row['civil_position']; ?>" onkeypress="return isTextKey(event)">
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
		<div class="row" style="border: 2px solid green;border-top:none;">
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
	 			
 	</div>
</div>

<!-- Javascript -->
<script src = "../../js/input_tno_only.js"></script>

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
document.getElementById("child_birth_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDate();
    }
});

			function formatDate() {
			const el = document.getElementById("child_birth_date");
			let v = el.value.trim();
			if (!v) return;

			// accept 9-5-2025 or 9/5/2025 or "9 5 2025"
			v = v.replace(/[\/\.\s]+/g, "-").replace(/-+/g, "-");
			const parts = v.split("-");
			if (parts.length !== 3) return invalid(el);

			const d = parseInt(parts[0], 10);
			const m = parseInt(parts[1], 10);
			const y = parseInt(parts[2], 10);

			// strict validation
			const test = new Date(y, m - 1, d);
			if (test.getFullYear() !== y || test.getMonth() !== m - 1 || test.getDate() !== d) {
				return invalid(el);
			}

			const MON = ["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"];
			el.value = `${d} ${MON[m - 1]} ${y}`;   // -> "9 MAY 2025"
			}

			function invalid(el){
			el.value = "Invalid date format";
			el.select();
			}

// function formatDate() {
//     let input = document.getElementById("child_birth_date").value.trim();
    
//     let date;
//     if (input.includes("/")) {
//         let parts = input.split("/");
        
//         if (parts.length === 3) {
//             // Ensure month and day are two digits
		
//             let day = parts[0].padStart(2, '0');
			
//             let month = parts[1].padStart(2, '0');
			
//             let year = parts[2];

//             if (parts[0].length === 4) { 
//                 // YYYY-MM-DD format
//                 date = new Date(day, month - 1, year);
//             } else {
//                 // DD-MM-YYYY format
//                 date = new Date(year, month - 1, day);
//             }
//         }
//     }

//     if (date instanceof Date && !isNaN(date)) {
//         let formattedDay = date.getDate();
//         let formattedMonth = date.toLocaleString('en-US', { month: 'long' });
//         let formattedYear = date.getFullYear();
        
//         document.getElementById("child_birth_date").value = `${formattedDay} ${formattedMonth} ${formattedYear}`;
//     } else {
//         document.getElementById("child_birth_date").value = "Invalid date format";
//     }
// }
</script>


<!--
<script>
document.getElementById("marriage_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDate2();
    }
});

document.getElementById("marriage_date").addEventListener("blur", function() { 
    formatDate2(); // When user tabs out
});

function formatDate2() {
    let input = document.getElementById("marriage_date").value.trim();
    
    let date;
    if (input.includes("/")) {
        let parts = input.split("/");
        if (parts[0].length === 4) { 
            date = new Date(parts[0], parts[1] - 1, parts[2]); // YYYY-MM-DD
        } else {
            date = new Date(parts[2], parts[1] - 1, parts[0]); // MM-DD-YYYY
        }
    }

    if (date instanceof Date && !isNaN(date)) {
        let options = { day: 'numeric', month: 'long', year: 'numeric' };
        document.getElementById("marriage_date").value = date.toLocaleDateString("en-US", options);
    } else {
        document.getElementById("marriage_date").value = "Invalid date format";
    }
}
</script>
-->
<script>
document.getElementById("marriage_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDateM();
    }
});



function formatDateM() {
    let input = document.getElementById("marriage_date").value.trim();
    
    let date;
    if (input.includes("/")) {
        let parts = input.split("/");
        
        if (parts.length === 3) {
            // Ensure month and day are two digits
            let month = parts[0].padStart(2, '0');
            let day = parts[1].padStart(2, '0');
            let year = parts[2];

            if (parts[0].length === 4) { 
                // YYYY-MM-DD format
                date = new Date(day, month - 1, year);
            } else {
                // DD-MM-YYYY format
                date = new Date(year, month - 1, day);
            }
        }
    }

    if (date instanceof Date && !isNaN(date)) {
        let formattedDay = date.getDate();
        let formattedMonth = date.toLocaleString('en-US', { month: 'long' });
        let formattedYear = date.getFullYear();
        
        document.getElementById("marriage_date").value = `${formattedDay} ${formattedMonth} ${formattedYear}`;
    } else {
        document.getElementById("marriage_date").value = "Invalid date format";
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
document.getElementById("attendant_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDateAtt();
    }
});


function formatDateAtt() {
    let input = document.getElementById("attendant_date").value.trim();
    
    let date;
    if (input.includes("/")) {
        let parts = input.split("/");
        
        if (parts.length === 3) {
            // Ensure month and day are two digits
            let month = parts[0].padStart(2, '0');
            let day = parts[1].padStart(2, '0');
            let year = parts[2];

            if (parts[0].length === 4) { 
                // YYYY-MM-DD format
                date = new Date(day, month - 1, year);
            } else {
                // DD-MM-YYYY format
                date = new Date(year, month - 1, day);
            }
        }
    }

    if (date instanceof Date && !isNaN(date)) {
        let formattedDay = date.getDate();
        let formattedMonth = date.toLocaleString('en-US', { month: 'long' });
        let formattedYear = date.getFullYear();
        
        document.getElementById("attendant_date").value = `${formattedMonth} ${formattedDay}  ${formattedYear}`;
    } else {
        document.getElementById("attendant_date").value = "Invalid date format";
    }
}
</script>

<script>
document.getElementById("informant_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDateinf();
    }
});


function formatDateinf() {
    let input = document.getElementById("informant_date").value.trim();
    
    let date;
    if (input.includes("/")) {
        let parts = input.split("/");
        
        if (parts.length === 3) {
            // Ensure month and day are two digits
            let month = parts[0].padStart(2, '0');
            let day = parts[1].padStart(2, '0');
            let year = parts[2];

            if (parts[0].length === 4) { 
                // YYYY-MM-DD format
                date = new Date(day, month - 1, year);
            } else {
                // DD-MM-YYYY format
                date = new Date(year, month - 1, day);
            }
        }
    }

    if (date instanceof Date && !isNaN(date)) {
        let formattedDay = date.getDate();
        let formattedMonth = date.toLocaleString('en-US', { month: 'long' });
        let formattedYear = date.getFullYear();
        
        document.getElementById("informant_date").value = `${formattedMonth} ${formattedDay}  ${formattedYear}`;
    } else {
        document.getElementById("informant_date").value = "Invalid date format";
    }
}
</script>

<script>
document.getElementById("prepared_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDateprep();
    }
});


function formatDateprep() {
    let input = document.getElementById("prepared_date").value.trim();
    
    let date;
    if (input.includes("/")) {
        let parts = input.split("/");
        
        if (parts.length === 3) {
            // Ensure month and day are two digits
            let month = parts[0].padStart(2, '0');
            let day = parts[1].padStart(2, '0');
            let year = parts[2];

            if (parts[0].length === 4) { 
                // YYYY-MM-DD format
                date = new Date(day, month - 1, year);
            } else {
                // DD-MM-YYYY format
                date = new Date(year, month - 1, day);
            }
        }
    }

    if (date instanceof Date && !isNaN(date)) {
        let formattedDay = date.getDate();
        let formattedMonth = date.toLocaleString('en-US', { month: 'long' });
        let formattedYear = date.getFullYear();
        
        document.getElementById("prepared_date").value = `${formattedMonth} ${formattedDay}  ${formattedYear}`;
    } else {
        document.getElementById("prepared_date").value = "Invalid date format";
    }
}
</script>


<script>
document.getElementById("received_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDaterec();
    }
});


function formatDaterec() {
    let input = document.getElementById("received_date").value.trim();
    
    let date;
    if (input.includes("/")) {
        let parts = input.split("/");
        
        if (parts.length === 3) {
            // Ensure month and day are two digits
            let month = parts[0].padStart(2, '0');
            let day = parts[1].padStart(2, '0');
            let year = parts[2];

            if (parts[0].length === 4) { 
                // YYYY-MM-DD format
                date = new Date(day, month - 1, year);
            } else {
                // DD-MM-YYYY format
                date = new Date(year, month - 1, day);
            }
        }
    }

    if (date instanceof Date && !isNaN(date)) {
        let formattedDay = date.getDate();
        let formattedMonth = date.toLocaleString('en-US', { month: 'long' });
        let formattedYear = date.getFullYear();
        
        document.getElementById("received_date").value = `${formattedMonth} ${formattedDay}  ${formattedYear}`;
    } else {
        document.getElementById("received_date").value = "Invalid date format";
    }
}
</script>

<script>
document.getElementById("civil_date").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
        formatDateciv();
    }
});


function formatDateciv() {
    let input = document.getElementById("civil_date").value.trim();
    
    let date;
    if (input.includes("/")) {
        let parts = input.split("/");
        
        if (parts.length === 3) {
            // Ensure month and day are two digits
            let month = parts[0].padStart(2, '0');
            let day = parts[1].padStart(2, '0');
            let year = parts[2];

            if (parts[0].length === 4) { 
                // YYYY-MM-DD format
                date = new Date(day, month - 1, year);
            } else {
                // DD-MM-YYYY format
                date = new Date(year, month - 1, day);
            }
        }
    }

    if (date instanceof Date && !isNaN(date)) {
        let formattedDay = date.getDate();
        let formattedMonth = date.toLocaleString('en-US', { month: 'long' });
        let formattedYear = date.getFullYear();
        
        document.getElementById("civil_date").value = `${formattedMonth} ${formattedDay}  ${formattedYear}`;
    } else {
        document.getElementById("civil_date").value = "Invalid date format";
    }
}
</script>

<script>
	document.getElementById("father_fname").addEventListener("keydown", function(event) {
    if (event.key === "Enter") { // When Enter is pressed
		var tatangfname = document.getElementById("father_fname").value;
		if ((tatangfname == "UNKNOWN") || (tatangfname == "unknown")) {
        document.getElementById("father_citizen").value = "Not Applicable";
		document.getElementById("father_sect").value = "Not Applicable";
		document.getElementById("father_occupation").value = "Not Applicable";
		document.getElementById("father_brgy").value = "Not Applicable";
		document.getElementById("father_city").value = "Not Applicable";
		document.getElementById("father_province").value = "Not Applicable";
		document.getElementById("marriage_place").value = "Not Applicable";
		document.getElementById("marriage_date").value = "Not Applicable";
		document.getElementById("father_country").value = "Not Applicable";
		document.getElementById("father_age").value = "N/A";
		document.getElementById("father_lname").value = "";
		}
    }
});
</script>