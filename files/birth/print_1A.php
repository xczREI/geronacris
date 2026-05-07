<?php
if(isset($_POST['print'])){

  if(isset($_POST['reg_no']))
  {
    require_once 'login_db_birth.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die($conn->connect_error);

    $reg_no = $conn->real_escape_string($_POST['reg_no']);

    // --- LIVE DATA OVERRIDE ---
    if (isset($_POST['is_live_print']) && $_POST['is_live_print'] == '1') {
        $row = $_POST;
        // Basic mapping for naming compatibility in print_1A.php
        $row['reg_no_official'] = $_POST['registry_no'] ?? '';
        $row['date_registered'] = $_POST['reg_date'] ?? '';
        $row['book_official'] = $_POST['book_no'] ?? '';
        $row['page_official'] = $_POST['page_no'] ?? '';
        $row['child_birth_date'] = $_POST['birth_day'] ?? '';
        // child_name, mother_name, father_name should already be in POST from the bridge
    } else {
        $sql = "SELECT registration_tbl.registry_no AS reg_no_official, registration_tbl.reg_date AS date_registered, 
                registration_tbl.book_no AS book_official, registration_tbl.page_no AS page_official,
                child_tbl.*, mother_tbl.*, father_tbl.*, att_inf_tbl.*, receive_civil_tbl.*, 
                remarks_tbl.*, admission_paternity_tbl.*, late_reg_tbl.* 
                FROM registration_tbl 
                LEFT JOIN child_tbl ON registration_tbl.no = child_tbl.no 
                LEFT JOIN mother_tbl ON registration_tbl.no = mother_tbl.no 
                LEFT JOIN father_tbl ON registration_tbl.no = father_tbl.no 
                LEFT JOIN att_inf_tbl ON registration_tbl.no = att_inf_tbl.no 
                LEFT JOIN receive_civil_tbl ON registration_tbl.no = receive_civil_tbl.no 
                LEFT JOIN remarks_tbl ON registration_tbl.no = remarks_tbl.no 
                LEFT JOIN admission_paternity_tbl ON registration_tbl.no = admission_paternity_tbl.no 
                LEFT JOIN late_reg_tbl ON registration_tbl.no = late_reg_tbl.no 
                WHERE registration_tbl.no = '$reg_no' LIMIT 1";
        $result = $conn->query($sql);  
        if (!$result) die ("Database access failed: " . $conn->error);
        $row = $result->fetch_assoc(); 
    }

    if ($row) {
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

        // 2. Data logic
        $registry_no = !empty($row['reg_no_official']) ? $row['reg_no_official'] : ($row['registry_no'] ?? '');
        $birthpage = $_POST['birthpage'] ?? $row['page_official'] ?? $row['page_no'] ?? '';
        $birthbook = $_POST['birthbook'] ?? $row['book_official'] ?? $row['book_no'] ?? '';

        $raw_reg_date = $row['date_registered'] ?? $row['reg_date'] ?? '';
        if (!empty($raw_reg_date) && $raw_reg_date != '0000-00-00') {
            $reg_date = date("F d, Y", strtotime($raw_reg_date));
        } else {
            $reg_date = 'N/A';
        }

        $child_name = !empty($row['child_name']) ? $row['child_name'] : trim(($row['child_fname'] ?? '') . ' ' . ($row['child_mname'] ?? '') . ' ' . ($row['child_lname'] ?? ''));
        $mother_name = !empty($row['mother_name']) ? $row['mother_name'] : trim(($row['mother_fname'] ?? '') . ' ' . ($row['mother_mname'] ?? '') . ' ' . ($row['mother_lname'] ?? ''));
        $father_name = !empty($row['father_name']) ? $row['father_name'] : trim(($row['father_fname'] ?? '') . ' ' . ($row['father_mname'] ?? '') . ' ' . ($row['father_lname'] ?? ''));

        $child_sex = $row['child_sex'] ?? '';
        $birth_date = (!empty($row['child_birth_date']) && $row['child_birth_date'] != '0000-00-00') ? date("F d, Y", strtotime($row['child_birth_date'])) : ($row['birth_date'] ?? '');
        $birth_place = !empty($row['birth_place']) ? $row['birth_place'] : trim(($row['birth_brgy'] ?? '') . ', ' . ($row['birth_municipal'] ?? '') . ', ' . ($row['birth_province'] ?? ''));
        $birth_place = trim($birth_place, ', ');

        require_once('../../tcpdf/tcpdf.php');
        $pdf = new TCPDF('P', 'mm', array(215.9, 330.2), true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('GERONA CRIS');
        $pdf->SetTitle('Civil Registry Form No. 1A');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->AddPage();

        $html = '
        <br><br>
        <table border="0" cellpadding="2">
            <tr><td width="70%"><p style="font-size:12px;">Civil Registry Form No. 1A<br>(Birth-available)</p></td><td width="30%" align="right"><p style="font-size:13px; border-bottom:1px solid black;">'.$date_now.'</p><br><p align="center" style="font-size:11px;">Date</p></td></tr>
        </table>
        <br><br>
        <h2 align="center">Republic of the Philippines</h2>
        <h2 align="center">OFFICE OF THE CIVIL REGISTRAR</h2>
        <h2 align="center">GERONA, TARLAC</h2>
        <br><br>
        <h3>TO WHOM IT MAY CONCERN:</h3>
        <p style="text-indent: 50px; line-height: 1.8;">We certify that, among others, the following facts of birth appear in our Register of Birth on page <b>'.$birthpage.'</b> of book number <b>'.$birthbook.'</b>:</p>
        <br>
        <table border="0" cellpadding="5" style="line-height: 1.6;">
            <tr><td width="40%">Registry No.</td><td width="5%">:</td><td width="55%"><b>'.$registry_no.'</b></td></tr>
            <tr><td>Date of Registration</td><td>:</td><td><b>'.$reg_date.'</b></td></tr>
            <tr><td>Name of Child</td><td>:</td><td><b>'.strtoupper($child_name).'</b></td></tr>
            <tr><td>Sex</td><td>:</td><td><b>'.strtoupper($child_sex).'</b></td></tr>
            <tr><td>Date of Birth</td><td>:</td><td><b>'.strtoupper($birth_date).'</b></td></tr>
            <tr><td>Place of Birth</td><td>:</td><td><b>'.strtoupper($birth_place).'</b></td></tr>
            <tr><td>Name of Mother</td><td>:</td><td><b>'.strtoupper($mother_name).'</b></td></tr>
            <tr><td>Citizenship of Mother</td><td>:</td><td><b>'.strtoupper($row['mother_citizen'] ?? '').'</b></td></tr>
            <tr><td>Name of Father</td><td>:</td><td><b>'.strtoupper($father_name).'</b></td></tr>
            <tr><td>Citizenship of Father</td><td>:</td><td><b>'.strtoupper($row['father_citizen'] ?? '').'</b></td></tr>
            <tr><td>Date of Marriage of Parents</td><td>:</td><td><b>'.strtoupper($row['marriage_date'] ?? '').'</b></td></tr>
            <tr><td>Place of Marriage of Parents</td><td>:</td><td><b>'.strtoupper($row['marriage_place'] ?? '').'</b></td></tr>
        </table>
        <br><br>
        <p style="text-indent: 50px;">This certification is issued to <b>'.strtoupper($cerf_issued_of).'</b> upon his/her request.</p>
        <br><br><br>
        <table border="0">
            <tr>
                <td width="50%"></td>
                <td width="50%" align="center">
                    <b>'.strtoupper($city_registrar).'</b><br>
                    '.$city_registrar_position.'
                </td>
            </tr>
            <tr><td colspan="2"><br><br></td></tr>
            <tr>
                <td width="50%" align="left">
                    Verified by:<br><br>
                    <b>'.strtoupper($registrar_officer).'</b><br>
                    '.$registrar_officer_position.'
                </td>
                <td width="50%"></td>
            </tr>
        </table>
        <br><br>
        <table border="0" style="font-size:10px;">
            <tr><td width="20%">Amount Paid</td><td>: '.$amount_paid.'</td></tr>
            <tr><td>O.R. Number</td><td>: '.$o_r_no.'</td></tr>
            <tr><td>Date Paid</td><td>: '.$date_paid.'</td></tr>
        </table>
        ';

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Ln(12);
        $pdf->SetFont('','',12);
        $pdf->Cell(65);
        $pdf->Output('Form_1A_'.str_replace(' ', '_', $child_name).'.pdf', 'I');
    }
  }
}
?>