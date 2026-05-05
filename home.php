<?php include ('php/logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>GERONA CRIS-DASHBOARD</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
	  <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css"/>
    <script src="bootstrap4/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="bootstrap4/js/bootstrap.min.js"></script>
    <link href="bootstrap4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="alertifyjs/css/themes/default.min.css"/>
    <script src="bootstrap4/chart.js/Chart.min.js"></script>
    <script src="canvasjs-2.3.2/canvasjs.min.js"></script>
    <link href="css/style_css.css" rel="stylesheet" type="text/css">

<script>

  window.onload = function () {

    $.ajax({
        url: "php/dash_chart_years1.php",
        method: "GET",
        success:function(data){

        var chart = new CanvasJS.Chart("chartContainer1",
        {
          theme: "light",
          //exportEnabled: true,
          animationEnabled: true,
          title:{
            text: ""
          },
          legend:{
            cursor: "pointer",
            itemclick: explodePie
          },
          data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "<b>{name}:</b> {y}",
            indexLabel: "{name}: {y}",
            dataPoints: data
          }]
        });
        chart.render();
        function explodePie (e) {
          if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
          } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
          }
          e.chart.render();

        }

      }

    });


    $.ajax({
        url: "php/dash_chart_years.php",
        method: "GET",
        success:function(data){

        var chart = new CanvasJS.Chart("chartContainer",
        {
          theme: "light",
          //exportEnabled: true,
          animationEnabled: true,
          title:{
            text: ""
          },
          legend:{
            cursor: "pointer",
            itemclick: explodePie
          },
          data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "<b>{name}:</b> {y}",
            indexLabel: "{name}: {y}",
            dataPoints: data
          }]
        });
        chart.render();
        function explodePie (e) {
          if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
          } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
          }
          e.chart.render();

        }

        }
    });

  }

