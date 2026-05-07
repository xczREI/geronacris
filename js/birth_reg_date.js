$(document).ready(function(){
    try {
        var regDateInput = document.getElementById("date");
        var regDateEl = document.getElementById("regdate");
        
        if (regDateInput && regDateInput.value && regDateEl) {
            var x = new Date(regDateInput.value);
            if (!isNaN(x.getTime())) {
                var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                var m = months[x.getMonth()];
                var y = x.getFullYear();
                regDateEl.value = m + ' ' + y;
            }
        }
    } catch (err) {
        console.warn("birth_reg_date.js skipped: " + err.message);
    }
});