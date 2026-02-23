<?php
/**
 * save_new_entry.php
 * This file handles saving new dropdown entries to the database
 * For use when user inputs a value not in the existing dropdown list
 */

require 'mycon.php';

// Check if required parameters are present
if(isset($_POST['table']) && isset($_POST['column']) && isset($_POST['value'])){
    
    $table = $_POST['table'];
    $column = $_POST['column'];
    $value = strtoupper(trim($_POST['value']));
    
    // Whitelist of allowed tables and columns for security
    $allowed = [
        'tblreligious' => 'relsec',
        'tbloccupation' => 'occupation',
        'tblcitizen' => 'citiz',
        'tblcountry' => 'country',
        'tblprovinces' => 'province',
        'tblmunicipals' => 'municipals'
    ];
    
    // Verify the table and column are allowed
    if(array_key_exists($table, $allowed) && $allowed[$table] === $column){
        
        // Check if value already exists
        $checkSql = "SELECT * FROM $table WHERE $column = ?";
        $stmt = $connx->prepare($checkSql);
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 0){
            // Value doesn't exist, insert it
            $insertSql = "INSERT INTO $table ($column) VALUES (?)";
            $insertStmt = $connx->prepare($insertSql);
            $insertStmt->bind_param("s", $value);
            
            if($insertStmt->execute()){
                echo json_encode(['status' => 'success', 'message' => 'Entry added successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add entry']);
            }
            $insertStmt->close();
        } else {
            echo json_encode(['status' => 'exists', 'message' => 'Entry already exists']);
        }
        $stmt->close();
        
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid table or column']);
    }
    
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing required parameters']);
}

$connx->close();
?>