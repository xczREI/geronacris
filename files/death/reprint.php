<!-- The Modal -->
  <div class="modal fade" id="my103reprint">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Reprint Form No. 103</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php
          require_once 'login_db_death.php';

          $conn = new mysqli($hn, $un, $pw, $db);
          if ($conn->connect_error) die($conn->connect_error);

          $reg_no=null;
          if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

          $sql = "SELECT * FROM registration_tbl NATURAL JOIN (person_tbl NATURAL JOIN death_cause_eight_days NATURAL JOIN att_rev_tbl NATURAL JOIN corpse_disposal_tbl NATURAL JOIN inf_pre_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN death_cause_zero_seven NATURAL JOIN autopsy_tbl NATURAL JOIN embalmer_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
          $result = $conn->query($sql);  
          if (!$result) die ("Database access failed: " . $conn->error);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
        ?>
        <form method="post" action="reprint_103.php" target="_blank">
          <input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
          <!-- Modal body -->
          <div class="modal-body">
            <h6 align="center" style="text-transform:uppercase;">Are you sure you want to reprint the <br>Form No. 103 of</h6>
            <h5 align="center"><u><?php echo strtoupper($row['last_name']); echo', '; echo strtoupper($row['first_name']); echo' '; echo strtoupper($row['middle_name']); ?></u></h5>
            <!--<img src="../../images/birth.jpg" width="100%">-->
            <textarea style="width: 100%; display: none;" name="remarks"><?php echo ucwords($row['remarks']); ?></textarea>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-danger btn-block" name="print"><i class="fa fa-print"></i> REPRINT</button>
          </div>
        </form>
        <?php 
          }
        } 
        ?>

        </div>

      </div>
    </div>
  </div>