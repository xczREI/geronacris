<?php
if(isset($_POST['print'])){

  if(isset($_POST['reg_no']))
  {
    $remarks = $_POST['remarks'];

    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $sql = "SELECT * FROM registration_tbl NATURAL JOIN (child_tbl NATURAL JOIN mother_tbl NATURAL JOIN father_tbl NATURAL JOIN att_inf_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN admission_paternity_tbl NATURAL JOIN late_reg_tbl) WHERE no = '".$_POST['reg_no']."'";
    $result = $conn->query($sql);  
    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
        $attendant = $row['attendant_type'];

// Instanciation of inherited class
require_once('../../tcpdf/tcpdf.php'); 

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle("Form No. 102");  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('helvetica');  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins(15, 10, 10);
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);  
$pdf->SetFont('helvetica', '', '9');  
$pdf->AddPage('P', 'LEGAL'); 

$pdf->Ln(25);
$pdf->Cell(22);
$pdf->Cell(0, 0,strtoupper($row['province']), 0, 1, '');
$pdf->Ln(2);
$pdf->Cell(37);
$pdf->Cell(0, 0,strtoupper($row['municipal']).'                                                                         
                         '.$row['registry_no'], 0, 1, '');
$pdf->Ln(7);
$pdf->Cell(20);
$txt = ' ';
$txt .='
<table>
  <tr>
    <td width="33%" align="center">'.strtoupper($row['child_fname']).'</td>
    <td width="33%" align="center">'.strtoupper($row['child_mname']).'</td>
    <td width="33%" align="center">'.strtoupper($row['child_lname']).'</td>
  </tr>
  <br>
  <tr>
    <td width="8%"></td>
    <td width="30%" align="center">'.strtoupper($row['child_sex']).'</td>
    <td width="73%" align="center">'.strtoupper(date_format(date_create($row['child_birth_date']),'d F Y')).'<br></td>
  </tr>
  <br>
  <tr>
      <td width="8%"></td>
      <td width="40%" align="center">'.strtoupper($row['birth_brgy']).'</td>
      <td width="32%" align="center">'.strtoupper($row['birth_municipal']).'</td>
      <td width="32%" align="center">'.strtoupper($row['birth_province']).'</td>
    </tr>
  <br><br>
    <tr>
      <td width="30%" align="center">'.strtoupper($row['birth_type']).'</td>
      <td width="30%" align="center">'.strtoupper($row['if_multi_birth_was']).'</td>
      <td width="30%" align="center">'.strtoupper($row['birth_order']).'</td>
      <td width="19%" align="center">'.strtoupper($row['birth_weight']).'</td>
    </tr>
    <br><br>
    <tr>
      <td width="10%"></td>
      <td width="34%" align="center">'.strtoupper($row['mother_fname']).'</td>
      <td width="34%" align="center">'.strtoupper($row['mother_mname']).'</td>
      <td width="34%" align="center">'.strtoupper($row['mother_lname']).'</td>
    </tr>
    <br>
    <tr>
      <td width="56%" align="center">'.strtoupper($row['mother_citizen']).'</td>
      <td width="56%" align="center">'.strtoupper($row['mother_religion']).'</td>
    </tr>
    <br><br><br>
    <tr>
      <td width="5%"></td>
      <td width="19%" align="center">'.strtoupper($row['ttl_no_child']).'</td>
      <td width="19%" align="center">'.strtoupper($row['no_child_alive']).'</td>
      <td width="19%" align="center">'.strtoupper($row['no_child_dead']).'</td>
      <td width="35%" align="center">'.strtoupper($row['mother_occupation']).'</td>
      <td width="15%" align="center">'.strtoupper($row['mother_age']).'</td>
    </tr>
    <br>
    <tr>
      <td width="10%"></td>
      <td width="34%" align="center">'.strtoupper($row['mother_brgy']).'</td>
      <td width="25%" align="center">'.strtoupper($row['mother_municipal']).'</td>
      <td width="25%" align="center">'.strtoupper($row['mother_province']).'</td>
      <td width="19%" align="center">'.strtoupper($row['mother_country']).'</td>
    </tr>
    <br><br>
    <tr>
      <td width="10%"></td>
      <td width="34%" align="center">'.strtoupper($row['father_fname']).'</td>
      <td width="34%" align="center">'.strtoupper($row['father_mname']).'</td>
      <td width="34%" align="center">'.strtoupper($row['father_lname']).'</td>
    </tr>
    <br><br>
    <tr>
      <td width="30%" align="center">'.strtoupper($row['father_citizen']).'</td>
      <td width="30%" align="center">'.strtoupper($row['father_religion']).'</td>
      <td width="30%" align="center">'.strtoupper($row['father_occupation']).'</td>
      <td width="19%" align="center">'.strtoupper($row['father_age']).'</td>
    </tr>
    <br><br>
    <tr>
      <td width="10%"></td>
      <td width="34%" align="center">'.strtoupper($row['father_brgy']).'</td>
      <td width="25%" align="center">'.strtoupper($row['father_municipal']).'</td>
      <td width="25%" align="center">'.strtoupper($row['father_province']).'</td>
      <td width="19%" align="center">'.strtoupper($row['father_country']).'</td>
    </tr>
    <br><br><br>
    <tr>
      <td width="10%"></td>
      <td width="34%" align="center">'.strtoupper($row['marriage_date']).'</td>
      <td width="69%" align="center">'.strtoupper($row['marriage_place']).'</td>
    </tr>
</table>';

$pdf->writeHTML($txt); 

if($attendant == 'Physician'){
  $pdf->Ln(1);
  $pdf->Cell(7);
  $pdf->Write(10,'  X  ');
}else if($attendant == 'Nurse'){
  $pdf->Ln(1);
  $pdf->Cell(35);
  $pdf->Write(10,'  X  ');
}else if($attendant == 'Midwife'){
  $pdf->Ln(1);
  $pdf->Cell(58);
  $pdf->Write(10,'  X  ');
}else if($attendant == 'Hilot'){
  $pdf->Ln(1);
  $pdf->Cell(83);
  $pdf->Write(10,'  X  ');
}else{
  $pdf->Ln(1);
  $pdf->Cell(135);
  $pdf->Write(10,'  X  ');
  $pdf->Cell(25);
  $pdf->Write(10,strtoupper($row['attendant_type']));
}
$pdf->Ln(10);
if($row['birth_time'] <= 11){
$pdf->Cell(114);
$pdf->Write(10,strtoupper(date_format(date_create($row['birth_time']),'h:i').' AM'));
}else if($row['birth_time'] >= 12){
$pdf->Cell(114);
$pdf->Write(10,strtoupper(date_format(date_create($row['birth_time']),'h:i').' PM'));
}

$pdf->Ln(10);
$pdf->Cell(29);
$txt1 = '';
$txt1 = '
<table cellpadding="3">
  <tr>
    <td width="52%" align="center"></td>
    <td width="50%">'.strtoupper($row['attendant_address']).'</td>
  </tr>
  <tr>
    <td width="50%">'.strtoupper($row['attendant_name']).'</td>
  </tr>
  <tr>
    <td width="50%">'.strtoupper($row['attendant_position']).'</td>
    <td width="50%">'.strtoupper($row['attendant_date']).'</td>
  </tr>
<table>
';
$pdf->writeHTML($txt1); 

$pdf->Ln(11);
$pdf->Cell(28);
$txt2 = '
<table cellpadding="3">
  <tr>
    <td width="57%">'.strtoupper($row['informant_name']).'</td>
    <td width="50%">'.strtoupper($row['prepared_name']).'</td>
  </tr>
  <tr>
    <td width="7%"></td>
    <td width="55%">'.strtoupper($row['rel_child']).'</td>
    <td width="50%">'.strtoupper($row['prepared_position']).'</td>
  </tr>
  <tr>
    <td width="53%">'.strtoupper($row['informant_address']).'</td>
    <td width="50%">'.strtoupper($row['prepared_date']).'</td>
  </tr>
  <tr>
    <td width="53%">'.strtoupper($row['informant_date']).'</td>
    <td width="50%"></td>
  </tr>
</table>
';
$pdf->writeHTML($txt2); 

$pdf->Ln(3);
$pdf->Cell(30);
$txt3 = '
<table cellpadding="3">
  <tr>
    <td width="58%">'.strtoupper($row['received_name']).'</td>
    <td width="50%">'.strtoupper($row['civil_name']).'</td>
  </tr>
  <tr>
    <td width="58%">'.strtoupper($row['received_position']).'</td>
    <td width="50%">'.strtoupper($row['civil_position']).'</td>
  </tr>
  <tr>
    <td width="55%">'.strtoupper($row['received_date']).'</td>
    <td width="50%">'.strtoupper($row['civil_date']).'</td>
  </tr>
</table>
';
$pdf->writeHTML($txt3); 

$pdf->SetFont('helvetica', '', '9');  
$pdf->Cell(10); 
$txt3a = '
<table>
  <tr>
    <td width="100%">'.strtoupper($remarks).'</td>
  </tr>
</table>
';
$pdf->writeHTML($txt3a); 

$pdf->AddPage(); 

//==================================SECOND PAGE===========================================//
$pdf->Ln(11);
$pdf->Cell(20);
$txt4 = '
<table cellpadding="1">
  <tr>
    <td width="50%">'.strtoupper($row['father_name']).'</td>
    <td width="50%">'.strtoupper($row['mother_name']).'</td>
  </tr>
  <tr>
    <td width="37%"></td>
    <td width="50%">'.strtoupper($row['child_name']).'</td>
  </tr>
  <tr>
    <td width="30%">'.strtoupper($row['birth_date']).'</td>
    <td width="50%">'.strtoupper($row['birth_place']).'</td>
  </tr>
</table>';
$pdf->writeHTML($txt4); 

$pdf->Ln(13);
$txt4 = '
<table cellpadding="1">
  <tr>
    <td width="50%" align="center">'.strtoupper($row['father_name']).'</td>
    <td width="50%" align="center">'.strtoupper($row['mother_name']).'</td>
  </tr>
</table>';
$pdf->writeHTML($txt4);

$pdf->Ln(3);
$pdf->Cell(85);
$pdf->Write(10,strtoupper($row['sworn_day']));
$pdf->Cell(20);
$pdf->Write(10,strtoupper($row['sworn_month']));
$pdf->Cell(43);
$pdf->Write(10,strtoupper($row['sworn_year']));

$pdf->Ln(9);
$txt5 = '
<table cellpadding="1">
  <tr>
    <td width="38%">'.strtoupper($row['father_name']).'</td>
    <td width="50%">'.strtoupper($row['mother_name']).'</td>
  </tr>
  <tr>
    <td width="10%"></td>
    <td width="50%">'.strtoupper($row['ctc']).'</td>
    <td width="35%">'.strtoupper($row['issued_on']).'</td>
  </tr>
  <tr>
    <td width="55%">'.strtoupper($row['issued_at']).'</td>
    <td width="40%"></td>
  </tr>
</table>';
$pdf->writeHTML($txt5);

$pdf->Ln(9);
$txt6 = '
<table cellpadding="5">
  <tr>
    <td width="45%" align="center"></td>
    <td width="45%" align="center">'.strtoupper($row['administer_position']).'</td>
  </tr>
  <tr>
    <td width="45%" align="center">'.strtoupper($row['administer_name']).'</td>
    <td width="45%" align="center">'.strtoupper($row['administer_address']).'</td>
  </tr>
</table>';
$pdf->writeHTML($txt6);

$pdf->Ln(8);
$pdf->Cell(18);
$pdf->Write(10,strtoupper($row['late_name']));
$pdf->Ln(7);
$pdf->Cell(48);
$pdf->Write(10,strtoupper($row['late_address']));

//=========================================MY BIRTH========================================/
if($row['late_birth_type'] == 'my birth'){
  $pdf->Ln(19);
  $pdf->Cell(16);
  $pdf->Write(10,' X ');
  $pdf->Ln(3);
  $pdf->Cell(45);
  $txt7 = '
  <table cellpadding="1">
    <tr>
      <td width="57%">'.strtoupper($row['late_birth_in']).'</td>
      <td width="50%">'.strtoupper($row['late_birth_on']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt7);
  $pdf->Ln(9);
  $pdf->Cell(77);
  $pdf->Write(10,strtoupper($row['attend_birth_by']));
  $pdf->Ln(4);
  $pdf->Cell(21);
  $pdf->Write(10,strtoupper($row['who_resides_at']));
  $pdf->Ln(8);
  $pdf->Cell(67);
  $pdf->Write(10,strtoupper($row['late_citizen']));
  $pdf->Ln(7);
  $pdf->Ln(3);

//===============================================MY BIRTH - MARRIED===========================//
  if($row['married_type'] == 'married'){
    $pdf->Cell(20);
    $txt7 = '
    <table cellpadding="2">
      <tr>
        <td width="26%"></td>
        <td width="16%">X</td>
        <td width="57%">'.strtoupper($row['married_on']).'</td>
      </tr>
      <tr>
        <td width="30%"></td>
        <td width="57%">'.strtoupper($row['married_at']).'</td>
      </tr>
      <tr>
        <td width="22%"></td>
        <td width="20%"></td>
      </tr>
    </table>
    <table cellpadding="5">
      <tr>
        <td width="55%"></td>
        <td width="50%">'.strtoupper($row['not_married_name']).'</td>
      </tr>
      <br>
      <tr>
        <td width="10%"></td>
        <td width="90%">'.strtoupper($row['late_reg_reason']).'</td>
      </tr>
      <tr>
        <td width="50%"></td>
        <td width="50%">'.strtoupper($row['applicant_only']).'</td>
      </tr>
      <tr>
        <td width="65%"></td>
        <td width="50%">'.strtoupper($row['applicant_than_owner']).'</td>
      </tr>
    </table>';
    $pdf->writeHTML($txt7);

  $pdf->Ln(8);
  $pdf->Cell(93);
  $pdf->Write(10,strtoupper($row['sign_day']));
  $pdf->Cell(18);
  $pdf->Write(10,strtoupper($row['sign_month']));
  $pdf->Cell(30);
  $pdf->Write(10,strtoupper($row['sign_year']));
  $pdf->Ln(7);
  $txt14 = '
  <table cellpadding="1">
    <tr>
      <td width="42%"></td>
      <td width="50%">'.strtoupper($row['sign_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt14);

  $pdf->Cell(95);
  $pdf->Write(10,strtoupper($row['affiant_name']));
  $pdf->Ln(17);

  $pdf->Cell(87);
  $pdf->Write(10,strtoupper($row['late_sworn_day']));
  $pdf->Cell(20);
  $pdf->Write(10,strtoupper($row['late_sworn_month']));
  $pdf->Cell(38);
  $pdf->Write(10,strtoupper($row['late_sworn_year']));
  $pdf->Ln(7);
  $pdf->Cell(2);
  $txt15 = '
  <table cellpadding="1">
    <tr>
      <td width="50%">'.strtoupper($row['late_sworn_at']).'</td>
    </tr>
    <tr>
      <td width="25%">'.strtoupper($row['late_ctc']).'</td>
      <td width="30%">'.strtoupper($row['late_issued_on']).'</td>
      <td width="55%">'.strtoupper($row['late_issued_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt15);
  $pdf->Ln(1);
  $txt16 = '
  <table cellpadding="1">
    <tr>
      <td width="45%" align="center"></td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_position']).'</td>
    </tr>
    <br>
    <tr>
      <td width="45%" align="center">'.strtoupper($row['late_administer_name']).'</td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_address']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt16);

//=====================================MY BIRTH - NO MARRIED=======================================//
  }else if($row['married_type'] == 'not married'){
    $pdf->Cell(20);
    $pdf->Ln(12);
    $txt7 = '
    <table cellpadding="2">
      <tr>
        <td width="34%"></td>
        <td width="20%">X</td>
        <td width="30%"></td>
      </tr>
      <tr>
        <td width="60%"></td>
        <td width="40%">'.strtoupper($row['not_married_name']).'</td>
      </tr>
    </table>';
    $pdf->writeHTML($txt7);

    $txt7a = '
    <table cellpadding="5">
      <tr>
        <td width="10%"></td>
        <td width="90%">'.strtoupper($row['late_reg_reason']).'</td>
      </tr>
      <tr>
        <td width="45%"></td>
        <td width="50%">'.strtoupper($row['applicant_only']).'</td>
      </tr>
      <tr>
        <td width="65%"></td>
        <td width="50%">'.strtoupper($row['applicant_than_owner']).'</td>
      </tr>
    </table>';
    $pdf->writeHTML($txt7a);   

  $pdf->Ln(8);
  $pdf->Cell(93);
  $pdf->Write(10,strtoupper($row['sign_day']));
  $pdf->Cell(18);
  $pdf->Write(10,strtoupper($row['sign_month']));
  $pdf->Cell(30);
  $pdf->Write(10,strtoupper($row['sign_year']));
  $pdf->Ln(7);
  $txt14 = '
  <table cellpadding="1">
    <tr>
      <td width="42%"></td>
      <td width="50%">'.strtoupper($row['sign_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt14);

  $pdf->Cell(95);
  $pdf->Write(10,strtoupper($row['affiant_name']));
  $pdf->Ln(16);

  $pdf->Cell(87);
  $pdf->Write(10,strtoupper($row['late_sworn_day']));
  $pdf->Cell(20);
  $pdf->Write(10,strtoupper($row['late_sworn_month']));
  $pdf->Cell(38);
  $pdf->Write(10,strtoupper($row['late_sworn_year']));
  $pdf->Ln(7);
  $pdf->Cell(2);
  $txt15 = '
  <table cellpadding="1">
    <tr>
      <td width="50%">'.strtoupper($row['late_sworn_at']).'</td>
    </tr>
    <tr>
      <td width="25%">'.strtoupper($row['late_ctc']).'</td>
      <td width="30%">'.strtoupper($row['late_issued_on']).'</td>
      <td width="55%">'.strtoupper($row['late_issued_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt15);
  $pdf->Ln(1);
  $txt16 = '
  <table cellpadding="1">
    <tr>
      <td width="45%" align="center"></td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_position']).'</td>
    </tr>
    <br>
    <tr>
      <td width="45%" align="center">'.strtoupper($row['late_administer_name']).'</td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_address']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt16); 
  }

