<?php 
include ('logout_session.php'); 

// 1. Gather all unique years from all 3 databases at the top
$unique_years = array();

// Helper function to safely fetch years from a specific DB
function getDistinctYears($hn, $un, $pw, $db_name) {
    $years = array();
    $conn = @new mysqli($hn, $un, $pw, $db_name);
    if (!$conn->connect_error) {
        // Safe query that avoids '0000-00-00' comparison issues in strict mode
        $sql = "SELECT DISTINCT YEAR(reg_date) AS yr 
                FROM registration_tbl 
                WHERE reg_date IS NOT NULL 
                AND reg_date > '1900-01-01'"; 
        $res = $conn->query($sql);
        if ($res) {
            while ($r = $res->fetch_assoc()) {
                if (!empty($r['yr'])) $years[] = $r['yr'];
            }
        }
        $conn->close();
    }
    return $years;
}

// Fetch from all 3 databases
$unique_years = array_merge($unique_years, getDistinctYears('localhost', 'root', '', 'geronacris'));
$unique_years = array_merge($unique_years, getDistinctYears('localhost', 'root', '', 'geronacrisdeath'));
$unique_years = array_merge($unique_years, getDistinctYears('localhost', 'root', '', 'geronamarriage'));

// Clean and sort the final list
$final_years = array_unique($unique_years);
rsort($final_years);
?>
<!DOCTYPE html>
<html>
<head>
<title>GERONA CRIS-Other Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.png">
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
      [class*="col-"] { width: 100%; }
      #navbar{ display: block; display: flex;}
      #topbar{ display: none;  }
      #sidebar{ display: none; }
      #body{ padding-left: 12%; }
      .navbar-collapse {
        padding: 0; width: 50%; position: absolute; top: 72px; right: 20px; z-index: 1000;
      }
      .navbar-collapse #nav-link_active, #nav-link{ 
        font-size:13px; font-family: century gothic; text-transform: uppercase;
        color: white; display:  block; padding: 10px; transition: all 0.3s ease; letter-spacing: 1px;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-md bg-success navbar-dark" id="navbar">
  <a class="navbar-brand" href="#">
    <div class="media pl-1 mb-3">
      <div class="media-body">
        <h6 class="text-left mb-3 text-light">
          <?php $type = $_SESSION['type']; if ($type == 'Admin') { ?>
              <img src="../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
          <?php } else { ?>
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
      <li class="nav-item"><a class="active nav-link" id="nav-link" href="../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
      <li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
      <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link_active">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
      <li class="nav-item"><a class="nav-link" id="nav-link" href="../employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
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
        <?php } else { ?>
            <img src="../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
        <?php } ?>
        <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
      </h6>
    </div>
  </div>
</div>

<div class="row" id="row">
    <div class="col-sm-3 bg-success" style="border-left: 15px solid; height: 50em;" id="sidebar">
      <div class="pic" style="margin-top: 2em;">
        <center>
          <img src="../images/logo.png" class="logo">
          <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
        </center>
      </div>
      <div class="aside" style="margin-top: 3em;">
        <nav class="navbar">
          <ul class="navbar-nav" style="padding-bottom:6em;">
              <li class="nav-item"><a class="active nav-link" id="nav-link" href="../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
              <li class="nav-item"><a class="nav-link" id="nav-link" href="../files/files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link_active">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
              <li class="nav-item"><a class="nav-link" id="nav-link" href="../employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
              <li class="nav-item"><a class="nav-link" id="nav-link" href="../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
          </ul>
        </nav>
      </div>
    </div>

  <div class="col-sm-9" style="padding-top: 7%;" id="body">
      <h5 align="center">= REPORT =</h5>
      <center>
      <h6 class="mt-3 text-uppercase"><span>Monthly/Yearly Records</span></h6>
      <form method="post" action="other-print.php" target="_blank">
        <div class="row mb-5 justify-content-center">
          <div class="col-sm-2 mb-1">
            <label class="small font-weight-bold text-success">YEAR</label>
            <select class="custom-select" id="year" name="year">
                <option value="" style="display:none;" selected>-- Select Year --</option>
                <?php foreach($final_years as $y) { echo "<option value='$y'>$y</option>"; } ?>
            </select>
          </div>
          <div class="col-sm-2 mb-1">
            <label class="small font-weight-bold text-success">MONTH</label>
            <select class="custom-select" id="month" name="month">
                <option value="" style="display: none;" selected>-- Select Month --</option>
                <option value="All">All</option>
                <option value="01">January</option><option value="02">February</option><option value="03">March</option>
                <option value="04">April</option><option value="05">May</option><option value="06">June</option>
                <option value="07">July</option><option value="08">August</option><option value="09">September</option>
                <option value="10">October</option><option value="11">November</option><option value="12">December</option>
            </select>
          </div>
          <div class="col-sm-1">
            <label class="small font-weight-bold invisible d-block">PRINT</label>
            <button class="btn btn-outline-danger btn-block" type="submit" name="pdf"><i class="fa fa-print"></i></button>
          </div>
        </div>
      </form>
      </center>
      <div class="row" id="myTable"></div>
    </div>
  </div>

<?php include 'report_modal3.php'; ?>
<script src = "../alertifyjs/alertify.min.js"></script>
<script>
  $(document).ready(function(){
    $("#month, #year").change(function(){
      var month = $("#month").val();
      var year = $("#year").val();
      if(year != ""){
        $.ajax({
          type:"POST",
          url: "other-list.php",   
          data:{year:year, month:month},
          cache:false,
          success:function(data) { $("#myTable").html(data); }
        });
      }
    });
  });
</script>
</body>
</html>
