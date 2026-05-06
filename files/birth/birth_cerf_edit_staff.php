<?php 
include ('logout_session.php'); 
require_once 'login_db_birth.php'; 

// 1. DATABASE CONNECTION
$connx = new mysqli($hn, $un, $pw, $db);
if ($connx->connect_error) die($connx->connect_error);

// =========================================================================
// THE "SAVER" LOGIC (Executes ONLY when you click "Save All Changes")
// =========================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg_no'])) {
    $reg_no = $connx->real_escape_string($_POST['reg_no']);
    
    // Helper function
    function e($val) {
        global $connx;
        return $connx->real_escape_string(strtoupper(trim($val ?? '')));
    }

    try {
        $connx->begin_transaction();

        $registry_no = e($_POST['registry_no']);
        $book_no = !empty($_POST['book_no']) ? (int)$_POST['book_no'] : 0;
        $page_no = !empty($_POST['page_no']) ? (int)$_POST['page_no'] : 0;
        $province = e($_POST['provinces']);
        $municipal = e($_POST['municipals']);
        $u_date = date("Y-m-d");
        $u_time = $_POST['time'] ?? date("H:i:s");
        $u_name = e($_SESSION['firstname'].' '.$_SESSION['lastname']);

        // Child
        $child_lname = e($_POST['child_lname']);
        $child_fname = e($_POST['child_fname']);
        $child_mname = e($_POST['child_mname']);
        $child_sex = e($_POST['sex']);
        $raw_bd = $_POST['birth_day'] ?? '';
        $child_birth_date = (!empty($raw_bd)) ? date("Y-m-d", strtotime($raw_bd)) : '';
        $birth_brgy = e($_POST['birth_brgy']);
        $birth_city = e($_POST['birth_city']);
        $birth_province = e($_POST['birth_province']);
        $birth_type = e($_POST['birth_type']);
        $multi_birth_was = e($_POST['multi_birth_was']);
        $birth_order = e($_POST['birth_order']);
        $birth_weight = e($_POST['birth_weight']);

        // Mother
        $mother_lname = e($_POST['mother_lname']);
        $mother_fname = e($_POST['mother_fname']);
        $mother_mname = e($_POST['mother_mname']);
        $mother_citizen = e($_POST['mother_citizen']);
        $mother_sect = e($_POST['mother_sect']);
        $ttl_no_child = e($_POST['ttl_no_child']);
        $no_child_alive = e($_POST['no_child_alive']);
        $no_child_dead = e($_POST['no_child_dead']);
        $mother_occupation = e($_POST['mother_occupation']);
        $mother_age = e($_POST['mother_age']);
        $mother_brgy = e($_POST['mother_brgy']);
        $mother_city = e($_POST['mother_city']);
        $mother_province = e($_POST['mother_province']);
        $mother_country = e($_POST['mother_country']);

        // Father
        $father_lname = e($_POST['father_lname']);
        $father_fname = e($_POST['father_fname']);
        $father_mname = e($_POST['father_mname']);
        $father_citizen = e($_POST['father_citizen']);
        $father_sect = e($_POST['father_sect']);
        $father_occupation = e($_POST['father_occupation']);
        $father_age = e($_POST['father_age']);
        $father_brgy = e($_POST['father_brgy']);
        $father_city = e($_POST['father_city']);
        $father_province = e($_POST['father_province']);
        $father_country = e($_POST['father_country']);

        // Marriage
        $raw_marriage = $_POST['marriage_date'] ?? '';
        $clean_marriage = strtoupper(trim($raw_marriage));
        $marriage_date_sql = "NULL";
        if (!empty($clean_marriage) && !in_array($clean_marriage, ['NOT MARRIED', 'NOT APPLICABLE', 'N/A', 'NONE'])) {
            $ts = strtotime($raw_marriage);
            if ($ts) $marriage_date_sql = "'" . date("Y-m-d", $ts) . "'";
            else $marriage_date_sql = "'" . $connx->real_escape_string($raw_marriage) . "'";
        } else if ($clean_marriage != '') {
            $marriage_date_sql = "'" . $connx->real_escape_string($clean_marriage) . "'";
        }
        $marriage_place = e($_POST['marriage_place']);

        // Attendant / Informant
        $att_type = $_POST['attendant'] ?? e($_POST['attendant5'] ?? '');
        $att_add = e(trim(($_POST['attendant_address1'] ?? '') . ' ' . ($_POST['attendant_address2'] ?? '')));
        $birth_time = e($_POST['birth_time']);
        $att_name = e($_POST['attendant_name']);
        $att_pos = e($_POST['attendant_position']);
        $inf_name = e($_POST['informant_name']);
        $rel_child = e($_POST['rel_child']);
        $inf_add = e($_POST['informant_address']);
        $pre_name = e($_POST['prepared_name']);
        $pre_pos = e($_POST['prepared_position']);
        $att_date = e($_POST['attendant_date']);
        $inf_date = e($_POST['informant_date']);
        $pre_date = e($_POST['prepared_date']);

        // Civil
        $rec_name = e($_POST['received_name']);
        $rec_pos = e($_POST['received_position']);
        $civ_name = e($_POST['civil_name']);
        $civ_pos = e($_POST['civil_position']);
        $rec_date = e($_POST['received_date']);
        $civ_date = e($_POST['civil_date']);
        $rem = e($_POST['remarks']);

        // Paternity
        $pat_f = e($_POST['father_name']);
        $pat_m = e($_POST['mother_name']);
        $pat_c = e($_POST['child_name']);
        $pat_bd = e($_POST['birth_date']);
        $pat_bp = e($_POST['birth_place']);
        $ack_day = (int)($_POST['ack_sworn_day'] ?? 0);
        $ack_mon = (int)($_POST['ack_sworn_month'] ?? 0);
        $ack_yea = (int)($_POST['ack_sworn_year'] ?? 0);
        $ack_gen = e($_POST['birth_gender']);
        $ack_ctc = e($_POST['ack_ctc']);
        $ack_on = e($_POST['ack_issued_on']);
        $ack_at = e($_POST['ack_issued_at']);
        $ack_s_n = e($_POST['ack_sworn_name']);
        $ack_s_p = e($_POST['ack_sworn_position']);
        $ack_s_a = e($_POST['ack_sworn_address']);

        // Late Reg
        $l_name = e($_POST['late_name']);
        $l_add = e($_POST['late_address']);
        $l_type = e($_POST['late_birth_type']);
        $l_in = e($_POST['late_birth_in'] ?: $_POST['late_birth_in2']);
        $l_on = e($_POST['late_birth_on'] ?: $_POST['late_birth_on2']);
        $l_of = e($_POST['late_birth_of']);
        $l_by = e($_POST['attend_birth_by']);
        $l_res = e($_POST['who_resides_at']);
        $l_cit = e($_POST['late_citizen']);
        $l_m_t = e($_POST['married_type']);
        $l_m_o = e($_POST['married_on']);
        $l_m_a = e($_POST['married_at']);
        $l_nm_n = e($_POST['not_married_name']);
        $l_reas = e(trim(($_POST['late_reason_1'] ?? '') . ' ' . ($_POST['late_reason_2'] ?? '')));
        $l_app1 = e($_POST['applicant_only']);
        $l_app2 = e($_POST['applicant_than_owner']);
        $l_s_d = (int)($_POST['sign_day'] ?? 0);
        $l_s_m = (int)($_POST['sign_month'] ?? 0);
        $l_s_y = (int)($_POST['sign_year'] ?? 0);
        $l_s_at = e($_POST['sign_at']);
        $l_aff = e($_POST['affiant_name']);
        $ls_d = (int)($_POST['late_sworn_day'] ?? 0);
        $ls_m = (int)($_POST['late_sworn_month'] ?? 0);
        $ls_y = (int)($_POST['late_sworn_year'] ?? 0);
        $ls_at = e($_POST['late_sworn_at']);
        $ls_ctc = e($_POST['late_ctc']);
        $ls_on = e($_POST['late_issued_on']);
        $ls_iat = e($_POST['late_issued_at']);
        $ls_n = e($_POST['late_sworn_name']);
        $ls_p = e($_POST['late_sworn_position']);
        $ls_a = e($_POST['late_sworn_address']);

        // UPDATES
        $connx->query("UPDATE registration_tbl SET registry_no='$registry_no', book_no=$book_no, page_no=$page_no, province='$province', municipal='$municipal', update_date='$u_date', update_time='$u_time', update_user='$u_name' WHERE no='$reg_no'");
        $connx->query("UPDATE child_tbl SET registry_no='$registry_no', child_lname='$child_lname', child_fname='$child_fname', child_mname='$child_mname', child_sex='$child_sex', child_birth_date='$child_birth_date', birth_brgy='$birth_brgy', birth_municipal='$birth_city', birth_province='$birth_province', birth_type='$birth_type', if_multi_birth_was='$multi_birth_was', birth_order='$birth_order', birth_weight='$birth_weight' WHERE no='$reg_no'");
        $connx->query("UPDATE mother_tbl SET registry_no='$registry_no', mother_lname='$mother_lname', mother_fname='$mother_fname', mother_mname='$mother_mname', mother_citizen='$mother_citizen', mother_religion='$mother_sect', mother_brgy='$mother_brgy', mother_municipal='$mother_city', mother_province='$mother_province', mother_country='$mother_country', mother_occupation='$mother_occupation', mother_age='$mother_age', ttl_no_child='$ttl_no_child', no_child_dead='$no_child_dead', no_child_alive='$no_child_alive', marriage_date=$marriage_date_sql, marriage_place='$marriage_place' WHERE no='$reg_no'");
        $connx->query("UPDATE father_tbl SET registry_no='$registry_no', father_lname='$father_lname', father_fname='$father_fname', father_mname='$father_mname', father_age='$father_age', father_religion='$father_sect', father_citizen='$father_citizen', father_brgy='$father_brgy', father_municipal='$father_city', father_province='$father_province', father_country='$father_country', father_occupation='$father_occupation', marriage_date=$marriage_date_sql, marriage_place='$marriage_place' WHERE no='$reg_no'");
        $connx->query("UPDATE att_inf_tbl SET registry_no='$registry_no', attendant_type='$att_type', birth_time='$birth_time', attendant_name='$att_name', attendant_position='$att_pos', attendant_address='$att_add', informant_name='$inf_name', rel_child='$rel_child', informant_address='$inf_add', prepared_name='$pre_name', prepared_position='$pre_pos', attendant_date='$att_date', informant_date='$inf_date', prepared_date='$pre_date' WHERE no='$reg_no'");
        $connx->query("UPDATE receive_civil_tbl SET registry_no='$registry_no', received_name='$rec_name', received_position='$rec_pos', received_date='$rec_date', civil_name='$civ_name', civil_position='$civ_pos', civil_date='$civ_date' WHERE no='$reg_no'");
        $connx->query("UPDATE remarks_tbl SET registry_no='$registry_no', remarks='$rem' WHERE no='$reg_no'");
        $connx->query("UPDATE admission_paternity_tbl SET registry_no='$registry_no', father_name='$pat_f', mother_name='$pat_m', child_name='$pat_c', birth_date='$pat_bd', birth_place='$pat_bp', sworn_day=$ack_day, sworn_month=$ack_mon, sworn_year=$ack_yea, child_gender='$ack_gen', ctc='$ack_ctc', issued_on='$ack_on', issued_at='$ack_at', administer_name='$ack_s_n', administer_position='$ack_s_p', administer_address='$ack_s_a' WHERE no='$reg_no'");
        $connx->query("UPDATE late_reg_tbl SET registry_no='$registry_no', late_name='$l_name', late_address='$l_add', late_birth_type='$l_type', late_birth_of='$l_of', late_birth_in='$l_in', late_birth_on='$l_on', attend_birth_by='$l_by', who_resides_at='$l_res', late_citizen='$l_cit', married_type='$l_m_t', married_on='$l_m_o', married_at='$l_m_a', not_married_name='$l_nm_n', late_reg_reason='$l_reas', applicant_only='$l_app1', applicant_than_owner='$l_app2', sign_day=$l_s_d, sign_month=$l_s_m, sign_year=$l_s_y, sign_at='$l_s_at', affiant_name='$l_aff', late_sworn_day=$ls_d, late_sworn_month=$ls_m, late_sworn_year=$ls_y, late_sworn_at='$ls_at', late_ctc='$ls_ctc', late_issued_on='$ls_on', late_issued_at='$ls_iat', late_administer_name='$ls_n', late_administer_position='$ls_p', late_administer_address='$ls_a' WHERE no='$reg_no'");
        $connx->query("UPDATE no_tbl SET registry_no='$registry_no' WHERE no='$reg_no'");

        $connx->commit();
        echo "<script>window.onload = function() { alertify.success('SUCCESS: Record Updated Successfully'); }</script>";
    } catch (Exception $e) {
        $connx->rollback();
        echo "<script>window.onload = function() { alertify.error('ERROR: ' + " . json_encode($e->getMessage()) . "); }</script>";
    }
}

