<?php include ('../php/logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRS-Setting</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="shortcut icon" type="image/x-icon" href="../images/logo-3.png">
	<link rel="stylesheet" type="text/css" href="../bootstrap4/css/bootstrap.min.css"/>
    <script src="../bootstrap4/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
    <link href="../bootstrap4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css"/>
    <link href="../css/style_css.css" rel="stylesheet" type="text/css">

<style>
    #navbar{ display: none; }
    #pic{ width: 80%; }
    @media only screen and (max-width: 768px) {
                /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
      #navbar{ display: block; display: flex;}
      #topbar{ display: none;  }
      #sidebar{ display: none; }
      #body{ padding-left: ; }
      .navbar-collapse {
        padding: 0;
        width: 50%;
        position: absolute;
        top: 72px;
        right: 20px;
        z-index: 1000;
      }
      .navbar-collapse #nav-link_active, #nav-link{ 
        font-size:13px; 
        font-family: century gothic;
        text-transform: uppercase;
        color: white;
        display:  block;
        padding: 10px;
        transition: all 0.3s ease;
        letter-spacing: 1px;
      }
      #pic{ width: 40%; }
      #info{ padding-right: 25px;}
    }
  </style>

</head>
<body>

<!-- nav top -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
    <div class="media pl-1 mb-3">
      <div class="media-body">
        <h6 class="text-left mb-3 text-light">
          <?php $type = $_SESSION['type']; if ($type == 'Admin') { ?>
              <img src="../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
          <?php } else if ($type == 'Staff') { ?>
              <img src="../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
          <?php } ?>

          <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
        </h6>
      </div>
    </div>
  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="float: right;">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse bg-light" id="collapsibleNavbar">
    <ul class="navbar-nav bg-dark mx-auto h-100">
      	<li class="nav-item"><a class="active nav-link" id="nav-link_active" href="../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
		<li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
		<li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
		&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
		<li class="nav-item"><a class="nav-link" id="nav-link" href="../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="nav-top" id="topbar">
  <div class="media">
  <h5 class="text-left pt-2 text-uppercase" style="font-family: century gothic;"><i class="fa fa-angle-right"></i> <?php echo $_SESSION['type']; ?> Account</h5>
    <div class="media-body">
      <h6 class="text-right mb-3">
        <?php $type = $_SESSION['type']; if ($type == 'Admin') { ?>
            <img src="../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
        <?php } else if ($type == 'Staff') { ?>
            <img src="../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
        <?php } ?>

        <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
      </h6>
    </div>
  </div>
</div>

