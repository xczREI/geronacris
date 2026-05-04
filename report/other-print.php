<?php   
if(isset($_POST["pdf"]))  
{  

  function fetch_data() {  

    $yy = $_POST['year'];
    $mm = $_POST['month'];
    $xx = ("$yy-$mm-01");
    $zz = ("$yy-$mm-31");
    $data = '';

    if (!empty($yy) && empty($mm) || !empty($yy) && $mm == 'All') {
    $data .='   
      <h3 align="center">BIRTH<br><span style="font-size: 10px;">Month/Year:</span> '.$yy.'</h3>
        <table style="font-size: 12px;" cellpadding="2" border="1">
          <thead>
            <tr align="center">
              <th><b>User</b></th>
              <th><b>Total</b></th>
            </tr>
          </thead>
          <tbody id="myTable">';
          
            require '../php/login_db_birth.php';
            $connB = new mysqli($hn, $un, $pw, $db);
            if ($connB->connect_error) die($connB->connect_error);

            $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
            $result = $connB->query($sql);  
            if (!$result) die ("Database access failed: " . $connB->error);
            $rows = $result->num_rows;

            $sql = "SELECT COUNT(*) AS xx, reg_date, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
            $result = $connB->query($sql);  
            if (!$result) die ("Database access failed: " . $connB->error);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
                $data .= '<tr>';
                $data .= '<td align="center">'.$row['reg_user'].'</td>';
                $data .= '<td align="center">'.$row['xx'].'</td>';
                $data .= '</tr>';
              }
            }  
            $data .= '<tr>';
            $data .= '<td></td>';
            $data .= '<td align="center" style="font-weight:bold;">'.$rows.'</td>';
            $data .= '</tr>';   
            $connB->close();         
    $data .=' 
          </tbody>
        </table><p></p>';
    $data .='   
      <h3 align="center">DEATH<br><span style="font-size: 10px;">Month/Year:</span> '.$yy.'</h3>
        <table style="font-size: 12px;" cellpadding="2" border="1">
          <thead>
            <tr align="center">
              <th><b>User</b></th>
              <th><b>Total</b></th>
            </tr>
          </thead>
          <tbody id="myTable">';
          
            require '../php/login_db_death.php';
            $connD = new mysqli($hn, $un, $pw, $db);
            if ($connD->connect_error) die($connD->connect_error);

            $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
            $result = $connD->query($sql);  
            if (!$result) die ("Database access failed: " . $connD->error);
            $rows = $result->num_rows;

            $sql = "SELECT COUNT(*) AS xx, reg_date, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
            $result = $connD->query($sql);  
            if (!$result) die ("Database access failed: " . $connD->error);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
                $data .= '<tr>';
                $data .= '<td align="center">'.$row['reg_user'].'</td>';
                $data .= '<td align="center">'.$row['xx'].'</td>';
                $data .= '</tr>';
              }
            }  
            $data .= '<tr>';
            $data .= '<td></td>';
            $data .= '<td align="center" style="font-weight:bold;">'.$rows.'</td>';
            $data .= '</tr>';   
            $connD->close();        
    $data .=' 
          </tbody>
        </table><p></p>';
    $data .='   
      <h3 align="center">MARRIAGE<br><span style="font-size: 10px;">Month/Year:</span> '.$yy.'</h3>
        <table style="font-size: 12px;" cellpadding="2" border="1">
          <thead>
            <tr align="center">
              <th><b>User</b></th>
              <th><b>Total</b></th>
            </tr>
          </thead>
          <tbody id="myTable">';
          
            require '../php/login_db_mrg.php';
            $connM = new mysqli($hn, $un, $pw, $db);
            if ($connM->connect_error) die($connM->connect_error);

            $sql = "SELECT * FROM registration_tbl WHERE reg_date LIKE '$yy%'";
            $result = $connM->query($sql);  
            if (!$result) die ("Database access failed: " . $connM->error);
            $rows = $result->num_rows;

            $sql = "SELECT COUNT(*) AS xx, reg_date, reg_user FROM registration_tbl WHERE reg_date LIKE '$yy%' GROUP BY reg_user";
            $result = $connM->query($sql);  
            if (!$result) die ("Database access failed: " . $connM->error);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
                $data .= '<tr>';
                $data .= '<td align="center">'.$row['reg_user'].'</td>';
                $data .= '<td align="center">'.$row['xx'].'</td>';
                $data .= '</tr>';
              }
            }  
            $data .= '<tr>';
            $data .= '<td></td>';
            $data .= '<td align="center" style="font-weight:bold;">'.$rows.'</td>';
            $data .= '</tr>';   
            $connM->close();        
    $data .=' 
          </tbody>
        </table>';
      return $data;

    } else if (!empty($yy) && $mm != 'All') {
    $data .='   
      <h3 align="center">BIRTH<br><span style="font-size: 10px;">Month/Year:</span>  '.date_format(date_create($xx),'F').' '.$yy.'</h3>
        <table style="font-size: 12px;" cellpadding="2" border="1">
          <thead>
            <tr align="center">
              <th><b>User</b></th>
              <th><b>Total</b></th>
            </tr>
          </thead>
          <tbody id="myTable">';
          
            require '../php/login_db_birth.php';
            $connB = new mysqli($hn, $un, $pw, $db);
            if ($connB->connect_error) die($connB->connect_error);

            $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
            $result = $connB->query($sql);  
            if (!$result) die ("Database access failed: " . $connB->error);
            $rows = $result->num_rows;

            $sql = "SELECT COUNT(*) AS xx, reg_date, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
            $result = $connB->query($sql); 
            if (!$result) die ("Database access failed: " . $connB->error);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
                $data .= '<tr>';
                $data .= '<td align="center">'.$row['reg_user'].'</td>';
                $data .= '<td align="center">'.$row['xx'].'</td>';
                $data .= '</tr>';
              }
            }  
            $data .= '<tr>';
            $data .= '<td></td>';
            $data .= '<td align="center" style="font-weight:bold;">'.$rows.'</td>';
            $data .= '</tr>';   
            $connB->close();        
    $data .=' 
          </tbody>
        </table><p></p>';
    $data .='   
      <h3 align="center">DEATH<br><span style="font-size: 10px;">Month/Year:</span>  '.date_format(date_create($xx),'F').' '.$yy.'</h3>
        <table style="font-size: 12px;" cellpadding="2" border="1">
          <thead>
            <tr align="center">
              <th><b>User</b></th>
              <th><b>Total</b></th>
            </tr>
          </thead>
          <tbody id="myTable">';
          
            require '../php/login_db_death.php';
            $connD = new mysqli($hn, $un, $pw, $db);
            if ($connD->connect_error) die($connD->connect_error);

            $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
            $result = $connD->query($sql);  
            if (!$result) die ("Database access failed: " . $connD->error);
            $rows = $result->num_rows;

            $sql = "SELECT COUNT(*) AS xx, reg_date, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
            $result = $connD->query($sql); 
            if (!$result) die ("Database access failed: " . $connD->error);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
                $data .= '<tr>';
                $data .= '<td align="center">'.$row['reg_user'].'</td>';
                $data .= '<td align="center">'.$row['xx'].'</td>';
                $data .= '</tr>';
              }
            }  
            $data .= '<tr>';
            $data .= '<td></td>';
            $data .= '<td align="center" style="font-weight:bold;">'.$rows.'</td>';
            $data .= '</tr>';   
            $connD->close();        
    $data .=' 
          </tbody>
        </table><p></p>';
    $data .='   
      <h3 align="center">MARRIAGE<br><span style="font-size: 10px;">Month/Year:</span>  '.date_format(date_create($xx),'F').' '.$yy.'</h3>
        <table style="font-size: 12px;" cellpadding="2" border="1">
          <thead>
            <tr align="center">
              <th><b>User</b></th>
              <th><b>Total</b></th>
            </tr>
          </thead>
          <tbody id="myTable">';
          
            require '../php/login_db_mrg.php';
            $connM = new mysqli($hn, $un, $pw, $db);
            if ($connM->connect_error) die($connM->connect_error);

            $sql = "SELECT * FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz'";
            $result = $connM->query($sql);  
            if (!$result) die ("Database access failed: " . $connM->error);
            $rows = $result->num_rows;

            $sql = "SELECT COUNT(*) AS xx, reg_date, reg_user FROM registration_tbl WHERE reg_date BETWEEN '$xx' AND '$zz' GROUP BY reg_user";
            $result = $connM->query($sql); 
            if (!$result) die ("Database access failed: " . $connM->error);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { 
                $data .= '<tr>';
                $data .= '<td align="center">'.$row['reg_user'].'</td>';
                $data .= '<td align="center">'.$row['xx'].'</td>';
                $data .= '</tr>';
              }
            }  
            $data .= '<tr>';
            $data .= '<td></td>';
            $data .= '<td align="center" style="font-weight:bold;">'.$rows.'</td>';
            $data .= '</tr>';   
            $connM->close();        
    $data .=' 
          </tbody>
        </table>';
      return $data;
    }
  }

