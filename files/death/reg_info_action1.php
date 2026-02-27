<?php

require_once 'login_db_death.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);
    $error = array();

    if (isset($_POST['add_death'])) 
    {
      //==================================reg_info================================
      $registry_no = $conn->real_escape_string($_POST['registry_no'] ?? '');
      $book_no = $_POST['book_no'] ?? '';
      $page_no = $_POST['page_no'] ?? '';
      $province = $conn->real_escape_string($_POST['provinces'] ?? '');
      $municipal = $conn->real_escape_string($_POST['municipal'] ?? '');
      $date = date("Y-m-d");
      $time = $_POST['time'] ?? '';
      $e_name = $conn->real_escape_string($_POST['emp_name'] ?? '');
      $u_date = date("Y-m-d");
      $u_time = $_POST['time'] ?? '';
      $u_name = $conn->real_escape_string($_POST['emp_name'] ?? '');

      //==========================person_info==================================
      $person_lname = $conn->real_escape_string($_POST['deceased_lname'] ?? $_POST['person_lname'] ?? '');
      $person_fname = $conn->real_escape_string($_POST['deceased_fname'] ?? $_POST['person_fname'] ?? '');
      $person_mname = $conn->real_escape_string($_POST['deceased_mname'] ?? $_POST['person_mname'] ?? '');
      $sex = $conn->real_escape_string($_POST['sex'] ?? '');
      $date_birth = $conn->real_escape_string($_POST['date_birth'] ?? '');
      $date_death = $conn->real_escape_string($_POST['date_of_death'] ?? $_POST['date_death'] ?? '');

      // Upgraded Age Logic to match your HTML5 Calendar values
      $age = null;
      $ages = null;
      $age_type = '';

      if(!empty($_POST['age_at_death']) && $_POST['age_at_death'] != 'N/A'){
          $age = $_POST['age_at_death'];
          $age_type = 'YEARS';
      }else if(!empty($_POST['age_one_month']) && $_POST['age_one_month'] != 'N/A'){
          $age = $_POST['age_one_month'];
          $ages = $_POST['age_one_day'] ?? '';  
          $age_type = 'MONTHS';
      }else if(!empty($_POST['age_one_day']) && $_POST['age_one_day'] != 'N/A'){
          $ages = $_POST['age_one_day'];  
          $age_type = 'DAYS';
      }else if(!empty($_POST['age_hrs_hrs']) && $_POST['age_hrs_hrs'] != 'N/A'){
          $age = $_POST['age_hrs_hrs'];
          $ages = $_POST['age_hrs_min'] ?? '';
          $age_type = 'HOURS';
      }

      $death_place = $conn->real_escape_string($_POST['place_of_death'] ?? $_POST['death_place'] ?? '');
      $civil_status = $conn->real_escape_string($_POST['civil_status'] ?? '');
      $religion = $conn->real_escape_string($_POST['religion'] ?? '');
      $citizen = $conn->real_escape_string($_POST['citizenship'] ?? $_POST['citizen'] ?? '');
      $residence = $conn->real_escape_string($_POST['residence'] ?? '');
      $occupation = $conn->real_escape_string($_POST['occupation'] ?? '');
      $father_name = $conn->real_escape_string($_POST['parent_father_name'] ?? $_POST['father_name'] ?? '');
      $mother_name = $conn->real_escape_string($_POST['parent_mother_name'] ?? $_POST['mother_name'] ?? '');

      //================================death cause 8 over_info======================================
      $immediate_cause = $conn->real_escape_string($_POST['immediate_cause'] ?? '');
      $immediate_interval = $conn->real_escape_string($_POST['immediate_interval'] ?? '');
      $antecedent_cause = $conn->real_escape_string($_POST['antecedent_cause'] ?? '');
      $antecedent_interval = $conn->real_escape_string($_POST['antecedent_interval'] ?? '');
      $underlying_cause = $conn->real_escape_string($_POST['underlying_cause'] ?? '');
      $underlying_interval = $conn->real_escape_string($_POST['underlying_interval'] ?? '');
      $other_condition_death = $conn->real_escape_string($_POST['other_condition_death'] ?? '');
      $autopsy = $conn->real_escape_string($_POST['autopsy'] ?? '');
      $maternal_condition = $conn->real_escape_string($_POST['maternal_condition'] ?? '');
      $death_manner = $conn->real_escape_string($_POST['death_manner'] ?? '');
      $place_external_cause = $conn->real_escape_string($_POST['place_external_cause'] ?? '');

      //=======================attendant info=============================================
      if(isset($_POST['attendant']) && $_POST['attendant'] != '') {
        $attendant = $_POST['attendant'];
      } else {
        $attendant = $conn->real_escape_string($_POST['attendant5'] ?? '');   
      }
      $date_from = $_POST['date_from'] ?? '';
      $date_to = $_POST['date_to'] ?? '';
      $certify_type = $conn->real_escape_string($_POST['certify_type'] ?? '');
      $death_time = $conn->real_escape_string($_POST['death_time'] ?? '');
      $attendant_name = $conn->real_escape_string($_POST['attendant_name'] ?? '');
      $attendant_position = $conn->real_escape_string($_POST['attendant_position'] ?? '');
      $attendant_address = $conn->real_escape_string($_POST['attendant_address'] ?? '');
      $reviewed_name = $conn->real_escape_string($_POST['reviewed_name'] ?? '');
      $attendant_date = $conn->real_escape_string($_POST['attendant_date'] ?? '');
      $reviewed_date = $conn->real_escape_string($_POST['reviewed_date'] ?? '');

      //=================================corpse_disposal_info===================================
      $corpse_disposal = $conn->real_escape_string($_POST['corpse_disposition'] ?? $_POST['corpse_disposal'] ?? '');
      $burial_no = $conn->real_escape_string($_POST['burial_no'] ?? '');
      $burial_issued_date = $conn->real_escape_string($_POST['burial_issued_date'] ?? '');
      $transfer_no = $conn->real_escape_string($_POST['transfer_no'] ?? '');
      $transfer_issued_date = $conn->real_escape_string($_POST['transfer_issued_date'] ?? '');
      
      // THE NEW CEMETERY GLUE LOGIC
      $cem_name = trim($_POST['cemetery'] ?? '');
      $cem_mun = trim($_POST['municipalityCemetery'] ?? '');
      $cem_prov = trim($_POST['provinceCemetery'] ?? '');
      
      $cemetery_full = $cem_name;
      if ($cem_mun != '' || $cem_prov != '') {
          $cemetery_full = $cem_name . ' | ' . $cem_mun . ' | ' . $cem_prov;
      }
      $cemetery = $conn->real_escape_string($cemetery_full);

      //============================informant_prepared==================================
      $informant_name = $conn->real_escape_string($_POST['informant_name'] ?? '');
      $rel_death = $conn->real_escape_string($_POST['rel_death'] ?? ''); // FIXED VAR NAME
      $informant_address = $conn->real_escape_string($_POST['informant_address'] ?? '');
      $prepared_name = $conn->real_escape_string($_POST['prepared_name'] ?? '');
      $prepared_position = $conn->real_escape_string($_POST['prepared_position'] ?? '');
      $informant_date = $conn->real_escape_string($_POST['informant_date'] ?? '');
      $prepared_date = $conn->real_escape_string($_POST['prepared_date'] ?? '');

      //================================receive_civil=======================================
      $received_name = $conn->real_escape_string($_POST['received_name'] ?? '');
      $received_position = $conn->real_escape_string($_POST['received_position'] ?? '');
      $civil_name = $conn->real_escape_string($_POST['civil_name'] ?? '');
      $civil_position = $conn->real_escape_string($_POST['civil_position'] ?? '');
      $received_date = $conn->real_escape_string($_POST['received_date'] ?? '');
      $civil_date = $conn->real_escape_string($_POST['civil_date'] ?? '');

       //==================================remarks==================================
      $remarks = $conn->real_escape_string($_POST['remarks'] ?? '');
      $remarks = preg_replace("#\[sp\]#", "&nbsp;", $remarks);
      $remarks = preg_replace("#\[nl\]#", "<br>\n", $remarks);

      //=====================================infant cause=====================================
      $mother_age = $conn->real_escape_string($_POST['mother_age'] ?? '');
      $delivery_method = $conn->real_escape_string($_POST['delivery_method'] ?? '');
      $pregnancy_length = $conn->real_escape_string($_POST['pregnancy_length'] ?? '');
      $birth_type = $conn->real_escape_string($_POST['birth_type'] ?? '');
      $multi_birth_was = $conn->real_escape_string($_POST['multi_birth_was'] ?? '');
      $main_disease = $conn->real_escape_string($_POST['main_disease'] ?? '');
      $other_disease = $conn->real_escape_string($_POST['other_disease'] ?? '');
      $main_maternal = $conn->real_escape_string($_POST['main_maternal'] ?? '');
      $other_maternal = $conn->real_escape_string($_POST['other_maternal'] ?? '');
      $other_relevant = $conn->real_escape_string($_POST['other_relevant'] ?? '');

      //=====================================autopsy==========================================
      $autopsy_txt1 = $conn->real_escape_string($_POST['autopsy_txt1'] ?? '');
      $autopsy_txt2 = $conn->real_escape_string($_POST['autopsy_txt2'] ?? '');
      $autopsy_name = $conn->real_escape_string($_POST['autopsy_name'] ?? '');
      $autopsy_address = $conn->real_escape_string($_POST['autopsy_address'] ?? '');
      $autopsy_date = $conn->real_escape_string($_POST['autopsy_date'] ?? '');
      $autopsy_title = $conn->real_escape_string($_POST['autopsy_title'] ?? '');

      //=================================embalmer=============================================
      $embalmer_txt = $conn->real_escape_string($_POST['embalmer_txt'] ?? '');
      $embalmer_name = $conn->real_escape_string($_POST['embalmer_name'] ?? '');
      $embalmer_address = $conn->real_escape_string($_POST['embalmer_address'] ?? '');
      $embalmer_no = $conn->real_escape_string($_POST['embalmer_no'] ?? '');
      $embalmer_on = $conn->real_escape_string($_POST['embalmer_on'] ?? '');
      $embalmer_at = $conn->real_escape_string($_POST['embalmer_at'] ?? '');
      $embalmer_expdate = $conn->real_escape_string($_POST['embalmer_expdate'] ?? '');
      $embalmer_title = $conn->real_escape_string($_POST['embalmer_title'] ?? '');

      //==================================late registration========================================
      $late_name = $conn->real_escape_string($_POST['late_name'] ?? '');
      $late_address = $conn->real_escape_string($_POST['late_address'] ?? '');
      $death_name = $conn->real_escape_string($_POST['death_name'] ?? '');
      $died_on = $conn->real_escape_string($_POST['died_on'] ?? '');
      $died_in = $conn->real_escape_string($_POST['died_in'] ?? '');
      $buried_in = $conn->real_escape_string($_POST['buried_in'] ?? '');
      $buried_on = $conn->real_escape_string($_POST['buried_on'] ?? '');
      $attended_type = $conn->real_escape_string($_POST['attended_type'] ?? '');
      $attended_by = $conn->real_escape_string($_POST['attended_by'] ?? '');
      $late_death_cause = $conn->real_escape_string($_POST['late_death_cause'] ?? '');
      $late_reg_reason = $conn->real_escape_string($_POST['late_reg_reason'] ?? ''); // FIXED VAR NAME
      $sign_day = $conn->real_escape_string($_POST['sign_day'] ?? '');
      $sign_month = $conn->real_escape_string($_POST['sign_month'] ?? '');
      $sign_year = $conn->real_escape_string($_POST['sign_year'] ?? '');
      $sign_at = $conn->real_escape_string($_POST['sign_at'] ?? '');
      $affiant_name = $conn->real_escape_string($_POST['affiant_name'] ?? '');
      $sworn_day = $conn->real_escape_string($_POST['sworn_day'] ?? '');
      $sworn_month = $conn->real_escape_string($_POST['sworn_month'] ?? '');
      $sworn_year = $conn->real_escape_string($_POST['sworn_year'] ?? '');
      $sworn_at = $conn->real_escape_string($_POST['sworn_at'] ?? '');
      $sworn_ctc = $conn->real_escape_string($_POST['ctc'] ?? '');
      $sworn_issuedon = $conn->real_escape_string($_POST['issued_on'] ?? '');
      $sworn_issuedat = $conn->real_escape_string($_POST['issued_at'] ?? ''); // FIXED MISSING VAR
      $administer_name = $conn->real_escape_string($_POST['administer_name'] ?? '');
      $administer_position = $conn->real_escape_string($_POST['administer_position'] ?? '');
      $administer_address = $conn->real_escape_string($_POST['administer_address'] ?? '');


      //==============================database====================================
      
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "geronacrisdeath";

      // Create connection
      $conn2 = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
      }

      $sql = "INSERT INTO no_tbl (registry_no, status) VALUES ('$registry_no', '0')";

      if ($conn2->query($sql) === TRUE) {
        $no = $conn2->insert_id;
      }

      $sql = "INSERT INTO registration_tbl VALUES ('$registry_no', '$book_no', '$page_no', '$province', '$municipal', '$date', '$time', '$e_name', '$u_date', '$u_time', '$u_name','$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO person_tbl VALUES ('$registry_no', '$person_lname', '$person_fname', '$person_mname', '$sex', '$date_birth', '$date_death', '$death_place', '$age_type', '$age', '$ages', '$civil_status', '$religion', '$citizen', '$residence', '$occupation', '$father_name', '$mother_name', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO death_cause_eight_days VALUES ('$registry_no', '$immediate_cause', '$immediate_interval', '$antecedent_cause', '$antecedent_interval', '$underlying_cause', '$underlying_interval', '$other_condition_death', '$maternal_condition', '$death_manner', '$place_external_cause', '$autopsy', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO att_rev_tbl VALUES ('$registry_no', '$attendant', '$date_from', '$date_to', '$certify_type', '$death_time', '$attendant_name', '$attendant_position', '$attendant_address', '$reviewed_name', '$attendant_date', '$reviewed_date', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO corpse_disposal_tbl VALUES ('$registry_no', '$corpse_disposal', '$burial_no', '$burial_issued_date', '$transfer_no', '$transfer_issued_date', '$cemetery', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO inf_pre_tbl VALUES ('$registry_no', '$informant_name', '$rel_death', '$informant_address', '$prepared_name', '$prepared_position', '$informant_date', '$prepared_date', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO receive_civil_tbl VALUES ('$registry_no', '$received_name', '$received_position', '$civil_name', '$civil_position', '$received_date', '$civil_date', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO remarks_tbl VALUES ('$registry_no', '$remarks', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO death_cause_zero_seven VALUES ('$registry_no', '$mother_age', '$delivery_method', '$pregnancy_length', '$birth_type', '$multi_birth_was', '$main_disease', '$other_disease', '$main_maternal', '$other_maternal', '$other_relevant', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO autopsy_tbl VALUES ('$registry_no', '$autopsy_txt1', '$autopsy_txt2', '$autopsy_name', '$autopsy_address', '$autopsy_title', '$autopsy_date', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO embalmer_tbl VALUES ('$registry_no', '$embalmer_txt', '$embalmer_name', '$embalmer_address', '$embalmer_title', '$embalmer_no', '$embalmer_on', '$embalmer_at', '$embalmer_expdate', '$no')";
      $result = $conn->query($sql);

      $sql = "INSERT INTO late_reg_tbl VALUES ('$registry_no', '$late_name', '$late_address', '$death_name', '$died_on', '$died_in', '$buried_in', '$buried_on', '$attended_type', '$attended_by', '$late_death_cause', '$late_reg_reason', '$sign_day', '$sign_month', '$sign_year', '$sign_at', '$affiant_name', '$sworn_day', '$sworn_month', '$sworn_year', '$sworn_at', '$sworn_ctc', '$sworn_issuedon', '$sworn_issuedat', '$administer_name', '$administer_position', '$administer_address', '$no')";
      $result = $conn->query($sql);

      if (!$result) echo "INSERT failed: $sql<br>" .
      $conn->error . "<br><br>";

      header('location: death_records.php');

      mysqli_close($conn);
    }

?>