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
        margin-bottom: 0 !important; /* Forces labels to sit tight against inputs */
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
    .ctf-birth .row {
        margin-bottom: 0 !important;
    }
    .input-group {
        margin-top: 2px !important;
    }
</style>

<div class="ctf-birth pt-3" style="width:960px;margin: auto;">
    <div class="form" style="padding:0 15px 0 15px;">
        <div class="row">
            <div class="col-9" style="border: 2px solid green;">
                <p class="m1" style="margin-bottom: 0;">Municipal Form No. 102</p>
                <p class="m1" style="margin-bottom: 0;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<span align="center" class="m2" style="font-size: 15px;">Republic of the Philippines</span></p>
                <p align="center" class="m2" style="font-size: 16px; margin-bottom: 0;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
                <p align="center" class="m2" style="font-size: 30px; font-weight: bold; margin-bottom: 0;">CERTIFICATE OF LIVE BIRTH</p>
            </div>
            <div class="col-3" id="book" style="border: 2px solid green; border-left:none; border-bottom:none;">
                <div class="form-group mb-0">
                    <label id="ltxt" style="margin-bottom: 0;">Book No.</label>
                    <input type="text" class="bookNo form-control form-control-sm" id="bookno" name="book_no" value="<?php echo $row['book_no']; ?>">
                    <label id="ltxt" style="margin-bottom: 0; margin-top: 5px;">Page No.</label>
                    <input type="text" class="pageNo form-control form-control-sm" id="pageno" name="page_no" value="<?php echo $row['page_no']; ?>">

                    <input type="hidden" name="time" id="hrs" value="">
                    <input type="hidden" name="date" id="date" value="">
                    <input type="hidden" name="emp_name" id="emp_name" value="<?php echo $_SESSION['lastname']; ?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-9 pl-0" style="border: 2px solid green; border-top: none;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white p-0" style="border:none; color:black;">&nbsp;Province&nbsp;&emsp;&emsp;&emsp;&emsp;</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" name="provinces" value="<?php echo $row['province']; ?>" onkeypress="return isTextKey(event)">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white p-0" style="border:none; color:black;">&nbsp;City/Municipality&nbsp;&nbsp;</span>
                    </div>
                    <input type="text" class="form-control form-control-sm" name="municipal" value="<?php echo $row['municipal']; ?>" onkeypress="return isTextKey(event)">
                </div>
            </div>
            <div class="col-3" id="book" style="border: 2px solid green;border-left:none; border-top: none;">
                <div class="form-group mb-0">
                    <label id="ltxt" style="margin-bottom: 0;">Registry No.</label>
                    <input type="text" class="regNo form-control form-control-sm" name="registry_no" id="regno" value="<?php echo $row['registry_no']; ?>">
                    <div id="error"></div>
                </div>
            </div>
        </div>

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
                </div>
                <div class="row" style="border-top: 2px solid green;">
                    <div class="col-3" style="border-right: 2px solid green;">
                        <h6 class="m-0" style="padding-top:2px; font-size:14px;">2.&nbsp;SEX<br><span style="color:green;font-size:10px;">(Male/Female)</span></h6>
                        <div class="input-group input-group-sm mt-1">
                            <select name="child_sex" id="child_sex" class="form-control">
                                <option style="display: none;"><?php echo $row['child_sex']; ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <h6 class="m-0" style="padding-top:2px; font-size:14px;">3.&nbsp;DATE OF<br>&emsp;BIRTH</h6>
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Day)</span></h6></div>
                            <div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Month)</span></h6></div>
                            <div class="col-4"><h6 align="center" class="m-0"><span style="color:green;font-size:12px;">(Year)</span></h6></div>
                        </div>
                        <div class="form-control form-control-sm p-0 d-flex justify-content-between align-items-center" style="background-color: #e9ecef; overflow: hidden;">
                            <input type="text" id="bd_day" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
                            <input type="text" id="bd_month" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;" >
                            <input type="text" id="bd_year" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
                        </div>
                        <input type="hidden" id="child_birth_date" name="child_birth_date" value="<?php echo trim($row['child_birth_date']); ?>">
                    </div>
                </div>
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
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="birth_city" name="birth_city" value="<?php echo $row['birth_municipal']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-3">
                        <h6><span style="color:green;font-size:12px;margin:0;">(Province)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="birth_province" name="birth_province" value="<?php echo $row['birth_province']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                </div>
                <div class="row" style="border-top: 2px solid green;">
                    <div class="col-3" style="border-right: 2px solid green;">
                        <h6 style="padding-top:2px; font-size:14px;">5a. TYPE OF BIRTH<br>&emsp;&nbsp;&nbsp;<span style="color:green;font-size:12px">(Single, Twin, Triplet, etc.)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="birth_type" style="text-align:center;" value="<?php echo $row['birth_type']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-3" style="border-right: 2px solid green;">
                        <h6 style="padding-top:2px; font-size:12px;">5b. IF MULTIPLE BIRTH, CHILD WAS<br>&emsp;&nbsp;&nbsp;<span style="color:green;font-size:12px">(First, Second, Third, etc.)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="multi_birth_was" style="text-align:center;" value="<?php echo $row['if_multi_birth_was']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-3" style="border-right: 2px solid green;">
                        <h6 style="padding-top:2px; font-size:13px;">5c.&nbsp;BIRTH ORDER<span style="color:green;font-size:9px">(Order of this birth to <br>&emsp;&nbsp;&nbsp;&nbsp;previous live births including fetal death)</span><br>&emsp;&nbsp;&nbsp;<span style="color:green;font-size:12px">(First, Second, Third, etc.)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="birth_order" style="text-align:center;" value="<?php echo $row['birth_order']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-3">
                        <h6 style="padding-top:2px; font-size:14px;">6.&nbsp;WEIGHT OF BIRTH</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="" name="birth_weight" style="text-align:center;" value="<?php echo $row['birth_weight']; ?>" onkeypress="return isNumberKey(event)">
                            <span style="font-size:14px;">&nbsp;grams</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                </div>
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
                </div>
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
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="mother_occupation" style="text-align:center;" value="<?php echo $row['mother_occupation']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-2">
                        <h6 style="padding-top:2px; font-size:14px;">12.<span style="font-size: 10.2px;">&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" name="mother_age" style="text-align:center;" value="<?php echo $row['mother_age']; ?>" onkeypress="return isNumberKey(event)">
                        </div>
                    </div>
                </div>
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
                </div>
            </div>
        </div>

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
                </div>
                <div class="row" style="border-top: 2px solid green;">
                    <div class="col-3" style="border-right: 2px solid green;">
                        <h6><span style="font-size: 14px;">15.&nbsp;CITIZENSHIP</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_citizen" name="father_citizen" value="<?php echo $row['father_citizen']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-4" style="border-right: 2px solid green;">
                        <h6 style="font-size: 14px;">16.&nbsp;RELIGION/RELIGIOUS SECT</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_sect" name="father_sect" value="<?php echo $row['father_religion']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-3" style="border-right: 2px solid green;">
                        <h6 style="padding-top:2px; font-size:14px;">17.&nbsp;OCCUPATION</h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_occupation" name="father_occupation" value="<?php echo $row['father_occupation']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-2">
                        <h6 style="padding-top:2px; font-size:14px;">18.<span style="font-size: 10.2px;">&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_age" name="father_age" style="text-align:center;" value="<?php echo $row['father_age']; ?>" onkeypress="return isNumberKey(event)">
                        </div>
                    </div>
                </div>
                <div class="row" style="border-top: 2px solid green;">
                    <div class="col-1">
                        <h6 style="padding-top:2px; font-size:14px;">19.&nbsp;RESIDENCE</h6>
                    </div>
                    <div class="col-4" style="padding-left: 3em;">
                        <h6><span style="color:green;font-size:12px;margin:0;">(House No.,St.,Barangay)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_brgy" name="father_brgy" value="<?php echo $row['father_brgy']; ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <h6><span style="color:green;font-size:12px;margin:0;">(City/Municipality)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_city" name="father_city" value="<?php echo $row['father_municipal']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-2">
                        <h6><span style="color:green;font-size:12px;margin:0;">(Province)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_province" name="father_province" value="<?php echo $row['father_province']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                    <div class="col-2">
                        <h6><span style="color:green;font-size:12px;margin:0;">(Country)</span></h6>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" id="father_country" name="father_country" value="<?php echo $row['father_country']; ?>" onkeypress="return isTextKey(event)">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="border: 2px solid green;border-top:none;">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h6 style="padding:0;">MARRIAGE OF PARENTS <span style="font-size: 12px;">(If not married, accomplish Affidavit of Acknowledgement/Admission of Paternity at the back.)</span></h6>
                    </div>
                </div>
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
                        <input type="hidden" id="marriage_place" name="marriage_place" value="<?php echo $row['marriage_place']; ?>">
                    </div>
                </div>
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
                </div>
            </div>
        </div>
        
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
                </div>
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
                </div>
            </div>
        </div>

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
                </div>
            </div>
        </div>

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
                </div>
            </div>
        </div>

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
                </div>
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
            </div>
        </div>

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
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $("#birth_type").on('input change', function(){
            var birthType = $(this).val().toUpperCase();
            if(birthType === "SINGLE"){
                $("input[name='multi_birth_was']").val("NOT APPLICABLE");
            } else {
                if($("input[name='multi_birth_was']").val() === "NOT APPLICABLE"){
                    $("input[name='multi_birth_was']").val("");
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#mp_day, #mp_month, #mp_year').on('input', function() {
            let d = $('#mp_day').val().trim();
            let m = $('#mp_month').val().trim();
            let y = $('#mp_year').val().trim();
            
            $('#marriage_place').val(`${d} ${m} ${y}`.trim());
            
            if (typeof saveToMemory === "function") {
                saveToMemory();
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#physician').change(function(){ if($(this).is(':checked')){ $('input[name="attendant_position"]').val('PHYSICIAN'); } });
        $('#nurse').change(function(){ if($(this).is(':checked')){ $('input[name="attendant_position"]').val('NURSE'); } });
        $('#midwife').change(function(){ if($(this).is(':checked')){ $('input[name="attendant_position"]').val('MIDWIFE'); } });
        $('#hilot').change(function(){ if($(this).is(':checked')){ $('input[name="attendant_position"]').val('HILOT'); } });
    });
</script>

<script>
    $(document).ready(function(){
        var inputBox = document.getElementById('child_mname');
        var inputBox2 = document.getElementById('child_lname');

        if(inputBox) {
            inputBox.onkeyup = function(){
                document.getElementById('mother_lname').value = inputBox.value;
            }
        }

        if(inputBox2) {
            inputBox2.onkeyup = function(){
                document.getElementById('father_lname').value = inputBox2.value;
            }
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

<script> // Father & Marriage "Not Applicable" Sync
$(document).ready(function() {
    const fatherFname = $('#father_fname');
    
    const fieldsToHandle = [
        'father_mname', 'father_lname', 'father_citizen', 
        'father_sect', 'father_occupation', 'father_age', 
        'father_brgy', 'father_city', 'father_province', 
        'father_country', 'marriage_date', 
        'marriage_place', 'mp_day', 'mp_month', 'mp_year' 
    ];

    function handleFatherLogic() {
        if(!fatherFname.length) return;
        const val = fatherFname.val().trim().toUpperCase();
        const isEmpty = val === "";
        const isNA = (val === "NOT APPLICABLE" || val === "UNKNOWN");

        fieldsToHandle.forEach(id => {
            const el = $('#' + id);
            if(!el.length) return;
            el.prop('disabled', isEmpty || isNA);
            
            if (isEmpty || isNA) {
                el.css('background-color', '#e9ecef'); 
                if (el.parent().hasClass('form-control')) {
                    el.parent().css('background-color', '#e9ecef');
                }
            } else {
                el.css('background-color', ''); 
                if (el.parent().hasClass('form-control')) {
                    el.parent().css('background-color', 'white');
                }
            }
        });

        if (isNA) {
            $('#father_citizen').val("NOT APPLICABLE");
            $('#father_sect').val("NOT APPLICABLE");
            $('#father_occupation').val("NOT APPLICABLE");
            $('#father_brgy').val("NOT APPLICABLE");
            $('#father_city').val("NOT APPLICABLE");
            $('#father_province').val("NOT APPLICABLE");
            $('#father_country').val("NOT APPLICABLE");
            $('#father_age').val("N/A");
            
            $('#marriage_date').val("NOT APPLICABLE");
            $('#mp_month').val("NOT APPLICABLE");
            $('#mp_day, #mp_year').val("");
            $('#marriage_place').val("NOT APPLICABLE");
            
            $('#father_lname').val("");
            $('#father_mname').val("");
        }
    }

    fatherFname.on('input keydown blur', function(e) {
        handleFatherLogic();
        if (typeof saveToMemory === "function") saveToMemory();
    });

    handleFatherLogic();
});
</script>

<script>
$(document).ready(function() {
    const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                 "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

    let initialVal = $('#child_birth_date').val();
    if (initialVal && initialVal.trim() !== '' && !initialVal.includes('<')) {
        let parts = initialVal.trim().split(/[\s\/\.-]+/); 
        if (parts.length >= 3) {
            $('#bd_day').val(parts[0]);
            $('#bd_month').val(parts[1]);
            $('#bd_year').val(parts[2]);
        }
    }

    $('#bd_day, #bd_month, #bd_year').on('blur', function() {
        let mVal = $('#bd_month').val().trim();
        if (!isNaN(mVal) && mVal !== "") {
            let idx = parseInt(mVal, 10);
            if (idx >= 1 && idx <= 12) $('#bd_month').val(MON[idx - 1]);
        } else if (mVal !== "") {
            $('#bd_month').val(mVal.toUpperCase()); 
        }

        let yVal = $('#bd_year').val().trim();
        if (yVal !== "" && !isNaN(yVal) && yVal.length > 0 && yVal.length < 4) {
            let yInt = parseInt(yVal, 10);
            if (yInt < 100) {
                let currentYear = new Date().getFullYear();
                let currentTwoDigit = currentYear % 100;
                $('#bd_year').val(yInt > currentTwoDigit + 5 ? 1900 + yInt : 2000 + yInt);
            }
        }

        let finalD = $('#bd_day').val().trim();
        let finalM = $('#bd_month').val().trim();
        let finalY = $('#bd_year').val().trim();
        $('#child_birth_date').val(`${finalD} ${finalM} ${finalY}`);
        
        if (typeof saveToMemory === "function") saveToMemory();
    });
});
</script>

<script>
function saveToMemory() {
    let mDate = $('#marriage_date').val() ? $('#marriage_date').val().trim().toUpperCase() : "";
    let mPlace = $('#marriage_place').val() ? $('#marriage_place').val().trim() : "";

    if (mDate === "NOT MARRIED" || mDate === "NOT APPLICABLE" || mDate === "N/A") {
        mPlace = "NOT APPLICABLE";
        $('#marriage_place').val(mPlace);
    }

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
        birth_day: $('#child_birth_date').val(),
        birth_place: ($('#birth_city').val() + " " + $('#birth_province').val()).trim(),
        marriage_date: mDate,
        marriage_place: mPlace,
        civil_name: $('input[name="civil_name"]').val(),
        civil_position: $('input[name="civil_position"]').val(),
        informant_name: $('input[name="informant_name"]').val(),
        informant_address: $('input[name="informant_address"]').val(),
        rel_child: $('input[name="rel_child"]').val(),
        attendant_name: $('input[name="attendant_name"]').val(),
        attendant_position: $('input[name="attendant_position"]').val() ? $('input[name="attendant_position"]').val().toUpperCase() : "",
        attendant_address: (($('input[name="attendant_address"]').val() || "") + " " + ($('input[name="attendant_address2"]').val() || "")).trim().toUpperCase()
    };

    const rawOldData = localStorage.getItem('birth_form_data');
    const oldData = rawOldData ? JSON.parse(rawOldData) : {};

    if (JSON.stringify(newData) !== JSON.stringify(oldData)) {
        localStorage.setItem('birth_form_data', JSON.stringify(newData));
    }
}
$('input, select').on('blur change', saveToMemory);
</script>

<script> 
$(document).ready(function() {
    function toggleMarriagePlace() {
        let mDate = $('#marriage_date').val();
        if(!mDate) return;
        mDate = mDate.trim().toUpperCase();
        
        let mpInputs = $('#mp_day, #mp_month, #mp_year');
        let mPlaceHidden = $('#marriage_place');

        if (mDate === "NOT MARRIED" || mDate === "NOT APPLICABLE" || mDate === "N/A") {
            $('#mp_month').val("NOT APPLICABLE");
            mPlaceHidden.val("NOT APPLICABLE");
            mpInputs.prop('disabled', true);
            mpInputs.parent().css('background-color', '#e9ecef'); 
        } else {
            mpInputs.prop('disabled', false);
            mpInputs.parent().css('background-color', 'white');
            if ($('#mp_month').val() === "NOT APPLICABLE") {
                mpInputs.val("");
                mPlaceHidden.val("");
            }
        }
    }

    $('#marriage_date').on('input blur', function() {
        toggleMarriagePlace();
        if (typeof saveToMemory === "function") saveToMemory();
    });

    toggleMarriagePlace();
});
</script>