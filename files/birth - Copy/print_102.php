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

// Import birth template
$pageCount = $pdf->setSourceFile('../../birth.pdf');
$templateId = $pdf->importPage(1);

// Use the imported template
$pdf->useTemplate($templateId);

// Set font and text color
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);


// Province
$pdf->SetXY(35, 31); 
$pdf->Cell(0, 10, strtoupper($row['province']), 0, 1);

// Municipal
$pdf->SetXY(47, 37); 
$pdf->Cell(0, 10, strtoupper($row['municipal']), 0, 1);

// Registry No
$pdf->SetXY(165, 37); 
$pdf->Cell(0, 10, strtoupper($row['registry_no']), 0, 1);

// Child First Name
$pdf->SetXY(50, 48); 
$pdf->Cell(0, 10, strtoupper($row['child_fname']), 0, 1);
// Child Middle Name
$pdf->SetXY(102, 48); 
$pdf->Cell(0, 10, strtoupper($row['child_mname']), 0, 1);
// Child Last Name
$pdf->SetXY(154, 48); 
$pdf->Cell(0, 10, strtoupper($row['child_lname']), 0, 1);
// Child Sex
$pdf->SetXY(37, 58); 
$pdf->Cell(0, 10, strtoupper($row['child_sex']), 0, 1);

//Name of Hospital/House No/Street/Baranggay
$wordWidth = $pdf->GetStringWidth($row['birth_brgy']);
$adjustment = $wordWidth > 50 ? -24 : 0;
$pdf->SetXY(61 + $adjustment, 67.5); 
$pdf->Cell(0, 10, strtoupper($row['birth_brgy']), 0, 1);
// Municipality
$pdf->SetXY(114, 67.5); 
$pdf->Cell(0, 10, strtoupper($row['birth_municipal']), 0, 1);
// Province
$pdf->SetXY(155, 67.5); 
$pdf->Cell(0, 10, strtoupper($row['birth_province']), 0, 1);

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
$pdf->Cell(0, 10, strtoupper($row['mother_fname']), 0, 1);
//Mother Middle Name
$pdf->SetXY(103, 92.7); 
$pdf->Cell(0, 10, strtoupper($row['mother_mname']), 0, 1);
//Mother Last Name
$pdf->SetXY(157, 92.7); 
$pdf->Cell(0, 10, strtoupper($row['mother_lname']), 0, 1);
//Mother Citizenship
$pdf->SetXY(49, 102); 
$pdf->Cell(0, 10, strtoupper($row['mother_citizen']), 0, 1);
//Mother Religion
$pdf->SetXY(119, 102); 
$pdf->Cell(0, 10, strtoupper($row['mother_religion']), 0, 1);
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
$motherOccupationWidth = $pdf->GetStringWidth($row['mother_occupation']);
$motherOccupationAdjustment = $motherOccupationWidth > 47 ? -4 : 0;
$pdf->SetXY(120 + $motherOccupationAdjustment, 114.5);
$pdf->Cell(0, 10, strtoupper($row['mother_occupation']), 0, 1);
// Mother Age
$pdf->SetXY(186, 114); 
$pdf->Cell(0, 10, strtoupper($row['mother_age']), 0, 1);
// Mother Brgy
$motherBrgyWidth = $pdf->GetStringWidth($row['mother_brgy']);
$motherBrgyAdjustment = $motherBrgyWidth > 30 ? -10 : 0;
$pdf->SetXY(51 + $motherBrgyAdjustment, 125.5); 
$pdf->Cell(0, 10, strtoupper($row['mother_brgy']), 0, 1);
// Mother Municipality
$pdf->SetXY(103, 125.3); 
$pdf->Cell(0, 10, strtoupper($row['mother_municipal']), 0, 1);
// Mother Province
$pdf->SetXY(140, 125.3); 
$pdf->Cell(0, 10, strtoupper($row['mother_province']), 0, 1);
// Mother Country
$pdf->SetXY(165, 125); 
$pdf->Cell(0, 10, strtoupper($row['mother_country']), 0, 1);

