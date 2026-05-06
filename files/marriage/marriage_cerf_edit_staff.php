<?php 
include ('logout_session.php'); 
require_once 'login_db_mrg.php'; 

// 1. DATABASE CONNECTION
$connx = new mysqli($hn, $un, $pw, $db);
if ($connx->connect_error) die($connx->connect_error);

// =========================================================================
// THE "SAVER" LOGIC (Executes ONLY when you click "Save All Changes")
// =========================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['no'])) {
    $no = $connx->real_escape_string($_POST['no']);
    
    // Helper function to clean, uppercase, and safely escape data for the database
    function e($val) {
        global $connx;
        return $connx->real_escape_string(strtoupper(trim($val ?? '')));
    }

    try {
        $connx->begin_transaction();

        // 1. REGISTRATION TABLE
        $book_no = e($_POST['book_no']);
        $page_no = e($_POST['page_no']);
        $registry_no = e($_POST['registry_no']);
        $provinces = e($_POST['provinces']);
        $municipal = e($_POST['municipal']);
        $update_user = e($_SESSION['firstname'].' '.$_SESSION['lastname']);
        $update_date = date('Y-m-d');
        $update_time = date('H:i:s');
        
        $connx->query("UPDATE registration_tbl SET book_no='$book_no', page_no='$page_no', registry_no='$registry_no', province='$provinces', municipal='$municipal', update_user='$update_user', update_date='$update_date', update_time='$update_time' WHERE no='$no'");

        // 2. HUSBAND TABLE
        $h_fname = e($_POST['husband_fname']);
        $h_mname = e($_POST['husband_mname']);
        $h_lname = e($_POST['husband_lname']);
        $h_bday = e($_POST['husband_bday']);
        $h_bmonth = e($_POST['husband_bmonth']);
        $h_byear = e($_POST['husband_byear']);
        $h_age = e($_POST['husband_age']);
        $h_bplace = e($_POST['husband_bplace']);
        $h_bplace_p = e($_POST['husband_bplaceProvince']);
        $h_bplace_c = e($_POST['husband_bplaceCountry']);
        $h_res = e($_POST['husband_residence']);
        $h_rel = e($_POST['husband_religion']);
        $h_cit = e($_POST['husband_citizen']);
        $h_cs = e($_POST['husband_cstatus']);
        $h_fa = e($_POST['h_fa_name']);
        $h_fa_m = e($_POST['h_fa_nameM']);
        $h_fa_l = e($_POST['h_fa_nameL']);
        $h_mo = e($_POST['h_mo_name']);
        $h_mo_m = e($_POST['h_mo_nameM']);
        $h_mo_l = e($_POST['h_mo_nameL']);
        $h_p_name = e($_POST['h_person_name']);
        $h_p_m = e($_POST['h_person_nameM']);
        $h_p_l = e($_POST['h_person_nameL']);
        $h_p_rel = e($_POST['h_person_rel']);
        $h_p_res = e($_POST['h_person_residence']);

        $connx->query("UPDATE husband_tbl SET husband_fname='$h_fname', husband_mname='$h_mname', husband_lname='$h_lname', husband_bday='$h_bday', husband_bmonth='$h_bmonth', husband_byear='$h_byear', husband_age='$h_age', husband_bplace='$h_bplace', husband_bplaceProvince='$h_bplace_p', husband_bplaceCountry='$h_bplace_c', husband_residence='$h_res', husband_religion='$h_rel', husband_citizen='$h_cit', husband_cstatus='$h_cs', h_fa_name='$h_fa', h_fa_nameM='$h_fa_m', h_fa_nameL='$h_fa_l', h_mo_name='$h_mo', h_mo_nameM='$h_mo_m', h_mo_nameL='$h_mo_l', h_person_name='$h_p_name', h_person_nameM='$h_p_m', h_person_nameL='$h_p_l', h_person_rel='$h_p_rel', h_person_residence='$h_p_res' WHERE no='$no'");

        // 3. WIFE TABLE
        $w_fname = e($_POST['wife_fname']);
        $w_mname = e($_POST['wife_mname']);
        $w_lname = e($_POST['wife_lname']);
        $w_bday = e($_POST['wife_bday']);
        $w_bmonth = e($_POST['wife_bmonth']);
        $w_byear = e($_POST['wife_byear']);
        $w_age = e($_POST['wife_age']);
        $w_bplace = e($_POST['wife_bplace']);
        $w_bplace_p = e($_POST['wife_bplaceProvince']);
        $w_bplace_c = e($_POST['wife_bplaceCountry']);
        $w_res = e($_POST['wife_residence']);
        $w_rel = e($_POST['wife_religion']);
        $w_cit = e($_POST['wife_citizen']);
        $w_cs = e($_POST['wife_cstatus']);
        $w_fa = e($_POST['w_fa_name']);
        $w_fa_m = e($_POST['w_fa_nameM']);
        $w_fa_l = e($_POST['w_fa_nameL']);
        $w_mo = e($_POST['w_mo_name']);
        $w_mo_m = e($_POST['w_mo_nameM']);
        $w_mo_l = e($_POST['w_mo_nameL']);
        $w_p_name = e($_POST['w_person_name']);
        $w_p_m = e($_POST['w_person_nameM']);
        $w_p_l = e($_POST['w_person_nameL']);
        $w_p_rel = e($_POST['w_person_rel']);
        $w_p_res = e($_POST['w_person_residence']);

        $connx->query("UPDATE wife_tbl SET wife_fname='$w_fname', wife_mname='$w_mname', wife_lname='$w_lname', wife_bday='$w_bday', wife_bmonth='$w_bmonth', wife_byear='$w_byear', wife_age='$w_age', wife_bplace='$w_bplace', wife_bplaceProvince='$w_bplace_p', wife_bplaceCountry='$w_bplace_c', wife_residence='$w_res', wife_religion='$w_rel', wife_citizen='$w_cit', wife_cstatus='$w_cs', w_fa_name='$w_fa', w_fa_nameM='$w_fa_m', w_fa_nameL='$w_fa_l', w_mo_name='$w_mo', w_mo_nameM='$w_mo_m', w_mo_nameL='$w_mo_l', w_person_name='$w_p_name', w_person_nameM='$w_p_m', w_person_nameL='$w_p_l', w_person_rel='$w_p_rel', w_person_residence='$w_p_res' WHERE no='$no'");

        // 4. MARRIAGE TABLE
        $m_brgy = e($_POST['mrg_brgy']);
        $m_city = e($_POST['mrg_city']);
        $m_prov = e($_POST['mrg_province']);
        $m_date = e($_POST['mrg_date']);
        $m_time = $_POST['mrg_time'] ?? '';
        $h_name = e($_POST['husband_name']);
        $w_name = e($_POST['wife_name']);
        $c_type = e($_POST['certify_type'] ?? '');
        $m_days = e($_POST['mrg_days']);
        $m_months = e($_POST['mrg_months']);
        $m_years = e($_POST['mrg_years']);
        $s_type = e($_POST['mrg_solemn_type'] ?? '');
        $s_no = e($_POST['mrg_license_no']);
        $s_on = e($_POST['mrg_license_on']);
        $s_at = e($_POST['mrg_license_at']);
        $s_art = e($_POST['no_license_art']);
        $s_name = e($_POST['mrg_solemn_name']);
        $s_pos = e($_POST['mrg_solemn_position']);
        $s_oth = e($_POST['mrg_solemn_other']);

        $connx->query("UPDATE marriage_tbl SET mrg_brgy='$m_brgy', mrg_city='$m_city', mrg_province='$m_prov', mrg_date='$m_date', mrg_time='$m_time', mrg_husband_name='$h_name', mrg_wife_name='$w_name', mrg_certify_type='$c_type', mrg_cerf_day='$m_days', mrg_cerf_month='$m_months', mrg_cerf_year='$m_years', mrg_solemn_type='$s_type', mrg_license_no='$s_no', mrg_issued_on='$s_on', mrg_issued_at='$s_at', mrg_under_art='$s_art', mrg_solemn_name='$s_name', mrg_solemn_position='$s_pos', mrg_solemn_other='$s_oth' WHERE no='$no'");

        // 5. RECEIVE CIVIL TABLE
        $rec_name = e($_POST['received_name']);
        $rec_pos = e($_POST['received_position']);
        $rec_date = e($_POST['received_date']);
        $civ_name = e($_POST['civil_name']);
        $civ_pos = e($_POST['civil_position']);
        $civ_date = e($_POST['civil_date']);

        $connx->query("UPDATE receive_civil_tbl SET received_name='$rec_name', received_position='$rec_pos', received_date='$rec_date', civil_name='$civ_name', civil_position='$civ_pos', civil_date='$civ_date' WHERE no='$no'");

        // 6. WITNESS TABLE
        $w1 = e($_POST['witness1']);
        $w2 = e($_POST['witness2']);
        $w3 = e($_POST['witness3']);
        $w4 = e($_POST['witness4']);
        $connx->query("UPDATE witness_tbl SET witness1='$w1', witness2='$w2', witness3='$w3', witness4='$w4' WHERE no='$no'");

        // 7. REMARKS TABLE
        $rem = e($_POST['remarks']);
        $connx->query("UPDATE remarks_tbl SET remarks='$rem' WHERE no='$no'");

        // 8. LATE REG TABLE
        $l_aff = e($_POST['late_affiant_name']);
        $l_s_day = e($_POST['late_sworn_day']);
        $l_s_mon = e($_POST['late_sworn_month']);
        $l_s_yea = e($_POST['late_sworn_year']);
        $l_s_at = e($_POST['late_sworn_at']);
        $l_ctc = e($_POST['late_ctc']);
        $l_i_on = e($_POST['late_issued_on']);
        $l_i_at = e($_POST['late_issued_at']);
        $l_adm = e($_POST['late_administer_name']);
        $l_pos = e($_POST['late_administer_position']);
        $l_add = e($_POST['late_administer_address']);

        $connx->query("UPDATE late_reg_tbl SET affiant_name='$l_aff', sworn_day='$l_s_day', sworn_month='$l_s_mon', sworn_year='$l_s_yea', sworn_at='$l_s_at', ctc='$l_ctc', issued_on='$l_i_on', issued_at='$l_i_at', administer_name='$l_adm', administer_position='$l_pos', administer_address='$l_add' WHERE no='$no'");

        $connx->commit();
        echo "<script>window.onload = function() { alertify.success('SUCCESS: Record Updated Successfully'); }</script>";
    } catch (Exception $e) {
        $connx->rollback();
        echo "<script>window.onload = function() { alertify.error('ERROR: ' + " . json_encode($e->getMessage()) . "); }</script>";
    }
}

