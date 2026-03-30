<?php
include ('logout_session.php');
require_once 'login_db_mrg.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['reg_no'])) {
    $no = $conn->real_escape_string($_GET['reg_no']);

    $tables = [
        'registration_tbl', 'husband_tbl', 'wife_tbl', 'marriage_tbl', 
        'receive_civil_tbl', 'remarks_tbl', 'witness_tbl', 
        'aff_solemn_tbl', 'late_reg_tbl', 'no_tbl'
    ];

    foreach ($tables as $table) {
        $conn->query("DELETE FROM $table WHERE no = '$no'");
    }

    $redirect = ($_SESSION['type'] == 'Admin') ? 'marriage_records.php' : 'marriage_records_staff.php';
    header("Location: $redirect");
}
?>