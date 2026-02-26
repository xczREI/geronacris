<?php include ('logout_session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>GERONA CRIS-Birth registration</title>
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
		input, select{ 
			text-transform: uppercase;
		}
		#birth_txt{
			background-color: white;
			border-top:none;
			border-left:none;
			border-right:none;
			border-color: green;
			border-radius: 0;
		}
		textarea{ 
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
	      #modal1A{ overflow:scroll; height:30em; }
	    }
  	</style>

	<style> 

		@media print {
    /* 1. Hide all the system UI (sidebar, topbar, buttons, back links) */
    #sidebar, #navbar, #topbar, .btn, .nav-top {
        display: none !important;
    }

    /* 2. Reset the main body so it takes up the whole paper */
    body, #body, html {
        padding: 0 !important;
        margin: 0 !important;
        background-color: white !important;
        width: 100% !important;
    }
    .col-sm-9 {
        flex: 0 0 100% !important;
        max-width: 100% !important;
    }

    /* 3. Remove the scrollbar constraint so the whole form prints */
    .coll {
        overflow: visible !important;
        height: auto !important;
    }

    /* 4. Force the browser to print your green borders and blue backgrounds */
    .ctf-birth, .ctf-birth *, input, select {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        color-adjust: exact !important;
    }

    /* 5. Hide Page 2 during this specific preview (Optional, remove if you want both pages to print) */
    #birth_page_2 {
        display: none !important;
    }
    
    /* 6. Adjust form inputs to look clean on paper */
    input::placeholder, textarea::placeholder {
        color: transparent !important; /* Hides placeholders when printing */
    }
    
    @page {
        size: legal; /* Sets default paper size to Legal/Long */
        margin: 10mm; 
    }
}

	</style>
    
</head>
<body>

<!-- nav top -->
<nav class="navbar navbar-expand-md bg-success navbar-dark" id="navbar">
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
			  		<li class="nav-item"><a class="active nav-link" id="nav-link" href="../../home.php">&emsp;<i class="fa fa-clock-o fa-fw"></i>Dashboard</a></li>
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
			  		<a href="birth_records.php" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Back</a>
			  		<button data-toggle="collapse" data-target="#birth_page_1" id="page1" class="btn btn-outline-info">Page 1</button>
					<button data-toggle="collapse" data-target="#birth_page_2" id="page2" class="btn btn-outline-info">Page 2</button>
				</div>
				<div class="col-sm-2 mb-1 pr-0">
					<button type="button" class="btn btn-secondary" onclick="openLivePreview()">Preview</button>
				</div>
				<div class="col-sm-2 mb-1 pr-0">
					<button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#my1A">Print Form No. 1A</button>
				</div>
				<div class="col-sm-2 pr-0">
					<button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#my102">Print Form No. 102</button>
				</div>
				<div class="col-sm-2 pr-0">
					<button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#myreprint">Reprint</button>
				</div>
			</div>

			<?php
				require_once 'login_db_birth.php';

				$conn = new mysqli($hn, $un, $pw, $db);
				if ($conn->connect_error) die($conn->connect_error);

				$reg_no=null;
				if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

				$sql = "SELECT * FROM registration_tbl NATURAL JOIN (child_tbl NATURAL JOIN mother_tbl NATURAL JOIN father_tbl NATURAL JOIN att_inf_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN admission_paternity_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
				$result = $conn->query($sql);  
				if (!$result) die ("Database access failed: " . $conn->error);

				if ($result->num_rows > 0) {
	    			while($row = $result->fetch_assoc()) { 
			?>
			<form method="post" action="birth_cerf_update_action.php" id="updatebirth_form">
				<input type="hidden" name="reg_no" value="<?php echo $row['no']; ?>">
			    <!-- Tab panes -->
				<div id="birth_page_1" class="collapse show coll" data-parent="#accordion">
			    <?php
		        	include 'birth_page_1_edit.php';
			   	?>
				</div>
				<div id="birth_page_2" class="collapse coll" data-parent="#accordion">
		      	<?php
		        	include 'birth_page_2_edit.php';
		   		?>
				</div>
				<br>
		     	<button type="submit" class="btn btn-info btn-block" name="birth_update" id="btnadd" style="font-weight:bold; letter-spacing:5px; font-size:20px;">UPDATE</button>
		     	<br>
			</form>
			<?php 
				}
			}
			?>
		</div>
		
  	</div>
</div>
<!--print modal -->
<div class="modal fade" id="livePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document"> <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title"><i class="fa fa-eye"></i> Form No. 102 Document Preview</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="livePreviewBody" style="overflow-x: auto; background-color: #f8f9fa;">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" onclick="window.print()"><i class="fa fa-print"></i> Print Document</button>
      </div>
    </div>
  </div>
</div>

	<?php  
		include 'print_form_1A_modal.php';
		include 'print_form_102_modal.php';
		include 'reprint.php';
	?>
<?php include '../../report/report_modal1.php'; ?>

<!--Javascript-->
<script src = "../../js/birth_att_inf_2.js"></script>
<script src = "../../js/birth_delayed_gender.js"></script>
<script src = "../../js/birth_late_registry.js"></script>
<script src = "../../js/birth_time_js.js"></script>
<script src = "../../js/input_no_only.js"></script>
<script src = "../../js/input_txt_only.js"></script>
<script src = "../../js/inputs.js"></script>

<script>
$(document).ready(function(){
	$(".regNo").keyup(function(){
	  	var registryno = $(this).val();
		$.ajax({
		    url:"birth_check_regNo.php",
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
	document.getElementById("updatebirth_form").addEventListener("keydown", function(event){
		if (event.key == "Enter"){
			event.preventDefault();
		}
	});

</script>

<script>
// Function to open the modal and load the print page
function openPreview(registryNo) {
    // CHANGE 'print_form.php' to the actual name of your printing file
    var printUrl = "print_form.php?reg_no=" + registryNo; 
    
    // Load the URL into the iframe
    $('#previewIframe').attr('src', printUrl);
    
    // Show the Bootstrap modal
    $('#previewModal').modal('show');
}

// Function to trigger the print command directly from the modal
function printFromPreview() {
    var iframe = document.getElementById('previewIframe');
    iframe.contentWindow.focus();
    iframe.contentWindow.print();
}
</script>


</body>
</html>