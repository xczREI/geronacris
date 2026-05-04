<div class="modal fade" id="myreprint">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Reprint Form No. 102</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <?php
        require_once 'login_db_birth.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error) die($conn->connect_error);

        $reg_no=null;
        if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

        // IMPROVED QUERY: Using LEFT JOIN to ensure the record loads even if optional tables are empty
        $sql = "SELECT *, registration_tbl.no as no FROM registration_tbl 
                LEFT JOIN child_tbl ON registration_tbl.no = child_tbl.no 
                LEFT JOIN mother_tbl ON registration_tbl.no = mother_tbl.no 
                LEFT JOIN father_tbl ON registration_tbl.no = father_tbl.no 
                LEFT JOIN att_inf_tbl ON registration_tbl.no = att_inf_tbl.no 
                LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no 
                LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no 
                LEFT JOIN admission_paternity_tbl ON registration_tbl.no = admission_paternity_tbl.no 
                LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no 
                WHERE registration_tbl.no = '$reg_no' LIMIT 1";
        
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);

        if ($result->num_rows > 0) {
           // THE FIX: The while loop is removed
           $row = $result->fetch_assoc(); 
        ?>
        <form method="post" action="reprint_102.php" target="_blank">
          <input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
          <div class="modal-body">
            <h6 align="center" style="text-transform:uppercase;">Are you sure you want to reprint the <br>Form No. 102 of</h6>
            <h4 align="center"><u><?php echo strtoupper($row['child_lname']); echo', '; echo strtoupper($row['child_fname']); echo' '; echo strtoupper($row['child_mname']); ?></u></h4>
            </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-danger btn-block" name="print"><i class="fa fa-print"></i> REPRINT</button>
          </div>
        </form>
        <?php 
        } 
        ?>

        </div>
      </div>
    </div>
  </div>