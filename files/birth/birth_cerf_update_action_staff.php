<?php
    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    if(isset($_POST['birth_update']) && isset($_POST['reg_no'])) 
    {
      $reg_no = $conn->real_escape_string($_POST['reg_no']);
      $registry_no = $conn->real_escape_string($_POST['registry_no'] ?? '');
      $book_no = $_POST['book_no'] ?? '';
      $page_no = $_POST['page_no'] ?? '';
      $province = $conn->real_escape_string($_POST['provinces'] ?? '');
      $municipal = $conn->real_escape_string($_POST['municipals'] ?? '');
      $u_date = date("Y-m-d");
      $u_time = $_POST['time'] ?? '';
      $u_name = $conn->real_escape_string($_POST['emp_name'] ?? '');

      //==============================child_info=======================================
      $child_lname = $conn->real_escape_string($_POST['child_lname'] ?? '');
      $child_fname = $conn->real_escape_string($_POST['child_fname'] ?? '');
      $child_mname = $conn->real_escape_string($_POST['child_mname'] ?? '');
      
      // FIXED: Form uses name="sex", not child_sex
      $child_sex = $conn->real_escape_string($_POST['sex'] ?? ''); 
      
      // FORMAT FIX: The database strictly requires YYYY-MM-DD format!
      $raw_bd = $_POST['birth_day'] ?? '';
      $child_birth_date = (!empty($raw_bd)) ? date("Y-m-d", strtotime($raw_bd)) : '';

      $birth_brgy = $conn->real_escape_string($_POST['birth_brgy'] ?? '');
      $birth_city = $conn->real_escape_string($_POST['birth_city'] ?? '');
      $birth_province = $conn->real_escape_string($_POST['birth_province'] ?? '');
      $birth_type = $conn->real_escape_string($_POST['birth_type'] ?? '');
      $multi_birth_was = $conn->real_escape_string($_POST['multi_birth_was'] ?? '');
      $birth_order = $conn->real_escape_string($_POST['birth_order'] ?? '');
      $birth_weight = $conn->real_escape_string($_POST['birth_weight'] ?? '');

      //==========================mother_info===========================================
      $mother_lname = $conn->real_escape_string($_POST['mother_lname'] ?? '');
      $mother_fname = $conn->real_escape_string($_POST['mother_fname'] ?? '');
      $mother_mname = $conn->real_escape_string($_POST['mother_mname'] ?? '');
      $mother_citizen = $conn->real_escape_string($_POST['mother_citizen'] ?? '');
      $mother_sect = $conn->real_escape_string($_POST['mother_sect'] ?? '');
      $ttl_no_child = $conn->real_escape_string($_POST['ttl_no_child'] ?? '');
      $no_child_alive = $conn->real_escape_string($_POST['no_child_alive'] ?? '');
      $no_child_dead = $conn->real_escape_string($_POST['no_child_dead'] ?? '');
      $mother_occupation = $conn->real_escape_string($_POST['mother_occupation'] ?? '');
      $mother_age = $conn->real_escape_string($_POST['mother_age'] ?? '');
      $mother_brgy = $conn->real_escape_string($_POST['mother_brgy'] ?? '');
      $mother_city = $conn->real_escape_string($_POST['mother_city'] ?? '');
      $mother_province = $conn->real_escape_string($_POST['mother_province'] ?? '');
      $mother_country = $conn->real_escape_string($_POST['mother_country'] ?? '');

      //===============================father info=======================================
      $father_lname = $conn->real_escape_string($_POST['father_lname'] ?? '');
      $father_fname = $conn->real_escape_string($_POST['father_fname'] ?? '');
      $father_mname = $conn->real_escape_string($_POST['father_mname'] ?? '');
      $father_citizen = $conn->real_escape_string($_POST['father_citizen'] ?? '');
      $father_sect = $conn->real_escape_string($_POST['father_sect'] ?? '');
      $father_occupation = $conn->real_escape_string($_POST['father_occupation'] ?? '');
      $father_age = $conn->real_escape_string($_POST['father_age'] ?? '');
      $father_brgy = $conn->real_escape_string($_POST['father_brgy'] ?? '');
      $father_city = $conn->real_escape_string($_POST['father_city'] ?? '');
      $father_province = $conn->real_escape_string($_POST['father_province'] ?? '');
      $father_country = $conn->real_escape_string($_POST['father_country'] ?? '');
      
      //marriage_info
      $marriage_date = $conn->real_escape_string($_POST['marriage_date'] ?? '');
      $marriage_place = $conn->real_escape_string($_POST['marriage_place'] ?? '');

      //==========================attendant_informant_prepared====================================
      // FIXED: Added isset() to prevent fatal crash if boxes are unchecked
      if(isset($_POST['attendant1']) && $_POST['attendant1'] == 'Physician'){
        $attendant_type = $_POST['attendant1'];   
      }else if(isset($_POST['attendant2']) && $_POST['attendant2'] == 'Nurse'){
        $attendant_type = $_POST['attendant2'];   
      }else if(isset($_POST['attendant3']) && $_POST['attendant3'] == 'Midwife'){
        $attendant_type = $_POST['attendant3'];   
      }else if(isset($_POST['attendant4']) && $_POST['attendant4'] == 'Hilot'){
        $attendant_type = $_POST['attendant4'];   
      }else{
        $attendant_type = $conn->real_escape_string($_POST['attendant5'] ?? '');   
      }
      
      // FIXED: Merge attendant address 1 and 2
      $att_add1 = $_POST['attendant_address1'] ?? '';
      $att_add2 = $_POST['attendant_address2'] ?? '';
      $attendant_address = $conn->real_escape_string(trim($att_add1 . ' ' . $att_add2));

      $birth_time = $conn->real_escape_string($_POST['birth_time'] ?? '');
      $attendant_name = $conn->real_escape_string($_POST['attendant_name'] ?? '');
      $attendant_position = $conn->real_escape_string($_POST['attendant_position'] ?? '');
      
      $informant_name = $conn->real_escape_string($_POST['informant_name'] ?? '');
      $rel_child = $conn->real_escape_string($_POST['rel_child'] ?? '');
      $informant_address = $conn->real_escape_string($_POST['informant_address'] ?? '');
      
      $prepared_name = $conn->real_escape_string($_POST['prepared_name'] ?? '');
      $prepared_position = $conn->real_escape_string($_POST['prepared_position'] ?? '');
      
      $attendant_date = $conn->real_escape_string($_POST['attendant_date'] ?? '');
      $informant_date = $conn->real_escape_string($_POST['informant_date'] ?? '');
      $prepared_date = $conn->real_escape_string($_POST['prepared_date'] ?? '');

      //==============================receive_civil=========================================
      $received_name = $conn->real_escape_string($_POST['received_name'] ?? '');
      $received_position = $conn->real_escape_string($_POST['received_position'] ?? '');
      $civil_name = $conn->real_escape_string($_POST['civil_name'] ?? '');
      $civil_position = $conn->real_escape_string($_POST['civil_position'] ?? '');
      $received_date = $conn->real_escape_string($_POST['received_date'] ?? '');
      $civil_date = $conn->real_escape_string($_POST['civil_date'] ?? '');

       //===================================remarks===========================================
      $remarks = $conn->real_escape_string($_POST['remarks'] ?? '');
      $remarks = preg_replace("#\[sp\]#", "&nbsp;", $remarks);
      $remarks = preg_replace("#\[nl\]#", "<br>\n", $remarks);

      //======================================paternity=====================================
      $father_name = $conn->real_escape_string($_POST['father_name'] ?? '');
      $mother_name = $conn->real_escape_string($_POST['mother_name'] ?? '');
      $child_name = $conn->real_escape_string($_POST['child_name'] ?? '');
      $birth_date = $conn->real_escape_string($_POST['birth_date'] ?? '');
      $birth_place = $conn->real_escape_string($_POST['birth_place'] ?? '');
      $sworn_day = $conn->real_escape_string($_POST['ack_sworn_day'] ?? '');
      $sworn_month = $conn->real_escape_string($_POST['ack_sworn_month'] ?? '');
      $sworn_year = $conn->real_escape_string($_POST['ack_sworn_year'] ?? '');

      $birth_gender = $_POST['birth_gender'] ?? '';
      $sworn_ctc = $conn->real_escape_string($_POST['ack_ctc'] ?? '');
      $sworn_issuedon = $conn->real_escape_string($_POST['ack_issued_on'] ?? '');
      $sworn_issuedat = $conn->real_escape_string($_POST['ack_issued_at'] ?? '');
      $sworn_name = $conn->real_escape_string($_POST['ack_sworn_name'] ?? '');
      $sworn_position = $conn->real_escape_string($_POST['ack_sworn_position'] ?? '');
      $sworn_address = $conn->real_escape_string($_POST['ack_sworn_address'] ?? '');

      //======================================late registration================================
      $late_name = $conn->real_escape_string($_POST['late_name'] ?? '');
      $late_address = $conn->real_escape_string($_POST['late_address'] ?? '');
      $late_birth_type = $conn->real_escape_string($_POST['late_birth_type'] ?? '');
      
      $late_birth_in = '';
      $late_birth_on = '';
      $late_birth_of = '';

      // FIXED: Form uses late_birth_in2 and late_birth_on2
      if($late_birth_type == 'my birth'){
            $late_birth_in = $conn->real_escape_string($_POST['late_birth_in'] ?? '');
            $late_birth_on = $conn->real_escape_string($_POST['late_birth_on'] ?? '');
      }else if($late_birth_type == 'the birth'){
            $late_birth_of = $conn->real_escape_string($_POST['late_birth_of'] ?? '');
            $late_birth_in = $conn->real_escape_string($_POST['late_birth_in2'] ?? '');
            $late_birth_on = $conn->real_escape_string($_POST['late_birth_on2'] ?? '');  
      }
      
      $attend_birth_by = $conn->real_escape_string($_POST['attend_birth_by'] ?? '');
      $who_resides_at = $conn->real_escape_string($_POST['who_resides_at'] ?? '');
      $late_citizen = $conn->real_escape_string($_POST['late_citizen'] ?? '');
      $married_type = $conn->real_escape_string($_POST['married_type'] ?? '');
      $married_on = $conn->real_escape_string($_POST['married_on'] ?? '');
      $married_at = $conn->real_escape_string($_POST['married_at'] ?? '');
      $not_married_name = $conn->real_escape_string($_POST['not_married_name'] ?? '');
      
      // FIXED: Merge late_reason_1 and late_reason_2
      $lr1 = $_POST['late_reason_1'] ?? '';
      $lr2 = $_POST['late_reason_2'] ?? '';
      $late_reg_reason = $conn->real_escape_string(trim($lr1 . ' ' . $lr2));

      $applicant_only = $conn->real_escape_string($_POST['applicant_only'] ?? '');
      $applicant_than_owner = $conn->real_escape_string($_POST['applicant_than_owner'] ?? '');
      $sign_day = $conn->real_escape_string($_POST['sign_day'] ?? '');
      $sign_month = $conn->real_escape_string($_POST['sign_month'] ?? '');
      $sign_year = $conn->real_escape_string($_POST['sign_year'] ?? '');
      $sign_at = $conn->real_escape_string($_POST['sign_at'] ?? '');
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

      //==============================database=====================================
      $sql = "UPDATE no_tbl SET registry_no='$registry_no' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE registration_tbl SET registry_no='$registry_no', book_no='$book_no', page_no='$page_no', province='$province', municipal='$municipal', update_date='$u_date', update_time='$u_time', update_user='$u_name' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE child_tbl SET registry_no='$registry_no', child_lname='$child_lname', child_fname='$child_fname', child_mname='$child_mname', child_sex='$child_sex', child_birth_date='$child_birth_date', birth_brgy='$birth_brgy', birth_municipal='$birth_city', birth_province='$birth_province', birth_type='$birth_type', if_multi_birth_was='$multi_birth_was', birth_order='$birth_order', birth_weight='$birth_weight' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE mother_tbl SET registry_no='$registry_no', mother_lname='$mother_lname', mother_fname='$mother_fname', mother_mname='$mother_mname', mother_citizen='$mother_citizen', mother_religion='$mother_sect', mother_brgy='$mother_brgy', mother_municipal='$mother_city', mother_province='$mother_province', mother_country='$mother_country', mother_occupation='$mother_occupation', mother_age='$mother_age', ttl_no_child='$ttl_no_child', no_child_dead='$no_child_dead', no_child_alive='$no_child_alive',  marriage_date='$marriage_date', marriage_place='$marriage_place' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE father_tbl SET registry_no='$registry_no', father_lname='$father_lname', father_fname='$father_fname', father_mname='$father_mname', father_age='$father_age', father_religion='$father_sect', father_citizen='$father_citizen', father_brgy='$father_brgy', father_municipal='$father_city', father_province='$father_province', father_country='$father_country', father_occupation='$father_occupation', marriage_date='$marriage_date', marriage_place='$marriage_place' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE att_inf_tbl SET registry_no='$registry_no', attendant_type='$attendant_type', birth_time='$birth_time', attendant_name='$attendant_name', attendant_position='$attendant_position', attendant_address='$attendant_address', informant_name='$informant_name', rel_child='$rel_child', informant_address='$informant_address', prepared_name='$prepared_name', prepared_position='$prepared_position', attendant_date='$attendant_date', informant_date='$informant_date', prepared_date='$prepared_date' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE receive_civil_tbl SET registry_no='$registry_no', received_name='$received_name', received_position='$received_position', civil_name='$civil_name', civil_position='$civil_position', received_date='$received_date', civil_date='$civil_date' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE remarks_tbl SET registry_no='$registry_no', remarks='$remarks' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE admission_paternity_tbl SET registry_no='$registry_no', father_name='$father_name', mother_name='$mother_name', child_name='$child_name', birth_date='$birth_date', birth_place='$birth_place', sworn_day ='$sworn_day', sworn_month ='$sworn_month', sworn_year ='$sworn_year', child_gender='$birth_gender', ctc='$sworn_ctc', issued_on='$sworn_issuedon', issued_at='$sworn_issuedat', administer_name='$sworn_name', administer_position='$sworn_position', administer_address='$sworn_address' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      $sql = "UPDATE late_reg_tbl SET registry_no='$registry_no', late_name='$late_name', late_address='$late_address', late_birth_type='$late_birth_type', late_birth_of='$late_birth_of', late_birth_in='$late_birth_in', late_birth_on='$late_birth_on', attend_birth_by='$attend_birth_by', who_resides_at='$who_resides_at', late_citizen='$late_citizen', married_type='$married_type', married_on='$married_on', married_at='$married_at', not_married_name='$not_married_name', late_reg_reason='$late_reg_reason', applicant_only='$applicant_only', applicant_than_owner='$applicant_than_owner', sign_day='$sign_day', sign_month='$sign_month', sign_year='$sign_year', sign_at='$sign_at', affiant_name='$affiant_name', late_sworn_day='$late_sworn_day', late_sworn_month='$late_sworn_month', late_sworn_year='$late_sworn_year', late_sworn_at='$late_sworn_at', late_ctc='$late_ctc', late_issued_on='$late_issued_on', late_issued_at='$late_issued_at', late_administer_name='$late_sworn_name', late_administer_position='$late_sworn_position', late_administer_address='$late_sworn_address' WHERE no = '$reg_no'";
      $result = $conn->query($sql);

      if (!$result) echo "UPDATE failed: $sql<br>" . $conn->error . "<br><br>";

      // Go back to previous page
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit();

      mysqli_close($conn);
    }
?>