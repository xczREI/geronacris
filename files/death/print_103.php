<?php
use setasign\Fpdi\Fpdi;
require_once('../../fpdf/fpdf.php');
require_once('../../fpdi/src/autoload.php');
require_once 'login_db_death.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$reg_no=$_POST['reg_no'];
if (!empty($_GET['reg_no'])){ $reg_no = $_REQUEST['reg_no']; }

$sql = "SELECT * FROM registration_tbl NATURAL JOIN (person_tbl NATURAL JOIN death_cause_eight_days NATURAL JOIN att_rev_tbl NATURAL JOIN corpse_disposal_tbl NATURAL JOIN inf_pre_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN death_cause_zero_seven NATURAL JOIN autopsy_tbl NATURAL JOIN embalmer_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no'";
$result = $conn->query($sql);  
if (!$result) die ("Database access failed: " . $conn->error);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$pdf = new FPDI();

$pdf->AddPage('P', array(215.9, 355.6));

//            ***** READ ME ******
//       ung mga may adju adjustment un ung para maging dyanamic ung placement ng mga cells sa pdf depending sa width or length nung text na ilalagay and usually ideal sya for baranggay and house number as well as sa mga maliliit na textbox

$pageCount = $pdf->setSourceFile('../../death.pdf');
$templateId = $pdf->importPage(1);

// // Use the imported template
// $pdf->useTemplate($templateId);

// Set font and text color
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);

function fitTextInCell($pdf, $x, $y, $width, $height, $text, $maxFontSize = 10, $minFontSize = 5) {
  $pdf->SetXY($x, $y);
  $fontSize = $maxFontSize;

  // Adjust font size to fit the width
  while ($fontSize >= $minFontSize) {
      $pdf->SetFont('Arial', '', $fontSize);
      if ($pdf->GetStringWidth($text) <= ($width - 10)) { // Consider a small padding
          break;
      }
      $fontSize -= 4; // Decrease font size by 1 for finer control
  }

  // Ensure the font size does not go below the minimum font size
  if ($fontSize < $minFontSize) {
      $fontSize = $minFontSize;
  }

  // Set the font to the final size
  $pdf->SetFont('Arial', '', $fontSize);

  // Set the draw color and draw the cell with the text centered
  $pdf->Cell($width, $height, strtoupper($text), 0, 0, 'C');
  $pdf->SetFont('Arial', '', 10);
}
// Province
$pdf->SetXY(35, 27.9); 
$pdf->Cell(0, 10, strtoupper($row['province']), 0, 1);

// Municipal
$pdf->SetXY(47, 33.5); 
$pdf->Cell(0, 10, strtoupper($row['municipal']), 0, 1);

// Registry Number
$pdf->SetXY(156, 33.5); 
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, strtoupper($row['registry_no']), 0, 1);
$pdf->SetFont('Arial', '', 10);

// First Name
fitTextInCell($pdf, 36, 47.5, 36, 8, $row['first_name']);

// First Name
$pdf->SetXY(79, 47.5); 
fitTextInCell($pdf, 72, 47.5, 34, 8, $row['middle_name']);

// Last Name
$pdf->SetXY(113, 47.5); 
fitTextInCell($pdf, 106, 47.5, 34, 8, $row['last_name']);

// Sex
$pdf->SetXY(172, 47.5); 
$pdf->Cell(0, 10, strtoupper($row['sex']), 0, 1);

// Death Date
$pdf->SetXY(24, 62); 
$pdf->Cell(0, 10, strtoupper($row['date_death']), 0, 1);

// Birth Date
$pdf->SetXY(77, 62); 
$pdf->Cell(0, 10, strtoupper($row['date_birth']), 0, 1);

// Age Type
if ($row['age_type'] === 'yrs') {
  $pdf->SetXY(134, 64); 
  $pdf->Cell(0, 10, strtoupper($row['age_time_of_death']), 0, 1);
} else if ($row['age_type'] === 'under yrs') {
  $pdf->SetXY(161, 64); 
  $pdf->Cell(0, 10, strtoupper($row['age_time_of_death']), 0, 1);
  $pdf->SetXY(175, 64); 
  $pdf->Cell(0, 10, strtoupper($row['age_day_min']), 0, 1);
} else {
  $pdf->SetXY(184, 63.8); 
  $pdf->Cell(0, 10, strtoupper($row['age_time_of_death']), 0, 1);
  $pdf->SetXY(195, 63.8); 
  $pdf->Cell(0, 10, strtoupper($row['age_day_min']), 0, 1);
}

