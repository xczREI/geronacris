<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>GERONA CRIS-DEATH RECORDS (STAFF)</title>
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

<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
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
    <ul class="navbar-nav bg-dark mx-auto h-100">
        <li class="nav-item"><a class="nav-link" href="../../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" id="nav-link_active" href="../files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
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
  <div class="col-sm-3 bg-dark" style="border-left: 15px solid; min-height: 100vh;" id="sidebar">
    <div class="pic" style="margin-top: 2em;">
     <center>
        <img src="../../images/logo-3.png" class="logo">
        <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
      </center>
    </div>
    <div class="aside" style="margin-top: 3em;">
      <nav class="navbar">
        <ul class="navbar-nav" style="padding-bottom:6em;">
          <li class="nav-item"><a class="nav-link" id="nav-link" href="../../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
          <li class="nav-item"><a class="nav-link active" id="nav-link_active" href="../files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
          <li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="col-sm-9" style="padding-top: 7%;" id="body">
    <div class="row">
      <div class="col-sm-7 mb-1">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
      </div>
      <div class="col-sm-3"></div>
      <div class="col-sm-2">
        <a class="btn btn-outline-info btn-block" href="death_cerf_staff.php">Data Entry</a>
      </div>
    </div>
    <br>
    <div class="table-responsive">
      <table class="table table-hover table-sm">
        <thead class="thead-dark">
          <tr>
            <th>Time Created</th>
            <th>Time Updated</th>
            <th>Registry No</th>
            <th>Name of Deceased</th>
            <th>Birth Date</th>
            <th>Death Date</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
      <tbody id="myTable">
    <?php
    require_once 'login_db_death.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $sql = "SELECT r.no as no, r.registry_no as registry_no, r.reg_date, r.reg_time, r.reg_user, 
                   r.update_date, r.update_time, r.update_user,
                   p.first_name, p.middle_name, p.last_name, p.date_birth, p.date_death, p.sex
            FROM registration_tbl r 
            LEFT JOIN person_tbl p ON r.no = p.no 
            ORDER BY r.no DESC";
    $main_records = $conn->query($sql);  
    
    if ($main_records) {
        while ($row = $main_records->fetch_assoc()) {
            if (!$row) continue;
            
            $reg_date_formatted = (!empty($row['reg_date'])) ? date_format(date_create($row['reg_date']), "m/d/Y") : '';
            $reg_time_formatted = (!empty($row['reg_time'])) ? date_format(date_create($row['reg_time']), "h:i A") : '';
            $upd_date_formatted = (!empty($row['update_date'])) ? date_format(date_create($row['update_date']), "m/d/Y") : '';
            $upd_time_formatted = (!empty($row['update_time'])) ? date_format(date_create($row['update_time']), "h:i A") : '';
            
            $reg_display = $row['reg_user'] . '<br>(' . $reg_date_formatted . ' ' . $reg_time_formatted . ')';
            $upd_display = $row['update_user'] . '<br>(' . $upd_date_formatted . ' ' . $upd_time_formatted . ')';
    ?>
        <tr>
            <td class="tduser" scope="rows"><?php echo $reg_display; ?></td>
            <td class="tduser"><?php echo $upd_display; ?></td>
            <td class="tduser"><?php echo $row['registry_no']; ?></td>
            <td class="tduser"><?php echo $row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['middle_name']; ?></td>
            <td class="tduser"><?php echo $row['date_birth']; ?></td>
            <td class="tduser"><?php echo $row['date_death']; ?></td>
            <td class="tduser"><?php echo $row['sex']; ?></td>
            
            <td>
                <a href="death_cerf_edit_staff.php?no=<?php echo $row['no']; ?>" class="btn btn-light btn-sm font-weight-bold">Edit</a>
            </td>
            
            <td>
                <a href="remove.php?reg_no=<?php echo $row['no']; ?>" 
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

<?php include '../../report/report_modal1_staff.php'; ?>
<script src = "../../alertifyjs/alertify.min.js"></script>

</body>
</html>