</script>

  <style>
    #navbar{ display: none; }
    #icon{ font-size: 60px; }
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
      #icon{ font-size: 40px; }
      .numbers h6{ font-size: 12px; }
      .numbers h1{ font-size: 25px; }
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
              <img src="images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
          <?php } else if ($type == 'Staff') { ?>
              <img src="images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
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
      <li class="nav-item"><a class="active nav-link" id="nav-link_active" href="home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" id="nav-link" href="files/files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
        &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
      <li class="nav-item"><a class="nav-link" id="nav-link" href="employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
      <li class="nav-item"><a class="nav-link" id="nav-link" href="php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="nav-top" id="topbar">
  <div class="media">
  <h5 class="text-left pt-2 text-uppercase" style="font-family: century gothic;"><i class="fa fa-angle-right"></i> <?php echo $_SESSION['type']; ?> Account</h5>
    <div class="media-body">
      <h6 class="text-right mb-3">
        <?php $type = $_SESSION['type']; if ($type == 'Admin') { ?>
            <img src="images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
        <?php } else if ($type == 'Staff') { ?>
            <img src="images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
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
        <center><img src="images/logo.png" class="logo">
            <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
        </center>
      </div>

	<!--nav-side-->
		<div class="aside" style="margin-top: 3em;">
			<nav class="navbar">
				<ul class="navbar-nav" style="padding-bottom:6em;">
			  		<li class="nav-item"><a class="active nav-link" id="nav-link_active" href="home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="files/files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
			  		<li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
			        &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
				</ul>
			</nav>
		</div>

  </div><!--end col-3-->

  <div class="col-sm-9" style="padding-top: 7%;" id="body">
  	
    <div class="row">
      <div class="col-sm-9" align="right">
        <a class="btn btn-outline-danger btn-sm mb-1 mt-1" href="backup/backups.php"><i class="fa fa-database fa-fw"></i></a>
      </div>
      <div class="col-sm-3">
        <a class="btn btn-outline-info btn-block mb-4" href="account/admin_setting.php?id=<?php echo $_SESSION['id']; ?>"><i class="fa fa-cog fa-fw"></i>Account Setting</a>
      </div>
    </div>

    <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 mb-2">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-child text-warning" id="icon"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <?php
                      require_once 'php/login_db_birth.php';

          					  $conn = new mysqli($hn, $un, $pw, $db);
          					  if ($conn->connect_error) die($conn->connect_error);

                      $sql = "SELECT * FROM child_tbl NATURAL JOIN registration_tbl";
                      $result = $conn->query($sql);  
                      if (!$result) die ("Database access failed: " . $conn->error);
                      $rows = $result->num_rows;
                                    
                    ?>
                    <div class="numbers">
                      <h6 class="card-category text-right text-uppercase">Birth</h6>
                      <h1 class="text-center"><?php echo $rows; ?></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 mb-2">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-bed text-secondary" id="icon"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                     <?php
                      require_once 'php/login_db_death.php';

                      $conn = new mysqli($hn, $un, $pw, $db);
                      if ($conn->connect_error) die($conn->connect_error);

                      // Use the correct $conn variable and the new table name
                        $sql = "SELECT 
                            n.no, 
                            r.registry_no, 
                            p.first_name, 
                            p.middle_name, 
                            p.last_name, 
                            r.reg_date 
                        FROM no_tbl n
                        LEFT JOIN registration_tbl r ON n.no = r.no
                        LEFT JOIN person_tbl p ON n.no = p.no
                        ORDER BY n.no DESC";
                      $result = $conn->query($sql);  
                      
                      if (!$result) die ("Database access failed: " . $conn->error);
                      
                      $rows = $result->num_rows;
                    ?>
                    <div class="numbers">
                      <h6 class="card-category text-right text-uppercase">Death</h6>
                      <h1 class="text-center"><?php echo $rows; ?></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 mb-2">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-gratipay text-danger" id="icon"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <?php
                      require_once 'php/login_db_mrg.php';

          					  $conn = new mysqli($hn, $un, $pw, $db);
          					  if ($conn->connect_error) die($conn->connect_error);

                      $sql = "SELECT * FROM husband_tbl NATURAL JOIN wife_tbl NATURAL JOIN registration_tbl";
                      $result = $conn->query($sql);  
                      if (!$result) die ("Database access failed: " . $conn->error);
                      $rows = $result->num_rows;
                                    
                    ?>
                    <div class="numbers">
                      <h6 class="card-category text-right text-uppercase">Marriage</h6>
                      <h1 class="text-center"><?php echo $rows; ?></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fa fa-users text-primary" id="icon"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <?php
                      require_once 'php/login_db_account.php';

          					  $conn = new mysqli($hn, $un, $pw, $db);
          					  if ($conn->connect_error) die($conn->connect_error);

                      $sql = "SELECT * FROM emp_info NATURAL JOIN email";
                      $result = $conn->query($sql);  
                      if (!$result) die ("Database access failed: " . $conn->error);
                      $rows = $result->num_rows;
                                    
                    ?>
                    <div class="numbers">
                      <h6 class="card-category text-right text-uppercase">Users</h6>
                      <h1 class="text-center"><?php echo $rows; ?></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

  	<div class="row pt-5">
  		<div class="col-sm-6">
        <h5 class="text-uppercase pl-3 text-center"><strong>Birth Statistics</strong><br>
        <span class="text-primary text-capitalize" style="font-size: 15px;"><i>Gender Distribution</i></span></h5>
        <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px;"></div>
  		</div>
  		<div class="col-sm-6">
        <h5 class="text-uppercase pl-3 text-center"><strong>Death Statistics</strong><br>
        <span class="text-danger text-capitalize" style="font-size: 15px;"><i>Gender Distribution</i></span></h5>
        <div id="chartContainer1" style="height: 370px; max-width: 920px; margin: 0px;"></div>
  		</div>
  	</div>

  </div>
</div>

<!--============================== MODAL =========================-->
<?php include 'report/report_modal.php'; ?>

<!--============================== JAVASCRIPT =========================-->
<script src = "js/edit_users.js"></script>
<script src = "js/input_no_only.js"></script>
<script src = "js/input_txt_only.js"></script>

</body>
</html>