// Death Place
fitTextInCell($pdf, 24, 75, 129, 8, $row['place_death']);
// $pdf->Cell(0, 10, strtoupper($row['place_death']), 0, 1);

// Civil Status
$pdf->SetXY(161, 75); 
$pdf->Cell(0, 10, strtoupper($row['civil_status']), 0, 1);

// Religion
fitTextInCell($pdf, 19, 87, 48, 8, $row['religion']);
// $pdf->Cell(0, 10, strtoupper($row['religion']), 0, 1);

// Citizenship
$pdf->SetXY(73, 86); 
$pdf->Cell(0, 10, strtoupper($row['citizen']), 0, 1);

// Residence
fitTextInCell($pdf, 112, 86, 91, 8, $row['residence']);

// Occupation
$pdf->SetXY(19, 97.5); 
fitTextInCell($pdf, 19, 97.5, 42, 8, $row['occupation']);

// Father Name
$pdf->SetXY(65, 97.5); 
fitTextInCell($pdf, 61.5, 97.5, 71.5, 8, $row['father_name']);

// Mother Name
$pdf->SetXY(139, 97.5); 
fitTextInCell($pdf, 133.5, 97.5, 71.5, 8, $row['mother_name']);

// Immediate Cause
$pdf->SetXY(67, 115.5); 
$pdf->Cell(0, 10, strtoupper($row['immediate_cause']), 0, 1);
// Immediate Interval
$pdf->SetXY(147, 115); 
$pdf->Cell(0, 10, strtoupper($row['immediate_interval']), 0, 1);

// Antecedent Cause
$pdf->SetXY(67, 121); 
$pdf->Cell(0, 10, strtoupper($row['antecedent_cause']), 0, 1);
// Antecedent Interval
$pdf->SetXY(147, 120.3); 
$pdf->Cell(0, 10, strtoupper($row['antecedent_interval']), 0, 1);

// Underlying Cause
$pdf->SetXY(67, 126.5); 
$pdf->Cell(0, 10, strtoupper($row['underlying_cause']), 0, 1);
// Underlying Interval
$pdf->SetXY(147, 125.8); 
$pdf->Cell(0, 10, strtoupper($row['underlying_interval']), 0, 1);

// Other Condition Death
$pdf->SetXY(92, 131); 
$pdf->Cell(0, 10, strtoupper($row['other_condition_death']), 0, 1);

