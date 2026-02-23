<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>GERONA CRIS-Account</title>
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
    @media only screen and (max-width: 768px) {
                /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
      #navbar{ display: block; display: flex;}
      #topbar{ display: none;  }
      #sidebar{ display: none; }
      #body{ padding-left: 12%; }
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

    }
  </style>

</head>
<body>

<!-- nav top -->
<nav class="navbar navbar-expand-md bg-success navbar-dark" id="navbar">
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
      	<li class="nav-item"><a class="active nav-link" id="nav-link" href="../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
		<li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
		<li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
		&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
		<li class="nav-item"><a class="nav-link" id="nav-link_active" href="view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
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
  	<div class="col-sm-3 bg-success" style="border-left: 15px solid;" id="sidebar">
  		<div class="pic" style="margin-top: 2em;">
	  		<center>
	  			<img src="../images/logo.png" class="logo">
				  <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
	  		</center>
	  	</div>

		<!--nav-side-->
		<div class="aside" style="margin-top: 3em;">
			<nav class="navbar">
				<ul class="navbar-nav" style="padding-bottom:6em;">
			  		<li class="nav-item"><a class="active nav-link" id="nav-link" href="../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
			  		<li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
			        &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link_active" href="view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
				</ul>
			</nav>
		</div>

  	</div><!--end col-3-->

    <div class="col-sm-9" style="padding-top: 7%;" id="body">
	    <div class="row">
	    	<div class="col-sm-9"></div>
	    	<div class="col-sm-3">
	    		<a href="#" class="btn btn-outline-info btn-block" role="button" data-toggle="modal" data-target="#add_users"><i class="fa fa-user-plus"></i> Add User</a>
	    	</div>
	    </div>
     	
  		<hr>
  		<div class="table-responsive">
  		<div class="row">
	    	<div class="col-sm-6">
	    		<input class="form-control" id="myInput" type="text" placeholder="Search..">
	    	</div>
	    	<div class="col-sm-6"></div>
	    </div>
  			
		  	<br>
		  	<table class="table table-sm">
			    <thead>
			      	<tr>
				      	<th>No.</th>
				        <th>Lastname</th>
				        <th>Firstname</th>
				        <th>Middlename</th>
				        <th>Gender</th>
				        <th>Status</th>
				        <th>Edit</th>
				        <th>Remove</th>
			      	</tr>
			    </thead>
		    	<tbody id="myTable">
			      	<?php
				    require_once 'login_db_account.php';

				    $conn = new mysqli($hn, $un, $pw, $db);
				    if ($conn->connect_error) die($conn->connect_error);

				      $sql= "SELECT * FROM emp_info NATURAL JOIN (email NATURAL JOIN user_status) WHERE emp_id > '".$_SESSION['id']."' ORDER BY lastname ASC";
				      $result = $conn->query($sql);  
				      if (!$result) die ("Database access failed: " . $conn->error);

				      $no = 1;

				      if ($result->num_rows > 0) {
    
    				  while($row = $result->fetch_assoc()) { 
				  	?>
	                <tr>
	                  <td><?php echo $no++; ?></td>
	                  <td class="tduser" scope="rows" style="text-transform: capitalize;"><?php echo $row['lastname']; ?></td>
	                  <td class="tduser" style="text-transform: capitalize;"><?php echo $row['firstname']; ?></td>
	                  <td class="tduser" style="text-transform: capitalize;"><?php  echo $row['middlename']; ?></td>
	                  <td class="tduser"><?php echo $row['sex']; ?></td>
	                  <td class="tduser"><?php echo $row['status']; ?></td>
	                  <td>
	                      <a href="#edit_<?php echo $row['emp_id']; ?>" class='btn btn-light btn-sm' data-toggle='modal'><strong>Edit</strong></a>
	                  </td>
	                  <td>
	                  	  <a href="#user_remove_<?php echo $row['emp_id']; ?>" data-toggle='modal' class='btn btn-outline-danger btn-sm' style="border-radius:100%;"><i class="fa fa-trash"></i></a>
	                      <!--<a href="#user_remove_action.php?id=<?php //echo $row['emp_id']; ?>" id="remove" class='btn btn-outline-danger btn-sm' style="border-radius:100%;"><i class="fa fa-trash"></i></a>-->
	                  </td>
	              	</tr>
	              	<?php
	  					include 'user_edit_modal.php';
	  					include 'user_remove_modal.php';
	                  }
	            	}
	                	include 'add_users_modal.php';
	              	?>
		    	</tbody>
		  	</table>
		</div>
	</div>	
</div>

<?php include '../report/report_modal2.php'; ?>
<!--javascript-->
<script src = "js/btnfile.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!--Javascript-->
<script src = "../js/add_users1.js"></script>
<script src = "../js/input_no_only.js"></script>
<script src = "../js/input_txt_only.js"></script>

<!--Javascrpt theme-->
<script src = "../alertifyjs/alertify.min.js"></script>


</body>
</html>