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
            margin-bottom: 0 !important;
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
        .remark-item {
            padding: 6px 12px;
            cursor: pointer;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center; 
            background: white;
        }

        .remark-item:hover {
            background-color: #9ebee3; 
        }

        .remark-item .remark-text {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px !important;
            text-transform: uppercase;
            color: #000000;
            flex-grow: 1; 
            margin-right: 15px;
            pointer-events: auto;
        }

        .delete-remark {
            color: #dc3545;
            font-weight: bold;
            padding: 2px 8px;
            border: 1px solid #dc3545;
            border-radius: 3px;
            cursor: pointer;
            font-size: 9px !important;
            text-transform: uppercase;
            flex-shrink: 0; 
            display: inline-block;
            transition: all 0.2s;
        }

        .delete-remark:hover {
            background-color: #bd2130;
            color: white;
        }

        /* Forces all input boxes in these rows to align perfectly at the bottom */
        .align-bottom-inputs > [class*="col-"] {
            display: flex;
            flex-direction: column;
        }
        .align-bottom-inputs > [class*="col-"] > .input-group {
            margin-top: auto !important;
            margin-bottom: 2px !important;
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

    <datalist id="birth_type_list">
        <option value="SINGLE">SINGLE</option>
        <option value="TWIN">TWIN</option>
        <option value="TRIPLET">TRIPLET</option>
        <option value="QUADRUPLET">QUADRUPLET</option>
        <option value="QUINTUPLET">QUINTUPLET</option>
    </datalist>

    <datalist id="multi_birth_list">
        <option value="NOT APPLICABLE">NOT APPLICABLE</option>
        <option value="FIRST">FIRST</option>
        <option value="SECOND">SECOND</option>
        <option value="THIRD">THIRD</option>
        <option value="FOURTH">FOURTH</option>
        <option value="FIFTH">FIFTH</option>
    </datalist>

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

    <datalist id="attendant_position_list">
        <option value="PHYSICIAN">PHYSICIAN</option>
        <option value="NURSE">NURSE</option>
        <option value="MIDWIFE">MIDWIFE</option>
        <option value="HILOT">HILOT</option>
        <option value="TRADITIONAL BIRTH ATTENDANT">TRADITIONAL BIRTH ATTENDANT</option>
    </datalist>

    <div class="ctf-birth pt-3" style="width:960px; margin:auto;">
        <div class="form" style="padding:0 15px 0 15px;">
            <div class="row">
                <div class="col-9" style="border:2px solid green; padding: 10px;">
                    <p class="m1" style="margin-bottom: 0;">Municipal Form No. 102</p>
                    <p align="center" class="header-republic" style="margin-bottom: 0;">Republic of the Philippines</p>
                    <p align="center" class="header-subtitle" style="margin-bottom: 5px;">OFFICE OF THE CIVIL REGISTRAR GENERAL</p>
                    <p align="center" class="header-title" style="margin-bottom: 0;">CERTIFICATE OF LIVE BIRTH</p>
                </div>
                <div class="col-3" id="book" style="border:2px solid green; border-left:none; border-bottom:none;">
                    <div class="form-group mb-0">
                        <label id="ltxt" style="margin-bottom:0;">Book No.</label>
                        <input type="text" class="bookNo form-control form-control-sm" id="bookno" onkeypress="return isNumberKey(event)" name="book_no" style="background-color: #7FFFD4;" value="">
                        <input type="hidden" class="form-control form-control-sm" id="bookno1" name="book_no1">

                        <label id="ltxt" style="margin-bottom:0;">Page No.</label>
                        <input type="text" class="pageNo form-control form-control-sm" name="page_no" id="pageno" onkeypress="return isNumberKey(event)" style="background-color: #7FFFD4;" value="">
                        <input type="hidden" class="form-control form-control-sm" name="page_no1" id="pageno1">

                            <?php date_default_timezone_set('Asia/Manila'); ?>
                        <input type="hidden" name="time" id="hrs" value="<?php echo date('H:i:s'); ?>">
                        <input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d'); ?>">
                        <input type="hidden" name="emp_name" id="emp_name" value="<?php echo $_SESSION['lastname'] ?? ''; ?>">
                    </div>
                </div>
            </div>
            
            <div class="row">
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
                        <input type="text" list='municipality_list' class="form-control form-control-sm" id="municipal" value="GERONA" name="municipals" onkeypress="return isTextKey(event)" required>
                    </div>
                </div>
                <div class="col-3" id="book" style="border:2px solid green; border-left:none; border-top:none;">
                    <div class="form-group mb-0">
                        <label id="ltxt" style="margin-bottom:0;">Registry No.</label>
                        <input type="text" class="regNo form-control form-control-sm" name="registry_no" id="regno" style="background-color: #7FFFD4;" value="" required> 
                        <div id="error"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="child text-center" style="border:2px solid green; border-top:none; padding:5em 3px 0 3px; width:30px;">
                    <h4>C<br>H<br>I<br>L<br>D</h4>
                </div>
                <div class="col" style="border:2px solid green; border-left:none; border-top:none;">
                    <div class="row align-bottom-inputs">
                        <div class="col-1">
                            <h6 style="padding-top:2px;">1.&nbsp;NAME</h6>
                        </div>
                        <div class="col-4">
                            <h6 align="center"><span style="color:green;">(First)</span></h6>
                            <div class="input-group">
                                <input type="text" tabindex="1" class="form-control form-control-sm text-center" id="child_fname" name="child_fname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <h6 align="center"><span style="color:green;">(Middle)</span></h6>
                            <div class="input-group">
                                <input type="text" tabindex="2" class="form-control form-control-sm text-center" id="child_mname" name="child_mname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <h6 align="center"><span style="color:green;">(Last)</span></h6>
                            <div class="input-group">
                                <input type="text" tabindex ="3"class="form-control form-control-sm text-center" id="child_lname" name="child_lname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border-top:2px solid green;">
                        <div class="col-3" style="border-right:2px solid green;">
                            <h6 style="padding-top:2px;">2.&nbsp;SEX<br><span style="color:green;font-size:10px;">(Male/Female)</span></h6>
                            <div class="input-group input-group-sm mt-1">
                                <select id="child_sex" name="sex" class="form-control" tabindex="4">
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
                            <input type="hidden" id="child_birth_date" name="birth_day" value="">
                        </div>
                    </div>
                    <div class="row align-bottom-inputs" style="border-top:2px solid green;">
                        <div class="col-2">
                            <h6 style="padding-top:2px;">4.&nbsp;PLACE OF <br>&emsp;BIRTH</h6>
                        </div>
                        <div class="col-4">
                            <h6><span class="m-0" style="color:green;">(Name of Hospital/Clinic/Institution/<br>House No.,St.,Barangay)</span></h6>
                            <div class="input-group">
                                <input type="text" tabindex="6" class="form-control form-control-sm" id="birth_brgy" name="birth_brgy" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <h6><span class="m-0" style="color:green;">(City/Municipality)</span></h6>
                            <div class="input-group">
                                <input tabindex="7" id="birth_city" type="text" list='municipality_list' class="form-control" name="birth_city" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <h6><span class="m-0" style="color:green;">(Province)</span></h6>
                            <div class="input-group">
                                <input tabindex="8" id="birth_province" type="text" list='province_list' class="form-control" name="birth_province" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                    </div>
                    <div class="row align-bottom-inputs">
                        <div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
                            <h6 style="padding-top:2px;">5a.&nbsp;TYPE OF BIRTH<br>&emsp;&nbsp;&nbsp;<span style="color:green">(Single, Twin, Triplet, etc.)</span></h6>
                            <div class="input-group">
                                <input tabindex="9" type="text" list="birth_type_list" class="form-control form-control-sm text-center" placeholder="" id="birth_type" name="birth_type" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
                            <h6 style="padding-top:2px;">5b.&nbsp;IF MULTIPLE BIRTH, CHILD WAS<br>&emsp;&nbsp;&nbsp;<span style="color:green;">(First, Second, Third, etc.)</span></h6>
                            <div class="input-group">
                                <input tabindex="10" type="text" list="multi_birth_list" class="form-control form-control-sm text-center" placeholder="" id="multi_birth_was" name="multi_birth_was" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-3" style="border-top:2px solid green; border-right:2px solid green;">
                            <h6 style="padding-top:2px;">5c.&nbsp;BIRTH ORDER<span style="color:green;">(Order of this birth to <br>&emsp;&nbsp;&nbsp;&nbsp;previous live births including fetal death)</span><br>&emsp;&nbsp;&nbsp;<span style="color:green;">(First, Second, Third, etc.)</span></h6>
                            <div class="input-group">
                                <input tabindex="11" type="text" list="birth_order_list" class="form-control form-control-sm text-center" placeholder="" id="birth_order" name="birth_order" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-3" style="border-top:2px solid green;">
                            <h6 style="padding-top:2px;">6.&nbsp;WEIGHT OF BIRTH</h6>
                            <div class="input-group">
                                <input tabindex="12" type="text" class="form-control form-control-sm text-center" placeholder="" name="birth_weight" onkeypress="return isNumberKey(event)" value="">
                                <span>&nbsp;grams</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="mother" style="border:2px solid green; border-top:none; padding:4em 3px 0 1px; width: 30px;" align="center">
                    <h4>M<br>O<br>T<br>H<br>E<br>R</h4>
                </div>
                <div class="col" style="border:2px solid green; border-left:none; border-top:none;">
                    <div class="row align-bottom-inputs">
                        <div class="col-1">
                            <h6><span>7.&nbsp;MAIDEN<br>&nbsp;&nbsp;&nbsp;&nbsp;NAME</span></h6>
                        </div>
                        <div class="col-4">
                            <h6 align="center"><span style="color:green;">(First)</span></h6>
                            <div class="input-group">
                                <input tabindex="13" type="text" class="form-control form-control-sm text-center" id="mother_fname" placeholder="" name="mother_fname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-4">
                            <h6 align="center"><span style="color:green;">(Middle)</span></h6>
                            <div class="input-group">
                                <input tabindex="14" type="text" class="form-control form-control-sm text-center" id="mother_mname" placeholder="" name="mother_mname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <h6 align="center"><span style="color:green;">(Last)</span></h6>
                            <div class="input-group">
                                <input tabindex="15" type="text" class="form-control form-control-sm text-center" id="mother_lname" placeholder="" name="mother_lname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row align-bottom-inputs" style="border-top:2px solid green;">
                        <div class="col-6" style="border-right:2px solid green;">
                            <h6 style="padding-top:2px;">8.&nbsp;CITIZENSHIP</h6>
                            <div class="input-group">
                                <input tabindex="16" id="mother_citizen" type="text" list='citizen_list' class="form-control" name="mother_citizen" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <h6>9.&nbsp;RELIGION/RELIGIOUS SECT</h6>
                            <div class="input-group">
                                <input tabindex="17" type="text" list='religious_sect' class="form-control" id="mother_sect" name="mother_sect" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                    </div>
                    <div class="row align-bottom-inputs" style="border-top:2px solid green;">
                        <div class="col-2" style="border-right:2px solid green;">
                            <h6 style="padding-top:2px;">10a.<span>&nbsp;Total number of<br>&emsp;&emsp; children born alive</span></h6>
                            <div class="input-group">
                                <input tabindex="18" type="text" class="form-control form-control-sm text-center" placeholder="" name="ttl_no_child" onkeypress="return isNumberKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-2" style="border-right:2px solid green;">
                            <h6 style="padding-top:2px;">10b.<span>&nbsp;No. of children still living including this birth</span></h6>
                            <div class="input-group">
                                <input tabindex="19" type="text" class="form-control form-control-sm text-center" placeholder="" name="no_child_alive" onkeypress="return isNumberKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-2" style="border-right:2px solid green;">
                            <h6 style="padding-top:2px;">10c.<span>&nbsp;No. of children born<br>&emsp; alive but are now dead</span></h6>
                            <div class="input-group">
                                <input tabindex="20" type="text" class="form-control form-control-sm text-center" placeholder="" name="no_child_dead" onkeypress="return isNumberKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-4" style="border-right:2px solid green;">
                            <h6 style="padding-top:2px;">11.&nbsp;OCCUPATION</h6>
                            <div class="input-group">
                                <input tabindex="21" id="mother_occupation" type="text" list='occupation_list' class="form-control text-center" name="mother_occupation" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <h6 style="padding-top:2px;">12.<span>&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
                            <div class="input-group">
                                <input tabindex="22" type="text" class="form-control form-control-sm text-center" placeholder="" name="mother_age" onkeypress="return isNumberKey(event)" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row align-bottom-inputs" style="border-top:2px solid green;">
                        <div class="col-1">
                            <h6 style="padding-top:2px;">13.&nbsp;RESIDENCE</h6>
                        </div>
                        <div class="col-4" style="padding-left:3em;">
                            <h6><span style="color:green; margin:0;">(House No.,St.,Barangay)</span></h6>
                            <div class="input-group">
                                <input tabindex="23" type="text" class="form-control form-control-sm text-center" placeholder="" name="mother_brgy" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <h6><span style="color:green; margin:0;">(City/Municipality)</span></h6>
                            <div class="input-group">
                                <input tabindex="24" id="mother_city" type="text" list='municipality_list' class="form-control text-center" name="mother_city" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <h6><span style="color:green; margin:0;">(Province)</span></h6>
                            <div class="input-group">
                                <input tabindex="25" id="mother_province" type="text" list='province_list' class="form-control text-center" name="mother_province" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <h6><span style="color:green; margin:0;">(Country)</span></h6>
                            <div class="input-group">
                                <input tabindex="26" id="mother_country" type="text" list='country_list' class="form-control text-center" name="mother_country" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="father text-center" style="border:2px solid green; border-top:none; padding:1em 3px 0 3px; width: 30px;">
                    <h4>F<br>A<br>T<br>H<br>E<br>R</h4>
                </div>
                <div class="col" style="border:2px solid green; border-left:none; border-top:none;">
                    <div class="row align-bottom-inputs">
                        <div class="col-1">
                            <h6><span>14.&nbsp;NAME</span></h6>
                        </div>
                        <div class="col-4">
                            <h6 align="center"><span style="color:green;">(First)</span></h6>
                            <div class="input-group">
                                <input tabindex="27" type="text" class="form-control form-control-sm text-center" id="father_fname" name="father_fname" onkeypress="return isTextKey(event)" value="">
                                    <datalist id="father_options">
                                        <option value="NOT APPLICABLE">
                                        <option value="UNKNOWN">
                                    </datalist>
                            </div>
                        </div>
                        <div class="col-4">
                            <h6 align="center"><span style="color:green;">(Middle)</span></h6>
                            <div class="input-group">
                                <input tabindex="28" type="text" class="form-control form-control-sm text-center" id="father_mname" name="father_mname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <h6 align="center"><span style="color:green;">(Last)</span></h6>
                            <div class="input-group">
                                <input tabindex="29" type="text" class="form-control form-control-sm text-center"  id="father_lname" name="father_lname" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row align-bottom-inputs" style="border-top:2px solid green;">
                        <div class="col-3" style="border-right:2px solid green;">
                            <h6><span>15.&nbsp;CITIZENSHIP</span></h6>
                            <div class="input-group">
                                <input tabindex="30" id="father_citizen" type="text" list='citizen_list' class="form-control text-center" name="father_citizen" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-4" style="border-right:2px solid green;">
                            <h6>16.&nbsp;RELIGION/RELIGIOUS SECT</h6>
                            <div class="input-group">
                                <input tabindex="31" id="father_sect" type="text" list='religious_sect' class="form-control text-center" name="father_sect" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-3" style="border-right:2px solid green;">
                            <h6 style="padding-top:2px;">17.&nbsp;OCCUPATION</h6>
                            <div class="input-group">
                                <input tabindex="32" id="father_occupation" type="text" list='occupation_list' class="form-control text-center" name="father_occupation" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <h6 style="padding-top:2px;">18.<span>&nbsp;AGE at the time of this birth<span style="color:green;">(completed years)</span></span></h6>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm text-center" placeholder="" id="father_age" name="father_age" onkeypress="return isNumberKey(event)" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row align-bottom-inputs" style="border-top:2px solid green;">
                        <div class="col-1">
                            <h6 style="padding-top:2px;">19.&nbsp;RESIDENCE</h6>
                        </div>
                        <div class="col-4" style="padding-left:3em;">
                            <h6><span style="color:green; margin:0;">(House No.,St.,Barangay)</span></h6>
                            <div class="input-group">
                                <input tabindex="33" type="text" class="form-control form-control-sm text-center" placeholder="" name="father_brgy" id="father_brgy" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <h6><span style="color:green; margin:0;">(City/Municipality)</span></h6>
                            <div class="input-group">
                                <input tabindex="34" id="father_city" type="text" list='municipality_list' class="form-control form-control-sm text-center" name="father_city" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <h6><span style="color:green; margin:0;">(Province)</span></h6>
                            <div class="input-group">
                                <input tabindex="35" id="father_province" type="text" list='province_list' class="form-control form-control-sm text-center" name="father_province" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                        <div class="col-2">
                            <h6><span style="color:green; margin:0;">(Country)</span></h6>
                            <div class="input-group">
                                <input tabindex="36" id="father_country" type="text" list='country_list' class="form-control text-center" name="father_country" onkeypress="return isTextKey(event)" required value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="border:2px solid green; border-top:none;">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h6 style="padding:0;">MARRIAGE OF PARENTS <span>(If not married, accomplish Affidavit of Acknowledgement/Admission of Paternity at the back.)</span></h6>
                        </div>
                    </div>
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
                                <input tabindex="37" type="text" class="form-control form-control-sm text-center" id="marriage_date" name="marriage_date" style="word-spacing:2em;" value="">
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
                            
                            <div class="form-control form-control-sm p-0 d-flex justify-content-between align-items-center" style="background-color: white; overflow: hidden;">
                                <input type="text" id="marriage_city" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;" >
                                <input type="text" id="marriage_province" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;" >
                                <input type="text" id="marriage_country" name="marriage_country" class="text-center" style="width: 33.33%; border: none; background: transparent; outline: none;">
                            </div>

                            <input type="hidden" id="marriage_place" name="marriage_place">
                        </div>
                    </div>
                    <div class="row" style="border-top:2px solid green;">
                        <div class="col">
                            <h6 style="padding-top:2px;">21a.&nbsp;ATTENDANT</h6>
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="attendant1" value="">
                                        <input type="checkbox" class="custom-control-input" id="physician" name="attendant1" value="Physician">
                                        <label class="custom-control-label" for="physician">&nbsp;1 Physician</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="attendant2" value="">
                                        <input type="checkbox" class="custom-control-input" id="nurse" name="attendant2" value="Nurse">
                                        <label class="custom-control-label" for="nurse">&nbsp;2 Nurse</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="attendant3" value="">
                                        <input type="checkbox" class="custom-control-input" id="midwife" name="attendant3" value="Midwife">
                                        <label class="custom-control-label" for="midwife">&nbsp;3 Midwife</label>
                                    </div>
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                        <input type="hidden" name="attendant4" value="">
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
                    </div>
                </div>
            </div>

            <div class="row" style="border: 2px solid green; border-top:none;">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h6 style="padding-top:2px;">21b. CERTIFICATION OF ATTENDANT AT BIRTH <span style="color:green">(Physician, Nurse, Midwife, Traditional Birth Attendant/Hilot, etc. )</span></h6>
                            <h6 style="padding:0;">&emsp;&emsp;&emsp;I hereby certify that I attended the birth of the child who was born alive at
                            <div class="custom-control custom-checkbox custom-control-inline p-0 mr-0">
                                <input type="time" class="form-control form-control-sm text-center" id="birth_time" name="birth_time" size="4" >
                            </div>
                            am/pm on the date of birth specified above.   
                            </h6>
                        </div>
                    </div>
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
                                <input type="text" class="form-control form-control-sm" id ="attendant_name" name="attendant_name" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
                                </div>
                                <input type="text" list="attendant_position_list" class="form-control form-control-sm" id="attendant_position" name="attendant_position" onkeypress="return isTextKey(event)" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Address&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="attendant_address1" name="attendant_address1" value="">
                            </div>
                            <div class="input-group mt-1">
                                <input type="text" class="form-control form-control-sm" id="attendant_address2" name="attendant_address2" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
                                </div>
                                <?php date_default_timezone_set('Asia/Manila'); ?>
                                <input type="text" class="form-control form-control-sm" id="attendant_date" name="attendant_date" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                <input type="text" class="form-control form-control-sm" id="informant_name" name="informant_name" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Relationship to the Child&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="rel_child" name="rel_child" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Address&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="informant_address" name="informant_address" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="informant_date" name="informant_date" value="">
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
                                <input type="text" class="form-control form-control-sm" name="prepared_name" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" name="prepared_position" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="prepared_date" name="prepared_date" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                <input type="text" class="form-control form-control-sm"  name="received_name" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm"  name="received_position" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="received_date" name="received_date" value="">
                            </div>
                        </div>
                        <div class="col-6">
                            <h6 style="padding-top:2px;">25. REGISTERED AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Signature&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" placeholder="" style="background-color: white;border-top:none;border-left:none;border-right:none;border-color: green;border-radius: 0;" name="signature" disabled>
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Name in Print&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="civil_name" name="civil_name" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Title or Position&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm"  id="civil_position" name="civil_position" onkeypress="return isTextKey(event)" value="">
                            </div>
                            <div class="input-group mt-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding:0;border:none; background-color:white; color:black;">Date&nbsp;</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="civil_date" name="civil_date" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            </div>

            <div class="row" style="border: 2px solid green;border-top:none;">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <h6 style="padding-top:2px; font-weight:bold;">TO BE FILLED-UP AT THE OFFICE OF THE CIVIL REGISTRAR</h6>
                            <h6 style="margin-bottom: 0;">8&emsp;&emsp;&emsp;&nbsp;&nbsp;9&emsp;&emsp;&emsp;&nbsp;&nbsp;11&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;13&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;15&emsp;&emsp;&emsp;&nbsp;16&emsp;&emsp;&emsp;17&emsp;&emsp;&emsp;&emsp;&emsp;19</h6>
                            <div class="flex-container">
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="8a" disabled></div>
                                <div style="margin-right: 3px;"><input type="text" class="form-control form-control-sm" name="8b" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="9a" disabled></div>
                                <div style="margin-right: 3px;"><input type="text" class="form-control form-control-sm" name="9b" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="11a" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="11b" disabled></div> 
                                <div style="margin-right: 3px;"><input type="text" class="form-control form-control-sm" name="11c" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="13a" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="13b" disabled></div> 
                                <div><input type="text" class="form-control form-control-sm" name="13c" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="13d" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="13e" disabled></div> 
                                <div><input type="text" class="form-control form-control-sm" name="13f" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="13g" disabled></div>
                                <div style="margin-right: 3px;"><input type="text" class="form-control form-control-sm" name="13h" disabled></div> 
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="15a" disabled></div>
                                <div style="margin-right: 3px;"><input type="text" class="form-control form-control-sm" name="15b" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="16a" disabled></div> 
                                <div style="margin-right: 3px;"><input type="text" class="form-control form-control-sm" name="16b" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="17a" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="17b" disabled></div> 
                                <div style="margin-right: 3px;"><input type="text" class="form-control form-control-sm" name="17c" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="19a" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="19b" disabled></div> 
                                <div><input type="text" class="form-control form-control-sm" name="19c" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="19d" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="19e" disabled></div> 
                                <div><input type="text" class="form-control form-control-sm" name="19f" disabled></div>
                                <div style="border-right:none;"><input type="text" class="form-control form-control-sm" name="19g" disabled></div>
                                <div><input type="text" class="form-control form-control-sm" name="19h" disabled></div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>



<script>
// 1. Single / Multiple Birth Sync (UPDATED)
$(document).ready(function() {
    function toggleMultipleBirth() {
        let birthType = $("#birth_type").val();
        if (!birthType) return;
        
        birthType = birthType.trim().toUpperCase();
        let multiBirthInput = $("#multi_birth_was");
        
        if (birthType === "SINGLE") {
            // Fill with N/A, disable the input, and turn it grey
            multiBirthInput.val("NOT APPLICABLE");
            multiBirthInput.prop('disabled', true);
            multiBirthInput.css('background-color', '#e9ecef');
        } else {
            // Unlock the input and turn it white for Twins, Triplets, etc.
            multiBirthInput.prop('disabled', false);
            multiBirthInput.css('background-color', 'white');
            
            // Clear the "NOT APPLICABLE" text so you can type "FIRST", "SECOND", etc.
            if (multiBirthInput.val() === "NOT APPLICABLE") {
                multiBirthInput.val("");
            }
        }
    }

    // Run when typing or changing the birth type
    $("#birth_type").on('input blur change', function() {
        toggleMultipleBirth();
        if (typeof saveToMemory === "function") saveToMemory();
    });

    // Run once when the page loads to handle existing data
    toggleMultipleBirth();
});
</script>

<script>
    // 2. Attendant Checkbox Logic (UPDATED WITH ON-LOAD SYNC)
    $(document).ready(function(){
        
        // --- 1. ON PAGE LOAD CHECK ---
        let isStandardChecked = $('#physician').is(':checked') || 
                                $('#nurse').is(':checked') || 
                                $('#midwife').is(':checked') || 
                                $('#hilot').is(':checked');
                                
        let othersText = $('#otherstxt').val().trim();

        if (!isStandardChecked && othersText !== "") {
            // If it's a custom attendant (like "AAADA"), check the #others box automatically
            $('#others').prop('checked', true);
        } else if (isStandardChecked) {
            // If a standard box (like Midwife) is checked, clear the text box so it doesn't show duplicate text
            $('#otherstxt').val('');
        }

        // --- 2. CLICK EVENT LOGIC ---
        // Handle standard checkbox changes
        $('#physician, #nurse, #midwife, #hilot').change(function(){
            if($(this).is(':checked')){
                let positionValue = $(this).val().toUpperCase();
                
                $('input[name="attendant_position"]').val(positionValue);
                $('#others').prop('checked', false);
                $('#otherstxt').val('');
                $('#physician, #nurse, #midwife, #hilot').not(this).prop('checked', false);
            }
            if (typeof saveToMemory === "function") saveToMemory();
        });

        // Clear the standard boxes if the user manually clicks "Others"
        $('#others').change(function(){
            if($(this).is(':checked')){
                $('#physician, #nurse, #midwife, #hilot').prop('checked', false);
                $('#otherstxt').focus();
            }
        });
    });
</script>

<script>
    // 3. Child Last Name to Parents Last Name Auto-fill
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
    // 4. Global "Enter to move to next field"
    document.addEventListener("DOMContentLoaded", function() {
        let inputs = document.querySelectorAll(".form-control:not([disabled])");
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
// 5. Father & Marriage "Not Applicable" Sync (UPDATED)
$(document).ready(function() {
    const fatherFname = $('#father_fname');
    
    const fieldsToHandle = [
        'father_mname', 'father_lname', 'father_citizen', 
        'father_sect', 'father_occupation', 'father_age', 
        'father_brgy', 'father_city', 'father_province', 
        'father_country', 'marriage_date', 
        'marriage_place', 'marriage_city', 'marriage_province', 'marriage_country' 
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
            $('#marriage_city').val("NOT APPLICABLE");
            $('#marriage_province, #marriage_country').val("");
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
// 6. Child Birth Date Formatting & Spacebar Navigation
$(document).ready(function() {
    const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                 "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

    // 1. Load Initial Data
    let initialVal = $('#child_birth_date').val();
    if (initialVal && initialVal.trim() !== '' && !initialVal.includes('<')) {
        let parts = initialVal.trim().split(/[\s\/\.-]+/); 
        if (parts.length >= 3) {
            $('#bd_day').val(parts[0]);
            $('#bd_month').val(parts[1]);
            $('#bd_year').val(parts[2]);
        }
    }

    // 2. Spacebar Navigation Logic
    $('#bd_day, #bd_month, #bd_year').on('keydown', function(e) {
        if (e.key === " ") {
            e.preventDefault(); // Stop the space from actually being typed

            const currentId = $(this).attr('id');
            if (currentId === 'bd_day') {
                $('#bd_month').focus();
            } else if (currentId === 'bd_month') {
                $('#bd_year').focus();
            } else if (currentId === 'bd_year') {
                $('#birth_brgy').focus(); // Move to Section 4 (Place of Birth) after Year
            }
        }
    });

    // 3. Formatting and Saving on Blur
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
// 7. Save To Memory (Page 1 to Page 2 sync)
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
        child_sex: $('#child_sex').val(), 
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
        attendant_address: (($('input[name="attendant_address1"]').val() || "") + " " + ($('input[name="attendant_address2"]').val() || "")).trim().toUpperCase()
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
// 8. Toggle Marriage Place & Date Logic (UPDATED)
$(document).ready(function() {
    function toggleMarriageLogic() {
        let mDateInput = $('#marriage_date');
        let mDateVal = mDateInput.val().trim().toUpperCase();
        
        // Target all sub-fields for location and the date field itself
        let marriageFields = $('#marriage_city, #marriage_province, #marriage_country, #marriage_date');
        let mPlaceHidden = $('#marriage_place');

        // Check if the value indicates they are not married
        if (mDateVal === "NOT MARRIED" || mDateVal === "NOT APPLICABLE" || mDateVal === "N/A" || mDateVal === "UNKNOWN") {
            // 1. Force values to "NOT APPLICABLE"
            $('#marriage_city').val("");
            $('#marriage_province').val("NOT APPLICABLE");
            $('#marriage_country').val("");
            mPlaceHidden.val("NOT APPLICABLE");
            
            // 2. Lock the fields and apply grey background
            // We keep marriage_date enabled initially so they can type "N/A", 
            // but we grey out the location fields immediately.
            $('#marriage_city, #marriage_province, #marriage_country').prop('disabled', true);
            $('#marriage_city, #marriage_province, #marriage_country').parent().css('background-color', '#e9ecef'); 
        } else {
            // Unlock the fields if a valid date or other text is present
            $('#marriage_city, #marriage_province, #marriage_country').prop('disabled', false);
            $('#marriage_city, #marriage_province, #marriage_country').parent().css('background-color', 'white');
            
            // Clear the "NOT APPLICABLE" placeholder so the user can type real data
            if ($('#marriage_province').val() === "NOT APPLICABLE") {
                $('#marriage_city, #marriage_province, #marriage_country').val("");
                mPlaceHidden.val("");
            }
        }
    }

    // Trigger logic when the date is changed or blurred
    $('#marriage_date').on('input blur change', function() {
        toggleMarriageLogic();
        if (typeof saveToMemory === "function") saveToMemory();
    });

    // Run once on load to handle existing database records
    toggleMarriageLogic();
});
</script>

<script>
// 9. Deconstruct / Re-sync Marriage Place on Edit Load
$(document).ready(function() {
    let fullPlace = $('#marriage_place').val().trim();

    if (fullPlace !== "" && fullPlace !== "NOT APPLICABLE") {
        let parts = fullPlace.split(" ");
        if (parts.length >= 1) $('#marriage_city').val(parts[0]);
        if (parts.length >= 2) $('#marriage_province').val(parts[1]);
        if (parts.length >= 3) {
            let countryParts = parts.slice(2); 
            $('#marriage_country').val(countryParts.join(" "));
        }
    } else if (fullPlace === "NOT APPLICABLE") {
        $('#marriage_province').val("NOT APPLICABLE");
        $('#marriage_city, #marriage_province, #marriage_country').prop('disabled', true);
    }

    // Keep the "Sync" logic so if you edit them now, the hidden field updates
    $('#marriage_city, #marriage_province, #marriage_country').on('input', function() {
        let city = $('#marriage_city').val().trim();
        let prov = $('#marriage_province').val().trim();
        let country = $('#marriage_country').val().trim();
        
        let updatedPlace = `${city} ${prov}`.replace(/\s+/g, ' ').trim().toUpperCase();
        $('#marriage_place').val(updatedPlace);
    });
});
</script>

<script> 
// 10. Attendant 5 (Others) Auto-Check and Sync
$(document).ready(function() {
    $('#otherstxt').on('keydown', function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); 
            const val = $(this).val().trim().toUpperCase();
            if (val !== "") {
                $('#others').prop('checked', true);
                $('#physician, #nurse, #midwife, #hilot').prop('checked', false);
                $('#attendant_position').val(val);
                $('#attendant_name').focus();
            }
            if (typeof saveToMemory === "function") saveToMemory();
        }
    });
});
</script>

<script>
// 11. Enter to fetch Current Date
$(document).ready(function() {
    const dateFields = [
        '#attendant_date', '#informant_date', '#prepared_date', '#received_date', '#civil_date'
    ];

    $(dateFields.join(', ')).on('keydown', function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); 
            const now = new Date();
            const day = now.getDate();
            const year = now.getFullYear();
            const monthName = now.toLocaleString('default', { month: 'long' }).toUpperCase();
            const formattedDate = `${monthName} ${day}, ${year}`;

            $(this).val(formattedDate);

            const currentId = $(this).attr('id');
            if (currentId === 'attendant_date') $('#informant_name').focus();
            else if (currentId === 'informant_date') $('#prepared_name').focus();
            else if (currentId === 'prepared_date') $('#received_name').focus();
            else if (currentId === 'received_date') $('#civil_name').focus();

            if (typeof saveToMemory === "function") saveToMemory();
        }
    });
});
</script>

<script>
// 12. Enter to fetch PHILIPPINES
$(document).ready(function() {
    $('#mother_country, #father_country, #marriage_country').on('keydown', function(e) {
        if (e.key === "Enter") {
            if ($(this).val().trim() === "") {
                $(this).val("PHILIPPINES");
            }
            e.stopImmediatePropagation(); 

            // Special handling for marriage country sync to hidden field
            if ($(this).attr('id') === 'marriage_country') {
                let fullPlace = ($('#marriage_city').val() + " " + $('#marriage_province').val() + " " + $(this).val()).trim();
                $('#marriage_place').val(fullPlace.toUpperCase());
            }

            if (typeof saveToMemory === "function") saveToMemory();

            const allInputs = $(".form-control:not([disabled])");
            const index = allInputs.index(this);
            if (index > -1 && index < allInputs.length - 1) {
                allInputs.eq(index + 1).focus();
            }
            return false;
        }
    });
});
</script>

<script>
// 13. Local Storage Remarks Logic
$(document).ready(function() {
    const $remarkInput = $('#r');        
    const $dropdown = $('#remark-dropdown'); 
    const $hiddenInput = $('#re');      
    const STORAGE_KEY = 'custom_remarks_list';

    function getLocalRemarks() {
        const data = localStorage.getItem(STORAGE_KEY);
        return data ? JSON.parse(data) : [];
    }

    function saveToLocal(text) {
        let remarks = getLocalRemarks();
        text = text.trim().toUpperCase();
        
        if (text !== "" && !remarks.includes(text)) {
            remarks.push(text);
            localStorage.setItem(STORAGE_KEY, JSON.stringify(remarks));
        }
    }

    $remarkInput.on('keydown', function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); 
            saveToLocal($(this).val());
            $dropdown.hide();
        }
    });

    $remarkInput.on('input focus', function() {
        const query = $(this).val().toUpperCase();
        const remarks = getLocalRemarks();
        const matches = remarks.filter(r => r.includes(query));

        if (matches.length > 0 && query !== "") {
            let html = '';
            matches.forEach((text, index) => {
                html += `
                    <div class="remark-item">
                        <span class="remark-text">${text}</span>
                        <span class="delete-remark">Delete</span>
                    </div>`;
            });
            $dropdown.html(html).show();
        } else {
            $dropdown.hide();
        }

        let encoded = $(this).val().replace(/  /g, "[sp][sp]").replace(/\n/g, "[nl]");
        $hiddenInput.val(encoded);
    });

    $(document).on('click', '.remark-text', function() {
        const selectedText = $(this).text();
        $remarkInput.val(selectedText);
        let encoded = selectedText.replace(/  /g, "[sp][sp]").replace(/\n/g, "[nl]");
        $hiddenInput.val(encoded);
        $dropdown.hide();
    });

    $(document).on('click', '.delete-remark', function(e) {
        e.stopPropagation();
        const textToDelete = $(this).siblings('.remark-text').text();
        
        if (confirm(`Are you sure you want to delete this remark: "${textToDelete}"?`)) {
            let remarks = getLocalRemarks();
            remarks = remarks.filter(r => r !== textToDelete);
            localStorage.setItem(STORAGE_KEY, JSON.stringify(remarks));
            $(this).closest('.remark-item').remove();
            
            if ($dropdown.children().length === 0) {
                $dropdown.hide();
            }
        }
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.remark-item, #r').length) {
            $dropdown.hide();
        }
    });
});
</script>

