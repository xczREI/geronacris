<?php
// PHP 8.1+ Compatibility: Suppress deprecated notices that break PDF generation
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', 0); // Don't let errors leak into the PDF stream

use setasign\Fpdi\Fpdi;

ob_start();

function showError($title, $message) {
    if (ob_get_length()) ob_end_clean();
    echo "<div style='padding:50px; font-family:sans-serif; text-align:center; color:#721c24; background-color:#f8d7da; border:2px solid #f5c6cb; border-radius:5px; margin:50px;'>";
    echo "<h1 style='margin-bottom:20px;'>$title</h1>";
    echo "<p style='font-size:18px;'>$message</p>";
    echo "<br><br><button onclick='window.close()' style='padding:10px 20px; cursor:pointer;'>Close Window</button>";
    echo "</div>";
    exit;
}

try {
    
    if (!file_exists('../../fpdf/fpdf.php')) showError("System Error", "Library file missing: fpdf.php");
    if (!file_exists('../../fpdi/src/autoload.php')) showError("System Error", "Library file missing: fpdi/autoload.php");

    require_once('../../fpdf/fpdf.php');
    require_once('../../fpdi/src/autoload.php');
    require_once 'login_db_mrg.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) showError("Database Error", "Connection failed: " . $conn->connect_error);

    $reg_no = $_REQUEST['no'] ?? $_REQUEST['reg_no'] ?? '';
    if (empty($reg_no)) showError("Input Error", "No record ID provided.");

    $sql = "SELECT registration_tbl.registry_no as registry_no, registration_tbl.no as no,
                   registration_tbl.reg_user, registration_tbl.reg_date, registration_tbl.reg_time,
                   registration_tbl.province, registration_tbl.municipal,
                   husband_tbl.*, wife_tbl.*, marriage_tbl.*, receive_civil_tbl.*, 
                   remarks_tbl.*, witness_tbl.*, aff_solemn_tbl.*, late_reg_tbl.*
            FROM registration_tbl 
            LEFT JOIN husband_tbl ON registration_tbl.no = husband_tbl.no
            LEFT JOIN wife_tbl ON registration_tbl.no = wife_tbl.no
            LEFT JOIN marriage_tbl ON registration_tbl.no = marriage_tbl.no
            LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no
            LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no
            LEFT JOIN witness_tbl ON registration_tbl.no = witness_tbl.no
            LEFT JOIN aff_solemn_tbl ON registration_tbl.no = aff_solemn_tbl.no
            LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no
            WHERE registration_tbl.no = '$reg_no' LIMIT 1";
    
    $result = $conn->query($sql);
    if (!$result) showError("Database Error", "Query failed: " . $conn->error);
    if ($result->num_rows === 0) showError("Record Not Found", "Could not find Marriage Record ID: <strong>" . htmlspecialchars($reg_no) . "</strong>");

    $row = $result->fetch_assoc();

    // Sanitize filename
    $h_lname = preg_replace('/[^A-Za-z0-9_\-]/', '_', ($row['husband_lname'] ?? 'Husband'));
    $w_lname = preg_replace('/[^A-Za-z0-9_\-]/', '_', ($row['wife_lname'] ?? 'Wife'));
    $filename = "marriage_{$h_lname}_{$w_lname}.pdf";

    $pdf = new FPDI();
    $pdf->AddPage('P', array(215.9, 355.6));
    
    // Template disabled: Print data only
    // $pageCount = $pdf->setSourceFile('../../marriage.pdf');
    // $templateId = $pdf->importPage(1);
    // $pdf->useTemplate($templateId);

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);

    function fitTextInCell($pdf, $x, $y, $width, $height, $text, $maxFontSize = 12, $minFontSize = 6) {
      $text = (string)($text ?? '');
      $pdf->SetXY($x, $y);
      $fontSize = $maxFontSize;
      while ($fontSize >= $minFontSize) {
          $pdf->SetFont('Arial', '', $fontSize);
          if ($pdf->GetStringWidth($text) <= ($width - 5)) break;
          $fontSize -= 0.5; 
      }
      $pdf->Cell($width, $height, strtoupper($text), 0, 0, 'C');
    }

    // Header Info
    $pdf->SetXY(35, 26); $pdf->Cell(0, 10, strtoupper($row['province'] ?? ''), 0, 1);
    $pdf->SetXY(47, 31); $pdf->Cell(0, 10, strtoupper($row['municipal'] ?? ''), 0, 1);
    $pdf->SetXY(165, 31); $pdf->SetFont('Arial', '', 12); $pdf->Cell(0, 10, strtoupper($row['registry_no'] ?? ''), 0, 1);

    // Husband Data
    fitTextInCell($pdf, 36, 45, 50, 5, $row['husband_fname'] ?? '');
    // ... other husband data ...

    ob_end_clean();
    $pdf->Output('I', $filename);

} catch (Exception $e) {
    showError("PDF Generation Error", $e->getMessage());
}
?>