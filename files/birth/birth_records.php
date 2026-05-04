<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>GERONA CRIS-BIRTH RECORDS</title>
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
    td,th{
      font-size: 13px;
      font-family: century gothic;
    }
    .tduser{
      text-transform: uppercase;
    }

    /* --- SIDEBAR STYLES --- */
    #sidebar {
      background-color: #2ea84b !important; 
      padding-left: 0;
      padding-right: 0;
      min-height: 100vh;
    }

    #sidebar .pic h4 {
      color: #ffffff;
      font-family: 'Century Gothic', sans-serif;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      margin-top: 10px;
      font-size: 1.2rem;
    }

    #sidebar .pic .lblspan {
      font-size: 0.7rem;
      letter-spacing: 1px;
    }

    #sidebar .aside {
      width: 100%;
    }

    #sidebar .navbar {
      padding: 0;
      width: 100%;
    }

    #sidebar .navbar-nav {
      width: 100%;
      padding-bottom: 6em;
    }

    #sidebar .nav-link {
      color: #ffffff !important;
      font-family: 'Century Gothic', sans-serif;
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: 15px 20px 15px 30px !important;
      transition: all 0.3s ease;
      width: 100%;
    }

    #sidebar .nav-link i {
      margin-right: 15px;
    }

    #sidebar .nav-link:hover {
      background-color: #c2ba15;
      color: #ffffff !important;
    }

    #sidebar .nav-link.active,
    #sidebar #nav-link_active {
      background-color: #ffcc00 !important; 
      color: #ffffff !important;
      font-weight: 500;
      border-left: 12px solid #009688; 
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4); 
      padding-left: 18px !important; 
    }
    /* ----------------------------------- */

    #navbar{ display: none; }
    
    @media only screen and (max-width: 768px) {
      [class*="col-"] {
        width: 100%;
      }
      #navbar{ display: block; display: flex;}
      #topbar{ display: none;  }
      #sidebar{ display: none; }
      #body{ padding-left: 5%; padding-right: 5%; }
      .navbar-collapse {
        padding: 0;
        width: 50%;
        position: absolute;
        top: 72px;
        right: 20px;
        z-index: 1000;
      }
      .navbar-collapse #nav-link_active, #nav-link { 
        font-size: 18px !important; 
        font-family: 'Century Gothic', sans-serif;
        text-transform: uppercase;
        color: #ffffff !important; 
        display: block;
        padding: 10px;
        transition: all 0.3s ease;
        letter-spacing: 1px;
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
              <img src="../../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
          <?php } else { ?>
              <img src="../../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
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
    <ul class="navbar-nav bg-success mx-auto h-100">
        <li class="nav-item"><a class="nav-link" href="../../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" id="nav-link_active" href="../files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
        <li class="nav-item"><a class="nav-link" href="../../employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
        <li class="nav-item"><a class="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="nav-top" id="topbar">
  <div class="media">
    <h5 class="text-left pt-2 text-uppercase" style="font-family: century gothic;"><i class="fa fa-angle-right"></i> <?php echo $_SESSION['type']; ?> Account</h5>
    <div class="media-body">
      <h6 class="text-right mb-3">
        <?php if ($type == 'Admin') { ?>
            <img src="../../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
        <?php } else { ?>
            <img src="../../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
        <?php } ?>
        <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
      </h6>
    </div>
  </div>
</div>

<div class="row" id="row">
  <div class="col-sm-3" id="sidebar">
    <div class="pic" style="margin-top: 2em;">
     <center>
        <img src="../../images/logo.png" class="logo">
        <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
      </center>
    </div>
    <div class="aside" style="margin-top: 3em;">
      <nav class="navbar">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="../../home.php"><i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
          <li class="nav-item"><a class="nav-link active" id="nav-link_active" href="../files.php" ><i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport"><i class="fa fa-file-o fa-fw"></i>Report</a></li>
          <li class="nav-item"><a class="nav-link" href="../../employee/view_users.php"><i class="fa fa-user-o fa-fw"></i>Account</a></li>
          <li class="nav-item"><a class="nav-link" href="../../php/logout.php"><i class="fa fa-eject fa-fw"></i>Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="col-sm-9" style="padding-top: 7%;" id="body">
    <div class="row">
      <div class="col-sm-7 mb-1">
        <input class="form-control" id="myInput" type="text" placeholder="Search birth records..">
      </div>
      <div class="col-sm-3"></div>
      <div class="col-sm-2">
        <a class="btn btn-outline-info btn-block" href="birth_cerf.php">Data Entry</a>
      </div>
    </div>
    <br>
    <div class="table-responsive" style="overflow:scroll; height:50em;">
      <table class="table table-hover table-sm">
        <thead class="thead-dark">
          <tr>
            <th>Time Created</th>
            <th>Time Updated</th>
            <th>Registry No</th>
            <th>Name of Child</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
      <tbody id="myTable">
    <?php
    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $sql = "SELECT * FROM registration_tbl NATURAL JOIN child_tbl ORDER BY reg_date DESC, reg_time DESC";
    $result = $conn->query($sql);  
    
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            
            $rDate = (!empty($row['reg_date']) && $row['reg_date'] != '0000-00-00') ? date("m/d/Y", strtotime($row['reg_date'])) : '';
            $rTime = (!empty($row['reg_time']) && $row['reg_time'] != '00:00:00') ? date("h:i A", strtotime($row['reg_time'])) : '';
            $uDate = (!empty($row['update_date']) && $row['update_date'] != '0000-00-00') ? date("m/d/Y", strtotime($row['update_date'])) : 'N/A';
            $uTime = (!empty($row['update_time']) && $row['update_time'] != '00:00:00') ? date("h:i A", strtotime($row['update_time'])) : '';
            
            $reg_display = $row['reg_user'] . '<br><small class="text-muted">(' . trim("$rDate $rTime") . ')</small>';
            $upd_display = $row['update_user'] . '<br><small class="text-muted">(' . trim("$uDate $uTime") . ')</small>';
    ?>
        <tr>
            <td class="tduser" scope="rows"><?php echo $reg_display; ?></td>
            <td class="tduser"><?php echo $upd_display; ?></td>
            <td class="tduser"><?php echo $row['registry_no']; ?></td>
            <td class="tduser"><?php echo $row['child_lname'] . ', ' . $row['child_fname'] . ' ' . $row['child_mname']; ?></td>
            <td class="tduser"><?php echo $row['child_birth_date']; ?></td>
            <td class="tduser"><?php echo $row['child_sex']; ?></td>
            
            <td>
                <a href="birth_cerf_edit.php?reg_no=<?php echo $row['no']; ?>" class="btn btn-light btn-sm font-weight-bold">Edit</a>
            </td>
            
            <td>
                <a href="birth_delete_action.php?reg_no=<?php echo $row['no']; ?>" 
                   class="btn btn-danger btn-sm font-weight-bold" 
                   onclick="return confirm('WARNING: Are you sure you want to permanently delete this record?')">
                    Delete
                </a>
            </td>
        </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='8'>Error loading database records: " . $conn->error . "</td></tr>";
    }
    ?>
</tbody>
      </table>
    </div>
  </div>  
</div>

<script>
// search filter logic
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<?php include '../../report/report_modal1.php'; ?>
<script src = "../../alertifyjs/alertify.min.js"></script>

</body>
</html>
