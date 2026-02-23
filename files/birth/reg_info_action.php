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
      $date = $_POST['civil_date'];
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
      $child_birth_date = $_POST['birth_day'];

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

      /*$no = mysqli_insert_id($conn);

      $sql = "INSERT INTO no_tbl VALUES ('$no', '$registry_no', 0)";
      $result = $conn->query($sql); */

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "geronacris";

      // Create connection
      $conn2 = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn2->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO no_tbl (registry_no, status)
      VALUES ('$registry_no', '0')";

      if ($conn2->query($sql) === TRUE) {
        $no = $conn2->insert_id;
      }



     
      $sql = "INSERT INTO registration_tbl VALUES ('$registry_no', '$book_no', '$page_no', '$province', '$municipal', '$date', '$time', '$e_name', '$u_date', '$u_time', '$u_name', '$no')";
      $result = $conn->query($sql);


      

  
      $sql = "INSERT INTO child_tbl VALUES ('$registry_no', '$child_lname', '$child_fname', '$child_mname', '$child_sex', '$child_birth_date', '$birth_brgy', '$birth_city', '$birth_province', '$birth_type', '$multi_birth_was', '$birth_order', '$birth_weight', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO mother_tbl VALUES ('$registry_no', '$mother_lname', '$mother_fname', '$mother_mname', '$mother_citizen', '$mother_sect', '$mother_brgy', '$mother_city', '$mother_province', '$mother_country', '$mother_occupation', '$mother_age', '$ttl_no_child', '$no_child_dead', '$no_child_alive', '$marriage_date', '$marriage_place', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO father_tbl VALUES ('$registry_no', '$father_lname', '$father_fname', '$father_mname', '$father_age', '$father_sect', '$father_citizen', '$father_brgy', '$father_city', '$father_province', '$father_country', '$father_occupation', '$marriage_date', '$marriage_place', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO att_inf_tbl VALUES ('$registry_no', '$attendant_type', '$birth_time', '$attendant_name', '$attendant_position', '$attendant_address', '$informant_name', '$rel_child', '$informant_address', '$prepared_name', '$prepared_position', '$attendant_date', '$informant_date', '$prepared_date', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO receive_civil_tbl VALUES ('$registry_no', '$received_name', '$received_position', '$civil_name', '$civil_position', '$received_date', '$civil_date', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO remarks_tbl VALUES ('$registry_no', '$remarks', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO admission_paternity_tbl VALUES ('$registry_no', '$father_name', '$mother_name', '$child_name', '$birth_date', '$birth_place', '$sworn_day', '$sworn_month', '$sworn_year', '$birth_gender', '$sworn_ctc', '$sworn_issuedon', '$sworn_issuedat', '$sworn_name', '$sworn_position', '$sworn_address', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO late_reg_tbl VALUES ('$registry_no', '$late_name', '$late_address', '$late_birth_type', '$late_birth_of', '$late_birth_in', '$late_birth_on', '$attend_birth_by', '$who_resides_at', '$late_citizen', '$married_type', '$married_on', '$married_at', '$not_married_name', '$late_reg_reason', '$applicant_only', '$applicant_than_owner', '$sign_day', '$sign_month', '$sign_year', '$sign_at', '$affiant_name', '$late_sworn_day', '$late_sworn_month', '$late_sworn_year', '$late_sworn_at', '$late_ctc', '$late_issued_on', '$late_issued_at', '$late_sworn_name', '$late_sworn_position', '$late_sworn_address', '$no')";
      $result = $conn->query($sql);

      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";


      header('location: birth_records.php');

      mysqli_close($conn);
	}

?>