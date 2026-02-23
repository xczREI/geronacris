<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRS-Registration</title>
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
    .cerf_pic{ width:30%; }
    .cerf_txt{ font-size: 170%; }
    .cerf_pic1{ width:35%; }
    .cerf_txt1{ font-size: 155%; }
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
      .cerf_pic{ width:25%; }
      #cerf_pic{ width:30%; }
      .cerf_txt{ font-size: 150%; }
      .cerf_pic1{ width:30%; }
      .cerf_txt1{ font-size: 135%; }
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
        <li class="nav-item"><a class="active nav-link" id="nav-link" href="../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" id="nav-link_active" href="files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
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
        <center><img src="../images/logo-3.png" class="logo">
            <h4 class="text-uppercase">Civil Registry<br><span class="lblspan">System</span></h4>
        </center>
      </div>

  <!--nav-side-->
    <div class="aside mb-5" style="margin-top: 3em;">
      <nav class="navbar">
        <ul class="navbar-nav" style="padding-bottom:6em;">
            <li class="nav-item"><a class="active nav-link" id="nav-link" href="../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" id="nav-link_active" href="files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
              &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
            <li class="nav-item"><a class="nav-link" id="nav-link" href="../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
        </ul>
      </nav>
    </div>

  </div><!--end col-3-->

  	<div class="col-sm-9" style="padding-top: 7%;" id="body">
	  	<div class="row" style="padding-top: 7%;">
	  	    <div class="col-sm-12">
		  	  	<div class="row">
		  	  		<div class="col-sm-4 mb-5" align="center"><button type="button" data-toggle="collapse" data-target="#demo1" id="btn1"><img src="../images/1.png" class="cerf_pic" id="cerf_pic"><br> <span class="cerf_txt">birth registration</span></button>
			  	  		<div id="demo1" class="collapse"><br>
				        	<a class="dropdown-item" href="birth/birth_cerf_staff.php">Data Entry</a>
				        	<a class="dropdown-item" href="birth/birth_records_staff.php"><!--Query-->Records</a>
				        	<a class="dropdown-item" href="legal/birth_records_staff.php"><!--Query-->Legal Adoption</a>
				      	</div>
			      	</div>
		  	  		<div class="col-sm-4 mb-5" align="center"><button type="button" data-toggle="collapse" data-target="#demo2" id="btn2"><img src="../images/d.png" class="cerf_pic"><br> <span class="cerf_txt">death registration</span></button>
			  	  		<div id="demo2" class="collapse"><br>
				        	<a class="dropdown-item" href="death/death_cerf_staff.php">Data Entry</a>
				        	<a class="dropdown-item" href="death/death_records_staff.php"><!--Query-->Records</a>
				        </div>
				     </div>
		  	  		<div class="col-sm-4 mb-5" align="center"><button type="button" data-toggle="collapse" data-target="#demo3" id="btn3"><img src="../images/m.png" class="cerf_pic1"><br> <span class="cerf_txt1">marriage registration</span></button>
			  	  		<div id="demo3" class="collapse"><br>
				        	<a class="dropdown-item" href="marriage/marriage_cerf_staff.php">Data Entry</a>
				        	<a class="dropdown-item" href="marriage/marriage_records_staff.php"><!--Query-->Records</a>
				        </div>
			        </div>
		 		</div>
		    </div>
		</div>	
	</div>
</div>

<!--php code-->

 <?php include '../report/report_modal2_staff.php'; ?>

<!--javascript-->
<script src = "../js/btnfile.js"></script>

<!--Javascrpt theme-->
<script src = "../alertifyjs/alertify.min.js"></script>

</body>
</html>