// Father First Name
$pdf->SetXY(51, 136); 
$pdf->Cell(0, 10, strtoupper($row['father_fname']), 0, 1);
// Father Middle Name
$pdf->SetXY(103, 135.8); 
$pdf->Cell(0, 10, strtoupper($row['father_mname']), 0, 1);
// Father Last Name
$pdf->SetXY(157, 135.5); 
$pdf->Cell(0, 10, strtoupper($row['father_lname']), 0, 1);
// Father Citizen
$pdf->SetXY(31, 148.5); 
$pdf->Cell(0, 10, strtoupper($row['father_citizen']), 0, 1);
// Father Religion
$pdf->SetXY(71, 148.5); 
$pdf->Cell(0, 10, strtoupper($row['father_religion']), 0, 1);
// Father Occupation
$pdf->SetXY(124, 148.3); 
$pdf->Cell(0, 10, strtoupper($row['father_occupation']), 0, 1);
// Father Age
$pdf->SetXY(184, 148.3); 
$pdf->Cell(0, 10, strtoupper($row['father_age']), 0, 1);
// Father Brgy
$fatherBrgyWidth = $pdf->GetStringWidth($row['father_brgy']);
$fatherBrgyAdjustment = $fatherBrgyWidth > 30 ? -10 : 0;
$pdf->SetXY(51 + $fatherBrgyAdjustment, 158.7); 
$pdf->Cell(0, 10, strtoupper($row['father_brgy']), 0, 1);
// Father Municipality
$pdf->SetXY(108, 158.7); 
$pdf->Cell(0, 10, strtoupper($row['father_municipal']), 0, 1);
// Father Province
$pdf->SetXY(141, 158.4); 
$pdf->Cell(0, 10, strtoupper($row['father_province']), 0, 1);
// Father Country
$pdf->SetXY(168, 158.5); 
$pdf->Cell(0, 10, strtoupper($row['father_country']), 0, 1);

// Attendant
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
$convertedTime = date("g:i", strtotime($militaryTime));
$pdf->SetXY(131, 194.6);
$pdf->Cell(0, 10, strtoupper($convertedTime), 0, 1);

// Attendant Name
$pdf->SetXY(38, 209);
$pdf->Cell(0, 10, strtoupper($row['attendant_name']), 0, 1);
// Attendant Address
$pdf->SetXY(123, 203.5);
$pdf->Cell(0, 10, strtoupper($row['attendant_address']), 0, 1);
// Attendant Position
$pdf->SetXY(40, 215.5);
$pdf->Cell(0, 10, strtoupper($row['attendant_position']), 0, 1);
// Attendant Date
$pdf->SetXY(120, 215);
$pdf->Cell(0, 10, strtoupper($row['attendant_date']), 0, 1);

// Informant Name
$pdf->SetXY(37, 240);
$pdf->Cell(0, 10, strtoupper($row['informant_name']), 0, 1);
// Informant Relationship
$pdf->SetXY(49, 246.5);
$pdf->Cell(0, 10, strtoupper($row['rel_child']), 0, 1);
// Informant Address
$pdf->SetXY(30, 252);
$pdf->Cell(0, 10, strtoupper($row['informant_address']), 0, 1);
// Informant Date
$pdf->SetXY(30, 257.5);
$pdf->Cell(0, 10, strtoupper($row['informant_date']), 0, 1);

// Received Name
$pdf->SetXY(39, 273.5);
$pdf->Cell(0, 10, strtoupper($row['received_name']), 0, 1);
// Received Position
$pdf->SetXY(44, 278.5);
$pdf->Cell(0, 10, strtoupper($row['received_position']), 0, 1);
// Received Date
$pdf->SetXY(30, 284);
$pdf->Cell(0, 10, strtoupper($row['received_date']), 0, 1);

