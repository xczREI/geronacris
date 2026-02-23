<?php
  use setasign\Fpdi\Fpdi;
  require_once('../../fpdf/fpdf.php');
  require_once('../../fpdi/src/autoload.php');
  if(isset($_POST['print'])){

    if(isset($_POST['reg_no']))
    {
      $remarks = $_POST['remarks'];
      require_once 'login_db_mrg.php';

      $conn = new mysqli($hn, $un, $pw, $db);
      if ($conn->connect_error) die($conn->connect_error);

      $sql = "SELECT * FROM registration_tbl NATURAL JOIN (husband_tbl NATURAL JOIN wife_tbl NATURAL JOIN marriage_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN witness_tbl NATURAL JOIN aff_solemn_tbl NATURAL JOIN late_reg_tbl) WHERE no = '".$_POST['reg_no']."'";
      $result = $conn->query($sql);  
      if (!$result) die ("Database access failed: " . $conn->error);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $pdf = new FPDI();

$pdf->AddPage('P', array(215.9, 355.6));

//            ***** READ ME ******
//       ung mga may adju adjustment un ung para maging dyanamic ung placement ng mga cells sa pdf depending sa width or length nung text na ilalagay and usually ideal sya for baranggay and house number as well as sa mga maliliit na textbox

// // Import marriage template
// $pageCount = $pdf->setSourceFile('../../marriage.pdf');
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
      if ($pdf->GetStringWidth($text) < ($width - 5)) { // Consider a small padding
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
  $pdf->SetFont('Arial', '', 10);
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
$pdf->SetXY(35, 26); 
$pdf->Cell(0, 10, strtoupper($row['province']), 0, 1);

// Municipal
$pdf->SetXY(47, 31); 
$pdf->Cell(0, 10, strtoupper($row['municipal']), 0, 1);

// Registry No
$pdf->SetXY(165, 31);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, strtoupper($row['registry_no']), 0, 1);
$pdf->SetFont('Arial', '', 10);

// Husband First Name
$pdf->SetXY(60, 41); 
$pdf->Cell(0, 10, strtoupper($row['husband_fname']), 0, 1);

// Husband Middle Name
$pdf->SetXY(60, 45.5); 
$pdf->Cell(0, 10, strtoupper($row['husband_mname']), 0, 1);

// Husband Last Name
$pdf->SetXY(60, 49.5); 
$pdf->Cell(0, 10, strtoupper($row['husband_lname']), 0, 1);

// wife First Name
$pdf->SetXY(145, 42); 
$pdf->Cell(0, 10, strtoupper($row['wife_fname']), 0, 1);

// wife Middle Name
$pdf->SetXY(145, 46.5); 
$pdf->Cell(0, 10, strtoupper($row['wife_mname']), 0, 1);

// wife Last Name
$pdf->SetXY(145, 50.5); 
$pdf->Cell(0, 10, strtoupper($row['wife_lname']), 0, 1);

// Husband bdate
$pdf->SetXY(53, 58.5); 
$pdf->Cell(0, 10, strtoupper($row['husband_bdate']), 0, 1);
// Husband age
$pdf->SetXY(113.5, 58.5); 
$pdf->Cell(0, 10, strtoupper($row['husband_age']), 0, 1);
// wife bdate
$pdf->SetXY(140.5, 58.5); 
$pdf->Cell(0, 10, strtoupper($row['wife_bdate']), 0, 1);
// wife age
$pdf->SetXY(195, 59); 
$pdf->Cell(0, 10, strtoupper($row['wife_age']), 0, 1);

$rawHusbandBplace = $row['husband_bplace'];
$husbandBplace = explode(',', $rawHusbandBplace);
// husband Municipality
$pdf->SetXY(43, 67); 
fitTextInCell($pdf, 43, 70, 25, 5, $husbandBplace[0]?? '');
// husband Province
$pdf->SetXY(75, 67); 
fitTextInCell($pdf, 73, 70, 22, 5, $husbandBplace[1]?? '');
// husband Country
$pdf->SetXY(95, 67); 
fitTextInCell($pdf, 95, 70, 29, 5, $husbandBplace[2]?? '');

$rawWifeBplace = $row['wife_bplace'];
$wifeBplace = explode(',', $rawWifeBplace);
// wife Municipality
$pdf->SetXY(127, 67); 
fitTextInCell($pdf, 125, 70, 25, 5, $wifeBplace[0]?? '');
// wife Province
$pdf->SetXY(155, 67); 
fitTextInCell($pdf, 155, 70, 22, 5, $wifeBplace[1]?? '');
// wife Country
$pdf->SetXY(177, 67); 
fitTextInCell($pdf, 177, 70, 27, 5, $wifeBplace[2]?? '');

// husband sex
$pdf->SetXY(48, 76); 
$pdf->Cell(0, 10, strtoupper($row['husband_sex']), 0, 1);
// husband citizen
$pdf->SetXY(75, 76); 
$pdf->Cell(0, 10, strtoupper($row['husband_citizen']), 0, 1);
// wife sex
$pdf->SetXY(130, 76.5); 
$pdf->Cell(0, 10, strtoupper($row['wife_sex']), 0, 1);
// wife citizen
$pdf->SetXY(157, 76.7); 
$pdf->Cell(0, 10, strtoupper($row['wife_citizen']), 0, 1);
// husband residence
$pdf->SetXY(43, 86.5);
// $len = $pdf->GetStringWidth($row['husband_residence']);
fitTextInCellAddress($pdf, 43, 88, 80, 5, $row['husband_residence']);
// wife residence
$pdf->SetXY(125, 86.5); 
fitTextInCellAddress($pdf, 125, 88, 79, 5, $row['wife_residence']);
// husband religion
$pdf->SetXY(43, 93.5); 
fitTextInCell($pdf, 43, 95, 69, 5, $row['husband_religion']);
// wife religion
$pdf->SetXY(125, 93.7); 
fitTextInCell($pdf, 125, 95, 79, 5, $row['wife_religion']);
// husband civil_status
$pdf->SetXY(73, 100.5); 
$pdf->Cell(0, 10, strtoupper($row['husband_civil_status']), 0, 1);
// wife civil_status
$pdf->SetXY(155, 100.7); 
$pdf->Cell(0, 10, strtoupper($row['wife_civil_status']), 0, 1);

$rawHusbandFather = $row['husband_father_name'];
$husbandFather = explode(',', $rawHusbandFather);
// husband fatherName
$pdf->SetXY(50, 110.5); 
fitTextInCell($pdf, 47, 112, 23, 5, $husbandFather[0]?? '');
// husband fatherName
$pdf->SetXY(73, 110.5); 
fitTextInCell($pdf, 70, 112, 23, 5, $husbandFather[1]?? '');
// husband fatherName
$pdf->SetXY(93, 110.5); 
fitTextInCell($pdf, 93, 112, 30, 5, $husbandFather[2]?? '');

$rawWifeFather = $row['wife_father_name'];
$wifeFather = explode(',', $rawWifeFather);

// wife fatherName
$pdf->SetXY(130, 110.5); 
fitTextInCell($pdf, 130, 112, 23, 5, $wifeFather[0]?? '');
// wife fatherName
$pdf->SetXY(153, 110.5); 
fitTextInCell($pdf, 153, 112, 23, 5, $wifeFather[1]?? '');
// wife fatherName
$pdf->SetXY(173, 110.5); 
fitTextInCell($pdf, 176, 112, 28, 5, $wifeFather[1]?? '');

// husband fatherCitizen
$pdf->SetXY(73, 115.5); 
fitTextInCell($pdf, 43, 118, 80, 5, $row['husband_father_citizen']);

// wife fatherCitizen
$pdf->SetXY(155, 115.7); 
fitTextInCell($pdf, 125, 118, 79, 5, $row['wife_father_citizen']);

$rawHusbandMother = $row['husband_mother_name'];
$husbandMother = explode(',', $rawHusbandMother);

// husband mother_name
$pdf->SetXY(50, 125.5); 
fitTextInCell($pdf, 43, 127, 27, 5, $husbandMother[0]?? '');
// husband mother_name
$pdf->SetXY(73, 125.5); 
fitTextInCell($pdf, 70, 127, 27, 5, $husbandMother[1]?? '');
// husband mother_name
$pdf->SetXY(93, 125.5); 
fitTextInCell($pdf, 97, 127, 26, 5, $husbandMother[2]?? '');

$rawWifeMother = $row['wife_mother_name'];
$wifeMother = explode(',', $rawWifeMother);
// wife mother_name
$pdf->SetXY(130, 125.5); 
fitTextInCell($pdf, 125, 127, 27, 5, $wifeMother[0]?? '');
// wife mother_name
$pdf->SetXY(153, 125.5); 
fitTextInCell($pdf, 152, 127, 27, 5, $wifeMother[1]?? '');
// wife mother_name
$pdf->SetXY(173, 125.5); 
fitTextInCell($pdf, 179, 127, 25, 5, $wifeMother[2]?? '');


// husband motherCitizen
$pdf->SetXY(73, 133.5); 
fitTextInCell($pdf, 45, 135, 77, 5, $row['husband_mother_citizen']);

// wife motherCitizen
$pdf->SetXY(155, 133.7); 
fitTextInCell($pdf, 126, 135, 77, 5, $row['wife_mother_citizen']);

$rawHusbandPerson = $row['husband_person_name'];
$husbandPerson = explode(',', $rawHusbandPerson);
// husband person_name
$pdf->SetXY(50, 143.5); 
fitTextInCell($pdf, 43, 145, 27, 5, $husbandPerson[0]?? '');
// husband person_name
$pdf->SetXY(73, 143.5); 
fitTextInCell($pdf, 70, 145, 27, 5, $husbandPerson[1]?? '');
// husband person_name
$pdf->SetXY(93, 143.5); 
fitTextInCell($pdf, 97, 145, 26, 5, $husbandPerson[2]?? '');

// husband person_rel
$pdf->SetXY(73, 148.5); 
$pdf->Cell(0, 10, strtoupper($row['husband_person_rel']), 0, 1);
// wife person_rel
$pdf->SetXY(155, 148.5); 
$pdf->Cell(0, 10, strtoupper($row['wife_person_rel']), 0, 1);

if ($row['wife_person_name']) {
  $rawWifePerson = $row['wife_person_name'];
$wifePerson = explode(',', $rawWifePerson);
// wife person_name
$pdf->SetXY(130, 143.5); 
fitTextInCell($pdf, 125, 145, 27, 5, $wifePerson[0]?? '');
// wife person_name
$pdf->SetXY(153, 143.5); 
fitTextInCell($pdf, 152, 145, 27, 5, $wifePerson[1]?? '');
// wife person_name
$pdf->SetXY(173, 143.5); 
fitTextInCell($pdf, 179, 145, 25, 5, $wifePerson[2]?? '');
}


// husband  residence
$pdf->SetXY(43, 158.5); 
fitTextInCell($pdf, 43, 160, 80, 5, $row['husband_person_residence']);
// wife residence
$pdf->SetXY(125, 158.5); 
fitTextInCell($pdf, 125, 160, 79, 5, $row['wife_person_residence']);

// mrg brgy
$pdf->SetXY(46, 163); 
fitTextInCellAddress($pdf, 48, 165.5, 75, 5, $row['mrg_brgy']);

// mrg city
$pdf->SetXY(130, 163); 
fitTextInCell($pdf, 125, 165.5, 35, 5, $row['mrg_city']);

// mrg province
$pdf->SetXY(172, 163); 
fitTextInCell($pdf, 160, 165.5, 43, 5, $row['mrg_province']);


// mrg date
$rawMrgDate = $row['mrg_date'];
$mrgDate = explode(' ', $rawMrgDate);
$pdf->SetXY(59, 172.5); 
fitTextInCell($pdf, 55, 174, 15, 5, $mrgDate[0]?? '');
fitTextInCell($pdf, 70, 174, 30, 5, $mrgDate[1]?? '');
fitTextInCell($pdf, 97, 174, 20, 5, $mrgDate[2]?? '');

$militaryTime = $row['mrg_time'];
$convertedTime = date("g:i a", strtotime($militaryTime));
// mrg time
$pdf->SetXY(165, 172.5); 
fitTextInCell($pdf, 160, 175, 30, 5, $convertedTime);

$pdf->SetFont('Arial', '', 9);
// husband Certify
$pdf->SetXY(67, 183.7); 
fitTextInCell($pdf, 68.5, 187.2, 59, 3, $row['husband_fname'].' '.$row['husband_mname'].' '.$row['husband_lname']);
// husband Certify
$pdf->SetXY(136, 183.7); 
fitTextInCell($pdf, 137.5, 187.2, 55, 3, $row['wife_fname'].' '.$row['wife_mname'].' '.$row['wife_lname']);
$pdf->SetFont('Arial', '', 12);
if ($row['mrg_certify_type'] == 'entered') {
  $pdf->SetXY(80, 193); 
  $pdf->Cell(0, 10, 'X', 0, 1);
} else {
  $pdf->SetXY(146, 193); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}
$pdf->SetFont('Arial', '', 8);
// mrg cerf_day
$pdf->SetXY(159, 195.5); 
$pdf->Cell(0, 10, strtoupper($row['mrg_cerf_day']), 0, 1);
// mrg cerf_month
$pdf->SetXY(175, 195.5); 
$pdf->Cell(0, 10, strtoupper($row['mrg_cerf_month']), 0, 1);
// mrg cerf_year
$pdf->SetXY(195, 195.5); 
$pdf->Cell(0, 10, strtoupper($row['mrg_cerf_year']), 0, 1);

$pdf->SetFont('Arial', '', 12);
// solemn_type
if ($row['mrg_solemn_type'] == 'marriage license') {
  $pdf->SetXY(20, 226.5); 
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetFont('Arial', '', 10);
  $pdf->SetXY(55, 224.5); 
  $pdf->Cell(0, 10, strtoupper($row['mrg_license_no']), 0, 1);
  $pdf->SetXY(110, 224.5); 
  $pdf->Cell(0, 10, strtoupper($row['mrg_issued_on']), 0, 1);
  $pdf->SetXY(153, 224.5); 
  fitTextInCell($pdf, 154, 226.5, 48, 5, $row['mrg_issued_at']);
} else if ($row['mrg_solemn_type'] == 'no marriage license') {
  $pdf->SetXY(20, 232.5); 
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetFont('Arial', '', 10);
  $pdf->SetXY(124, 231.5); 
  $pdf->Cell(0, 10, strtoupper($row['mrg_under_art']), 0, 1);
} else {
  $pdf->SetXY(20, 238.5); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}

// mrg solemn_name
$pdf->SetXY(27, 245.5); 
fitTextInCell($pdf, 20, 248, 63, 5, $row['mrg_solemn_name']);
// mrg solemn_position
$pdf->SetXY(87, 245.5); 
fitTextInCell($pdf, 85, 248, 55, 5, $row['mrg_solemn_position']);
// mrg solemn_other
$pdf->SetXY(140, 245.5); 
fitTextInCell($pdf, 140, 248, 63, 5, $row['mrg_solemn_other']);

// witness1
$pdf->SetXY(24, 263.5); 
fitTextInCell($pdf, 24, 266, 42, 5, $row['witness1']);
// witness2
$pdf->SetXY(70, 263.5); 
fitTextInCell($pdf, 70, 266, 42, 5, $row['witness2']);
// witness3
$pdf->SetXY(117, 263.5); 
fitTextInCell($pdf, 117, 265.5, 42, 5, $row['witness3']);
// witness4
$pdf->SetXY(162, 263.5); 
fitTextInCell($pdf, 162, 265.5, 42, 5, $row['witness4']);


// received_name SGD
$pdf->SetXY(37, 274); 
fitTextInCell($pdf, 37, 277, 70, 5, "(SGD) " . $row['received_name']);
// received_name
$pdf->SetXY(37, 280); 
fitTextInCell($pdf, 37, 282, 70, 5, $row['received_name']);
// received_position
$pdf->SetXY(39, 285.5); 
fitTextInCell($pdf, 39, 287.5, 68, 5, $row['received_position']);
// received_date
$pdf->SetXY(39, 290.5); 
$pdf->Cell(0, 10, strtoupper($row['received_date']), 0, 1);

// civil_name SGD
$pdf->SetXY(129, 273.5); 
fitTextInCell($pdf, 130, 277, 72, 5, "(SGD) " . $row['civil_name']);
// civil_name
$pdf->SetXY(129, 279.5); 
fitTextInCell($pdf, 130, 282, 72, 5, $row['civil_name']);
// civil_position
$pdf->SetXY(132, 285); 
fitTextInCell($pdf, 132, 287.5, 70, 5, $row['civil_position']);
// civil_date
$pdf->SetXY(132, 290); 
$pdf->Cell(0, 10, strtoupper($row['civil_date']), 0, 1);

// remarks
$pdf->SetXY(37, 305.5); 
$pdf->Cell(0, 10, strtoupper($row['remarks']), 0, 1);

// 2nd Page
$pdf->AddPage('P', array(215.9, 355.6));
// $templateId = $pdf->importPage(2);
// $pdf->useTemplate($templateId);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);


//aff_solemn_name
$pdf->SetXY(29, 43.5); 
fitTextInCell($pdf, 29, 46, 52, 5, $row['aff_solemn_name']);
//aff_solemn_of
$pdf->SetXY(126, 43.5); 
fitTextInCell($pdf, 127, 46, 48, 5, $row['aff_solemn_of']);
//aff_solemn_at
$pdf->SetXY(14, 49); 
fitTextInCell($pdf, 14, 51.5, 56, 5, $row['aff_solemn_of']);
//aff_hus_name
$pdf->SetXY(75, 52.5); 
fitTextInCell($pdf, 77, 55, 42, 5, $row['aff_hus_name']);
//aff_wife_name
$pdf->SetXY(124, 52.5); 
fitTextInCell($pdf, 125.5, 55, 45, 5, $row['aff_wife_name']);

if($row['aff_2type']=='a'){
  $pdf->SetXY(20.5, 59); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}else if($row['aff_2type']=='b'){
  $pdf->SetXY(20.5, 66.5); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}else if($row['aff_2type']=='c'){
  $pdf->SetXY(20.5, 74.5); 
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetXY(66.5, 69.5); 
  fitTextInCell($pdf, 68, 73, 44, 3, $row['aff_1party']);
  $pdf->SetXY(116.5, 69.5); 
  fitTextInCell($pdf, 117.5, 73, 45, 3, $row['aff_2party']);
}else if($row['aff_2type']=='d'){
  $pdf->SetXY(20.5, 84); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}else {
  $pdf->SetXY(20.5, 92); 
  $pdf->Cell(0, 10, 'X', 0, 1);
}
//aff_sign_day
$pdf->SetXY(107, 114); 
$pdf->Cell(0, 10, strtoupper($row['aff_sign_day']), 0, 1);
//aff_sign_month
$pdf->SetXY(130, 114.5); 
$pdf->Cell(0, 10, strtoupper($row['aff_sign_month']), 0, 1);
//aff_sign_year
$pdf->SetXY(175, 114.5); 
$pdf->Cell(0, 10, strtoupper($row['aff_sign_year']), 0, 1);
//aff_sign_at
$pdf->SetXY(13.5, 117.5); 
fitTextInCell($pdf, 14, 120.5, 67, 4, $row['aff_sign_at']);
//aff_sign_name
$pdf->SetXY(120.5, 126.5); 
fitTextInCell($pdf, 109, 129.5, 86, 4, $row['aff_sign_name']);
//aff_sworn_day
$pdf->SetXY(100.5, 134.5); 
$pdf->Cell(0, 10, strtoupper($row['aff_sworn_day']), 0, 1);
//aff_sworn_month
$pdf->SetXY(127.5, 134.5); 
$pdf->Cell(0, 10, strtoupper($row['aff_sworn_month']), 0, 1);
//aff_sworn_year
$pdf->SetXY(175.5, 134.5); 
$pdf->Cell(0, 10, strtoupper($row['aff_sworn_year']), 0, 1);
//aff_sworn_at
$pdf->SetXY(13.5, 138); 
fitTextInCell($pdf, 14, 141.2, 75, 4, $row['aff_sworn_at']);
//aff_sworn_ctc
$pdf->SetXY(161.5, 138); 
fitTextInCell($pdf, 163, 141.5, 32, 4, $row['aff_sworn_ctc']);
//aff_issued_on
$pdf->SetFont('Arial', '', 11);
$pdf->SetXY(26, 143); 
$pdf->Cell(0, 10, strtoupper($row['aff_issued_on']), 0, 1);
//aff_issued_at
$pdf->SetFont('Arial', '', 12);
$pdf->SetXY(69, 143); 
fitTextInCell($pdf, 69, 146, 60, 4, $row['aff_issued_at']);
//aff_admin_name
$pdf->SetXY(40, 158.5); 
fitTextInCell($pdf, 35.5, 161, 71.5, 4, $row['aff_admin_name']);
//aff_admin_address
$pdf->SetXY(123, 158.5); 
fitTextInCell($pdf, 112, 161.5, 75, 4, $row['aff_admin_address']);
//aff_admin_title
$pdf->SetXY(119, 150); 
fitTextInCell($pdf, 112, 152.8, 75, 4, $row['aff_admin_title']);

//late_name
$pdf->SetXY(25, 173.5); 
$pdf->Cell(0, 10, strtoupper($row['late_name']), 0, 1);
//late_address
$pdf->SetXY(33, 177); 
$pdf->Cell(0, 10, strtoupper($row['late_address']), 0, 1);

if ($row['late_reg_type'] == 'my marriage') {
  $pdf->SetXY(19.8, 193);  
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetFont('Arial', '', 11);
  $pdf->SetXY(47.5, 191.5);
  fitTextInCell($pdf, 49.5, 195, 44, 3, $row['marriage_with']);

  $pdf->SetXY(95.5, 191.5);
  fitTextInCell($pdf, 97.5, 195, 33, 3, $row['marriage_in']);
  $pdf->SetXY(134, 191.5);
  fitTextInCell($pdf, 135.5, 195, 30, 3, $row['marriage_on']);
  
} else {
  $pdf->SetXY(19.8, 198); 
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetXY(53, 196.5); 
  fitTextInCell($pdf, 55, 200, 46.5, 3, $row['late_husband_name']);
  $pdf->SetXY(107.5, 196.5); 
  fitTextInCell($pdf, 108, 200, 53, 3, $row['late_wife_name']);
  $pdf->SetFont('Arial', '', 10);
  $pdf->SetXY(17, 201.5);
  fitTextInCell($pdf, 18, 205, 31, 3, $row['marriage_in']);
  $pdf->SetXY(52.5, 201.5);
  fitTextInCell($pdf, 54, 205, 31, 3, $row['marriage_on']);
}
$pdf->SetFont('Arial', '', 12);
//late_solemn_name
$pdf->SetXY(68, 208.5);
fitTextInCell($pdf, 68, 210.5, 71, 5, $row['late_solemn_name']);
if($row['late_sect_type'] == 'religious ceremony'){
  $pdf->SetXY(32, 215);   
  $pdf->Cell(0, 10, 'X', 0, 1);
  
} else if ($row['late_sect_type'] == 'civil ceremony') {
  $pdf->SetXY(66, 215);  
  $pdf->Cell(0, 10, 'X', 0, 1);
} else if ($row['late_sect_type'] == 'Muslim rites') {
  $pdf->SetXY(97.5, 215);  
  $pdf->Cell(0, 10, 'X', 0, 1);
} else {
  $pdf->SetXY(129, 215);  
  $pdf->Cell(0, 10, 'X', 0, 1);
}
//late_solemn_type
if($row['late_solemn_type'] == 'marriage license') {
  $pdf->SetXY(22.5, 224.7);  
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetFont('Arial', '', 8.5);
  $pdf->SetXY(61, 223.5);
  fitTextInCell($pdf, 62, 227.2, 18, 3, $row['late_mrg_license_no']);
  $pdf->SetXY(91, 223.5);
  fitTextInCell($pdf, 93, 227.2, 28, 3, $row['late_mrg_issued_on']);
  $pdf->SetXY(124, 223.5);
  fitTextInCell($pdf, 125, 227, 50, 3, $row['late_mrg_issued_at']);
} else {
  $pdf->SetXY(22.5, 230.7);  
  $pdf->Cell(0, 10, 'X', 0, 1);
  $pdf->SetXY(48.5, 229.5);
  $pdf->Cell(0, 10, strtoupper($row['late_mrg_under_art']), 0, 1);
}
//applicant_hus_citizen
$pdf->SetXY(107, 235.5);
fitTextInCell($pdf, 107, 239.2, 49, 3, $row['applicant_hus_citizen']);
//applicant_wife_citizen
$pdf->SetXY(19, 238.8);
fitTextInCell($pdf, 19, 242, 49, 4, $row['applicant_wife_citizen']);
//other_hus_citizen
$pdf->SetXY(119, 244);
fitTextInCell($pdf, 119, 247, 49, 4, $row['other_hus_citizen']);
//other_wife_citizen
$pdf->SetXY(37, 248.4);
fitTextInCell($pdf, 37, 251.5, 53, 4, $row['other_wife_citizen']);

//late_reg_reason
$pdf->SetXY(100, 253);
fitTextInCell($pdf, 100, 256, 63.5, 4, $row['late_reg_reason']);
//late_sign_day
$pdf->SetXY(109.4, 264.5);
$pdf->Cell(0, 10, strtoupper($row['late_sign_day']), 0, 1);
//late_sign_month
$pdf->SetXY(132.4, 264.5);
$pdf->Cell(0, 10, strtoupper($row['late_sign_month']), 0, 1);
//late_sign_year
$pdf->SetXY(172.4, 264.5);
$pdf->Cell(0, 10, strtoupper($row['late_sign_year']), 0, 1);
//late_sign_at
$pdf->SetXY(15, 269);
fitTextInCell($pdf, 15, 272, 68, 4, $row['late_sign_at']);
//late_affiant_name
$pdf->SetXY(118, 276.5);
fitTextInCell($pdf, 104, 280, 75, 4, $row['late_affiant_name']);

//late_sworn_day
$pdf->SetXY(99, 291.5);
$pdf->Cell(0, 10, strtoupper($row['late_sworn_day']), 0, 1);
//late_sworn_month
$pdf->SetXY(124, 291.5);
$pdf->Cell(0, 10, strtoupper($row['late_sworn_month']), 0, 1);
//late_sworn_year
$pdf->SetXY(173, 291.5);
$pdf->Cell(0, 10, strtoupper($row['late_sworn_year']), 0, 1);
//late_sworn_at
$pdf->SetXY(15, 296.5);
fitTextInCell($pdf, 15, 299, 95, 4, $row['late_sworn_at']);
//late_ctc
$pdf->SetXY(15, 301.5);
fitTextInCell($pdf, 15, 304, 31, 4, $row['late_ctc']);
//late_issued_on
$pdf->SetXY(60, 301.5);
$pdf->Cell(0, 10, strtoupper($row['late_issued_on']), 0, 1);
//late_issued_at
$pdf->SetXY(119, 301.5);
fitTextInCell($pdf, 119, 304.5, 71, 4, $row['late_issued_at']);

//late_administer_name
$pdf->SetXY(36.5, 325);
fitTextInCell($pdf, 32.5, 328, 60, 4, $row['late_administer_name']);
//late_administer_address
$pdf->SetXY(116.5, 325);
fitTextInCell($pdf, 110.5, 328, 61, 4, $row['late_administer_address']);
//late_administer_position
$pdf->SetXY(109, 314);
fitTextInCell($pdf, 110, 317, 62, 4, $row['late_administer_position']);





// Output the PDF
$pdf->Output('marriage_'.$row['husband_lname'].'_'.$row['wife_lname'].'.pdf', 'I');

          }
        }
    } 
  }

?>














