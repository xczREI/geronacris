<?php include('add_users_action.php'); ?>
<!-- The Modal -->
<div class="modal fade" id="add_users">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="title text-uppercase">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body p-5">
        <form method="post" action="view_users.php" id="addusrs_form">
          <input name="adid" type="hidden" value="<?php echo $_SESSION['id'];  ?>">
          <input name="adps" id="adps" type="hidden" value="<?php echo $_SESSION['ps'];  ?>">
          <div class="row">
              <div class="col-sm-6">
            <label id="lb" for="Lastname">Admin password:</label>
            <input class="usrinput form-control" name="adpass" type="password" placeholder="Pls. enter your password" id="adpassid" required>
            </div>
            </div>
            <hr>

            <!-- grid -->
            <div class="row">
              <div class="col-sm-6">

                <label id="lb" for="Lastname">Last Name:</label>
                <input class="usrinput form-control" name="lname" type="text" placeholder="Enter Last name" id="lnameid" onkeypress="return isTextKey(event)" required>
    
                <label id="lb" for="Firstname">First Name:</label>
                <input type="text" class="usrinput form-control" name="fname" placeholder="Enter First name" id="fnameid" onkeypress="return isTextKey(event)" required>

                <label id="lb" for="Firstname">Middle Name:</label>
                <input type="text" class="usrinput form-control" name="mname" placeholder="Enter Middle name" id="fnameid" onkeypress="return isTextKey(event)" required>

                <label id="lb" for="Address">Address:</label>         
                <input class="usrinput form-control" name="address" type="text" placeholder="Enter Address" id="addressid" onkeypress="return isTextKey(event)" required>

                <label id="lb" for="b-date">Birthdate:</label>         
                <input class="usrinput form-control" name="bdate" type="date" id="bdateid" required>

              <!--<div class="col-2">
                  <i class=" fa fa-eye" onclick="Toggle()" style="font-size:30px;padding-top:40px;color:gray;"></i>
              </div>-->
                

              </div>
              <div class="col-sm-6">
              <!--
                <label id="lb" for="ustype">User Type:</label><br>
                <div class="row">
                	<div class="col-2"></div>
                  <div class="col-5">
                  	<label class="lb1"><input type="checkbox" id="admin" name="ustype" value="Admin">&emsp; Admin</label> 
                  </div>
                  <div class="col-5">
                  	<label class="lb1"><input type="checkbox" id="staff" name="ustype" value="Staff">&emsp; Staff</label>
                  </div>
                </div>
                -->
                
                <label id="lb" for="gender">Gender:</label>
                <div class="row" style="padding-bottom:4%;">
                  <div class="col-sm-2"></div>
                  <div class="col-5">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="male" name="gender" value="Male">
                      <label class="custom-control-label" for="male">Male</label>
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="female" name="gender" value="Female">
                      <label class="custom-control-label" for="female">Female</label>
                    </div>
                  </div>
                </div> 

                <label id="lb" for="cellphone">Contact:</label>         
                <input class="usrinput form-control" placeholder="Enter Contact Number" name="cellphone" type="text" id="cellphoneid" maxlength="11" onkeypress="return isNumberKey(event)" required>

                <label id="lb" for="user">Username:</label>
                <input type="text" class="usrinput form-control" name="user" placeholder="Enter Username" id="userid" required>

                <!-- grid 2 -->
                <div class="row">
                  <div class="col-sm-6">
                    <label id="lb" for="pass">Password:</label>
                    <input type="password" class="usrinput form-control" name="psw" placeholder="Enter Password" id="psw1" onkeypress="pswfunction1()" required>
                    <span id="psw1error" style="font-family:consolas; color:red; font-size:12px;"></span>
                  </div>
                  <div class="col-sm-6">
                    <label id="lb" for="pass">Confirm Password:</label>
                    <input type="password" class="usrinput form-control" name="psw2" placeholder="Re-enter Password" id="psw22" style="font-size:14px;" required>
                  </div>
                </div>

              </div>
            </div>
          <br><hr><br>

          <div class="footer">
          <!--<button type="button" class="btn btn-basic" id="close" data-dismiss="modal" style="font-weight:bold;">Close</button>-->
            <button type="submit" class="btn btn-outline-primary btn-block" name="add" id="btnadd" style="font-weight:bold;">SIGN UP</button>
          </div><br> 

        </form>
      </div>

    </div>
  </div>
</div>