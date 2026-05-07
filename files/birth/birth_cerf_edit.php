<?php 
include ('logout_session.php'); 
require_once 'login_db_birth.php'; 

// 1. DATABASE CONNECTION
mysqli_report(MYSQLI_REPORT_OFF); 
$connx = new mysqli($hn, $un, $pw, $db);
if ($connx->connect_error) die($connx->connect_error);

$save_report = [];

// =========================================================================
// THE "SAVER" LOGIC
// =========================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reg_no'])) {
    $reg_no = $connx->real_escape_string($_POST['reg_no']);
    
    function e($val) {
        global $connx;
        return $connx->real_escape_string(strtoupper(trim($val ?? '')));
    }

    $registry_no = e($_POST['registry_no']);
    $book_no = !empty($_POST['book_no']) ? (int)$_POST['book_no'] : 0;
    $page_no = !empty($_POST['page_no']) ? (int)$_POST['page_no'] : 0;
    $province = e($_POST['provinces']);
    $municipal = e($_POST['municipals']);
    $u_date = date("Y-m-d");
    $u_time = date("H:i:s");
    $u_name = e(($_SESSION['firstname'] ?? '') . ' ' . ($_SESSION['lastname'] ?? ''));

    // Marriage Logic
    $raw_marriage = $_POST['marriage_date'] ?? '';
    $clean_marriage = strtoupper(trim($raw_marriage));
    $marriage_date_sql = "NULL";
    if (!empty($clean_marriage) && !in_array($clean_marriage, ['NOT MARRIED', 'NOT APPLICABLE', 'N/A', 'NONE', 'UNKNOWN'])) {
        $ts = strtotime($raw_marriage);
        if ($ts) $marriage_date_sql = "'" . date("Y-m-d", $ts) . "'";
        else $marriage_date_sql = "'" . $connx->real_escape_string($raw_marriage) . "'";
    } else if ($clean_marriage != '') {
        $marriage_date_sql = "'" . $connx->real_escape_string($clean_marriage) . "'";
    }
    $marriage_place = e($_POST['marriage_place']);

    // Attendant Type Logic
    $att_type = "";
    if (!empty($_POST['attendant1'])) $att_type = 'Physician';
    else if (!empty($_POST['attendant2'])) $att_type = 'Nurse';
    else if (!empty($_POST['attendant3'])) $att_type = 'Midwife';
    else if (!empty($_POST['attendant4'])) $att_type = 'Hilot';
    else $att_type = e($_POST['attendant5'] ?? '');

    $att_add = e(trim(($_POST['attendant_address1'] ?? '') . ' ' . ($_POST['attendant_address2'] ?? '')));
    
    // Table names to ensure rows exist (SELECT check to avoid duplicates)
    $tables = ['no_tbl', 'registration_tbl', 'child_tbl', 'mother_tbl', 'father_tbl', 'att_inf_tbl', 'receive_civil_tbl', 'remarks_tbl', 'admission_paternity_tbl', 'late_reg_tbl'];
    foreach($tables as $tbl) {
        $res = $connx->query("SELECT 1 FROM $tbl WHERE no = '$reg_no'");
        if ($res && $res->num_rows == 0) {
            $connx->query("INSERT INTO $tbl (no, registry_no) VALUES ('$reg_no', '$registry_no')");
        }
    }

    // Define all table updates
    $updates = [
        "Master Info" => "UPDATE registration_tbl SET registry_no='$registry_no', book_no=$book_no, page_no=$page_no, province='$province', municipal='$municipal', update_date='$u_date', update_time='$u_time', update_user='$u_name' WHERE no='$reg_no'",
        "Child Data" => "UPDATE child_tbl SET registry_no='$registry_no', child_lname='".e($_POST['child_lname'])."', child_fname='".e($_POST['child_fname'])."', child_mname='".e($_POST['child_mname'])."', child_sex='".e($_POST['sex'])."', child_birth_date='".((!empty($_POST['birth_day'])) ? date("Y-m-d", strtotime($_POST['birth_day'])) : '')."', birth_brgy='".e($_POST['birth_brgy'])."', birth_municipal='".e($_POST['birth_city'])."', birth_province='".e($_POST['birth_province'])."', birth_type='".e($_POST['birth_type'])."', if_multi_birth_was='".e($_POST['multi_birth_was'])."', birth_order='".e($_POST['birth_order'])."', birth_weight='".e($_POST['birth_weight'])."' WHERE no='$reg_no'",
        "Mother Data" => "UPDATE mother_tbl SET registry_no='$registry_no', mother_lname='".e($_POST['mother_lname'])."', mother_fname='".e($_POST['mother_fname'])."', mother_mname='".e($_POST['mother_mname'])."', mother_citizen='".e($_POST['mother_citizen'])."', mother_religion='".e($_POST['mother_sect'])."', mother_brgy='".e($_POST['mother_brgy'])."', mother_municipal='".e($_POST['mother_city'])."', mother_province='".e($_POST['mother_province'])."', mother_country='".e($_POST['mother_country'])."', mother_occupation='".e($_POST['mother_occupation'])."', mother_age='".e($_POST['mother_age'])."', ttl_no_child='".e($_POST['ttl_no_child'])."', no_child_dead='".e($_POST['no_child_dead'])."', no_child_alive='".e($_POST['no_child_alive'])."', marriage_date=$marriage_date_sql, marriage_place='$marriage_place' WHERE no='$reg_no'",
        "Father Data" => "UPDATE father_tbl SET registry_no='$registry_no', father_lname='".e($_POST['father_lname'])."', father_fname='".e($_POST['father_fname'])."', father_mname='".e($_POST['father_mname'])."', father_age='".e($_POST['father_age'])."', father_religion='".e($_POST['father_sect'])."', father_citizen='".e($_POST['father_citizen'])."', father_brgy='".e($_POST['father_brgy'])."', father_municipal='".e($_POST['father_city'])."', father_province='".e($_POST['father_province'])."', father_country='".e($_POST['father_country'])."', father_occupation='".e($_POST['father_occupation'])."', marriage_date=$marriage_date_sql, marriage_place='$marriage_place' WHERE no='$reg_no'",
        "Section 21 (Attendant)" => "UPDATE att_inf_tbl SET registry_no='$registry_no', attendant_type='$att_type', birth_time='".e($_POST['birth_time'])."', attendant_name='".e($_POST['attendant_name'])."', attendant_position='".e($_POST['attendant_position'])."', attendant_address='$att_add', informant_name='".e($_POST['informant_name'])."', rel_child='".e($_POST['rel_child'])."', informant_address='".e($_POST['informant_address'])."', prepared_name='".e($_POST['prepared_name'])."', prepared_position='".e($_POST['prepared_position'])."', attendant_date='".e($_POST['attendant_date'])."', informant_date='".e($_POST['informant_date'])."', prepared_date='".e($_POST['prepared_date'])."' WHERE no='$reg_no'",
        "Section 24 (Receipt)" => "UPDATE receive_civil_tbl SET registry_no='$registry_no', received_name='".e($_POST['received_name'])."', received_position='".e($_POST['received_position'])."', received_date='".e($_POST['received_date'])."', civil_name='".e($_POST['civil_name'])."', civil_position='".e($_POST['civil_position'])."', civil_date='".e($_POST['civil_date'])."' WHERE no='$reg_no'",
        "Remarks" => "UPDATE remarks_tbl SET registry_no='$registry_no', remarks='".e($_POST['remarks'])."' WHERE no='$reg_no'",
        "Paternity (Page 2)" => "UPDATE admission_paternity_tbl SET registry_no='$registry_no', father_name='".e($_POST['father_name'])."', mother_name='".e($_POST['mother_name'])."', child_name='".e($_POST['child_name'])."', birth_date='".e($_POST['birth_date'])."', birth_place='".e($_POST['birth_place'])."', sworn_day='".(int)($_POST['ack_sworn_day'] ?? 0)."', sworn_month='".(int)($_POST['ack_sworn_month'] ?? 0)."', sworn_year='".(int)($_POST['ack_sworn_year'] ?? 0)."', child_gender='".e($_POST['birth_gender'])."', ctc='".e($_POST['ack_ctc'])."', issued_on='".e($_POST['ack_issued_on'])."', issued_at='".e($_POST['ack_issued_at'])."', administer_name='".e($_POST['ack_sworn_name'])."', administer_position='".e($_POST['ack_sworn_position'])."', administer_address='".e($_POST['ack_sworn_address'])."' WHERE no='$reg_no'",
        "Late Reg (Page 2)" => "UPDATE late_reg_tbl SET registry_no='$registry_no', late_name='".e($_POST['late_name'])."', late_address='".e($_POST['late_address'])."', late_birth_type='".e($_POST['late_birth_type'])."', late_birth_of='".e($_POST['late_birth_of'])."', late_birth_in='".e($_POST['late_birth_in'] ?: $_POST['late_birth_in2'])."', late_birth_on='".e($_POST['late_birth_on'] ?: $_POST['late_birth_on2'])."', attend_birth_by='".e($_POST['attend_birth_by'])."', who_resides_at='".e($_POST['who_resides_at'])."', late_citizen='".e($_POST['late_citizen'])."', married_type='".e($_POST['married_type'])."', married_on='".e($_POST['married_on'])."', married_at='".e($_POST['married_at'])."', not_married_name='".e($_POST['not_married_name'])."', late_reg_reason='".e(trim(($_POST['late_reason_1'] ?? '') . ' ' . ($_POST['late_reason_2'] ?? '')))."', applicant_only='".e($_POST['applicant_only'])."', applicant_than_owner='".e($_POST['applicant_than_owner'])."', sign_day='".(int)($_POST['sign_day'] ?? 0)."', sign_month='".(int)($_POST['sign_month'] ?? 0)."', sign_year='".(int)($_POST['sign_year'] ?? 0)."', sign_at='".e($_POST['sign_at'])."', affiant_name='".e($_POST['affiant_name'])."', late_sworn_day='".(int)($_POST['late_sworn_day'] ?? 0)."', late_sworn_month='".(int)($_POST['late_sworn_month'] ?? 0)."', late_sworn_year='".(int)($_POST['late_sworn_year'] ?? 0)."', late_sworn_at='".e($_POST['late_sworn_at'])."', late_ctc='".e($_POST['late_ctc'])."', late_issued_on='".e($_POST['late_issued_on'])."', late_issued_at='".e($_POST['late_issued_at'])."', late_administer_name='".e($_POST['late_sworn_name'])."', late_administer_position='".e($_POST['late_sworn_position'])."', late_administer_address='".e($_POST['late_sworn_address'])."' WHERE no='$reg_no'",
        "ID Mapping" => "UPDATE no_tbl SET registry_no='$registry_no' WHERE no='$reg_no'"
    ];

    foreach ($updates as $label => $sql) {
        if ($connx->query($sql)) {
            $save_report[] = "OK: $label";
        } else {
            $save_report[] = "FAIL: $label (" . $connx->error . ")";
        }
    }

    $report_body = implode("<br>", $save_report);
    echo "<script>window.onload = function() { 
        alertify.alert('Save Report', '$report_body', function(){
            window.location.href = 'birth_cerf_edit.php?reg_no=" . $reg_no . "';
        }); 
    }</script>";
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
    <title>CRS-Birth Registration (Admin Edit)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../images/logo.png">
    <link rel="stylesheet" type="text/css" href="../../bootstrap4/css/bootstrap.min.css"/>
    <script src="../../bootstrap4/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="../../bootstrap4/popper/popper.min.js"></script>
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

