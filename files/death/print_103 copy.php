<?php
if(isset($_POST['print'])){

  if(isset($_POST['reg_no']))
  {
    $remarks = $_POST['remarks'];
   
    require_once 'login_db_death.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $sql = "SELECT * FROM registration_tbl NATURAL JOIN (person_tbl NATURAL JOIN death_cause_eight_days NATURAL JOIN att_rev_tbl NATURAL JOIN corpse_disposal_tbl NATURAL JOIN inf_pre_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN death_cause_zero_seven NATURAL JOIN autopsy_tbl NATURAL JOIN embalmer_tbl NATURAL JOIN late_reg_tbl) WHERE no = '".$_POST['reg_no']."'";
    $result = $conn->query($sql);  
    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) { 
        $attendant = $row['attendant'];

// Instanciation of inherited class

require_once('../../tcpdf/tcpdf.php'); 

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle("Form No. 103");  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('helvetica');  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins(10, 10, 10);
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);  
$pdf->SetFont('helvetica', '', '9');  
$pdf->AddPage('P', 'LEGAL'); 

$pdf->Ln(20);
$pdf->Cell(25);
$pdf->Cell(0, 0,strtoupper($row['province']), 0, 1, '');
$pdf->Cell(38);
$pdf->Cell(0, 0,strtoupper($row['municipal']).'                                                                               
                                    '.strtoupper($row['registry_no']), 0, 1, '');
$pdf->Ln(9);
$pdf->Cell(20);
if($row['age_type']=='yrs'){ 
  $yrs = $row['age_time_of_death'];
  $mtha = '';
  $daya = '';
  $mthb = '';
  $dayb = '';
}else if($row['age_type'] == 'under yrs'){
  $yrs = ''; 
  $mtha = $row['age_time_of_death'];
  $daya = $row['age_day_min'];
  $mthb = '';
  $dayb = '';
}else if($row['age_type'] == 'under hrs'){ 
  $yrs = '';
  $mtha = '';
  $daya = '';
  $mthb = $row['age_time_of_death'];
  $dayb = $row['age_day_min'];
}else{ 
  $yrs = '';
  $mtha = '';
  $daya = '';
  $mthb = '';
  $dayb = '';
}

$txt = '';
$txt .='
<table style="border: 1px solid red;">
  <tr>
    <td width="25%" align="center">'.strtoupper($row['first_name']).'</td>
    <td width="25%" align="center">'.strtoupper($row['middle_name']).'</td>
    <td width="25%" align="center">'.strtoupper($row['last_name']).'</td>
    <td width="25%" align="center">'.strtoupper($row['sex']).'</td>
  </tr>
  <br><br><br>
  <tr>
    <td width="35%" align="center">'.strtoupper(date_format(date_create($row['date_birth']),'d F Y')).'</td>
    <td width="35%" align="center">'.strtoupper(date_format(date_create($row['date_death']),'d F Y')).'</td>
    <td width="10%" align="center">'.$yrs.'</td>
    <td width="5%"></td>
    <td width="6%" align="center">'.$mtha.'</td>
    <td width="1%"></td>
    <td width="6%" align="center">'.$daya.'</td>
    <td width="6%" align="center">'.$mthb.'</td>
    <td width="6%" align="center">'.$dayb.'</td>
  </tr>
  <br><br>
  <tr>
    <td width="85%" align="center">'.strtoupper($row['place_death']).'</td>
    <td width="27%" align="center">'.strtoupper($row['civil_status']).'</td>
  </tr>
  <br><br>
  <tr>
    <td width="35%" align="center">'.strtoupper($row['religion']).'</td>
    <td width="28%" align="center">'.strtoupper($row['citizen']).'</td>
    <td width="49%" align="center">'.strtoupper($row['residence']).'</td>
  </tr>
  <br><br>
  <tr>
    <td width="30%" align="center">'.strtoupper($row['occupation']).'</td>
    <td width="41%" align="center">'.strtoupper($row['father_name']).'</td>
    <td width="41%" align="center">'.strtoupper($row['mother_name']).'</td>
</tr>
</table>';
$pdf->writeHTML($txt); 
$pdf->Ln(10);

if($row['maternal_condition'] == 'pregnant, not in labour'){
  $a='X';
  $b='';
  $c='';
  $d='';
  $e='';
}else if($row['maternal_condition'] == 'pregnant, in labour'){
  $a='';
  $b='X';
  $c='';
  $d='';
  $e='';
}else if($row['maternal_condition'] == 'less than 42 days after delivery'){
  $a='';
  $b='';
  $c='X';
  $d='';
  $e='';
}else if($row['maternal_condition'] == '42 days to 1 year after delivery'){
  $a='';
  $b='';
  $c='';
  $d='X';
  $e='';
}else if(empty($row['maternal_condition'])){
  $a='';
  $b='';
  $c='';
  $d='';
  $e='';
}else{
  $a='';
  $b='';
  $c='';
  $d='';
  $e='X';
}

$txt1 = '';
$txt1 .='
<table cellpadding="2">
  <tr>
    <td width="30%"></td>
    <td width="40%">'.strtoupper($row['immediate_cause']).'</td>
    <td width="30%">'.strtoupper($row['immediate_interval']).'</td>
  </tr>
  <tr>
    <td width="30%"></td>
    <td width="40%">'.strtoupper($row['antecedent_cause']).'</td>
    <td width="30%">'.strtoupper($row['antecedent_interval']).'</td>
  </tr>
  <tr>
    <td width="30%"></td>
    <td width="40%">'.strtoupper($row['underlying_cause']).'</td>
    <td width="30%">'.strtoupper($row['underlying_interval']).'</td>
  </tr>
  <tr>
    <td width="43%" align="center"></td>
    <td width="60%">'.strtoupper($row['other_condition_death']).'</td>
  </tr>
  <br>
  <tr>
    <td width="9%" align="center"></td>
    <td width="17%">'.$a.'</td>
    <td width="16%">'.$b.'</td>
    <td width="22%">'.$c.'</td>
    <td width="22%">'.$d.'</td>
    <td width="19%">'.$e.'</td>
  </tr>
</table>';
$pdf->writeHTML($txt1); 

$txt2 = '';
$txt2 .='
<table cellpadding="2">
  <tr>
    <td width="58%"></td>
    <td width="28%">'.strtoupper($row['manner_of_death']).'</td>
    <td width="12%" align="center"></td>
  </tr>
  <tr>
    <td width="65%"></td>
    <td width="23%">'.strtoupper($row['place_of_occurrence']).'</td>
    <td width="12%" align="center">'.strtoupper($row['autopsy']).'</td>
  </tr>
</table>';
$pdf->writeHTML($txt2);

if($row['attendant'] == 'Private Physician'){
  $aa='X';
  $bb='';
  $cc='';
  $dd='';
  $ee='';
  $ff='';
}else if($row['attendant'] == 'Public Health Officer'){
  $aa='';
  $bb='X';
  $cc='';
  $dd='';
  $ee='';
  $ff='';
}else if($row['attendant'] == 'Hospital Authority'){
  $aa='';
  $bb='';
  $cc='X';
  $dd='';
  $ee='';
  $ff='';
}else if($row['attendant'] == 'None'){
  $aa='';
  $bb='';
  $cc='';
  $dd='X';
  $ee='';
  $ff='';
}else if(empty($row['attendant'])){
  $aa='';
  $bb='';
  $cc='';
  $dd='';
  $ee='';
  $ff='';
}else{
  $aa='';
  $bb='';
  $cc='';
  $dd='';
  $ee='X';
  $ff=strtoupper($row['attendant']);
}

$txt3 = '';
$txt3 .='
<table cellpadding="4">
  <tr>
    <td width="7%"></td>
    <td width="12%">'.$aa.'</td>
    <td width="12%">'.$bb.'</td>
    <td width="12%">'.$cc.'</td>
    <td width="10%">'.$dd.'</td>
    <td width="10%">'.$ee.'</td>
    <td width="14%">'.$ff.'</td>';
  if ($row['date_from'] == '0000-00-00' && $row['date_to'] == '0000-00-00') {
    $txt3 .='
    <td width="13%"></td>
    <td width="13%"></td>';
  }else{
    $txt3 .='
    <td width="13%">'.$row['date_from'].'</td>
    <td width="13%">'.$row['date_to'].'</td>';
  }
    
$txt3 .='
  </tr>
</table>';
$pdf->writeHTML($txt3);

if($row['certify_type'] == 'attended'){ 
  if($row['death_time'] <= 11){
    $pdf->Cell(98);
    $pdf->Write(10,strtoupper(date_format(date_create($row['death_time']),'h:i').' AM'));
    $pdf->Cell(60);
    $pdf->Write(3,'X');
  }else if($row['death_time'] >= 12){
    $pdf->Cell(98);
    $pdf->Write(10,strtoupper(date_format(date_create($row['death_time']),'h:i').' PM'));
    $pdf->Cell(60);
    $pdf->Write(3,'X');
  }
}else if($row['certify_type'] == 'not attended'){
  $pdf->Ln(1);
  $pdf->Cell(15);
  $pdf->Write(8,'X');

  if($row['death_time'] <= 11){
    $pdf->Cell(80);
    $pdf->Write(8,strtoupper(date_format(date_create($row['death_time']),'h:i').' AM'));
  }else if($row['death_time'] >= 12){
    $pdf->Cell(80);
    $pdf->Write(8,strtoupper(date_format(date_create($row['death_time']),'h:i').' PM'));
  }
}else{
  if($row['death_time'] <= 11){
    $pdf->Cell(95);
    $pdf->Write(10,strtoupper(date_format(date_create($row['death_time']),'h:i').' AM'));
  }else if($row['death_time'] >= 12){
    $pdf->Cell(95);
    $pdf->Write(10,strtoupper(date_format(date_create($row['death_time']),'h:i').' PM'));
  }
  $pdf->Ln(2);
}

$pdf->Ln(12);
$txt4 = '';
$txt4 .='
<table cellpadding="1">
  <tr>
    <td width="17%"></td>
    <td width="40%">'.strtoupper($row['attendant_name']).'</td>
    <td width="35%" align="center">'.strtoupper($row['attendant_name']).'</td>
  </tr>
  <tr>
    <td width="18%"></td>
    <td width="36%">'.strtoupper($row['attendant_position']).'</td>
  </tr>
  <tr>
    <td width="13%"></td>
    <td width="43%">'.strtoupper($row['attendant_address']).'</td>
    <td width="35%" align="center">'.strtoupper($row['reviewed_date']).'</td>
  </tr>
  <tr>
    <td width="42%"></td>
    <td width="21%">'.strtoupper($row['attendant_date']).'</td>
  </tr>
</table>';
$pdf->writeHTML($txt4);

$txt5 = '';
$txt5 .='
<table>
  <tr>
    <td width="30%"></td>
    <td width="35%" align="center">'.strtoupper($row['burial_permit_no']).'</td>
    <td width="35%" align="center">'.strtoupper($row['transfer_permit_no']).'</td>
  </tr>
  <tr>
    <td width="32%" align="center">'.strtoupper($row['corpse_disposal_type']).'</td>
    <td width="35%" align="center">'.strtoupper($row['burial_date_issued']).'</td>
    <td width="35%" align="center">'.strtoupper($row['transfer_date_issued']).'</td>
  </tr>
  <br>
  <tr>
   	<td width="10%"></td>
    <td width="90%">'.strtoupper($row['cemetery_name_address']).'</td>
  </tr>
</table>';
$pdf->writeHTML($txt5);

$pdf->Ln(15);
$pdf->Cell(28);
$txt6 = '
<table cellpadding="2">
  <tr>
    <td width="4%"></td>
    <td width="55%">'.strtoupper($row['informant_name']).'</td>
    <td width="50%">'.strtoupper($row['prepared_name']).'</td>
  </tr>
  <tr>
  	<td width="12%"></td>
    <td width="48%">'.strtoupper($row['rel_death']).'</td>
    <td width="50%">'.strtoupper($row['prepared_position']).'</td>
  </tr>
  <tr>
    <td width="55%">'.strtoupper($row['informant_address']).'</td>
    <td width="50%">'.strtoupper($row['prepared_date']).'</td>
  </tr>
  <tr>
    <td width="55%">'.strtoupper($row['informant_date']).'</td>
    <td width="50%"></td>
  </tr>
</table>
';
$pdf->writeHTML($txt6); 

$pdf->Ln(5);
$pdf->Cell(33);
$txt7 = '
<table cellpadding="2">
  <tr>
    <td width="56%">'.strtoupper($row['received_name']).'</td>
    <td width="50%">'.strtoupper($row['civil_name']).'</td>
  </tr>
  <tr>
    <td width="56%">'.strtoupper($row['received_position']).'</td>
    <td width="50%">'.strtoupper($row['civil_position']).'</td>
  </tr>
  <tr>
    <td width="55%">'.strtoupper($row['received_date']).'</td>
    <td width="50%">'.strtoupper($row['civil_date']).'</td>
  </tr>
</table>
';
$pdf->writeHTML($txt7); 

$pdf->SetFont('helvetica', '', '9');  
$pdf->Cell(13); 
$txt7a = '
<table>
  <tr>
    <td width="100%">'.strtoupper($remarks).'</td>
  </tr>
</table>
';
$pdf->writeHTML($txt7a); 

//================================================SECOND PAGE=================================//
$pdf->AddPage(); 

$pdf->Ln(13);
$pdf->Cell(6);
$txt8 = '
<table cellpadding="4">
  <tr>
    <td width="20%">'.strtoupper($row['mother_age']).'</td>
    <td width="40%">'.strtoupper($row['delivery_method']).'</td>
    <td width="40%">'.strtoupper($row['pregnancy_length']).'</td>
  </tr>
  <br>
  <tr>
  	<td width="3%"></td>
    <td width="50%">'.strtoupper($row['birth_type']).'</td>
    <td width="50%">'.strtoupper($row['if_multi_child_was']).'</td>
  </tr>
</table>';
$pdf->writeHTML($txt8); 

$pdf->Ln(2);
$pdf->Cell(60);
$pdf->Write(10,strtoupper($row['main_disease']));
$pdf->Ln(5);
$pdf->Cell(60);
$pdf->Write(10,strtoupper($row['other_disease']));
$pdf->Ln(5);
$pdf->Cell(78);
$pdf->Write(10,strtoupper($row['main_maternal_disease']));
$pdf->Ln(5);
$pdf->Cell(78);
$pdf->Write(10,strtoupper($row['other_maternal_disease']));
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->Write(10,strtoupper($row['other_relevant']));

$pdf->Ln(23);
$pdf->Cell(5);
$pdf->Write(10,strtoupper($row['autopsy_txt1']));
$pdf->Ln(5);
$pdf->Cell(5);
$pdf->Write(10,strtoupper($row['autopsy_txt2']));
$pdf->Ln(13);
$pdf->Cell(20);
$txt8a = '
<table cellpadding="2">
  <tr>
    <td width="58%"></td>
    <td width="50%">'.strtoupper($row['autopsy_title']).'</td>
  </tr>
  <tr>
    <td width="2%"></td>
    <td width="50%">'.strtoupper($row['autopsy_name']).'</td>
    <td width="50%">'.strtoupper($row['autopsy_address']).'</td>
  </tr>
  <tr>
    <td width="55%">'.strtoupper($row['autopsy_date']).'</td>
  </tr>
</table>
';
$pdf->writeHTML($txt8a); 

$pdf->Ln(3);
$pdf->Cell(80);
$pdf->Write(7,strtoupper($row['embalmer_txt']));
$pdf->Ln(16);
$pdf->Cell(20);
$txt8b = '
<table cellpadding="2">
  <tr>
    <td width="56%"></td>
    <td width="50%">'.strtoupper($row['embalmer_title']).'</td>
  </tr>
  <tr>
    <td width="2%"></td>
    <td width="50%">'.strtoupper($row['embalmer_name']).'</td>
    <td width="50%">'.strtoupper($row['embalmer_no']).'</td>
  </tr>
  <tr>
    <td width="49%">'.strtoupper($row['embalmer_address']).'</td>
    <td width="20%">'.strtoupper($row['embalmer_on']).'</td>
    <td width="40%">'.strtoupper($row['embalmer_at']).'</td>
  </tr>
  <tr>
    <td width="53%"></td>
    <td width="55%">'.strtoupper($row['embalmer_expdate']).'</td>
  </tr>
</table>
';
$pdf->writeHTML($txt8b); 
//$pdf->Ln(113);
$pdf->Ln(7);
$pdf->Cell(18);
$pdf->Write(10,strtoupper($row['late_name']));
$pdf->Ln(5);
$pdf->Cell(51);
$pdf->Write(10,strtoupper($row['late_address']));

$pdf->Ln(15);
$txt9 = '
  <table cellpadding="1">
    <tr>
      <td width="13%"></td>
      <td width="46%">'.strtoupper($row['death_name']).'</td>
      <td width="35%">'.strtoupper($row['died_on']).'</td>
    </tr>
    <tr>
      <td width="13%"></td>
      <td width="55%">'.strtoupper($row['died_in']).'</td>
    </tr>
    <tr>
      <td width="13%"></td>
      <td width="51%">'.strtoupper($row['buried_in']).'</td>
      <td width="30%">'.strtoupper($row['buried_on']).'</td>
    </tr>
  </table>';
$pdf->writeHTML($txt9);

if ($row['attended_type']=="attended") {
	$pdf->Cell(30);
	$pdf->Write(10,'X');
	$pdf->Cell(32);
	$pdf->Write(10,strtoupper($row['attended_by']));
	$pdf->Ln(9);
}else if ($row['attended_type']=="not attended") {
	$pdf->Ln(8);
	$pdf->Cell(30);
	$pdf->Write(10,'X');
  $pdf->Ln(1);
}
$pdf->Ln(9);
$pdf->Cell(90);
$pdf->Write(10,strtoupper($row['late_death_cause']));
$pdf->Ln(12);
$pdf->Cell(25);
$pdf->Write(10,strtoupper($row['late_reg_reason']));

$pdf->Ln(16);
$pdf->Cell(94);
$pdf->Write(10,strtoupper($row['sign_day']));
$pdf->Cell(25);
$pdf->Write(10,strtoupper($row['sign_month']));
$pdf->Cell(30);
$pdf->Write(10,strtoupper($row['sign_year']));
$pdf->Ln(5);
$pdf->Cell(7);
$pdf->Write(10,strtoupper($row['sign_at']));
$pdf->Ln(9);

$pdf->Cell(95);
$pdf->Write(10,strtoupper($row['affiant_name']));
$pdf->Ln(15);

$pdf->Cell(88);
$pdf->Write(10,strtoupper($row['sworn_day']));
$pdf->Cell(20);
$pdf->Write(10,strtoupper($row['sworn_month']));
$pdf->Cell(35);
$pdf->Write(10,strtoupper($row['sworn_year']));
$pdf->Ln(8);
$pdf->Cell(5);
$txt10 = '
  <table cellpadding="1">
    <tr>
      <td width="50%">'.strtoupper($row['sworn_at']).'</td>
    </tr>
    <tr>
      <td width="25%">'.strtoupper($row['ctc']).'</td>
      <td width="30%">'.strtoupper($row['issued_on']).'</td>
      <td width="55%">'.strtoupper($row['issued_at']).'</td>
    </tr>
  </table>';
$pdf->writeHTML($txt10);

$txt11 = '
  <table cellpadding="6">
    <tr>
      <td width="45%" align="center"></td>
      <td width="45%" align="center">'.strtoupper($row['administer_position']).'</td>
    </tr>
    <tr>
      <td width="45%" align="center">'.strtoupper($row['administer_name']).'</td>
      <td width="45%" align="center">'.strtoupper($row['administer_address']).'</td>
    </tr>
  </table>';
$pdf->writeHTML($txt11);

$pdf->Output();
   }
  }
 }
}

?>














