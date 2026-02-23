<style>
  .input{
    text-transform: uppercase; 
    border: none; 
    font-weight: normal; 
    font-family: arial; 
    width:100%;
  }
  .txt{
    border-bottom: 1px solid black; 
    border-radius: 0; 
    text-transform: capitalize; 
    text-align: center;
    background-color: white;
  }
</style>

<div class="modal" id="my2A">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form No. 2A</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <?php
          require_once 'login_db_death.php';
          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $reg_no=null;
          if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

          $sql = "SELECT * FROM registration_tbl NATURAL JOIN (person_tbl NATURAL JOIN death_cause_eight_days NATURAL JOIN att_rev_tbl NATURAL JOIN corpse_disposal_tbl NATURAL JOIN inf_pre_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN death_cause_zero_seven NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
          $result = $conn->query($sql);  
          if (!$result) die ("Database access failed: " . $conn->error);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
        ?>
         <!-- Modal body -->
        <div class="modal-body" id="modal2A">
          <form method="post" action="print_2A.php" target="_blank">
            <div class="form_1A" style="padding:0 30px 0 20px; width:800px;margin: auto;">
              <p style="font-size:12px;line-height:1.2;">Civil Registry Form No. 2A<br>(Death available)</p>
              <img src="../../images/logo.png" style="width:15%;float:left;padding-left:20px;">
              <h6 align="center" style="padding-top:5px;width:76%;">Republic of the Philippines<br><span style="font-weight:bold;">OFFICE OF THE CIVIL REGISTRAR</span><br>GERONA, TARLAC</h6>
              <div style="width:30%;float:right;">
                <input type="text" class="form-control form-control-sm" name="date_now" style="border-bottom: 1px solid black; border-radius:0;">
                <h6 align="center">Date</h6>
              </div>
              <br><br>
              <h6>TO WHOM IT MAY CONCERN:</h6>
              <h6 style="text-indent:8%;">We certify that, among others, the following facts of birth appear in<br>our Register of Birth on page <input type="text" name="dpage" id="dpage" style="outline: none; border: 0; width: 80px; text-align: center; background-color: green;" maxlength="4" value="<?php echo $row['page_no']; ?>"> of book number <input type="text" name="dbook" id="dbook" style="outline: none; border: 0; width: 80px; text-align: center; background-color: green;" maxlength="4" value="<?php echo $row['book_no']; ?>">:</h6>
              <br>
              <div class="row" style="padding-left:8%;">
              <!-- hidden text -->
                <input class="input" type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
                <input type="hidden" id="person_fname" value="<?php echo $row['first_name']; ?>">
                <input type="hidden" id="person_mname" value="<?php echo $row['middle_name']; ?>">
                <input type="hidden" id="person_lname" value="<?php echo $row['last_name']; ?>">
                <input type="hidden" id="d_date" value="<?php echo $row['date_death']; ?>">

                <div class="col-5">
                  <p style="font-size:14.5px;color:black;">
                  Registry No <span style="float: right;">:</span><br>
                  Date of Registration <span style="float: right;">:</span><br>
                  Name of Deceased <span style="float: right;">:</span><br>
                  Age <span style="float: right;">:</span><br>
                  Civil Status <span style="float: right;">:</span><br>
                  Citizenship <span style="float: right;">:</span><br>
                  Date of Death <span style="float: right;">:</span><br>
                  Place of Death <span style="float: right;">:</span><br>
                  Cause of Death <span style="float: right;">:</span><br>
                  </p>
                </div>
                <div class="col-7">
                  <h6>
                  <input class="input" type="text" name="regi_no" value="<?php echo $row['registry_no']; ?>" readonly>
                  <input class="input" type="text" name="reg_date" value="<?php echo date_format(date_create($row['reg_date']),'F d, Y'); ?>" readonly="">
                  <input class="input" type="text" name="name_death" value="<?php echo ucwords($row['first_name']); echo ' '; echo ucwords($row['middle_name']); echo ' '; echo ucwords($row['last_name']); ?>" readonly="">
                  <?php 
                  $age_type =  $row['age_type'];
                  if($age_type == 'yrs'){ ?>
                    <input class="input" type="text"  name="age" value="<?php echo $row['age_time_of_death']; ?>" readonly="">
                   <?php }else if($age_type == 'under yrs' && !empty($row['age_time_of_death']) && !empty($row['age_day_min'])){ ?>
                    <input class="input" type="text"  name="age" value="<?php echo $row['age_time_of_death'].'months'; echo' '; echo $row['age_day_min'].'days'; ?>" readonly="">
                  <?php }else if($age_type == 'under yrs' && empty($row['age_time_of_death'])){ ?>
                    <input class="input" type="text"  name="age" value="<?php echo $row['age_day_min'].'days'; ?>" readonly="">
                  <?php }else if($age_type == 'under yrs' && empty($row['age_day_min'])){ ?>
                    <input class="input" type="text"  name="age" value="<?php echo $row['age_time_of_death'].'months'; ?>" readonly="">
                  <?php }else if($age_type == 'under hrs' && !empty($row['age_time_of_death']) && !empty($row['age_day_min'])){ ?>
                    <input class="input" type="text"  name="age" value="<?php echo $row['age_time_of_death'].'hrs'; echo' '; echo $row['age_day_min'].'min/sec'; ?>" readonly="">
                  <?php }else if($age_type == 'under hrs' && empty($row['age_time_of_death'])){ ?>
                    <input class="input" type="text"  name="age" value="<?php echo $row['age_day_min'].'min/sec'; ?>" readonly="">
                  <?php }else if($age_type == 'under hrs' && empty($row['age_day_min'])){ ?>
                    <input class="input" type="text"  name="age" value="<?php echo $row['age_time_of_death'].'hrs'; ?>" readonly="">
                  <?php }else{ ?>
                    <input class="input" type="text"  name="age" value="" readonly="">
                  <?php } ?>
                  <input class="input" type="text" name="civil_status" value="<?php echo $row['civil_status']; ?>" readonly="">
                  <input class="input" type="text" name="citizen" value="<?php echo $row['citizen']; ?>" readonly="">
                  <input class="input" type="text" name="date_death" value="<?php echo $row['date_death']; ?>" readonly="">
                  <input class="input" type="text" name="place_death" value="<?php echo $row['place_death']; ?>" readonly="">
                  <?php if(!empty($row['immediate_cause']) && !empty($row['antecedent_cause']) && empty($row['underlying_cause'])) {?>
                    <input class="input" type="text" name="death_cause" value="<?php echo $row['immediate_cause'].', '.$row['antecedent_cause']; ?>" readonly="">
                  <?php }else if(!empty($row['immediate_cause']) && empty($row['antecedent_cause']) && !empty($row['underlying_cause'])){ ?>
                    <input class="input" type="text" name="death_cause" value="<?php echo $row['immediate_cause'].', '.$row['underlying_cause']; ?>" readonly="">
                  <?php }else if(empty($row['immediate_cause']) && !empty($row['antecedent_cause']) && !empty($row['underlying_cause'])) {?>
                    <input class="input" type="text" name="death_cause" value="<?php echo $row['antecedent_cause'].', '.$row['underlying_cause']; ?>" readonly="">
                  <?php }else if(!empty($row['immediate_cause']) && !empty($row['antecedent_cause']) && !empty($row['underlying_cause'])){ ?>
                    <input class="input" type="text" name="death_cause" value="<?php echo $row['immediate_cause'].', '.$row['antecedent_cause'].', '.$row['underlying_cause']; ?>" readonly="">
                  <?php } else{ ?>
                    <input class="input" type="text" name="death_cause" value="<?php echo $row['immediate_cause'].''.$row['antecedent_cause'].''.$row['underlying_cause']; ?>" readonly="">
                  <?php }?>
                  </h6>
                </div>
                <div class="row" style="padding-left:2%;">
                  <div class="col-2">
                    <h6>Remarks:</h6>                    
                  </div>
                  <div class="col-10">
                    <p style="font-size: 13px; text-transform:uppercase;" readonly=""><?php echo ucwords($row['remarks']); ?></p>
                  </div>
                </div>
              </div>
              <br>
              <textarea style="width: 100%; display: none;" name="remarks"><?php echo ucwords($row['remarks']); ?></textarea>

              <h6 style="text-indent:8%;">This certification is issued to
              <div class="custom-control custom-checkbox custom-control-inline" style="width:40%;padding-left:0;margin-right:0;">
                <input type="text" class="form-control form-control-sm" style="border-bottom:1px solid black;border-radius:0;text-align:center;background-color:white;" name="cerf_issued_of">
               </div>
              upon his/her request.</h6><br>
              <div style="width:40%;float:right;">
              <input type="text" class="form-control form-control-sm" name="city_registrar" style="border-bottom: 1px solid black; border-radius:0;">
              <input type="text" class="form-control form-control-sm" name="city_registrar_position" placeholder="ex. Municipal Civil Registrar" style="text-align:center;text-transform:uppercase;">
              </div><br>
              <h6>Verified by :
              <div class="custom-control custom-checkbox custom-control-inline" style="width:40%;padding-left:0;margin-right:0;">
                <div style="width:90%;">
                  <input type="text" class="form-control form-control-sm" name="registrar_officer" style="border-bottom: 1px solid black; border-radius:0;">
                  <input type="text" class="form-control form-control-sm" name="registrar_officer_position" placeholder="ex. Registration Officer 1" style="text-align:center;text-transform:uppercase;">
                </div>
              </div>
              </h6>
              <h6>Amount Paid &emsp;:
              <div class="custom-control custom-checkbox custom-control-inline" style="width:20%;padding-left:0;margin-right:0;">
                <input type="text" class="form-control form-control-sm" name="amount_paid" style="border-bottom: 1px solid black; border-radius:0;">
              </div><br>
              O.R. Number &emsp;:
              <div class="custom-control custom-checkbox custom-control-inline mt-1" style="width:20%;padding-left:0;margin-right:0;">
                <input type="text" class="form-control form-control-sm" name="o_r_no" style="border-bottom: 1px solid black; border-radius:0;">
              </div><br>
              Date Paid &emsp;&emsp;&nbsp; :
              <div class="custom-control custom-checkbox custom-control-inline mt-1" style="width:20%;padding-left:0;margin-right:0;">
                <input type="text" class="form-control form-control-sm" name="date_paid" style="border-bottom: 1px solid black; border-radius:0;">
              </div><br>
              </h6>
              <h6>Note: A mark, erasure or alteration of any entry invalidates this Certification.</h6>
              <h6 align="center">DOCUMENTARY STAMP TAX PAID</h6>
            </div>

        </div>

      <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-danger btn-block" name="print"><i class="fa fa-print"></i> PRINT</button>
        </div>
      </form>
        <?php
          } 
        } 
        ?>
    </div>
  </div>
</div>

<!--Javascript-->
<script src = "../../js/death_name_d.js"></script>
<script src = "../../js/death_name_1.js"></script>
<script src = "../../js/death_reg_date.js"></script>
<script src = "../../js/death_ddate.js"></script>