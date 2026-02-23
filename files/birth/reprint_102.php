<?php
use setasign\Fpdi\Fpdi;
require_once('../../fpdf/fpdf.php');
require_once('../../fpdi/src/autoload.php');
require_once 'login_db_birth.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$reg_no=$_POST['reg_no'];
if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

$sql = "SELECT * FROM registration_tbl NATURAL JOIN (child_tbl NATURAL JOIN mother_tbl NATURAL JOIN father_tbl NATURAL JOIN att_inf_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN admission_paternity_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
$result = $conn->query($sql);
if (!$result) die ("Database access failed: " . $conn->error);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
$pdf = new FPDI();

$pdf->AddPage('P', array(215.9, 355.6));

//            ***** READ ME ******
//       ung mga may adju adjustment un ung para maging dyanamic ung placement ng mga cells sa pdf depending sa width or length nung text na ilalagay and usually ideal sya for baranggay and house number as well as sa mga maliliit na textbox

// // Import birth template
// $pageCount = $pdf->setSourceFile('../../birth.pdf');
// $templateId = $pdf->importPage(1);

// // Use the imported template
// $pdf->useTemplate($templateId);

// Set font and text color
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);

function fitTextInCell($pdf, $x, $y, $width, $height, $text, $maxFontSize = 10, $minFontSize = 4) {
    $pdf->SetXY($x, $y);
    $fontSize = $maxFontSize;
  
    // Adjust font size to fit the width
    while ($fontSize >= $minFontSize) {
        $pdf->SetFont('Arial', '', $fontSize);
        if ($pdf->GetStringWidth($text) <= ($width - 15)) { // Consider a small padding
            break;
        }
        $fontSize -= 1; // Decrease font size by 1 for finer control
    }
  
    // Ensure the font size does not go below the minimum font size
    if ($fontSize < $minFontSize) {
        $fontSize = $minFontSize;
    }
  
    // Set the font to the final size
    $pdf->SetFont('Arial', '', $fontSize);
  
    // Set the draw color and draw the cell with the text centered
    $pdf->SetDrawColor(255, 0, 0);
    $pdf->Cell($width, $height, strtoupper($text), 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
}
function fitTextInCellAddress($pdf, $x, $y, $width, $height, $text, $maxFontSize = 10, $minFontSize = 4) {
    $pdf->SetXY($x, $y);
    $fontSize = $maxFontSize;
  
    // Adjust font size to fit the width
    while ($fontSize >= $minFontSize) {
        $pdf->SetFont('Arial', '', $fontSize);
        if ($pdf->GetStringWidth($text) < ($width - 20)) { // Consider a small padding
            break;
        }
        $fontSize -= 1; // Decrease font size by 1 for finer control
    }
  
    // Ensure the font size does not go below the minimum font size
    if ($fontSize < $minFontSize) {
        $fontSize = $minFontSize;
    }
  
    // Set the font to the final size
    $pdf->SetFont('Arial', '', $fontSize);
  
    // Set the draw color and draw the cell with the text centered
    $pdf->SetDrawColor(255, 0, 0);
    $pdf->Cell($width, $height, strtoupper($text), 0, 0, 'C');
    $pdf->SetFont('Arial', '', 12);
  }
// Province
$pdf->SetXY(35, 31); 
$pdf->Cell(0, 10, strtoupper($row['province']), 0, 1);

// Municipal
$pdf->SetXY(47, 37); 
$pdf->Cell(0, 10, strtoupper($row['municipal']), 0, 1);

// Registry No
$pdf->SetXY(165, 37);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, strtoupper($row['registry_no']), 0, 1);
$pdf->SetFont('Arial', '', 10);

