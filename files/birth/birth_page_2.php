<style>
    /* Global font size 10 */
    .ctf-birth-back, .ctf-birth-back * { font-size: 10px !important; }
    .ctf-birth-back h4 { font-size: 12px !important; }
    .ctf-birth-back h6 { font-size: 10px !important; }
    .ctf-birth-back input, 
    .ctf-birth-back select, 
    .ctf-birth-back textarea,
    .ctf-birth-back label,
    .ctf-birth-back span,
    .ctf-birth-back option { font-size: 10px !important; }
    
    .ctf-birth-back .affidavit-title { font-size: 16px !important; font-weight: bold; }
    
    .custom-dropdown { position: relative; display: inline-block; vertical-align: middle; }
    #selected-text { opacity: 0.8; font-family: Arial, sans-serif; font-size: 14px; color: black; padding: 2px 4px; border-bottom: 1px solid transparent; }
    #status-select { position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; appearance: none; -webkit-appearance: none; }
    .custom-dropdown:hover #selected-text { background-color: #f0f0f0; border-radius: 3px; }
</style>

<div class="ctf-birth-back pt-3 form-container-main">
    <div class="form form-padding">
        
        <div class="row">
            <div class="col border-green">
                <h6 class="pt-10-lh-12 text-center">
                    <span class="affidavit-title">AFFIDAVIT OF ACKNOWLEDGEMENT/ADMISSION OF PATERNITY</span>
                    <div class="mt-5">
                        <span>(For births on or after 3 August 1988)</span>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <span>(For births on or after 3 August 1988)</span>
                    </div>
                </h6>
                <h6 class="pt-10">&emsp;&emsp;&emsp;&emsp;I/We,
                <div class="custom-control custom-control-inline inline-control-no-margin w-42">
                    <input type="text" class="form-control form-control-sm text-center" id="father_name" name="father_name" onkeypress="return isTextKey(event)">
                </div>
                and
                <div class="custom-control custom-control-inline inline-control-no-margin w-42">
                    <input type="text" class="form-control form-control-sm text-center" id="mother_name" name="mother_name" onkeypress="return isTextKey(event)">
                </div>
                ,<br> of legal age, am/are the natural mother and/or father of
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-53">
                    <input type="text" class="form-control form-control-sm text-center" id="child_name" name="child_name" onkeypress="return isTextKey(event)">
                </div>
                , who was born on
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-24">
                    <input type="text" class="form-control form-control-sm text-center" id="birth_date" name="birth_date">
                </div>
                at
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-45">
                    <input type="text" class="form-control form-control-sm text-center" id="birth_place" name="birth_place">
                </div>
                .
                </h6><br>
                <h6 class="letter-spacing-05">&emsp;&emsp;&emsp;&emsp;I am / We are executing this affidavit to attest to the truthfulness of the foregoing statements and for purposes of acknowledging my/our child.</h6><br>
                <div class="row">
                    <div class="col-6 text-center">
                        <input type="text" class="form-control form-control-sm input-underline" id="father_sign" name="father_sign" onkeypress="return isTextKey(event)">
                        <h6>(Signature Over Printed Name of Father)</h6>
                    </div>
                    <div class="col-6 text-center">
                        <input type="text" class="form-control form-control-sm input-underline" id="mother_sign" name="mother_sign" onkeypress="return isTextKey(event)">
                        <h6>(Signature Over Printed Name of Mother)</h6>
                    </div>
                </div><br>
                <h6>&emsp;&emsp;&emsp;&emsp;<span class="font-bold">SUBSCRIBED AND SWORN</span> to before me this
                    <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-7">
                        <input type="text" class="form-control form-control-sm text-center" name="ack_sworn_day" id="ack_sworn_day">
                    </div>
                    day of
                    <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-20">
                        <input type="text" class="form-control form-control-sm text-center" name="ack_sworn_month" id="ack_sworn_month" onkeypress="return isTextKey(event)">
                    </div>
                    ,
                    <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-8">
                        <input type="text" class="form-control form-control-sm text-center" maxlength="4" name="ack_sworn_year" id="ack_sworn_year" onkeypress="return isNumberKey(event)">
                    </div>
                    by
                    <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-30">
                        <input type="text" class="form-control form-control-sm text-center" id="ack_father_sworn" name="ack_sworn_father" onkeypress="return isTextKey(event)">
                    </div>
                    and
                    <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-30">
                        <input type="text" class="form-control form-control-sm text-center" id="ack_mother_sworn" name="ack_sworn_mother" onkeypress="return isTextKey(event)">
                    </div>
                , who exhibited to me 
                <input type="radio" id="gender1" name="birth_gender" value="his" hidden>
                <label id="gender1lbl" for="gender1">his</label>/
                <input type="radio" id="gender2" name="birth_gender" value="her" hidden>
                <label id="gender2lbl" for="gender2">her</label>
                CTC/valid ID
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-30">
                    <input type="text" class="form-control form-control-sm text-center" name="ack_ctc" id="ack_ctc">
                </div>
                issued on
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-25">
                    <input type="text" class="form-control form-control-sm text-center" name="ack_issued_on" id="ack_issued_on">
                </div>
                at
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-25">
                    <input type="text" class="form-control form-control-sm text-center" name="ack_issued_at" id="ack_issued_at" onkeypress="return isTextKey(event)">
                </div>
                .
                </h6>
                <br><br>
                <div class="row">
                    <div class="col-6 text-center">
                        <input type="text" class="form-control form-control-sm input-underline" name="ack_officer_sign" disabled>
                        <h6>Signature of the Administering Officer</h6>
                        <input type="text" class="form-control form-control-sm text-center" id="ack_sworn_name" name="ack_sworn_name" onkeypress="return isTextKey(event)">
                        <h6>Name in Print</h6>
                    </div>
                    <div class="col-6 text-center">
                        <input type="text" class="form-control form-control-sm text-center" id="ack_sworn_position" name="ack_sworn_position" onkeypress="return isTextKey(event)">
                        <h6>Position/Title/Designation</h6>
                        <input type="text" class="form-control form-control-sm text-center" id="ack_sworn_address" name="ack_sworn_address" onkeypress="return isTextKey(event)">
                        <h6>Address</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col border-green-no-top">
                <h6 class="pt-10-lh-12 text-center">
                    <span class="affidavit-title">AFFIDAVIT FOR DELAYED REGISTRATION OF BIRTH</span><br>
                    <span>(To be accomplished by the hospital/clinic administrator, father, mother, or guardian or the person himself if 18 years old or above.)</span>
                </h6>
                <h6 class="pt-10">&emsp;&emsp;&emsp;&emsp;I,
                <div class="custom-control custom-control-inline inline-control-no-margin w-50">
                    <input type="text" class="form-control form-control-sm text-center" id="late_name" name="late_name" onkeypress="return isTextKey(event)">
                </div>
                , of legal age, single/married/divorced/widow/widower, with residence and postal address at
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-76">
                    <input type="text" class="form-control form-control-sm text-center" id="late_address" name="late_address" onkeypress="return isTextKey(event)">
                </div>
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-20">
                    <input type="text" class="form-control form-control-sm input-underline" disabled>
                </div>
                <span class="letter-spacing-05">after having been duly sworn in accordance with law, do hereby depose and say:</span>
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;1.&emsp;That I am the applicant for the delayed registration of:<br>
                &emsp;&emsp;&emsp;&emsp;&emsp;
                <div class="custom-control custom-radio custom-control-inline mb-0 mr-0">
                    <input type="radio" class="custom-control-input text-center" id="my_birth" name="late_birth_type" value="my birth">
                    <label class="custom-control-label" for="my_birth">&nbsp;my birth in</label>
                </div>
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-38">
                    <input type="text" class="form-control form-control-sm text-center" id="bplace1" name="late_birth_in" onkeypress="return isTextKey(event)">
                </div>
                on
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-38">
                    <input type="text" class="form-control form-control-sm text-center" id="bday1" name="late_birth_on" >
                </div>
                &emsp;&emsp;&emsp;&emsp;&emsp;
                <div class="custom-control custom-radio custom-control-inline mb-0 mr-0">
                    <input type="radio" class="custom-control-input text-center" id="the_birth" name="late_birth_type" value="the birth">
                    <label class="custom-control-label" for="the_birth">&nbsp;the birth of</label>
                </div>
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-32">
                    <input type="text" class="form-control form-control-sm text-center" id="childlatename" name="late_birth_of" onkeypress="return isTextKey(event)">
                </div>
                who was born in
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-34">
                    <input type="text" class="form-control form-control-sm text-center" id="bplace2" name="late_birth_inx" onkeypress="return isTextKey(event)">
                </div>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-28">
                    <input type="text" class="form-control form-control-sm input-underline" disabled>
                </div>
                on
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-34">
                    <input type="text" class="form-control form-control-sm text-center" id="bday2" name="late_birth_onx">
                </div>
                .
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;2.&emsp;That I/he/she was attended at birth by
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-50">
                    <input type="text" class="form-control form-control-sm text-center" id="attend_birth_by" name="attend_birth_by">
                </div>
                who resides at
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-78">
                    <input type="text" class="form-control form-control-sm" id="who_resides_at" name="who_resides_at" onkeypress="return isTextKey(event)">
                </div>
                .
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;3.&emsp;That I/he/she is a citizen of
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-50">
                    <input type="text" class="form-control form-control-sm text-center" id="late_citizen" name="late_citizen">
                </div>
                .
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;4.&emsp;That my/his/her parents were&emsp;
                <div class="custom-control custom-radio custom-control-inline mb-0 mr-0">
                    <input type="radio" class="custom-control-input text-center" id="married" name="married_type" value="married">
                    <label class="custom-control-label" for="married">&nbsp;married on</label>
                </div>
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-30">
                    <input type="text" class="form-control form-control-sm text-center" id="married_txt1" name="married_on" >
                </div>
                at
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-35">
                    <input type="text" class="form-control form-control-sm text-center"  id="married_txt2" name="married_at" onkeypress="return isTextKey(event)">
                </div>
                <br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                <div class="custom-control custom-radio custom-control-inline mb-0 mr-0">
                    <input type="radio" class="custom-control-input text-center" id="not_married" name="married_type" value="not married">
                    <label class="custom-control-label" for="not_married">&nbsp;not married but I/he/she  <div class="custom-dropdown">
                    <span id="selected-text">was acknowledged</span> 
                     <select id="status-select">
            <option value="acknowledged">was acknowledged</option>
                 <option value="not_acknowledged"> not acknowledged</option>
    </select>
                </div>by my/his/her</label>
                </div><br>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; 
                father whose name is
                <div class="custom-control custom-control-inline inline-control-no-margin w-45">
                    <input type="text" class="form-control form-control-sm text-center" id="not_married_txt" name="not_married_name" onkeypress="return isTextKey(event)">
                </div>
                .
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;5.&emsp;That the reason for the delay in registering my/his/her birth was
                <div class="custom-control custom-control-inline inline-control-no-margin w-47">
                    <input type="text" class="form-control form-control-sm text-center" name="late_reason_1" >
                </div>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-78">
                    <input type="text" class="form-control form-control-sm text-center" name="late_reason_2" value="<?php echo htmlspecialchars($row['late_reason_2'] ?? ''); ?>">
                </div>
                .
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;6.&emsp;(For the applicant only)&emsp;That I am married to
                <div class="custom-control custom-control-inline inline-control-no-margin w-47">
                    <input type="text" class="form-control form-control-sm text-center" name="applicant_only" onkeypress="return isTextKey(event)">
                </div>
                .
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;(If the applicant is other than the document owner)&emsp;That I am the
                <div class="custom-control custom-control-inline inline-control-no-margin w-30">
                    <input type="text" class="form-control form-control-sm text-center" id="applicant_relation" name="applicant_than_owner" onkeypress="return isTextKey(event)">
                </div>
                of the said person.
                </h6>
                <h6>&emsp;&emsp;&emsp;&emsp;7.&emsp;That I am executing this affidavit to attest to the truthfulness of the foregoing statements for all legal intents and purposes.</h6><br>
                <h6>&emsp;&emsp;&emsp;&emsp;In truth whereof, I have affixed my signature below this
                <div class="custom-control custom-control-inline inline-control-no-margin w-8">
                    <input type="text" class="form-control form-control-sm text-center" id="sign_day" name="sign_day">
                </div>
                day of
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-18">
                    <input type="text" class="form-control form-control-sm text-center" id="sign_month" name="sign_month" onkeypress="return isTextKey(event)">
                </div>
                ,
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-8">
                    <input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sign_year" name="sign_year" onkeypress="return isNumberKey(event)">
                </div>
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-25">
                    <input type="text" class="form-control form-control-sm input-underline" disabled>
                </div>
                at
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-30">
                    <input type="text" class="form-control form-control-sm text-center" id="sign_at" name="sign_at" onkeypress="return isTextKey(event)">
                </div>
                , Philippines.
                </h6>
                <div class="row">
                    <div class="col-7 text-center"></div>
                    <div class="col-5 text-center">
                        <input type="text" class="form-control form-control-sm text-center" id="affiant_name" name="affiant_name" onkeypress="return isTextKey(event)">
                        <h6>(Signature Over Printed Name of Affiant)</h6>
                    </div>
                </div><br>
                <h6>&emsp;&emsp;&emsp;&emsp;<span class="font-bold">SUBSCRIBED AND SWORN</span> to before me this
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-7">
                    <input type="text" class="form-control form-control-sm text-center" id="sworn_day" name="late_sworn_day">
                </div>
                day of
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-18">
                    <input type="text" class="form-control form-control-sm text-center" id="sworn_month" name="late_sworn_month" onkeypress="return isTextKey(event)">
                </div>
                ,
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-8">
                    <input type="text" class="form-control form-control-sm text-center" maxlength="4" id="sworn_year" name="late_sworn_year" onkeypress="return isNumberKey(event)">
                </div>
                at
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-25">
                    <input type="text" class="form-control form-control-sm text-center" id="sworn_at" name="late_sworn_at" onkeypress="return isTextKey(event)">
                </div>
                <span class="letter-spacing-05">, Philippines, affiant who exhibited to me his/her CTC/valid ID</span>
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-20">
                    <input type="text" class="form-control form-control-sm text-center" name="late_ctc" id="late_ctc">
                </div>
                issued on
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-25">
                    <input type="text" class="form-control form-control-sm text-center" name="late_issued_on" id="late_issued_on"> 
                </div>
                at
                <div class="custom-control custom-control-inline mt-1 inline-control-no-margin w-25">
                    <input type="text" class="form-control form-control-sm text-center" name="late_issued_at" id="late_issued_at" onkeypress="return isTextKey(event)">
                </div>
                
                </h6><br><br>
                <div class="row">
                    <div class="col-6 text-center">
                        <input type="text" class="form-control form-control-sm input-underline" name="late_officer_sign" disabled>
                        <h6>Signature of the Administering Officer</h6>
                        <input type="text" class="form-control form-control-sm text-center" id="late_sworn_name" name="late_sworn_name" onkeypress="return isTextKey(event)">
                        <h6>Name in Print</h6>
                    </div>
                    <div class="col-6 text-center">
                        <input type="text" class="form-control form-control-sm text-center" id="late_sworn_position" name="late_sworn_position" onkeypress="return isTextKey(event)">
                        <h6>Position/Title/Designation</h6>
                        <input type="text" class="form-control form-control-sm text-center" id="late_sworn_address" name="late_sworn_address" onkeypress="return isTextKey(event)">
                        <h6>Address</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $("#ack_sworn_day, #sign_day, #sworn_day").keyup(function(){
        var a = $(this).val();
        var numVal = parseInt(a);
        if(numVal >= 32 || numVal <= 0){
            alertify.dialog('alert').set({transition:'zoom',message: 'Warning: Invalid Input!'}).show(); 
            $(this).val("");
        }
    });
});
</script>

