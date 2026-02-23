<style>
  .input{
    text-transform: uppercase; 
    border: none; 
    font-weight: normal; 
    font-family: arial;
     width: 100%;
  }
  .txt{
    border-bottom: 1px solid black; 
    border-radius: 0; 
    text-transform: capitalize; 
    text-align: center;
    background-color: white;
  }
</style>

<div class="modal" id="my1A" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Form No. 1A</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php
        require_once 'login_db_birth.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $reg_no=null;
        if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

        $sql = "SELECT * FROM registration_tbl NATURAL JOIN (child_tbl NATURAL JOIN mother_tbl NATURAL JOIN father_tbl NATURAL JOIN att_inf_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN admission_paternity_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
        ?>
        <form method="post" action="print_1A.php" target="_blank">
          <!-- Modal body -->
          <div class="modal-body" id="modal1A">
            <div class="form_1A" style="padding:0 30px 0 20px; width:800px;margin: auto;">
              <p style="font-size:12px;line-height:1.2;">Civil Registry Form No. 1A<br>(Birth-available)</p>
              <img src="../../images/logo.png" style="width:15%;float:left;padding-left:20px;">
              <h6 align="center" style="padding-top:5px;width:76%;">Republic of the Philippines<br><span style="font-weight:bold;">OFFICE OF THE CIVIL REGISTRAR</span><br>GERONA, TARLAC</h6>
              <div style="width:30%;float:right;">
                <input type="text" class="form-control form-control-sm" name="date_now" style="border-bottom: 1px solid black; border-radius:0; text-transform:uppercase;">
                <h6 align="center">Date</h6>
              </div>
              <br><br>
              <h6>TO WHOM IT MAY CONCERN:</h6>
              <h6 style="text-indent:8%;">We certify that, among others, the following facts of birth appear in<br>our Register of Birth on page <u>___<?php echo $row['page_no']; ?>___</u> of book number <u>___<?php echo $row['book_no']; ?>___</u>:</h6><br>

              <div class="row" style="padding-left:8%;">
              <!-- Hidden text -->
                <div class="col-5">
                  <p style="font-size:14.5px;color:black;">
                  Registry No <span style="float: right;">:</span><br>
                  Date of Registration <span style="float: right;">:</span><br>
                  Name of Child <span style="float: right;">:</span><br>
                  Sex <span style="float: right;">:</span><br>
                  Date of Birth <span style="float: right;">:</span><br>
                  Place of Birth <span style="float: right;">:</span><br>
                  Name of Mother <span style="float: right;">:</span><br>
                  Citizenship of Mother <span style="float: right;">:</span><br>
                  Name of Father <span style="float: right;">:</span><br>
                  Citizenship of Father <span style="float: right;">:</span><br>
                  Date of Marriage of Parents <span style="float: right;">:</span><br>
                  Place of Marriage of Parents <span style="float: right;">:</span><br>
                  </p>
                </div>
                <div class="col-7">
                  <h6>
                  <input class="input" type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
                  <input class="input" type="text" name="regi_no" value="<?php echo $row['registry_no']; ?>" readonly>
                  <input class="input" type="text" name="reg_date" value="<?php echo date_format(date_create($row['reg_date']),'F d, Y'); ?>" readonly="">
                  <input class="input" type="text" name="child_name" value="<?php echo ucwords($row['child_fname'].' '.$row['child_mname'].' '.$row['child_lname']); ?>" readonly="">
                  <input class="input" type="text" name="child_sex" value="<?php echo ucwords($row['child_sex']); ?>" readonly="">
                  <input class="input" type="text" name="birth_date" value="<?php echo ucwords($row['child_birth_date']); ?>" readonly=""><br> 
                  <input class="input" type="text" name="birth_place" value="<?php echo ucwords($row['birth_brgy'].', '.$row['birth_municipal'].', '.$row['birth_province']); ?>" readonly="">   
                  <input class="input" type="text" name="mother_name" value="<?php echo ucwords($row['mother_fname'].' '.$row['mother_mname'].' '.$row['mother_lname']); ?>" readonly=""><br> 
                  <input class="input" type="text" name="mother_citizen" value="<?php echo ucwords($row['mother_citizen']); ?>" readonly="">
                  <input class="input" type="text" name="father_name" value="<?php echo ucwords($row['father_fname'].' '.$row['father_mname'].' '.$row['father_lname']); ?>" readonly=""><br>
                  <input class="input" type="text" name="father_citizen" value="<?php echo ucwords($row['father_citizen']); ?>" readonly="">
                  <input class="input" type="text" name="mrg_date" value="<?php echo ucwords($row['marriage_date']); ?>" readonly="">
                  <input class="input" type="text" name="mrg_place" value="<?php echo ucwords($row['marriage_place']); ?>" readonly="">
                  </h6>
                </div>
                <div class="row" style="padding-left:2%;">
                  <div class="col-3">
                    <h6>Remarks:</h6>         
                  </div>
                  <div class="col-9">
                    <p style="font-size: 13px; text-transform:uppercase;" readonly=""><?php echo $row['remarks']; ?></p>
                  </div>
                </div>
              </div>
              <br>
              <textarea style="width: 100%; display: none;" name="remarks"><?php echo ucwords($row['remarks']); ?></textarea>

              <h6 style="text-indent:8%;">This certification is issued to
              <div class="custom-control custom-checkbox custom-control-inline" style="width:40%;padding-left:0;margin-right:0;">
                <input type="text" class="txt form-control form-control-sm" style="text-transform:uppercase;" name="cerf_issued_of">
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
<script src = "../../js/birth_name.js"></script>
<script src = "../../js/birth_reg_date.js"></script>