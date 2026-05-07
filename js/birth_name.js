$(document).ready(function(){
    try {
        var childEl = document.getElementById("child");
        if (childEl && $('#child_fname').length) {
            childEl.value = ($('#child_fname').val() || '') + ' ' + ($('#child_mname').val() ? $('#child_mname').val().charAt(0) + '. ' : '') + ($('#child_lname').val() || '');
        }

        var motherEl = document.getElementById("mother");
        if (motherEl && $('#mother_fname').length) {
            motherEl.value = ($('#mother_fname').val() || '') + ' ' + ($('#mother_mname').val() ? $('#mother_mname').val().charAt(0) + '. ' : '') + ($('#mother_lname').val() || '');
        }

        var fatherEl = document.getElementById("father");
        if (fatherEl && $('#father_fname').length) {
            fatherEl.value = ($('#father_fname').val() || '') + ' ' + ($('#father_mname').val() ? $('#father_mname').val().charAt(0) + '. ' : '') + ($('#father_lname').val() || '');
        }

        var cNameEl = document.getElementById("c_name");
        if (cNameEl && $('#child_fname').length) {
            cNameEl.innerHTML = ($('#child_fname').val() || '') + ' ' + ($('#child_mname').val() ? $('#child_mname').val().charAt(0) + '. ' : '') + ($('#child_lname').val() || '');
        }
    } catch (e) {
        console.warn("birth_name.js skipped: Some elements missing.");
    }
});