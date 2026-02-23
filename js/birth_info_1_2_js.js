$(document).ready(function(){
//time
    var x = new Date();
    document.getElementById("time").value = x.toLocaleTimeString();

//page2value
    $("#page2").click(function(){
      //mother namw
      var mf = document.getElementById("mother_fname").value;
      var mm = document.getElementById("mother_mname").value;
      var ml = document.getElementById("mother_lname").value;
      //father name
      var ff = document.getElementById("father_fname").value;
      var fm = document.getElementById("father_mname").value;
      var fl = document.getElementById("father_lname").value;
      //child name
      var cf = document.getElementById("child_fname").value;
      var cm = document.getElementById("child_mname").value;
      var cl = document.getElementById("child_lname").value;
      //child bdate
      var bday = document.getElementById("birth_day").value;
      var bmonth = document.getElementById("birth_month").value;
      var byear = document.getElementById("birth_year").value;
      //birth place
      var bbrgy = document.getElementById("birth_brgy").value;
      var bcity = document.getElementById("birth_city").value;
      var bprovince = document.getElementById("birth_province").value;

      document.getElementById("father_name").value = ff + ' ' + fm.charAt(0) +'. ' + fl;
      document.getElementById("mother_name").value = mf + ' ' + mm.charAt(0) +'. ' + ml;
      document.getElementById("child_name").value = cf + ' ' + cm.charAt(0) +'. ' + cl;
      document.getElementById("birth_date").value = bmonth + ' ' + bday +', ' + byear;
      document.getElementById("birth_place").value = bbrgy + ', ' + bcity +', ' + bprovince;
      document.getElementById("father_sign").value = ff + ' ' + fm.charAt(0) +'. ' + fl;
      document.getElementById("mother_sign").value = mf + ' ' + mm.charAt(0) +'. ' + ml;
      document.getElementById("ack_father_sworn").value = ff + ' ' + fm.charAt(0) +'. ' + fl;
      document.getElementById("ack_mother_sworn").value = mf + ' ' + mm.charAt(0) +'. ' + ml;
    });

    //page2value
    $("#page1").click(function(){
      document.getElementById("father_name").value =" ";
      document.getElementById("mother_name").value = " ";
      document.getElementById("child_name").value = " ";
      document.getElementById("birth_date").value = " ";
      document.getElementById("birth_place").value = " ";
      document.getElementById("father_sign").value =" ";
      document.getElementById("mother_sign").value = " ";
      document.getElementById("ack_father_sworn").value =" ";
      document.getElementById("ack_mother_sworn").value = " ";
    });
    
});