//================================================THE BIRTH===============================================//
}else if($row['late_birth_type'] == 'the birth'){
  $pdf->Ln(27);
  $pdf->Cell(16);
  $pdf->Write(10,' X ');
  $pdf->Ln(3);
  $txt7 = '
  <table cellpadding="1">
    <tr>
      <td width="26%"></td>
      <td width="45%">'.strtoupper($row['late_birth_of']).'</td>
      <td width="30%">'.strtoupper($row['late_birth_in']).'</td>
    </tr>
    <tr>
      <td width="45%"></td>
      <td width="50%">'.strtoupper($row['late_birth_on']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt7);

  $txt7a = '
  <table>
    <tr>
      <td width="40%"></td>
      <td width="61%">'.strtoupper($row['attend_birth_by']).'</td>
    </tr>
    <tr>
      <td width="10%"></td>
      <td width="70%">'.strtoupper($row['who_resides_at']).'<br></td>
    </tr>
     <tr>
      <td width="40%"></td>
      <td width="61%">'.strtoupper($row['late_citizen']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt7a);

//============================================THE BIRTH - MARRIED=============================//  
  if($row['married_type'] == 'married'){
    $pdf->Cell(20);
    $txt7 = '
    <table>
      <tr>
        <td width="27%"></td>
        <td width="16%">X</td>
        <td width="57%">'.strtoupper($row['married_on']).'</td>
      </tr>
      <tr>
        <td width="30%"></td>
        <td width="57%">'.strtoupper($row['married_at']).'</td>
      </tr>
      <tr>
        <td width="22%"></td>
        <td width="20%"></td>
      </tr>
    </table>
    <table cellpadding="7">
      <tr>
        <td width="55%"></td>
        <td width="50%">'.strtoupper($row['not_married_name']).'</td>
      </tr>
      <br>
      <tr>
        <td width="10%"></td>
        <td width="90%">'.strtoupper($row['late_reg_reason']).'</td>
      </tr>
      <tr>
        <td width="50%"></td>
        <td width="50%">'.strtoupper($row['applicant_only']).'</td>
      </tr>
      <tr>
        <td width="65%"></td>
        <td width="50%">'.strtoupper($row['applicant_than_owner']).'</td>
      </tr>
    </table>';
    $pdf->writeHTML($txt7);

  $pdf->Ln(3);
  $pdf->Cell(93);
  $pdf->Write(10,strtoupper($row['sign_day']));
  $pdf->Cell(18);
  $pdf->Write(10,strtoupper($row['sign_month']));
  $pdf->Cell(30);
  $pdf->Write(10,strtoupper($row['sign_year']));
  $pdf->Ln(7);
  $txt14 = '
  <table cellpadding="1">
    <tr>
      <td width="44%"></td>
      <td width="50%">'.strtoupper($row['sign_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt14);

  $pdf->Cell(98);
  $pdf->Write(10,strtoupper($row['affiant_name']));
  $pdf->Ln(17);

  $pdf->Cell(87);
  $pdf->Write(10,strtoupper($row['late_sworn_day']));
  $pdf->Cell(20);
  $pdf->Write(10,strtoupper($row['late_sworn_month']));
  $pdf->Cell(38);
  $pdf->Write(10,strtoupper($row['late_sworn_year']));
  $pdf->Ln(7);
  $pdf->Cell(2);
  $txt15 = '
  <table cellpadding="1">
    <tr>
      <td width="50%">'.strtoupper($row['late_sworn_at']).'</td>
    </tr>
    <tr>
      <td width="25%">'.strtoupper($row['late_ctc']).'</td>
      <td width="30%">'.strtoupper($row['late_issued_on']).'</td>
      <td width="55%">'.strtoupper($row['late_issued_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt15);
  $pdf->Ln(1);
  $txt16 = '
  <table cellpadding="1">
    <tr>
      <td width="45%" align="center"></td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_position']).'</td>
    </tr>
    <br>
    <tr>
      <td width="45%" align="center">'.strtoupper($row['late_administer_name']).'</td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_address']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt16);

