<?php
// ... (Connection and session code at top)

if (isset($_POST['add_birth'])) {

    // 1. USE THE NULL COALESCING OPERATOR (?? '') 
    // This stops the "Undefined array key" and "Passing null" warnings.
    
    $registry_no = mysqli_real_escape_string($conn, $_POST['registry_no'] ?? '');
    
    // Father's Information (Handling the missing keys)
    $f_fname    = mysqli_real_escape_string($conn, $_POST['father_fname'] ?? '');
    $f_mname    = mysqli_real_escape_string($conn, $_POST['father_mname'] ?? '');
    $f_lname    = mysqli_real_escape_string($conn, $_POST['father_lname'] ?? '');
    $f_citiz    = mysqli_real_escape_string($conn, $_POST['father_citizen'] ?? '');
    $f_relig    = mysqli_real_escape_string($conn, $_POST['father_sect'] ?? '');
    $f_occup    = mysqli_real_escape_string($conn, $_POST['father_occupation'] ?? '');
    $f_age      = mysqli_real_escape_string($conn, $_POST['father_age'] ?? '');
    $f_brgy     = mysqli_real_escape_string($conn, $_POST['father_brgy'] ?? '');
    $f_city     = mysqli_real_escape_string($conn, $_POST['father_city'] ?? '');
    $f_prov     = mysqli_real_escape_string($conn, $_POST['father_province'] ?? '');
    $f_country  = mysqli_real_escape_string($conn, $_POST['father_country'] ?? '');
    
    // Mother's Information
    $m_fname    = mysqli_real_escape_string($conn, $_POST['mother_fname'] ?? '');
    $m_mname    = mysqli_real_escape_string($conn, $_POST['mother_mname'] ?? '');
    $m_lname    = mysqli_real_escape_string($conn, $_POST['mother_lname'] ?? '');
    
    // 2. FIX THE "OUT OF RANGE" FATAL ERROR
    // Convert these to integers. If they are empty, they become 0.
    $ttl_child   = (int)($_POST['ttl_no_child'] ?? 0);
    $child_alive = (int)($_POST['no_child_alive'] ?? 0);
    $child_dead  = (int)($_POST['no_child_dead'] ?? 0);

    $m_mdate    = mysqli_real_escape_string($conn, $_POST['parent_mdate'] ?? '');
    $m_mplace   = mysqli_real_escape_string($conn, $_POST['marriage_place'] ?? '');

    // ... (Child data collection using ?? '')

    $conn->begin_transaction();

    try {
        // ... (Insert into registration_tbl and child_tbl)

        // Table 3: mother_tbl
        // Using the (int) values ensures no "Out of Range" errors
        $sql3 = "INSERT INTO mother_tbl (registry_no, mother_fname, mother_mname, mother_lname, ttl_no_child, no_child_alive, no_child_dead, marriage_date, marriage_place) 
                 VALUES ('$registry_no', '$m_fname', '$m_mname', '$m_lname', $ttl_child, $child_alive, $child_dead, '$m_mdate', '$m_mplace')";
        
        if (!$conn->query($sql3)) {
            throw new Exception("Mother Table Error: " . $conn->error);
        }

        // Table 4: father_tbl
        $sql4 = "INSERT INTO father_tbl (registry_no, father_fname, father_mname, father_lname, father_citizen, father_religion, father_occupation, father_age) 
                 VALUES ('$registry_no', '$f_fname', '$f_mname', '$f_lname', '$f_citiz', '$f_relig', '$f_occup', '$f_age')";
        
        if (!$conn->query($sql4)) {
            throw new Exception("Father Table Error: " . $conn->error);
        }

        // ... (Late registration insert)

        $conn->commit();
        echo "<script>alert('Record Saved Successfully!'); window.location='birth_records.php';</script>";

    } catch (Exception $e) {
        $conn->rollback();
        die("Save Failed: " . $e->getMessage());
    }
}