// FETCH
$id = $_GET['reg_no'] ?? $_GET['id'] ?? $_GET['no'] ?? ''; 
if (!empty($id)) {
    $sql = "SELECT r.registry_no, r.book_no, r.page_no, r.province AS provinces, r.municipal,
            c.*, m.*, f.*, ai.*, rc.*, rm.remarks, ap.*, lr.*, n.no
            FROM no_tbl n
            LEFT JOIN registration_tbl r ON n.no = r.no
            LEFT JOIN child_tbl c ON n.no = c.no
            LEFT JOIN mother_tbl m ON n.no = m.no
            LEFT JOIN father_tbl f ON n.no = f.no
            LEFT JOIN att_inf_tbl ai ON n.no = ai.no
            LEFT JOIN receive_civil_tbl rc ON n.no = rc.no
            LEFT JOIN remarks_tbl rm ON n.no = rm.no
            LEFT JOIN admission_paternity_tbl ap ON n.no = ap.no
            LEFT JOIN late_reg_tbl lr ON n.no = lr.no
            WHERE n.no = '$id' OR r.registry_no = '$id' LIMIT 1";
    $result = $connx->query($sql);
    $row = $result ? $result->fetch_assoc() : [];
} else {
    $row = [];
}
?>
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
            <input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
            <div class="card shadow">
                <div class="card-header bg-white pb-3 pt-4 border-bottom-0">
                    <div class="row align-items-center">
                        <div class="col-md-3 d-flex align-items-center">
                            <a href="birth_records_staff.php" class="text-secondary mr-3" style="text-decoration: none; font-size: 14px;">&laquo; Back</a>
                            <a class="btn btn-outline-info btn-sm active mr-2" data-toggle="tab" href="#page1" role="tab" style="border-radius:0;">Page 1</a>
                            <a class="btn btn-outline-info btn-sm" data-toggle="tab" href="#page2" role="tab" style="border-radius:0;">Page 2</a>
                        </div>
                        <div class="col-md-9 d-flex justify-content-between">
                            <button type="button" class="btn btn-light border py-1 font-weight-bold" style="background: white; width: 32%;" onclick="openLivePreview()">Preview</button>
                            <a href="print_1A.php?no=<?php echo $row['no']; ?>" target="_blank" class="btn btn-light border py-1" style="background: white; width: 32%; text-align: center; text-decoration: none; color: black; font-size: 13px;">Print Form No. 1A</a>
                            <a href="print_102.php?no=<?php echo $row['no']; ?>" target="_blank" class="btn btn-light border py-1" style="background: white; width: 32%; text-align: center; text-decoration: none; color: black; font-size: 13px;">Print Form No. 102</a>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="page1" role="tabpanel">
                            <?php include 'birth_page_1_edit.php'; ?>
                        </div>
                        <div class="tab-pane fade" id="page2" role="tabpanel">
                            <?php include 'birth_page_2_edit.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right py-3">
                    <a href="birth_records_staff.php" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" name="birth_update" class="btn btn-info px-5 font-weight-bold">SAVE ALL CHANGES</button>
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
    include 'print_form_1A_modal.php';
    include 'print_form_102_modal.php';
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
<script src = "../../js/birth_att_inf_2.js"></script>
<script src = "../../js/birth_delayed_gender.js"></script>
<script src = "../../js/birth_late_registry.js"></script>
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
        $(this).find('script').remove();
        $(this).removeClass('tab-pane fade show active');
        $(this).css({'display': 'block', 'visibility': 'visible', 'height': 'auto', 'margin-bottom': '30px'});
        $(this).find('*').removeAttr('id');
    });
    syncValues($p1, $c1); syncValues($p2, $c2);
    $([$c1, $c2]).each(function() {
        $(this).find('input, textarea').prop('readonly', true).css({'background-color': 'transparent', 'border': 'none'});
        $(this).find('select, input[type="checkbox"], input[type="radio"]').prop('disabled', true);
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