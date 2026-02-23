<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRS-Birth Registration</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="shortcut icon" type="image/x-icon" href="../../images/logo-3.png">
  <link rel="stylesheet" type="text/css" href="../../bootstrap4/css/bootstrap.min.css"/>
  <script src="../../bootstrap4/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="../../bootstrap4/js/bootstrap.min.js"></script>
  <link href="../../bootstrap4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../../alertifyjs/css/alertify.min.css"/>
  <link rel="stylesheet" href="../../alertifyjs/css/themes/default.min.css"/>
  <link href="../../css/style_css.css" rel="stylesheet" type="text/css">

  <style>
  	td, th{
   		font-size: 13px;
   		font-family: century gothic;
   	}
   	.tduser{
   		text-transform: uppercase;
   	}
  </style>
  
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
<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
    <div class="media pl-1 mb-3">
      <div class="media-body">
        <h6 class="text-left mb-3 text-light">
          <?php $type = $_SESSION['type']; if ($type == 'Admin') { ?>
              <img src="../../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
          <?php } else if ($type == 'Staff') { ?>
              <img src="../../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
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
      <li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
      &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
      <li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="nav-top" id="topbar">
  <div class="media">
    <h5 class="text-left pt-2 text-uppercase" style="font-family: century gothic;"><i class="fa fa-angle-right"></i> <?php echo $_SESSION['type']; ?> Account</h5>
    <div class="media-body">
      <h6 class="text-right mb-3">
        <?php $type = $_SESSION['type']; if ($type == 'Admin') { ?>
            <img src="../../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
        <?php } else if ($type == 'Staff') { ?>
            <img src="../../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
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
      <center><img src="../../images/logo-3.png" class="logo">
        <h4 class="text-uppercase">Civil Registry<br><span class="lblspan">System</span></h4>
      </center>
    </div>

  <!--nav-side-->
    <div class="aside" style="margin-top: 3em;">
      <nav class="navbar">
        <ul class="navbar-nav" style="padding-bottom:6em;">
          <li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
          &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
          <li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
        </ul>
      </nav>
    </div>

  </div><!--end col-3-->

 	<div class="col-sm-9" style="padding-top: 7%;" id="body">
    <div class="row">
      <div class="col-sm-7 mb-1">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
      </div>
      <div class="col-sm-3"></div>
      <div class="col-sm-2">
        <a class="btn btn-outline-info btn-block" href="birth_cerf_staff.php" style="overflow:auto;">Data Entry</a>
      </div>
    </div>
		<br>
 		<div class="table-responsive" style="overflow:scroll; height:50em;">
	  	<table class="table table-striped table-sm">
		    <thead class="thead-dark">
	      	<tr>
		      	<th>Time Created</th>
		        <th>Time Updated</th>
		        <th>Registry No</th>
		        <th>Name</th>
		        <th>Birthdate</th>
		        <th>Gender</th>
		        <th>Edit</th>
	      	</tr>
		    </thead>
	    	<tbody id="myTable">
      	<?php
			    require_once 'login_db_birth.php';
			    $conn = new mysqli($hn, $un, $pw, $db);
			    if ($conn->connect_error) die($conn->connect_error);

		      $sql= "SELECT * FROM registration_tbl NATURAL JOIN child_tbl  ORDER BY update_date DESC, update_time DESC";
		      $result = $conn->query($sql);  
		      if (!$result) die ("Database access failed: " . $conn->error);

		      $rows = $result->num_rows;
		      for ($j = 0 ; $j < $rows ; ++$j)
		      {
			      $result->data_seek($j);
			      $row = $result->fetch_array(MYSQLI_ASSOC);
		  	?>
          <tr>
            <td class="tduser" scope="rows"><?php echo $row['reg_user'].'<br>('.$row['reg_date'].' '.date_format(date_create($row['reg_time']),'h:i A').')'; ?></td>
            <td class="tduser"><?php echo $row['update_user'].'<br>('.$row['update_date'].' '.date_format(date_create($row['update_time']),'h:i A').')'; ?></td>
            <td class="tduser"><?php echo $row['registry_no']; ?></td>
            <td class="tduser"><?php echo $row['child_lname']; echo', ';echo $row['child_fname']; echo' '; echo $row['child_mname']; ?></td>
            <td class="tduser"><?php echo $row['child_birth_date']; ?></td>
            <td class="tduser"><?php echo $row['child_sex']; ?></td>
            <td>
              <!-- <a href="birth_cerf_edit_staff.php?reg_no=<?php echo $row['no']; ?>" class='btn btn-light btn-sm'><strong>Edit</strong></a> -->
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#staticBackdrop<?php echo $row['no']; ?>">
                  Edit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop<?php echo $row['no']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title h2" id="staticBackdropLabel">Admin Authentication</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="birth_admin_pass_check.php" method="post">
                        <div class="form-group">
                          <label for="adminPassword" class="h3">Enter Admin Password</label>
                          <input type="password" name="adminPassword" class="form-control" id="adminPassword">
                        </div>
                        <input type="hidden" name="edit_no" value="<?php echo  $row['no']; ?>">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="birth_auth_submit_btn" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </td>
         	</tr>
       	<?php
          }
       	?>
	    	</tbody>
	  	</table>
		</div>
	</div>	
</div>

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
<?php include '../../report/report_modal1_staff.php'; ?>
<!--Javascript-->
<script src = "../js/addbirth.js"></script>
<script>
$(document).ready(function(){
	var x = new Date();
  document.getElementById("time").value = x.toLocaleTimeString();

  $("#defaultCheck1lbl").click(function(){
    $("#defaultCheck1lbl").css("text-decoration", "underline");
    $("#defaultCheck2lbl").css("text-decoration", "none");
    document.getElementById("defaultCheck1").checked = true;
  	document.getElementById("defaultCheck2").checked = false;
  });
  $("#defaultCheck2lbl").click(function(){
  	$("#defaultCheck1lbl").css("text-decoration", "none");
    $("#defaultCheck2lbl").css("text-decoration", "underline");
    document.getElementById("defaultCheck1").checked = false;
   	document.getElementById("defaultCheck2").checked = true;
  });
});
</script>

<!--Javascrpt theme-->
<script src = "../../alertifyjs/alertify.min.js"></script>

</body>
</html>