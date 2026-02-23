$(document).ready(function(){

  $("#physician").click(function(){
  	document.getElementById("nurse").checked = false;
    document.getElementById("midwife").checked = false;
    document.getElementById("hilot").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#nurse").click(function(){
    document.getElementById("physician").checked = false;
    document.getElementById("midwife").checked = false;
    document.getElementById("hilot").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#midwife").click(function(){
  	document.getElementById("physician").checked = false;
    document.getElementById("nurse").checked = false;
    document.getElementById("hilot").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#hilot").click(function(){
  	document.getElementById("physician").checked = false;
    document.getElementById("nurse").checked = false;
    document.getElementById("midwife").checked = false;
    document.getElementById("others").checked = false;
  });
  $("#others").click(function(){
    document.getElementById("physician").checked = false;
    document.getElementById("nurse").checked = false;
    document.getElementById("midwife").checked = false;
    document.getElementById("hilot").checked = false;
  });
/*
  $("#attendant_date").keyup(function(){   
    document.getElementById("informant_date").value = $("#attendant_date").val();
    document.getElementById("prepared_date").value = $("#attendant_date").val();
    });
  $("#informant_date").keyup(function(){   
    document.getElementById("attendant_date").value = $("#informant_date").val();
    document.getElementById("prepared_date").value = $("#informant_date").val();
    });
  $("#prepared_date").keyup(function(){   
    document.getElementById("attendant_date").value = $("#prepared_date").val();
    document.getElementById("informant_date").value = $("#prepared_date").val();
    });

  $("#received_date").keyup(function(){   
    document.getElementById("civil_date").value = $("#received_date").val();
    });
  $("#civil_date").keyup(function(){   
    document.getElementById("received_date").value = $("#civil_date").val();
    });
*/
});