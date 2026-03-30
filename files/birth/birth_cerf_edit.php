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
        input, select { text-transform: uppercase; }
        #birth_txt { background-color: white; border-top:none; border-left:none; border-right:none; border-color: green; border-radius: 0; }
        textarea { text-transform: uppercase; }
        #navbar { display: none; }
        .coll { overflow:scroll; height:50em; }
        
        @media only screen and (max-width: 768px) {
          #navbar { display: block; display: flex;}
          #topbar { display: none;  }
          #sidebar { display: none; }
          #body { padding-left: 12%; }
          .navbar-collapse { padding: 0; width: 50%; position: absolute; top: 72px; right: 20px; z-index: 1000; }
          .navbar-collapse #nav-link_active, #nav-link { font-size:13px; font-family: century gothic; text-transform: uppercase; color: white; display: block; padding: 10px; transition: all 0.3s ease; letter-spacing: 1px; }
          .coll { overflow:scroll; height:30em; }
          #modal1A { overflow:scroll; height:30em; }
        }
    </style>
    
    <style>
        /* Live Preview Specific Styling */
        @media (min-width: 992px) {
            #livePreviewModal .modal-dialog { max-width: 1400px !important; width: 95% !important; }
        }

        #livePreviewBody input, 
        #livePreviewBody select, 
        #livePreviewBody textarea,
        #livePreviewBody .card,
        #livePreviewBody .card-header,
        #livePreviewBody .card-body {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }

        #livePreviewBody input, 
        #livePreviewBody select, 
        #livePreviewBody textarea {
            font-size: 11.5px !important;       
            font-weight: 600 !important;        
            color: #000000 !important;          
            -webkit-text-fill-color: #000000 !important; 
            opacity: 1 !important;              
        }
        
        #livePreviewBody label, 
        #livePreviewBody span, 
        #livePreviewBody h4, 
        #livePreviewBody h6 {
            color: transparent !important;
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
            <div class="row mb-3">
                <div class="col-sm-4 mb-1 pr-0">
                    <a href="birth_records.php" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Back</a>
                    <button data-toggle="collapse" data-target="#birth_page_1" id="page1" class="btn btn-outline-info">Page 1</button>
                    <button data-toggle="collapse" data-target="#birth_page_2" id="page2" class="btn btn-outline-info">Page 2</button>
                </div>
                
                <div class="col-sm-2 pr-0">
                    <button type="button" class="btn btn-outline-dark btn-block font-weight-bold" onclick="openLivePreview()">
                        <i class="fa fa-sliders"></i> Preview
                    </button>
                </div>
                
                <div class="col-sm-2 pr-0">
                    <button type="button" class="btn btn-outline-dark btn-block font-weight-bold" data-toggle="modal" data-target="#my1A">Print 1A</button>
                </div>

                <div class="col-sm-2 pr-0">
                    <button type="button" class="btn btn-outline-dark btn-block font-weight-bold" data-toggle="modal" data-target="#my102">
                        <i class="fa fa-print"></i> Print 102
                    </button>
                </div>

                <div class="col-sm-2 pr-0">
                    <button type="button" class="btn btn-outline-dark btn-block font-weight-bold" data-toggle="modal" data-target="#myreprint">
                        <i class="fa fa-print"></i> Reprint
                    </button>
                </div>
            </div>

            <?php
                require_once 'login_db_birth.php';
                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) die($conn->connect_error);

                $reg_no = $_GET['reg_no'] ?? null;
                $sql = "SELECT * FROM registration_tbl NATURAL JOIN (child_tbl NATURAL JOIN mother_tbl NATURAL JOIN father_tbl NATURAL JOIN att_inf_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN admission_paternity_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no' LIMIT 1";
                $result = $conn->query($sql);  
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>
            <form method="post" action="birth_cerf_update_action.php" id="updatebirth_form">
                <input type="hidden" name="reg_no" id="main_reg_no" value="<?php echo $row['no']; ?>">
                <div id="birth_page_1" class="collapse show coll" data-parent="#accordion">
                    <?php include 'birth_page_1_edit.php'; ?>
                </div>
                <div id="birth_page_2" class="collapse coll" data-parent="#accordion">
                    <?php include 'birth_page_2_edit.php'; ?>
                </div>
                <br>
                <button type="submit" class="btn btn-info btn-block" name="birth_update" id="btnadd" style="font-weight:bold; letter-spacing:5px; font-size:20px;">UPDATE RECORD</button>
                <br>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<div class="modal fade" id="livePreviewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document"> 
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title"><i class="fa fa-sliders"></i> Form Alignment Live Preview (US Legal 8.5x14)</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0" style="display: flex; background-color: #eaeff2; min-height: 85vh;">
        
        <div id="preview-container" style="flex-grow: 1; overflow: auto; padding: 30px; display: flex; justify-content: center; align-items: flex-start;">
            <div id="scale-wrapper" style="transform: scale(0.70); transform-origin: top center;">
                <div id="paper-wrapper" style="width: 215.9mm; height: 355.6mm; background: white; box-shadow: 0 15px 40px rgba(0,0,0,0.2); overflow: hidden; position: relative;">
                    <div id="livePreviewBody" style="width: 960px; transform-origin: top left; position: absolute; transition: left 0.1s ease, top 0.1s ease, transform 0.1s ease; pointer-events: none;">
                    </div>
                </div>
            </div>
        </div>

        <div class="alignment-panel" style="width: 340px; min-width: 340px; background: #ffffff; color: #333; padding: 25px; box-shadow: -2px 0 10px rgba(0,0,0,0.1); z-index: 10; display: flex; flex-direction: column;">
            
            <div class="btn-group w-100 mb-4" role="group">
                <button type="button" class="btn btn-outline-dark btn-sm font-weight-bold active" id="btn-show-page-1" onclick="showPreviewPage(1)">Page 1 Data</button>
                <button type="button" class="btn btn-outline-dark btn-sm font-weight-bold" id="btn-show-page-2" onclick="showPreviewPage(2)">Page 2 Data</button>
            </div>

            <h6 class="font-weight-bold mb-2">Print Margins (mm)</h6>
            <div class="p-3 bg-white border rounded shadow-sm mb-3">
                <div class="form-group mb-2">
                    <label class="font-weight-bold mb-0 text-dark small">Top Margin (mm)</label>
                    <input type="number" id="m_top" class="form-control form-control-sm font-weight-bold text-center text-primary" value="0" step="0.5">
                </div>
                <div class="form-group mb-2">
                    <label class="font-weight-bold mb-0 text-dark small">Bottom Margin (mm)</label>
                    <input type="number" id="m_bottom" class="form-control form-control-sm font-weight-bold text-center text-primary" value="0" step="0.5">
                </div>
                <hr class="mt-2 mb-2">
                <div class="form-group mb-2">
                    <label class="font-weight-bold mb-0 text-dark small">Left Margin (mm)</label>
                    <input type="number" id="m_left" class="form-control form-control-sm font-weight-bold text-center text-primary" value="0" step="0.5">
                </div>
                <div class="form-group mb-0">
                    <label class="font-weight-bold mb-0 text-dark small">Right Margin (mm)</label>
                    <input type="number" id="m_right" class="form-control form-control-sm font-weight-bold text-center text-primary" value="0" step="0.5">
                </div>
            </div>

            <h6 class="font-weight-bold mb-2">Final Scale Overide (%)</h6>
            <p style="font-size: 11px; color: #7f8c8d; margin-bottom: 5px; line-height: 1.4;">
                Adjusting margins will auto-calculate scale. Use slider to manually override.
            </p>
            <div class="p-3 bg-white border rounded shadow-sm">
                <input type="range" id="manual_scale" class="custom-range" min="80" max="110" step="0.1" value="100">
                <div class="text-center mt-2">
                    <span id="scale_val" class="badge badge-info" style="font-size: 14px;">100.0%</span>
                </div>
            </div>

            <form id="html-print-form" action="print102.php" method="POST" target="_blank" style="display:none;">
                <input type="hidden" name="reg_no" id="hidden-reg-no"> 
                <input type="hidden" name="m_top" id="hidden-m-top">
                <input type="hidden" name="m_bottom" id="hidden-m-bottom">
                <input type="hidden" name="m_left" id="hidden-m-left">
                <input type="hidden" name="m_right" id="hidden-m-right">
                <input type="hidden" name="final_scale" id="hidden-scale">
            </form>

            <div style="margin-top: auto;">
                <button class="btn btn-block py-2 font-weight-bold text-white mb-2 mt-3" style="background-color: #17a2b8;" onclick="saveAlignment()"><i class="fa fa-save"></i> Save Settings</button>
                <button class="btn btn-block py-2 font-weight-bold text-white" style="background-color: #28a745; font-size: 1.1rem;" onclick="generateAlignedPrint()"><i class="fa fa-print"></i> Generate Print View</button>
                <button type="button" class="btn btn-outline-secondary btn-block mt-2" data-dismiss="modal">Cancel</button>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include 'print_form_102_modal.php'; ?>