// Prepared Name
$pdf->SetXY(131, 238.5);
$pdf->Cell(0, 10, strtoupper($row['prepared_name']), 0, 1);
// Prepared Title
$pdf->SetXY(135, 246);
$pdf->Cell(0, 10, strtoupper($row['prepared_position']), 0, 1);
// Prepared Date
$pdf->SetXY(127, 251);
$pdf->Cell(0, 10, strtoupper($row['prepared_date']), 0, 1);

// Civil Name
$pdf->SetXY(134, 273);
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
$templateId = $pdf->importPage(2);
$pdf->useTemplate($templateId);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);


// Father Name
$pdf->SetXY(33, 18.5);
$pdf->Cell(0, 10, strtoupper($row['father_name']), 0, 1);
// Mother Name
$pdf->SetXY(120, 18.5);
$pdf->Cell(0, 10, strtoupper($row['mother_name']), 0, 1);
// Child Name
$pdf->SetXY(109, 22.8);
$pdf->Cell(0, 10, strtoupper($row['child_name']), 0, 1);
// Birth Date
$pdf->SetXY(31, 27.5);
$pdf->Cell(0, 10, strtoupper($row['birth_date']), 0, 1);
// Birth Place
$pdf->SetXY(93, 27.5);
$pdf->Cell(0, 10, strtoupper($row['birth_place']), 0, 1);

// Signature Father Name
$pdf->SetXY(22, 49.5);
$pdf->Cell(0, 10, strtoupper($row['father_name']), 0, 1);
// Signature Mother Name
$pdf->SetXY(139, 49.5);
$pdf->Cell(0, 10, strtoupper($row['mother_name']), 0, 1);

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
$pdf->Cell(0, 10, strtoupper($row['father_name']), 0, 1);
// Sworn Mother Name
$pdf->SetXY(85  , 71);
$pdf->Cell(0, 10, strtoupper($row['mother_name']), 0, 1);

// CTC
$pdf->SetXY(36, 76);
$pdf->Cell(0, 10, strtoupper($row['ctc']), 0, 1);
// Issued On
$pdf->SetXY(136, 76);
$pdf->Cell(0, 10, strtoupper($row['issued_on']), 0, 1);
// Issued at
$pdf->SetXY(14, 81);
$pdf->Cell(0, 10, strtoupper($row['issued_at']), 0, 1);

// Administer Name
$pdf->SetXY(22, 109);
$pdf->Cell(0, 10, strtoupper($row['administer_name']), 0, 1);
// Administer position
$pdf->SetXY(133, 100);
$pdf->Cell(0, 10, strtoupper($row['administer_position']), 0, 1);
// Administer position
$pdf->SetXY(142, 108.8);
$pdf->Cell(0, 10, strtoupper($row['administer_address']), 0, 1);


// Late Name
$pdf->SetXY(25, 130.5);
$pdf->Cell(0, 10, strtoupper($row['late_name']), 0, 1);

// Late address
$pdf->SetXY(70, 137.5);
$pdf->Cell(0, 10, strtoupper($row['late_address']), 0, 1);

// Late Birth Type
if ($row['late_birth_type'] == 'my birth') {
    $pdf->SetXY(29.3, 157);
    $pdf->Cell(0, 10, 'X', 0, 1);
    // Late Birth In
    $pdf->SetXY(54.3, 156.5);
    $pdf->Cell(0, 10, strtoupper($row['late_birth_in']), 0, 1);
    // Late Birth on
    $pdf->SetXY(128.3, 156.5);
    $pdf->Cell(0, 10, strtoupper($row['late_birth_on']), 0, 1);
} else {
    $pdf->SetXY(29.3, 163.8);
    $pdf->Cell(0, 10, 'X', 0, 1);
    // Late Birth of
    $pdf->SetXY(54.3, 164.5);
    $pdf->Cell(0, 10, strtoupper($row['late_birth_of']), 0, 1);
    // Late Birth in
    $pdf->SetXY(146.3, 164.5);
    $pdf->Cell(0, 10, strtoupper($row['late_birth_in']), 0, 1);
    // Late Birth on
    $pdf->SetXY(102.3, 170.5);
    $pdf->Cell(0, 10, strtoupper($row['late_birth_on']), 0, 1);
}

