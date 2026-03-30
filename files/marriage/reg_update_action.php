<?php
    require_once 'login_db_mrg.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_POST['mrg_update']) && isset($_POST['reg_no'])) 
    {
      $reg_no = $conn->real_escape_string($_POST['reg_no']);
      
      // --- FIX 1: Handle Numeric Fields and Nulls ---
      $registry_no = $conn->real_escape_string($_POST['registry_no'] ?? '');
      $book_no = !empty($_POST['book_no']) ? (int)$_POST['book_no'] : 0;
      $page_no = !empty($_POST['page_no']) ? (int)$_POST['page_no'] : 0;
      
      $province = $conn->real_escape_string($_POST['provinces'] ?? '');
      $municipal = $conn->real_escape_string($_POST['municipal'] ?? '');
      $u_date = date("Y-m-d");
      $u_time = $_POST['time'] ?? '';
      $u_name = $conn->real_escape_string($_POST['emp_name'] ?? '');

      // --- Husband Info ---
      $husband_lname = $conn->real_escape_string($_POST['husband_lname'] ?? '');
      $husband_fname = $conn->real_escape_string($_POST['husband_fname'] ?? '');
      $husband_mname = $conn->real_escape_string($_POST['husband_mname'] ?? '');
      $husband_bdate = $conn->real_escape_string($_POST['husband_bdate'] ?? '');
      $husband_age = $conn->real_escape_string($_POST['husband_age'] ?? '');
      $husband_bplace = $conn->real_escape_string(($_POST['husband_bplace'] ?? '').','.($_POST['husband_bplaceProvince'] ?? '').','.($_POST['husband_bplaceCountry'] ?? ''));
      $husband_sex = $conn->real_escape_string($_POST['husband_sex'] ?? '');
      $husband_citizen = $conn->real_escape_string($_POST['husband_citizen'] ?? '');
      $husband_residence = $conn->real_escape_string($_POST['husband_residence'] ?? '');
      $husband_religion = $conn->real_escape_string($_POST['husband_sect'] ?? '');
      $husband_cstatus = $conn->real_escape_string($_POST['husband_cstatus'] ?? '');
      $husband_father_name = $conn->real_escape_string(($_POST['h_fa_name'] ?? '').','.($_POST['h_fa_nameM'] ?? '').','.($_POST['h_fa_nameL'] ?? ''));
      $husband_father_citizen = $conn->real_escape_string($_POST['h_father_citizen'] ?? '');
      $husband_mother_name = $conn->real_escape_string(($_POST['h_mo_name'] ?? '').','.($_POST['h_mo_nameM'] ?? '').','.($_POST['h_mo_nameL'] ?? ''));
      $husband_mother_citizen = $conn->real_escape_string($_POST['h_mother_citizen'] ?? '');
      $husband_person_name = $conn->real_escape_string(($_POST['h_person_name'] ?? '').','.($_POST['h_person_nameM'] ?? '').','.($_POST['h_person_nameL'] ?? ''));
      $husband_person_rel = $conn->real_escape_string($_POST['h_person_rel'] ?? '');
      $husband_person_residence = $conn->real_escape_string($_POST['h_person_residence'] ?? '');

      // --- Wife Info ---
      $wife_lname = $conn->real_escape_string($_POST['wife_lname'] ?? '');
      $wife_fname = $conn->real_escape_string($_POST['wife_fname'] ?? '');
      $wife_mname = $conn->real_escape_string($_POST['wife_mname'] ?? '');
      $wife_bdate = $conn->real_escape_string($_POST['wife_bdate'] ?? '');
      $wife_age = $conn->real_escape_string($_POST['wife_age'] ?? '');
      $wife_bplace = $conn->real_escape_string(($_POST['wife_bplace'] ?? '').','.($_POST['wife_bplaceProvince'] ?? '').','.($_POST['wife_bplaceCountry'] ?? ''));
      $wife_sex = $conn->real_escape_string($_POST['wife_sex'] ?? '');
      $wife_citizen = $conn->real_escape_string($_POST['wife_citizen'] ?? '');
      $wife_residence = $conn->real_escape_string($_POST['wife_residence'] ?? '');
      $wife_religion = $conn->real_escape_string($_POST['wife_sect'] ?? '');
      $wife_cstatus = $conn->real_escape_string($_POST['wife_cstatus'] ?? '');
      $wife_father_name = $conn->real_escape_string(($_POST['w_fa_name'] ?? '').','.($_POST['w_fa_nameM'] ?? '').','.($_POST['w_fa_nameL'] ?? ''));
      $wife_father_citizen = $conn->real_escape_string($_POST['w_father_citizen'] ?? '');
      $wife_mother_name = $conn->real_escape_string(($_POST['w_mo_name'] ?? '').','.($_POST['w_mo_nameM'] ?? '').','.($_POST['w_mo_nameL'] ?? ''));
      $wife_mother_citizen = $conn->real_escape_string($_POST['w_mother_citizen'] ?? '');
      $wife_person_name = $conn->real_escape_string(($_POST['w_person_name'] ?? '').','.($_POST['w_person_nameM'] ?? '').','.($_POST['w_person_nameL'] ?? ''));
      $wife_person_rel = $conn->real_escape_string($_POST['w_person_rel'] ?? '');
      $wife_person_residence = $conn->real_escape_string($_POST['w_person_residence'] ?? '');

      // --- Marriage Details ---
      $mrg_brgy = $conn->real_escape_string($_POST['mrg_brgy'] ?? '');
      $mrg_city = $conn->real_escape_string($_POST['mrg_city'] ?? '');
      $mrg_province = $conn->real_escape_string($_POST['mrg_province'] ?? '');
      $mrg_date = $conn->real_escape_string($_POST['mrg_date'] ?? '');
      $mrg_time = $conn->real_escape_string($_POST['mrg_time'] ?? '');
      $husband_name = $conn->real_escape_string($_POST['husband_name'] ?? '');
      $wife_name = $conn->real_escape_string($_POST['wife_name'] ?? '');
      $certify_type = $conn->real_escape_string($_POST['certify_type'] ?? '');
      $mrg_days = $conn->real_escape_string($_POST['mrg_days'] ?? '');
      $mrg_months = $conn->real_escape_string($_POST['mrg_months'] ?? '');
      $mrg_years = $conn->real_escape_string($_POST['mrg_years'] ?? '');
      $mrg_solemn_type = $conn->real_escape_string($_POST['mrg_solemn_type'] ?? '');
      $mrg_license_no = $conn->real_escape_string($_POST['mrg_license_no'] ?? '');
      $mrg_license_on = $conn->real_escape_string($_POST['mrg_license_on'] ?? '');
      $mrg_license_at = $conn->real_escape_string($_POST['mrg_license_at'] ?? '');
      $no_license_art = $conn->real_escape_string($_POST['no_license_art'] ?? '');
      $mrg_solemn_name = $conn->real_escape_string($_POST['mrg_solemn_name'] ?? '');
      $mrg_solemn_position = $conn->real_escape_string($_POST['mrg_solemn_position'] ?? '');
      $mrg_solemn_other = $conn->real_escape_string($_POST['mrg_solemn_other'] ?? '');

      // --- Administration/Witnesses ---
      $received_name = $conn->real_escape_string($_POST['received_name'] ?? '');
      $received_position = $conn->real_escape_string($_POST['received_position'] ?? '');
      $civil_name = $conn->real_escape_string($_POST['civil_name'] ?? '');
      $civil_position = $conn->real_escape_string($_POST['civil_position'] ?? '');
      $received_date = $conn->real_escape_string($_POST['received_date'] ?? '');
      $civil_date = $conn->real_escape_string($_POST['civil_date'] ?? '');

      $remarks = $conn->real_escape_string($_POST['remarks'] ?? '');
      $remarks = preg_replace("#\[sp\]#", "&nbsp;", $remarks);
      $remarks = preg_replace("#\[nl\]#", "<br>\n", $remarks);

      for ($i=1; $i<=12; $i++) { ${"witness$i"} = $conn->real_escape_string($_POST["witness$i"] ?? ''); }

      // --- FIX 2: Pre-define Delayed Registry variables to avoid "Undefined Variable" errors ---
      $late_marriage_type = ''; $late_marriage_with = ''; $late_marriage_in = ''; $late_marriage_on = '';
      $late_mrg_husband = ''; $late_mrg_wife = ''; $late_sect_type = '';

      if(($_POST['late_marriage_type1'] ?? '') =='my marriage'){
          $late_marriage_type = 'my marriage'; 
          $late_marriage_with = $conn->real_escape_string($_POST['late_marriage_with'] ?? '');
          $late_marriage_in = $conn->real_escape_string($_POST['late_marriage_in1'] ?? '');
          $late_marriage_on = $conn->real_escape_string($_POST['late_marriage_on2'] ?? '');
      } else if(($_POST['late_marriage_type2'] ?? '') =='the marriage'){
          $late_marriage_type = 'the marriage';
          $late_marriage_in = $conn->real_escape_string($_POST['late_marriage_in3'] ?? '');
          $late_marriage_on = $conn->real_escape_string($_POST['late_marriage_on4'] ?? '');
          $late_mrg_husband = $conn->real_escape_string($_POST['late_mrg_h'] ?? '');
          $late_mrg_wife = $conn->real_escape_string($_POST['late_mrg_w'] ?? '');
      }

      $late_name = $conn->real_escape_string($_POST['late_name'] ?? '');
      $late_address = $conn->real_escape_string($_POST['late_address'] ?? '');
      $solemnized_by = $conn->real_escape_string($_POST['solemnized_by'] ?? '');
      
      // Select the correct sect type
      foreach(['late_sect_type1','late_sect_type2','late_sect_type3','late_sect_type4'] as $st) {
          if(isset($_POST[$st])) { $late_sect_type = $_POST[$st]; break; }
      }

      // --- Affidavit Details ---
      $aff_solemn_name = $conn->real_escape_string($_POST['aff_solemn_name'] ?? '');
      $aff_solemn_of = $conn->real_escape_string($_POST['aff_solemn_of'] ?? '');
      $aff_solemn_at = $conn->real_escape_string($_POST['aff_solemn_at'] ?? '');
      $aff_hus_name = $conn->real_escape_string($_POST['aff_hus_name'] ?? '');
      $aff_wife_name = $conn->real_escape_string($_POST['aff_wife_name'] ?? '');
      $aff_2type = $conn->real_escape_string($_POST['aff_2type'] ?? '');
      $aff_1party = $conn->real_escape_string($_POST['aff_1party'] ?? '');
      $aff_2party = $conn->real_escape_string($_POST['aff_2party'] ?? '');
      $aff_sign_day = $conn->real_escape_string($_POST['aff_sign_day'] ?? '');
      $aff_sign_month = $conn->real_escape_string($_POST['aff_sign_month'] ?? '');
      $aff_sign_year = !empty($_POST['aff_sign_year']) ? (int)$_POST['aff_sign_year'] : 0;
      $aff_sign_at = $conn->real_escape_string($_POST['aff_sign_at'] ?? '');
      $aff_sign_name = $conn->real_escape_string($_POST['aff_sign_name'] ?? '');
      $aff_sworn_day = $conn->real_escape_string($_POST['aff_sworn_day'] ?? '');
      $aff_sworn_month = $conn->real_escape_string($_POST['aff_sworn_month'] ?? '');
      $aff_sworn_year = !empty($_POST['aff_sworn_year']) ? (int)$_POST['aff_sworn_year'] : 0;
      $aff_sworn_at = $conn->real_escape_string($_POST['aff_sworn_at'] ?? '');
      $aff_sworn_ctc = $conn->real_escape_string($_POST['aff_sworn_ctc'] ?? '');
      $aff_issued_on = $conn->real_escape_string($_POST['aff_issued_on'] ?? '');
      $aff_issued_at = $conn->real_escape_string($_POST['aff_issued_at'] ?? '');
      $aff_admin_name = $conn->real_escape_string($_POST['aff_admin_name'] ?? '');
      $aff_admin_title = $conn->real_escape_string($_POST['aff_admin_title'] ?? '');
      $aff_admin_address = $conn->real_escape_string($_POST['aff_admin_address'] ?? '');

      // --- FIX 3: Cast Year Fields to Integer ---
      $late_mrg_type = $conn->real_escape_string($_POST['late_mrg_type'] ?? '');
      $late_mrg_no = $conn->real_escape_string($_POST['late_mrg_no'] ?? '');
      $late_mrg_issued_on = $conn->real_escape_string($_POST['late_mrg_issued_on'] ?? '');
      $late_mrg_issued_at = $conn->real_escape_string($_POST['late_mrg_issued_at'] ?? '');
      $late_under_art = $conn->real_escape_string($_POST['late_under_art'] ?? '');
      $late_h_citizen = $conn->real_escape_string($_POST['late_h_citizen'] ?? '');
      $late_w_citizen = $conn->real_escape_string($_POST['late_w_citizen'] ?? '');
      $late_h_citizen1 = $conn->real_escape_string($_POST['late_h_citizen1'] ?? '');
      $late_w_citizen1 = $conn->real_escape_string($_POST['late_w_citizen1'] ?? '');
      $late_reason = $conn->real_escape_string($_POST['late_reason'] ?? '');
      $late_sign_day = $conn->real_escape_string($_POST['late_sign_day'] ?? '');
      $late_sign_month = $conn->real_escape_string($_POST['late_sign_month'] ?? '');
      $late_sign_year = !empty($_POST['late_sign_year']) ? (int)$_POST['late_sign_year'] : 0;
      $late_sign_at = $conn->real_escape_string($_POST['late_sign_at'] ?? '');
      $affiant_name = $conn->real_escape_string($_POST['affiant_name'] ?? '');
      $late_sworn_day = $conn->real_escape_string($_POST['late_sworn_day'] ?? '');
      $late_sworn_month = $conn->real_escape_string($_POST['late_sworn_month'] ?? '');
      $late_sworn_year = !empty($_POST['late_sworn_year']) ? (int)$_POST['late_sworn_year'] : 0;
      $late_sworn_at = $conn->real_escape_string($_POST['late_sworn_at'] ?? '');
      $late_ctc = $conn->real_escape_string($_POST['late_ctc'] ?? '');
      $late_issued_on = $conn->real_escape_string($_POST['late_issued_on'] ?? '');
      $late_issued_at = $conn->real_escape_string($_POST['late_issued_at'] ?? '');
      $late_sworn_name = $conn->real_escape_string($_POST['late_sworn_name'] ?? '');
      $late_sworn_position = $conn->real_escape_string($_POST['late_sworn_position'] ?? '');
      $late_sworn_address = $conn->real_escape_string($_POST['late_sworn_address'] ?? '');

      // Execute SQL updates...
      $conn->query("UPDATE registration_tbl SET registry_no='$registry_no', book_no='$book_no', page_no='$page_no', province='$province', municipal='$municipal', update_date='$u_date', update_time='$u_time', update_user='$u_name' WHERE no = '$reg_no'");
      $conn->query("UPDATE husband_tbl SET registry_no='$registry_no', husband_lname='$husband_lname', husband_fname='$husband_fname', husband_mname='$husband_mname', husband_bdate='$husband_bdate', husband_age='$husband_age', husband_bplace='$husband_bplace', husband_sex='$husband_sex', husband_citizen='$husband_citizen', husband_residence='$husband_residence', husband_religion='$husband_religion', husband_civil_status='$husband_cstatus', husband_father_name='$husband_father_name', husband_father_citizen='$husband_father_citizen', husband_mother_name='$husband_mother_name', husband_mother_citizen='$husband_mother_citizen', husband_person_name='$husband_person_name', husband_person_rel='$husband_person_rel', husband_person_residence='$husband_person_residence' WHERE no = '$reg_no'");
      $conn->query("UPDATE wife_tbl SET registry_no='$registry_no', wife_lname='$wife_lname', wife_fname='$wife_fname', wife_mname='$wife_mname', wife_bdate='$wife_bdate', wife_age='$wife_age', wife_bplace='$wife_bplace', wife_sex='$wife_sex', wife_citizen='$wife_citizen', wife_residence='$wife_residence', wife_religion='$wife_religion', wife_civil_status='$wife_cstatus', wife_father_name='$wife_father_name', wife_father_citizen='$wife_father_citizen', wife_mother_name='$wife_mother_name', wife_mother_citizen='$wife_mother_citizen', wife_person_name='$wife_person_name', wife_person_rel='$wife_person_rel', wife_person_residence='$wife_person_residence' WHERE no = '$reg_no'");
      $conn->query("UPDATE marriage_tbl SET registry_no='$registry_no', mrg_brgy='$mrg_brgy', mrg_city='$mrg_city', mrg_province='$mrg_province', mrg_date='$mrg_date', mrg_time='$mrg_time', mrg_husband_name='$husband_name', mrg_wife_name='$wife_name', mrg_certify_type='$certify_type', mrg_cerf_day='$mrg_days', mrg_cerf_month='$mrg_months', mrg_cerf_year='$mrg_years', mrg_solemn_type='$mrg_solemn_type', mrg_license_no='$mrg_license_no', mrg_issued_on='$mrg_license_on', mrg_issued_at='$mrg_license_at', mrg_under_art='$no_license_art', mrg_solemn_name='$mrg_solemn_name', mrg_solemn_position='$mrg_solemn_position', mrg_solemn_other='$mrg_solemn_other' WHERE no = '$reg_no'");
      $conn->query("UPDATE receive_civil_tbl SET registry_no='$registry_no', received_name='$received_name', received_position='$received_position', civil_name='$civil_name', civil_position='$civil_position', received_date='$received_date', civil_date='$civil_date' WHERE no = '$reg_no'");
      $conn->query("UPDATE remarks_tbl SET registry_no='$registry_no', remarks='$remarks' WHERE no = '$reg_no'");
      $conn->query("UPDATE witness_tbl SET registry_no='$registry_no', witness1='$witness1', witness2='$witness2', witness3='$witness3', witness4='$witness4', witness5='$witness5', witness6='$witness6', witness7='$witness7', witness8='$witness8', witness9='$witness9', witness10='$witness10', witness11='$witness11', witness12='$witness12' WHERE no = '$reg_no'");
      $conn->query("UPDATE aff_solemn_tbl SET registry_no='$registry_no', aff_solemn_name='$aff_solemn_name', aff_solemn_of='$aff_solemn_of', aff_solemn_at='$aff_solemn_at', aff_hus_name='$aff_hus_name', aff_wife_name='$aff_wife_name', aff_2type='$aff_2type', aff_1party='$aff_1party', aff_2party='$aff_2party', aff_sign_day='$aff_sign_day', aff_sign_month='$aff_sign_month', aff_sign_year='$aff_sign_year', aff_sign_at='$aff_sign_at', aff_sign_name='$aff_sign_name', aff_sworn_day='$aff_sworn_day', aff_sworn_month='$aff_sworn_month', aff_sworn_year='$aff_sworn_year', aff_sworn_at='$aff_sworn_at', aff_sworn_ctc='$aff_sworn_ctc', aff_issued_on='$aff_issued_on', aff_issued_at='$aff_issued_at', aff_admin_name='$aff_admin_name', aff_admin_title='$aff_admin_title', aff_admin_address='$aff_admin_address' WHERE no = '$reg_no'");
      $conn->query("UPDATE late_reg_tbl SET registry_no='$registry_no', late_name='$late_name', late_address='$late_address', late_reg_type='$late_marriage_type', marriage_with='$late_marriage_with', marriage_in='$late_marriage_in', marriage_on='$late_marriage_on', late_husband_name='$late_mrg_husband', late_wife_name='$late_mrg_wife', late_solemn_name='$solemnized_by', late_sect_type='$late_sect_type', late_solemn_type='$late_mrg_type', late_mrg_license_no='$late_mrg_no', late_mrg_issued_on='$late_mrg_issued_on', late_mrg_issued_at='$late_mrg_issued_at', late_mrg_under_art='$late_under_art', applicant_hus_citizen='$late_h_citizen', applicant_wife_citizen='$late_w_citizen', other_hus_citizen='$late_h_citizen1', other_wife_citizen='$late_w_citizen1', late_reg_reason='$late_reason', late_sign_day='$late_sign_day', late_sign_month='$late_sign_month', late_sign_year='$late_sign_year', late_sign_at='$late_sign_at', late_affiant_name='$affiant_name', late_sworn_day='$late_sworn_day', late_sworn_month='$late_sworn_month', late_sworn_year='$late_sworn_year', late_sworn_at='$late_sworn_at', late_ctc='$late_ctc', late_issued_on='$late_issued_on', late_issued_at='$late_issued_at', late_administer_name='$late_sworn_name', late_administer_position='$late_sworn_position', late_administer_address='$late_sworn_address' WHERE no = '$reg_no'");

      header('location: marriage_records.php');
      mysqli_close($conn);
    }
?>