// Child First Name
$pdf->SetXY(50, 48); 
fitTextInCell($pdf, 36, 50, 45, 4, $row['child_fname']);
// Child Middle Name
$pdf->SetXY(102, 48); 
fitTextInCell($pdf, 81, 50, 55, 4, $row['child_mname']);
// Child Last Name
$pdf->SetXY(154, 48); 
fitTextInCell($pdf, 135, 50, 60, 4, $row['child_lname']);
// Child Sex
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(37, 58); 
$pdf->Cell(0, 10, strtoupper($row['child_sex']), 0, 1);
// Child Birth Date
// $row['child_birth_date']
// fitTextInCell($pdf, 87, 59, 108, 5, $childBirthDate[0]);
$sampleBirth = $row['child_birth_date'];
$childBirthDate = explode(' ', $sampleBirth);
fitTextInCell($pdf, 105, 59, 40, 5, $childBirthDate[0]);
//$bday_month_name = date ("F", mktime (0,0,0, $childBirthDate[1], 1));
fitTextInCell($pdf, 125, 59, 40, 5, $childBirthDate[1]);
fitTextInCell($pdf, 165, 59, 40, 5, $childBirthDate[2]);
//Name of Hospital/House No/Street/Baranggay
$pdf->SetXY(61, 67.5); 
fitTextInCell($pdf, 35, 70, 75, 5, $row['birth_brgy']);
// Municipality
$pdf->SetXY(114, 67.5); 
fitTextInCell($pdf, 96, 70, 75, 5, $row['birth_municipal']);
// Province
$pdf->SetXY(155, 67.5); 
fitTextInCell($pdf, 146, 70, 75, 5, $row['birth_province']);
$pdf->SetFont('Arial', '', 10);
//Birth Type
$pdf->SetXY(40, 81); 
$pdf->Cell(0, 10, strtoupper($row['birth_type']), 0, 1);
// If Multi Birth

$pdf->SetXY(90, 81); 
$pdf->Cell(0, 10, strtoupper($row['if_multi_birth_was']), 0, 1);
// Birth Order
$pdf->SetXY(142, 81); 
$pdf->Cell(0, 10, strtoupper($row['birth_order']), 0, 1);
// Birth Weight
$pdf->SetXY(180, 80); 
$pdf->Cell(0, 10, strtoupper($row['birth_weight']), 0, 1);

//Mother First Name
$pdf->SetXY(51, 93); 
fitTextInCell($pdf, 37, 95, 45, 5, $row['mother_fname']);
//Mother Middle Name
$pdf->SetXY(103, 92.7); 
fitTextInCell($pdf, 82, 95, 60, 5, $row['mother_mname']);
//Mother Last Name
$pdf->SetXY(157, 92.7); 
fitTextInCell($pdf, 140, 95, 53, 5, $row['mother_lname']);
//Mother Citizenship
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(49, 102); 
$pdf->Cell(0, 10, strtoupper($row['mother_citizen']), 0, 1);
//Mother Religion
$pdf->SetXY(119, 102); 
fitTextInCell($pdf, 116, 104, 85, 5, $row['mother_religion']);
//10a
$pdf->SetXY(36, 115); 
$pdf->Cell(0, 10, strtoupper($row['ttl_no_child']), 0, 1);
//10b
$pdf->SetXY(66, 115); 
$pdf->Cell(0, 10, strtoupper($row['no_child_alive']), 0, 1);
//10c
$pdf->SetXY(96, 114.7); 
$pdf->Cell(0, 10, strtoupper($row['no_child_dead']), 0, 1);
// Mother Occupation
fitTextInCell($pdf, 118, 116, 55, 5, $row['mother_occupation']);
// Mother Age
$pdf->SetXY(186, 114); 
$pdf->Cell(0, 10, strtoupper($row['mother_age']), 0, 1);
// Mother Brgy
fitTextInCell($pdf, 41, 127, 50, 5, $row['mother_brgy']);
// Mother Municipality
$pdf->SetXY(103, 125.3); 
fitTextInCell($pdf, 91, 127, 40, 5, $row['mother_municipal']);
// Mother Province
$pdf->SetXY(140, 125.3); 
fitTextInCell($pdf, 131, 127, 40, 5, $row['mother_province']);
// Mother Country
$pdf->SetXY(165, 125); 
fitTextInCell($pdf, 169, 127, 40, 5, $row['mother_country']);

