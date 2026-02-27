<?php
session_start();
require_once 'login_db_death.php'; 

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['update_death']) && isset($_POST['death_id'])) {
    
    // Identifier
    $death_id = $conn->real_escape_string($_POST['death_id']);

    // Page 1 Data
    $registry_no = $conn->real_escape_string($_POST['registry_no'] ?? '');
    $book_no = $conn->real_escape_string($_POST['book_no'] ?? '');
    $page_no = $conn->real_escape_string($_POST['page_no'] ?? '');
    $provinces = $conn->real_escape_string($_POST['provinces'] ?? '');
    $municipal = $conn->real_escape_string($_POST['municipal'] ?? '');
    
    $deceased_fname = $conn->real_escape_string($_POST['deceased_fname'] ?? '');
    $deceased_mname = $conn->real_escape_string($_POST['deceased_mname'] ?? '');
    $deceased_lname = $conn->real_escape_string($_POST['deceased_lname'] ?? '');
    $sex = $conn->real_escape_string($_POST['sex'] ?? '');
    $date_of_death = $conn->real_escape_string($_POST['date_of_death'] ?? '');
    $date_birth = $conn->real_escape_string($_POST['date_birth'] ?? '');
    
    $age_at_death = $conn->real_escape_string($_POST['age_at_death'] ?? '');
    $age_one_month = $conn->real_escape_string($_POST['age_one_month'] ?? '');
    $age_one_day = $conn->real_escape_string($_POST['age_one_day'] ?? '');
    $age_hrs_hrs = $conn->real_escape_string($_POST['age_hrs_hrs'] ?? '');
    $age_hrs_min = $conn->real_escape_string($_POST['age_hrs_min'] ?? '');
    
    $place_of_death = $conn->real_escape_string($_POST['place_of_death'] ?? '');
    $civil_status = $conn->real_escape_string($_POST['civil_status'] ?? '');
    $religion = $conn->real_escape_string($_POST['religion'] ?? '');
    $citizenship = $conn->real_escape_string($_POST['citizenship'] ?? '');
    $residence = $conn->real_escape_string($_POST['residence'] ?? '');
    $occupation = $conn->real_escape_string($_POST['occupation'] ?? '');
    $parent_father_name = $conn->real_escape_string($_POST['parent_father_name'] ?? '');
    $parent_mother_name = $conn->real_escape_string($_POST['parent_mother_name'] ?? '');

    $immediate_cause = $conn->real_escape_string($_POST['immediate_cause'] ?? '');
    $immediate_interval = $conn->real_escape_string($_POST['immediate_interval'] ?? '');
    $antecedent_cause = $conn->real_escape_string($_POST['antecedent_cause'] ?? '');
    $antecedent_interval = $conn->real_escape_string($_POST['antecedent_interval'] ?? '');
    $underlying_cause = $conn->real_escape_string($_POST['underlying_cause'] ?? '');
    $underlying_interval = $conn->real_escape_string($_POST['underlying_interval'] ?? '');
    $other_condition_death = $conn->real_escape_string($_POST['other_condition_death'] ?? '');
    $maternal_condition = $conn->real_escape_string($_POST['maternal_condition'] ?? '');
    $death_manner = $conn->real_escape_string($_POST['death_manner'] ?? '');
    $place_external_cause = $conn->real_escape_string($_POST['place_external_cause'] ?? '');
    $autopsy = $conn->real_escape_string($_POST['autopsy'] ?? '');

    $attendant = $conn->real_escape_string($_POST['attendant'] ?? '');
    $attendant5 = $conn->real_escape_string($_POST['attendant5'] ?? '');
    $date_from = $conn->real_escape_string($_POST['date_from'] ?? '');
    $date_to = $conn->real_escape_string($_POST['date_to'] ?? '');
    $certify_type = $conn->real_escape_string($_POST['certify_type'] ?? '');
    $death_time = $conn->real_escape_string($_POST['death_time'] ?? '');
    $attendant_name = $conn->real_escape_string($_POST['attendant_name'] ?? '');
    $attendant_position = $conn->real_escape_string($_POST['attendant_position'] ?? '');
    $attendant_address = $conn->real_escape_string($_POST['attendant_address'] ?? '');
    $attendant_date = $conn->real_escape_string($_POST['attendant_date'] ?? '');
    $reviewed_name = $conn->real_escape_string($_POST['reviewed_name'] ?? '');
    $reviewed_date = $conn->real_escape_string($_POST['reviewed_date'] ?? '');

    $corpse_disposition = $conn->real_escape_string($_POST['corpse_disposal'] ?? '');
    $burial_no = $conn->real_escape_string($_POST['burial_no'] ?? '');
    $burial_issued_date = $conn->real_escape_string($_POST['burial_issued_date'] ?? '');
    $transfer_no = $conn->real_escape_string($_POST['transfer_no'] ?? '');
    $transfer_issued_date = $conn->real_escape_string($_POST['transfer_issued_date'] ?? '');
    $cemetery = $conn->real_escape_string($_POST['cemetery'] ?? '');
    $municipalityCemetery = $conn->real_escape_string($_POST['municipalityCemetery'] ?? '');
    $provinceCemetery = $conn->real_escape_string($_POST['provinceCemetery'] ?? '');

    $informant_name = $conn->real_escape_string($_POST['informant_name'] ?? '');
    $rel_death = $conn->real_escape_string($_POST['rel_death'] ?? '');
    $informant_address = $conn->real_escape_string($_POST['informant_address'] ?? '');
    $informant_date = $conn->real_escape_string($_POST['informant_date'] ?? '');
    $prepared_name = $conn->real_escape_string($_POST['prepared_name'] ?? '');
    $prepared_position = $conn->real_escape_string($_POST['prepared_position'] ?? '');
    $prepared_date = $conn->real_escape_string($_POST['prepared_date'] ?? '');
    $received_name = $conn->real_escape_string($_POST['received_name'] ?? '');
    $received_position = $conn->real_escape_string($_POST['received_position'] ?? '');
    $received_date = $conn->real_escape_string($_POST['received_date'] ?? '');
    $civil_name = $conn->real_escape_string($_POST['civil_name'] ?? '');
    $civil_position = $conn->real_escape_string($_POST['civil_position'] ?? '');
    $civil_date = $conn->real_escape_string($_POST['civil_date'] ?? '');
    $remarks = $conn->real_escape_string($_POST['remarks'] ?? '');
    
    // Page 2 Data
    $mother_age = $conn->real_escape_string($_POST['mother_age'] ?? '');
    $delivery_method = $conn->real_escape_string($_POST['delivery_method'] ?? '');
    $pregnancy_length = $conn->real_escape_string($_POST['pregnancy_length'] ?? '');
    $birth_type = $conn->real_escape_string($_POST['birth_type'] ?? '');
    $multi_birth_was = $conn->real_escape_string($_POST['multi_birth_was'] ?? '');
    
    $main_disease = $conn->real_escape_string($_POST['main_disease'] ?? '');
    $other_disease = $conn->real_escape_string($_POST['other_disease'] ?? '');
    $main_maternal = $conn->real_escape_string($_POST['main_maternal_disease'] ?? '');
    $other_maternal = $conn->real_escape_string($_POST['other_maternal_disease'] ?? '');
    $other_relevant = $conn->real_escape_string($_POST['other_relevant'] ?? '');

    $autopsy_txt1 = $conn->real_escape_string($_POST['autopsy_txt1'] ?? '');
    $autopsy_txt2 = $conn->real_escape_string($_POST['autopsy_txt2'] ?? '');
    $autopsy_name = $conn->real_escape_string($_POST['autopsy_name'] ?? '');
    $autopsy_date = $conn->real_escape_string($_POST['autopsy_date'] ?? '');
    $autopsy_title = $conn->real_escape_string($_POST['autopsy_title'] ?? '');
    $autopsy_address = $conn->real_escape_string($_POST['autopsy_address'] ?? '');

    $embalmer_txt = $conn->real_escape_string($_POST['embalmer_txt'] ?? '');
    $embalmer_name = $conn->real_escape_string($_POST['embalmer_name'] ?? '');
    $embalmer_address = $conn->real_escape_string($_POST['embalmer_address'] ?? '');
    $embalmer_title = $conn->real_escape_string($_POST['embalmer_title'] ?? '');
    $embalmer_no = $conn->real_escape_string($_POST['embalmer_no'] ?? '');
    $embalmer_on = $conn->real_escape_string($_POST['embalmer_on'] ?? '');
    $embalmer_at = $conn->real_escape_string($_POST['embalmer_at'] ?? '');
    $embalmer_expdate = $conn->real_escape_string($_POST['embalmer_expdate'] ?? '');

    $late_name = $conn->real_escape_string($_POST['late_name'] ?? '');
    $late_address = $conn->real_escape_string($_POST['late_address'] ?? '');
    $death_name = $conn->real_escape_string($_POST['death_name'] ?? '');
    $died_on = $conn->real_escape_string($_POST['died_on'] ?? '');
    $died_in = $conn->real_escape_string($_POST['died_in'] ?? '');
    $buried_in = $conn->real_escape_string($_POST['buried_in'] ?? '');
    $buried_on = $conn->real_escape_string($_POST['buried_on'] ?? '');
    $attended_type = $conn->real_escape_string($_POST['attended_type'] ?? '');
    $attended_by = $conn->real_escape_string($_POST['attended_by'] ?? '');
    $late_death_cause = $conn->real_escape_string($_POST['late_death_cause'] ?? '');
    $late_reg_reason = $conn->real_escape_string($_POST['late_reg_reason'] ?? '');
    
    $sign_day = $conn->real_escape_string($_POST['sign_day'] ?? '');
    $sign_month = $conn->real_escape_string($_POST['sign_month'] ?? '');
    $sign_year = $conn->real_escape_string($_POST['sign_year'] ?? '');
    $sign_at = $conn->real_escape_string($_POST['sign_at'] ?? '');
    
    $affiant_name = $conn->real_escape_string($_POST['affiant_name'] ?? '');
    
    $sworn_day = $conn->real_escape_string($_POST['sworn_day'] ?? '');
    $sworn_month = $conn->real_escape_string($_POST['sworn_month'] ?? '');
    $sworn_year = $conn->real_escape_string($_POST['sworn_year'] ?? '');
    $sworn_at = $conn->real_escape_string($_POST['sworn_at'] ?? '');
    $ctc = $conn->real_escape_string($_POST['ctc'] ?? '');
    $issued_on = $conn->real_escape_string($_POST['issued_on'] ?? '');
    $issued_at = $conn->real_escape_string($_POST['issued_at'] ?? '');
    $administer_name = $conn->real_escape_string($_POST['administer_name'] ?? '');
    $administer_position = $conn->real_escape_string($_POST['administer_position'] ?? '');
    $administer_address = $conn->real_escape_string($_POST['administer_address'] ?? '');

    $sql = "UPDATE geronacrisdeath SET 
        registry_no='$registry_no',
        book_no='$book_no', 
        page_no='$page_no', 
        provinces='$provinces', 
        municipal='$municipal',
        deceased_fname='$deceased_fname', 
        deceased_mname='$deceased_mname', 
        deceased_lname='$deceased_lname', 
        sex='$sex', 
        date_of_death='$date_of_death', 
        date_birth='$date_birth', 
        age_at_death='$age_at_death', 
        age_one_month='$age_one_month', 
        age_one_day='$age_one_day', 
        age_hrs_hrs='$age_hrs_hrs', 
        age_hrs_min='$age_hrs_min', 
        place_of_death='$place_of_death', 
        civil_status='$civil_status', 
        religion='$religion', 
        citizenship='$citizenship', 
        residence='$residence', 
        occupation='$occupation', 
        parent_father_name='$parent_father_name', 
        parent_mother_name='$parent_mother_name',
        immediate_cause='$immediate_cause', 
        immediate_interval='$immediate_interval', 
        antecedent_cause='$antecedent_cause', 
        antecedent_interval='$antecedent_interval', 
        underlying_cause='$underlying_cause', 
        underlying_interval='$underlying_interval', 
        other_condition_death='$other_condition_death', 
        maternal_condition='$maternal_condition', 
        death_manner='$death_manner', 
        place_external_cause='$place_external_cause', 
        autopsy='$autopsy', 
        attendant='$attendant', 
        attendant5='$attendant5', 
        date_from='$date_from', 
        date_to='$date_to', 
        certify_type='$certify_type', 
        death_time='$death_time', 
        attendant_name='$attendant_name', 
        attendant_position='$attendant_position', 
        attendant_address='$attendant_address', 
        attendant_date='$attendant_date', 
        reviewed_name='$reviewed_name', 
        reviewed_date='$reviewed_date',
        corpse_disposition='$corpse_disposition', 
        burial_no='$burial_no', 
        burial_issued_date='$burial_issued_date', 
        transfer_no='$transfer_no', 
        transfer_issued_date='$transfer_issued_date', 
        cemetery='$cemetery', 
        municipalityCemetery='$municipalityCemetery', 
        provinceCemetery='$provinceCemetery',
        informant_name='$informant_name', 
        rel_death='$rel_death', 
        informant_address='$informant_address', 
        informant_date='$informant_date', 
        prepared_name='$prepared_name', 
        prepared_position='$prepared_position', 
        prepared_date='$prepared_date', 
        received_name='$received_name', 
        received_position='$received_position', 
        received_date='$received_date', 
        civil_name='$civil_name', 
        civil_position='$civil_position', 
        civil_date='$civil_date', 
        remarks='$remarks',
        mother_age='$mother_age',
        delivery_method='$delivery_method',
        pregnancy_length='$pregnancy_length',
        birth_type='$birth_type',
        if_multi_child_was='$multi_birth_was',
        main_disease='$main_disease',
        other_disease='$other_disease',
        main_maternal_disease='$main_maternal',
        other_maternal_disease='$other_maternal',
        other_relevant='$other_relevant',
        autopsy_txt1='$autopsy_txt1',
        autopsy_txt2='$autopsy_txt2',
        autopsy_name='$autopsy_name',
        autopsy_address='$autopsy_address',
        autopsy_title='$autopsy_title',
        autopsy_date='$autopsy_date',
        embalmer_txt='$embalmer_txt',
        embalmer_name='$embalmer_name',
        embalmer_address='$embalmer_address',
        embalmer_title='$embalmer_title',
        embalmer_no='$embalmer_no',
        embalmer_on='$embalmer_on',
        embalmer_at='$embalmer_at',
        embalmer_expdate='$embalmer_expdate',
        late_name='$late_name',
        late_address='$late_address',
        death_name='$death_name',
        died_on='$died_on',
        died_in='$died_in',
        buried_in='$buried_in',
        buried_on='$buried_on',
        attended_type='$attended_type',
        attended_by='$attended_by',
        late_death_cause='$late_death_cause',
        late_reg_reason='$late_reg_reason',
        sign_day='$sign_day',
        sign_month='$sign_month',
        sign_year='$sign_year',
        sign_at='$sign_at',
        affiant_name='$affiant_name',
        sworn_day='$sworn_day',
        sworn_month='$sworn_month',
        sworn_year='$sworn_year',
        sworn_at='$sworn_at',
        ctc='$ctc',
        issued_on='$issued_on',
        issued_at='$issued_at',
        administer_name='$administer_name',
        administer_position='$administer_position',
        administer_address='$administer_address'
        WHERE death_id='$death_id'";

    if($conn->query($sql) === TRUE){
        header("Location: death_records.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    mysqli_close($conn);
} else {
    header("Location: death_records.php");
    exit();
}
?>