<?php include 'reprint.php'; ?>

<?php include 'print_form_1A_modal.php'; ?>
<?php include '../../report/report_modal1.php'; ?>

<script src="../../js/birth_att_inf_2.js"></script>
<script src="../../js/birth_delayed_gender.js"></script>
<script src="../../js/birth_late_registry.js"></script>
<script src="../../js/birth_time_js.js"></script>
<script src="../../js/input_no_only.js"></script>
<script src="../../js/input_txt_only.js"></script>
<script src="../../js/inputs.js"></script>

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

$(document).ready(function(){
    var x = new Date();
    document.getElementById("time").value = x.toLocaleTimeString();
});

document.getElementById("updatebirth_form").addEventListener("keydown", function(event){
    if (event.key == "Enter"){
        event.preventDefault();
    }
});
</script>

<script src="../../alertifyjs/alertify.min.js"></script>

<script>
$(document).ready(function() {
    let savedProfiles = JSON.parse(localStorage.getItem('fpdf_dynamic_math')) || {};
    let profile = savedProfiles['birth_102'] || { t: 0, b: 0, l: 0, r: 0, s: 100 };
    
    $('#m_top').val(profile.t);
    $('#m_bottom').val(profile.b);
    $('#m_left').val(profile.l);
    $('#m_right').val(profile.r);
    $('#manual_scale').val(profile.s);

    let currentPreviewPage = 1;

    window.applyMarginChange = function() {
        let t = parseFloat($('#m_top').val()) || 0;
        let b = parseFloat($('#m_bottom').val()) || 0;
        let l = parseFloat($('#m_left').val()) || 0;
        let r = parseFloat($('#m_right').val()) || 0;

        let paperW = 215.9; // US Legal Width
        let paperH = 355.6; // US Legal Height

        let targetW = paperW - l - r; 
        let targetH = paperH - t - b;

        // Auto calculate what scale fits these margins
        let scaleX = targetW / paperW;
        let scaleY = targetH / paperH;
        let autoScale = Math.min(scaleX, scaleY);
        
        let autoScalePct = (autoScale * 100).toFixed(1);
        
        // Move the slider for the user
        $('#manual_scale').val(autoScalePct);
        
        // Now update the visual UI
        applyVisualShift();
    };

    window.applyVisualShift = function() {
        let t = parseFloat($('#m_top').val()) || 0;
        let l = parseFloat($('#m_left').val()) || 0;
        let r = parseFloat($('#m_right').val()) || 0;
        
        let currentScalePct = parseFloat($('#manual_scale').val());
        let currentScale = currentScalePct / 100;

        // MIRROR LOGIC for Page 2
        let activeLeft = (currentPreviewPage === 2) ? r : l;

        $('#scale_val').text(currentScalePct.toFixed(1) + '%');

        $('#livePreviewBody').css({
            'left': activeLeft + 'mm',
            'top': t + 'mm',
            'transform': 'scale(' + (currentScale * 0.85) + ')' 
        });
    };

    // Listeners
    $('#m_top, #m_bottom, #m_left, #m_right').on('input', applyMarginChange);
    $('#manual_scale').on('input', applyVisualShift);

    window.saveAlignment = function() {
        let data = {
            t: $('#m_top').val(),
            b: $('#m_bottom').val(),
            l: $('#m_left').val(),
            r: $('#m_right').val(),
            s: $('#manual_scale').val()
        };

        let savedProfiles = JSON.parse(localStorage.getItem('fpdf_dynamic_math')) || {};
        savedProfiles['birth_102'] = data;
        localStorage.setItem('fpdf_dynamic_math', JSON.stringify(savedProfiles));

        if(typeof alertify !== 'undefined') {
            alertify.success('Alignment Settings Saved!');
        } else {
            alert("Alignment Settings Saved!");
        }
    };

    window.generateAlignedPrint = function() {
        $('#hidden-m-top').val($('#m_top').val() || 0);
        $('#hidden-m-bottom').val($('#m_bottom').val() || 0);
        $('#hidden-m-left').val($('#m_left').val() || 0);
        $('#hidden-m-right').val($('#m_right').val() || 0);
        $('#hidden-scale').val($('#manual_scale').val()); 
        $('#hidden-reg-no').val($('#main_reg_no').val());
        
        $('#html-print-form').submit();
    };

    window.showPreviewPage = function(pageNum) {
        currentPreviewPage = pageNum;
        if(pageNum === 1) {
            $('#preview-page-1').show();
            $('#preview-page-2').hide();
            $('#btn-show-page-1').addClass('active').removeClass('btn-outline-dark').addClass('btn-dark');
            $('#btn-show-page-2').removeClass('active').removeClass('btn-dark').addClass('btn-outline-dark');
        } else {
            $('#preview-page-1').hide();
            $('#preview-page-2').show();
            $('#btn-show-page-1').removeClass('active').removeClass('btn-dark').addClass('btn-outline-dark');
            $('#btn-show-page-2').addClass('active').removeClass('btn-outline-dark').addClass('btn-dark');
        }
        applyVisualShift(); 
    };
});