// Father First Name
$pdf->SetXY(51, 136); 
fitTextInCell($pdf, 31, 138, 56, 5, $row['father_fname']);
// Father Middle Name
$pdf->SetXY(103, 135.8); 
fitTextInCell($pdf, 87, 138, 58, 5, $row['father_mname']);
// Father Last Name
$pdf->SetXY(157, 135.5); 
fitTextInCell($pdf, 145, 138, 58, 5, $row['father_lname']);
// Father Citizen
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(31, 148.5); 
$pdf->Cell(0, 10, strtoupper($row['father_citizen']), 0, 1);
// Father Religion
$pdf->SetXY(71, 148.5); 
fitTextInCell($pdf, 71, 150.5, 52, 5, $row['father_religion']);
// Father Occupation
$pdf->SetXY(124, 148.3); 
fitTextInCell($pdf, 124, 150.5, 48, 5, $row['father_occupation']);
// Father Age
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(184, 148.3); 
$pdf->Cell(0, 10, strtoupper($row['father_age']), 0, 1);
if ($row['father_brgy'] == "Not Applicable") {
    $pdf->SetXY(94, 158.7); 
fitTextInCell($pdf, 94, 160, 52, 5, $row['father_brgy']);
    // Father Municipality
$pdf->SetXY(108, 158.7); 
fitTextInCell($pdf, 94, 160, 41, 5, "");
// Father Province
$pdf->SetXY(141, 158.4); 
fitTextInCell($pdf, 135, 160, 40, 5, "");
// Father Country
$pdf->SetXY(168, 158.5); 
fitTextInCell($pdf, 169, 160, 40, 5, "");
}else{
// Father Brgy
$pdf->SetXY(51, 158.7); 
fitTextInCell($pdf, 42, 160, 52, 5, $row['father_brgy']);
// Father Municipality
$pdf->SetXY(108, 158.7); 
fitTextInCell($pdf, 94, 160, 41, 5, $row['father_municipal']);
// Father Province
$pdf->SetXY(141, 158.4); 
fitTextInCell($pdf, 135, 160, 40, 5, $row['father_province']);
// Father Country
$pdf->SetXY(168, 158.5); 
fitTextInCell($pdf, 169, 160, 40, 5, $row['father_country']);
}
// Marriage Date
fitTextInCell($pdf, 41, 176, 47, 5, $row['marriage_date']);
if (($row['marriage_date']) == "Not Applicable"){
fitTextInCell($pdf, 97, 176, 104, 5, "NOT APPLICABLE");}else{fitTextInCell($pdf, 97, 176, 104, 5, $row['marriage_place']);}

// Attendant
$pdf->SetFont('Arial', '', 10);
if ($row['attendant_type'] == 'Physician' ){
    $pdf->SetXY(20, 186.5); 
    $pdf->Cell(0, 10, 'X', 0, 1);
} else if ($row['attendant_type'] == 'Nurse' ){
    $pdf->SetXY(47, 186.5); 
    $pdf->Cell(0, 10, 'X', 0, 1);
} else if ($row['attendant_type'] == 'Midwife' ){
    $pdf->SetXY(70, 186); 
    $pdf->Cell(0, 10, 'X', 0, 1);
} else if ($row['attendant_type'] == 'Hilot' ){
    $pdf->SetXY(95, 186); 
    $pdf->Cell(0, 10, 'X', 0, 1);
} else {
    $pdf->SetXY(149, 186); 
    $pdf->Cell(0, 10, 'X', 0, 1);
    $pdf->SetXY(180, 186); 
    $pdf->Cell(0, 10, strtoupper($row['attendant_type']), 0, 1);
}

// Birth Time
$militaryTime = $row['birth_time'];
$convertedTime = date("g:i a", strtotime($militaryTime));
$pdf->SetFont('Arial', '', 14);
fitTextInCell($pdf, 125, 198, 30, 5, $convertedTime);

$pdf->SetFont('Arial', '', 10);

