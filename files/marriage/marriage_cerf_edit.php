<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRS-Marriage Registration</title>
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
    	input, textarea, select{ 
    		text-transform: uppercase;
    	 }
    </style>

     <style>
	    #navbar{ display: none; }
	    .coll{ overflow:scroll; height:50em; }
	    @media only screen and (max-width: 768px) {
	                /* For mobile phones: */
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
	      .navbar-collapse #nav-link_active, #nav-link{ 
	        font-size:13px; 
	        font-family: century gothic;
	        text-transform: uppercase;
	        color: white;
	        display:  block;
	        padding: 10px;
	        transition: all 0.3s ease;
	        letter-spacing: 1px;
	      }
	      .coll{ overflow:scroll; height:30em; }
	      #modal3A{ overflow:scroll; height:30em; }
	    }
  	</style>
	<style>
    /* =========================================
       1. CSS FOR PRINTING
       ========================================= */
    @media print {
        body * { visibility: hidden; }
        #livePreviewBody, #livePreviewBody * { visibility: visible; }
        #livePreviewBody {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .modal-header, .modal-footer, .modal-backdrop { display: none !important; }
        .modal-content { border: none !important; }
        @page { size: legal; margin: 10mm; }
    }

    /* =========================================
       2. CSS FOR THE MODAL PREVIEW
       ========================================= */
    @media (min-width: 768px) {
        #livePreviewModal .modal-dialog {
            max-width: 1050px !important;
            width: 95% !important;
        }
    }

    /* Styling to make text bold and black in the preview */
    #livePreviewBody .ctf-birth input, 
    #livePreviewBody .ctf-birth select, 
    #livePreviewBody .ctf-birth textarea {
        font-size: 11.5px !important;
        font-weight: 600 !important;
        color: #000000 !important;
        -webkit-text-fill-color: #000000 !important;
        opacity: 1 !important;
    }
</style>

</head>
<body>

<!-- nav top -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark" id="navbar">
  <!-- Brand -->
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

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="float: right;">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse bg-light" id="collapsibleNavbar">
    <ul class="navbar-nav bg-dark mx-auto h-100">
		<li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
		<li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
		<li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
		&emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
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

<!--navbar-->
<div class="row" id="row">
  	<div class="col-sm-3 bg-success" style="border-left: 15px solid;" id="sidebar">
  		<div class="pic" style="margin-top: 2em;">
	  		<center>
	  			<img src="../../images/logo.png" class="logo">
	  			<h4 class="text-uppercase">Civil Registry Information<br><span class="lblspan">System</span></h4>
	  		</center>
	  	</div>

		<!--nav-side-->
		<div class="aside" style="margin-top: 3em;">
			<nav class="navbar">
				<ul class="navbar-nav" style="padding-bottom:6em;">
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="../../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link_active" href="../files.php" >&emsp;<i class="fa fa-bookmark-o fa-fw"></i>Registration</a></li>
			  		<li class="nav-item"><a class="nav-link" data-toggle="modal" href="#myreport" id="nav-link">
			        &emsp;<i class="fa fa-file-o fa-fw"></i>Report</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="../../employee/view_users.php">&emsp;<i class="fa fa-user-o fa-fw"></i>Account</a></li>
			  		<li class="nav-item"><a class="nav-link" id="nav-link" href="../../php/logout.php">&emsp;<i class="fa fa-eject fa-fw"></i>Logout</a></li>
				</ul>
			</nav>
		</div>

  	</div><!--end col-3-->

  	<div class="col-sm-9" style="padding-top: 7%;" id="body">
  		<div id="accordion">
  		<div class="row">
    <div class="col-sm-4 mb-1">
        <a href="marriage_records.php" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Back</a>
        <button data-toggle="collapse" data-target="#marriage_page_1" id="page1" class="btn btn-outline-info">Page 1</button>
        <button data-toggle="collapse" data-target="#marriage_page_2" id="page2" class="btn btn-outline-info">Page 2</button>
    </div>
    
    <div class="col-sm-2 mb-1 pr-0">
        <button type="button" class="btn btn-outline-dark btn-block" onclick="openLivePreview()">Preview</button>
    </div>

    <div class="col-sm-2 mb-1 pr-0">
        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#my3A">Print Form No. 3A</button>
    </div>
    <div class="col-sm-2 pr-0">
        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#my97">Print Form No. 97</button>
    </div>
    <div class="col-sm-2 pr-0">
        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#my97reprint">Reprint</button>
    </div>
	</div>

		<?php
			require_once 'login_db_mrg.php';

			$conn = new mysqli($hn, $un, $pw, $db);
			if ($conn->connect_error) die($conn->connect_error);

			$reg_no=null;
			if (!empty($_GET['reg_no'])){ $reg_no = $conn->real_escape_string($_REQUEST['reg_no']); }

			$sql = "SELECT *, registration_tbl.no as no FROM registration_tbl 
                    LEFT JOIN husband_tbl ON registration_tbl.no = husband_tbl.no
                    LEFT JOIN wife_tbl ON registration_tbl.no = wife_tbl.no
                    LEFT JOIN marriage_tbl ON registration_tbl.no = marriage_tbl.no
                    LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no
                    LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no
                    LEFT JOIN witness_tbl ON registration_tbl.no = witness_tbl.no
                    LEFT JOIN aff_solemn_tbl ON registration_tbl.no = aff_solemn_tbl.no
                    LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no
                    WHERE registration_tbl.no = '$reg_no'";
			$result = $conn->query($sql);  
			if (!$result) die ("Database access failed: " . $conn->error);

			if ($result->num_rows > 0) {
    			while($row = $result->fetch_assoc()) { 
		?>
		<form method="post" action="reg_update_action.php" id="updatebirth_form">

			<input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
			  <!-- Tab panes -->
			<div id="marriage_page_1" class="collapse coll show" data-parent="#accordion">
			    <?php
			        	include 'marriage_page_1_edit.php';
			   	?>
			</div>
			<div id="marriage_page_2" class="collapse coll" data-parent="#accordion">
			      	<?php
			        	include 'marriage_page_2_edit.php';
			   		?>
			</div>
			<br>
	     	<button type="submit" class="btn btn-info btn-block" name="mrg_update" id="btn_add" style="font-weight:bold; letter-spacing:5px; font-size:20px;">UPDATE</button>
	     	<br>
		</form>
		<?php 
			} 
		}
		?>
		</div>
		<div class="modal fade" id="livePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document"> 
				<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<h5 class="modal-title"><i class="fa fa-eye"></i> Form No. 97 Document Preview</h5>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="livePreviewBody" style="overflow-x: auto; background-color: #f8f9fa;">
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="window.print()">Print Preview</button>
				</div>
				</div>
			</div>
			</div>
		
  	</div>
