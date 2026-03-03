<?php 
include ('logout_session.php'); 
require_once 'login_db_death.php'; 

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

    // 2. PERSON TABLE
    $fname = e($_POST['deceased_fname']);
    $mname = e($_POST['deceased_mname']);
    $lname = e($_POST['deceased_lname']);
    $sex = e($_POST['sex']);
    $dbirth = e($_POST['date_birth']);
    $ddeath = e($_POST['date_of_death']);
    $pdeath = e($_POST['place_of_death']);
    $civil = e($_POST['civil_status']);
    $religion = e($_POST['religion']);
    $citizen = e($_POST['citizenship']);
    $residence = e($_POST['residence']);
    $occupation = e($_POST['occupation']);
    $father = e($_POST['parent_father_name']);
    $mother = e($_POST['parent_mother_name']);

    // Age Logic
    $age_at_death = e($_POST['age_at_death']);
    $age_one_month = e($_POST['age_one_month']);
    $age_one_day = e($_POST['age_one_day']);
    $age_hrs_hrs = e($_POST['age_hrs_hrs']);
    $age_hrs_min = e($_POST['age_hrs_min']);
    
    $age_time = ''; $age_type = ''; $age_min = '';
    if ($age_at_death != '' && $age_at_death != 'N/A') { $age_time = $age_at_death; $age_type = 'YEARS'; }
    elseif ($age_one_month != '' && $age_one_month != 'N/A') { $age_time = $age_one_month; $age_type = 'MONTHS'; $age_min = $age_one_day; }
    elseif ($age_one_day != '' && $age_one_day != 'N/A') { $age_time = $age_one_day; $age_type = 'DAYS'; }
    elseif ($age_hrs_hrs != '' && $age_hrs_hrs != 'N/A') { $age_time = $age_hrs_hrs; $age_type = 'HOURS'; $age_min = $age_hrs_min; }

    $connx->query("UPDATE person_tbl SET first_name='$fname', middle_name='$mname', last_name='$lname', sex='$sex', date_birth='$dbirth', date_death='$ddeath', place_death='$pdeath', civil_status='$civil', religion='$religion', citizen='$citizen', residence='$residence', occupation='$occupation', father_name='$father', mother_name='$mother', age_time_of_death='$age_time', age_type='$age_type', age_day_min='$age_min' WHERE no='$no'");

    // 3. ATTENDANT TABLE
    $att = e($_POST['attendant'] ?? '');
    if($att == 'OTHERS' || $att == '') $att = e($_POST['attendant5'] ?? '');
    $dfrom = e($_POST['date_from']);
    $dto = e($_POST['date_to']);
    $ctype = e($_POST['certify_type'] ?? '');
    $dtime = $_POST['death_time'] ?? ''; // Keep exact time format
    $aname = e($_POST['attendant_name']);
    $apos = e($_POST['attendant_position']);
    $aadd = e($_POST['attendant_address']);
    $rname = e($_POST['reviewed_name']);
    $adate = e($_POST['attendant_date']);
    $rdate = e($_POST['reviewed_date']);
    $connx->query("UPDATE att_rev_tbl SET attendant='$att', date_from='$dfrom', date_to='$dto', certify_type='$ctype', death_time='$dtime', attendant_name='$aname', attendant_position='$apos', attendant_address='$aadd', reviewed_name='$rname', attendant_date='$adate', reviewed_date='$rdate' WHERE no='$no'");

    // 4. AUTOPSY TABLE
    $atx1 = e($_POST['autopsy_txt1']);
    $atx2 = e($_POST['autopsy_txt2']);
    $auname = e($_POST['autopsy_name']);
    $auadd = e($_POST['autopsy_address']);
    $autit = e($_POST['autopsy_title']);
    $audate = e($_POST['autopsy_date']);
    $connx->query("UPDATE autopsy_tbl SET autopsy_txt1='$atx1', autopsy_txt2='$atx2', autopsy_name='$auname', autopsy_address='$auadd', autopsy_title='$autit', autopsy_date='$audate' WHERE no='$no'");

    // 5. CORPSE DISPOSAL TABLE
    $cdisp = e($_POST['corpse_disposal'] ?? ''); 
    $bno = e($_POST['burial_no']);
    $bdate = e($_POST['burial_issued_date']);
    $tno = e($_POST['transfer_no']);
    $tdate = e($_POST['transfer_issued_date']);
    $cem = e($_POST['cemetery']); 
    $munCem = e($_POST['municipalityCemetery'] ?? '');
    $provCem = e($_POST['provinceCemetery'] ?? '');
    if($munCem != '' || $provCem != '') { $cem = trim($cem . ' | ' . $munCem . ' | ' . $provCem); }
    $connx->query("UPDATE corpse_disposal_tbl SET corpse_disposal_type='$cdisp', burial_permit_no='$bno', burial_date_issued='$bdate', transfer_permit_no='$tno', transfer_date_issued='$tdate', cemetery_name_address='$cem' WHERE no='$no'");

    // 6. CAUSE OF DEATH (ADULT)
    $ic = e($_POST['immediate_cause']);
    $ii = e($_POST['immediate_interval']);
    $ac = e($_POST['antecedent_cause']);
    $ai = e($_POST['antecedent_interval']);
    $uc = e($_POST['underlying_cause']);
    $ui = e($_POST['underlying_interval']);
    $oc = e($_POST['other_condition_death']);
    $mc = e($_POST['maternal_condition'] ?? '');
    $dm = e($_POST['death_manner']);
    $pe = e($_POST['place_external_cause']);
    $au = e($_POST['autopsy']);
    $connx->query("UPDATE death_cause_eight_days SET immediate_cause='$ic', immediate_interval='$ii', antecedent_cause='$ac', antecedent_interval='$ai', underlying_cause='$uc', underlying_interval='$ui', other_condition_death='$oc', maternal_condition='$mc', manner_of_death='$dm', place_of_occurrence='$pe', autopsy='$au' WHERE no='$no'");

    // 7. CAUSE OF DEATH (INFANT)
    $ma = e($_POST['mother_age']);
    $dmeth = e($_POST['delivery_method']);
    $pl = e($_POST['pregnancy_length']);
    $bt = e($_POST['birth_type']);
    $mb = e($_POST['multi_birth_was'] ?? '');
    $md = e($_POST['main_disease']);
    $od = e($_POST['other_disease']);
    $mmd = e($_POST['main_maternal_disease'] ?? '');
    $omd = e($_POST['other_maternal_disease'] ?? '');
    $or = e($_POST['other_relevant']);
    $connx->query("UPDATE death_cause_zero_seven SET mother_age='$ma', delivery_method='$dmeth', pregnancy_length='$pl', birth_type='$bt', if_multi_child_was='$mb', main_disease='$md', other_disease='$od', main_maternal_disease='$mmd', other_maternal_disease='$omd', other_relevant='$or' WHERE no='$no'");

    // 8. EMBALMER TABLE
    $etxt = e($_POST['embalmer_txt']);
    $ename = e($_POST['embalmer_name']);
    $eadd = e($_POST['embalmer_address']);
    $etit = e($_POST['embalmer_title']);
    $eno = e($_POST['embalmer_no']);
    $eon = e($_POST['embalmer_on']);
    $eat = e($_POST['embalmer_at']);
    $eexp = e($_POST['embalmer_expdate']);
    $connx->query("UPDATE embalmer_tbl SET embalmer_txt='$etxt', embalmer_name='$ename', embalmer_address='$eadd', embalmer_title='$etit', embalmer_no='$eno', embalmer_on='$eon', embalmer_at='$eat', embalmer_expdate='$eexp' WHERE no='$no'");

    // 9. INFORMANT & PREPARED BY TABLE
    $iname = e($_POST['informant_name']);
    $rel = e($_POST['rel_death']);
    $iadd = e($_POST['informant_address']);
    $pname = e($_POST['prepared_name']);
    $ppos = e($_POST['prepared_position']);
    $idate = e($_POST['informant_date']);
    $pdate = e($_POST['prepared_date']);
    $connx->query("UPDATE inf_pre_tbl SET informant_name='$iname', rel_death='$rel', informant_address='$iadd', prepared_name='$pname', prepared_position='$ppos', informant_date='$idate', prepared_date='$pdate' WHERE no='$no'");

    // 10. LATE REGISTRATION TABLE
    $lname2 = e($_POST['late_name']);
    $ladd = e($_POST['late_address']);
    $dname = e($_POST['death_name']);
    $don = e($_POST['died_on']);
    $din = e($_POST['died_in']);
    $bin = e($_POST['buried_in']);
    $bon = e($_POST['buried_on']);
    $atype = e($_POST['attended_type'] ?? '');
    $aby = e($_POST['attended_by']);
    $ldc = e($_POST['late_death_cause']);
    $lrr = e($_POST['late_reg_reason'] ?? '');
    $sd = e($_POST['sign_day']);
    $sm = e($_POST['sign_month']);
    $sy = e($_POST['sign_year']);
    $sa = e($_POST['sign_at']);
    $aff = e($_POST['affiant_name']);
    $swd = e($_POST['sworn_day']);
    $swm = e($_POST['sworn_month']);
    $swy = e($_POST['sworn_year']);
    $swa = e($_POST['sworn_at']);
    $ctc = e($_POST['ctc']);
    $ion = e($_POST['issued_on']);
    $iat = e($_POST['issued_at']);
    $admn = e($_POST['administer_name']);
    $admp = e($_POST['administer_position']);
    $adma = e($_POST['administer_address']);
    $connx->query("UPDATE late_reg_tbl SET late_name='$lname2', late_address='$ladd', death_name='$dname', died_on='$don', died_in='$din', buried_in='$bin', buried_on='$bon', attended_type='$atype', attended_by='$aby', late_death_cause='$ldc', late_reg_reason='$lrr', sign_day='$sd', sign_month='$sm', sign_year='$sy', sign_at='$sa', affiant_name='$aff', sworn_day='$swd', sworn_month='$swm', sworn_year='$swy', sworn_at='$swa', ctc='$ctc', issued_on='$ion', issued_at='$iat', administer_name='$admn', administer_position='$admp', administer_address='$adma' WHERE no='$no'");

    // 11. RECEIVED & CIVIL REGISTRAR TABLE
    $rcv = e($_POST['received_name']);
    $rpo = e($_POST['received_position']);
    $cvn = e($_POST['civil_name']);
    $cpo = e($_POST['civil_position']);
    $rcd = e($_POST['received_date']);
    $cvd = e($_POST['civil_date']);
    $connx->query("UPDATE receive_civil_tbl SET received_name='$rcv', received_position='$rpo', civil_name='$cvn', civil_position='$cpo', received_date='$rcd', civil_date='$cvd' WHERE no='$no'");

    // 12. REMARKS TABLE
    $rem = e($_POST['remarks']);
    $connx->query("UPDATE remarks_tbl SET remarks='$rem' WHERE no='$no'");

    // Instant pop-up and redirect!
    echo "<script>
        alert('All 12 Tables Successfully Updated!');
        window.location.href = 'death_records.php';
    </script>";
    exit; // Stop the page from loading the form
}


