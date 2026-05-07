<?php
// PHP 8.1+ Compatibility: Suppress deprecated notices that break PDF generation
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ini_set('display_errors', 0); 

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
    if (!file_exists('login_db_birth.php')) showError("System Error", "Database config missing: login_db_birth.php");

    require_once('../../fpdf/fpdf.php');
    require_once('../../fpdi/src/autoload.php');
    require_once 'login_db_birth.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) showError("Database Error", "Connection failed: " . $conn->connect_error);

    $reg_no = $_POST['reg_no'] ?? $_REQUEST['reg_no'] ?? '';
    
    // --- COMPREHENSIVE LIVE DATA MAPPING ---
    if (isset($_POST['is_live_print']) && $_POST['is_live_print'] == '1') {
        $row = $_POST;
        // Page 1 Metadata
        $row['reg_no_official'] = $_POST['registry_no'] ?? '';
        $row['book_official'] = $_POST['book_no'] ?? '';
        $row['page_official'] = $_POST['page_no'] ?? '';
        $row['province_official'] = $_POST['provinces'] ?? '';
        $row['municipal_official'] = $_POST['municipals'] ?? '';
        $row['date_registered_official'] = $_POST['reg_date'] ?? '';
        // Page 1 Data
        $row['child_birth_date'] = $_POST['birth_day'] ?? '';
        $row['birth_municipal'] = $_POST['birth_city'] ?? '';
        $row['mother_religion'] = $_POST['mother_sect'] ?? '';
        $row['mother_municipal'] = $_POST['mother_city'] ?? '';
        $row['father_religion'] = $_POST['father_sect'] ?? '';
        $row['father_municipal'] = $_POST['father_city'] ?? '';
        $row['attendant_type'] = $_POST['attendant_type_live'] ?? '';
        $row['attendant_address'] = $_POST['attendant_address1'] ?? '';
        // Page 2 - Paternity
        $row['father_name'] = $_POST['father_name'] ?? '';
        $row['mother_name'] = $_POST['mother_name'] ?? '';
        $row['child_name'] = $_POST['child_name'] ?? '';
        $row['birth_date'] = $_POST['birth_date'] ?? '';
        $row['birth_place'] = $_POST['birth_place'] ?? '';
        $row['sworn_day'] = $_POST['ack_sworn_day'] ?? '';
        $row['sworn_month'] = $_POST['ack_sworn_month'] ?? '';
        $row['sworn_year'] = $_POST['ack_sworn_year'] ?? '';
        $row['child_gender'] = $_POST['birth_gender'] ?? '';
        $row['ctc'] = $_POST['ack_ctc'] ?? '';
        $row['issued_on'] = $_POST['ack_issued_on'] ?? '';
        $row['issued_at'] = $_POST['ack_issued_at'] ?? '';
        $row['administer_name'] = $_POST['ack_sworn_name'] ?? '';
        $row['administer_position'] = $_POST['ack_sworn_position'] ?? '';
        $row['administer_address'] = $_POST['ack_sworn_address'] ?? '';
        // Page 2 - Late Registration
        $row['late_name'] = $_POST['late_name'] ?? '';
        $row['late_address'] = $_POST['late_address'] ?? '';
        $row['late_birth_type'] = (!empty($_POST['late_birth_type'])) ? $_POST['late_birth_type'] : ($_POST['late_birth_type2'] ?? '');
        $row['late_birth_of'] = $_POST['late_birth_of'] ?? '';
        $row['late_birth_in'] = (!empty($_POST['late_birth_in'])) ? $_POST['late_birth_in'] : ($_POST['late_birth_in2'] ?? '');
        $row['late_birth_on'] = (!empty($_POST['late_birth_on'])) ? $_POST['late_birth_on'] : ($_POST['late_birth_on2'] ?? '');
        $row['attend_birth_by'] = $_POST['attend_birth_by'] ?? '';
        $row['who_resides_at'] = $_POST['who_resides_at'] ?? '';
        $row['late_citizen'] = $_POST['late_citizen'] ?? '';
        $row['married_type'] = (!empty($_POST['married_type'])) ? $_POST['married_type'] : ($_POST['married_type2'] ?? '');
        $row['married_on'] = $_POST['married_on'] ?? '';
        $row['married_at'] = $_POST['married_at'] ?? '';
        $row['not_married_name'] = $_POST['not_married_name'] ?? '';
        $row['late_reg_reason'] = trim(($_POST['late_reason_1'] ?? '') . ' ' . ($_POST['late_reason_2'] ?? ''));
        $row['applicant_only'] = $_POST['applicant_only'] ?? '';
        $row['applicant_than_owner'] = $_POST['applicant_than_owner'] ?? '';
        $row['sign_day'] = $_POST['sign_day'] ?? '';
        $row['sign_month'] = $_POST['sign_month'] ?? '';
        $row['sign_year'] = $_POST['sign_year'] ?? '';
        $row['sign_at'] = $_POST['sign_at'] ?? '';
        $row['affiant_name'] = $_POST['affiant_name'] ?? '';
        $row['late_sworn_day'] = $_POST['late_sworn_day'] ?? '';
        $row['late_sworn_month'] = $_POST['late_sworn_month'] ?? '';
        $row['late_sworn_year'] = $_POST['late_sworn_year'] ?? '';
        $row['late_sworn_at'] = $_POST['late_sworn_at'] ?? '';
        $row['late_ctc'] = $_POST['late_ctc'] ?? '';
        $row['late_issued_on'] = $_POST['late_issued_on'] ?? '';
        $row['late_issued_at'] = $_POST['late_issued_at'] ?? '';
        $row['late_administer_name'] = $_POST['late_sworn_name'] ?? '';
        $row['late_administer_position'] = $_POST['late_sworn_position'] ?? '';
        $row['late_administer_address'] = $_POST['late_sworn_address'] ?? '';
    } else {
        $sql = "SELECT r.registry_no AS reg_no_official, r.no AS no_official, 
                r.book_no AS book_official, r.page_no AS page_official,
                r.province AS province_official, r.municipal AS municipal_official,
                r.reg_date AS date_registered_official,
                c.*, m.*, f.*, ai.*, rc.*, rm.remarks, ap.*, lr.* 
                FROM registration_tbl r
                LEFT JOIN child_tbl c ON r.no = c.no
                LEFT JOIN mother_tbl m ON r.no = m.no
                LEFT JOIN father_tbl f ON r.no = f.no
                LEFT JOIN att_inf_tbl ai ON r.no = ai.no
                LEFT JOIN receive_civil_tbl rc ON r.no = rc.no
                LEFT JOIN remarks_tbl rm ON r.no = rm.no
                LEFT JOIN admission_paternity_tbl ap ON r.no = ap.no
                LEFT JOIN late_reg_tbl lr ON r.no = lr.no
                WHERE r.no = '$reg_no' LIMIT 1";
        $result = $conn->query($sql);
        if (!$result || $result->num_rows === 0) showError("Record Not Found", "ID: " . htmlspecialchars($reg_no));
        $row = $result->fetch_assoc();
    }

    $child_full_name  = !empty($row['child_name'])  ? $row['child_name']  : trim(($row['child_fname'] ?? '') . ' ' . ($row['child_mname'] ?? '') . ' ' . ($row['child_lname'] ?? ''));
    $father_full_name = !empty($row['father_name']) ? $row['father_name'] : trim(($row['father_fname'] ?? '') . ' ' . ($row['father_mname'] ?? '') . ' ' . ($row['father_lname'] ?? ''));
    $mother_full_name = !empty($row['mother_name']) ? $row['mother_name'] : trim(($row['mother_fname'] ?? '') . ' ' . ($row['mother_mname'] ?? '') . ' ' . ($row['mother_lname'] ?? ''));
    $birth_place_fallback = !empty($row['birth_place']) ? $row['birth_place'] : trim(($row['birth_brgy'] ?? '') . ', ' . ($row['birth_municipal'] ?? '') . ', ' . ($row['birth_province'] ?? ''));
    $birth_place_fallback = trim($birth_place_fallback, ', ');

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

    function fitTextInCell(FPDI $pdf, $x, $y, $width, $height, ?string $text, $maxFontSize = 10, $minFontSize = 5) {
        $pdf->SetXY($x, $y); 
        $scaledWidth = floatval($width) * $pdf->scaleX; 
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
    
    function fitTextInCellAddress(FPDI $pdf, $x, $y, $width, $height, ?string $text, $maxFontSize = 10, $minFontSize = 4) {
        $pdf->SetXY($x, $y);
        $scaledWidth = floatval($width) * $pdf->scaleX;
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

    if (!function_exists('addOrdinalSuffix')) {
        function addOrdinalSuffix($num) {
            $num = (int)$num;
            if ($num <= 0) return "";
            if (!in_array(($num % 100), [11, 12, 13])) {
                switch ($num % 10) { case 1: return $num.'st'; case 2: return $num.'nd'; case 3: return $num.'rd'; }
            }
            return $num.'th';
        }
    }

    // --- PAGE 1 ---
    $pdf->AddPage('P', array(215.9, 355.6)); 
    if (file_exists('../../birth.pdf')) {
        try {
            $pdf->setSourceFile('../../birth.pdf');
            $pdf->useTemplate($pdf->importPage(1));
        } catch (Exception $e) {}
    }
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    // Header Info
    $pdf->SetXY(35, 31); $pdf->Cell(0, 10, strtoupper($row['province_official'] ?? $row['province'] ?? ''), 0, 1);
    $pdf->SetXY(47, 37); $pdf->Cell(0, 10, strtoupper($row['municipal_official'] ?? $row['municipal'] ?? ''), 0, 1);
    $pdf->SetXY(165, 37); $pdf->SetFont('Arial', '', 12); $pdf->Cell(0, 10, strtoupper($row['reg_no_official'] ?? $row['registry_no'] ?? ''), 0, 1);
    $font_size_reg = 9;
    $raw_reg_date = $row['date_registered_official'] ?? $row['reg_date'] ?? '';
    if (!empty($raw_reg_date) && $raw_reg_date != '0000-00-00') {
        $pdf->SetFont('Arial', '', $font_size_reg);
        $pdf->SetXY(165, 43); $pdf->Cell(0, 10, strtoupper(date("F d, Y", strtotime($raw_reg_date))), 0, 1);
    }
    $pdf->SetFont('Arial', '', 10);

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
    $att_type = strtoupper(trim($row['attendant_type'] ?? ''));
    if ($att_type == 'PHYSICIAN' ) { $pdf->SetXY(20, 186.5); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($att_type == 'NURSE' ) { $pdf->SetXY(47, 186.5); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($att_type == 'MIDWIFE' ) { $pdf->SetXY(70, 186); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($att_type == 'HILOT' ) { $pdf->SetXY(95, 186); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if (!empty($att_type)) { $pdf->SetXY(149, 186); $pdf->Cell(0, 10, 'X', 0, 1); $pdf->SetXY(180, 186); $pdf->Cell(0, 10, $att_type, 0, 1); }
    if (!empty($row['birth_time'])) {
        $pdf->SetFont('Arial', '', 14);
        $time_val = (strtotime($row['birth_time'])) ? date("g:i a", strtotime($row['birth_time'])) : $row['birth_time'];
        fitTextInCell($pdf, 125, 198, 30, 5, $time_val);
    }
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(35, 203); $pdf->Cell(0, 10, strtoupper($row['attendant_name'] ?? ''), 0, 1);
    $pdf->SetXY(38, 209); $pdf->Cell(0, 10, strtoupper($row['attendant_name'] ?? ''), 0, 1);
    fitTextInCell($pdf, 123, 206, 80, 5, $row['attendant_address'] ?? '');
    $pdf->SetXY(40, 215.5); $pdf->Cell(0, 10, strtoupper($row['attendant_position'] ?? ''), 0, 1);
    $pdf->SetXY(120, 215); $pdf->Cell(0, 10, strtoupper($row['attendant_date'] ?? ''), 0, 1);
    $pdf->SetXY(34, 234); $pdf->Cell(0, 10, strtoupper($row['informant_name'] ?? ''), 0, 1);
    $pdf->SetXY(37, 240); $pdf->Cell(0, 10, strtoupper($row['informant_name'] ?? ''), 0, 1);
    $pdf->SetXY(72, 246.5); $pdf->Cell(0, 10, strtoupper($row['rel_child'] ?? ''), 0, 1);
    fitTextInCell($pdf, 30, 254.5, 80, 5, $row['informant_address'] ?? '');
    $pdf->SetXY(30, 257.5); $pdf->Cell(0, 10, strtoupper($row['informant_date'] ?? ''), 0, 1);
    $pdf->SetXY(128, 232.5); $pdf->Cell(0, 10, strtoupper($row['prepared_name'] ?? ''), 0, 1);
    $pdf->SetXY(131, 238.5); $pdf->Cell(0, 10, strtoupper($row['prepared_name'] ?? ''), 0, 1);
    $pdf->SetXY(135, 246); $pdf->Cell(0, 10, strtoupper($row['prepared_position'] ?? ''), 0, 1);
    $pdf->SetXY(127, 251); $pdf->Cell(0, 10, strtoupper($row['prepared_date'] ?? ''), 0, 1);
    $pdf->SetXY(36, 267.5); $pdf->Cell(0, 10, strtoupper($row['received_name'] ?? ''), 0, 1);
    $pdf->SetXY(39, 273.5); $pdf->Cell(0, 10, strtoupper($row['received_name'] ?? ''), 0, 1);
    $pdf->SetXY(44, 278.5); $pdf->Cell(0, 10, strtoupper($row['received_position'] ?? ''), 0, 1);
    $pdf->SetXY(30, 284); $pdf->Cell(0, 10, strtoupper($row['received_date'] ?? ''), 0, 1);
    $pdf->SetXY(128, 267); $pdf->Cell(0, 10, strtoupper($row['civil_name'] ?? ''), 0, 1);
    $pdf->SetXY(131, 273); $pdf->Cell(0, 10, strtoupper($row['civil_name'] ?? ''), 0, 1);
    $pdf->SetXY(139, 278); $pdf->Cell(0, 10, strtoupper($row['civil_position'] ?? ''), 0, 1);
    $pdf->SetXY(127, 283.5); $pdf->Cell(0, 10, strtoupper($row['civil_date'] ?? ''), 0, 1);
    $pdf->SetXY(173, 290); $pdf->Cell(0, 10, strtoupper($row['reg_no_official'] ?? ''), 0, 1);
    $pdf->SetXY(30, 297); $pdf->Cell(0, 10, strtoupper($row['remarks'] ?? ''), 0, 1);

    // --- PAGE 2 (BACK) --- TOTAL RE-ALIGNMENT (UPWARD SHIFT)
    $pdf->AddPage('P', array(215.9, 355.6));
    if (file_exists('../../birth.pdf')) {
        try {
            $pdf->setSourceFile('../../birth.pdf');
            $pdf->useTemplate($pdf->importPage(2));
        } catch (Exception $e) {}
    }
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetTextColor(0, 0, 0);

    // 1. Paternity Affidavit
    $patType = strtoupper($row['paternity_type'] ?? '');
    if ($patType == 'I') { $pdf->SetXY(31.5, 31.5); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($patType == 'WE') { $pdf->SetXY(43.5, 31.5); $pdf->Cell(0, 10, 'X', 0, 1); }

    fitTextInCell($pdf, 33, 31.5, 77, 5, $father_full_name);
    if ($patType != 'I') fitTextInCell($pdf, 120, 31.5, 77, 5, $mother_full_name);
    
    fitTextInCell($pdf, 65, 36.5, 100, 5, $child_full_name);
    $dateB = (!empty($row['child_birth_date']) && $row['child_birth_date'] != '0000-00-00') ? date('F j, Y', strtotime($row['child_birth_date'])) : ($row['birth_date'] ?? '');
    fitTextInCell($pdf, 25, 41.5, 55, 5, $dateB);
    fitTextInCellAddress($pdf, 93, 41.5, 100, 5, $birth_place_fallback);
    
    // Signatures
    fitTextInCell($pdf, 15, 62, 64, 5, $father_full_name);
    if ($patType != 'I') fitTextInCell($pdf, 132, 62, 64, 5, $mother_full_name);
    
    // Subscribed and Sworn
    $sDay = addOrdinalSuffix((int)($row['sworn_day'] ?? 0));
    $pdf->SetXY(96, 77.5); $pdf->Cell(0, 10, strtolower($sDay), 0, 1);
    $pdf->SetXY(137, 77.5); $pdf->Cell(0, 10, strtoupper($row['sworn_month'] ?? ''), 0, 1);
    $pdf->SetXY(175, 77.5); $pdf->Cell(0, 10, strtoupper($row['sworn_year'] ?? ''), 0, 1);
    
    fitTextInCell($pdf, 14, 83.4, 64, 5, $father_full_name);
    if ($patType != 'I') fitTextInCell($pdf, 85, 83.4, 64, 5, $mother_full_name);
    
    $genderP = strtolower(trim($row['child_gender'] ?? ''));
    if ($genderP == 'his') { $pdf->SetXY(168.8, 82.5); $pdf->Cell(0, 10, 'X', 0, 1); }
    else if ($genderP == 'her') { $pdf->SetXY(177.8, 82.5); $pdf->Cell(0, 10, 'X', 0, 1); }
    
    $pdf->SetXY(38, 87.5); $pdf->Cell(0, 10, strtoupper($row['ctc'] ?? ''), 0, 1);
    $pdf->SetXY(138, 87.5); $pdf->Cell(0, 10, strtoupper($row['issued_on'] ?? ''), 0, 1);
    fitTextInCell($pdf, 14, 94.5, 75, 5, $row['issued_at'] ?? '');
    
    fitTextInCell($pdf, 15, 121.5, 64, 5, $row['administer_name'] ?? '');
    fitTextInCell($pdf, 132, 112.5, 64, 5, $row['administer_position'] ?? '');
    fitTextInCell($pdf, 132, 121.5, 64, 5, $row['administer_address'] ?? '');

    // 2. Delayed Registration Affidavit
    fitTextInCell($pdf, 26, 143, 77, 5, $row['late_name'] ?? '');
    fitTextInCellAddress($pdf, 70, 149.5, 127, 5, $row['late_address'] ?? '');
    
    $late_birth = strtolower(trim($row['late_birth_type'] ?? ''));
    if ($late_birth == 'my birth') {
        $pdf->SetXY(29.8, 167.5); $pdf->Cell(0, 10, 'X', 0, 1);
        fitTextInCell($pdf, 55, 168.5, 66, 5, $row['late_birth_in'] ?? '');
        if (!empty($row['late_birth_on']) && $row['late_birth_on'] != '0000-00-00') {
            $lOn = (strtotime($row['late_birth_on'])) ? date('F j, Y', strtotime($row['late_birth_on'])) : $row['late_birth_on'];
            fitTextInCell($pdf, 128, 168.5, 68, 5, strtoupper($lOn));
        }
    } else if ($late_birth == 'the birth'){
        $pdf->SetXY(29.8, 173.8); $pdf->Cell(0, 10, 'X', 0, 1);
        fitTextInCell($pdf, 55, 177.5, 60, 5, $row['late_birth_of'] ?? '');
        fitTextInCell($pdf, 147, 177.5, 50, 5, $row['late_birth_in'] ?? '');
        if (!empty($row['late_birth_on']) && $row['late_birth_on'] != '0000-00-00') {
            $lOn2 = (strtotime($row['late_birth_on'])) ? date('F j, Y', strtotime($row['late_birth_on'])) : $row['late_birth_on'];
            $pdf->SetXY(104.3, 180.5); $pdf->Cell(0, 10, strtoupper($lOn2), 0, 1); 
        }
    }
    
    fitTextInCell($pdf, 93, 189, 78, 5, $row['attend_birth_by'] ?? '');
    fitTextInCell($pdf, 27, 193.5, 138, 5, $row['who_resides_at'] ?? '');
    fitTextInCell($pdf, 82, 201.5, 88, 5, $row['late_citizen'] ?? '');
    
    $mType1 = strtolower(trim($row['married_type'] ?? ''));
    if ($mType1 == 'married') {
        $pdf->SetXY(77.1, 206.5); $pdf->Cell(0, 10, 'X', 0, 1);
        if (!empty($row['married_on']) && $row['married_on'] != '0000-00-00') { 
            $mD = (strtotime($row['married_on'])) ? date('F j, Y', strtotime($row['married_on'])) : $row['married_on'];
            $pdf->SetXY(108.6, 206.5); $pdf->Cell(0, 10, strtoupper($mD), 0, 1); 
        }
        fitTextInCell($pdf, 156, 209, 42, 5, $row['married_at'] ?? '');
    } else if ($mType1 == 'not married') {
        $pdf->SetXY(74.1, 217.5); $pdf->Cell(0, 10, 'X', 0, 1);
        fitTextInCell($pdf, 140, 226, 52, 5, $row['not_married_name'] ?? '');
    }
    
    fitTextInCell($pdf, 133, 232.5, 65, 5, $row['late_reg_reason'] ?? '');
    fitTextInCell($pdf, 105, 243.5, 73, 5, $row['applicant_only'] ?? '');
    fitTextInCell($pdf, 138, 249.5, 29, 5, $row['applicant_than_owner'] ?? '');
    
    $pdf->SetXY(120, 270.5); $pdf->Cell(0, 10, addOrdinalSuffix((int)($row['sign_day'] ?? 0)), 0, 1);
    $pdf->SetXY(151, 270.5); $pdf->Cell(0, 10, strtoupper(($row['sign_month'] ?? '') . ' ' . ($row['sign_year'] ?? '')), 0, 1);
    fitTextInCellAddress($pdf, 82, 278.5, 67, 4, $row['sign_at'] ?? '');
    fitTextInCell($pdf, 147, 281.5, 60, 4, $row['affiant_name'] ?? '');
    
    $lsDay = addOrdinalSuffix((int)($row['late_sworn_day'] ?? 0));
    $pdf->SetXY(102, 300.5); $pdf->Cell(0, 10, strtolower($lsDay), 0, 1);
    $pdf->SetXY(132, 300.5); $pdf->Cell(0, 10, strtoupper($row['late_sworn_month'] ?? ''), 0, 1);
    $pdf->SetXY(172, 300.5); $pdf->Cell(0, 10, strtoupper($row['late_sworn_year'] ?? ''), 0, 1);
    
    fitTextInCellAddress($pdf, 15, 309.5, 73, 5, $row['late_sworn_at'] ?? '');
    $pdf->SetXY(17, 309.5); $pdf->Cell(0, 10, strtoupper($row['late_ctc'] ?? ''), 0, 1);
    $pdf->SetXY(77, 313.5); $pdf->Cell(0, 10, strtoupper($row['late_issued_on'] ?? ''), 0, 1);
    
    fitTextInCell($pdf, 25, 322.5, 76, 5, ($row['late_administer_name'] ?? ''));
    fitTextInCellAddress($pdf, 127, 322.5, 76, 5, ($row['late_administer_address'] ?? ''));

    ob_end_clean();
    $pdf->Output('I', $filename);

} catch (Exception $e) {
    showError("PDF Generation Error", $e->getMessage());
}
?>