// Attendant SGD
$pdf->SetXY(35, 203);
$pdf->Cell(0, 10, "(SGD) " . strtoupper($row['attendant_name']), 0, 1);
// Attendant Name
$pdf->SetXY(38, 209);
$pdf->Cell(0, 10, strtoupper($row['attendant_name']), 0, 1);
// Attendant Address
$pdf->SetXY(123, 203.5);
fitTextInCell($pdf, 123, 206, 80, 5, $row['attendant_address']);
// Attendant Position
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(40, 215.5);
$pdf->Cell(0, 10, strtoupper($row['attendant_position']), 0, 1);
// Attendant Date
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(120, 215);
$pdf->Cell(0, 10, strtoupper($row['attendant_date']), 0, 1);


$pdf->SetFont('Arial', '', 10);
// Informant SGD
$pdf->SetXY(34, 234);
$pdf->Cell(0, 10, "(SGD) " .  strtoupper($row['informant_name']), 0, 1);
// Informant Name
$pdf->SetXY(37, 240);
$pdf->Cell(0, 10, strtoupper($row['informant_name']), 0, 1);
// Informant Relationship
$pdf->SetXY(49, 246.5);
$pdf->Cell(0, 10, strtoupper($row['rel_child']), 0, 1);
// Informant Address
$pdf->SetXY(30, 252);
fitTextInCell($pdf, 30, 254.5, 80, 5, $row['informant_address']);
// Informant Date
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(30, 257.5);
$pdf->Cell(0, 10, strtoupper($row['informant_date']), 0, 1);


$pdf->SetFont('Arial', '', 10);


// Received SGD
$pdf->SetXY(36, 267.5);
$pdf->Cell(0, 10, "(SGD) " .strtoupper($row['received_name']), 0, 1);

// Received Name
$pdf->SetXY(39, 273.5);
$pdf->Cell(0, 10, strtoupper($row['received_name']), 0, 1);
// Received Position
$pdf->SetXY(44, 278.5);
$pdf->Cell(0, 10, strtoupper($row['received_position']), 0, 1);
// Received Date
$pdf->SetXY(30, 284);
$pdf->Cell(0, 10, strtoupper($row['received_date']), 0, 1);

$pdf->SetFont('Arial', '', 10);
// Prepared SGD
$pdf->SetXY(128, 232.5);
$pdf->Cell(0, 10, "(SGD) " . strtoupper($row['prepared_name']), 0, 1);
// Prepared Name
$pdf->SetXY(131, 238.5);
$pdf->Cell(0, 10, strtoupper($row['prepared_name']), 0, 1);
// Prepared Title
$pdf->SetXY(135, 246);
$pdf->Cell(0, 10, strtoupper($row['prepared_position']), 0, 1);
// Prepared Date
$pdf->SetXY(127, 251);
$pdf->Cell(0, 10, strtoupper($row['prepared_date']), 0, 1);

$pdf->SetFont('Arial', '', 10);
// Civil SGD
$pdf->SetXY(128, 267);
$pdf->Cell(0, 10, "(SGD) " . strtoupper($row['civil_name']), 0, 1);
// Civil Name
$pdf->SetXY(131, 273);
$pdf->Cell(0, 10, strtoupper($row['civil_name']), 0, 1);
// Civil Position
$pdf->SetXY(139, 278);
$pdf->Cell(0, 10, strtoupper($row['civil_position']), 0, 1);
// Civil Date
$pdf->SetXY(127, 283.5);
$pdf->Cell(0, 10, strtoupper($row['civil_date']), 0, 1);

// Remarks
$pdf->SetXY(30, 297);
$pdf->Cell(0, 10, strtoupper($row['remarks']), 0, 1);

// 2nd Page
$pdf->AddPage('P', array(215.9, 355.6));
// $templateId = $pdf->importPage(2);
// $pdf->useTemplate($templateId);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);