<nav class="navbar navbar-expand-md bg-success navbar-dark" id="navbar">
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
    <?php if(!empty($row)): ?>
    <div class="container-fluid mb-5">
        <form action="" method="POST">
            <input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
            <div class="card shadow">
                <div class="card-header bg-white pb-3 pt-4 border-bottom-0">
                    <div class="row align-items-center">
                        <div class="col-md-3 d-flex align-items-center">
                            <a href="birth_records.php" class="text-secondary mr-3" style="text-decoration: none; font-size: 14px;">&laquo; Back</a>
                            <button type="button" class="btn btn-outline-info btn-sm active mr-2" data-toggle="tab" data-target="#page1" role="tab" id="page1_btn" style="border-radius:0;">Page 1</button>
                            <button type="button" class="btn btn-outline-info btn-sm" data-toggle="tab" data-target="#page2" role="tab" id="page2_btn" style="border-radius:0;" onclick="if(typeof saveToMemory === 'function') saveToMemory()">Page 2</button>
                        </div>
                        <div class="col-md-9 d-flex justify-content-between">
                            <button type="button" class="btn btn-light border py-1 font-weight-bold" style="background: white; width: 23%;" onclick="openLivePreview()">Preview</button>
                            <button type="button" class="btn btn-light border py-1" style="background: white; width: 24%; text-align: center; text-decoration: none; color: black; font-size: 13px;" data-toggle="modal" data-target="#my1A">Print Form 1A</button>
                            <button type="button" class="btn btn-light border py-1" style="background: white; width: 24%; text-align: center; text-decoration: none; color: black; font-size: 13px;" data-toggle="modal" data-target="#my102">Print Form 102</button>
                            <button type="button" class="btn btn-light border py-1 font-weight-bold" style="background: white; width: 23%;" data-toggle="modal" data-target="#myreprint">Reprint</button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="page1" role="tabpanel">
                            <?php include 'birth_page_1_edit.php'; ?>
                        </div>
                        <div class="tab-pane" id="page2" role="tabpanel">
                            <?php include 'birth_page_2_edit.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right py-3">
                    <a href="birth_records.php" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" name="birth_update" class="btn btn-success px-5 font-weight-bold">SAVE ALL CHANGES</button>
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
<script src = "../../js/birth_att_inf_2.js"></script>
<script src = "../../js/birth_delayed_gender.js"></script>
<script src = "../../js/birth_late_registry.js"></script>
<script src = "../../js/input_no_only.js"></script>
<script src = "../../js/input_txt_only.js"></script>
<script src = "../../js/inputs.js"></script>

