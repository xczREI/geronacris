<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRS-Birth Registration (Staff Edit)</title>
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
        input, select { text-transform: uppercase; }
        textarea { text-transform: uppercase; }
        .coll { overflow:scroll; height:50em; }
        #navbar { display: none; }
        @media only screen and (max-width: 768px) {
            #navbar { display: block; display: flex;}
            #topbar { display: none;  }
            #sidebar { display: none; }
            #body { padding-left: 12%; }
            .navbar-collapse { padding: 0; width: 50%; position: absolute; top: 72px; right: 20px; z-index: 1000; }
            .navbar-collapse #nav-link_active, #nav-link { font-size:13px; font-family: century gothic; text-transform: uppercase; color: white; display: block; padding: 10px; transition: all 0.3s ease; letter-spacing: 1px; }
            .coll { overflow:scroll; height:30em; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
  <a class="navbar-brand" href="#">
    <div class="media pl-1 mb-3">
      <div class="media-body">
        <h6 class="text-left mb-3 text-light">
          <img src="../../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
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
		<li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
        <li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="nav-top" id="topbar">
	<div class="media">
	    <h5 class="text-left pt-2 text-uppercase" style="font-family: century gothic;"><i class="fa fa-angle-right"></i> STAFF Account</h5>
	    <div class="media-body">
	      <h6 class="text-right mb-3">
	        <img src="../../images/img_avatar2.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
		    <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
	      </h6>
		</div>
	</div>
</div>

<div class="row" id="row">
  	<div class="col-sm-3 bg-dark" style="border-left: 15px solid;" id="sidebar">
	    <div class="pic" style="margin-top: 2em;">
	        <center><img src="../../images/logo-3.png" class="logo">
	            <h4 class="text-uppercase">Civil Registry<br><span class="lblspan">System</span></h4>
 	       </center>
        </div>
	    <div class="aside" style="margin-top: 3em;">
	      <nav class="navbar">
	        <ul class="navbar-nav" style="padding-bottom:6em;">
	            <li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home_staff.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
	            <li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files_staff.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
	            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
	            <li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
	        </ul>
	      </nav>
	    </div>
  	</div>
  
  	<div class="col-sm-9" style="padding-top: 7%;" id="body">
        <div id="accordion">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <a href="birth_records_staff.php" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Back</a>
                    <button data-toggle="collapse" data-target="#birth_page_1" id="page1" class="btn btn-outline-info">Page 1</button>
                    <button data-toggle="collapse" data-target="#birth_page_2" id="page2" class="btn btn-outline-info">Page 2</button>
                </div>
                <div class="col-sm-2 pr-0">
                    <button type="button" class="btn btn-outline-dark btn-block font-weight-bold" onclick="openLivePreview()">Preview</button>
                </div>
                <div class="col-sm-2 pr-0">
                    <button type="button" class="btn btn-outline-dark btn-block font-weight-bold" data-toggle="modal" data-target="#my1A">Print 1A</button>
                </div>
                <div class="col-sm-2 pr-0">
                    <button type="button" class="btn btn-outline-dark btn-block font-weight-bold" data-toggle="modal" data-target="#my102">Print 102</button>
                </div>
            </div>

    <?php
    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $reg_no = $_GET['reg_no'] ?? '';
    
    // Robust SQL: Using LEFT JOIN so the form loads even if optional tables are empty
    $sql = "SELECT *, registration_tbl.no as no FROM registration_tbl 
            LEFT JOIN child_tbl ON registration_tbl.no = child_tbl.no 
            LEFT JOIN mother_tbl ON registration_tbl.no = mother_tbl.no 
            LEFT JOIN father_tbl ON registration_tbl.no = father_tbl.no 
            LEFT JOIN att_inf_tbl ON registration_tbl.no = att_inf_tbl.no 
            LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no 
            LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no 
            LEFT JOIN admission_paternity_tbl ON registration_tbl.no = admission_paternity_tbl.no 
            LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no 
            WHERE registration_tbl.no = '$reg_no' LIMIT 1";
    
    $result = $conn->query($sql);  
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
?>
<form method="post" action="birth_cerf_update_action_staff.php" id="updatebirth_form" novalidate>
    <input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
    <div id="birth_page_1" class="collapse coll show" data-parent="#accordion">
        <?php include 'birth_page_1_edit.php'; ?>
    </div>
    <div id="birth_page_2" class="collapse coll" data-parent="#accordion">
        <?php include 'birth_page_2_edit.php'; ?>
    </div>
    <br>
    <button type="submit" class="btn btn-info btn-block font-weight-bold" name="birth_update" id="btnadd" style="letter-spacing:5px; font-size:20px;">UPDATE RECORD</button>
    <br>
</form>
<?php 
    } else {
        echo "<div class='alert alert-danger mt-5'>
                <h4><i class='fa fa-exclamation-triangle'></i> Record Not Found</h4>
                <p>Unable to find birth record with ID: <strong>" . htmlspecialchars($reg_no) . "</strong></p>
                <a href='birth_records_staff.php' class='btn btn-outline-danger'>Return to Records</a>
              </div>";
    } 
?>
        </div>
    </div>
</div>

<div class="modal fade" id="livePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document"> 
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title"><i class="fa fa-eye"></i> Staff Preview - Form No. 102</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="livePreviewBody" style="overflow-x: auto; background-color: #f8f9fa;"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php  
    include 'print_form_1A_modal.php';
    include 'print_form_102_modal.php';
    include '../../report/report_modal1_staff.php'; 
?>

<!--Javascript-->
<script src = "../../js/birth_att_inf_2.js"></script>
<script src = "../../js/birth_delayed_gender.js"></script>
<script src = "../../js/birth_late_registry.js"></script>
<script src = "../../js/birth_time_js.js"></script>
<script src = "../../js/input_no_only.js"></script>
<script src = "../../js/input_txt_only.js"></script>
<script src = "../../js/inputs.js"></script>
<script src="../../alertifyjs/alertify.min.js"></script>

<script>
function openLivePreview() {
    var $original1 = $('#birth_page_1');
    var $original2 = $('#birth_page_2');
    var $clone1 = $original1.clone();
    var $clone2 = $original2.clone();
    
    $clone1.find('script').remove();
    $clone2.find('script').remove();
    
    $clone1.removeClass('collapse coll hidden show').css({'display': 'block', 'visibility': 'visible', 'height': 'auto'});
    $clone2.removeClass('collapse coll hidden show').css({'display': 'block', 'visibility': 'visible', 'height': 'auto'});
    
    $('#livePreviewBody').empty().append($clone1).append($clone2);
    $('#livePreviewModal').modal('show');
}
</script>

</body>
</html>