<script>
document.getElementById("childlatename").addEventListener("input", function() {
    if(this.value.trim() !== "") {
        document.getElementById("the_birth").checked = true;
    }
});

document.getElementById("bplace1").addEventListener("input", function() {
    if(this.value.trim() !== "") {
        document.getElementById("my_birth").checked = true;
    }
});

document.getElementById("married_txt1").addEventListener("input", function() {
    if(this.value.trim() !== "") {
        document.getElementById("married").checked = true;
    }
});

document.getElementById("not_married_txt").addEventListener("input", function() {
    if(this.value.trim() !== "") {
        document.getElementById("not_married").checked = true;
    }
});
</script>

<script> 
$(document).ready(function() {
    function getOrdinal(n) {
        let s = ["TH", "ST", "ND", "RD"],
            v = n % 100;
        return n + (s[(v - 20) % 10] || s[v] || s[0]);
    }

    function formatDateFormal(inputVal) {
        if (!inputVal) return "";
        const MON = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
        let v = inputVal.replace(/\s\s+/g, ' ').trim().toUpperCase();
        let parts = v.split(/[\s\/,\.-]+/);

        if (parts.length >= 3) {
            let day = parts[0];
            let month = parts[1];
            let year = parts[2];

            if (MON.includes(month)) {
                return `${month} ${day}, ${year}`; 
            }
            if (MON.includes(day)) {
                return `${day} ${parts[1]}, ${parts[2]}`;
            }
            const mIdx = parseInt(month, 10);
            if (!isNaN(mIdx) && mIdx >= 1 && mIdx <= 12) {
                return `${MON[mIdx - 1]} ${day}, ${year}`;
            }
        }
        return v;
    }

  function syncCurrentField(focusedElement) {
    const rawData = localStorage.getItem('birth_form_data');
    const data = rawData ? JSON.parse(rawData) : {};
    
    const elementId = $(focusedElement).attr('id');
    let valueToFill = "";

    const now = new Date();
    const currentDay = now.getDate();
    const currentYear = now.getFullYear();
    const currentMonthName = now.toLocaleString('default', { month: 'long' }).toUpperCase();

    const fName = `${data.father_fname || ''} ${data.father_mname || ''} ${data.father_lname || ''}`.trim().toUpperCase();
    const mName = `${data.mother_fname || ''} ${data.mother_mname || ''} ${data.mother_lname || ''}`.trim().toUpperCase();

    switch (elementId) {
        case 'sworn_day':
        case 'ack_sworn_day':
        case 'sign_day':
            valueToFill = getOrdinal(currentDay);
            break;
        case 'sworn_month':
        case 'ack_sworn_month':
        case 'sign_month':  
            valueToFill = currentMonthName;
            break;
        case 'sworn_year':
        case 'ack_sworn_year':
        case 'sign_year':
            valueToFill = currentYear.toString();
            break;
        case 'late_name': 
        case 'affiant_name':
            valueToFill = data.informant_name || "";
            break;
        case 'late_address':
            valueToFill = data.informant_address || "";
            break;
        case 'applicant_than_owner':
        case 'applicant_relation':  
            valueToFill = data.rel_child || "";
            break;
        case 'birth_place':
        case 'bplace1':
        case 'bplace2':
        case 'late_birth_in':
        case 'late_birth_inx':
            valueToFill = data.birth_place || ""; 
            break;
        case 'birth_date':
        case 'bday2':
        case 'bday1':
        case 'late_birth_on':
            let storedDate = data.birth_day || ""; 
            if (storedDate) {
                valueToFill = formatDateFormal(storedDate);
            }
            break;
        case 'late_citizen': 
            valueToFill = "PHILIPPINES";
            break;
        case 'ack_sworn_name':
        case 'late_sworn_name':
            valueToFill = data.civil_name || "";
            break;
        case 'ack_sworn_position':
        case 'late_sworn_position':
            valueToFill = data.civil_position || "MUNICIPAL CIVIL REGISTRAR"; 
            break;
        case 'ack_sworn_address':
        case 'late_sworn_address':
        case 'sworn_at':
        case 'sign_at':
            valueToFill = "GERONA, TARLAC"; 
            break;
        case 'child_name':
        case 'childlatename':
        case 'late_birth_of':
            valueToFill = `${data.child_fname || ''} ${data.child_mname || ''} ${data.child_lname || ''}`;
            break;
        case 'father_name':
        case 'father_sign':
        case 'ack_father_sworn':
        case 'not_married_txt':
            valueToFill = fName;
            break;
        case 'mother_name':
        case 'mother_sign':
        case 'ack_mother_sworn':
            valueToFill = mName;
            break;
        case 'married_txt1':
            valueToFill = data.marriage_date || "";
            break;
        case 'married_txt2': 
            valueToFill = data.marriage_place || "";
            break;
        case 'attend_birth_by':
            valueToFill = data.attendant_name || "";
            break;
        case 'who_resides_at':
            valueToFill = data.attendant_address || "";
            break;
    }

    if (valueToFill) {
        $(focusedElement).val(valueToFill.trim().toUpperCase());
    }
  }

    $('input').on('keydown', function(e) {
        if (e.key === "Enter") {
            syncCurrentField(this);
        }
    });
});
</script>

