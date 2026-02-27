<?php
if(isset($_POST['print'])){

  if(isset($_POST['reg_no']))
  {
    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $reg_no = $conn->real_escape_string($_POST['reg_no']);

    // ADDED LIMIT 1 HERE
    $sql = "SELECT * FROM registration_tbl NATURAL JOIN (child_tbl NATURAL JOIN mother_tbl NATURAL JOIN father_tbl NATURAL JOIN att_inf_tbl NATURAL JOIN receive_civil_tbl NATURAL JOIN remarks_tbl NATURAL JOIN admission_paternity_tbl NATURAL JOIN late_reg_tbl) WHERE no = '$reg_no' LIMIT 1";
    $result = $conn->query($sql);  
    if (!$result) die ("Database access failed: " . $conn->error);

    if ($result->num_rows > 0) {
       // REMOVED WHILE LOOP HERE
       $row = $result->fetch_assoc(); 

        // 1. Get dynamic inputs from the print modal
        $date_now = $_POST['date_now'] ?? '';
        $cerf_issued_of = $_POST['cerf_issued_of'] ?? '';
        $city_registrar = $_POST['city_registrar'] ?? '';
        $city_registrar_position = $_POST['city_registrar_position'] ?? '';
        $registrar_officer = $_POST['registrar_officer'] ?? '';
        $registrar_officer_position = $_POST['registrar_officer_position'] ?? '';
        $amount_paid = $_POST['amount_paid'] ?? '';
        $o_r_no = $_POST['o_r_no'] ?? '';
        $date_paid = $_POST['date_paid'] ?? '';

        // 2. SECURE FIX: Pull Certificate details directly from the Database Row
        $registry_no = $row['registry_no'] ?? '';
        $birthpage = $row['page_no'] ?? '';
        $birthbook = $row['book_no'] ?? '';

        // Safely format the Registration Date (Fixes the -0001 bug)
        $raw_reg_date = $row['reg_date'] ?? '';
        if (!empty($raw_reg_date) && $raw_reg_date != '0000-00-00') {
            $reg_date = date("F d, Y", strtotime($raw_reg_date));
        } else {
            $reg_date = 'N/A';
        }

        // Concatenate Names neatly
        $child_name = trim(($row['child_fname'] ?? '') . ' ' . ($row['child_mname'] ?? '') . ' ' . ($row['child_lname'] ?? ''));
        $mother_name = trim(($row['mother_fname'] ?? '') . ' ' . ($row['mother_mname'] ?? '') . ' ' . ($row['mother_lname'] ?? ''));
        $father_name = trim(($row['father_fname'] ?? '') . ' ' . ($row['father_mname'] ?? '') . ' ' . ($row['father_lname'] ?? ''));

        $child_sex = $row['child_sex'] ?? '';
        $birth_date = $row['child_birth_date'] ?? '';
        $birth_place = trim(($row['birth_municipal'] ?? '') . ', ' . ($row['birth_province'] ?? ''));
        
        $mother_citizen = $row['mother_citizen'] ?? '';
        $father_citizen = $row['father_citizen'] ?? '';
        $mrg_date = $row['marriage_date'] ?? '';
        $mrg_place = $row['marriage_place'] ?? '';
        $remarks = $row['remarks'] ?? '';

        // 3. Instantiation of inherited class
        require_once('../../tcpdf/tcpdf.php'); 

        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
        $pdf->SetCreator(PDF_CREATOR);  
        $pdf->SetTitle("Form No. 1A");  
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
        $pdf->Cell(30 ,10,'Civil Registry Form No. 1A ',0,0);
        $pdf->Ln(4);
        $pdf->Cell(30 ,10,'(Birth-available)',0,0);
        // $pdf->Image('../../images/OIP.jpeg', 26,33,22);
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
        if(!empty($date_now)){
          $pdf->SetFont('','U',12);
          $pdf->Cell(30,10,'   '.strtoupper($date_now).'   ',0,0,'C');
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
        $pdf->Cell(30,10,'We certify that, among others, the following facts of birth appear in our',0,0);
        $pdf->Ln(5);
        $pdf->Cell(30 ,10,'Register of Births on page',0,0);
        $pdf->Cell(20);
        $pdf->SetFont('','U',12);
        $pdf->Write(10,'     '.strtoupper($birthpage).'     ');
        $pdf->SetFont('','',12);
        $pdf->Cell(30,10,'of book number',0,0);
        $pdf->SetFont('','U',12);
        $pdf->Write(10,'    '.strtoupper($birthbook).'    ');
        $pdf->SetFont('','',12);
        $pdf->Write(10,':');
        $pdf->Ln(13);

        $pdf->SetFont('','',12);
        $content = ' ';
        $content .='
          <table>
            <tr>
              <td width="7%"></td>
              <td width="35%">Registry Number</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($registry_no).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Date of Registration</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($reg_date).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Name of Child</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($child_name).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Sex</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($child_sex).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Date of Birth</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($birth_date).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Place of Birth</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($birth_place).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Name of Mother</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($mother_name).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Citizenship of Mother</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($mother_citizen).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Name of Father</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($father_name).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Citizenship of Father</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($father_citizen).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Date of Marriage of Parents</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($mrg_date).'</td>
            </tr>
            <tr>
              <td width="7%"></td>
              <td width="35%">Place of Marriage of Parents</td>
              <td width="2%">:</td>
              <td width="47%">'.strtoupper($mrg_place).'</td>
            </tr>
          </table>
          ';
        $pdf->writeHTML($content);

        $pdf->SetFont('','',11.5);
        $contenta ='
          <table>
          <tr>
              <td width="7%"></td>
              <td width="12%">Remarks : </td>
              <td width="74%">'.strtoupper($remarks).'</td>
            </tr>
          </table>
          ';  
        $pdf->writeHTML($contenta);

        $pdf->SetFont('','',12);
        $pdf->Cell(12);
        $pdf->Cell(30,5,'This certification is issued to',0,0);
        $pdf->Cell(25);
        if(!empty($cerf_issued_of)){
          $pdf->SetFont('','U',12);
          $pdf->Write(5,'     '.strtoupper($cerf_issued_of).'     ');
        }else{
          $pdf->SetFont('','',12);
          $pdf->Write(5,'_______________________');
        }
        $pdf->SetFont('','',12);
        $pdf->Write(5,'upon his/her request.');
        $pdf->Ln(15);
        $pdf->Cell(115);

        if(!empty($city_registrar)){
          $pdf->SetFont('','U',12);
          $pdf->Cell(30,10,'    '.strtoupper($city_registrar).'    ',0,0,'C');
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
        if(!empty($registrar_officer)){
          $pdf->SetFont('','U',12);
          $pdf->Write(10,'    '.strtoupper($registrar_officer).'    ');
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
        if(!empty($amount_paid)){
          $pdf->SetFont('','U',12);
          $pdf->Write(10,'    '.strtoupper($amount_paid).'    ');
        }else{
          $pdf->SetFont('','',12);
          $pdf->Write(10,'_________________');
        }
        $pdf->Ln(6);
        $pdf->SetFont('','',12);
        $pdf->Cell(30,10,'O.R. Number',0,0);
        $pdf->Write(10,' : ');
        if(!empty($o_r_no)){
          $pdf->SetFont('','U',12);
          $pdf->Write(10,'    '.strtoupper($o_r_no).'    ');
        }else{
          $pdf->SetFont('','',12);
          $pdf->Write(10,'_________________');
        }
        $pdf->Ln(6);
        $pdf->SetFont('','',12);
        $pdf->Cell(30,10,'Date Paid',0,0);
        $pdf->Write(10,' : ');
        if(!empty($date_paid)){
          $pdf->SetFont('','U',12);
          $pdf->Write(10,'    '.strtoupper($date_paid).'    ');
        }else{
          $pdf->SetFont('','',12);
          $pdf->Write(10,'_________________');
        }
        $pdf->Ln(12);
        $pdf->SetFont('','',12);
        $pdf->Write(10,'Note: A mark, erasure or alteration of any entry invalidates this Certification.');
        $pdf->Ln(12);
        $pdf->SetFont('','',12);
        $pdf->Cell(65);
        //$pdf->Cell(30,10,'DOCUMENTARY STAMP TAX PAID',0,0,'C');

        $pdf->Output('Form_1A_'.str_replace(' ', '_', $child_name).'.pdf', 'I');
    }
  }
}
?>