function openLivePreview() {
    var $original1 = $('#birth_page_1');
    var $original2 = $('#birth_page_2');
    
    var $clone1 = $original1.clone();
    var $clone2 = $original2.clone();
    
    $clone1.find('script').remove();
    $clone2.find('script').remove();
    
    $clone1.removeClass('collapse coll hidden show').css({'display': 'block', 'visibility': 'visible', 'height': 'auto', 'overflow': 'visible'});
    $clone2.removeClass('collapse coll hidden show').css({'display': 'block', 'visibility': 'visible', 'height': 'auto', 'overflow': 'visible'});
    
    function copyValuesToClone($original, $clone) {
        $clone.find('select').each(function(i, item) { $(item).val($original.find('select').eq(i).val()); });
        $clone.find('textarea').each(function(i, item) { $(item).val($original.find('textarea').eq(i).val()); });
        $clone.find('input').each(function(i, item) {
             if($(item).attr('type') === 'checkbox' || $(item).attr('type') === 'radio') {
                 $(item).prop('checked', $original.find('input').eq(i).prop('checked'));
             } else {
                 $(item).val($original.find('input').eq(i).val());
             }
        });

        $clone.find('*').removeAttr('id');
        $clone.removeAttr('id'); 
    }

    copyValuesToClone($original1, $clone1);
    copyValuesToClone($original2, $clone2);
    
    var $wrapper1 = $('<div id="preview-page-1"></div>').append($clone1);
    var $wrapper2 = $('<div id="preview-page-2" style="display:none;"></div>').append($clone2);
    
    $('#livePreviewBody').empty().append($wrapper1).append($wrapper2);
    
    if (typeof window.applyVisualShift === "function") {
        window.applyVisualShift();
    }
    
    $('#livePreviewModal').appendTo("body").modal('show');
}
</script>

<script>
    if (document.getElementById('ui_offset_x')) {
        window.applyAndSubmitPrint = function() {
            document.getElementById('form_offset_x').value = document.getElementById('ui_offset_x').value;
            document.getElementById('form_offset_y').value = document.getElementById('ui_offset_y').value;
            document.getElementById('form_scale').value = document.getElementById('ui_scale').value;

            let form = document.getElementById('updatebirth_form'); 
            
            if(form) {
                form.action = 'print_102.php';
                form.method = 'POST';
                form.target = '_blank';
                form.submit();
            } else {
                alert("Main form ID not found.");
            }
        }
    }
</script>

</body>
</html>