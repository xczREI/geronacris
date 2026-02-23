<?php
  if(isset($_POST['print'])){

  if(isset($_POST['reg_no']))
  {
    $date_now = $_POST['date_now'];
    $cerf_issued_of = $_POST['cerf_issued_of'];
    $city_registrar = $_POST['city_registrar'];
    $city_registrar_position = $_POST['city_registrar_position'];
    $registrar_officer = $_POST['registrar_officer'];
    $registrar_officer_position = $_POST['registrar_officer_position'];
    $amount_paid = $_POST['amount_paid'];
    $o_r_no = $_POST['o_r_no'];
    $date_paid = $_POST['date_paid'];
    $dpage = $_POST['dpage'];
    $dbook = $_POST['dbook'];

    $reg_date = $_POST['reg_date'];
    $name_death = $_POST['name_death'];
    $age = $_POST['age'];
    $civil_status = $_POST['civil_status'];
    $citizen = $_POST['citizen'];
    $date_death = $_POST['date_death'];
    $place_death = $_POST['place_death'];
    $death_cause = $_POST['death_cause'];
    $remarks = $_POST['remarks'];

    require_once 'login_db_death.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $sql = "SELECT * FROM registration_tbl NATURAL JOIN (person_tbl NATURAL JOIN death_cause_eight_days NATURAL JOIN att_rev_tbl NATURAL JOIN corpse_disposal_tbl NATURAL JOIN inf_pre_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN death_cause_zero_seven NATURAL JOIN late_reg_tbl) WHERE no = '".$_POST['reg_no']."'";
          $result = $conn->query($sql);  
    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 

// Instanciation of inherited class
require_once('../../tcpdf/tcpdf.php'); 

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle("Form No. 2A");  
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
$pdf->Cell(30 ,10,'Civil Registry Form No. 2A ',0,0);
$pdf->Ln(4);
$pdf->Cell(30 ,10,'(Death available)',0,0);
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
$pdf->Cell(30,10,'We certify that, among others, the following facts of death appear in our',0,0);
$pdf->Ln(5);
$pdf->Cell(30 ,10,'Register of Death on page',0,0);
$pdf->Cell(20);
$pdf->SetFont('','U',12);
$pdf->Write(10,'    '.strtoupper($dpage).'    ');
$pdf->SetFont('','',12);
$pdf->Cell(30,10,'of book number',0,0);
$pdf->SetFont('','U',12);
$pdf->Write(10,'    '.strtoupper($dbook).'    ');
$pdf->SetFont('','',12);
$pdf->Write(10,':');
$pdf->Ln(13);

$pdf->SetFont('','',12);
$content = ' ';
$content .='
  <table>
    <tr>
      <td width="7%"></td>
      <td width="40%">Registry Number</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($row['registry_no']).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Date of Registration</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($reg_date).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Name of Deceased</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($name_death).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Age</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($age).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Civil Status</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($civil_status).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Citizenship</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($citizen).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Date of Death</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($date_death).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Place of Death</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($place_death).'</td>
    </tr>
    <tr>
      <td width="7%"></td>
      <td width="40%">Cause of Death</td>
      <td width="2%">:</td>
      <td width="42%">'.strtoupper($death_cause).'</td>
    </tr>
  </table>
'; 
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
$pdf->Ln(15);
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
$pdf->Ln(15);
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
$pdf->Ln(11);
$pdf->SetFont('','',12);
$pdf->Cell(65);
//$pdf->Cell(30,10,'DOCUMENTARY STAMP TAX PAID',0,0,'C');

$pdf->Output();
   }
  }
 }
}

?>