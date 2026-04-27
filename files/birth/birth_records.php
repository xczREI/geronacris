<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRS-Birth Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../images/logo-3.png">
    
    <link rel="stylesheet" type="text/css" href="../../bootstrap4/css/bootstrap.min.css"/>
    <link href="../../bootstrap4/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="../../alertifyjs/css/themes/default.min.css"/>
    <link href="../../css/style_css.css" rel="stylesheet" type="text/css">

    <style>
        td, th { font-size: 13px; font-family: 'Century Gothic', sans-serif; }
        .tduser { text-transform: uppercase; }
        #navbar { display: none; }
        
        @media only screen and (max-width: 768px) {
            [class*="col-"] { width: 100%; }
            #navbar { display: flex; }
            #topbar, #sidebar { display: none; }
            #body { padding-left: 0; }
            .navbar-collapse {
                position: absolute; top: 72px; right: 20px; z-index: 1000; width: 50%;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md bg-success navbar-dark" id="navbar">
    <a class="navbar-brand" href="#">
        <div class="media pl-1">
            <?php $avatar = ($_SESSION['type'] == 'Admin') ? 'img_avatar3.png' : 'img_avatar2.png'; ?>
            <img src="../../images/<?php echo $avatar; ?>" class="mr-3 rounded-circle" style="width:40px;">
            <div class="media-body">
                <h6 class="text-light mt-2"><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></h6>
            </div>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-light" id="collapsibleNavbar">
        <ul class="navbar-nav bg-dark mx-auto w-100">
            <li class="nav-item"><a class="nav-link" href="../../home.php"><i class="fa fa-clock-o fa-fw"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link active" href="../files.php"><i class="fa fa-bookmark-o fa-fw"></i> Registration</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport"><i class="fa fa-file-o fa-fw"></i> Report</a></li>
            <li class="nav-item"><a class="nav-link" href="../../employee/view_users.php"><i class="fa fa-user-o fa-fw"></i> Account</a></li>
            <li class="nav-item"><a class="nav-link" href="../../php/logout.php"><i class="fa fa-eject fa-fw"></i> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="nav-top p-2" id="topbar">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="text-uppercase mb-0"><i class="fa fa-angle-right"></i> <?php echo $_SESSION['type']; ?> Account</h5>
        <h6>
            <img src="../../images/<?php echo $avatar; ?>" class="mr-2 rounded-circle" style="width:35px;">
            <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
        </h6>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 bg-success text-white min-vh-100" id="sidebar" style="border-left: 15px solid #28a745;">
            <div class="text-center mt-4">
                <img src="../../images/logo.png" class="logo mb-2" style="width: 80px;">
                <h4 class="text-uppercase small">Civil Registry Information<br><span class="lblspan">System</span></h4>
            </div>
            <nav class="nav flex-column mt-5">
                <a class="nav-link text-white" href="../../home.php"><i class="fa fa-clock-o fa-fw"></i> Dashboard</a>
                <a class="nav-link text-white font-weight-bold" href="../files.php"><i class="fa fa-bookmark-o fa-fw"></i> Registration</a>
                <a class="nav-link text-white" data-toggle="modal" href="#myreport"><i class="fa fa-file-o fa-fw"></i> Report</a>
                <a class="nav-link text-white" href="../../employee/view_users.php"><i class="fa fa-user-o fa-fw"></i> Account</a>
                <a class="nav-link text-white" href="../../php/logout.php"><i class="fa fa-eject fa-fw"></i> Logout</a>
            </nav>
        </div>

        <div class="col-md-9 pt-4" id="body">
            <div class="row mb-3">
                <div class="col-md-8">
                    <input class="form-control" id="myInput" type="text" placeholder="Search records...">
                </div>
                <div class="col-md-4">
                    <a class="btn btn-outline-info btn-block" href="birth_cerf.php">Data Entry</a>
                </div>
            </div>

            <div class="table-responsive" style="height:70vh; overflow-y: auto;">
                <table class="table table-hover table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Registry No</th>
                            <th>Name</th>
                            <th>Birthdate</th>
                            <th>Gender</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        require_once 'login_db_birth.php';
                        $conn = new mysqli($hn, $un, $pw, $db);
                        if ($conn->connect_error) die("Connection Failed");

                        $filterYear = $_REQUEST['year'] ?? '';
                        $sql = "SELECT * FROM registration_tbl NATURAL JOIN child_tbl ";
                        if (!empty($filterYear)) {
                            $sql .= " WHERE child_birth_date LIKE '%$filterYear'";
                        }
                        $sql .= " ORDER BY reg_date DESC, reg_time DESC";

                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $rDate = (!empty($row['reg_date']) && $row['reg_date'] != '0000-00-00') ? date("m/d/Y", strtotime($row['reg_date'])) : '';
                            $rTime = (!empty($row['reg_time']) && $row['reg_time'] != '00:00:00') ? date("h:i A", strtotime($row['reg_time'])) : '';
                            $uDate = (!empty($row['update_date']) && $row['update_date'] != '0000-00-00') ? date("m/d/Y", strtotime($row['update_date'])) : 'N/A';
                            $uTime = (!empty($row['update_time']) && $row['update_time'] != '00:00:00') ? date("h:i A", strtotime($row['update_time'])) : '';
                        ?>
                        <tr>
                            <td class="tduser">
                                <?php echo !empty($row['reg_user']) ? $row['reg_user'] : 'SYSTEM'; ?>
                                <br><small class="text-muted">(<?php echo trim("$rDate $rTime"); ?>)</small>
                            </td>
                            <td class="tduser">
                                <?php echo !empty($row['update_user']) ? $row['update_user'] : '---'; ?>
                                <br><small class="text-muted">(<?php echo trim("$uDate $uTime"); ?>)</small>
                            </td>
                            <td><?php echo $row['registry_no']; ?></td>
                            <td class="tduser"><?php echo "{$row['child_lname']}, {$row['child_fname']} {$row['child_mname']}"; ?></td>
                            <td><?php echo $row['child_birth_date']; ?></td>
                            <td><?php echo $row['child_sex']; ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="birth_cerf_edit.php?reg_no=<?php echo $row['no']; ?>" class="btn btn-light btn-sm border">Edit</a>
                                    <a href="birth_delete_action.php?reg_no=<?php echo $row['no']; ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Delete this record permanently?')">Del</a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="time">
<input type="checkbox" id="defaultCheck1" style="display:none">
<input type="checkbox" id="defaultCheck2" style="display:none">

<script src="../../bootstrap4/jquery/jquery-3.3.1.min.js"></script>
<script src="../../bootstrap4/js/bootstrap.min.js"></script>
<script src="../../alertifyjs/alertify.min.js"></script>

<script src="js/btnfile.js"></script>
<script src="js/addbirth.js"></script>

<script>
$(document).ready(function(){
    // Search Filter
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    // Set time field safely
    var timeElem = document.getElementById("time");
    if(timeElem) {
        timeElem.value = new Date().toLocaleTimeString();
    }

    // Label Click Handlers with safety checks
    function toggleChecks(checkToTrue, checkToFalse, labelToUnderline, labelToNormal) {
        var c1 = document.getElementById(checkToTrue);
        var c2 = document.getElementById(checkToFalse);
        if(c1 && c2) {
            c1.checked = true;
            c2.checked = false;
            $(labelToUnderline).css("text-decoration", "underline");
            $(labelToNormal).css("text-decoration", "none");
        }
    }

    $("#defaultCheck1lbl").click(function(){
        toggleChecks("defaultCheck1", "defaultCheck2", "#defaultCheck1lbl", "#defaultCheck2lbl");
    });
    
    $("#defaultCheck2lbl").click(function(){
        toggleChecks("defaultCheck2", "defaultCheck1", "#defaultCheck2lbl", "#defaultCheck1lbl");
    });
});
</script>

<?php include '../../report/report_modal1.php'; ?>

</body>
</html>