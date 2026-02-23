<?php

  if(isset($_POST['print'])){

  if(isset($_POST['reg_no']))
  {
    $date_now = $_POST['date_now'];
    $cerf_issued_of = $_POST['cerf_issued_of'];
    $city_registrar_position = $_POST['city_registrar_position'];
    $registrar_officer = $_POST['registrar_officer'];
    $registrar_officer_position = $_POST['registrar_officer_position'];;
    $amount_paid = $_POST['amount_paid'];
    $o_r_no = $_POST['o_r_no'];
    $date_paid = $_POST['date_paid'];
    $mpage = $_POST['mpage'];
    $mbook = $_POST['mbook'];

    $reg_date = $_POST['reg_date'];
    $husband_name = $_POST['husband_name'];
    $husband_age = $_POST['husband_age'];
    $husband_citizen = $_POST['husband_citizen'];
    $husband_civil_status = $_POST['husband_civil_status'];
    $husband_father_name = $_POST['husband_father_name'];
    $husband_mother_name = $_POST['husband_mother_name'];
    $wife_name = $_POST['wife_name'];
    $wife_age = $_POST['wife_age'];
    $wife_citizen = $_POST['wife_citizen'];
    $wife_civil_status = $_POST['wife_civil_status'];
    $wife_father_name = $_POST['wife_father_name'];
    $wife_mother_name = $_POST['wife_mother_name'];
    $mrg_date = $_POST['mrg_date'];
    $mrg_place = $_POST['mrg_place'];
    $remarks = $_POST['remarks'];
    

  require_once 'login_db_mrg.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);

  $sql = "SELECT * FROM registration_tbl NATURAL JOIN (husband_tbl NATURAL JOIN wife_tbl NATURAL JOIN marriage_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN witness_tbl NATURAL JOIN late_reg_tbl) WHERE no = '".$_POST['reg_no']."'";
          $result = $conn->query($sql);  
    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 

// Instanciation of inherited class
require_once('../../tcpdf/tcpdf.php'); 

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle("Form No. 3A");  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('helvetica');  
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins(20, 15, 20);
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->SetFont('helvetica', '', '12');  
$pdf->AddPage('P', 'LEGAL'); 

$pdf->SetFont('','',9);
$pdf->Cell(30 ,10,'Civil Registry Form No. 3A ',0,0);
$pdf->Ln(4);
$pdf->Cell(30 ,10,'(Marriage-available)',0,0);
$pdf->Image('../../images/OIP.jpeg',150,25,30);
$pdf->SetFont('','',12);
$pdf->Ln(12);
$pdf->Cell(65);
$pdf->Cell(30,10,'Republic of the Philippines',0,0,'C');
$pdf->SetFont('','B',12);
$pdf->Ln(6);
$pdf->Cell(65);
$pdf->Cell(30,10,'OFFICE OF THE CIVIL REGISTRAR',0,0,'C');
$pdf->SetFont('','',12);
$pdf->Ln(6);
$pdf->Cell(65);
$pdf->Cell(30,10,'GERONA, TARLAC',0,0,'C');
$pdf->Ln(15);
$pdf->Cell(115);
if(!empty($_POST['date_now'])){
  $pdf->SetFont('','U',12);
  $pdf->Cell(30,10,'   '.strtoupper($_POST['date_now']).'   ',0,0,'C');
}else{
  $pdf->SetFont('','',12);
  $pdf->Cell(30,10,'_______________',0,0,'C');
}

$pdf->Ln(5);
$pdf->Cell(115);
$pdf->SetFont('');
$pdf->Cell(30,10,'Date',0,0,'C');
$pdf->Ln(10);
$pdf->Cell(30,10,'TO WHOM IT MAY CONCERN:',0,0);
$pdf->Ln(10);
$pdf->Cell(11);
$pdf->Cell(30,10,'We certify that, among others, the following facts of marriages appear in our',0,0);
$pdf->Ln(5);
$pdf->Cell(30 ,10,'Register of Marriages on page',0,0);
$pdf->Cell(27);
$pdf->SetFont('','U',12);
$pdf->Write(10,'    '.strtoupper($mpage).'    ');
$pdf->SetFont('','',12);
$pdf->Cell(30,10,'of book number',0,0);
$pdf->SetFont('','U',12);
$pdf->Write(10,'    '.strtoupper($mbook).'    ');
$pdf->SetFont('','',12);
$pdf->Write(10,':');
$pdf->Ln(13);

$rawHusbandFatherName = $husband_father_name;
$husbandFatherName = explode(',', $rawHusbandFatherName);
$husbandFatherFirstName = $husbandFatherName[0];
$husbandFatherLastName = end($husbandFatherName);
if (count($husbandFatherName) > 2) {
  $husbandFatherMiddleName = strtoupper($husbandFatherName[1]);
}
$rawHusbandMotherName = $husband_mother_name;
$husbandMotherName = explode(',', $rawHusbandMotherName);
$husbandMotherFirstName = $husbandMotherName[0];
$husbandMotherLastName = end($husbandMotherName);
if (count($husbandMotherName) > 2) {
  $husbandMotherMiddleName = strtoupper($husbandMotherName[1]);
}
$rawWifeFatherName = $wife_father_name;
$wifeFatherName = explode(',', $rawWifeFatherName);
$wifeFatherFirstName = $wifeFatherName[0];
$wifeFatherLastName = end($wifeFatherName);
if (count($wifeFatherName) > 2) {
  $wifeFatherMiddleName = strtoupper($wifeFatherName[1]);
}
$rawWifeMotherName = $wife_mother_name;
$wifeMotherName = explode(',', $rawWifeMotherName);
$wifeMotherFirstName = $wifeMotherName[0];
$wifeMotherLastName = end($wifeMotherName);
if (count($wifeMotherName) > 2) {
  $wifeMotherMiddleName = strtoupper($wifeMotherName[1]);
}
$contents = ' ';
$contents .='
  <table>
    <tr>
      <td width="3%"></td>
      <td width="15%"></td>
      <td width="2%"></td>
      <td width="38%">'.'<u>'.'HUSBAND'.'</u>'.'</td>
      <td width="38%">'.'<u>'.'WIFE'.'</u>'.'</td>
    </tr><br>
    <tr>
      <td width="3%"></td>
      <td width="15%">Name</td>
      <td width="2%">:</td>
      <td width="38%">'.strtoupper($husband_name).'</td>
      <td width="38%">'.strtoupper($wife_name).'</td>
    </tr>
    <tr>
      <td width="3%"></td>
      <td width="15%">Age</td>
      <td width="2%">:</td>
      <td width="38%">'.strtoupper($husband_age).'</td>
      <td width="38%">'.strtoupper($wife_age).'</td>
    </tr>
    <tr>
      <td width="3%"></td>
      <td width="15%">Citizenship</td>
      <td width="2%">:</td>
      <td width="38%">'.strtoupper($husband_citizen).'</td>
      <td width="38%">'.strtoupper($wife_citizen).'</td>
    </tr>
    <tr>
      <td width="3%"></td>
      <td width="15%">Civil Status</td>
      <td width="2%">:</td>
      <td width="38%">'.strtoupper($husband_civil_status).'</td>
      <td width="38%">'.strtoupper($wife_civil_status).'</td>
    </tr>
    <tr>
      <td width="3%"></td>
      <td width="15%">Father</td>
      <td width="2%">:</td>
      <td width="38%">'.strtoupper($husbandFatherFirstName).' '.strtoupper($husbandFatherMiddleName).' '.strtoupper($husbandFatherLastName).'</td>
      <td width="38%">'.strtoupper($wifeFatherFirstName).' '.strtoupper($wifeFatherMiddleName).' '.strtoupper($wifeFatherLastName).'</td>
    </tr>
    <tr>
      <td width="3%"></td>
      <td width="15%">Mother</td>
      <td width="2%">:</td>
      <td width="38%">'.strtoupper($husbandMotherFirstName).' '.strtoupper($husbandMotherMiddleName).' '.strtoupper($husbandMotherLastName).'</td>
      <td width="38%">'.strtoupper($wifeMotherFirstName).' '.strtoupper($wifeMotherMiddleName).' '.strtoupper($wifeMotherLastName).'</td>
    </tr>
  </table>';
$pdf->writeHTML($contents);

$content = ' ';
$content .='
  <table>
    <tr>
      <td width="7%"></td>
      <td width="25%">Registry Number<br>Date of Registration<br>Date of Marriage<br>Place of Marriage<br>
      </td>
      <td width="2%">:<br>:<br>:<br>:<br></td>
      <td width="52%">'.strtoupper($row['registry_no']).'<br>'.strtoupper($reg_date).'<br>'.strtoupper($mrg_date).'<br>'.strtoupper($mrg_place).'<br></td>
    </tr>
  </table>';
$pdf->writeHTML($content);

$contenta ='
  <table>
    <tr>
      <td width="7%"></td>
      <td width="12%">Remarks : </td>
      <td width="74%">'.strtoupper($remarks).'<br></td>
    </tr>
  </table>
  ';
$pdf->writeHTML($contenta);

$pdf->Cell(11);
$pdf->Cell(30,5,'This certification is issued to',0,0);
$pdf->Cell(25);
if(!empty($_POST['cerf_issued_of'])){
  $pdf->SetFont('','U',12);
  $pdf->Write(5,'     '.strtoupper($_POST['cerf_issued_of']).'     ');
}else{
  $pdf->SetFont('','',12);
  $pdf->Write(5,'_______________________');
}
$pdf->SetFont('','',12);
$pdf->Write(5,'upon his/her request.');
$pdf->Ln(15);
$pdf->Cell(115);

if(!empty($_POST['city_registrar'])){
  $pdf->SetFont('','U',12);
  $pdf->Cell(30,10,'    '.strtoupper($_POST['city_registrar']).'    ',0,0,'C');
}else{
  $pdf->SetFont('','',12);
  $pdf->Cell(30,10,'_______________________',0,0,'C');
}
$pdf->SetFont('','',10);
$pdf->Ln(5);
$pdf->Cell(115);
$pdf->Cell(30,10,strtoupper($city_registrar_position),0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('','',12);
$pdf->Cell(30,10,'Verified by:',0,0);
if(!empty($_POST['registrar_officer'])){
  $pdf->SetFont('','U',12);
  $pdf->Write(10,'    '.strtoupper($_POST['registrar_officer']).'    ');
}else{
  $pdf->SetFont('','',12);
  $pdf->Write(10,'_______________________');
}
$pdf->SetFont('','',10);
$pdf->Ln(5);
$pdf->Cell(35);
$pdf->Cell(30,10,strtoupper($registrar_officer_position),0,0,'C');
$pdf->Ln(10);
$pdf->SetFont('','',12);
$pdf->Cell(30,10,'Amount Paid',0,0);
$pdf->Write(10,' : ');
if(!empty($_POST['amount_paid'])){
  $pdf->SetFont('','U',12);
  $pdf->Write(10,'    '.strtoupper($_POST['amount_paid']).'    ');
}else{
  $pdf->SetFont('','',12);
  $pdf->Write(10,'_________________');
}
$pdf->Ln(6);
$pdf->SetFont('','',12);
$pdf->Cell(30,10,'O.R. Number',0,0);
$pdf->Write(10,' : ');
if(!empty($_POST['o_r_no'])){
  $pdf->SetFont('','U',12);
  $pdf->Write(10,'    '.strtoupper($_POST['o_r_no']).'    ');
}else{
  $pdf->SetFont('','',12);
  $pdf->Write(10,'_________________');
}
$pdf->Ln(6);
$pdf->SetFont('','',12);
$pdf->Cell(30,10,'Date Paid',0,0);
$pdf->Write(10,' : ');
if(!empty($_POST['date_paid'])){
  $pdf->SetFont('','U',12);
  $pdf->Write(10,'    '.strtoupper($_POST['date_paid']).'    ');
}else{
  $pdf->SetFont('','',12);
  $pdf->Write(10,'_________________');
}
$pdf->Ln(11);
$pdf->SetFont('','',12);
$pdf->Write(10,'Note: A mark, erasure or alteration of any entry invalidates this Certification.');
$pdf->Ln(8);
$pdf->SetFont('','',9);
$pdf->Cell(65);
//$pdf->Cell(30,10,'DOCUMENTARY STAMP TAX PAID',0,0,'C');

$pdf->Output();
   }
  }
 }
}

?>