// =========================================================================
// THE "FETCHER" LOGIC (Executes when you just open the page to view it)
// =========================================================================
$id = $_GET['reg_no'] ?? $_GET['id'] ?? ''; 

if (!empty($id)) {
    $sql = "SELECT 
        r.registry_no, r.book_no, r.page_no, r.province AS provinces, r.municipal,
        p.first_name AS deceased_fname, p.middle_name AS deceased_mname, p.last_name AS deceased_lname, 
        p.sex, p.date_birth, p.date_death AS date_of_death, p.place_death AS place_of_death, 
        p.civil_status, p.religion, p.citizen AS citizenship, p.residence, p.occupation, 
        p.father_name AS parent_father_name, p.mother_name AS parent_mother_name,
        p.age_time_of_death, p.age_type, p.age_day_min,
        ar.attendant, ar.date_from, ar.date_to, ar.certify_type, ar.death_time, ar.attendant_name, ar.attendant_position, ar.attendant_address, ar.reviewed_name, ar.attendant_date, ar.reviewed_date,
        au.autopsy_txt1, au.autopsy_txt2, au.autopsy_name, au.autopsy_address, au.autopsy_title, au.autopsy_date,
        cd.corpse_disposal_type AS corpse_disposition, cd.burial_permit_no AS burial_no, cd.burial_date_issued AS burial_issued_date, cd.transfer_permit_no AS transfer_no, cd.transfer_date_issued AS transfer_issued_date, cd.cemetery_name_address AS cemetery,
        dc8.immediate_cause, dc8.immediate_interval, dc8.antecedent_cause, dc8.antecedent_interval, dc8.underlying_cause, dc8.underlying_interval, dc8.other_condition_death, dc8.maternal_condition, dc8.manner_of_death AS death_manner, dc8.place_of_occurrence AS place_external_cause, dc8.autopsy,
        dc0.mother_age, dc0.delivery_method, dc0.pregnancy_length, dc0.birth_type, dc0.if_multi_child_was, dc0.main_disease, dc0.other_disease, dc0.main_maternal_disease, dc0.other_maternal_disease, dc0.other_relevant,
        em.embalmer_txt, em.embalmer_name, em.embalmer_address, em.embalmer_title, em.embalmer_no, em.embalmer_on, em.embalmer_at, em.embalmer_expdate,
        ip.informant_name, ip.rel_death, ip.informant_address, ip.prepared_name, ip.prepared_position, ip.informant_date, ip.prepared_date,
        lr.late_name, lr.late_address, lr.death_name, lr.died_on, lr.died_in, lr.buried_in, lr.buried_on, lr.attended_type, lr.attended_by, lr.late_death_cause, lr.late_reg_reason, lr.sign_day, lr.sign_month, lr.sign_year, lr.sign_at, lr.affiant_name, lr.sworn_day, lr.sworn_month, lr.sworn_year, lr.sworn_at, lr.ctc, lr.issued_on, lr.issued_at, lr.administer_name, lr.administer_position, lr.administer_address,
        rc.received_name, rc.received_position, rc.civil_name, rc.civil_position, rc.received_date, rc.civil_date,
        rm.remarks
    FROM no_tbl n
    LEFT JOIN registration_tbl r ON n.no = r.no
    LEFT JOIN person_tbl p ON n.no = p.no
    LEFT JOIN att_rev_tbl ar ON n.no = ar.no
    LEFT JOIN autopsy_tbl au ON n.no = au.no
    LEFT JOIN corpse_disposal_tbl cd ON n.no = cd.no
    LEFT JOIN death_cause_eight_days dc8 ON n.no = dc8.no
    LEFT JOIN death_cause_zero_seven dc0 ON n.no = dc0.no
    LEFT JOIN embalmer_tbl em ON n.no = em.no
    LEFT JOIN inf_pre_tbl ip ON n.no = ip.no
    LEFT JOIN late_reg_tbl lr ON n.no = lr.no
    LEFT JOIN receive_civil_tbl rc ON n.no = rc.no
    LEFT JOIN remarks_tbl rm ON n.no = rm.no
    WHERE n.no = '$id' OR r.registry_no = '$id' LIMIT 1";

    $result = $connx->query($sql);
    $row = $result->fetch_assoc();
    
    if($row) { 
        // 1. THE PHP DATE TRANSLATOR (For HTML5 Calendars)
        $date_columns = ['date_birth', 'date_of_death', 'date_from', 'date_to', 'attendant_date', 'reviewed_date', 'burial_issued_date', 'transfer_issued_date', 'informant_date', 'prepared_date', 'received_date', 'civil_date', 'autopsy_date', 'embalmer_on', 'embalmer_expdate', 'died_on', 'buried_on', 'issued_on'];
        
        foreach ($date_columns as $col) {
            if (!empty($row[$col]) && $row[$col] != '0000-00-00') {
                $time = strtotime(str_replace('/', '-', trim($row[$col])));
                $row[$col] = ($time !== false) ? date('Y-m-d', $time) : '';
            } else {
                $row[$col] = '';
            }
        }

        // 2. THE PHP TIME TRANSLATOR
        if (!empty($row['death_time'])) {
            $row['death_time'] = date('H:i', strtotime($row['death_time']));
        }

        // 3. CLEAN SEX DROPDOWN
        if(!empty($row['sex'])) {
            $row['sex'] = ucfirst(strtolower(trim($row['sex'])));
        }
		// 4. SPLIT CEMETERY INTO 3 BOXES
        $cemetery_full = $row['cemetery'] ?? '';
        $cem_parts = explode(' | ', $cemetery_full);
        $cemetery_name = $cem_parts[0] ?? $cemetery_full; 
        $cemetery_mun = $cem_parts[1] ?? '';
        $cemetery_prov = $cem_parts[2] ?? '';
    } else {
        $row = [];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>GERONA CRIS-EDIT DEATH RECORD</title>
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
    #navbar{ display: none; }
    @media only screen and (max-width: 768px) {
      #navbar{ display: block; display: flex;}
      #topbar{ display: none;  }
      #sidebar{ display: none; }
      #body{ padding-left: 12%; }
      .navbar-collapse {
        padding: 0; width: 50%; position: absolute; top: 72px; right: 20px; z-index: 1000;
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
  <div class="col-sm-3 bg-success" style="border-left: 15px solid;" id="sidebar">
    <div class="pic" style="margin-top: 2em;">
     <center>
        <img src="../../images/logo.png" class="logo">
        <h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
      </center>
    </div>
    <div class="aside" style="margin-top: 3em;">
      <nav class="navbar">
        <ul class="navbar-nav" style="padding-bottom:6em;">
          <li class="nav-item"><a class="nav-link" href="../../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
          <li class="nav-item"><a class="nav-link active" id="nav-link_active" href="../files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport">&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
          <li class="nav-item"><a class="nav-link" href="../../employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
          <li class="nav-item"><a class="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
        </ul>
      </nav>
    </div>
  </div>

  <div class="col-sm-9" style="padding-top: 7%;" id="body">
    <div class="container-fluid mb-5">
        <form action="" method="POST">
            <input type="hidden" name="no" value="<?php echo $row['no'] ?? $id; ?>">
            <div class="card shadow">
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Death Record: <?php echo $row['deceased_lname'] ?? ''; ?>, <?php echo $row['deceased_fname'] ?? ''; ?></h5>
                    <a href="death_records.php" class="btn btn-sm btn-light">Back to Records</a>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4" id="deathTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font-weight-bold" id="page1-tab" data-toggle="tab" href="#page1" role="tab">PAGE 1 (Main Info)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold" id="page2-tab" data-toggle="tab" href="#page2" role="tab">PAGE 2 (Affidavit/Medical)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="page1" role="tabpanel">
                            <?php include 'death_page_1_edit.php'; ?>
                        </div>
                        <div class="tab-pane fade" id="page2" role="tabpanel">
                            <?php include 'death_page_2_edit.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right py-3">
                    <a href="death_records.php" class="btn btn-secondary mr-2">Cancel</a>
                    <button type="submit" class="btn btn-success px-5 font-weight-bold">SAVE ALL CHANGES</button>
                </div>
            </div>
        </form>
    </div>
  </div>  
</div>

<?php include '../../report/report_modal1.php'; ?>
<script src = "../../alertifyjs/alertify.min.js"></script>
<script>
$(document).ready(function() {
    
    // UNBIND OLD CONFLICTING SCRIPTS
    $("input[name='date_birth'], input[name='date_of_death'], select[name='sex'], select[name='autopsy']").off();
    $("input[name='maternal_condition']").off();

    // 1. Radio Buttons for 19c
    $("input[name='maternal_condition']").on('change', function() {
        if($(this).is(':checked')) {
            $("input[name='maternal_condition']").not(this).prop('checked', false);
        }
    });

    // 2. Smart Age, Infant Locks, and Maternal Locks
    function runSmartLogic() {
        var birthVal = $("input[name='date_birth']").val();
        var deathVal = $("input[name='date_of_death']").val();
        var allAgeFields = $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day'], input[name='age_hrs_hrs'], input[name='age_hrs_min']");

        if (birthVal && deathVal) {
            var dob = new Date(birthVal);
            var dod = new Date(deathVal);
            if (dod >= dob) {
                var years = dod.getFullYear() - dob.getFullYear();
                var months = dod.getMonth() - dob.getMonth();
                var days = dod.getDate() - dod.getDate();
                if (days < 0) { months--; days += new Date(dod.getFullYear(), dod.getMonth(), 0).getDate(); }
                if (months < 0) { years--; months += 12; }

                allAgeFields.val('').prop('readonly', false).css('background-color', '#fff');

                if (years >= 1) {
                    $("input[name='age_at_death']").val(years);
                    $("input[name='age_one_month'], input[name='age_one_day'], input[name='age_hrs_hrs'], input[name='age_hrs_min']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                } else if (months > 0 || days > 0) {
                    $("input[name='age_one_month']").val(months);
                    $("input[name='age_one_day']").val(days);
                    $("input[name='age_at_death'], input[name='age_hrs_hrs'], input[name='age_hrs_min']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                } else if (years === 0 && months === 0 && days === 0) {
                    $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                }
            }
        }

        var yrs = parseInt($("input[name='age_at_death']").val()) || 0;
        var mos = parseInt($("input[name='age_one_month']").val()) || 0;
        var dys = parseInt($("input[name='age_one_day']").val()) || 0;
        
        var infantFields = ['mother_age', 'delivery_method', 'pregnancy_length', 'birth_type', 'multi_birth_was', 'main_disease', 'other_disease', 'main_maternal_disease', 'other_maternal_disease', 'other_relevant'];
        var adultFields = ['immediate_cause', 'immediate_interval', 'antecedent_cause', 'antecedent_interval', 'underlying_cause', 'underlying_interval', 'other_condition_death'];

        if (yrs > 0 || mos > 0 || dys > 7) {
            infantFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
            adultFields.forEach(function(f) { var el = $("input[name='" + f + "']"); if (el.prop('readonly')) { el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); } });
        } else {
            infantFields.forEach(function(f) { var el = $("input[name='" + f + "']"); if (el.prop('readonly')) { el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); } });
            adultFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
        }

        var sex = $("select[name='sex']").val() || "";
        var maternalCheckboxes = $("input[name='maternal_condition']");
        if (sex.toUpperCase() === 'FEMALE' && yrs >= 15 && yrs <= 49) {
            maternalCheckboxes.prop('disabled', false);
            $("#none_choices").css('pointer-events', 'auto');
            if ($("#none_choices").data('auto-checked')) { $("#none_choices").prop('checked', false); $("#none_choices").data('auto-checked', false); }
        } else {
            maternalCheckboxes.prop('disabled', true).prop('checked', false);
            $("#none_choices").prop('disabled', false).prop('checked', true).css('pointer-events', 'none');
            $("#none_choices").data('auto-checked', true);
        }
    }

    // 3. Sync to Page 2 Affidavit
    function syncToPage2() {
        var fname = $("input[name='deceased_fname']").val() || "";
        var mname = $("input[name='deceased_mname']").val() || "";
        var lname = $("input[name='deceased_lname']").val() || "";
        $("input[name='death_name']").val((fname + " " + mname + " " + lname).replace(/\s+/g, ' ').trim());
        $("input[name='died_on']").val($("input[name='date_of_death']").val());
        $("input[name='died_in']").val($("input[name='place_of_death']").val());
        var informant = $("input[name='informant_name']").val() || "";
        $("input[name='late_name'], input[name='affiant_name']").val(informant);
        $("input[name='late_address']").val($("input[name='informant_address']").val() || "");
    }

    // 4. Autopsy Toggle
    function toggleAutopsyFields() {
        var autopsySelect = $("select[name='autopsy']").val() || "";
        var autopsyFields = ['autopsy_txt1', 'autopsy_txt2', 'autopsy_name', 'autopsy_date', 'autopsy_title', 'autopsy_address'];
        if (autopsySelect.toUpperCase() === 'NO') {
            autopsyFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
        } else {
            autopsyFields.forEach(function(f) { var el = $("input[name='" + f + "']"); el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); });
        }
    }

    // Bind triggers to instantly fire when typing or clicking
    $("select[name='sex']").on('change', runSmartLogic);
    $("select[name='autopsy']").on('change', toggleAutopsyFields);
    $("input[name='date_birth'], input[name='date_of_death']").on('change', function() { runSmartLogic(); syncToPage2(); });
    $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day'], input[name='deceased_fname'], input[name='deceased_mname'], input[name='deceased_lname'], input[name='place_of_death'], input[name='informant_name'], input[name='informant_address']").on('keyup change', function() { runSmartLogic(); syncToPage2(); });

    // Fire everything instantly on load
    runSmartLogic();
    syncToPage2();
    toggleAutopsyFields();
});
</script>

<script>
$(document).ready(function() {
    
    // UNBIND OLD CONFLICTING SCRIPTS
    $("input[name='date_birth'], input[name='date_of_death'], select[name='sex'], select[name='autopsy']").off();
    $("input[name='maternal_condition']").off();

    // 1. Radio Buttons for 19c
    $("input[name='maternal_condition']").on('change', function() {
        if($(this).is(':checked')) {
            $("input[name='maternal_condition']").not(this).prop('checked', false);
        }
    });

    // 2. Smart Age, Infant Locks, and Maternal Locks
    function runSmartLogic() {
        // ... (Keep your existing runSmartLogic code exactly as it is) ...
        var birthVal = $("input[name='date_birth']").val();
        var deathVal = $("input[name='date_of_death']").val();
        var allAgeFields = $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day'], input[name='age_hrs_hrs'], input[name='age_hrs_min']");

        if (birthVal && deathVal) {
            var dob = new Date(birthVal);
            var dod = new Date(deathVal);
            if (dod >= dob) {
                var years = dod.getFullYear() - dob.getFullYear();
                var months = dod.getMonth() - dob.getMonth();
                var days = dod.getDate() - dod.getDate();
                if (days < 0) { months--; days += new Date(dod.getFullYear(), dod.getMonth(), 0).getDate(); }
                if (months < 0) { years--; months += 12; }

                allAgeFields.val('').prop('readonly', false).css('background-color', '#fff');

                if (years >= 1) {
                    $("input[name='age_at_death']").val(years);
                    $("input[name='age_one_month'], input[name='age_one_day'], input[name='age_hrs_hrs'], input[name='age_hrs_min']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                } else if (months > 0 || days > 0) {
                    $("input[name='age_one_month']").val(months);
                    $("input[name='age_one_day']").val(days);
                    $("input[name='age_at_death'], input[name='age_hrs_hrs'], input[name='age_hrs_min']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                } else if (years === 0 && months === 0 && days === 0) {
                    $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                }
            }
        }

        var yrs = parseInt($("input[name='age_at_death']").val()) || 0;
        var mos = parseInt($("input[name='age_one_month']").val()) || 0;
        var dys = parseInt($("input[name='age_one_day']").val()) || 0;
        
        var infantFields = ['mother_age', 'delivery_method', 'pregnancy_length', 'birth_type', 'multi_birth_was', 'main_disease', 'other_disease', 'main_maternal_disease', 'other_maternal_disease', 'other_relevant'];
        var adultFields = ['immediate_cause', 'immediate_interval', 'antecedent_cause', 'antecedent_interval', 'underlying_cause', 'underlying_interval', 'other_condition_death'];

        if (yrs > 0 || mos > 0 || dys > 7) {
            infantFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
            adultFields.forEach(function(f) { var el = $("input[name='" + f + "']"); if (el.prop('readonly')) { el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); } });
        } else {
            infantFields.forEach(function(f) { var el = $("input[name='" + f + "']"); if (el.prop('readonly')) { el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); } });
            adultFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
        }

        var sex = $("select[name='sex']").val() || "";
        var maternalCheckboxes = $("input[name='maternal_condition']");
        if (sex.toUpperCase() === 'FEMALE' && yrs >= 15 && yrs <= 49) {
            maternalCheckboxes.prop('disabled', false);
            $("#none_choices").css('pointer-events', 'auto');
            if ($("#none_choices").data('auto-checked')) { $("#none_choices").prop('checked', false); $("#none_choices").data('auto-checked', false); }
        } else {
            maternalCheckboxes.prop('disabled', true).prop('checked', false);
            $("#none_choices").prop('disabled', false).prop('checked', true).css('pointer-events', 'none');
            $("#none_choices").data('auto-checked', true);
        }
    }

    // 3. Sync to Page 2 Affidavit
    function syncToPage2() {
        // ... (Keep your existing syncToPage2 code exactly as it is) ...
        var fname = $("input[name='deceased_fname']").val() || "";
        var mname = $("input[name='deceased_mname']").val() || "";
        var lname = $("input[name='deceased_lname']").val() || "";
        $("input[name='death_name']").val((fname + " " + mname + " " + lname).replace(/\s+/g, ' ').trim());
        $("input[name='died_on']").val($("input[name='date_of_death']").val());
        $("input[name='died_in']").val($("input[name='place_of_death']").val());
        var informant = $("input[name='informant_name']").val() || "";
        $("input[name='late_name'], input[name='affiant_name']").val(informant);
        $("input[name='late_address']").val($("input[name='informant_address']").val() || "");
    }

    // 4. Autopsy Toggle
    function toggleAutopsyFields() {
        // ... (Keep your existing toggleAutopsyFields code exactly as it is) ...
        var autopsySelect = $("select[name='autopsy']").val() || "";
        var autopsyFields = ['autopsy_txt1', 'autopsy_txt2', 'autopsy_name', 'autopsy_date', 'autopsy_title', 'autopsy_address'];
        if (autopsySelect.toUpperCase() === 'NO') {
            autopsyFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
        } else {
            autopsyFields.forEach(function(f) { var el = $("input[name='" + f + "']"); el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); });
        }
    }

    // Bind triggers to instantly fire when typing or clicking
    $("select[name='sex']").on('change', runSmartLogic);
    $("select[name='autopsy']").on('change', toggleAutopsyFields);
    $("input[name='date_birth'], input[name='date_of_death']").on('change', function() { runSmartLogic(); syncToPage2(); });
    $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day'], input[name='deceased_fname'], input[name='deceased_mname'], input[name='deceased_lname'], input[name='place_of_death'], input[name='informant_name'], input[name='informant_address']").on('keyup change', function() { runSmartLogic(); syncToPage2(); });

    // Fire everything instantly on load so logic applies to the pulled data
    runSmartLogic();
    syncToPage2();
    toggleAutopsyFields();

    // =======================================================================
    // NEW MAGIC: HIDE DATA AND POP IT ON FOCUS
    // =======================================================================

    // 1. Hide the values immediately after the page loads and the logic runs
    $('form input:not([type="hidden"]):not([type="submit"]):not([type="checkbox"]):not([type="radio"]), form select').each(function() {
        var originalValue = $(this).val();
        
        // Don't hide 'N/A' from disabled/locked fields so the user knows they are locked
        if (originalValue !== 'N/A' && !$(this).prop('readonly')) {
            $(this).attr('data-old-val', originalValue); // Save it secretly
            $(this).val(''); // Wipe the box clean visually
        }
    });

   // 2. When the user presses ENTER in a box, pop the old data back in AND jump to next box
    $('form').on('keydown', 'input, select', function(e) {
        // Check if the key pressed is the Enter key
        if (e.key === 'Enter' || e.keyCode === 13) {
            e.preventDefault(); // CRITICAL: Stop the form from submitting/saving

            // 1. Reveal the hidden data if the box is empty and not locked
            if ($(this).val() === '' && !$(this).prop('readonly')) {
                var oldData = $(this).attr('data-old-val');
                if (oldData !== undefined) {
                    $(this).val(oldData);
                    $(this).trigger('change'); // Alert your smart logic that data was added
                }
            }

            // 2. Find all form fields that you can actually type in (visible, not locked/disabled)
            var $focusable = $(this).closest('form').find('input, select, textarea').filter(':visible:not([readonly]):not([disabled])');
            var currentIndex = $focusable.index(this);
            var nextIndex = currentIndex + 1;

            // 3. Move the cursor to the next available field
            if (nextIndex < $focusable.length) {
                $focusable.eq(nextIndex).focus();
            }
        }
    });

    // 3. SAFETY NET: When saving, put all untouched old data back into the empty boxes
    $('form').on('submit', function() {
        $(this).find('input, select').each(function() {
            if ($(this).val() === '') {
                var oldData = $(this).attr('data-old-val');
                if (oldData !== undefined) {
                    $(this).val(oldData);
                }
            }
        });
    });

});
</script>
</body>
</html>