<script>
$(document).ready(function() {
    function updateSuggestions() {
        const raw = localStorage.getItem('birth_form_data');
        if (!raw) return;
        
        const data = JSON.parse(raw);
        
        Object.keys(data).forEach(key => {
            let val = data[key];
            if (val && val.trim() !== "") {
                let listId = "list_" + key;
                if ($("#" + listId).length === 0) {
                    $('body').append(`<datalist id="${listId}"></datalist>`);
                }
                
                let datalist = $("#" + listId);
                if (datalist.find(`option[value='${val.toUpperCase()}']`).length === 0) {
                    datalist.append(`<option value="${val.toUpperCase()}">`);
                }
                
                $(`#${key}`).attr('list', listId);
            }
        });
    }
    updateSuggestions();
});
</script>

<script>
const selectElement = document.getElementById('status-select');
const textDisplay = document.getElementById('selected-text');

selectElement.addEventListener('change', function() {
    textDisplay.textContent = this.options[this.selectedIndex].text;
});
</script>

<script>
// Universal Keyboard Navigation (Enter to next, Backspace to delete char)
$(document).ready(function() {
    $('input, select, textarea').on('keydown', function(e) {
        if (e.key === "Enter") {
            if (this.tagName === 'TEXTAREA' && !e.ctrlKey) return; 
            e.preventDefault();
            let $canfocus = $('input, select, textarea').filter(':visible:enabled:not([readonly])');
            let index = $canfocus.index(this) + 1;
            if (index < $canfocus.length) {
                $canfocus.eq(index).focus();
            }
        }
    });
});
</script>