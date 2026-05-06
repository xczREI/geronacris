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

<<<<<<< HEAD
try {
    
    // Check files existence
    if (!file_exists('../../fpdf/fpdf.php')) showError("System Error", "Library file missing: fpdf.php");
    if (!file_exists('../../fpdi/src/autoload.php')) showError("System Error", "Library file missing: fpdi/autoload.php");
    if (!file_exists('login_db_birth.php')) showError("System Error", "Database config missing: login_db_birth.php");

    require_once('../../fpdf/fpdf.php');
    require_once('../../fpdi/src/autoload.php');
    require_once 'login_db_birth.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) showError("Database Error", "Connection failed: " . $conn->connect_error);

    $reg_no = $_POST['reg_no'] ?? $_GET['reg_no'] ?? '';
    if (empty($reg_no)) showError("Input Error", "No Registry Number provided.");

    $sql = "SELECT registration_tbl.registry_no as registry_no, registration_tbl.no as no, 
            registration_tbl.book_no, registration_tbl.page_no, registration_tbl.province, registration_tbl.municipal,
            child_tbl.*, mother_tbl.*, father_tbl.*, att_inf_tbl.*, receive_civil_tbl.*, 
            remarks_tbl.*, admission_paternity_tbl.*, late_reg_tbl.* 
            FROM registration_tbl 
            LEFT JOIN child_tbl ON registration_tbl.no = child_tbl.no 
            LEFT JOIN mother_tbl ON registration_tbl.no = mother_tbl.no 
            LEFT JOIN father_tbl ON registration_tbl.no = father_tbl.no 
            LEFT JOIN att_inf_tbl ON registration_tbl.no = att_inf_tbl.no 
            LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no 
            LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no 
            LEFT JOIN admission_paternity_tbl ON registration_tbl.no = admission_paternity_tbl.no 
            LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no 
            WHERE registration_tbl.no = '$reg_no' LIMIT 1";
    
    $result = $conn->query($sql);
    if (!$result) showError("Database Error", "Query failed: " . $conn->error);

    if ($result->num_rows === 0) showError("Record Not Found", "The system could not find a Birth Record with ID: <strong>" . htmlspecialchars($reg_no) . "</strong>");
=======
$sql = "SELECT *, registration_tbl.no as no FROM registration_tbl 
        LEFT JOIN child_tbl ON registration_tbl.no = child_tbl.no 
        LEFT JOIN mother_tbl ON registration_tbl.no = mother_tbl.no 
        LEFT JOIN father_tbl ON registration_tbl.no = father_tbl.no 
        LEFT JOIN att_inf_tbl ON registration_tbl.no = att_inf_tbl.no 
        LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no 
        LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no 
        LEFT JOIN admission_paternity_tbl ON registration_tbl.no = admission_paternity_tbl.no 
        LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no 
        WHERE registration_tbl.no = '$reg_no' LIMIT 1";
$result = $conn->query($sql);
if (!$result) die ("Database access failed: " . $conn->error);
>>>>>>> 4857b88a4be86b8850fa34bb93fa56fe294fddb0

    $row = $result->fetch_assoc();

    // Sanitize filename
    $fname = preg_replace('/[^A-Za-z0-9_\-]/', '_', ($row['child_fname'] ?? 'certificate'));
    $lname = preg_replace('/[^A-Za-z0-9_\-]/', '_', ($row['child_lname'] ?? 'record'));
    $filename = "birth_{$fname}_{$lname}.pdf";

    // =========================================================================
    // DYNAMIC BOUNDING BOX MATH ENGINE 
    // =========================================================================
    if (!class_exists('ADJUSTABLE_PDF')) {
        class ADJUSTABLE_PDF extends FPDI {
            public $l = 0; public $t = 0; public $scaleX = 1.0; public $scaleY = 1.0;
            function SetXY($x, $y) {
                $finalX = ($x * $this->scaleX) + $this->l;
                $finalY = ($y * $this->scaleY) + $this->t;
                parent::SetXY($finalX, $finalY);
            }
            function SetFont($family, $style = '', $size = 0) {
                if ($size > 0) $size = $size * min($this->scaleX, $this->scaleY);
                parent::SetFont($family, $style, $size);
            }
            function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '') {
                $scaledW = $w * $this->scaleX; $scaledH = $h * $this->scaleY;
                parent::Cell($scaledW, $scaledH, $txt, $border, $ln, $align, $fill, $link);
            }
        }
    }

    $pdf = new ADJUSTABLE_PDF();
    $pdf->t = isset($_POST['m_top']) ? floatval($_POST['m_top']) : 0;
    $pdf->l = isset($_POST['m_left']) ? floatval($_POST['m_left']) : 0;
    $scale = isset($_POST['final_scale']) ? (floatval($_POST['final_scale']) / 100) : 1.0;
    $pdf->scaleX = $pdf->scaleY = $scale;

    $pdf->AddPage('P', array(215.9, 355.6)); 
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    // Helper functions
    function fitTextInCell($pdf, $x, $y, $width, $height, $text, $maxFontSize = 10, $minFontSize = 5) {
        $pdf->SetXY($x, $y); 
        $scaledWidth = $width * $pdf->scaleX; 
        $fontSize = $maxFontSize;
        while ($fontSize >= $minFontSize) {
            $pdf->SetFont('Arial', '', $fontSize);
            if ($pdf->GetStringWidth($text ?? '') <= ($scaledWidth - 5)) break;
            $fontSize -= 0.5; 
        }
        $pdf->SetFont('Arial', '', max($fontSize, $minFontSize));
        $pdf->Cell($width, $height, strtoupper($text ?? ''), 0, 0, 'C'); 
        $pdf->SetFont('Arial', '', 10); 
    }
    
    function fitTextInCellAddress($pdf, $x, $y, $width, $height, $text, $maxFontSize = 10, $minFontSize = 4) {
        $pdf->SetXY($x, $y);
        $scaledWidth = $width * $pdf->scaleX;
        $fontSize = $maxFontSize;
        while ($fontSize >= $minFontSize) {
            $pdf->SetFont('Arial', '', $fontSize);
            if ($pdf->GetStringWidth($text ?? '') < ($scaledWidth - 5)) break;
            $fontSize -= 0.5; 
        }
        $pdf->SetFont('Arial', '', max($fontSize, $minFontSize));
        $pdf->Cell($width, $height, strtoupper($text ?? ''), 0, 0, 'C');
        $pdf->SetFont('Arial', '', 10);
    }

    // --- Page 1 Data ---
    $pdf->SetXY(35, 31); $pdf->Cell(0, 10, strtoupper($row['province'] ?? ''), 0, 1);
    $pdf->SetXY(47, 37); $pdf->Cell(0, 10, strtoupper($row['municipal'] ?? ''), 0, 1);
    $pdf->SetXY(165, 37); $pdf->SetFont('Arial', '', 12); $pdf->Cell(0, 10, strtoupper($row['registry_no'] ?? ''), 0, 1); $pdf->SetFont('Arial', '', 10);

    fitTextInCell($pdf, 36, 50, 45, 4, $row['child_fname'] ?? '');
    fitTextInCell($pdf, 81, 50, 55, 4, $row['child_mname'] ?? '');
    fitTextInCell($pdf, 135, 50, 60, 4, $row['child_lname'] ?? '');
    
    $pdf->SetXY(37, 58); $pdf->Cell(0, 10, strtoupper($row['child_sex'] ?? ''), 0, 1);

    $sampleBirth = $row['child_birth_date'] ?? '';
    if (!empty($sampleBirth) && $sampleBirth != '0000-00-00') {
        $ts = strtotime($sampleBirth);
        fitTextInCell($pdf, 105, 59, 40, 5, date('d', $ts));
        fitTextInCell($pdf, 125, 59, 40, 5, date('F', $ts));
        fitTextInCell($pdf, 165, 59, 40, 5, date('Y', $ts));
    }
    
    fitTextInCell($pdf, 35, 70, 75, 5, $row['birth_brgy'] ?? '');
    fitTextInCell($pdf, 96, 70, 75, 5, $row['birth_municipal'] ?? '');
    fitTextInCell($pdf, 146, 70, 75, 5, $row['birth_province'] ?? '');
    
    $pdf->SetXY(40, 81); $pdf->Cell(0, 10, strtoupper($row['birth_type'] ?? ''), 0, 1);
    $pdf->SetXY(90, 81); $pdf->Cell(0, 10, strtoupper($row['if_multi_birth_was'] ?? ''), 0, 1);
    $pdf->SetXY(142, 81); $pdf->Cell(0, 10, strtoupper($row['birth_order'] ?? ''), 0, 1);
    $pdf->SetXY(180, 80); $pdf->Cell(0, 10, strtoupper($row['birth_weight'] ?? ''), 0, 1);

    fitTextInCell($pdf, 37, 95, 45, 5, $row['mother_fname'] ?? '');
    fitTextInCell($pdf, 82, 95, 60, 5, $row['mother_mname'] ?? '');
    fitTextInCell($pdf, 140, 95, 53, 5, $row['mother_lname'] ?? '');
    
    $pdf->SetXY(49, 102); $pdf->Cell(0, 10, strtoupper($row['mother_citizen'] ?? ''), 0, 1);
    fitTextInCell($pdf, 116, 104, 85, 5, $row['mother_religion'] ?? '');
    
    $pdf->SetXY(36, 115); $pdf->Cell(0, 10, strtoupper($row['ttl_no_child'] ?? ''), 0, 1);
    $pdf->SetXY(66, 115); $pdf->Cell(0, 10, strtoupper($row['no_child_alive'] ?? ''), 0, 1);
    $pdf->SetXY(96, 114.7); $pdf->Cell(0, 10, strtoupper($row['no_child_dead'] ?? ''), 0, 1);
    
    fitTextInCell($pdf, 118, 116, 55, 5, $row['mother_occupation'] ?? '');
    $pdf->SetXY(186, 114); $pdf->Cell(0, 10, strtoupper($row['mother_age'] ?? ''), 0, 1);
    
    fitTextInCell($pdf, 41, 127, 50, 5, $row['mother_brgy'] ?? '');
    fitTextInCell($pdf, 91, 127, 40, 5, $row['mother_municipal'] ?? '');
    fitTextInCell($pdf, 131, 127, 40, 5, $row['mother_province'] ?? '');
    fitTextInCell($pdf, 169, 127, 40, 5, $row['mother_country'] ?? '');

    fitTextInCell($pdf, 31, 138, 56, 5, $row['father_fname'] ?? '');
    fitTextInCell($pdf, 87, 138, 58, 5, $row['father_mname'] ?? '');
    fitTextInCell($pdf, 145, 138, 58, 5, $row['father_lname'] ?? '');
    
    $pdf->SetXY(31, 148.5); $pdf->Cell(0, 10, strtoupper($row['father_citizen'] ?? ''), 0, 1);
    fitTextInCell($pdf, 71, 150.5, 52, 5, $row['father_religion'] ?? '');
    fitTextInCell($pdf, 124, 150.5, 48, 5, $row['father_occupation'] ?? '');
    $pdf->SetXY(184, 148.3); $pdf->Cell(0, 10, strtoupper($row['father_age'] ?? ''), 0, 1);
    
    $f_brgy = strtoupper($row['father_brgy'] ?? '');
    if ($f_brgy === "NOT APPLICABLE" || $f_brgy === "N/A" || $f_brgy === "UNKNOWN") {
        fitTextInCell($pdf, 94, 160, 52, 5, $row['father_brgy'] ?? '');
    } else {
        fitTextInCell($pdf, 42, 160, 52, 5, $row['father_brgy'] ?? '');
        fitTextInCell($pdf, 94, 160, 41, 5, $row['father_municipal'] ?? '');
        fitTextInCell($pdf, 135, 160, 40, 5, $row['father_province'] ?? '');
        fitTextInCell($pdf, 169, 160, 40, 5, $row['father_country'] ?? '');
    }
    
    fitTextInCell($pdf, 41, 176, 47, 5, $row['marriage_date'] ?? '');
    if (strtoupper($row['marriage_date'] ?? '') === "NOT APPLICABLE") {
        fitTextInCell($pdf, 97, 176, 104, 5, "NOT APPLICABLE");
    } else {
        fitTextInCell($pdf, 97, 176, 104, 5, $row['marriage_place'] ?? '');
    }
    
    $att_type = $row['attendant_type'] ?? '';
    if ($att_type == 'Physician' ) { $pdf->SetXY(20, 186.5); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($att_type == 'Nurse' ) { $pdf->SetXY(47, 186.5); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($att_type == 'Midwife' ) { $pdf->SetXY(70, 186); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($att_type == 'Hilot' ) { $pdf->SetXY(95, 186); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if (!empty($att_type)) { $pdf->SetXY(149, 186); $pdf->Cell(0, 10, 'X', 0, 1); $pdf->SetXY(180, 186); $pdf->Cell(0, 10, strtoupper($att_type), 0, 1); }

    if (!empty($row['birth_time'])) {
        $pdf->SetFont('Arial', '', 14);
        fitTextInCell($pdf, 125, 198, 30, 5, date("g:i a", strtotime($row['birth_time'])));
    }

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(35, 203); $pdf->Cell(0, 10, strtoupper($row['attendant_name'] ?? ''), 0, 1);
    $pdf->SetXY(38, 209); $pdf->Cell(0, 10, strtoupper($row['attendant_name'] ?? ''), 0, 1);
    fitTextInCell($pdf, 123, 206, 80, 5, $row['attendant_address'] ?? '');
    $pdf->SetXY(40, 215.5); $pdf->Cell(0, 10, strtoupper($row['attendant_position'] ?? ''), 0, 1);
    $pdf->SetXY(120, 215); $pdf->Cell(0, 10, strtoupper($row['attendant_date'] ?? ''), 0, 1);

    if (!empty($row['informant_name']) && !in_array(strtoupper($row['informant_name']), ['N/A','UNKNOWN'])) {
        $pdf->SetXY(34, 234); $pdf->Cell(0, 10, strtoupper($row['informant_name']), 0, 1);
        $pdf->SetXY(37, 240); $pdf->Cell(0, 10, strtoupper($row['informant_name']), 0, 1);
        $pdf->SetXY(72, 246.5); $pdf->Cell(0, 10, strtoupper($row['rel_child'] ?? ''), 0, 1);
        fitTextInCell($pdf, 30, 254.5, 80, 5, $row['informant_address'] ?? '');
        $pdf->SetXY(30, 257.5); $pdf->Cell(0, 10, strtoupper($row['informant_date'] ?? ''), 0, 1);
    }

    $pdf->SetXY(36, 267.5); $pdf->Cell(0, 10, strtoupper($row['received_name'] ?? ''), 0, 1);
    $pdf->SetXY(39, 273.5); $pdf->Cell(0, 10, strtoupper($row['received_name'] ?? ''), 0, 1);
    $pdf->SetXY(44, 278.5); $pdf->Cell(0, 10, strtoupper($row['received_position'] ?? ''), 0, 1);
    $pdf->SetXY(30, 284); $pdf->Cell(0, 10, strtoupper($row['received_date'] ?? ''), 0, 1);

    $pdf->SetXY(128, 232.5); $pdf->Cell(0, 10, strtoupper($row['prepared_name'] ?? ''), 0, 1);
    $pdf->SetXY(131, 238.5); $pdf->Cell(0, 10, strtoupper($row['prepared_name'] ?? ''), 0, 1);
    $pdf->SetXY(135, 246); $pdf->Cell(0, 10, strtoupper($row['prepared_position'] ?? ''), 0, 1);
    $pdf->SetXY(127, 251); $pdf->Cell(0, 10, strtoupper($row['prepared_date'] ?? ''), 0, 1);

    $pdf->SetXY(128, 267); $pdf->Cell(0, 10, strtoupper($row['civil_name'] ?? ''), 0, 1);
    $pdf->SetXY(131, 273); $pdf->Cell(0, 10, strtoupper($row['civil_name'] ?? ''), 0, 1);
    $pdf->SetXY(139, 278); $pdf->Cell(0, 10, strtoupper($row['civil_position'] ?? ''), 0, 1);
    $pdf->SetXY(127, 283.5); $pdf->Cell(0, 10, strtoupper($row['civil_date'] ?? ''), 0, 1);
    $pdf->SetXY(30, 297); $pdf->Cell(0, 10, strtoupper($row['remarks'] ?? ''), 0, 1);

<<<<<<< HEAD
    // --- Page 2 Data ---
=======
    // Remarks
    $pdf->SetXY(30, 297);
    $pdf->Cell(0, 10, strtoupper($row['remarks'] ?? ''), 0, 1);

    // ==========================================
    // PAGE 2 
    // ==========================================
    // ==========================================
    // PAGE 2 
    // ==========================================
>>>>>>> 4857b88a4be86b8850fa34bb93fa56fe294fddb0
    $pdf->AddPage('P', array(215.9, 355.6));
    $pdf->l = isset($_POST['m_right']) ? floatval($_POST['m_right']) : 0;
<<<<<<< HEAD
    
    fitTextInCell($pdf, 33, 21, 77, 5, $row['father_name'] ?? '');
    fitTextInCell($pdf, 120, 21, 77, 5, $row['mother_name'] ?? '');
    $pdf->SetXY(109, 23); $pdf->Cell(0, 10, strtoupper($row['child_name'] ?? ''), 0, 1);
    
    if (!empty($row['child_birth_date'])) {
        $pdf->SetXY(31, 27.5); $pdf->Cell(0, 10, strtoupper(date('F j, Y', strtotime($row['child_birth_date']))), 0, 1);
    }
    fitTextInCellAddress($pdf, 93, 30.5, 100, 5, $row['birth_place'] ?? '');
    fitTextInCell($pdf, 15, 52, 64, 5, $row['father_name'] ?? '');
    fitTextInCell($pdf, 132, 52, 64, 5, $row['mother_name'] ?? '');
=======

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    // --- NEW FALLBACK LOGIC ---
    // Pulls from admission_paternity_tbl if available, otherwise concatenates from the main tables
    $father_full_name = !empty($row['father_name']) ? $row['father_name'] : trim(($row['father_fname'] ?? '') . ' ' . ($row['father_mname'] ?? '') . ' ' . ($row['father_lname'] ?? ''));
    $mother_full_name = !empty($row['mother_name']) ? $row['mother_name'] : trim(($row['mother_fname'] ?? '') . ' ' . ($row['mother_mname'] ?? '') . ' ' . ($row['mother_lname'] ?? ''));
    $child_full_name  = !empty($row['child_name'])  ? $row['child_name']  : trim(($row['child_fname'] ?? '') . ' ' . ($row['child_mname'] ?? '') . ' ' . ($row['child_lname'] ?? ''));
    
    $birth_place_fallback = !empty($row['birth_place']) ? $row['birth_place'] : trim(($row['birth_brgy'] ?? '') . ', ' . ($row['birth_municipal'] ?? '') . ', ' . ($row['birth_province'] ?? ''));
    $birth_place_fallback = trim($birth_place_fallback, ', '); // Cleans up trailing commas if data is missing

    // Father Name
    $pdf->SetXY(33, 18.5);
    fitTextInCell($pdf, 33, 21, 77, 5, $father_full_name);
    
    // Mother Name
    $pdf->SetXY(120, 18.5);
    fitTextInCell($pdf, 120, 21, 77, 5, $mother_full_name);
    
    // Child Name
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(109, 23);
    $pdf->Cell(0, 10, strtoupper($child_full_name), 0, 1);
    
    // Birth Date (Added safe check for 0000-00-00 to prevent PHP Fatal Errors)
    $pdf->SetXY(31, 27.5);
    $date = (!empty($row['child_birth_date']) && $row['child_birth_date'] != '0000-00-00') ? date('F j, Y', strtotime($row['child_birth_date'])) : '';
    $pdf->Cell(0, 10, strtoupper($date), 0, 1);
    
    // Birth Place
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(93, 27.5);
    fitTextInCellAddress($pdf, 93, 30.5, 100, 5, $birth_place_fallback);

    // Signature Father Name
    $pdf->SetXY(22, 49.5);
    fitTextInCell($pdf, 15, 52, 64, 5, $father_full_name);
    
    // Signature Mother Name
    $pdf->SetXY(139, 49.5);
    fitTextInCell($pdf, 132, 52, 64, 5, $mother_full_name);
>>>>>>> 4857b88a4be86b8850fa34bb93fa56fe294fddb0

    if (!function_exists('addOrdinalSuffix')) {
        function addOrdinalSuffix($num) {
            if (!in_array(($num % 100), [11, 12, 13])) {
                switch ($num % 10) { case 1: return $num.'st'; case 2: return $num.'nd'; case 3: return $num.'rd'; }
            }
            return $num.'th';
        }
    }
    
<<<<<<< HEAD
    $pdf->SetXY(94.5, 65.5); $pdf->Cell(0, 10, addOrdinalSuffix((int)($row['sworn_day'] ?? 0)), 0, 1);
    $pdf->SetXY(135.5, 65.5); $pdf->Cell(0, 10, strtoupper($row['sworn_month'] ?? ''), 0, 1);
    $pdf->SetXY(173.5, 65.5); $pdf->Cell(0, 10, strtoupper($row['sworn_year'] ?? ''), 0, 1);
    fitTextInCell($pdf, 14, 73.4, 64, 5, $row['father_name'] ?? '');
    fitTextInCell($pdf, 85, 73.4, 64, 5, $row['mother_name'] ?? '');
    $pdf->SetXY(36, 76); $pdf->Cell(0, 10, strtoupper($row['ctc'] ?? ''), 0, 1);
    $pdf->SetXY(136, 76); $pdf->Cell(0, 10, strtoupper($row['issued_on'] ?? ''), 0, 1);
=======
    // Sworn Day
    $sworn_day = addOrdinalSuffix((int)($row['sworn_day'] ?? 0));
    $pdf->SetXY(94.5, 65.5);
    $pdf->Cell(0, 10, strtolower($sworn_day), 0, 1);
    // Sworn month
    $pdf->SetXY(135.5, 65.5);
    $pdf->Cell(0, 10, strtoupper($row['sworn_month'] ?? ''), 0, 1);
    // Sworn year
    $pdf->SetXY(173.5, 65.5);
    $pdf->Cell(0, 10, strtoupper($row['sworn_year'] ?? ''), 0, 1);

    // Sworn Father Name
    $pdf->SetXY(14, 71);
    fitTextInCell($pdf, 14, 73.4, 64, 5, $father_full_name);
    
    // Sworn Mother Name
    $pdf->SetXY(85  , 71);
    fitTextInCell($pdf, 85, 73.4, 64, 5, $mother_full_name);
    $pdf->SetFont('Arial', '', 9.5);
    // CTC
    $pdf->SetXY(36, 76);
    $pdf->Cell(0, 10, strtoupper($row['ctc'] ?? ''), 0, 1);
    // Issued On
    $pdf->SetXY(136, 76);
    $pdf->Cell(0, 10, strtoupper($row['issued_on'] ?? ''), 0, 1);
    // Issued at
    $pdf->SetXY(14, 81);
>>>>>>> 4857b88a4be86b8850fa34bb93fa56fe294fddb0
    fitTextInCell($pdf, 14, 83, 75, 5, $row['issued_at'] ?? '');
    fitTextInCell($pdf, 15, 111, 64, 5, $row['administer_name'] ?? '');
    fitTextInCell($pdf, 132, 102, 64, 5, $row['administer_position'] ?? '');
    fitTextInCell($pdf, 132, 111, 64, 5, $row['administer_address'] ?? '');

    fitTextInCell($pdf, 26, 133, 77, 5, $row['late_name'] ?? '');
    fitTextInCell($pdf, 70, 139.5, 127, 5, $row['late_address'] ?? '');

    $late_birth = $row['late_birth_type'] ?? '';
    if ($late_birth == 'my birth') {
        $pdf->SetXY(29.3, 157); $pdf->Cell(0, 10, 'X', 0, 1);
        fitTextInCell($pdf, 55, 158.5, 66, 5, $row['late_birth_in'] ?? '');
        if (!empty($row['late_birth_on'])) fitTextInCell($pdf, 128, 158.5, 68, 5, strtoupper(date('F j, Y', strtotime($row['late_birth_on']))));
    } else if ($late_birth == 'the birth'){
        $pdf->SetXY(29.3, 163.8); $pdf->Cell(0, 10, 'X', 0, 1);
        fitTextInCell($pdf, 55, 167, 60, 5, $row['late_birth_of'] ?? '');
        fitTextInCell($pdf, 147, 167, 50, 5, $row['late_birth_in'] ?? '');
        if (!empty($row['late_birth_on'])) { $pdf->SetXY(102.3, 170.5); $pdf->Cell(0, 10, strtoupper(date('F j, Y', strtotime($row['late_birth_on']))), 0, 1); }
    }

    fitTextInCell($pdf, 93, 180, 78, 5, $row['attend_birth_by'] ?? '');
    fitTextInCell($pdf, 27, 184.5, 138, 5, $row['who_resides_at'] ?? '');
    fitTextInCell($pdf, 82, 192, 88, 5, $row['late_citizen'] ?? '');

    if (strtolower(trim($row['married_type'] ?? '')) == 'married') {
        $pdf->SetXY(76.6, 197.5); $pdf->Cell(0, 10, 'X', 0, 1);
        if (!empty($row['married_on'])) { $pdf->SetXY(106.6, 197.5); $pdf->Cell(0, 10, strtoupper(date('F j, Y', strtotime($row['married_on']))), 0, 1); }
        fitTextInCell($pdf, 156, 200, 42, 5, $row['married_at'] ?? '');
    } else if (strtolower(trim($row['married_type'] ?? '')) == 'not married') {
        $pdf->SetXY(73.6, 208.5); $pdf->Cell(0, 10, 'X', 0, 1);
        fitTextInCell($pdf, 140, 217, 52, 5, $row['not_married_name'] ?? '');
    }
    
    fitTextInCell($pdf, 133, 223, 65, 5, $row['late_reg_reason'] ?? '');
    fitTextInCell($pdf, 105, 234.5, 73, 5, $row['applicant_only'] ?? '');
    fitTextInCell($pdf, 138, 240.5, 29, 5, $row['applicant_than_owner'] ?? '');
    
    $pdf->SetXY(118, 261.5); $pdf->Cell(0, 10, addOrdinalSuffix((int)($row['sign_day'] ?? 0)), 0, 1);
    $pdf->SetXY(149, 261.5); $pdf->Cell(0, 10, strtoupper(($row['sign_month'] ?? '') . ' ' . ($row['sign_year'] ?? '')), 0, 1);
    fitTextInCellAddress($pdf, 80, 269, 67, 4, $row['sign_at'] ?? '');
    fitTextInCell($pdf, 147, 272.5, 60, 4, $row['affiant_name'] ?? '');
    
    $pdf->SetXY(100, 292.5); $pdf->Cell(0, 10, addOrdinalSuffix((int)($row['late_sworn_day'] ?? 0)), 0, 1);
    $pdf->SetXY(130, 292.5); $pdf->Cell(0, 10, strtoupper($row['late_sworn_month'] ?? ''), 0, 1);
    $pdf->SetXY(170, 292.5); $pdf->Cell(0, 10, strtoupper($row['late_sworn_year'] ?? ''), 0, 1);
    fitTextInCellAddress($pdf, 15, 303.5, 73, 5, $row['late_sworn_at'] ?? '');
    $pdf->SetXY(15, 303); $pdf->Cell(0, 10, strtoupper($row['late_ctc'] ?? ''), 0, 1);
    $pdf->SetXY(75, 307); $pdf->Cell(0, 10, strtoupper($row['late_issued_on'] ?? ''), 0, 1);
    fitTextInCellAddress($pdf, 132, 308, 66, 5, $row['late_issued_at'] ?? '');
    fitTextInCell($pdf, 25, 326.5, 76, 5, ($row['late_administer_name'] ?? ''));
    fitTextInCellAddress($pdf, 127, 326.5, 76, 5, ($row['late_administer_address'] ?? ''));
    fitTextInCellAddress($pdf, 127, 314.5, 76, 5, ($row['late_administer_position'] ?? ''));

    ob_end_clean();
    $pdf->Output('I', $filename);

} catch (Exception $e) {
    showError("PDF Generation Error", $e->getMessage());
}
?>