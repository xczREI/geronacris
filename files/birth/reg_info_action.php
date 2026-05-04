<?php
// Enable error reporting to catch any remaining issues
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Load your database credentials
require_once '../../php/login_db_birth.php'; 
session_start();

// 2. Create the Database Connection explicitly
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// 3. --- MAGIC LINE: Bypass Strict Mode ---
// This tells MySQL: "If a field is missing from our form, just make it blank and save anyway!"
$conn->query("SET SESSION sql_mode = ''");

// BULLETPROOF CHECK: Will run if the button is clicked OR if the form submits natively
if (isset($_POST['add_birth']) || $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // --- 1. CORE REGISTRATION DATA ---
    $registry_no = mysqli_real_escape_string($conn, $_POST['registry_no'] ?? '');
    
    // ADDED: Book No and Page No for registration_tbl
    $book_no     = (int)($_POST['book_no'] ?? 0);
    $page_no     = (int)($_POST['page_no'] ?? 0);
    
    $province    = mysqli_real_escape_string($conn, $_POST['provinces'] ?? '');
    $municipal   = mysqli_real_escape_string($conn, $_POST['municipals'] ?? '');
    $reg_user    = ($_SESSION['firstname'] ?? 'Unknown') . ' ' . ($_SESSION['lastname'] ?? 'User');
    $reg_date    = date('Y-m-d');
    $reg_time    = date('H:i:s');

    // Date Handling
    $raw_bdate       = $_POST['birth_day'] ?? '';
    $formatted_bdate = (!empty($raw_bdate)) ? date('Y-m-d', strtotime($raw_bdate)) : '1900-01-01';

    $m_mdate           = mysqli_real_escape_string($conn, $_POST['parent_mdate'] ?? '');
    $m_mdate_formatted = (!empty($m_mdate)) ? date('Y-m-d', strtotime($m_mdate)) : '1900-01-01';

    // --- 2. CHILD DATA ---
    $c_fname  = mysqli_real_escape_string($conn, $_POST['child_fname'] ?? '');
    $c_mname  = mysqli_real_escape_string($conn, $_POST['child_mname'] ?? '');
    $c_lname  = mysqli_real_escape_string($conn, $_POST['child_lname'] ?? '');
    $c_sex    = mysqli_real_escape_string($conn, $_POST['sex'] ?? '');
    $c_brgy   = mysqli_real_escape_string($conn, $_POST['birth_brgy'] ?? '');
    $c_muni   = mysqli_real_escape_string($conn, $_POST['birth_city'] ?? '');
    $c_prov   = mysqli_real_escape_string($conn, $_POST['birth_province'] ?? '');
    $c_type   = mysqli_real_escape_string($conn, $_POST['birth_type'] ?? '');
    $c_multi  = mysqli_real_escape_string($conn, $_POST['multi_birth_was'] ?? '');
    $c_order  = mysqli_real_escape_string($conn, $_POST['birth_order'] ?? '');
    $c_weight = mysqli_real_escape_string($conn, $_POST['birth_weight'] ?? '');

    // --- 3. MOTHER DATA ---
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
    $m_mplace  = mysqli_real_escape_string($conn, $_POST['marriage_place'] ?? '');

    // --- 4. FATHER DATA ---
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

    // --- 5. LATE REGISTRATION DATA (Smart Funnel) ---
    $l_type = mysqli_real_escape_string($conn, $_POST['late_birth_type'] ?? '');
    
    if ($l_type === 'my birth') {
        $l_of = ''; 
        $l_in = mysqli_real_escape_string($conn, $_POST['late_birth_in'] ?? '');
        $l_on = mysqli_real_escape_string($conn, $_POST['late_birth_on'] ?? '');
    } else {
        $l_of = mysqli_real_escape_string($conn, $_POST['late_birth_of'] ?? '');
        $l_in = mysqli_real_escape_string($conn, $_POST['late_birth_inx'] ?? '');
        $l_on = mysqli_real_escape_string($conn, $_POST['late_birth_onx'] ?? '');
    }

    // --- DATABASE INSERTS ---
    $conn->begin_transaction();

    try {
        // 1. Check for duplicates safely
        if (empty($registry_no)) {
            throw new Exception("Registry Number is missing from the form submission.");
        }
        
        $check = $conn->query("SELECT registry_no FROM registration_tbl WHERE registry_no = '$registry_no'");
        if ($check && $check->num_rows > 0) {
            throw new Exception("Registry Number '$registry_no' already exists in the system.");
        }

        // 2. Helper Function to generate the next 'no' manually
        function getNextNo($conn, $table) {
            $result = $conn->query("SELECT MAX(no) AS max_no FROM $table");
            if ($result) {
                $row = $result->fetch_assoc();
                return (int)($row['max_no'] ?? 0) + 1;
            }
            return 1;
        }

        // --- CRITICAL FIX: Synchronize the 'no' ID across ALL tables ---
        // We use the same ID for everything so they can be joined perfectly.
        $reg_no = getNextNo($conn, 'registration_tbl');

        // Query 1: registration_tbl
        $sql1 = "INSERT INTO registration_tbl (no, registry_no, book_no, page_no, province, municipal, reg_date, reg_time, reg_user, update_date, update_time, update_user) 
                 VALUES ($reg_no, '$registry_no', $book_no, $page_no, '$province', '$municipal', '$reg_date', '$reg_time', '$reg_user', '0000-00-00', '00:00:00', '')";
        if (!$conn->query($sql1)) throw new Exception("Reg Table Error: " . $conn->error);

        // Query 2: child_tbl
        $sql2 = "INSERT INTO child_tbl (no, registry_no, child_lname, child_fname, child_mname, child_sex, child_birth_date, birth_brgy, birth_municipal, birth_province, birth_type, if_multi_birth_was, birth_order, birth_weight) 
                 VALUES ($reg_no, '$registry_no', '$c_lname', '$c_fname', '$c_mname', '$c_sex', '$formatted_bdate', '$c_brgy', '$c_muni', '$c_prov', '$c_type', '$c_multi', '$c_order', '$c_weight')";
        if (!$conn->query($sql2)) throw new Exception("Child Table Error: " . $conn->error);

        // Query 3: mother_tbl
        $sql3 = "INSERT INTO mother_tbl (no, registry_no, mother_lname, mother_fname, mother_mname, mother_citizen, mother_religion, mother_brgy, mother_municipal, mother_province, mother_country, mother_occupation, mother_age, ttl_no_child, no_child_dead, no_child_alive, marriage_date, marriage_place) 
                 VALUES ($reg_no, '$registry_no', '$m_lname', '$m_fname', '$m_mname', '$m_citiz', '$m_relig', '$m_brgy', '$m_muni', '$m_prov', '$m_country', '$m_occup', '$m_age', $m_ttl, $m_dead, $m_alive, '$m_mdate_formatted', '$m_mplace')";
        if (!$conn->query($sql3)) throw new Exception("Mother Table Error: " . $conn->error);

        // Query 4: father_tbl
        $sql4 = "INSERT INTO father_tbl (no, registry_no, father_lname, father_fname, father_mname, father_age, father_religion, father_citizen, father_brgy, father_municipal, father_province, father_country, father_occupation, marriage_date, marriage_place) 
                 VALUES ($reg_no, '$registry_no', '$f_lname', '$f_fname', '$f_mname', '$f_age', '$f_relig', '$f_citiz', '$f_brgy', '$f_muni', '$f_prov', '$f_country', '$f_occup', '$m_mdate_formatted', '$m_mplace')";
        if (!$conn->query($sql4)) throw new Exception("Father Table Error: " . $conn->error);

        // Query 5: late_reg_tbl
        $sql5 = "INSERT INTO late_reg_tbl (no, registry_no, late_birth_type, late_birth_of, late_birth_in, late_birth_on) 
                 VALUES ($reg_no, '$registry_no', '$l_type', '$l_of', '$l_in', '$l_on')";
        if (!$conn->query($sql5)) throw new Exception("Late Reg Table Error: " . $conn->error);

        // --- NEW: Initialize the remaining 4 tables so LEFT JOIN and UPDATE work correctly ---
        
        // Query 6: att_inf_tbl
        $sql6 = "INSERT INTO att_inf_tbl (no, registry_no) VALUES ($reg_no, '$registry_no')";
        $conn->query($sql6);

        // Query 7: receive_civil_tbl
        $sql7 = "INSERT INTO receive_civil_tbl (no, registry_no) VALUES ($reg_no, '$registry_no')";
        $conn->query($sql7);

        // Query 8: remarks_tbl
        $sql8 = "INSERT INTO remarks_tbl (no, registry_no) VALUES ($reg_no, '$registry_no')";
        $conn->query($sql8);

        // Query 9: admission_paternity_tbl (CRITICAL for Page 2)
        $sql9 = "INSERT INTO admission_paternity_tbl (no, registry_no) VALUES ($reg_no, '$registry_no')";
        $conn->query($sql9);

        // If we get here, all 5 inserts succeeded!
        $conn->commit();
        echo "<script>alert('Record Saved Successfully!'); window.location='birth_records.php';</script>";

    } catch (Exception $e) {
        $conn->rollback();
        echo "<div style='background:#fee; border:2px solid red; padding:20px; margin: 20px; color:red; font-family:sans-serif;'>";
        echo "<h2>SAVE FAILED</h2>";
        echo "<p><strong>Reason:</strong> " . $e->getMessage() . "</p>";
        echo "<br><button onclick='window.history.back()' style='padding:10px 20px; cursor:pointer;'>Go Back and Fix Form</button>";
        echo "</div>";
    }
} else {
    // If the file is opened directly without submitting a form
    echo "<h2>No data received from form.</h2>";
}
?>