// =========================================================================
// THE "FETCHER" LOGIC (Executes when you just open the page to view it)
// =========================================================================
$id = $_GET['reg_no'] ?? $_GET['id'] ?? $_GET['no'] ?? ''; 

if (!empty($id)) {
    $sql = "SELECT 
        r.registry_no, r.book_no, r.page_no, r.province AS provinces, r.municipal,
        h.*, w.*, m.*, rc.*, rm.remarks, wi.*, a.*, lr.*,
        n.no
    FROM no_tbl n
    LEFT JOIN registration_tbl r ON n.no = r.no
    LEFT JOIN husband_tbl h ON n.no = h.no
    LEFT JOIN wife_tbl w ON n.no = w.no
    LEFT JOIN marriage_tbl m ON n.no = m.no
    LEFT JOIN receive_civil_tbl rc ON n.no = rc.no
    LEFT JOIN remarks_tbl rm ON n.no = rm.no
    LEFT JOIN witness_tbl wi ON n.no = wi.no
    LEFT JOIN aff_solemn_tbl a ON n.no = a.no
    LEFT JOIN late_reg_tbl lr ON n.no = lr.no
    WHERE n.no = '$id' OR r.registry_no = '$id' LIMIT 1";

    $result = $connx->query($sql);
    if (!$result) die ("Database access failed: " . $connx->error);
    $row = $result->fetch_assoc();
    
    if(!$row) { 
        echo "<div class='alert alert-warning text-center mt-4'>No record found for ID: " . htmlspecialchars($id) . "</div>";
        $row = [];
    }
} else {
    echo "<div class='alert alert-warning text-center mt-4'>No ID provided.</div>";
    $row = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRS-Marriage Registration (Staff Edit)</title>
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
  	<div class="col-sm-3 bg-dark" style="border-left: 15px solid; min-height: 100vh;" id="sidebar">
	    <div class="pic" style="margin-top: 2em;">
	        <center><img src="../../images/logo-3.png" class="logo">
	            <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
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
    <?php if(!empty($row)): ?>
    <div class="container-fluid mb-5">
        <form action="" method="POST">
            <input type="hidden" name="no" value="<?php echo $row['no']; ?>">
            <div class="card shadow">
                <div class="card-header bg-white pb-3 pt-4 border-bottom-0">
                    <div class="row align-items-center">
                        <div class="col-md-3 d-flex align-items-center">
                            <a href="marriage_records_staff.php" class="text-secondary mr-3" style="text-decoration: none; font-size: 14px;">&laquo; Back</a>
                            <a class="btn btn-outline-info btn-sm active mr-2" data-toggle="tab" href="#page1" role="tab" style="border-radius:0;">Page 1</a>
                            <a class="btn btn-outline-info btn-sm" data-toggle="tab" href="#page2" role="tab" style="border-radius:0;">Page 2</a>
                        </div>
                        <div class="col-md-9 d-flex justify-content-between">
                            <button type="button" class="btn btn-light border py-1 font-weight-bold" style="background: white; width: 32%;" onclick="openLivePreview()">Preview</button>
                            <a href="print_3A.php?no=<?php echo $row['no']; ?>" target="_blank" class="btn btn-light border py-1" style="background: white; width: 32%; text-align: center; text-decoration: none; color: black; font-size: 13px;">Print Form No. 3A</a>
                            <a href="print_97.php?no=<?php echo $row['no']; ?>" target="_blank" class="btn btn-light border py-1" style="background: white; width: 32%; text-align: center; text-decoration: none; color: black; font-size: 13px;">Print Form No. 97</a>
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
                    <a href="marriage_records_staff.php" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" name="mrg_update" class="btn btn-info px-5 font-weight-bold">SAVE ALL CHANGES</button>
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
    include '../../report/report_modal1_staff.php'; 
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