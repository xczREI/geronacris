<style>
  .input{
    text-transform:capitalize; border:none; font-weight:normal; font-family:arial; width:100%;
  }
  .txt{
    border-bottom: 1px solid black; border-radius:0; text-transform:capitalize; text-align:center;background-color:white;
  }
</style>

<div class="modal" id="my3A">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form No. 3A</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <?php
          require_once 'login_db_mrg.php';

          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $reg_no=null;
          if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

          $sql = "SELECT * FROM registration_tbl NATURAL JOIN (husband_tbl NATURAL JOIN wife_tbl NATURAL JOIN marriage_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN witness_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
          $result = $conn->query($sql);  
          if (!$result) die ("Database access failed: " . $conn->error);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
        ?>
         <!-- Modal body -->
      <div class="modal-body" id="modal3A">
          <form method="post" action="print_3A.php" target="_blank">

            <div class="form_1A" style="padding:0 30px 0 20px; width:800px;margin: auto;">
              <p style="font-size:12px;line-height:1.2;">Civil Registry Form No. 3A<br>(Marriage-available)</p>
              <img src="../../images/logo.png" style="width:15%;float:left;padding-left:20px;">
              <h6 align="center" style="padding-top:5px;width:76%;">Republic of the Philippines<br><span style="font-weight:bold;">OFFICE OF THE CIVIL REGISTRAR</span><br>GERONA, TARLAC</h6>
              <div style="width:30%;float:right;">
              <input type="text" class="form-control form-control-sm" name="date_now" style="border-bottom: 1px solid black; border-radius:0;">
              <h6 align="center">Date</h6>
              </div>
              <br><br>
              <h6>TO WHOM IT MAY CONCERN:</h6>
              <h6 style="text-indent:8%;">We certify that, among others, the following facts of birth appear in<br>our Register of Birth on page <u><input type="text" name="mpage" id="mpage" style="outline: none; border: 0; width: 80px; text-align: center; background-color: green;" maxlength="4" value="<?php echo $row['page_no']; ?>"></u> of book number <input type="text" name="mbook" id="mbook" style="outline: none; border: 0; width: 80px; text-align: center; background-color: green;" maxlength="4" value="<?php echo $row['book_no']; ?>">:</h6>

              <table class="table table-borderless">
                  <tr>
                    <td width="15%"></td>
                    <td><u>HUSBAND</u></td>
                    <td><u>WIFE</u></td>
                  </tr>
                  <tr>
                    <td width="15%">
                      <p style="font-size:14.5px;color:black;">Name<span style="float: right;">:</span><br>
                      Age<span style="float: right;">:</span><br>
                      Citizenship<span style="float: right;">:</span><br>
                      Civil Status<span style="float: right;">:</span><br>
                      Father<span style="float: right;">:</span><br>
                      Mother<span style="float: right;">:</span>
                      </p>
                    </td>
                    <td width="45%">
                    <h6 style="text-transform: uppercase;">
                        <input class="input" type="text" name="husband_name" value="<?php echo strtoupper($row['husband_fname'].' '.$row['husband_mname'].' '.$row['husband_lname']); ?>" readonly><br>
                        <input class="input" type="text" name="husband_age" value="<?php echo strtoupper($row['husband_age']); ?>" readonly>
                        <input class="input" type="text" name="husband_citizen" value="<?php echo strtoupper($row['husband_citizen']); ?>" readonly>
                        <input class="input" type="text" name="husband_civil_status" value="<?php echo strtoupper($row['husband_civil_status']); ?>" readonly>
                        <input class="input" type="text" name="husband_father_name" value="<?php echo strtoupper($row['husband_father_name']); ?>" readonly>
                        <input class="input" type="text" name="husband_mother_name" value="<?php echo strtoupper($row['husband_mother_name']); ?>" readonly></h6>
                    </td>
                    <td><h6 style="text-transform: uppercase;">
                        <input class="input" type="text" name="wife_name" value="<?php echo strtoupper($row['wife_fname'].' '.$row['wife_mname'].' '.$row['wife_lname']); ?>" readonly>
                        <input class="input" type="text" name="wife_age" value="<?php echo strtoupper($row['wife_age']); ?>" readonly>
                        <input class="input" type="text" name="wife_citizen" value="<?php echo strtoupper($row['wife_citizen']); ?>" readonly>
                        <input class="input" type="text" name="wife_civil_status" value="<?php echo strtoupper($row['wife_civil_status']); ?>" readonly>
                        <input class="input" type="text" name="wife_father_name" value="<?php echo strtoupper($row['wife_father_name']); ?>" readonly>
                        <input class="input" type="text" name="wife_mother_name" value="<?php echo strtoupper($row['wife_mother_name']); ?>" readonly></h6>
                    </td>
                  </tr>
                </table>

              <div class="row" style="padding-left:8%;">
              <!-- hidden text -->

                <div class="col-4">
                  <p style="font-size:14.5px;color:black;">
                  Registry No <span style="float: right;">:</span><br>
                  Date of Registration <span style="float: right;">:</span><br>
                  Date of Marriage <span style="float: right;">:</span><br>
                  Place of Marriage <span style="float: right;">:</span><br>
                  </p>
                </div>
                <div class="col-8">
                  <h6>
                  <input class="input" type="hidden" name="reg_no" value="<?php echo strtoupper($row['no']); ?>">
                  <input class="input" type="text" name="regi_no" value="<?php echo strtoupper($row['registry_no']); ?>" readonly>
                  <input class="input" type="text" name="reg_date" value="<?php echo strtoupper(date_format(date_create($row['reg_date']),'F d, Y')); ?>" readonly="">
                  <input class="input" type="text"  id="mrg_date" name="mrg_date" value="<?php echo strtoupper($row['mrg_date']); ?>" readonly="">                
                  <input class="input" type="text" name="mrg_place" value="<?php echo strtoupper($row['mrg_city'].', '.$row['mrg_province']); ?>" readonly="">
                  
                  </h6>
                </div>
              </div>
              <div class="row" style="padding-left:2%;">
                  <div class="col-2">
                    <h6>Remarks:</h6>                     
                  </div>
                  <div class="col-10">
                    <p style="font-size: 13px; text-transform:uppercase;" readonly=""><?php echo $row['remarks']; ?></p>
                  </div>
                </div>
              <br>
              <textarea style="width: 100%; display: none;" name="remarks"><?php echo ucwords($row['remarks']); ?></textarea>

              <h6 style="text-indent:8%;">This certification is issued to
              <div class="custom-control custom-checkbox custom-control-inline" style="width:40%;padding-left:0;margin-right:0;">
                <input type="text" class="form-control form-control-sm" style="border-bottom:1px solid black;border-radius:0;text-align:center;background-color:white;" name="cerf_issued_of" id="death">
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