// Maternal Condition
if($row['maternal_condition'] === 'pregnant, not in labour') {
  $pdf->SetXY(27, 140); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else if($row['maternal_condition'] === 'pregnant, in labour') {
  $pdf->SetXY(59, 140); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else if ($row['maternal_condition'] === 'less than 42 days after delivery') {
  $pdf->SetXY(93, 140); 
  $pdf->Cell(0, 10, 'X', 0, 1);

} else if ($row['maternal_condition'] === '42 days to 1 year after delivery') {
  $pdf->SetXY(137.5, 140); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} //else {
 // $pdf->SetXY(178.5, 139.9); 
 // $pdf->Cell(0, 10, 'X', 0, 1);
//}

// Manner of Death
$pdf->SetXY(113, 151.5); 
$pdf->Cell(0, 10, strtoupper($row['manner_of_death']), 0, 1);

// Place of Occurence
$pdf->SetXY(127, 156.3); 
$pdf->Cell(0, 10, strtoupper($row['place_of_occurrence']), 0, 1);

// Autopsy
$pdf->SetXY(189, 155.9); 
$pdf->Cell(0, 10, strtoupper($row['autopsy']), 0, 1);

if($row['attendant'] == 'Private Physician') {
  $pdf->SetXY(25.3, 169); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else  if ($row['attendant'] == 'Public Health Officer') {
  $pdf->SetXY(48, 169); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else if ($row['attendant'] == 'Hospital Authority') {
  $pdf->SetXY(69.7, 169); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else if ($row['attendant'] == 'None') {
  $pdf->SetXY(97, 169); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else {
  $pdf->SetXY(136, 169); 
  $pdf->Cell(0, 10, strtoupper($row['attendant']), 0, 1);
}

// Date From
// $dateFrom = $row['date_from'];
//$timestamp = strtotime($dateFrom);
//$formattedDate = date('m/d/Y', $timestamp);
//fitTextInCell($pdf, 160, 171.5, 26, 5, $formattedDate);

// Date To
//$pdf->SetXY(184, 168.9); 
//$dateTo = $row['date_to'];
//$timestampTo = strtotime($dateTo);
//$formattedDateTo = date('m/d/Y', $timestampTo);
//fitTextInCell($pdf, 184, 171.5, 26, 5, $formattedDateTo);

$pdf->SetFont('Arial', '', 10);
if ($row['certify_type'] == 'attended') {
  $pdf->SetXY(179, 179.5); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else {
  $pdf->SetXY(23.5, 182); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}

// death time
$militaryTime = $row['death_time'];
$convertedTime = date("g:i a", strtotime($militaryTime));
$pdf->SetXY(107, 182); 
fitTextInCell($pdf, 105, 185, 27, 4, $convertedTime);

$pdf->SetFont('Arial', '', 10);
// Attendant Name
$pdf->SetXY(38.5, 193); 
$pdf->Cell(0, 10, strtoupper($row['attendant_name']), 0, 1);

// Attendant position
$pdf->SetXY(41.5, 198); 
$pdf->Cell(0, 10, strtoupper($row['attendant_position']), 0, 1);

// Attendant address
$pdf->SetXY(32.5, 202.5); 
fitTextInCell($pdf, 33, 205.5, 90, 4, $row['attendant_address']);

// Attendant date
$pdf->SetXY(86.5, 206.5); 
$pdf->Cell(0, 10, strtoupper($row['attendant_date']), 0, 1);

// Reviewed date
$pdf->SetXY(148.5, 202.5); 
$pdf->Cell(0, 10, strtoupper($row['reviewed_date']), 0, 1);


// Corpse Disposal
$pdf->SetXY(32.5, 220.5); 
$pdf->Cell(0, 10, strtoupper($row['corpse_disposal_type']), 0, 1);

// Burial Permit No.
$pdf->SetXY(86.5, 215.5); 
$pdf->Cell(0, 10, strtoupper($row['burial_permit_no']), 0, 1);

// Burial Date Issued
$pdf->SetXY(89.5, 220); 
$pdf->Cell(0, 10, strtoupper($row['burial_date_issued']), 0, 1);

// transfer Permit No.
$pdf->SetXY(154.5, 215.5); 
$pdf->Cell(0, 10, strtoupper($row['transfer_permit_no']), 0, 1);

// transfer Date Issued
$pdf->SetXY(159.5, 220); 
$pdf->Cell(0, 10, strtoupper($row['transfer_date_issued']), 0, 1);

// Name of Crematory
$pdf->SetXY(32.5, 229.5);
$crematoryAdd = explode(',', $row['cemetery_name_address']);
fitTextInCell($pdf, 20, 231.5, 60, 6, $crematoryAdd[0]);
fitTextInCell($pdf, 80, 231.5, 60, 6, $crematoryAdd[1]);
fitTextInCell($pdf, 140, 231.5, 60, 6, $crematoryAdd[2]);

// Informant Name
$pdf->SetXY(38.5, 252); 
$pdf->Cell(0, 10, strtoupper($row['informant_name']), 0, 1);

// Informant Relationship
$pdf->SetXY(56.5, 258); 
$pdf->Cell(0, 10, strtoupper($row['rel_death']), 0, 1);

// Informant Address
$pdf->SetXY(33.5, 264); 
fitTextInCell($pdf, 33, 266, 77, 4, $row['informant_address']);

// Informant date
$pdf->SetXY(33.5, 267.5); 
$pdf->Cell(0, 10, strtoupper($row['informant_date']), 0, 1);


// Prepared Name
$pdf->SetXY(132.5, 251); 
$pdf->Cell(0, 10, strtoupper($row['prepared_name']), 0, 1);

// Prepared Position
$pdf->SetXY(134.5, 257); 
$pdf->Cell(0, 10, strtoupper($row['prepared_position']), 0, 1);

// Prepared Date
$pdf->SetXY(123.5, 262.5); 
$pdf->Cell(0, 10, strtoupper($row['prepared_date']), 0, 1);

// Received Name
$pdf->SetXY(38.5, 283); 
$pdf->Cell(0, 10, strtoupper($row['received_name']), 0, 1);

// Received Position
$pdf->SetXY(40.5, 290); 
$pdf->Cell(0, 10, strtoupper($row['received_position']), 0, 1);

// Received date
$pdf->SetXY(30.5, 294.5); 
$pdf->Cell(0, 10, strtoupper($row['received_date']), 0, 1);

// Civil Name
$pdf->SetXY(133.5, 282); 
$pdf->Cell(0, 10, strtoupper($row['civil_name']), 0, 1);

// Civil Position
$pdf->SetXY(133.5, 289); 
$pdf->Cell(0, 10, strtoupper($row['civil_position']), 0, 1);

// Civil date
$pdf->SetXY(123.5, 293.5); 
$pdf->Cell(0, 10, strtoupper($row['civil_date']), 0, 1);

// Remarks
$pdf->SetXY(30.5, 308.5); 
$pdf->Cell(0, 10, strtoupper($row['remarks']), 0, 1);

// 2nd Page
$pdf->AddPage('P', array(215.9, 355.6));
// $templateId = $pdf->importPage(2);
// $pdf->useTemplate($templateId);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);

// Mother Age
$pdf->SetXY(25.5, 22); 
$pdf->Cell(0, 10, strtoupper($row['mother_age']), 0, 1);

// Delivery Method
$pdf->SetXY(61.5, 22); 
$pdf->Cell(0, 10, strtoupper($row['delivery_method']), 0, 1);

// Pregnancy Length
$pdf->SetXY(155.5, 22); 
$pdf->Cell(0, 10, strtoupper($row['pregnancy_length']), 0, 1);

// Birth Type
$pdf->SetXY(25.5, 34); 
$pdf->Cell(0, 10, strtoupper($row['birth_type']), 0, 1);

// If multi child was
$pdf->SetXY(129.5, 34); 
$pdf->Cell(0, 10, strtoupper($row['if_multi_child_was']), 0, 1);


// Main Disease
$pdf->SetXY(65.5, 50); 
$pdf->Cell(0, 10, strtoupper($row['main_disease']), 0, 1);
// other Disease
$pdf->SetXY(68.5, 55.7); 
$pdf->Cell(0, 10, strtoupper($row['other_disease']), 0, 1);
// Main Maternal Disease
$pdf->SetXY(86.5, 60.7); 
$pdf->Cell(0, 10, strtoupper($row['main_maternal_disease']), 0, 1);
// Other Maternal Disease
$pdf->SetXY(86.5, 65.7); 
$pdf->Cell(0, 10, strtoupper($row['other_maternal_disease']), 0, 1);
// Other Relevant
$pdf->SetXY(63.5, 70.7); 
$pdf->Cell(0, 10, strtoupper($row['other_relevant']), 0, 1);

// Autopsy Text 1
$pdf->SetXY(63.5, 92.7); 
$pdf->Cell(0, 10, strtoupper($row['autopsy_txt1']), 0, 1);

// Autopsy Text 2
$pdf->SetXY(63.5, 97.7); 
$pdf->Cell(0, 10, strtoupper($row['autopsy_txt2']), 0, 1);

// Autopsy Name
$pdf->SetXY(33.5, 114.7); 
$pdf->Cell(0, 10, strtoupper($row['autopsy_name']), 0, 1);
// Autopsy date
$pdf->SetXY(25.5, 119.7); 
$pdf->Cell(0, 10, strtoupper($row['autopsy_date']), 0, 1);
// Autopsy title
$pdf->SetXY(129.5, 108.7); 
$pdf->Cell(0, 10, strtoupper($row['autopsy_title']), 0, 1);
// Autopsy address
$pdf->SetXY(118.5, 114.7); 
fitTextInCell($pdf, 119, 117, 76, 4, $row['autopsy_address']);

// Embalmer Text
$pdf->SetXY(88.5, 132.7); 
$pdf->Cell(0, 10, strtoupper($row['embalmer_txt']), 0, 1);

// embalmer Name
$pdf->SetXY(33.5, 153.2); 
$pdf->Cell(0, 10, strtoupper($row['embalmer_name']), 0, 1);
// embalmer address
$pdf->SetXY(25.5, 158.7); 
fitTextInCell($pdf, 26, 162, 79, 4, $row['embalmer_address']);
// embalmer title
$pdf->SetXY(128.5, 148.2); 
$pdf->Cell(0, 10, strtoupper($row['embalmer_title']), 0, 1);
// embalmer no
$pdf->SetXY(124.5, 153.2); 
$pdf->Cell(0, 10, strtoupper($row['embalmer_no']), 0, 1);

// embalmer on
$pdf->SetXY(120.5, 158.7); 
$pdf->Cell(0, 10, strtoupper($row['embalmer_on']), 0, 1);
// embalmer at
$pdf->SetXY(159.5, 158.7); 
fitTextInCell($pdf, 160, 162, 36, 4, $row['embalmer_at']);
// embalmer no
$pdf->SetXY(124.5, 164.2); 
$pdf->Cell(0, 10, strtoupper($row['embalmer_expdate']), 0, 1);

// late name
$pdf->SetXY(33.5, 184); 
fitTextInCell($pdf, 30, 185.4, 89, 6,$row['late_name']);
// late address
$pdf->SetXY(65.5, 189); 
fitTextInCell($pdf, 66, 192, 130, 4, $row['late_address']);
// death name
$pdf->SetXY(36.5, 200); 
fitTextInCell($pdf, 38, 202.4, 76, 6,$row['death_name']);
// died on
$pdf->SetXY(136.5, 200); 
$pdf->Cell(0, 10, strtoupper($row['died_on']), 0, 1);
// died in
$pdf->SetXY(38, 206); 
fitTextInCell($pdf, 38, 208, 116, 4, $row['died_in']);
// buried in
$pdf->SetXY(38, 210.5); 
fitTextInCell($pdf, 38, 213, 94, 4, $row['buried_in']);
// buried on
$pdf->SetXY(138, 210.3); 
$pdf->Cell(0, 10, strtoupper($row['buried_on']), 0, 1);
// attended type
if ($row['attended_type'] == 'attended') {
  $pdf->SetXY(42, 222.3); 
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetXY(71, 224); 
  $pdf->Cell(0, 10, strtoupper($row['attended_by']), 0, 1);
} else {
  $pdf->SetXY(42, 230.3); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}
// late death cause
$pdf->SetXY(92, 239.5); 
$pdf->Cell(0, 10, strtoupper($row['late_death_cause']), 0, 1);
// late reg reason
$pdf->SetXY(118, 248); 
$pdf->Cell(0, 10, strtoupper($row['late_reg_reason']), 0, 1);
// sign day
$pdf->SetXY(105, 267); 
$pdf->Cell(0, 10, strtoupper($row['sign_day']), 0, 1);
// sign month
$pdf->SetXY(135, 267); 
$pdf->Cell(0, 10, strtoupper($row['sign_month']), 0, 1);
// sign year
$pdf->SetXY(177, 267); 
$pdf->Cell(0, 10, strtoupper($row['sign_year']), 0, 1);
// sign at
$pdf->SetXY(17, 272.5); 
fitTextInCell($pdf, 18, 274, 76, 4, $row['sign_at']);
// affiant name
$pdf->SetXY(125, 281.5); 
fitTextInCell($pdf, 106, 283.3, 89, 6,$row['late_name']);
// sworn day
$pdf->SetXY(99, 296); 
$pdf->Cell(0, 10, strtoupper($row['sworn_day']), 0, 1);
// sworn month
$pdf->SetXY(128, 296); 
$pdf->Cell(0, 10, strtoupper($row['sworn_month']), 0, 1);
// sworn year
$pdf->SetXY(178, 296); 
$pdf->Cell(0, 10, strtoupper($row['sworn_year']), 0, 1);
// sworn at
$pdf->SetXY(15, 302); 
fitTextInCell($pdf, 15, 304, 100, 4, $row['sworn_at']);
// ctc
$pdf->SetXY(15, 307.5); 
$pdf->Cell(0, 10, strtoupper($row['ctc']), 0, 1);
// issued on 
$pdf->SetXY(65, 307.5); 
$pdf->Cell(0, 10, strtoupper($row['issued_on']), 0, 1);
// issued at 
$pdf->SetXY(118, 307.5); 
$pdf->Cell(0, 10, strtoupper($row['issued_at']), 0, 1);
// administer position
$pdf->SetXY(118, 316.5); 
fitTextInCell($pdf, 109, 318.3, 78, 6,$row['administer_position']);
// administer address
$pdf->SetXY(120, 325.5); 
fitTextInCell($pdf, 109, 329, 78, 6,$row['administer_address']);
// administer name
fitTextInCell($pdf, 22, 329, 78, 6,$row['administer_name']);










$pdf->Output('death_'.$row['first_name'].'_'.$row['last_name'].'.pdf', 'I');

}}

?>