require_once('../tcpdf/tcpdf.php'); 

$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$pdf->SetCreator(PDF_CREATOR);  
$pdf->SetTitle("Report");  
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$pdf->SetDefaultMonospacedFont('Times');  
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$pdf->SetMargins('20', '10', '20');  
$pdf->setPrintHeader(false);  
$pdf->setPrintFooter(false);  
$pdf->SetAutoPageBreak(TRUE, 10);  
$pdf->SetFont('Times', '', '10');  
$pdf->AddPage('P','LETTER'); 

$pdf->Image('../images/logo-3.png',30,12,22);
$pdf->Image('../images/logo2.png',160,15,15);
$pdf->SetFont('','',12);
$pdf->Ln(1);
$pdf->Cell(75);
$pdf->Cell(30,10,'Republic of the Philippines',0,0,'C');
$pdf->SetFont('','B',12);
$pdf->Ln(6);
$pdf->Cell(75);
$pdf->Cell(30,10,'OFFICE OF THE CIVIL REGISTRAR',0,0,'C');
$pdf->SetFont('','',12);
$pdf->Ln(6);
$pdf->Cell(75);
$pdf->Cell(30,10,'SALDOVAR, LANAO DEL NORTE',0,0,'C');
$pdf->Ln(12);
$tbl = ''; 
$tbl .= ' <h2 align="center">-- REPORT --<br></h2>'; 
$tbl .= fetch_data();  
$tbl .= ''; 

$pdf->writeHTML($tbl);   
$pdf->Output();  

}
 
 ?>  