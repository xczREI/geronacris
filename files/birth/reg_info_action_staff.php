<?php
    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $error = array();

    if (isset($_POST['add_birth'])) 
    {
      //====================reg_info===========================================
      $registry_no = $conn->real_escape_string($_POST['registry_no']);
      $book_no = $_POST['book_no'];
      $page_no = $_POST['page_no'];
      $province = $conn->real_escape_string($_POST['provinces']);
      $municipal = $conn->real_escape_string($_POST['municipals']);
      $date = date("Y-m-d");
      $time = $_POST['time'];
      $e_name = $conn->real_escape_string($_POST['emp_name']);
      $u_date = date("Y-m-d");
      $u_time = $_POST['time'];
      $u_name = $conn->real_escape_string($_POST['emp_name']);

      //=====================child_info==========================================
      $child_lname = $conn->real_escape_string($_POST['child_lname']);
      $child_fname = $conn->real_escape_string($_POST['child_fname']);
      $child_mname = $conn->real_escape_string($_POST['child_mname']);
      $child_sex = $conn->real_escape_string($_POST['sex']);
      // FORMAT FIX: The database strictly requires YYYY-MM-DD format!
      $raw_bd = $_POST['birth_day'] ?? '';
      $child_birth_date = (!empty($raw_bd)) ? date("Y-m-d", strtotime($raw_bd)) : '';

      $birth_brgy = $conn->real_escape_string($_POST['birth_brgy']);
      $birth_city = $conn->real_escape_string($_POST['birth_city']);
      $birth_province = $conn->real_escape_string($_POST['birth_province']);
      $birth_type = $conn->real_escape_string($_POST['birth_type']);
      $multi_birth_was = $conn->real_escape_string($_POST['multi_birth_was']);
      $birth_order = $conn->real_escape_string($_POST['birth_order']);
      $birth_weight = $conn->real_escape_string($_POST['birth_weight']);

      //============================mother_info===================================
      $mother_lname = $conn->real_escape_string($_POST['mother_lname']);
      $mother_fname = $conn->real_escape_string($_POST['mother_fname']);
      $mother_mname = $conn->real_escape_string($_POST['mother_mname']);
      $mother_citizen = $conn->real_escape_string($_POST['mother_citizen']);
      $mother_sect = $conn->real_escape_string($_POST['mother_sect']);
      $ttl_no_child = $conn->real_escape_string($_POST['ttl_no_child']);
      $no_child_alive = $conn->real_escape_string($_POST['no_child_alive']);
      $no_child_dead = $conn->real_escape_string($_POST['no_child_dead']);
      $mother_occupation = $conn->real_escape_string($_POST['mother_occupation']);
      $mother_age = $conn->real_escape_string($_POST['mother_age']);
      $mother_brgy = $conn->real_escape_string($_POST['mother_brgy']);
      $mother_city = $conn->real_escape_string($_POST['mother_city']);
      $mother_province = $conn->real_escape_string($_POST['mother_province']);
      $mother_country = $conn->real_escape_string($_POST['mother_country']);

      //==========================father info=======================================
      $father_lname = $conn->real_escape_string($_POST['father_lname']);
      $father_fname = $conn->real_escape_string($_POST['father_fname']);
      $father_mname = $conn->real_escape_string($_POST['father_mname']);
      $father_citizen = $conn->real_escape_string($_POST['father_citizen']);
      $father_sect = $conn->real_escape_string($_POST['father_sect']);
      $father_occupation = $conn->real_escape_string($_POST['father_occupation']);
      $father_age = $conn->real_escape_string($_POST['father_age']);
      $father_brgy = $conn->real_escape_string($_POST['father_brgy']);
      $father_city = $conn->real_escape_string($_POST['father_city']);
      $father_province = $conn->real_escape_string($_POST['father_province']);
      $father_country = $conn->real_escape_string($_POST['father_country']);

      //====================================marriage_info===========================
      $marriage_date = $_POST['marriage_date'];
      $marriage_place = $conn->real_escape_string($_POST['marriage_place']);

      //=================attendant_informant_prepared===============================
      if($_POST['attendant1'] == 'Physician'){
        $attendant_type = $_POST['attendant1'];   
      }else if($_POST['attendant2'] == 'Nurse'){
        $attendant_type = $_POST['attendant2'];   
      }else if($_POST['attendant3'] == 'Midwife'){
        $attendant_type = $_POST['attendant3'];   
      }else if($_POST['attendant4'] == 'Hilot'){
        $attendant_type = $_POST['attendant4'];   
      }else{
        $attendant_type = $conn->real_escape_string($_POST['attendant5']);   
      }
      $birth_time = $conn->real_escape_string($_POST['birth_time']);
      $attendant_name = $conn->real_escape_string($_POST['attendant_name']);
      $attendant_position = $conn->real_escape_string($_POST['attendant_position']);
      $attendant_address = $conn->real_escape_string($_POST['attendant_address1'].' '.$_POST['attendant_address2']);
      $informant_name = $conn->real_escape_string($_POST['informant_name']);
      $rel_child = $conn->real_escape_string($_POST['rel_child']);
      $informant_address = $conn->real_escape_string($_POST['informant_address']);
      $prepared_name = $conn->real_escape_string($_POST['prepared_name']);
      $prepared_position = $conn->real_escape_string($_POST['prepared_position']);
      $attendant_date = $conn->real_escape_string($_POST['attendant_date']);
      $informant_date = $conn->real_escape_string($_POST['informant_date']);
      $prepared_date = $conn->real_escape_string($_POST['prepared_date']);

      //============================receive_civil====================================
      $received_name = $conn->real_escape_string($_POST['received_name']);
      $received_position = $conn->real_escape_string($_POST['received_position']);
      $civil_name = $conn->real_escape_string($_POST['civil_name']);
      $civil_position = $conn->real_escape_string($_POST['civil_position']);
      $received_date = $conn->real_escape_string($_POST['received_date']);
      $civil_date = $conn->real_escape_string($_POST['civil_date']);

       //===========================remarks==========================================
      $remarks = $conn->real_escape_string($_POST['remarks']);
      $remarks = preg_replace("#\[sp\]#", "&nbsp;", $remarks);
      $remarks = preg_replace("#\[nl\]#", "<br>\n", $remarks);

      //============================paternity=======================================
      $father_name = $conn->real_escape_string($_POST['father_name']);
      $mother_name = $conn->real_escape_string($_POST['mother_name']);
      $child_name = $conn->real_escape_string($_POST['child_name']);
      $birth_date = $conn->real_escape_string($_POST['birth_date']);
      $birth_place = $conn->real_escape_string($_POST['birth_place']);
      $sworn_day = $conn->real_escape_string($_POST['ack_sworn_day']);
      $sworn_month = $conn->real_escape_string($_POST['ack_sworn_month']);
      $sworn_year = $conn->real_escape_string($_POST['ack_sworn_year']);

      $birth_gender = $_POST['birth_gender'];
      $sworn_ctc = $conn->real_escape_string($_POST['ack_ctc']);
      $sworn_issuedon = $conn->real_escape_string($_POST['ack_issued_on']);
      $sworn_issuedat = $conn->real_escape_string($_POST['ack_issued_at']);
      $sworn_name = $conn->real_escape_string($_POST['ack_sworn_name']);
      $sworn_position = $conn->real_escape_string($_POST['ack_sworn_position']);
      $sworn_address = $conn->real_escape_string($_POST['ack_sworn_address']);

      //===============================late registration=============================
      $late_name = $conn->real_escape_string($_POST['late_name']);
      $late_address = $conn->real_escape_string($_POST['late_address']);
      $late_birth_type = $conn->real_escape_string($_POST['late_birth_type']);
      $late_birth_of = $conn->real_escape_string($_POST['late_birth_of']);
      $late_birth_in = $conn->real_escape_string($_POST['late_birth_in']);
      $late_birth_on = $conn->real_escape_string($_POST['late_birth_on']);
      $attend_birth_by = $conn->real_escape_string($_POST['attend_birth_by']);
      $who_resides_at = $conn->real_escape_string($_POST['who_resides_at']);
      $late_citizen = $conn->real_escape_string($_POST['late_citizen']);
      $married_type = $conn->real_escape_string($_POST['married_type']);
      $married_on = $conn->real_escape_string($_POST['married_on']);
      $married_at = $conn->real_escape_string($_POST['married_at']);
      $not_married_name = $conn->real_escape_string($_POST['not_married_name']);
      $late_reg_reason = $conn->real_escape_string($_POST['late_reason_1'].' '.$_POST['late_reason_2']);
      $applicant_only = $conn->real_escape_string($_POST['applicant_only']);
      $applicant_than_owner = $conn->real_escape_string($_POST['applicant_than_owner']);
      $sign_day = $conn->real_escape_string($_POST['sign_day']);
      $sign_month = $conn->real_escape_string($_POST['sign_month']);
      $sign_year = $conn->real_escape_string($_POST['sign_year']);
      $sign_at = $conn->real_escape_string($_POST['sign_at']);
      $affiant_name = $conn->real_escape_string($_POST['affiant_name']);
      $late_sworn_day = $conn->real_escape_string($_POST['late_sworn_day']);
      $late_sworn_month = $conn->real_escape_string($_POST['late_sworn_month']);
      $late_sworn_year = $conn->real_escape_string($_POST['late_sworn_year']);
      $late_sworn_at = $conn->real_escape_string($_POST['late_sworn_at']);
      $late_ctc = $conn->real_escape_string($_POST['late_ctc']);
      $late_issued_on = $conn->real_escape_string($_POST['late_issued_on']);
      $late_issued_at = $conn->real_escape_string($_POST['late_issued_at']);
      $late_sworn_name = $conn->real_escape_string($_POST['late_sworn_name']);
      $late_sworn_position = $conn->real_escape_string($_POST['late_sworn_position']);
      $late_sworn_address = $conn->real_escape_string($_POST['late_sworn_address']);

      //=======================================database=======================================
      // Use the connection established at the top with variables from login_db_birth.php
      
      // 1. Initialize no_tbl and get the shared 'no' ID
      $sql_no = "INSERT INTO no_tbl (registry_no, status) VALUES ('$registry_no', '0')";
      if ($conn->query($sql_no)) {
          $no = $conn->insert_id;
      } else {
          // Fallback if no_tbl doesn't have auto-increment
          $res = $conn->query("SELECT MAX(no) AS max_no FROM registration_tbl");
          $row_no = $res->fetch_assoc();
          $no = (int)($row_no['max_no'] ?? 0) + 1;
      }

      // --- CRITICAL FIX: Explicitly name columns to match Admin version and ensure reliability ---
      
      $sql1 = "INSERT INTO registration_tbl (no, registry_no, book_no, page_no, province, municipal, reg_date, reg_time, reg_user, update_date, update_time, update_user) 
               VALUES ($no, '$registry_no', '$book_no', '$page_no', '$province', '$municipal', '$date', '$time', '$e_name', '0000-00-00', '00:00:00', '')";
      $conn->query($sql1);

      $sql2 = "INSERT INTO child_tbl (no, registry_no, child_lname, child_fname, child_mname, child_sex, child_birth_date, birth_brgy, birth_municipal, birth_province, birth_type, if_multi_birth_was, birth_order, birth_weight) 
               VALUES ($no, '$registry_no', '$child_lname', '$child_fname', '$child_mname', '$child_sex', '$child_birth_date', '$birth_brgy', '$birth_city', '$birth_province', '$birth_type', '$multi_birth_was', '$birth_order', '$birth_weight')";
      $conn->query($sql2);

      $sql3 = "INSERT INTO mother_tbl (no, registry_no, mother_lname, mother_fname, mother_mname, mother_citizen, mother_religion, mother_brgy, mother_municipal, mother_province, mother_country, mother_occupation, mother_age, ttl_no_child, no_child_dead, no_child_alive, marriage_date, marriage_place) 
               VALUES ($no, '$registry_no', '$mother_lname', '$mother_fname', '$mother_mname', '$mother_citizen', '$mother_sect', '$mother_brgy', '$mother_city', '$mother_province', '$mother_country', '$mother_occupation', '$mother_age', '$ttl_no_child', '$no_child_dead', '$no_child_alive', '$marriage_date', '$marriage_place')";
      $conn->query($sql3);

      $sql4 = "INSERT INTO father_tbl (no, registry_no, father_lname, father_fname, father_mname, father_age, father_religion, father_citizen, father_brgy, father_municipal, father_province, father_country, father_occupation, marriage_date, marriage_place) 
               VALUES ($no, '$registry_no', '$father_lname', '$father_fname', '$father_mname', '$father_age', '$father_sect', '$father_citizen', '$father_brgy', '$father_city', '$father_province', '$father_country', '$father_occupation', '$marriage_date', '$marriage_place')";
      $conn->query($sql4);

      $sql5 = "INSERT INTO att_inf_tbl (no, registry_no, attendant_type, birth_time, attendant_name, attendant_position, attendant_address, informant_name, rel_child, informant_address, prepared_name, prepared_position, attendant_date, informant_date, prepared_date) 
               VALUES ($no, '$registry_no', '$attendant_type', '$birth_time', '$attendant_name', '$attendant_position', '$attendant_address', '$informant_name', '$rel_child', '$informant_address', '$prepared_name', '$prepared_position', '$attendant_date', '$informant_date', '$prepared_date')";
      $conn->query($sql5);

      $sql6 = "INSERT INTO receive_civil_tbl (no, registry_no, received_name, received_position, civil_name, civil_position, received_date, civil_date) 
               VALUES ($no, '$registry_no', '$received_name', '$received_position', '$civil_name', '$civil_position', '$received_date', '$civil_date')";
      $conn->query($sql6);

      $sql7 = "INSERT INTO remarks_tbl (no, registry_no, remarks) 
               VALUES ($no, '$registry_no', '$remarks')";
      $conn->query($sql7);

      $sql8 = "INSERT INTO admission_paternity_tbl (no, registry_no, father_name, mother_name, child_name, birth_date, birth_place, sworn_day, sworn_month, sworn_year, child_gender, ctc, issued_on, issued_at, administer_name, administer_position, administer_address) 
               VALUES ($no, '$registry_no', '$father_name', '$mother_name', '$child_name', '$birth_date', '$birth_place', '$sworn_day', '$sworn_month', '$sworn_year', '$birth_gender', '$sworn_ctc', '$sworn_issuedon', '$sworn_issuedat', '$sworn_name', '$sworn_position', '$sworn_address')";
      $conn->query($sql8);

      $sql9 = "INSERT INTO late_reg_tbl (no, registry_no, late_name, late_address, late_birth_type, late_birth_of, late_birth_in, late_birth_on, attend_birth_by, who_resides_at, late_citizen, married_type, married_on, married_at, not_married_name, late_reg_reason, applicant_only, applicant_than_owner, sign_day, sign_month, sign_year, sign_at, affiant_name, late_sworn_day, late_sworn_month, late_sworn_year, late_sworn_at, late_ctc, late_issued_on, late_issued_at, late_administer_name, late_administer_position, late_administer_address) 
               VALUES ($no, '$registry_no', '$late_name', '$late_address', '$late_birth_type', '$late_birth_of', '$late_birth_in', '$late_birth_on', '$attend_birth_by', '$who_resides_at', '$late_citizen', '$married_type', '$married_on', '$married_at', '$not_married_name', '$late_reg_reason', '$applicant_only', '$applicant_than_owner', '$sign_day', '$sign_month', '$sign_year', '$sign_at', '$affiant_name', '$late_sworn_day', '$late_sworn_month', '$late_sworn_year', '$late_sworn_at', '$late_ctc', '$late_issued_on', '$late_issued_at', '$late_sworn_name', '$late_sworn_position', '$late_sworn_address')";
      $result = $conn->query($sql9);

      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";


      header('location: birth_records_staff.php');

      mysqli_close($conn);
	}

?>