// Attend birth by
$pdf->SetXY(95.3, 177.5);
$pdf->Cell(0, 10, strtoupper($row['attend_birth_by']), 0, 1);
// Attend birth by
$pdf->SetXY(27.3, 182.5);
$pdf->Cell(0, 10, strtoupper($row['who_resides_at']), 0, 1);
// Late Citizen
$pdf->SetXY(83.3, 190.2);
$pdf->Cell(0, 10, strtoupper($row['late_citizen']), 0, 1);

if ($row['married_type'] == 'married') {
    $pdf->SetXY(80.6, 197.8);
    $pdf->Cell(0, 10, 'X', 0, 1);
    $pdf->SetXY(106.6, 197.5);
    $pdf->Cell(0, 10, strtoupper($row['married_on']), 0, 1);
    $pdf->SetXY(156.6, 197.5);
    $pdf->Cell(0, 10, strtoupper($row['married_at']), 0, 1);
} else {
    $pdf->SetXY(80.6, 208.5);
    $pdf->Cell(0, 10, 'X', 0, 1);
    $pdf->SetXY(139.6, 214.5);
    $pdf->Cell(0, 10, strtoupper($row['not_married_name']), 0, 1);
}

// Late Reg Reason
$pdf->SetXY(131.6, 221);
$pdf->Cell(0, 10, strtoupper($row['late_reg_reason']), 0, 1);
// Applicant Only
$pdf->SetXY(104.6, 234);
$pdf->Cell(0, 10, strtoupper($row['applicant_only']), 0, 1);
// Applicant Than Owner
$pdf->SetXY(138.6, 240);
$pdf->Cell(0, 10, strtoupper($row['applicant_than_owner']), 0, 1);

// Sign Day
$pdf->SetXY(124, 264);
$pdf->Cell(0, 10, strtoupper($row['sign_day']), 0, 1);
// Sign month
$pdf->SetXY(154, 264);
$pdf->Cell(0, 10, strtoupper($row['sign_month']).', '.strtoupper($row['sign_year']), 0, 1);
// Sign at
$pdf->SetXY(80, 269);
$pdf->Cell(0, 10, strtoupper($row['sign_at']), 0, 1);
// Affiant Name
$pdf->SetXY(147, 279);
$pdf->Cell(0, 10, strtoupper($row['affiant_name']), 0, 1);

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
$pdf->Cell(0, 10, strtoupper($row['late_sworn_at']), 0, 1);
// Late CTC
$pdf->SetXY(15, 307);
$pdf->Cell(0, 10, strtoupper($row['late_ctc']), 0, 1);
// Late Issued On
$pdf->SetXY(75, 307);
$pdf->Cell(0, 10, strtoupper($row['late_issued_on']), 0, 1);
// Late Issued at
$pdf->SetXY(132, 307);
$pdf->Cell(0, 10, strtoupper($row['late_issued_at']), 0, 1);
// Late Administer Name
$pdf->SetXY(25, 325);
$pdf->Cell(0, 10, strtoupper($row['late_administer_name']), 0, 1);
// Late Administer address
$pdf->SetXY(140, 325);
$pdf->Cell(0, 10, strtoupper($row['late_administer_address']), 0, 1);
// Late Administer position
$pdf->SetXY(127, 315);
$pdf->Cell(0, 10, strtoupper($row['late_administer_position']), 0, 1);




















// Output the PDF
$pdf->Output('birth_'.$row['child_fname'].'_'.$row['child_lname'].'.pdf', 'I');

}}
?>