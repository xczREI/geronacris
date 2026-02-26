<?php
require_once 'login_db_birth.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['reg_no'])) {
    $reg_no = $conn->real_escape_string($_GET['reg_no']);

    // List of all tables linked via the 'no' primary key
    $tables = [
        'registration_tbl', 'child_tbl', 'mother_tbl', 'father_tbl', 
        'att_inf_tbl', 'receive_civil_tbl', 'remarks_tbl', 
        'admission_paternity_tbl', 'late_reg_tbl', 'no_tbl'
    ];

    foreach ($tables as $table) {
        $sql = "DELETE FROM $table WHERE no = '$reg_no'";
        $conn->query($sql);
    }

    // Redirect back to the previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>