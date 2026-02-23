
<!-- Modal -->
<div class="modal fade" id="edit_<?php echo $row['emp_id']; ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title text-uppercase">User Account</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <form method="post" action="user_edit_action.php">
          <input class="form-control" name="id" type="hidden" value="<?php echo $row['emp_id']; ?>">
          <input name="adid" type="hidden" value="<?php echo $_SESSION['id'];  ?>">

      <!-- Grid -->
        <div class="row">

        <div class="col">
          <?php 
          $type = $row['usertype'];
          
          if($type == 'Admin'){ ?>
            <center><img src="../images/img_avatar3.png" class="rounded-circle" width="30%"></center>
          <?php }else if($type == 'Staff'){ ?>
            <center><img src="../images/img_avatar2.png" class="rounded-circle" width="30%"></center>
          <?php } ?>

           <br>
           <div class="row mt-1">
                <div class="col-4">
                  <label>Name&nbsp;:</label>
                </div>
                <div class="col-8">          
                  <input type="text" class="form-control form-control-sm" style="background-color:white;" id="name" name="name" value="<?php echo $row['lastname']; echo', '; echo $row['firstname']; echo' ';echo $row['middlename']; ?>" readonly> 
                </div>
              </div>  
              <div class="row mt-1">
                <div class="col-4">
                  <label>Address&nbsp;:</label>
                </div>
                <div class="col-8">          
                  <input type="text" class="form-control form-control-sm" style="background-color:white;" id="address" name="address" value="<?php echo $row['address']; ?>" readonly> 
                </div>
              </div> 
              <div class="row mt-1">
                <div class="col-4">
                  <label>Birthdate&nbsp;:</label>
                </div>
                <div class="col-8">          
                  <input type="text" class="form-control form-control-sm" style="background-color:white;" id="bdate" name="bdate" value="<?php echo date_format(date_create($row['birthdate']),'F d, Y'); ?>" readonly> 
                </div>
              </div> 
              <div class="row mt-1">
                <div class="col-4">
                  <label>Gender&nbsp;:</label>
                </div>
                <div class="col-8">          
                  <input type="text" class="form-control form-control-sm" style="background-color:white;" id="gender" name="gender" value="<?php echo $row['sex']; ?>" readonly> 
                </div>
              </div> 
              <div class="row mt-1">
                <div class="col-4">
                  <label>Contact&nbsp;:</label>
                </div>
                <div class="col-8">          
                  <input type="text" class="form-control form-control-sm" style="background-color:white;" id="contact" name="contact" value="<?php echo $row['contact']; ?>" onkeypress="return isNumberKey(event)" readonly> 
                </div>
              </div>
              <div class="row mt-1">
                <div class="col-4">
                  <label>Type&nbsp;:</label>
                </div>
                <div class="col-8">
                  <?php $type = $row['usertype']; 
                    if($type == 'Admin'){
                  ?>
                  <select name="usertype" class="form-control form-control-sm">
                    <option value="Admin" selected>Admin</option>
                    <option value="Staff">Staff</option>
                  </select><?php }else{ ?> 
                  <select name="usertype" class="form-control form-control-sm">
                    <option value="Admin">Admin</option>
                    <option value="Staff" selected>Staff</option>
                  </select><?php }?>       
                </div>
              </div>
              <div class="row mt-1">
                <div class="col-4">
                  <label>Username&nbsp;:</label>
                </div>
                <div class="col-8">          
                  <input type="text" class="form-control form-control-sm" style="background-color:white;" id="username" name="username" value="<?php echo $row['username']; ?>" readonly> 
                </div>
              </div>
            
          <br>
          <button class='btn btn-outline-success btn-block mb-1' type="submit" name="usrupdate">Update</button>
      </div>
      </div>

    </form>

    <div class="modal-footers">

      <div class="row">
        <div class="col-6">
          <a href="enable_action.php?id=<?php echo $row['emp_id']; ?>" class='btn btn-outline-primary btn-block'>Enable</a>
        </div>
        <div class="col-6">
          <a href="disable_action.php?id=<?php echo $row['emp_id']; ?>" class='btn btn-outline-danger btn-block'>Disable</a>
        </div>
      </div>
      
    </div>

      </div>
    </div>
  </div>
</div>