<script>
// 14. Marriage Date (20a) Auto-Formatting (Enter & Blur Trigger)
$(document).ready(function() {
    const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", 
                 "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];

    function formatMarriageDate(input) {
        let val = $(input).val().trim().toUpperCase();
        
        // Skip formatting if it's N/A, empty, or already formatted correctly
        if (val === "" || val === "NOT APPLICABLE" || val === "NOT MARRIED" || val === "N/A") return;

        // FIXED: Added the comma (,) into the split regex to clean up existing commas
        let parts = val.split(/[\s\/,\.-]+/); 
        
        if (parts.length >= 3) {
            let month = parts[0];
            let day = parts[1];
            let year = parts[2];

            // Convert numeric month to Name
            if (!isNaN(month) && month !== "") {
                let idx = parseInt(month, 10);
                if (idx >= 1 && idx <= 12) month = MON[idx - 1];
            }

            // Fix 2-digit years
            if (year.length === 2) {
                let yInt = parseInt(year, 10);
                let currentYear = new Date().getFullYear() % 100;
                year = (yInt > currentYear + 5) ? "19" + year : "20" + year;
            }

            // Set the final formatted value: OCTOBER 24, 1995
            $(input).val(`${month} ${day}, ${year}`);
        }
    }

    $('#marriage_date').on('keydown', function(e) {
        if (e.key === "Enter") {
            formatMarriageDate(this);
            if (typeof toggleMarriageLogic === "function") toggleMarriageLogic();
            if (typeof saveToMemory === "function") saveToMemory();
        }
    });

    $('#marriage_date').on('blur', function() {
        formatMarriageDate(this);
    });
});
</script>

