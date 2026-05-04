<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRS-Other Report</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">
	  <link rel="stylesheet" type="text/css" href="../bootstrap4/css/bootstrap.min.css"/>
    <script src="../bootstrap4/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../bootstrap4/js/bootstrap.min.js"></script>
    <link href="../bootstrap4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css"/>
    <script src="../bootstrap4/chart.js/Chart.min.js"></script>
    <script src="../canvasjs-2.3.2/canvasjs.min.js"></script>
    <script src="../bootstrap4/chart.js/jspdf.min.js"></script>
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
      <li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link_active">
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
  <div class="col-sm-3 bg-dark" style="border-left: 15px solid; height: 50em;" id="sidebar">
      <div class="pic" style="margin-top: 2em;">
        <center><img src="../images/logo-3.png" class="logo">
            <h4 class="text-uppercase">Civil Registry<br><span class="lblspan">System</span></h4>
        </center>
      </div>

  <!--nav-side-->
    <div class="aside" style="margin-top: 3em;">
      <nav class="navbar">
        <ul class="navbar-nav" style="padding-bottom:6em;">
            <li class="nav-item"><a class="active nav-link" id="nav-link" href="../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link_active">
              &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
            <li class="nav-item"><a class="nav-link" id="nav-link" href="../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
        </ul>
      </nav>
    </div>

  </div><!--end col-3-->

  <div class="col-sm-9" style="padding-top: 7%;" id="body">
  		<h5 align="center">= REPORT =</h5>
      <center>
      <h6 class="mt-3 text-uppercase"><span>Monthly/Yearly Records</span></h6>
      <form method="post" action="other-print.php" target="_blank">
        <div class="row mb-5 justify-content-center">
          <div class="col-sm-2 mb-1">
            <label class="small font-weight-bold">YEAR</label>
            <select class="custom-select" id="year" name="year">
              <?php 
                  require_once 'login_db_birth.php';
                  require_once 'login_db_death.php';
                  require_once 'login_db_mrg.php';

                  $conn = new mysqli($hn, $un, $pw, $db);
                  if ($conn->connect_error) die($conn->connect_error);

                  $sql = "SELECT DATE_FORMAT(reg_date,'%Y') AS yr FROM registration_tbl GROUP BY yr ORDER BY yr";
                  $result = $conn->query($sql);  
                  if (!$result) die ("Database access failed: " . $conn->error);

                  if ($result->num_rows > 0) {
                    echo "<option value='' style='display:none;'>-- Select Year --</option>";
                    while($row = $result->fetch_assoc()) { 
                      echo " <option value='".$row['yr']."'>".$row['yr']."</option>";   
                    }
                  } 
              ?>
            </select>
            </div>
            <div class="col-sm-2 mb-1">
            <label class="small font-weight-bold">MONTH</label>
            <select class="custom-select" id="month" name="month">
                <option value="" style="display: none;" selected>-- Select Month --</option>
                <option value="All">All</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>

            </div>
            <div class="col-sm-1">
              <label class="small font-weight-bold invisible">PRINT</label>
              <button class="btn btn-outline-danger btn-block" type="submit" name="pdf"><i class="fa fa-print"></i></button>
            </div>
        </div>
      </form>      </center>
      <div class="row" id="myTable">

      </div>
     
    </div>
  </div>

<!--modal-->
<?php include 'report_modal3_staff.php'; ?>

<!--Javascrpt theme-->
<script src = "../alertifyjs/alertify.min.js"></script>

<script>
  $(document).ready(function(){
    $("#month").change(function(){
      var month = $("#month").val();
      var year = $("#year").val();

      $.ajax({
        type:"POST",
        url: "other-list.php",   
        data:{year:year, month:month},
        cache:false,
        success:function(data) {
          $("#myTable").html(data);
        }
      }); 
    });
    $("#year").change(function(){
      var month = $("#month").val();
      var year = $("#year").val();

      $.ajax({
        type:"POST",
        url: "other-list.php",   
        data:{year:year, month:month},
        cache:false,
        success:function(data) {
          $("#myTable").html(data);
        }
      });            
    });
  });
</script>

</body>
</html>
