<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>GERONA CRIS-DASHBOARD</title>
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
    	input, textarea, select{ text-transform: uppercase; }
	    #navbar{ display: none; }
	    .coll{ overflow:scroll; height:50em; }
	    @media only screen and (max-width: 768px) {
		  #navbar{ display: block; display: flex;}
	      #topbar{ display: none;  }
	      #sidebar{ display: none; }
	      #body{ padding-left: 12%; }
	      .navbar-collapse {
	        padding: 0; width: 50%; position: absolute; top: 72px; right: 20px; z-index: 1000;
	      }
	      .navbar-collapse #nav-link_active, #nav-link{ 
	        font-size:13px; font-family: century gothic; text-transform: uppercase; color: white; display: block; padding: 10px; transition: all 0.3s ease; letter-spacing: 1px;
	      }
	      .coll{ overflow:scroll; height:30em; }
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
          <?php } else if ($type == 'Staff') { ?>
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
  		<h5 class="text-left pt-2 text-uppercase" style="font-family: century gothic;"><i class="fa fa-angle-right"></i> <?php echo $_SESSION['type']; ?> Account</h5>
	    <div class="media-body">
	      <h6 class="text-right mb-3">
		    <?php $type = $_SESSION['type']; if ($type == 'Admin') { ?>
	            <img src="../../images/img_avatar3.png" class="mr-3 mt-0 rounded-circle" style="width:40px;">
	        <?php } else if ($type == 'Staff') { ?>
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
  		<div id="accordion">
	  		<button data-toggle="collapse" data-target="#death_page_1" id="page1" class="btn btn-outline-info">Page 1</button>
			<button data-toggle="collapse" data-target="#death_page_2" id="page2" class="btn btn-outline-info">Page 2</button>
			<a href="death_records.php" class="btn btn-outline-info">View Records</a>

			<form method="post" action="reg_info_action1.php" id="adddeath_form">
				<div id="death_page_1" class="collapse coll show" data-parent="#accordion">
				<?php include 'death_page_1.php'; ?>
				</div>
		  		<div id="death_page_2" class="collapse coll" data-parent="#accordion">
	    		<?php include 'death_page_2.php'; ?>
		  		</div>
		  		<br>
		     	<button type="submit" class="btn btn-info btn-block" name="add_death" id="btn_add" style="font-weight:bold; letter-spacing:5px; font-size:20px;">SAVE</button>
		     	<br>
			</form>
		</div>
  	</div>
</div>

<?php include '../../report/report_modal1.php'; ?>
<script src="../../alertifyjs/alertify.min.js"></script>

<script>
$(document).ready(function() {
    
    // 1. UNBIND OLD CONFLICTING SCRIPTS
    $("input[name='date_birth'], input[name='date_of_death'], select[name='sex'], select[name='autopsy']").off();
    $("input[name='maternal_condition']").off();

    // 2. MAKE CHECKBOXES ACT LIKE RADIO BUTTONS
    $("input[name='maternal_condition']").on('change', function() {
        if($(this).is(':checked')) {
            $("input[name='maternal_condition']").not(this).prop('checked', false);
        }
    });

    // 3. SMART LOGIC - BULLETPROOF DATE MATH
    function runSmartLogic() {
        var birthVal = $("input[name='date_birth']").val();
        var deathVal = $("input[name='date_of_death']").val();
        var allAgeFields = $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day'], input[name='age_hrs_hrs'], input[name='age_hrs_min']");

        if (birthVal && deathVal) {
            // Safely split the HTML5 dates to avoid Timezone bugs
            var bParts = birthVal.split('-');
            var dParts = deathVal.split('-');
            var dob = new Date(bParts[0], bParts[1] - 1, bParts[2]);
            var dod = new Date(dParts[0], dParts[1] - 1, dParts[2]);
            
            if (dod >= dob) {
                var years = dod.getFullYear() - dob.getFullYear();
                var months = dod.getMonth() - dob.getMonth();
                var days = dod.getDate() - dob.getDate();
                
                // Math fix to calculate exact days lived across month boundaries
                if (days < 0) { 
                    months--; 
                    var prevMonthDate = new Date(dod.getFullYear(), dod.getMonth(), 0); 
                    days += prevMonthDate.getDate(); 
                }
                if (months < 0) { years--; months += 12; }

                // Clear all boxes to white before applying locks
                allAgeFields.val('').prop('readonly', false).css('background-color', '#fff');

                // THE AGE ROUTER
                if (years >= 1) {
                    // ADULT (1 Year or Older)
                    $("input[name='age_at_death']").val(years);
                    $("input[name='age_one_month'], input[name='age_one_day'], input[name='age_hrs_hrs'], input[name='age_hrs_min']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                } else if (years === 0 && months === 0 && days === 0) {
                    // NEWBORN (Under 24 Hours old)
                    $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                } else {
                    // INFANT (e.g., 0 Months, 15 Days)
                    $("input[name='age_at_death']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                    $("input[name='age_one_month']").val(months);
                    $("input[name='age_one_day']").val(days);
                    $("input[name='age_hrs_hrs'], input[name='age_hrs_min']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef');
                }

                // BULLETPROOF LOCKOUT LOGIC: Uses pure math to see if older than 7 days
                var timeDiff = dod.getTime() - dob.getTime();
                var daysDiff = Math.floor(timeDiff / (1000 * 3600 * 24)); 

                var infantFields = ['mother_age', 'delivery_method', 'pregnancy_length', 'birth_type', 'multi_birth_was', 'main_disease', 'other_disease', 'main_maternal', 'other_maternal', 'other_relevant'];
                var adultFields = ['immediate_cause', 'immediate_interval', 'antecedent_cause', 'antecedent_interval', 'underlying_cause', 'underlying_interval', 'other_condition_death'];

                if (daysDiff > 7) {
                    // Lock out Infant Section
                    infantFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
                    adultFields.forEach(function(f) { var el = $("input[name='" + f + "']"); if (el.prop('readonly')) { el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); } });
                } else {
                    // Lock out Adult Section
                    adultFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
                    infantFields.forEach(function(f) { var el = $("input[name='" + f + "']"); if (el.prop('readonly')) { el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); } });
                }

                // MATERNAL CONDITION
                var sex = $("select[name='sex']").val() || "";
                var maternalCheckboxes = $("input[name='maternal_condition']");
                if (sex.toUpperCase() === 'FEMALE' && years >= 15 && years <= 49) {
                    maternalCheckboxes.prop('disabled', false);
                    $("#none_choices").css('pointer-events', 'auto');
                    if ($("#none_choices").data('auto-checked')) { $("#none_choices").prop('checked', false); $("#none_choices").data('auto-checked', false); }
                } else {
                    maternalCheckboxes.prop('disabled', true).prop('checked', false);
                    $("#none_choices").prop('disabled', false).prop('checked', true).css('pointer-events', 'none');
                    $("#none_choices").data('auto-checked', true);
                }
            }
        }
    }

    // 4. LIVE MIRRORING TO PAGE 2 AFFIDAVIT
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

    // 5. AUTOPSY LOCKOUT
    function toggleAutopsyFields() {
        var autopsySelect = $("select[name='autopsy']").val() || "";
        var autopsyFields = ['autopsy_txt1', 'autopsy_txt2', 'autopsy_name', 'autopsy_date', 'autopsy_title', 'autopsy_address'];
        if (autopsySelect.toUpperCase() === 'NO') {
            autopsyFields.forEach(function(f) { $("input[name='" + f + "']").val('N/A').prop('readonly', true).css('background-color', '#e9ecef'); });
        } else {
            autopsyFields.forEach(function(f) { var el = $("input[name='" + f + "']"); el.prop('readonly', false).css('background-color', '#fff'); if(el.val() === 'N/A') el.val(''); });
        }
    }

    // TRIGGERS (Fires instantly on typing or clicking)
    $("select[name='sex']").on('change', runSmartLogic);
    $("select[name='autopsy']").on('change', toggleAutopsyFields);
    $("input[name='date_birth'], input[name='date_of_death']").on('change input blur', function() { runSmartLogic(); syncToPage2(); });
    $("input[name='age_at_death'], input[name='age_one_month'], input[name='age_one_day'], input[name='deceased_fname'], input[name='deceased_mname'], input[name='deceased_lname'], input[name='place_of_death'], input[name='informant_name'], input[name='informant_address']").on('keyup change input blur', function() { runSmartLogic(); syncToPage2(); });

    // Instantly fire on page load
    runSmartLogic();
    syncToPage2();
    toggleAutopsyFields();
});
</script>
</body>
</html>