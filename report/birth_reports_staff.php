<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRS-Birth Report</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo-3.png">
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

<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
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

  <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="float: right;">
    <span class="navbar-toggler-icon"></span>
  </button>

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

<div class="row" id="row">
  <div class="col-sm-3 bg-dark" style="border-left: 15px solid;" id="sidebar">
      <div class="pic" style="margin-top: 2em;">
        <center><img src="../images/logo-3.png" class="logo">
            <h4 class="text-uppercase">Civil Registry<br><span class="lblspan">System</span></h4>
        </center>
      </div>

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

  </div>

  <div class="col-sm-9" style="padding-top: 7%;" id="body">
  		<h5 align="center">= BIRTH REGISTRATION =</h5>
      <center>
      <h6 class="mt-3 text-uppercase"><span>Monthly/Yearly Records</span></h6>
      <div class="row mb-5">
      <div class="col-sm-4"></div>
      <div class="col-sm-2 p-0 mb-1">
          <select class="custom-select" id="byear" name="year" required>
            <?php 
                require_once 'login_db_birth.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);

                // Extracts the last 4 characters (the year) from the "DD MONTH YYYY" string
                // Smart Query: Checks if the date has dashes (2005-05-03) or spaces (03 MAY 2005)
                $sql = "SELECT 
                          CASE 
                            WHEN child_birth_date LIKE '%-%' THEN LEFT(TRIM(child_birth_date), 4) 
                            ELSE RIGHT(TRIM(child_birth_date), 4) 
                          END AS yr 
                        FROM child_tbl 
                        WHERE child_birth_date IS NOT NULL AND child_birth_date != '' AND child_birth_date != '0000-00-00'
                        GROUP BY yr 
                        ORDER BY yr DESC";

                $result = $conn->query($sql);  

                echo "<option value='' style='display:none;'>-- Select Year --</option>";

                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { 
                        $validYear = $row['yr'];
                        if (is_numeric($validYear) && strlen($validYear) == 4) {
                            echo "<option value='".$validYear."'>".$validYear."</option>";   
                        }
                    }
                } else {
                    echo "<option value=''>No records found</option>";
                }
            ?>
          </select>
          </div>
          <div class="col-sm-2 p-0">
          <select class="custom-select" id="bmonth" name="month" required>
              <option value="" style="display: none;" selected>-- Select Month --</option>
              <option value="">All</option>
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
          <div class="col-sm-4"></div>
      </div>
      </center>
      <div id="chartContainer" style="height: 450px; max-width: 100%; margin: 0px;"></div>

  </div>
</div>

<?php include 'report_modal3_staff.php'; ?>

<script src = "../alertifyjs/alertify.min.js"></script>

<script>
// (CHART LOGIC REMAINED THE SAME AS ADMIN)
$(document).ready(function(){
    function updateChart() {
        var year = $("#byear").val();
        var month = $("#bmonth").val();
        var mm = '';
        if(month != ''){
            var d = new Date(year, month - 1);
            var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
            mm = months[d.getMonth()];
        }

        if(year == ''){
            alertify.dialog('alert').set({transition:'zoom',message: 'Pls. select month and enter year'}).show(); 
        } else {
            $.ajax({
                url: "birth_charts.php",
                data:{year:year,month:month},
                method: "POST",
                success:function(data){
                    var chart = new CanvasJS.Chart("chartContainer", {
                        theme: "light",
                        exportEnabled: true,
                        animationEnabled: true,
                        title:{ text: "Birth Statistics", horizontalAlign: "center", fontSize: 25 },
                        subtitles: [{ text: "(" + mm + " " + year + " )", fontSize: 15 }],
                        legend:{ cursor: "pointer", itemclick: explodePie },
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
    }

    $("#byear, #bmonth").change(updateChart);
});
</script>

</body>
</html>