<!--navbar-->
<div class="row" id="row">
  	<div class="col-sm-3 bg-dark" style="border-left: 15px solid;" id="sidebar">
  		<div class="pic" style="margin-top: 2em;">
	  		<center>
	  			<img src="../images/logo-3.png" class="logo">
	  			<h4 class="text-uppercase">Civil Registry<br><span class="lblspan">System</span></h4>
	  		</center>
	  	</div>

		<!--nav-side-->
		<div class="aside" style="margin-top: 3em;">
			<nav class="navbar">
				<ul class="navbar-nav" style="padding-bottom:6em;">
			  		<li class="nav-item"><a class="active nav-link" id="nav-link_active" href="../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
		            <li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
		            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
		              &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
		            <li class="nav-item"><a class="nav-link" id="nav-link" href="../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
				</ul>
			</nav>
		</div>

  	</div><!--end col-3-->

  	<div class="col-sm-9" style="padding-top: 7%;" id="body">
  		<?php
            require_once '../php/login_db_account.php';

            $conn = new mysqli($hn, $un, $pw, $db);
            if ($conn->connect_error) die($conn->connect_error);

            $id=null;
            if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }

            $sql= "SELECT * FROM emp_info NATURAL JOIN email WHERE emp_id = $id ";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) { 
        ?>
	  	<div class="row pb-5" style="padding-top: 3%;">
	  		<div class="col-sm-4 pl-5">
	  	   		<?php 
		          $type = $row['usertype'];
		          
		          if($type == 'Admin'){ ?>
		            <center>
			            <img src="../images/img_avatar3.png" class="rounded-circle" id="pic">
			            <h6 class="pt-3 text-secondary">User Name</h6>
			            <h2 class="text-uppercase">= <?php echo $row['username']; ?> =</h2>
		            </center>
		          <?php }else if($type == 'Staff'){ ?>
		            <center>
			            <img src="../images/img_avatar2.png" class="rounded-circle" id="pic">
			            <h6 class="pt-3 text-secondary">User Name</h6>
			            <h2 class="text-uppercase">= <?php echo $row['username']; ?> =</h2>
		            </center>
		        <?php } ?>
	  	   	</div>
	  	   	
	  	   	<div class="col-sm-7 pl-5">
	  	   		<h5 class="text-uppercase pb-3">Profile Info.</h5>
		  	   	<form method="post" action="edit_staff_action.php">
	          		<input class="form-control" name="id" type="hidden" value="<?php echo $row['emp_id']; ?>">
	          		<div class="row pl-3">
				  	   	<div class="form-group col-sm-6">
						  <label>Lastname:</label>
						  <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lastname']; ?>" onkeypress="return isTextKey(event)"> 
						</div>
						<div class="form-group col-sm-6">
						  <label>Firstname:</label>
						  <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['firstname']; ?>" onkeypress="return isTextKey(event)"> 
						</div>
					</div>
					<div class="row pl-3">
						<div class="form-group col-sm-6">
						  <label>Middlename:</label>
						  <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $row['middlename']; ?>" onkeypress="return isTextKey(event)">  
						</div>
						<div class="form-group col-sm-6">
						  <label>Birthdate:</label>
						  <input type="date" class="form-control" id="bdate" name="bdate" value="<?php echo $row['birthdate']; ?>">  
						</div>
					</div>
					<div class="row pl-3">
						<div class="form-group col-sm-6">
						  <label>Gender:</label>
						  <?php if ($row['sex'] == 'Male') { ?>
		                    <select name="gender" class="form-control">
		                      <option value="Male" selected>Male</option>
		                      <option value="Female">Female</option>
		                    </select>
		                  <?php } else { ?> 
		                    <select name="gender" class="form-control">
		                      <option value="Male">Male</option>
		                      <option value="Female" selected>Female</option>
		                    </select>
		                  <?php } ?>      
						</div>
						<div class="form-group col-sm-6">
						  <label>Contact:</label>
						  <input type="text" class="form-control" id="contact" name="contact" title="09xx-xxx-xxxx" required pattern = "[0-9]{11}" maxlength="11" value="<?php echo $row['contact']; ?>" onkeypress="return isNumberKey(event)">  
						</div>
					</div>
					<div class="form-group pl-3">
					  <label>Address:</label>
					  <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>"  onkeypress="return isTextKey(event)">  
					</div>

					<h5 class="text-uppercase pb-3">Account</h5>

		            <div class="form-group pl-3">
						<label>Username:</label>
						<input type="text" class="form-control" id="username" name="user" value="<?php echo $row['username']; ?>">  
					</div> 
			        <div class="row pl-3">
			            <div class="form-group col-sm-6">
							<label>New password:</label>
							<input type="hidden" class="form-control form-control-sm" id="password" name="pass" value="<?php echo $row['password']; ?>">
                  			<input type="password" class="form-control form-control-sm" id="psw1" name="pass1">
						</div>
						<div class="form-group col-sm-6">
							<label>Confirm Password:</label>
							<input type="password" class="form-control form-control-sm" id="psw2" name="pass2"> 
                  			<span id="psw1error" style="font-family:consolas; font-size:13px;"></span> 
						</div>
			        </div> 
			        <div class="form-group">
						<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-block" name="updatebtn">UPDATE</button>
					</div>
		        </div>

		        <!-- The Modal -->
				<div class="modal" id="myModal">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">

				      <!-- Modal Header -->
				      <div class="modal-header">
				      	<h5>Current Password:</h5>
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				      </div>

				      <!-- Modal body -->
				      <div class="modal-body">
				      	<div class="form-group pt-3">
				        	<input class="form-control" name="userpass" type="password" placeholder="Pls. enter your password" id="userpassid" required>
				        </div>
				      </div>

				      <!-- Modal footer -->
				      <div class="modal-footer">
				        <button type="submit" class="btn btn-danger" name="updatebtn">OK</button>
				      </div>

				    </div>
				  </div>
				</div>

				</form>
	  	   	</div>
		</div>	
		<?php } ?>
	</div>
</div>

<!--php code-->
<?php include '../report/report_modal2_staff.php'; ?>

<!--javascript-->
<script src = "../js/edit_users.js"></script>
<script src = "../js/btnfile.js"></script>

<!--Javascrpt theme-->
<script src = "../alertifyjs/alertify.min.js"></script>

</body>
</html>