// Father Name
$pdf->SetXY(33, 18.5);
fitTextInCell($pdf, 33, 21, 77, 5, $row['father_name']);
// Mother Name
$pdf->SetXY(120, 18.5);
fitTextInCell($pdf, 120, 21, 77, 5, $row['mother_name']);
// Child Name
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(109, 23);
$pdf->Cell(0, 10, strtoupper($row['child_name']), 0, 1);
// Birth Date
$pdf->SetXY(31, 27.5);
$pdf->Cell(0, 10, strtoupper($row['child_birth_date']), 0, 1);
// Birth Place
$pdf->SetFont('Arial', '', 10);
$pdf->SetXY(93, 27.5);
fitTextInCellAddress($pdf, 93, 30.5, 100, 5, $row['birth_place']);

// Signature Father Name
$pdf->SetXY(22, 49.5);
fitTextInCell($pdf, 15, 52, 64, 5, $row['father_name']);
// Signature Mother Name
$pdf->SetXY(139, 49.5);
fitTextInCell($pdf, 132, 52, 64, 5, $row['mother_name']);

// Sword Day
$pdf->SetXY(99.5, 65.5);
$pdf->Cell(0, 10, strtoupper($row['sworn_day']), 0, 1);
// Sword month
$pdf->SetXY(130.5, 65.5);
$pdf->Cell(0, 10, strtoupper($row['sworn_month']), 0, 1);
// Sword year
$pdf->SetXY(178.5, 65.5);
$pdf->Cell(0, 10, strtoupper($row['sworn_year']), 0, 1);

// Sworn Father Name
$pdf->SetXY(14, 71);
fitTextInCell($pdf, 14, 73.4, 64, 5, $row['father_name']);
// Sworn Mother Name
$pdf->SetXY(85  , 71);
fitTextInCell($pdf, 85, 73.4, 64, 5, $row['mother_name']);

// CTC
$pdf->SetXY(36, 76);
$pdf->Cell(0, 10, strtoupper($row['ctc']), 0, 1);
// Issued On
$pdf->SetXY(136, 76);
$pdf->Cell(0, 10, strtoupper($row['issued_on']), 0, 1);
// Issued at
$pdf->SetXY(14, 81);
fitTextInCell($pdf, 14, 83, 75, 5, $row['issued_at']);

// Administer Name
$pdf->SetXY(22, 109);
fitTextInCell($pdf, 15, 111, 64, 5, $row['administer_name']);
// Administer position
$pdf->SetXY(133, 100);
fitTextInCell($pdf, 132, 102, 64, 5, $row['administer_position']);
// Administer position
$pdf->SetXY(142, 108.8);
fitTextInCell($pdf, 132, 111, 64, 5, $row['administer_address']);


// Late Name
$pdf->SetXY(25, 130.5);
fitTextInCell($pdf, 26, 133, 77, 5, $row['late_name']);

// Late address
$pdf->SetXY(70, 137.5);
fitTextInCell($pdf, 70, 139.5, 127, 5, $row['late_address']);

$pdf->SetFont('Arial', '', 10);
// Late Birth Type
if ($row['late_birth_type'] == 'my birth') {
    $pdf->SetXY(29.3, 157);
    $pdf->Cell(0, 10, 'X', 0, 1);
    // Late Birth In
    $pdf->SetXY(54.3, 156.5);
    fitTextInCell($pdf, 55, 158.5, 66, 5, $row['late_birth_in']);
    // Late Birth on
    $pdf->SetXY(128.3, 156.5);
    fitTextInCell($pdf, 128, 158.5, 68, 5, $row['late_birth_on']);
} else if ($row['late_birth_type'] == 'the birth'){
    $pdf->SetXY(29.3, 163.8);
    $pdf->Cell(0, 10, 'X', 0, 1);
    // Late Birth of
    $pdf->SetXY(54.3, 164.5);
    fitTextInCell($pdf, 55, 167, 60, 5, $row['late_birth_of']);
    // Late Birth in
    $pdf->SetXY(146.3, 164.5);
    fitTextInCell($pdf, 147, 167, 50, 5, $row['late_birth_in']);
    // Late Birth on
    $pdf->SetXY(102.3, 170.5);
    $pdf->Cell(0, 10, strtoupper($row['late_birth_on']), 0, 1);
}

