<?php
    require_once 'login_db_mrg.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $error = array();

    if (isset($_POST['add_marriage'])) 
    {
      // --- FIX 1: Cast integer values to handle empty strings ---
      $registry_no = $conn->real_escape_string($_POST['registry_no'] ?? '');
      $book_no = !empty($_POST['book_no']) ? (int)$_POST['book_no'] : 0;
      $page_no = !empty($_POST['page_no']) ? (int)$_POST['page_no'] : 0;
      
      $province = $conn->real_escape_string($_POST['provinces'] ?? '');
      $municipal = $conn->real_escape_string($_POST['municipal'] ?? '');
      $date = date("Y-m-d");
      $time = $_POST['time'] ?? '';
      $e_name = $conn->real_escape_string($_POST['emp_name'] ?? '');
      $u_date = date("Y-m-d");
      $u_time = $_POST['time'] ?? '';
      $u_name = $conn->real_escape_string($_POST['emp_name'] ?? '');

      //=====================================================================hus_info
      $husband_lname = $conn->real_escape_string($_POST['husband_lname'] ?? '');
      $husband_fname = $conn->real_escape_string($_POST['husband_fname'] ?? '');
      $husband_mname = $conn->real_escape_string($_POST['husband_mname'] ?? '');
      $husband_bdate = $conn->real_escape_string(($_POST['husband_bday'] ?? '').' '.($_POST['husband_bmonth'] ?? '').' '.($_POST['husband_byear'] ?? ''));
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

      //=====================================================================wife_info
      $wife_lname = $conn->real_escape_string($_POST['wife_lname'] ?? '');
      $wife_fname = $conn->real_escape_string($_POST['wife_fname'] ?? '');
      $wife_mname = $conn->real_escape_string($_POST['wife_mname'] ?? '');
      $wife_bdate = $conn->real_escape_string(($_POST['wife_bday'] ?? '').' '.($_POST['wife_bmonth'] ?? '').' '.($_POST['wife_byear'] ?? ''));
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

      //=====================================================================mrg_info
      $mrg_brgy = $conn->real_escape_string($_POST['mrg_brgy'] ?? '');
      $mrg_city = $conn->real_escape_string($_POST['mrg_city'] ?? '');
      $mrg_province = $conn->real_escape_string($_POST['mrg_province'] ?? '');
      $mrg_date = $conn->real_escape_string(($_POST['mrg_day'] ?? '').' '.($_POST['mrg_month'] ?? '').' '.($_POST['mrg_year'] ?? ''));
      $mrg_time = $conn->real_escape_string($_POST['mrg_time'] ?? '');
      $husband_name = $conn->real_escape_string($_POST['husband_name'] ?? '');
      $wife_name = $conn->real_escape_string($_POST['wife_name'] ?? '');
      
      // --- FIX 2: Null coalescing for checkboxes that might be blank ---
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

      $received_name = $conn->real_escape_string($_POST['received_name'] ?? '');
      $received_position = $conn->real_escape_string($_POST['received_position'] ?? '');
      $civil_name = $conn->real_escape_string($_POST['civil_name'] ?? '');
      $civil_position = $conn->real_escape_string($_POST['civil_position'] ?? '');
      $received_date = $conn->real_escape_string($_POST['received_date'] ?? '');
      $civil_date = $conn->real_escape_string($_POST['civil_date'] ?? '');

      $remarks = $conn->real_escape_string($_POST['remarks'] ?? '');
      $remarks = preg_replace("#\[sp\]#", "&nbsp;", $remarks);
      $remarks = preg_replace("#\[nl\]#", "<br>\n", $remarks);

      $witness1 = $conn->real_escape_string($_POST['witness1'] ?? '');
      $witness2 = $conn->real_escape_string($_POST['witness2'] ?? '');
      $witness3 = $conn->real_escape_string($_POST['witness3'] ?? '');
      $witness4 = $conn->real_escape_string($_POST['witness4'] ?? '');
      $witness5 = $conn->real_escape_string($_POST['witness5'] ?? '');
      $witness6 = $conn->real_escape_string($_POST['witness6'] ?? '');
      $witness7 = $conn->real_escape_string($_POST['witness7'] ?? '');
      $witness8 = $conn->real_escape_string($_POST['witness8'] ?? '');
      $witness9 = $conn->real_escape_string($_POST['witness9'] ?? '');
      $witness10 = $conn->real_escape_string($_POST['witness10'] ?? '');
      $witness11 = $conn->real_escape_string($_POST['witness11'] ?? '');
      $witness12 = $conn->real_escape_string($_POST['witness12'] ?? '');

      //=====================================================================aff_solemn
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
      $aff_sign_year = $conn->real_escape_string($_POST['aff_sign_year'] ?? '');
      $aff_sign_year  = !empty($_POST['aff_sign_year']) ? (int)$_POST['aff_sign_year'] : 0;
      $aff_sworn_year = !empty($_POST['aff_sworn_year']) ? (int)$_POST['aff_sworn_year'] : 0;
      $aff_sworn_day = $conn->real_escape_string($_POST['aff_sworn_day'] ?? '');
      $aff_sworn_month = $conn->real_escape_string($_POST['aff_sworn_month'] ?? '');
      $aff_sworn_year = $conn->real_escape_string($_POST['aff_sworn_year'] ?? '');
      $aff_sworn_at = $conn->real_escape_string($_POST['aff_sworn_at'] ?? '');
      $aff_sworn_ctc = $conn->real_escape_string($_POST['aff_sworn_ctc'] ?? '');
      $aff_issued_on = $conn->real_escape_string($_POST['aff_issued_on'] ?? '');
      $aff_issued_at = $conn->real_escape_string($_POST['aff_issued_at'] ?? '');
      $aff_admin_name = $conn->real_escape_string($_POST['aff_admin_name'] ?? '');
      $aff_admin_title = $conn->real_escape_string($_POST['aff_admin_title'] ?? '');
      $aff_admin_address = $conn->real_escape_string($_POST['aff_admin_address'] ?? '');

      //=====================================================================late_reg
      $late_name = $conn->real_escape_string($_POST['late_name'] ?? '');
      $late_address = $conn->real_escape_string($_POST['late_address'] ?? '');
      $late_marriage_type = $conn->real_escape_string($_POST['late_marriage_type'] ?? '');
      $late_marriage_with = $conn->real_escape_string($_POST['late_marriage_with'] ?? '');
      $late_marriage_in = $conn->real_escape_string($_POST['late_marriage_in'] ?? '');
      $late_marriage_on = $conn->real_escape_string($_POST['late_marriage_on'] ?? '');
      $late_mrg_husband = $conn->real_escape_string($_POST['late_mrg_h'] ?? '');
      $late_mrg_wife = $conn->real_escape_string($_POST['late_mrg_w'] ?? '');
      $solemnized_by = $conn->real_escape_string($_POST['solemnized_by'] ?? '');
      $late_sect_type = $conn->real_escape_string($_POST['late_sect_type'] ?? '');
      $late_mrg_type = $conn->real_escape_string($_POST['late_mrg_type'] ?? '');
      $late_mrg_no = $conn->real_escape_string($_POST['late_mrg_no'] ?? '');
      $late_sign_year  = !empty($_POST['late_sign_year']) ? (int)$_POST['late_sign_year'] : 0;
      $late_sworn_year = !empty($_POST['late_sworn_year']) ? (int)$_POST['late_sworn_year'] : 0;
      $late_under_art = $conn->real_escape_string($_POST['late_under_art'] ?? '');
      $late_h_citizen = $conn->real_escape_string($_POST['late_h_citizen'] ?? '');
      $late_w_citizen = $conn->real_escape_string($_POST['late_w_citizen'] ?? '');
      $late_h_citizen1 = $conn->real_escape_string($_POST['late_h_citizen1'] ?? '');
      $late_w_citizen1 = $conn->real_escape_string($_POST['late_w_citizen1'] ?? '');
      $late_reason = $conn->real_escape_string($_POST['late_reason'] ?? '');
      $late_sign_day = $conn->real_escape_string($_POST['late_sign_day'] ?? '');
      $late_sign_month = $conn->real_escape_string($_POST['late_sign_month'] ?? '');
      $late_sign_year = $conn->real_escape_string($_POST['late_sign_year'] ?? '');
      $late_sign_at = $conn->real_escape_string($_POST['late_sign_at'] ?? '');
      $affiant_name = $conn->real_escape_string($_POST['affiant_name'] ?? '');
      $late_sworn_day = $conn->real_escape_string($_POST['late_sworn_day'] ?? '');
      $late_sworn_month = $conn->real_escape_string($_POST['late_sworn_month'] ?? '');
      $late_sworn_year = $conn->real_escape_string($_POST['late_sworn_year'] ?? '');
      $late_sworn_at = $conn->real_escape_string($_POST['late_sworn_at'] ?? '');
      $late_ctc = $conn->real_escape_string($_POST['late_ctc'] ?? '');
      $late_issued_on = $conn->real_escape_string($_POST['late_issued_on'] ?? '');
      $late_issued_at = $conn->real_escape_string($_POST['late_issued_at'] ?? '');
      $late_sworn_name = $conn->real_escape_string($_POST['late_sworn_name'] ?? '');
      $late_sworn_position = $conn->real_escape_string($_POST['late_sworn_position'] ?? '');
      $late_sworn_address = $conn->real_escape_string($_POST['late_sworn_address'] ?? '');

      // --- FIX 3: Use the same connection for IDs to avoid mismatch ---
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "geronamarriage";

      $conn2 = new mysqli($servername, $username, $password, $dbname);
      if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
      }

      $sql = "INSERT INTO no_tbl (registry_no, status) VALUES ('$registry_no', '0')";
      if ($conn2->query($sql) === TRUE) {
      $no = $conn2->insert_id; 
      }

      // Execute main inserts
      $conn->query("INSERT INTO registration_tbl VALUES ('$registry_no', '$book_no', '$page_no', '$province', '$municipal', '$date', '$time', '$e_name', '$u_date', '$u_time', '$u_name','$no')");
      $conn->query("INSERT INTO husband_tbl VALUES ('$registry_no', '$husband_lname', '$husband_fname', '$husband_mname', '$husband_bdate', '$husband_age', '$husband_bplace', '$husband_sex', '$husband_citizen', '$husband_residence', '$husband_religion', '$husband_cstatus', '$husband_father_name', '$husband_father_citizen', '$husband_mother_name', '$husband_mother_citizen', '$husband_person_name', '$husband_person_rel', '$husband_person_residence', '$no')");
      $conn->query("INSERT INTO wife_tbl VALUES ('$registry_no', '$wife_lname', '$wife_fname', '$wife_mname', '$wife_bdate', '$wife_age', '$wife_bplace', '$wife_sex', '$wife_citizen', '$wife_residence', '$wife_religion', '$wife_cstatus', '$wife_father_name', '$wife_father_citizen', '$wife_mother_name', '$wife_mother_citizen', '$wife_person_name', '$wife_person_rel', '$wife_person_residence', '$no')");
      $conn->query("INSERT INTO marriage_tbl VALUES ('$registry_no', '$mrg_brgy', '$mrg_city', '$mrg_province', '$mrg_date', '$mrg_time', '$husband_name', '$wife_name', '$certify_type', '$mrg_days', '$mrg_months', '$mrg_years', '$mrg_solemn_type', '$mrg_license_no', '$mrg_license_on', '$mrg_license_at', '$no_license_art', '$mrg_solemn_name', '$mrg_solemn_position', '$mrg_solemn_other', '$no')");
      $conn->query("INSERT INTO receive_civil_tbl VALUES ('$registry_no', '$received_name', '$received_position', '$civil_name', '$civil_position', '$received_date', '$civil_date', '$no')");
      $conn->query("INSERT INTO remarks_tbl VALUES ('$registry_no', '$remarks', '$no')");
      $conn->query("INSERT INTO witness_tbl VALUES ('$registry_no', '$witness1', '$witness2', '$witness3', '$witness4', '$witness5', '$witness6', '$witness7', '$witness8', '$witness9', '$witness10', '$witness11', '$witness12', '$no')");
      $conn->query("INSERT INTO aff_solemn_tbl VALUES ('$registry_no', '$aff_solemn_name', '$aff_solemn_of', '$aff_solemn_at', '$aff_hus_name', '$aff_wife_name', '$aff_2type', '$aff_1party', '$aff_2party', '$aff_sign_day', '$aff_sign_month', '$aff_sign_year', '$aff_sign_at', '$aff_sign_name', '$aff_sworn_day', '$aff_sworn_month', '$aff_sworn_year', '$aff_sworn_at', '$aff_sworn_ctc', '$aff_issued_on', '$aff_issued_at', '$aff_admin_name', '$aff_admin_title', '$aff_admin_address', '$no')");
      $conn->query("INSERT INTO late_reg_tbl VALUES ('$registry_no', '$late_name', '$late_address', '$late_marriage_type', '$late_marriage_with', '$late_marriage_in', '$late_marriage_on', '$late_mrg_husband', '$late_mrg_wife', '$solemnized_by', '$late_sect_type', '$late_mrg_type', '$late_mrg_no', '$late_mrg_issued_on', '$late_mrg_issued_at', '$late_under_art', '$late_h_citizen', '$late_w_citizen', '$late_h_citizen1', '$late_w_citizen1', '$late_reason', '$late_sign_day', '$late_sign_month', '$late_sign_year', '$late_sign_at', '$affiant_name', '$late_sworn_day', '$late_sworn_month', '$late_sworn_year', '$late_sworn_at', '$late_ctc', '$late_issued_on', '$late_issued_at', '$late_sworn_name', '$late_sworn_position', '$late_sworn_address', '$no')");

      header('location: marriage_records.php');
      mysqli_close($conn);
    }
?>