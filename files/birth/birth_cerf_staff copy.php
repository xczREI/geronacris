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
  <script src="../../bootstrap4/popper/popper.min.js"></script>
  <link href="../../bootstrap4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="../../alertifyjs/css/alertify.min.css"/>
  <link rel="stylesheet" href="../../alertifyjs/css/themes/default.min.css"/>
  <link href="../../css/style_css.css" rel="stylesheet" type="text/css">

  <style>
   	input, textarea, select{ 
   		text-transform: uppercase;
 	  }
  </style>
  <style>
    #navbar{ display: none; }
    .coll{ overflow:scroll; height:50em; }
    @media only screen and (max-width: 768px) {
                  /* For mobile phones: */
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
        .coll{ overflow:scroll; height:30em; }
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
 		<div id="accordion">
  		<button data-toggle="collapse" data-target="#birth_page_1" id="page1" class="btn btn-outline-info">Page 1</button>
		  <button data-toggle="collapse" data-target="#birth_page_2" id="page2" class="btn btn-outline-info">Page 2</button>
		  <a href="birth_records_staff.php" class="btn btn-outline-info">View Records</a>

  		<form method="post" action="reg_info_action_staff.php" id="addbirth_form">
  			<div id="birth_page_1" class="collapse coll show" data-parent="#accordion">
  				<?php
  			    include 'birth_page_1.php';
  				?>
  			</div>
    		<div id="birth_page_2" class="collapse coll" data-parent="#accordion">
      		<?php
  			    include 'birth_page_2.php';
  				?>
    		</div>
    		<br>
       	<button type="submit" class="btn btn-info btn-block" name="add_birth" id="btnadd" style="font-weight:bold; letter-spacing:5px; font-size:20px;">SAVE</button>
       	<br>
  		</form>
	  </div>

 	</div>
</div>

<?php include '../../report/report_modal1_staff.php'; ?>

<!--Javascript-->
<script>
$(document).ready(function(){
  var x = new Date();
	document.getElementById("time").value = x.toLocaleTimeString();
});
</script>

<script src = "../../js/birth_att_inf_2.js"></script>
<script src = "../../js/birth_delayed_gender.js"></script>
<script src = "../../js/birth_late_registry.js"></script>
<script src = "../../js/birth_time_js.js"></script>
<script src = "../../js/date_db.js"></script>
<script src = "../../js/input_no_only.js"></script>
<script src = "../../js/input_txt_only.js"></script>
<script src = "../../js/inputs1.js"></script>

<script>
$(document).ready(function(){
    $("#regno").keyup(function(){
      var registryno = $(this).val();
      $.ajax({
        url:"birth_check_regNo.php",
        method:"POST",
        data:{registry_no:registryno},
        dataType:"text",
        success:function(html){
            $("#error").html(html);
        }
      });
  });

});
</script>

<!--Javascrpt theme-->
<script src = "../../alertifyjs/alertify.min.js"></script>

</body>
</html>