<script>
// 15. Spacebar Navigation for Section 20b
$(document).ready(function() {
    $('#marriage_city, #marriage_province, #marriage_country').on('keydown', function(e) {
        if (e.key === " ") {
            e.preventDefault(); // Prevent space from being typed
            
            const currentId = $(this).attr('id');
            if (currentId === 'marriage_city') {
                $('#marriage_province').focus();
            } else if (currentId === 'marriage_province') {
                $('#marriage_country').focus();
            } else if (currentId === 'marriage_country') {
                // Move to the first checkbox in Section 21a
                $('#physician').focus();
            }
        }
    });
});
</script>

<script>
// 16. Spacebar Navigation for Date of Birth (Section 3)
$(document).ready(function() {
    $('#bd_day, #bd_month, #bd_year').on('keydown', function(e) {
        if (e.key === " ") {
            e.preventDefault(); 
            const currentId = $(this).attr('id');
            if (currentId === 'bd_day') {
                $('#bd_month').focus();
            } else if (currentId === 'bd_month') {
                $('#bd_year').focus();
            } else if (currentId === 'bd_year') {
                $('#birth_brgy').focus(); // Jumps to Section 4: Place of Birth
            }
        }
    });
});
</script>

<script>
// 17. Combined Backspace Logic: Clear All AND Jump Back
// Pressing Backspace clears the entire input box but KEEPS it selected
$(document).ready(function() {
    $('input[type="text"]').on('keydown', function(e) {
        if (e.key === "Backspace") {
            
            // Only trigger if there is actually text in the box to delete
            if ($(this).val() !== "") {
                e.preventDefault(); // Stop the normal letter-by-letter deletion
                
                // 1. Clear the entire box instantly
                $(this).val('');
                
                // 2. Alert your other scripts (like the "Not Married" lock) that the box is now empty
                $(this).trigger('input'); 
                
                // 3. Save the empty box to memory directly (without blurring/deselecting)
                if (typeof saveToMemory === "function") saveToMemory();
            }
        }
    });
});
</script>