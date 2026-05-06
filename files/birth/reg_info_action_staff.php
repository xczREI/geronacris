Here is the corrected PHP code. 

### What was fixed:
1. **Missing `catch` block**: A `try` block must be paired with a `catch` block in PHP. I added the `catch (Exception $e)` block to properly handle the exception you throw when a duplicate registry number is found.
2. **Missing `commit()` and `rollback()`**: You started a transaction (`$conn->begin_transaction()`) but never committed it. I added `$conn->commit()` at the end of the `try` block and `$conn->rollback()` inside the `catch` block to ensure data integrity.
3. **Closing Brace for `if`**: The opening `if (isset($_POST['add_birth'])) {` was missing its final closing curly brace `}` at the bottom of the script.
4. **Undefined variable fix**: Inside the `if (!$result)` check, I updated `$sql` (which was undefined) to `$sql9` to correctly output the failed query string.

### Corrected Code:

```php
<?php
// Enable error reporting to catch issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Load database credentials
require_once 'login_db_birth.php'; 
session_start();

// 2. Create the Database Connection explicitly
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// 3. --- MAGIC LINE: Bypass Strict Mode ---
// This prevents "Incorrect integer value" and "Incorrect date value" errors
$conn->query("SET SESSION sql_mode = ''");

// 4. Check if form was submitted
if (isset($_POST['add_birth']) || $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // --- CORE REGISTRATION DATA ---
    $registry_no = mysqli_real_escape_string($conn, $_POST['registry_no'] ?? '');
    $book_no     = (int)($_POST['book_no'] ?? 0);
    $page_no     = (int)($_POST['page_no'] ?? 0);
    $province    = mysqli_real_escape_string($conn, $_POST['provinces'] ?? '');
    $municipal   = mysqli_real_escape_string($conn, $_POST['municipals'] ?? '');
    $reg_user    = ($_SESSION['firstname'] ?? 'Staff') . ' ' . ($_SESSION['lastname'] ?? 'User');
    $reg_date    = date('Y-m-d');
    $reg_time    = mysqli_real_escape_string($conn, $_POST['time'] ?? date('H:i:s'));

    // --- CHILD DATA ---
    $c_fname  = mysqli_real_escape_string($conn, $_POST['child_fname'] ?? '');
    $c_mname  = mysqli_real_escape_string($conn, $_POST['child_mname'] ?? '');
    $c_lname  = mysqli_real_escape_string($conn, $_POST['child_lname'] ?? '');
    $c_sex    = mysqli_real_escape_string($conn, $_POST['sex'] ?? '');
    
    $raw_bd = $_POST['birth_day'] ?? '';
    $child_birth_date = (!empty($raw_bd)) ? date("Y-m-d", strtotime($raw_bd)) : '1900-01-01';

    $c_brgy   = mysqli_real_escape_string($conn, $_POST['birth_brgy'] ?? '');
    $c_muni   = mysqli_real_escape_string($conn, $_POST['birth_city'] ?? '');
    $c_prov   = mysqli_real_escape_string($conn, $_POST['birth_province'] ?? '');
    $c_type   = mysqli_real_escape_string($conn, $_POST['birth_type'] ?? '');
    $c_multi  = mysqli_real_escape_string($conn, $_POST['multi_birth_was'] ?? '');
    $c_order  = mysqli_real_escape_string($conn, $_POST['birth_order'] ?? '');
    $c_weight = mysqli_real_escape_string($conn, $_POST['birth_weight'] ?? '');

    // --- MOTHER DATA ---
    $m_fname   = mysqli_real_escape_string($conn, $_POST['mother_fname'] ?? '');
    $m_mname   = mysqli_real_escape_string($conn, $_POST['mother_mname'] ?? '');
    $m_lname   = mysqli_real_escape_string($conn, $_POST['mother_lname'] ?? '');
    $m_citiz   = mysqli_real_escape_string($conn, $_POST['mother_citizen'] ?? '');
    $m_relig   = mysqli_real_escape_string($conn, $_POST['mother_sect'] ?? '');
    $m_brgy    = mysqli_real_escape_string($conn, $_POST['mother_brgy'] ?? '');
    $m_muni    = mysqli_real_escape_string($conn, $_POST['mother_city'] ?? '');
    $m_prov    = mysqli_real_escape_string($conn, $_POST['mother_province'] ?? '');
    $m_country = mysqli_real_escape_string($conn, $_POST['mother_country'] ?? 'PHILIPPINES');
    $m_occup   = mysqli_real_escape_string($conn, $_POST['mother_occupation'] ?? '');
    $m_age     = mysqli_real_escape_string($conn, $_POST['mother_age'] ?? '');
    $m_ttl     = (int)($_POST['ttl_no_child'] ?? 0);
    $m_alive   = (int)($_POST['no_child_alive'] ?? 0);
    $m_dead    = (int)($_POST['no_child_dead'] ?? 0);

    // --- FATHER DATA ---
    $f_fname   = mysqli_real_escape_string($conn, $_POST['father_fname'] ?? '');
    $f_mname   = mysqli_real_escape_string($conn, $_POST['father_mname'] ?? '');
    $f_lname   = mysqli_real_escape_string($conn, $_POST['father_lname'] ?? '');
    $f_age     = mysqli_real_escape_string($conn, $_POST['father_age'] ?? '');
    $f_relig   = mysqli_real_escape_string($conn, $_POST['father_sect'] ?? '');
    $f_citiz   = mysqli_real_escape_string($conn, $_POST['father_citizen'] ?? '');
    $f_brgy    = mysqli_real_escape_string($conn, $_POST['father_brgy'] ?? '');
    $f_muni    = mysqli_real_escape_string($conn, $_POST['father_city'] ?? '');
    $f_prov    = mysqli_real_escape_string($conn, $_POST['father_province'] ?? '');
    $f_country = mysqli_real_escape_string($conn, $_POST['father_country'] ?? 'PHILIPPINES');
    $f_occup   = mysqli_real_escape_string($conn, $_POST['father_occupation'] ?? '');

    // --- MARRIAGE INFO ---
    $m_mdate   = $_POST['marriage_date'] ?? '';
    $m_mdate_f = (!empty($m_mdate)) ? date('Y-m-d', strtotime($m_mdate)) : '1900-01-01';
    $m_mplace  = mysqli_real_escape_string($conn, $_POST['marriage_place'] ?? '');

    // --- ATTENDANT & INFORMANT ---
    if(isset($_POST['attendant1']) && $_POST['attendant1'] == 'Physician'){ $att_type = $_POST['attendant1']; }
    else if(isset($_POST['attendant2']) && $_POST['attendant2'] == 'Nurse'){ $att_type = $_POST['attendant2']; }
    else if(isset($_POST['attendant3']) && $_POST['attendant3'] == 'Midwife'){ $att_type = $_POST['attendant3']; }
    else if(isset($_POST['attendant4']) && $_POST['attendant4'] == 'Hilot'){ $att_type = $_POST['attendant4']; }
    else { $att_type = mysqli_real_escape_string($conn, $_POST['attendant5'] ?? ''); }

    $att_name = mysqli_real_escape_string($conn, $_POST['attendant_name'] ?? '');
    $att_pos  = mysqli_real_escape_string($conn, $_POST['attendant_position'] ?? '');
    $att_addr = mysqli_real_escape_string($conn, ($_POST['attendant_address1'] ?? '').' '.($_POST['attendant_address2'] ?? ''));
    $inf_name = mysqli_real_escape_string($conn, $_POST['informant_name'] ?? '');
    $inf_rel  = mysqli_real_escape_string($conn, $_POST['rel_child'] ?? '');
    $inf_addr = mysqli_real_escape_string($conn, $_POST['informant_address'] ?? '');
    $prep_name = mysqli_real_escape_string($conn, $_POST['prepared_name'] ?? '');
    $prep_pos  = mysqli_real_escape_string($conn, $_POST['prepared_position'] ?? '');
    
    $att_date  = mysqli_real_escape_string($conn, $_POST['attendant_date'] ?? '');
    $inf_date  = mysqli_real_escape_string($conn, $_POST['informant_date'] ?? '');
    $prep_date = mysqli_real_escape_string($conn, $_POST['prepared_date'] ?? '');

    // --- RECEIVE & CIVIL ---
    $rec_name  = mysqli_real_escape_string($conn, $_POST['received_name'] ?? '');
    $rec_pos   = mysqli_real_escape_string($conn, $_POST['received_position'] ?? '');
    $civil_name = mysqli_real_escape_string($conn, $_POST['civil_name'] ?? '');
    $civil_pos  = mysqli_real_escape_string($conn, $_POST['civil_position'] ?? '');
    $rec_date   = mysqli_real_escape_string($conn, $_POST['received_date'] ?? '');
    $civil_date = mysqli_real_escape_string($conn, $_POST['civil_date'] ?? '');

    // --- REMARKS ---
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks'] ?? '');
    $remarks = preg_replace("#\[sp\]#", "&nbsp;", $remarks);
    $remarks = preg_replace("#\[nl\]#", "<br>\n", $remarks);

    // --- PATERNITY ---
    $p_fname = mysqli_real_escape_string($conn, $_POST['father_name'] ?? '');
    $p_mname = mysqli_real_escape_string($conn, $_POST['mother_name'] ?? '');
    $p_cname = mysqli_real_escape_string($conn, $_POST['child_name'] ?? '');
    $p_bdate = mysqli_real_escape_string($conn, $_POST['birth_date'] ?? '');
    $p_bplace = mysqli_real_escape_string($conn, $_POST['birth_place'] ?? '');
    $p_sday   = mysqli_real_escape_string($conn, $_POST['ack_sworn_day'] ?? '');
    $p_smon   = mysqli_real_escape_string($conn, $_POST['ack_sworn_month'] ?? '');
    $p_syer   = mysqli_real_escape_string($conn, $_POST['ack_sworn_year'] ?? '');
    $p_gender = $_POST['birth_gender'] ?? '';
    $p_ctc    = mysqli_real_escape_string($conn, $_POST['ack_ctc'] ?? '');
    $p_ison   = mysqli_real_escape_string($conn, $_POST['ack_issued_on'] ?? '');
    $p_isat   = mysqli_real_escape_string($conn, $_POST['ack_issued_at'] ?? '');
    $p_sname  = mysqli_real_escape_string($conn, $_POST['ack_sworn_name'] ?? '');
    $p_spos   = mysqli_real_escape_string($conn, $_POST['ack_sworn_position'] ?? '');
    $p_saddr  = mysqli_real_escape_string($conn, $_POST['ack_sworn_address'] ?? '');

    // --- LATE REGISTRATION ---
    $l_name    = mysqli_real_escape_string($conn, $_POST['late_name'] ?? '');
    $l_addr    = mysqli_real_escape_string($conn, $_POST['late_address'] ?? '');
    $l_type    = mysqli_real_escape_string($conn, $_POST['late_birth_type'] ?? '');
    $l_of      = mysqli_real_escape_string($conn, $_POST['late_birth_of'] ?? '');
    $l_in      = mysqli_real_escape_string($conn, $_POST['late_birth_in'] ?? '');
    $l_on      = mysqli_real_escape_string($conn, $_POST['late_birth_on'] ?? '');
    $l_attby   = mysqli_real_escape_string($conn, $_POST['attend_birth_by'] ?? '');
    $l_resat   = mysqli_real_escape_string($conn, $_POST['who_resides_at'] ?? '');
    $l_citiz   = mysqli_real_escape_string($conn, $_POST['late_citizen'] ?? '');
    $l_mtype   = mysqli_real_escape_string($conn, $_POST['married_type'] ?? '');
    $l_mon     = mysqli_real_escape_string($conn, $_POST['married_on'] ?? '');
    $l_mat     = mysqli_real_escape_string($conn, $_POST['married_at'] ?? '');
    $l_notm    = mysqli_real_escape_string($conn, $_POST['not_married_name'] ?? '');
    
    $lr1 = $_POST['late_reason_1'] ?? '';
    $lr2 = $_POST['late_reason_2'] ?? '';
    $l_reason = mysqli_real_escape_string($conn, $lr1.' '.$lr2);

<<<<<<< HEAD
    $l_appo    = mysqli_real_escape_string($conn, $_POST['applicant_only'] ?? '');
    $l_appto   = mysqli_real_escape_string($conn, $_POST['applicant_than_owner'] ?? '');
    $l_sigday  = mysqli_real_escape_string($conn, $_POST['sign_day'] ?? '');
    $l_sigmon  = mysqli_real_escape_string($conn, $_POST['sign_month'] ?? '');
    $l_sigyer  = mysqli_real_escape_string($conn, $_POST['sign_year'] ?? '');
    $l_sigat   = mysqli_real_escape_string($conn, $_POST['sign_at'] ?? '');
    $l_affname = mysqli_real_escape_string($conn, $_POST['affiant_name'] ?? '');
    $l_swday   = mysqli_real_escape_string($conn, $_POST['late_sworn_day'] ?? '');
    $l_swmon   = mysqli_real_escape_string($conn, $_POST['late_sworn_month'] ?? '');
    $l_swyer   = mysqli_real_escape_string($conn, $_POST['late_sworn_year'] ?? '');
    $l_swat    = mysqli_real_escape_string($conn, $_POST['late_sworn_at'] ?? '');
    $l_ctc     = mysqli_real_escape_string($conn, $_POST['late_ctc'] ?? '');
    $l_ison    = mysqli_real_escape_string($conn, $_POST['late_issued_on'] ?? '');
    $l_isat    = mysqli_real_escape_string($conn, $_POST['late_issued_at'] ?? '');
    $l_sname   = mysqli_real_escape_string($conn, $_POST['late_sworn_name'] ?? '');
    $l_spos    = mysqli_real_escape_string($conn, $_POST['late_sworn_position'] ?? '');
    $l_saddr   = mysqli_real_escape_string($conn, $_POST['late_sworn_address'] ?? '');

    // --- DATABASE PROCESSING ---
    $conn->begin_transaction();

    try {
        // 1. Duplicate Check
        if (!empty($registry_no)) {
            $check = $conn->query("SELECT registry_no FROM registration_tbl WHERE registry_no = '$registry_no'");
            if ($check && $check->num_rows > 0) {
                throw new Exception("Registry Number '$registry_no' already exists.");
            }
        }

        // 2. Generate shared ID 'no'
        $result_max = $conn->query("SELECT MAX(no) AS max_no FROM registration_tbl");
        $row_max = $result_max->fetch_assoc();
        $reg_no = (int)($row_max['max_no'] ?? 0) + 1;

        // --- Execute 9 Inserst ---

        $conn->query("INSERT INTO registration_tbl (no, registry_no, book_no, page_no, province, municipal, reg_date, reg_time, reg_user, update_date, update_time, update_user) 
                      VALUES ($reg_no, '$registry_no', $book_no, $page_no, '$province', '$municipal', '$reg_date', '$reg_time', '$reg_user', '1900-01-01', '00:00:00', '')");

        $conn->query("INSERT INTO child_tbl (no, registry_no, child_lname, child_fname, child_mname, child_sex, child_birth_date, birth_brgy, birth_municipal, birth_province, birth_type, if_multi_birth_was, birth_order, birth_weight) 
                      VALUES ($reg_no, '$registry_no', '$c_lname', '$c_fname', '$c_mname', '$c_sex', '$child_birth_date', '$c_brgy', '$c_muni', '$c_prov', '$c_type', '$c_multi', '$c_order', '$c_weight')");

        $conn->query("INSERT INTO mother_tbl (no, registry_no, mother_lname, mother_fname, mother_mname, mother_citizen, mother_religion, mother_brgy, mother_municipal, mother_province, mother_country, mother_occupation, mother_age, ttl_no_child, no_child_dead, no_child_alive, marriage_date, marriage_place) 
                      VALUES ($reg_no, '$registry_no', '$m_lname', '$m_fname', '$m_mname', '$m_citiz', '$m_relig', '$m_brgy', '$m_muni', '$m_prov', '$m_country', '$m_occup', '$m_age', $m_ttl, $m_dead, $m_alive, '$m_mdate_f', '$m_mplace')");

        $conn->query("INSERT INTO father_tbl (no, registry_no, father_lname, father_fname, father_mname, father_age, father_religion, father_citizen, father_brgy, father_municipal, father_province, father_country, father_occupation, marriage_date, marriage_place) 
                      VALUES ($reg_no, '$registry_no', '$f_lname', '$f_fname', '$f_mname', '$f_age', '$f_relig', '$f_citiz', '$f_brgy', '$f_muni', '$f_prov', '$f_country', '$f_occup', '$m_mdate_f', '$m_mplace')");

        $conn->query("INSERT INTO att_inf_tbl (no, registry_no, attendant_type, birth_time, attendant_name, attendant_position, attendant_address, informant_name, rel_child, informant_address, prepared_name, prepared_position, attendant_date, informant_date, prepared_date) 
                      VALUES ($reg_no, '$registry_no', '$att_type', '$reg_time', '$att_name', '$att_pos', '$att_addr', '$inf_name', '$inf_rel', '$inf_addr', '$prep_name', '$prep_pos', '$att_date', '$inf_date', '$prep_date')");

        $conn->query("INSERT INTO receive_civil_tbl (no, registry_no, received_name, received_position, civil_name, civil_position, received_date, civil_date) 
                      VALUES ($reg_no, '$registry_no', '$rec_name', '$rec_pos', '$civil_name', '$civil_pos', '$rec_date', '$civil_date')");
=======
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

          if (!$result) {
              echo "INSERT failed: $sql9<br>" . $conn->error . "<br><br>";
          }

          // Commit the transaction since everything was successful
          $conn->commit();

      } catch (Exception $e) {
          // Rollback all inserts if an exception is thrown
          $conn->rollback();
          echo "Error: " . $e->getMessage() . "<br><br>";
      }
>>>>>>> 4857b88a4be86b8850fa34bb93fa56fe294fddb0

        $conn->query("INSERT INTO remarks_tbl (no, registry_no, remarks) 
                      VALUES ($reg_no, '$registry_no', '$remarks')");

<<<<<<< HEAD
        $conn->query("INSERT INTO admission_paternity_tbl (no, registry_no, father_name, mother_name, child_name, birth_date, birth_place, sworn_day, sworn_month, sworn_year, child_gender, ctc, issued_on, issued_at, administer_name, administer_position, administer_address) 
                      VALUES ($reg_no, '$registry_no', '$p_fname', '$p_mname', '$p_cname', '$p_bdate', '$p_bplace', '$p_sday', '$p_smon', '$p_syer', '$p_gender', '$p_ctc', '$p_ison', '$p_isat', '$p_sname', '$p_spos', '$p_saddr')");

        $conn->query("INSERT INTO late_reg_tbl (no, registry_no, late_name, late_address, late_birth_type, late_birth_of, late_birth_in, late_birth_on, attend_birth_by, who_resides_at, late_citizen, married_type, married_on, married_at, not_married_name, late_reg_reason, applicant_only, applicant_than_owner, sign_day, sign_month, sign_year, sign_at, affiant_name, late_sworn_day, late_sworn_month, late_sworn_year, late_sworn_at, late_ctc, late_issued_on, late_issued_at, late_sworn_name, late_sworn_position, late_sworn_address) 
                      VALUES ($reg_no, '$registry_no', '$l_name', '$l_addr', '$l_type', '$l_of', '$l_in', '$l_on', '$l_attby', '$l_resat', '$l_citiz', '$l_mtype', '$l_mon', '$l_mat', '$l_notm', '$l_reason', '$l_appo', '$l_appto', '$l_sigday', '$l_sigmon', '$l_sigyer', '$l_sigat', '$l_affname', '$l_swday', '$l_swmon', '$l_swyer', '$l_swat', '$l_ctc', '$l_ison', '$l_isat', '$l_sname', '$l_spos', '$l_saddr')");

        $conn->commit();
        echo "<script>alert('Record Saved Successfully!'); window.location='birth_records_staff.php';</script>";

    } catch (Exception $e) {
        $conn->rollback();
        echo "<div style='background:#fee; border:2px solid red; padding:20px; margin: 20px; color:red; font-family:sans-serif;'>";
        echo "<h2>SAVE FAILED</h2>";
        echo "<p><strong>Reason:</strong> " . $e->getMessage() . "</p>";
        echo "<br><button onclick='window.history.back()' style='padding:10px 20px; cursor:pointer;'>Go Back and Fix Form</button>";
        echo "</div>";
    }

    $conn->close();
} else {
    echo "<h2>No data received from form.</h2>";
}
?>
=======
      mysqli_close($conn);
    }
?>
>>>>>>> 4857b88a4be86b8850fa34bb93fa56fe294fddb0