<script>
$(document).ready(function(){
    // Manual Tab Trigger Fix (Updated for reliability)
    $('#page1_btn, #page2_btn').on('click', function (e) {
        e.preventDefault();
        var target = $(this).data('target');
        
        // Update Buttons
        $('#page1_btn, #page2_btn').removeClass('active');
        $(this).addClass('active');
        
        // Update Tab Panes
        $('.tab-pane').removeClass('active show');
        $(target).addClass('active show');
        
        // Trigger Bootstrap's shown event for compatibility with other scripts
        $(this).trigger({
            type: 'shown.bs.tab',
            relatedTarget: $('#page1_btn, #page2_btn').not(this)[0]
        });
    });
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

function submitToPrint(targetUrl, modalId) {
    try {
        console.log("Starting Live Print for: " + modalId + " to " + targetUrl);
        
        var $modalForm = $('#' + modalId).find('form');
        if (!$modalForm.length) {
            alert("Error: Modal form not found!");
            return;
        }

        // 1. Clear previous live data
        $modalForm.find('.live-data-field').remove();
        
        // 2. Set Action and Target
        $modalForm.attr('action', targetUrl);
        $modalForm.attr('target', '_blank');
        
        // 3. Add required triggers
        $modalForm.append('<input type="hidden" name="is_live_print" value="1" class="live-data-field">');
        $modalForm.append('<input type="hidden" name="print" value="1" class="live-data-field">');
        
        // 4. Locate the main edit form
        var $mainForm = $('#body').find('form').first();
        if (!$mainForm.length) $mainForm = $('form').first();

        // 5. Clone all data from the main form into the modal form
        $mainForm.find('input, select, textarea').each(function() {
            var name = $(this).attr('name');
            if (name && name !== 'print') {
                var val = $(this).val();
                if ($(this).is(':checkbox, :radio')) {
                    if ($(this).is(':checked')) {
                        $modalForm.append($('<input type="hidden" class="live-data-field">').attr('name', name).val(val));
                    }
                } else {
                    $modalForm.append($('<input type="hidden" class="live-data-field">').attr('name', name).val(val));
                }
            }
        });

        // 6. Hard-capture specific fields
        var attType = "";
        if ($('#physician').is(':checked')) attType = "Physician";
        else if ($('#nurse').is(':checked')) attType = "Nurse";
        else if ($('#midwife').is(':checked')) attType = "Midwife";
        else if ($('#hilot').is(':checked')) attType = "Hilot";
        else if ($('#others').is(':checked')) attType = $('#otherstxt').val();
        $modalForm.append('<input type="hidden" name="attendant_type_live" value="' + attType + '" class="live-data-field">');
        
        var gender = $('input[name="birth_gender"]:checked').val() || "";
        $modalForm.append('<input type="hidden" name="birth_gender" value="' + gender + '" class="live-data-field">');

        $modalForm.append('<input type="hidden" name="married_type" value="' + ($('#hidden_married_type').val() || '') + '" class="live-data-field">');
        $modalForm.append('<input type="hidden" name="married_type2" value="' + ($('#hidden_married_type2').val() || '') + '" class="live-data-field">');

        var cName = ($('#child_fname').val() || '') + " " + ($('#child_mname').val() || '') + " " + ($('#child_lname').val() || '');
        $modalForm.append('<input type="hidden" name="child_name" value="' + cName.trim() + '" class="live-data-field">');

        // 7. FINAL SUBMIT
        $modalForm.submit();
        
    } catch (e) {
        console.error("submitToPrint Error:", e);
        alert("Print Error: " + e.message);
    }
}
</script>
</body>
</html>