// Attend birth by
$pdf->SetXY(95.3, 177.5);
fitTextInCell($pdf, 93, 180, 78, 5, $row['attend_birth_by']);
// Attend birth by
$pdf->SetXY(27.3, 182.5);
fitTextInCell($pdf, 27, 184.5, 138, 5, $row['who_resides_at']);
// Late Citizen
$pdf->SetXY(83.3, 190.2);
fitTextInCell($pdf, 82, 192, 88, 5, $row['late_citizen']);

$pdf->SetFont('Arial', '', 10);
if ($row['married_type'] == 'married') {
    $pdf->SetXY(80.6, 197.8);
    $pdf->Cell(0, 10, 'X', 0, 1);
    $pdf->SetXY(106.6, 197.5);
    $pdf->Cell(0, 10, strtoupper($row['married_on']), 0, 1);
    $pdf->SetXY(156.6, 197.5);
    fitTextInCell($pdf, 156, 200, 42, 5, $row['married_at']);
} else if ($row['married_type'] == 'not married') {
    $pdf->SetXY(80.6, 208.5);
    $pdf->Cell(0, 10, 'X', 0, 1);
    $pdf->SetXY(139.6, 214.5);
    fitTextInCell($pdf, 140, 217, 52, 5, $row['not_married_name']);
}

// Late Reg Reason
$pdf->SetXY(131.6, 221);
fitTextInCell($pdf, 133, 223, 65, 5, $row['late_reg_reason']);
// Applicant Only
$pdf->SetXY(104.6, 234);
fitTextInCell($pdf, 105, 237, 73, 5, $row['applicant_only']);
// Applicant Than Owner
$pdf->SetXY(138.6, 240);
fitTextInCell($pdf, 138, 243, 29, 5, $row['applicant_than_owner']);

// Sign Day
$pdf->SetXY(124, 264);
$pdf->Cell(0, 10, strtoupper($row['sign_day']), 0, 1);
// Sign month
$pdf->SetXY(154, 264);
$pdf->Cell(0, 10, strtoupper($row['sign_month']).' '.strtoupper($row['sign_year']), 0, 1);
// Sign at
$pdf->SetXY(80, 269);
fitTextInCellAddress($pdf, 80, 271.5, 67, 4, $row['sign_at']);
// Affiant Name
$pdf->SetXY(147, 279);
fitTextInCell($pdf, 137, 281, 60, 4, $row['affiant_name']);

// Late Sworn Day
$pdf->SetXY(108, 295);
$pdf->Cell(0, 10, strtoupper($row['late_sworn_day']), 0, 1);
// Late Sworn month
$pdf->SetXY(142, 295);
$pdf->Cell(0, 10, strtoupper($row['late_sworn_month']), 0, 1);
// Late Sworn year
$pdf->SetXY(182, 295);
$pdf->Cell(0, 10, strtoupper($row['late_sworn_year']), 0, 1);
// Late Sworn at
$pdf->SetXY(15, 302);
fitTextInCellAddress($pdf, 15, 304, 73, 5, $row['late_sworn_at']);
// Late CTC
$pdf->SetXY(15, 307);
$pdf->Cell(0, 10, strtoupper($row['late_ctc']), 0, 1);
// Late Issued On
$pdf->SetXY(75, 307);
$pdf->Cell(0, 10, strtoupper($row['late_issued_on']), 0, 1);
// Late Issued at
$pdf->SetXY(132, 307);
fitTextInCellAddress($pdf, 132, 309, 66, 5, $row['late_issued_at']);
// Late Administer Name
$pdf->SetXY(25, 325);
fitTextInCell($pdf, 15, 329, 76, 5, $row['late_administer_name']);
// Late Administer address
$pdf->SetXY(140, 325);
fitTextInCellAddress($pdf, 121, 329, 76, 5, $row['late_administer_address']);
// Late Administer position
$pdf->SetXY(127, 315);
fitTextInCellAddress($pdf, 121, 318, 76, 5, $row['late_administer_position']);




















// Output the PDF
$pdf->Output('birth_'.$row['child_fname'].'_'.$row['child_lname'].'.pdf', 'I');

}}
?>