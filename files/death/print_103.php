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
    require_once 'login_db_death.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) showError("Database Error", "Connection failed: " . $conn->connect_error);

    $reg_no = $_POST['reg_no'] ?? $_GET['reg_no'] ?? '';
    if (empty($reg_no)) showError("Input Error", "No Registry Number provided.");

    $sql = "SELECT registration_tbl.registry_no as registry_no, registration_tbl.no as no, 
            registration_tbl.book_no, registration_tbl.page_no, registration_tbl.province, registration_tbl.municipal,
            person_tbl.*, death_cause_eight_days.*, att_rev_tbl.*, corpse_disposal_tbl.*, 
            inf_pre_tbl.*, receive_civil_tbl.*, remarks_tbl.*, death_cause_zero_seven.*, 
            autopsy_tbl.*, embalmer_tbl.*, late_reg_tbl.*
            FROM registration_tbl 
            LEFT JOIN person_tbl ON registration_tbl.no = person_tbl.no 
            LEFT JOIN death_cause_eight_days ON registration_tbl.no = death_cause_eight_days.no 
            LEFT JOIN att_rev_tbl ON registration_tbl.no = att_rev_tbl.no 
            LEFT JOIN corpse_disposal_tbl ON registration_tbl.no = corpse_disposal_tbl.no 
            LEFT JOIN inf_pre_tbl ON registration_tbl.no = inf_pre_tbl.no 
            LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no 
            LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no 
            LEFT JOIN death_cause_zero_seven ON registration_tbl.no = death_cause_zero_seven.no 
            LEFT JOIN autopsy_tbl ON registration_tbl.no = autopsy_tbl.no 
            LEFT JOIN embalmer_tbl ON registration_tbl.no = embalmer_tbl.no 
            LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no 
            WHERE registration_tbl.no = '$reg_no' LIMIT 1";
    
    $result = $conn->query($sql);
    if (!$result) showError("Database Error", "Query failed: " . $conn->error);
    if ($result->num_rows === 0) showError("Record Not Found", "Could not find Death Record ID: <strong>" . htmlspecialchars($reg_no) . "</strong>");

    $row = $result->fetch_assoc();

    // Sanitize filename
    $fname = preg_replace('/[^A-Za-z0-9_\-]/', '_', ($row['first_name'] ?? 'certificate'));
    $lname = preg_replace('/[^A-Za-z0-9_\-]/', '_', ($row['last_name'] ?? 'record'));
    $filename = "death_{$fname}_{$lname}.pdf";

    $pdf = new FPDI();
    $pdf->AddPage('P', array(215.9, 355.6));
    
    // Template disabled: Print data only
    // $pageCount = $pdf->setSourceFile('death.pdf');
    // $templateId = $pdf->importPage(1);
    // $pdf->useTemplate($templateId);

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    function fitTextInCell($pdf, $x, $y, $width, $height, $text, $maxFontSize = 10, $minFontSize = 5) {
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

    // --- Page 1 Content ---
    $pdf->SetXY(35, 26); $pdf->Cell(0, 10, strtoupper($row['province'] ?? ''), 0, 1);
    $pdf->SetXY(47, 31); $pdf->Cell(0, 10, strtoupper($row['municipal'] ?? ''), 0, 1);
    $pdf->SetXY(165, 31); $pdf->SetFont('Arial', '', 12); $pdf->Cell(0, 10, strtoupper($row['registry_no'] ?? ''), 0, 1); $pdf->SetFont('Arial', '', 10);

    fitTextInCell($pdf, 32, 45, 52, 4, $row['first_name'] ?? '');
    fitTextInCell($pdf, 86, 45, 50, 4, $row['middle_name'] ?? '');
    fitTextInCell($pdf, 140, 45, 60, 4, $row['last_name'] ?? '');

    if (!empty($row['date_birth'])) {
        $tsb = strtotime($row['date_birth']);
        fitTextInCell($pdf, 105, 54, 40, 5, date('d', $tsb));
        fitTextInCell($pdf, 125, 54, 40, 5, date('F', $tsb));
        fitTextInCell($pdf, 165, 54, 40, 5, date('Y', $tsb));
    }

    $pdf->SetXY(35, 55); $pdf->Cell(0, 10, strtoupper($row['sex'] ?? ''), 0, 1);

    if (!empty($row['date_death'])) {
        $tsd = strtotime($row['date_death']);
        fitTextInCell($pdf, 105, 67, 40, 5, date('d', $tsd));
        fitTextInCell($pdf, 125, 67, 40, 5, date('F', $tsd));
        fitTextInCell($pdf, 165, 67, 40, 5, date('Y', $tsd));
    }

    fitTextInCell($pdf, 35, 78, 110, 5, $row['death_place'] ?? '');
    $pdf->SetXY(165, 78); $pdf->Cell(0, 10, strtoupper($row['age'] ?? ''), 0, 1);
    $pdf->SetXY(35, 90); $pdf->Cell(0, 10, strtoupper($row['civil_status'] ?? ''), 0, 1);
    $pdf->SetXY(86, 90); $pdf->Cell(0, 10, strtoupper($row['religion'] ?? ''), 0, 1);
    $pdf->SetXY(140, 90); $pdf->Cell(0, 10, strtoupper($row['citizen'] ?? ''), 0, 1);
    $pdf->SetXY(40, 103); $pdf->Cell(0, 10, strtoupper($row['occupation'] ?? ''), 0, 1);
    fitTextInCell($pdf, 103, 103, 100, 5, $row['residence'] ?? '');
    fitTextInCell($pdf, 40, 114, 160, 5, $row['father_name'] ?? '');
    fitTextInCell($pdf, 40, 126, 160, 5, $row['mother_name'] ?? '');

    // Causes
    $pdf->SetXY(60, 150.5); $pdf->Cell(0, 10, strtoupper($row['immediate_cause'] ?? ''), 0, 1);
    $pdf->SetXY(160, 150.5); $pdf->Cell(0, 10, strtoupper($row['immediate_interval'] ?? ''), 0, 1);
    $pdf->SetXY(60, 162.5); $pdf->Cell(0, 10, strtoupper($row['antecedent_cause'] ?? ''), 0, 1);
    $pdf->SetXY(160, 162.5); $pdf->Cell(0, 10, strtoupper($row['antecedent_interval'] ?? ''), 0, 1);
    $pdf->SetXY(60, 174.5); $pdf->Cell(0, 10, strtoupper($row['underlying_cause'] ?? ''), 0, 1);
    $pdf->SetXY(160, 174.5); $pdf->Cell(0, 10, strtoupper($row['underlying_interval'] ?? ''), 0, 1);
    $pdf->SetXY(60, 186.5); $pdf->Cell(0, 10, strtoupper($row['other_condition_death'] ?? ''), 0, 1);
    $pdf->SetXY(60, 203.5); $pdf->Cell(0, 10, strtoupper($row['maternal_condition'] ?? ''), 0, 1);
    $pdf->SetXY(60, 218.5); $pdf->Cell(0, 10, strtoupper($row['death_manner'] ?? ''), 0, 1);
    $pdf->SetXY(60, 226.5); $pdf->Cell(0, 10, strtoupper($row['place_external_cause'] ?? ''), 0, 1);

    $pdf->SetXY(45, 237.5); $pdf->Cell(0, 10, strtoupper($row['autopsy'] ?? ''), 0, 1);
    $pdf->SetXY(45, 252.5); $pdf->Cell(0, 10, strtoupper($row['attendant'] ?? ''), 0, 1);
    $pdf->SetXY(45, 264.5); $pdf->Cell(0, 10, strtoupper($row['certify_type'] ?? ''), 0, 1);
    $pdf->SetXY(160, 264.5); $pdf->Cell(0, 10, strtoupper($row['death_time'] ?? ''), 0, 1);
    
    $pdf->SetXY(45, 276.5); $pdf->Cell(0, 10, strtoupper($row['attendant_name'] ?? ''), 0, 1);
    $pdf->SetXY(45, 282.5); $pdf->Cell(0, 10, strtoupper($row['attendant_position'] ?? ''), 0, 1);
    $pdf->SetXY(45, 288.5); $pdf->Cell(0, 10, strtoupper($row['attendant_address'] ?? ''), 0, 1);
    $pdf->SetXY(45, 294.5); $pdf->Cell(0, 10, strtoupper($row['attendant_date'] ?? ''), 0, 1);

    $pdf->SetXY(45, 309.5); $pdf->Cell(0, 10, strtoupper($row['corpse_disposal'] ?? ''), 0, 1);
    $pdf->SetXY(45, 321.5); $pdf->Cell(0, 10, strtoupper($row['burial_no'] ?? ''), 0, 1);
    $pdf->SetXY(160, 321.5); $pdf->Cell(0, 10, strtoupper($row['burial_issued_date'] ?? ''), 0, 1);
    $pdf->SetXY(45, 333.5); $pdf->Cell(0, 10, strtoupper($row['cemetery'] ?? ''), 0, 1);

    $pdf->SetXY(45, 345.5); $pdf->Cell(0, 10, strtoupper($row['informant_name'] ?? ''), 0, 1);
    $pdf->SetXY(45, 351.5); $pdf->Cell(0, 10, strtoupper($row['rel_death'] ?? ''), 0, 1);
    $pdf->SetXY(45, 357.5); $pdf->Cell(0, 10, strtoupper($row['informant_address'] ?? ''), 0, 1);
    $pdf->SetXY(45, 363.5); $pdf->Cell(0, 10, strtoupper($row['informant_date'] ?? ''), 0, 1);

    $pdf->SetXY(45, 375.5); $pdf->Cell(0, 10, strtoupper($row['prepared_name'] ?? ''), 0, 1);
    $pdf->SetXY(45, 381.5); $pdf->Cell(0, 10, strtoupper($row['prepared_position'] ?? ''), 0, 1);
    $pdf->SetXY(45, 387.5); $pdf->Cell(0, 10, strtoupper($row['prepared_date'] ?? ''), 0, 1);

    $pdf->SetXY(154.5, 375.5); $pdf->Cell(0, 10, strtoupper($row['received_name'] ?? ''), 0, 1);
    $pdf->SetXY(154.5, 381.5); $pdf->Cell(0, 10, strtoupper($row['received_position'] ?? ''), 0, 1);
    $pdf->SetXY(154.5, 387.5); $pdf->Cell(0, 10, strtoupper($row['received_date'] ?? ''), 0, 1);

    $pdf->SetXY(154.5, 399.5); $pdf->Cell(0, 10, strtoupper($row['civil_name'] ?? ''), 0, 1);
    $pdf->SetXY(154.5, 405.5); $pdf->Cell(0, 10, strtoupper($row['civil_position'] ?? ''), 0, 1);
    $pdf->SetXY(154.5, 411.5); $pdf->Cell(0, 10, strtoupper($row['civil_date'] ?? ''), 0, 1);
    $pdf->SetXY(154.5, 423.5); $pdf->Cell(0, 10, strtoupper($row['remarks'] ?? ''), 0, 1);

    // --- Page 2 Data ---
    $pdf->AddPage('P', array(215.9, 355.6));
    $pdf->SetXY(35, 12); $pdf->Cell(0, 10, strtoupper($row['mother_age'] ?? ''), 0, 1);
    $pdf->SetXY(35, 18); $pdf->Cell(0, 10, strtoupper($row['delivery_method'] ?? ''), 0, 1);
    $pdf->SetXY(35, 24); $pdf->Cell(0, 10, strtoupper($row['pregnancy_length'] ?? ''), 0, 1);
    $pdf->SetXY(35, 30); $pdf->Cell(0, 10, strtoupper($row['birth_type'] ?? ''), 0, 1);
    $pdf->SetXY(35, 36); $pdf->Cell(0, 10, strtoupper($row['multi_birth_was'] ?? ''), 0, 1);
    $pdf->SetXY(35, 42); $pdf->Cell(0, 10, strtoupper($row['main_disease'] ?? ''), 0, 1);
    $pdf->SetXY(35, 48); $pdf->Cell(0, 10, strtoupper($row['other_disease'] ?? ''), 0, 1);
    $pdf->SetXY(35, 54); $pdf->Cell(0, 10, strtoupper($row['main_maternal'] ?? ''), 0, 1);
    $pdf->SetXY(35, 60); $pdf->Cell(0, 10, strtoupper($row['other_maternal'] ?? ''), 0, 1);
    $pdf->SetXY(35, 66); $pdf->Cell(0, 10, strtoupper($row['other_relevant'] ?? ''), 0, 1);

    // Autopsy / Embalmer
    $pdf->SetXY(118.5, 87); $pdf->Cell(0, 10, strtoupper($row['autopsy_txt1'] ?? ''), 0, 1);
    $pdf->SetXY(118.5, 93.5); $pdf->Cell(0, 10, strtoupper($row['autopsy_txt2'] ?? ''), 0, 1);
    $pdf->SetXY(132, 103.5); $pdf->Cell(0, 10, strtoupper($row['autopsy_name'] ?? ''), 0, 1);
    $pdf->SetXY(129.5, 114.7); $pdf->Cell(0, 10, strtoupper($row['autopsy_date'] ?? ''), 0, 1);
    $pdf->SetXY(129.5, 108.7); $pdf->Cell(0, 10, strtoupper($row['autopsy_title'] ?? ''), 0, 1);
    fitTextInCell($pdf, 119, 117, 76, 4, $row['autopsy_address'] ?? '');

    $pdf->SetXY(118.5, 133); $pdf->Cell(0, 10, strtoupper($row['embalmer_txt'] ?? ''), 0, 1);
    $pdf->SetXY(132, 140); $pdf->Cell(0, 10, strtoupper($row['embalmer_name'] ?? ''), 0, 1);
    fitTextInCell($pdf, 119, 149, 76, 4, $row['embalmer_address'] ?? '');
    $pdf->SetXY(129.5, 153.3); $pdf->Cell(0, 10, strtoupper($row['embalmer_title'] ?? ''), 0, 1);
    $pdf->SetXY(129.5, 159.5); $pdf->Cell(0, 10, strtoupper($row['embalmer_no'] ?? ''), 0, 1);
    $pdf->SetXY(129.5, 166.5); $pdf->Cell(0, 10, strtoupper($row['embalmer_on'] ?? ''), 0, 1);
    $pdf->SetXY(129.5, 172.5); $pdf->Cell(0, 10, strtoupper($row['embalmer_at'] ?? ''), 0, 1);
    $pdf->SetXY(129.5, 178.5); $pdf->Cell(0, 10, strtoupper($row['embalmer_expdate'] ?? ''), 0, 1);

    // Late Reg
    $pdf->SetXY(35, 203.5); $pdf->Cell(0, 10, strtoupper($row['late_name'] ?? ''), 0, 1);
    $pdf->SetXY(35, 210); $pdf->Cell(0, 10, strtoupper($row['late_address'] ?? ''), 0, 1);
    $pdf->SetXY(35, 216.5); $pdf->Cell(0, 10, strtoupper($row['death_name'] ?? ''), 0, 1);
    $pdf->SetXY(35, 223); $pdf->Cell(0, 10, strtoupper($row['died_on'] ?? ''), 0, 1);
    $pdf->SetXY(35, 229.5); $pdf->Cell(0, 10, strtoupper($row['died_in'] ?? ''), 0, 1);
    $pdf->SetXY(35, 236); $pdf->Cell(0, 10, strtoupper($row['buried_in'] ?? ''), 0, 1);
    $pdf->SetXY(35, 242.5); $pdf->Cell(0, 10, strtoupper($row['buried_on'] ?? ''), 0, 1);
    $pdf->SetXY(35, 249); $pdf->Cell(0, 10, strtoupper($row['attended_type'] ?? ''), 0, 1);
    $pdf->SetXY(35, 255.5); $pdf->Cell(0, 10, strtoupper($row['attended_by'] ?? ''), 0, 1);
    $pdf->SetXY(35, 262); $pdf->Cell(0, 10, strtoupper($row['late_death_cause'] ?? ''), 0, 1);
    $pdf->SetXY(35, 268.5); $pdf->Cell(0, 10, strtoupper($row['late_reg_reason'] ?? ''), 0, 1);

    $pdf->SetXY(35, 287.5); $pdf->Cell(0, 10, strtoupper($row['sign_day'] ?? ''), 0, 1);
    $pdf->SetXY(65, 287.5); $pdf->Cell(0, 10, strtoupper($row['sign_month'] ?? ''), 0, 1);
    $pdf->SetXY(95, 287.5); $pdf->Cell(0, 10, strtoupper($row['sign_year'] ?? ''), 0, 1);
    $pdf->SetXY(135, 287.5); $pdf->Cell(0, 10, strtoupper($row['sign_at'] ?? ''), 0, 1);
    $pdf->SetXY(35, 294); $pdf->Cell(0, 10, strtoupper($row['affiant_name'] ?? ''), 0, 1);

    $pdf->SetXY(35, 301); $pdf->Cell(0, 10, strtoupper($row['sworn_day'] ?? ''), 0, 1);
    $pdf->SetXY(65, 301); $pdf->Cell(0, 10, strtoupper($row['sworn_month'] ?? ''), 0, 1);
    $pdf->SetXY(95, 301); $pdf->Cell(0, 10, strtoupper($row['sworn_year'] ?? ''), 0, 1);
    $pdf->SetXY(135, 301); $pdf->Cell(0, 10, strtoupper($row['sworn_at'] ?? ''), 0, 1);

    $pdf->SetXY(35, 307.5); $pdf->Cell(0, 10, strtoupper($row['ctc'] ?? ''), 0, 1);
    $pdf->SetXY(65, 307.5); $pdf->Cell(0, 10, strtoupper($row['issued_on'] ?? ''), 0, 1);
    $pdf->SetXY(118, 307.5); $pdf->Cell(0, 10, strtoupper($row['issued_at'] ?? ''), 0, 1);
    $pdf->SetXY(35, 314); $pdf->Cell(0, 10, strtoupper($row['administer_name'] ?? ''), 0, 1);

    ob_end_clean();
    $pdf->Output('I', $filename);

} catch (Exception $e) {
    showError("PDF Generation Error", $e->getMessage());
}
?>