</div>
	<?php 	
		include '../../report/report_modal1.php';
		include 'print_form_3A_modal.php';
		include 'print_form_97_modal.php';
		include 'reprint.php'; 
	?>
<!--Javascript-->
<script src = "../../js/mrg_cerf_1.js"></script>
<script src = "../../js/mrg_page2.js"></script>
<script src = "../../js/mrg_time_js.js"></script>
<script src = "../../js/date_db.js"></script>
<script src = "../../js/input_no_only.js"></script>
<script src = "../../js/input_txt_only.js"></script>
<script src = "../../js/inputs.js"></script>
<script src = "../../js/mrg_aff.js"></script>

<script>
  $(document).ready(function(){
    $(".regNo").keyup(function(){
    var registryno = $(this).val();
    $.ajax({
        url:"marriage_check_regNo.php",
        method:"POST",
        data:{registry_no:registryno},
        dataType:"text",
        success:function(html){
          $("#error").html(html);
        }
      });
    });

  });
</script>

<script>
$(document).ready(function(){
	var x = new Date();
    document.getElementById("time").value = x.toLocaleTimeString();
});
</script>


<!--Javascrpt theme-->
<script src = "../../alertifyjs/alertify.min.js"></script>
<script>
function openLivePreview() {
    // 1. Target both pages of the marriage form
    var $p1 = $('#marriage_page_1');
    var $p2 = $('#marriage_page_2');
    
    // 2. Create clones and remove scripts to prevent glitches
    var $clone1 = $p1.clone().find('script').remove().end();
    var $clone2 = $p2.clone().find('script').remove().end();
    
    // 3. Force clones to be visible and clear IDs
    $([$clone1, $clone2]).each(function() {
        this.removeClass('collapse coll hidden');
        this.css({'display': 'block', 'visibility': 'visible', 'height': 'auto', 'margin-bottom': '30px'});
        this.find('*').removeAttr('id');
    });

    // 4. Sync typed values from original form to the clones
    syncValues($p1, $clone1);
    syncValues($p2, $clone2);

    // 5. Lock inputs so they are read-only
    $([$clone1, $clone2]).each(function() {
        this.find('input, textarea').prop('readonly', true).css({'background-color': 'transparent', 'border': 'none'});
        this.find('select, input[type="checkbox"]').prop('disabled', true);
    });

    // 6. Inject into the modal and show
    $('#livePreviewBody').empty().append($clone1).append('<hr style="border: 2px dashed #000;">').append($clone2);
    $('#livePreviewModal').appendTo("body").modal('show');
}

function syncValues($source, $target) {
    $source.find('input, select, textarea').each(function(index) {
        var $srcEl = $(this);
        var $tgtEl = $target.find('input, select, textarea').eq(index);
        if ($srcEl.is(':checkbox, :radio')) {
            $tgtEl.prop('checked', $srcEl.prop('checked'));
        } else {
            $tgtEl.val($srcEl.val());
        }
    });
}
</script>

</body>
</html>