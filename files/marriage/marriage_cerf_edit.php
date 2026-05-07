<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRS-Marriage Registration (Admin Edit)</title>
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
        input, select, textarea { text-transform: uppercase; }
        .coll { overflow:scroll; height:50em; }
        #navbar { display: none; }
        @media only screen and (max-width: 768px) {
            #navbar { display: block; display: flex;}
            #topbar, #sidebar { display: none; }
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
          <img src="../../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
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
		<li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
        <li class="nav-item"><a class="nav-link" id="nav-link" href="../../employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
        <li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
    </ul>
  </div>
</nav>

<div class="nav-top" id="topbar">
	<div class="media">
	    <h5 class="text-left pt-2 text-uppercase" style="font-family: century gothic;"><i class="fa fa-angle-right"></i> ADMIN Account</h5>
	    <div class="media-body">
	      <h6 class="text-right mb-3">
	        <img src="../../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
		    <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?>
	      </h6>
		</div>
	</div>
</div>

<div class="row" id="row">
  	<div class="col-sm-3 bg-success" style="border-left: 15px solid; min-height: 100vh;" id="sidebar">
	    <div class="pic" style="margin-top: 2em;">
	        <center><img src="../../images/logo.png" class="logo">
	            <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
 	       </center>
        </div>
	    <div class="aside" style="margin-top: 3em;">
	      <nav class="navbar">
	        <ul class="navbar-nav" style="padding-bottom:6em;">
	            <li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
	            <li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
	            <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
	            <li class="nav-item"><a class="nav-link" id="nav-link" href="../../employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
	            <li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
	        </ul>
	      </nav>
	    </div>
  	</div>
  
  	<div class="col-sm-9" style="padding-top: 7%;" id="body">
    <?php
    require_once 'login_db_mrg.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $reg_no = $_GET['reg_no'] ?? '';
    $sql = "SELECT registration_tbl.registry_no as registry_no, registration_tbl.no as no, 
            registration_tbl.book_no, registration_tbl.page_no, registration_tbl.province, registration_tbl.municipal,
            husband_tbl.*, wife_tbl.*, marriage_tbl.*, receive_civil_tbl.*, 
            remarks_tbl.*, witness_tbl.*, aff_solemn_tbl.*, late_reg_tbl.*
            FROM registration_tbl 
            LEFT JOIN husband_tbl ON registration_tbl.no = husband_tbl.no
            LEFT JOIN wife_tbl ON registration_tbl.no = wife_tbl.no
            LEFT JOIN marriage_tbl ON registration_tbl.no = marriage_tbl.no
            LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no
            LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no
            LEFT JOIN witness_tbl ON registration_tbl.no = witness_tbl.no
            LEFT JOIN aff_solemn_tbl ON registration_tbl.no = aff_solemn_tbl.no
            LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no
            WHERE registration_tbl.no = '$reg_no' LIMIT 1";
    
    $result = $conn->query($sql);  
    $row = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;

    if($row): ?>
    <div class="container-fluid mb-5">
        <form action="reg_update_action.php" method="POST">
            <input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
            <div class="card shadow">
                <div class="card-header bg-white pb-3 pt-4 border-bottom-0">
                    <div class="row align-items-center">
                        <div class="col-md-3 d-flex align-items-center">
                            <a href="marriage_records.php" class="text-secondary mr-3" style="text-decoration: none; font-size: 14px;">&laquo; Back</a>
                            <a class="btn btn-outline-info btn-sm active mr-2" data-toggle="tab" href="#page1" role="tab" style="border-radius:0;">Page 1</a>
                            <a class="btn btn-outline-info btn-sm" data-toggle="tab" href="#page2" role="tab" style="border-radius:0;">Page 2</a>
                        </div>
                        <div class="col-md-9 d-flex justify-content-between">
                            <button type="button" class="btn btn-light border py-1 font-weight-bold" style="background: white; width: 23%;" onclick="openLivePreview()">Preview</button>
                            <button type="button" class="btn btn-light border py-1" style="background: white; width: 24%; text-align: center; text-decoration: none; color: black; font-size: 13px;" data-toggle="modal" data-target="#my3A">Print Form 3A</button>
                            <button type="button" class="btn btn-light border py-1" style="background: white; width: 24%; text-align: center; text-decoration: none; color: black; font-size: 13px;" data-toggle="modal" data-target="#my97">Print Form 97</button>
                            <button type="button" class="btn btn-light border py-1 font-weight-bold" style="background: white; width: 23%;" data-toggle="modal" data-target="#myreprint">Reprint</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="page1" role="tabpanel">
                            <?php include 'marriage_page_1_edit.php'; ?>
                        </div>
                        <div class="tab-pane fade" id="page2" role="tabpanel">
                            <?php include 'marriage_page_2_edit.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right py-3">
                    <a href="marriage_records.php" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" name="mrg_update" class="btn btn-success px-5 font-weight-bold">SAVE ALL CHANGES</button>
                </div>
            </div>
        </form>
    </div>
    <?php else: ?>
        <div class='alert alert-danger mt-5'>Record Not Found</div>
    <?php endif; ?>
  </div>  
</div>

<?php 
    include 'print_form_3A_modal.php';
    include 'print_form_97_modal.php';
    include 'reprint.php';
    include '../../report/report_modal1.php'; 
?>

<!-- LIVE PREVIEW MODAL -->
<div class="modal fade" id="livePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Live Preview (Data Entry Review)</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="livePreviewBody" style="background-color: #f4f4f4;"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="window.print()"><i class="fa fa-print"></i> Print This Preview</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src = "../../alertifyjs/alertify.min.js"></script>
<script src = "../../js/mrg_cerf_1.js"></script>
<script src = "../../js/mrg_page2.js"></script>
<script src = "../../js/mrg_time_js.js"></script>
<script src = "../../js/input_no_only.js"></script>
<script src = "../../js/input_txt_only.js"></script>
<script src = "../../js/inputs.js"></script>
<script src = "../../js/mrg_aff.js"></script>

<script>
$(document).ready(function(){
    var x = new Date();
    if(document.getElementById("time")) {
        document.getElementById("time").value = x.toLocaleTimeString();
    }
});

function openLivePreview() {
    var $p1 = $('#page1'), $p2 = $('#page2');
    var $c1 = $p1.clone(), $c2 = $p2.clone();
    $([$c1, $c2]).each(function() {
        this.find('script').remove();
        this.removeClass('tab-pane fade show active');
        this.css({'display': 'block', 'visibility': 'visible', 'height': 'auto', 'margin-bottom': '30px'});
        this.find('*').removeAttr('id');
    });
    syncValues($p1, $c1); syncValues($p2, $c2);
    $([$c1, $c2]).each(function() {
        this.find('input, textarea').prop('readonly', true).css({'background-color': 'transparent', 'border': 'none'});
        this.find('select, input[type="checkbox"], input[type="radio"]').prop('disabled', true);
    });
    $('#livePreviewBody').empty().append($c1).append('<hr style="border: 2px dashed #000;">').append($c2);
    $('#livePreviewModal').modal('show');
}

function syncValues($source, $target) {
    $source.find('input, select, textarea').each(function(index) {
        var $srcEl = $(this), $tgtEl = $target.find('input, select, textarea').eq(index);
        if ($srcEl.is(':checkbox, :radio')) $tgtEl.prop('checked', $srcEl.prop('checked'));
        else $tgtEl.val($srcEl.val());
    });
}
</script>
</body>
</html>