//=============================================THE BIRTH - NOT MARRIED======================//
  }else if($row['married_type'] == 'not married'){
    $pdf->Cell(20);
    $pdf->Ln(10);
    $txt7 = '
    <table cellpadding="2">
      <tr>
        <td width="35%"></td>
        <td width="20%">X</td>
        <td width="30%"></td>
      </tr>
      <tr>
        <td width="60%"></td>
        <td width="40%">'.strtoupper($row['not_married_name']).'</td>
      </tr>
    </table>';
    $pdf->writeHTML($txt7);

    $txt7a = '
    <table cellpadding="5">
      <tr>
        <td width="10%"></td>
        <td width="90%">'.strtoupper($row['late_reg_reason']).'</td>
      </tr>
      <tr>
        <td width="45%"></td>
        <td width="50%">'.strtoupper($row['applicant_only']).'</td>
      </tr>
      <tr>
        <td width="55%"></td>
        <td width="50%">'.strtoupper($row['applicant_than_owner']).'</td>
      </tr>
    </table>';
    $pdf->writeHTML($txt7a);

  $pdf->Ln(8);
  $pdf->Cell(93);
  $pdf->Write(10,strtoupper($row['sign_day']));
  $pdf->Cell(18);
  $pdf->Write(10,strtoupper($row['sign_month']));
  $pdf->Cell(30);
  $pdf->Write(10,strtoupper($row['sign_year']));
  $pdf->Ln(7);
  $txt14 = '
  <table cellpadding="1">
    <tr>
      <td width="42%"></td>
      <td width="50%">'.strtoupper($row['sign_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt14);

  $pdf->Cell(95);
  $pdf->Write(10,strtoupper($row['affiant_name']));
  $pdf->Ln(17);

  $pdf->Cell(87);
  $pdf->Write(10,strtoupper($row['late_sworn_day']));
  $pdf->Cell(20);
  $pdf->Write(10,strtoupper($row['late_sworn_month']));
  $pdf->Cell(38);
  $pdf->Write(10,strtoupper($row['late_sworn_year']));
  $pdf->Ln(7);
  $pdf->Cell(2);
  $txt15 = '
  <table cellpadding="1">
    <tr>
      <td width="50%">'.strtoupper($row['late_sworn_at']).'</td>
    </tr>
    <tr>
      <td width="25%">'.strtoupper($row['late_ctc']).'</td>
      <td width="30%">'.strtoupper($row['late_issued_on']).'</td>
      <td width="55%">'.strtoupper($row['late_issued_at']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt15);
  $pdf->Ln(1);
  $txt16 = '
  <table cellpadding="1">
    <tr>
      <td width="45%" align="center"></td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_position']).'</td>
    </tr>
    <br>
    <tr>
      <td width="45%" align="center">'.strtoupper($row['late_administer_name']).'</td>
      <td width="45%" align="center">'.strtoupper($row['late_administer_address']).'</td>
    </tr>
  </table>';
  $pdf->writeHTML($txt16);
  }

}else{
  $pdf->Ln(50);
}

 
$pdf->Output();
   }
  }
 }
}

?>














